<?php
class Posts extends Connection
{
    private $table = 'tbl_posts';
    public $pk = 'post_id';

    private $table_apply = 'tbl_posts_applies';
    public $pk2 = 'apply_id';

    private $table_comment = 'tbl_posts_comments';
    public $pk3 = 'apply_id';

    public $session = array();

    public $inputs = array();
    public $requests = array();

    public function add()
    {
        $postby_id = $_SESSION['user']['id'];
        if($_SESSION['user']['category']==1){
            $message = $this->clean($this->inputs['message']);
            $form = array(
                'postby_id' => $postby_id,
                'message' => $message,
                'post_category' => 1
            );
        }else{
            $subjects = implode(",",$this->inputs['subjects']);
            $language = $this->clean($this->inputs['language']);
            $subscription = $this->clean($this->inputs['subscription']);
            $message = $this->clean($this->inputs['message']);
            $deadline = $this->clean($this->inputs['deadline']);

            $form = array(
                'postby_id' => $postby_id,
                'subjects' => $subjects,
                'language' => $language,
                'subscription' => $subscription,
                'message' => $message,
                'deadline' => $deadline
            );
        }
        $this->insert($this->table, $form);
        header("location:../index.php");
    }
    public static function lists($post_id = 0,$inject = "")
    {
        $self = new self;
        $response = [];
        $eq = $post_id > 0 ? "=" : ">";
        $result = $self->select($self->table, '*', "post_id $eq $post_id $inject ORDER BY date_added DESC");
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            array_push($response, [
                'post_id' => $row['post_id'],
                'post_category' => $row['post_category'],
                'postby_id' => $row['postby_id'],
                'postby' => Users::dataOf($row['postby_id']),
                'subjects' => $row['subjects'],
                'course_id' => $row['course_id'],
                'language' => $row['language'],
                'subscription' => $row['subscription'],
                'message' => $row['message'],
                'deadline' => $row['deadline'],
                'date_added' => $row['date_added']
            ]);
        }

