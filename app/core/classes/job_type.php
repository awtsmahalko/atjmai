<?php
class JobTypes extends Connection
{
    private $table = 'tbl_job_types';
    public $pk = 'job_type_id';
    public $name = 'job_type_name';
    public $session = array();

    public $inputs = array();
    public $old = array();

    public static function options($values = 0)
    {
        $self = new self;

        $option = '';

        $result = $self->select($self->table, '*', "job_type_id > 0 ORDER BY job_type_name ASC");
        while ($row = $result->fetch_assoc()) {
            $selected = $row['job_type_id'] == $values ? "selected" : "";
            $option .= "<option value='$row[job_type_id]' $selected>$row[job_type_name]</option>";
        }
        return $option;
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
