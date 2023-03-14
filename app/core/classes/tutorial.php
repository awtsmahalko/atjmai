<?php
class Tutorials extends Connection
{
    private $table = 'tbl_tutorials';
    public $pk = 'tutorial_id';

    private $table2 = 'tbl_tutorials_details';
    public $pk2 = 'td_id';
    
    public $session = array();

    public $inputs = array();

    public function show_finished()
    {
        $user_id = $_SESSION['user']['id'];
        $response['tutorials'] = [];

        $result = $_SESSION['user']['category'] == 1 ? $this->select($this->table, "*", "tutor_id = '$user_id' AND tutorial_status = 'FINISHED' ORDER BY tutorial_id DESC") : $this->select('tbl_tutorials AS h,tbl_tutorials_details AS d',"h.*","h.tutorial_id=d.tutorial_id AND d.tution_id = '$user_id' AND d.status = 1 AND h.tutorial_status = 'FINISHED' ORDER BY h.tutorial_id DESC");

        while($row = $result->fetch_assoc()){
            $row['tutor'] = Users::dataOf($row['tutor_id']);
            $row['tutions'] = $this->show_details($row['tutorial_id']);
            array_push($response['tutorials'],$row);
        }
        return $response;
    }

    public function add()
    {
        $tutor_id = $_SESSION['user']['id'];
        $subject_id = $this->inputs['subject'];
        $tution_limit = $this->inputs['tution_limit'];
        $date_start = $this->inputs['date_start'];
        $date_end = $this->inputs['date_end'];
        $schedule = $this->inputs['schedule'];

        $result = $this->select($this->table, "tutorial_id", "tutor_id = '$tutor_id' AND tutorial_status IN('PENDING','ONGOING')");
        if($result->num_rows > 0)
            return 2;

        $form = array(
            'tutor_id'  => $tutor_id,
            'tution_limit'  => $tution_limit,
            'date_start'  => $date_start,
            'date_end'  => $date_end,
            'subject_id'  => $this->clean($subject_id),
            'schedule'  => $this->clean($schedule),
            'tutorial_status' => 'PENDING',
        );
        return $this->insert($this->table, $form);
    }

    public function edit()
    {
        $tutorial_id = $this->inputs['tutorial_id'];
        $subject_id = $this->inputs['subject'];
        $tution_limit = $this->inputs['tution_limit'];
        $date_start = $this->inputs['date_start'];
        $date_end = $this->inputs['date_end'];
        $schedule = $this->inputs['schedule'];

        $form = array(
            'tution_limit'  => $tution_limit,
            'date_start'  => $date_start,
            'date_end'  => $date_end,
            'subject_id'  => $this->clean($subject_id),
            'schedule'  => $this->clean($schedule),
        );
        return $this->update($this->table, $form,"tutorial_id = '$tutorial_id'");
    }

    public function add_detail($is_input = true, $request = [])
    {
        $tution_id = $is_input ? $this->inputs['tution_id'] : $request['tution_id'];
        $tutorial_id = $is_input ? $this->inputs['tutorial_id'] : $request['tutorial_id'];
        $applied_by = $is_input ? $this->inputs['applied_by'] : $request['applied_by'];

        // CHECK TUTORIAL STATUS FIRST

        // CHECK LIMIT IF EXCEEDS

        $result = $this->select($this->table2, $this->pk2, "tutorial_id = '$tutorial_id' AND tution_id = '$tution_id'");
        if($result->num_rows > 0)
            return 2;

        $form = array(
            'tutorial_id'  => $tutorial_id,
            'tution_id'  => $tution_id,
            'applied_by'  => $applied_by,
            'status' => 0
        );
        return $this->insert($this->table2, $form);
    }

    public function confirm_detail($is_input = true, $request = [])
    {
        $tution_id = $is_input ? $this->inputs['tution_id'] : $request['tution_id'];
        $tutorial_id = $is_input ? $this->inputs['tutorial_id'] : $request['tutorial_id'];

        $this->update($this->table2, ['status' => 1], "tutorial_id='$tutorial_id' AND tution_id = '$tution_id' AND status = '0'");
    }

