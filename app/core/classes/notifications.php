<?php
class Notifications extends Connection
{
    private $table = 'tbl_notifications';
    public $pk = 'notif_id';
    public $name = 'notif_name';

    public function add_from_post_job($employer_id)
    {
        $courses = implode(",", $this->post('courses'));
        $text = Employers::dataOf($employer_id, 'employer_name') . " posted new Job (" . $this->post('job_title') . ")";

        $result = $this->select("tbl_alumni", "user_id", "course_id IN(" . $courses . ")");
        while ($row = $result->fetch_assoc()) {
            $this->add($row['user_id'], $text);
        }
    }


    public function lists()
    {
        $notifs = [];
        $result = $this->select($this->table, "*", "user_id = '" . $_SESSION['user']['id'] . "'");
        while ($row = $result->fetch_assoc()) {
            $notifs[] = $row;
        }
        return $notifs;
    }


    public function add($user_id, $notif_name)
    {
        return $this->insert($this->table, [
            'user_id'    => $user_id,
            'notif_name'  => $this->clean($notif_name),
        ]);
    }

    public static function name($primary_id)
    {
        $self = new self;
        $result = $self->select($self->table, $self->name, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row[$self->name];
    }

    public static function dataOf($primary_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table, $field, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }
}
