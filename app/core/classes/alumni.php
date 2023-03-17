<?php
class Alumni extends Connection
{
    private $table = 'tbl_alumni';
    public $pk = 'alumni_id';
    public $name = 'course_name';
    public $session = array();

    public $inputs = array();
    public $old = array();

    public function add()
    {
        $user_id = $this->inputs['user_id'];
        $alumni_fname = $this->inputs['user_fname'];
        $alumni_mname = $this->inputs['user_mname'];
        $alumni_lname = $this->inputs['user_lname'];
        $alumni_contact = $this->inputs['alumni_contact'];
        $alumni_address = $this->inputs['alumni_address'];
        $course_id = $this->inputs['course_id'];
        $work_employer = $this->inputs['work_employer'];
        $work_place = $this->inputs['work_place'];
        $work_designation = $this->inputs['work_designation'];
        $alumni_graduation = $this->inputs['alumni_graduation'];
        $form = array(
            'user_id'  => $this->clean($user_id),
            'alumni_fname'  => $this->clean($alumni_fname),
            'alumni_mname'  => $this->clean($alumni_mname),
            'alumni_lname'  => $this->clean($alumni_lname),
            'alumni_contact'  => $this->clean($alumni_contact),
            'alumni_address'  => $this->clean($alumni_address),
            'course_id'  => $this->clean($course_id),
            'work_employer'  => $this->clean($work_employer),
            'work_place'  => $this->clean($work_place),
            'work_designation'  => $this->clean($work_designation),
            'alumni_graduation'  => $this->clean($alumni_graduation),
        );
        return $this->insert($this->table, $form);
    }

    public static function name($primary_id)
    {
        $self = new self;
        $result = $self->select($self->table, $self->name, "$self->pk = '$primary_id'");
        if($result->num_rows < 1)
            return '';
        $row = $result->fetch_assoc();
        return $row[$self->name];
    }
}