        return $response;
    }

    public function apply()
    {
        $post_id = $this->clean($this->inputs['post_id']);
        $post_by = $this->clean($this->inputs['post_by']);
        $tutorial_id = $this->clean($this->inputs['tutorial_id']);
        
        $form = array(
            'post_id' => $post_id,
            'tutorial_id' => $tutorial_id,
            'post_by' => $post_by,
            'applied_by' => $_SESSION['user']['id'],
            'applied_to' => $post_by,
        );
        $this->insert($this->table_apply, $form);

        $Messages = new Messages();
        $Messages->init(false,false,['receiver_id' => $post_by]);

        if($_SESSION['user']['category'] == 1){
            $Tutorials = new Tutorials();
            $Tutorials->add_detail(false,[
                'tution_id' => $post_by,
                'tutorial_id' => $tutorial_id,
                'applied_by' => $_SESSION['user']['id'],
            ]);
            $message_name = "Hello, I want to tutor you.";
        }else{
            $Tutorials = new Tutorials();
            if($post_id > 0){
                $active_tut = Tutorials::active($post_by);
                $tutorial_id = $active_tut['tutorial_id'];
            }

            if($Tutorials->hasApply($tutorial_id, $_SESSION['user']['id']) > 0)
                return 2;

            $Tutorials->add_detail(false,[
                'tution_id' => $_SESSION['user']['id'],
                'tutorial_id' => $tutorial_id,
                'applied_by' => $_SESSION['user']['id'],
            ]);
            $message_name = "Hello, I want you to be my tutor.";
        }

        $Messages->add(false,false,['receiver_id' => $post_by,'message_name' => $message_name]);
        header("location:../index.php?q=viewpost&post_id=$post_id");
    }

    public function apply_in_tutor()
    {
        $post_id = $this->clean($this->inputs['post_id']);
        $post_by = $this->clean($this->inputs['post_by']);
        $tutorial_id = $this->clean($this->inputs['tutorial_id']);
        
        $Tutorials = new Tutorials();
        if($Tutorials->hasApply($tutorial_id, $_SESSION['user']['id']) > 0)
            return 2;

        $form = array(
            'post_id' => $post_id,
            'tutorial_id' => $tutorial_id,
            'post_by' => $post_by,
            'applied_by' => $_SESSION['user']['id'],
            'applied_to' => $post_by,
        );
        $this->insert($this->table_apply, $form);

        $Messages = new Messages();
        $Messages->init(false,false,['receiver_id' => $post_by]);

        $Tutorials->add_detail(false,[
            'tution_id' => $_SESSION['user']['id'],
            'tutorial_id' => $tutorial_id,
            'applied_by' => $_SESSION['user']['id'],
        ]);
        $message_name = "Hello, I want you to be my tutor.";
        $Messages->add(false,false,['receiver_id' => $post_by,'message_name' => $message_name]);
        return 1;
    }

    public function hasApply($post_id, $user_id)
    {
        $result = $this->select($this->table_apply, "*", "post_id='$post_id' AND applied_by='$user_id'");
        return $result->num_rows;
    }

    public function confirm_apply()
    {
        $post_id = $this->clean($this->requests['post_id']);
        $this->update($this->table_apply, ['tution_cf' => 1], "post_id='$post_id'");
        header("location:../index.php?q=viewpost&post_id=$post_id");
    }

    public function apply_action()
    {
        $Tutorials = new Tutorials();
        $apply_id = $this->clean($this->inputs['apply_id']);
        $apply_status = $this->clean($this->inputs['apply_status']);
        $apply_data = $this->detailDataOf($apply_id);

        if($_SESSION['user']['category'] == 2){
            if($apply_status == 1){

                // SEND MESSAGE TO ACCEPTED TUTOR
                $accepted_tutor = $apply_data['applied_by'];
                $message_name = "I accept you as my tutor";
                $Messages = new Messages();
                $Messages->init(false,false,['receiver_id' => $accepted_tutor]);
                $Messages->add(false,false,['receiver_id' => $accepted_tutor,'message_name' => $message_name]);

                // UPDATE TUTORIAL DETAILS OF ACCEPTED TUTOR
                $active_tut = Tutorials::active($accepted_tutor);
                $Tutorials->confirm_detail(false, [
                    'tutorial_id' => $active_tut['tutorial_id'],
                    'tution_id' => $_SESSION['user']['id']
                ]);

                // NOTIFY AND MESSAGE OTHER TUTORS
                $this->declineTutors($apply_id,$_SESSION['user']['id']);

            }else{
                $this->declineTutor($apply_id,$apply_data['applied_by'],$_SESSION['user']['id']);
            }
        }else{
            if($apply_status == 1){
                // SEND MESSAGE TO ACCEPTED TUTION
                $accepted_tution = $apply_data['applied_by'];
                $message_name = "I accept you as my tution";
                $Messages = new Messages();
                $Messages->init(false,false,['receiver_id' => $accepted_tution]);
                $Messages->add(false,false,['receiver_id' => $accepted_tution,'message_name' => $message_name]);

                // UPDATE TUTORIAL DETAILS OF ACCEPTED TUTION
                $active_tut = Tutorials::active($_SESSION['user']['id']);
                $Tutorials->confirm_detail(false, [
                    'tutorial_id' => $active_tut['tutorial_id'],
                    'tution_id' => $accepted_tution
                ]);

                if($active_tut['confirmed_tutions'] >= ($active_tut['tution_limit'] - 1))
                    $this->declineTutions($apply_id,$_SESSION['user']['id'],$active_tut['tutorial_id']);
            }else{
                $this->declineTution($apply_id,$apply_data['applied_by'],$_SESSION['user']['id']);
            }
        }
        return $this->update($this->table_apply, ['apply_status' => $apply_status,'status' => 1], "apply_id='$apply_id'");
    }

    public function declineTutor($apply_id,$tutor_id,$tution_id)
    {
        $Tutorials = new Tutorials();

        // SEND MESSAGE TO DECLINED TUTOR
        $message_name = "I'm sorry to refuse your tutorial offer.";
        $Messages = new Messages();
        $Messages->init(false,false,['receiver_id' => $tutor_id]);
        $Messages->add(false,false,['receiver_id' => $tutor_id,'message_name' => $message_name]);

        // UPDATE TUTORIAL DETAILS OF ACCEPTED TUTOR
        $active_tut = Tutorials::active($tutor_id);
        $Tutorials->decline_detail(false, [
            'tutorial_id' => $active_tut['tutorial_id'],
            'tution_id' => $tution_id
        ]);
    }

    public function declineTution($apply_id,$tution_id,$tutor_id)
    {
        $Tutorials = new Tutorials();

        // SEND MESSAGE TO DECLINED TUTOR
        $message_name = "I'm sorry to refuse your tutorial offer.";
        $Messages = new Messages();
        $Messages->init(false,false,['receiver_id' => $tutor_id]);
        $Messages->add(false,false,['receiver_id' => $tutor_id,'message_name' => $message_name]);

        // UPDATE TUTORIAL DETAILS OF ACCEPTED TUTOR
        $active_tut = Tutorials::active($tutor_id);
        $Tutorials->decline_detail(false, [
            'tutorial_id' => $active_tut['tutorial_id'],
            'tution_id' => $tution_id
        ]);
    }
    public function declineTutors($apply_id,$tution_id)
    {
        $Tutorials = new Tutorials();
        $result = $this->select($this->table_apply,"*","applied_to = '$tution_id' AND status = '0' AND apply_id != '$apply_id'");
        while ($row = $result->fetch_assoc()) {
            // SEND MESSAGE TO DECLINED TUTOR
            $declined_tutor = $row['applied_by'];
            $message_name = "Sorry, I already found a tutor.";
            $Messages = new Messages();
            $Messages->init(false,false,['receiver_id' => $declined_tutor]);
            $Messages->add(false,false,['receiver_id' => $declined_tutor,'message_name' => $message_name]);

            // UPDATE TUTORIAL DETAILS OF ACCEPTED TUTOR
            $active_tut = Tutorials::active($declined_tutor);
            $Tutorials->decline_detail(false, [
                'tutorial_id' => $active_tut['tutorial_id'],
                'tution_id' => $tution_id
            ]);

            $this->update($this->table_apply, ['apply_status' => -1,'status' => 1], "apply_id='$row[apply_id]'");
        }
    }

    public function declineTutions($apply_id,$tutor_id,$tutorial_id)
    {
        $Messages = new Messages();
        $Tutorials = new Tutorials();
        $result = $this->select($this->table_apply,"*","applied_to = '$tutor_id' AND status = '0' AND apply_id != '$apply_id'");
        while ($row = $result->fetch_assoc()) {
            // SEND MESSAGE TO DECLINED TUTOR
            $declined_tution = $row['applied_by'];
            $message_name = "Sorry number of tutions already exceeds";
            $Messages->init(false,false,['receiver_id' => $declined_tution]);
            $Messages->add(false,false,['receiver_id' => $declined_tution,'message_name' => $message_name]);

            // UPDATE TUTORIAL DETAILS OF DECLINED TUTIOM
            $Tutorials->decline_detail(false, [
                'tutorial_id' => $tutorial_id,
                'tution_id' => $declined_tution
            ]);

            $this->update($this->table_apply, ['apply_status' => -1,'status' => 1], "apply_id='$row[apply_id]'");
        }
    }

    public function notifCheck()
    {
        $ck = $_SESSION['user']['category'] == 1 ? "tutor_ck" : "student_ck";
        $user_id = $_SESSION['user']['id'];
        $this->update($this->table_apply, [$ck => 'yes'], "(applied_to = '$user_id' OR applied_by='$user_id')");
    }

    public function notifCounter(){
        $user_id = $_SESSION['user']['id'];
        $ck = $_SESSION['user']['category'] == 1 ? "tutor_ck" : "student_ck";
        $result = $this->select($this->table_apply, "*", "(applied_to = '$user_id' OR applied_by='$user_id') AND $ck='no'");
        return (int) $result->num_rows;
    }

    public function notification()
    {
        $user_category = $_SESSION['user']['category'];
        $user_id = $_SESSION['user']['id'];

        $response = [];

        $result = $this->select($this->table_apply,"*","(applied_to = '$user_id' OR applied_by='$user_id') ORDER BY date_added DESC");
        while ($row = $result->fetch_assoc()) {
            $post_id = $row['post_id'];
            $applied_to_id = $row['applied_to'];
            $applied_by_id = $row['applied_by'];
            $deadline = $row['applied_time'];
            $apply_status = $row['apply_status'];

            if($applied_by_id == $user_id){
                $users = Users::dataOf($applied_to_id);
                if($apply_status == 1){
                    $message = "Your application has been confirmed";
                    $actions = "<label class='badge badge-success' style='position: absolute;top: 20px;right: 0;font-size: 14px;'>Confirmed</label>";
                }else if($apply_status == -1){
                    $message = "Your application has been declined";
                    $actions = "<label class='badge badge-danger' style='position: absolute;top: 20px;right: 0;font-size: 14px;'>Declined</label>";
                }else if($apply_status == -2){
                    $message = "Sorry tution already choose a tutor";
                    $actions = "<label class='badge badge-warning' style='position: absolute;top: 20px;right: 0;font-size: 14px;'>Not chosen</label>";
                }else{
                    $message = "You applied to a post";
                    $actions = "<label class='badge badge-success' style='position: absolute;top: 20px;right: 0;font-size: 14px;'>Already applied</label>";
                }
            }else{
                $users = Users::dataOf($applied_by_id);
                if($apply_status == 1){
                    $message = "You confirmed this application";
                    $actions = "<label class='badge badge-success' style='position: absolute;top: 20px;right: 0;font-size: 14px;'>Confirmed</label>";
                }else if($apply_status == -1){
                    $message = "You declined this application";
                    $actions = "<label class='badge badge-danger' style='position: absolute;top: 20px;right: 0;font-size: 14px;'>Declined</label>";
                }else if($apply_status == -2){
                    $message = "You already choose a tutor";
                    $actions = "<label class='badge badge-warning' style='position: absolute;top: 20px;right: 0;font-size: 14px;'>Not chosen</label>";
                }else{
                    $message = $_SESSION['user']['category'] == 1 ? 'Student choose you as tutor': "A tutor wants to teach you";
                    $actions = '<div style="top:20px;float: right;position: inherit;">
                  <button type="button" class="btn btn-sm btn-danger" onclick=\'applyAction('.$row['apply_id'].',-1,"decline")\'><span class="fa fa-times"></span> Decline</button>
                  <button type="button" class="btn btn-sm btn-success" onclick=\'applyAction('.$row['apply_id'].',1,"confirm")\'><span class="fa fa-check"></span> Accept</button>
                </div>';
                }
            }


            $user_img = $users['user_img'];
            $user_fullname = $users['user_fname'] . " ". $users['user_lname'];
            $time_ago = $this->time_ago($deadline);

            array_push($response,[
                'apply_id' => $row['apply_id'],
                'post_id' => $post_id,
                'user_img' => $user_img,
                'user_fullname' => $user_fullname,
                'message' => $message,
                'actions' => $actions,
                'time_ago' => $time_ago,
                'apply_status' => (int) $apply_status,
                'applied_by' => (int)$applied_by_id,
            ]);
        }
        

        return $response;
    }

    public static function dataOf($primary_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table, $field, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }

    public static function detailDataOf($primary_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table_apply, $field, "$self->pk2 = '$primary_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }

    public function add_comment()
    {
        $commented_by = $_SESSION['user']['id'];
        $post_id = $this->clean($this->inputs['post_id']);
        $comment = $this->clean($this->inputs['comment']);
        if($comment != ''){
            $form = array(
                'commented_by' => $commented_by,
                'comment' => $comment,
                'post_id' => $post_id,
            );
            $this->insert($this->table_comment, $form);
        }
        header("location:../index.php?q=viewpost&post_id=$post_id");
    }

    public static function list_comment($post_id = 0,$inject = "")
    {
        $self = new self;
        $response = [];
        $eq = $post_id > 0 ? "=" : ">";
        $result = $self->select($self->table_comment, '*', "post_id $eq $post_id $inject ORDER BY date_added ASC");
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            array_push($response, [
                'post_id' => $row['post_id'],
                'comment' => $row['comment'],
                'commentor' => Users::dataOf($row['commented_by']),
                'date_added' => $row['date_added']
            ]);
        }
        return $response;
    }
}
