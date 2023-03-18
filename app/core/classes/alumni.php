<?php
class Alumni extends Connection
{
    private $table = 'tbl_alumni';
    public $pk = 'alumni_id';
    public $session = array();

    public $inputs = array();
    public $old = array();

    public function add()
    {
        return $this->insert($this->table, [
            'user_id'           => $this->post('user_id'),
            'alumni_fname'      => $this->post('user_fname'),
            'alumni_mname'      => $this->post('user_mname'),
            'alumni_lname'      => $this->post('user_lname'),
            'alumni_contact'    => $this->post('alumni_contact'),
            'alumni_address'    => $this->post('alumni_address'),
            'course_id'         => $this->post('course_id'),
            'work_employer'     => $this->post('work_employer'),
            'work_place'        => $this->post('work_place'),
            'work_designation'  => $this->post('work_designation'),
            'alumni_graduation' => $this->post('alumni_graduation'),
        ]);
    }
}
