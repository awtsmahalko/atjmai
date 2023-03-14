<?php
class Tutor extends Connection
{
    private $table = 'tbl_tutors';
    public $pk = 'tutor_id';

    private $table_user = 'tbl_users';
    public $pk2 = 'user_id';

    public $session = array();

    public $inputs = array();

    public static function options()
    {
        $option = '';
        $classes = [
            'First Year', 'Second Year', 'Third Year', 'Fourth Year'
        ];

        foreach ($classes as $class_name) {
            $option .= "<option>$class_name</option>";
        }

        return $option;
    }

    public static function lists($user_id = 0,$inject = "")
    {
        $self = new self;
        $response = [];
        $eq = $user_id > 0 ? "=" : ">";

        $result = $self->select($self->table_user, '*', "user_category = '1' AND user_id $eq $user_id $inject ORDER BY date_added DESC");
        $count = 1;
        while ($row = $result->fetch_assoc()) {

            $user_data = [
                'user_id' => $row['user_id'],
                'user_fullname' => $row['user_fname'].' '.$row['user_mname'].' '.$row['user_lname'],
                'user_address' => $row['user_address'],
                'user_category' => $row['user_category'],
                'user_mobile' => $row['user_mobile'],
                'user_img' => $row['user_img'],
                'tutor' => $self->tutor_data($row['user_id'])
            ];

            array_push($response, $user_data);
        }

        return $response;
    }

    public function tutor_data($user_id)
    {
        $result = $this->select($this->table, '*', "user_id = '$user_id'");
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            return [
                'subjects' => explode(",",$row['subjects']),
                'course_id' => $row['course_id'],
                'language' => $row['language'],
                'subscription' => $row['subscription']
            ];
        }else{
            $this->insert($this->table,['user_id' => $user_id]);
            return [
                'subjects' => [],
                'course_id' => 0,
                'language' => '',
                'subscription' => ''
            ];
        }
    }

    public function updateTutor()
    {
        $form = [
                'subjects' => implode(",",$this->inputs['subjects']),
                'course_id' => $this->inputs['course_id'],
                'language' => $this->inputs['language'],
                'subscription' => $this->inputs['subscription']
            ];
        $this->update($this->table,$form, "user_id = '".$this->inputs['user_id']."'");
        header("location:../index.php?q=account-settings&tab=nav-status");
    }

    public function search()
    {
        $subject = strtoupper($this->inputs['subject']);
        $response['tutors'] = [];
        $result = $this->select($this->table_user, '*', "user_category = '1' ORDER BY user_lname ASC");
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            $active_tut = Tutorials::active($row['user_id']);
            if($active_tut['tutorial_id'] > 0){
                $user_data = [
                    'user_id' => $row['user_id'],
                    'user_fullname' => $row['user_lname'].', '.$row['user_fname'].' '.$row['user_mname'],
                    'user_address' => $row['user_address'],
                    'user_category' => $row['user_category'],
                    'user_mobile' => $row['user_mobile'],
                    'user_img' => $row['user_img'],
                    'tutorials' => $active_tut
                ];
                if(strpos(strtoupper($active_tut['subject_name']), $subject) !== false){
                    array_push($response['tutors'], $user_data);
                }
            }
        }

        $response['header'] = [
            'user_category' => (int) $_SESSION['user']['category']
        ];

        return json_encode($response);
    }

    public function search_all()
    {
        $response['tutors'] = [];
        $result = $this->select($this->table_user, '*', "user_category = '1' ORDER BY user_lname ASC");
        $count = 1;
        while ($row = $result->fetch_assoc()) {

            $user_data = [
                'user_id' => $row['user_id'],
                'user_fullname' => $row['user_lname'].', '.$row['user_fname'].' '.$row['user_mname'],
                'user_address' => $row['user_address'],
                'user_category' => $row['user_category'],
                'user_mobile' => $row['user_mobile'],
                'user_img' => $row['user_img'],
                'tutorials' => Tutorials::active($row['user_id'])
            ];

            array_push($response['tutors'], $user_data);
        }


        $response['header'] = [
            'user_category' => (int) $_SESSION['user']['category']
        ];

        return json_encode($response);
    }
}
