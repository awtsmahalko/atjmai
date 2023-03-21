<?php
class Users extends Connection
{
    private $table = 'tbl_users';
    public $pk = 'user_id';
    public $name = 'user_fname';
    public $session = array();

    public $inputs = array();
    public $files = array();

    public function profile()
    {
        return json_encode([
            'fullname' => $_SESSION['user']['fullname'],
            'email' => $_SESSION['user']['user_email'],
        ]);
    }

    public static function name($primary_id)
    {
        $self = new self;
        $result = $self->select($self->table, $self->name, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row[$self->name];
    }
    public static function img($primary_id)
    {
        $self = new self;
        $result = $self->select($self->table, 'user_img', "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row['user_img'];
    }

    public static function dataOf($primary_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table, $field, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }
}