    public function decline_detail($is_input = true, $request = [])
    {
        $tution_id = $is_input ? $this->inputs['tution_id'] : $request['tution_id'];
        $tutorial_id = $is_input ? $this->inputs['tutorial_id'] : $request['tutorial_id'];

        $this->update($this->table2, ['status' => -1], "tutorial_id='$tutorial_id' AND tution_id = '$tution_id' AND status = '0'");
    }

    public function show_details($tutorial_id)
    {
        $response = [];
        $result = $this->select($this->table2, "*", "tutorial_id = '$tutorial_id' AND status != '-1'");
        while ($row = $result->fetch_assoc()) {
            $row['tution'] = Users::dataOf($row['tution_id']);
            $response[] = $row;
        }
        return $response;
    }

    public function details_action($row)
    {
        if($row['status'] == 1)
            return $_SESSION['user']['category'] == 1 ? "<label class='badge badge-warning' style='font-size: 14px;'>Confirmed</label>" : '';

        if($row['status'] == -1)
            return "<label class='badge badge-danger' style='font-size: 14px;'>Declined</label>";

        $result = $this->select("tbl_posts_applies", "*", "tutorial_id = '$row[tutorial_id]' AND applied_by = '$row[applied_by]'");
        $row2 = $result->fetch_assoc();
        $apply_id = $row2['apply_id'];

        if($_SESSION['user']['category'] == 1){
            if($_SESSION['user']['id'] != $row['applied_by'])
                return '<button type="button" class="btn btn-sm btn-danger" onclick=\'applyAction('.$apply_id.',-1,"decline")\'><span class="fa fa-times"></span> Decline</button> <button type="button" class="btn btn-sm btn-success" onclick=\'applyAction('.$apply_id.',1,"confirm")\'><span class="fa fa-check"></span> Accept</button>';
        }

        if($row['tution_id'] == $row['applied_by'])
            return $row['status'] == 1 ? "<label class='badge badge-warning' style='font-size: 14px;'>Confirmed</label>" : "<label class='badge badge-danger' style='font-size: 14px;'>Pending</label>";
        return "<label class='badge badge-warning' style='font-size: 14px;'>Pending</label>";
    }

    public static function active($user_id = 0){
        $self = new self;
        $tutor_id = $user_id == 0 ? $_SESSION['user']['id'] : $user_id;
        $category_id = Users::dataOf($tutor_id,'user_category');

        $result = $category_id == 1 ? $self->select($self->table, "*", "tutor_id = '$tutor_id' AND tutorial_status IN('PENDING','ONGOING')") : $self->select('tbl_tutorials AS h,tbl_tutorials_details AS d',"h.*","h.tutorial_id=d.tutorial_id AND d.tution_id = '$tutor_id' AND d.status != 0 AND h.tutorial_status IN('PENDING','ONGOING')");
        if($result->num_rows < 1)
            return ['tutorial_id' => 0];
        $row = $result->fetch_assoc();
        $row['subject_name'] = Subjects::name($row['tutorial_id']);
        $row['confirmed_tutions'] = $self->confirmedDetail($row['tutorial_id']);
        return $row;
    }
    public function confirmedDetail($tutorial_id)
    {
        $result = $this->select($this->table2, "*", "tutorial_id='$tutorial_id' AND status='1'");
        return $result->num_rows;
    }
    public function hasApply($tutorial_id, $tution_id)
    {
        $result = $this->select($this->table2, "*", "tutorial_id='$tutorial_id' AND tution_id='$tution_id'");
        return $result->num_rows;
    }
    public static function checkPostStatus($tution_id,$post_id)
    {
        if(date('Y-m-d') > Posts::dataOf($post_id,'deadline'))
            return Components::deadlineIsOver();

        $Posts = new Posts();
        if($Posts->hasApply($post_id,$_SESSION['user']['id']) > 0)
            return Components::alreadyApplied();

        $self = new self;
        $active_tut = $self::active();
        if($active_tut['tutorial_id'] == 0)
            return Components::noActiveTutorial();

        if($active_tut['tutorial_status'] == 'ONGOING')
            return Components::tutorialIsOngoing();

        $result = $self->select($self->table2, "*", "tutorial_id = '$active_tut[tutorial_id]' AND tution_id = '$tution_id'");
        if($result->num_rows < 1)
            return Components::confirmApplication($post_id,$tution_id,$active_tut['tutorial_id']);

        return Components::alreadyApplied(true);
    }


