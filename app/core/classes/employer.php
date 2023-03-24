<?php
class Employers extends Connection
{
    private $table = 'tbl_employers';
    public $pk = 'employer_id';
    public $session = array();

    public $inputs = array();
    public $old = array();

    public function add($user_id)
    {
        return $this->insert($this->table, [
            'user_id'           => $user_id,
            'employer_name'     => $this->post('employer_name'),
            'employer_contact'  => $this->post('employer_contact'),
            'employer_address'  => $this->post('employer_address'),
            'employer_industry' => $this->post('employer_industry'),
        ]);
    }

    public static function dataOf($primary_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table, $field, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }
}
