<?php
class Industries extends Connection
{
    private $table = 'tbl_industries';
    public $pk = 'industry_id';
    public $name = 'industry_name';
    public $session = array();

    public $inputs = array();
    public $old = array();

    public static function options($values = 0)
    {
        $self = new self;

        $option = '';

        $result = $self->select($self->table, '*', "industry_id > 0 ORDER BY industry_name ASC");
        while ($row = $result->fetch_assoc()) {
            $selected = $row['industry_id'] == $values ? "selected" : "";
            $option .= "<option value='$row[industry_id]' $selected>$row[industry_name]</option>";
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