    public static function checkPostStatusByTution($tutor_id,$post_id)
    {
        $Posts = new Posts();
        $self = new self;

        if($Posts->hasApply($post_id,$_SESSION['user']['id']) > 0)
            return Components::alreadyApplied();

        // CHECK IF TUTOR IS AVAILABLE
        $active_tut = $self::active($tutor_id);
        if($active_tut['tutorial_id'] == 0)
            return Components::unavailableTutor();

        if($self->hasApply($active_tut['tutorial_id'],$_SESSION['user']['id']) > 0)
            return Components::alreadyApplied(true);

        // CHECK IF USER IS AVAILABLE
        $result = $self->select('tbl_tutorials AS h,tbl_tutorials_details AS d',"h.tutorial_id AS tutorial_id","h.tutorial_id=d.tutorial_id AND d.tution_id = '".$_SESSION['user']['id']."' AND d.status != 0 AND h.tutorial_status IN('PENDING','ONGOING')");
        if($result->num_rows > 0)
            return Components::unavailableStudent(1);

        if($active_tut['confirmed_tutions'] >= $active_tut['tution_limit'])
            return Components::exceedsTutorialLimit();

        return Components::confirmApplication($post_id,$tutor_id,$active_tut['tutorial_id']);

    }

    public function declineExcessTution($tutorial_id)
    {
        $limits = self::dataOf($tutorial_id,'tution_limit');
        $result = $this->select($this->table2, "*", "tutorial_id = '$tutorial_id' AND status = '1'");
        if($result->num_rows < $limits)
            return 0;

        $Messages = new Messages();
        $message_name = "Sorry number of tutions already exceeds";
        $result = $this->select($this->table2, "*", "tutorial_id = '$tutorial_id' AND status = '0'");
        while ($row = $result->fetch_assoc()) {
            $receiver_id = $row['tution_id'];
            $response[] = $row;
            $Messages->init(false,false,['receiver_id' => $receiver_id]);
            $Messages->add(false,false,['receiver_id' => $receiver_id,'message_name' => $message_name]);
        }
    }

    public function update_status($is_input = true, $request = [])
    {
        $Messages = new Messages();
        $tutorial_id = $is_input ? $this->inputs['tutorial_id'] : $request['tutorial_id'];
        $tutorial_status = $is_input ? $this->inputs['tutorial_status'] : $request['tutorial_status'];
        $message_name = $tutorial_status == 'ONGOING' ? "Our tutorial is ongoing now." : "Our tutorial has finished. Thank you for your cooperation";
        
        $result = $this->select($this->table2, "tution_id", "tutorial_id = '$tutorial_id' AND status = '1'");
        while ($row = $result->fetch_assoc()) {
            $Messages->add(false,false,['receiver_id' => $row['tution_id'],'message_name' => $message_name]);
        }

        $this->update($this->table, ['tutorial_status' => $tutorial_status], "tutorial_id='$tutorial_id'");
    }

    public function rating($tutorial_id,$tution_id)
    {
        $result = $this->select($this->table2, "rating", "tutorial_id = '$tutorial_id' AND tution_id = '$tution_id'");
        $row = $result->fetch_assoc();
        return (int) $row["rating"];
    }

    public function rate_me()
    {
       $tutorial_id = $this->inputs['tutorial_id'];
       $tution_id = $_SESSION['user']['id'];
       $rate = $this->inputs['rate'];

       $this->update($this->table2, ['rating' => $rate], "tutorial_id = '$tutorial_id' AND tution_id = '$tution_id'");
    }

    public static function dataOf($primary_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table, $field, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }

}
