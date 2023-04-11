<?php
class JobSchedules extends Connection
{
    private $table = 'tbl_job_schedules';
    public $pk = 'job_sched_id';
    public $name = 'sched_name';
    public $session = array();

    public $inputs = array();
    public $old = array();

    public static function options($values = 0)
    {
        $self = new self;

        $option = '';

        $result = $self->select($self->table, '*', "job_sched_id > 0 ORDER BY sched_name ASC");
        while ($row = $result->fetch_assoc()) {
            $selected = $row['job_sched_id'] == $values ? "selected" : "";
            $option .= "<option value='$row[job_sched_id]' $selected>$row[sched_name]</option>";
        }
        return $option;
    }

    public static function dataOf($primary_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table, $field, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }
}
