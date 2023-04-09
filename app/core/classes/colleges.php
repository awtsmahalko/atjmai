<?php
class Colleges extends Connection
{
    private $table = 'tbl_colleges';
    public $pk = 'college_id';
    public $name = 'college_name';
    public $session = array();

    public $inputs = array();
    public $old = array();

    public static function options($values = 0)
    {
        $self = new self;

        $option = '';

        $result = $self->select($self->table, '*', "course_id > 0 ORDER BY course_name ASC");
        while ($row = $result->fetch_assoc()) {
            $selected = $row['course_id'] == $values ? "selected" : "";
            $option .= "<option value='$row[course_id]' $selected>$row[course_name]</option>";
        }
        return $option;
    }

    public function add()
    {
        return $this->insert($this->table, [$this->name  => $this->post($this->name)]);
    }

    public function edit()
    {
        return $this->update($this->table, [$this->name  => $this->post($this->name)],"$this->pk = '".$this->post($this->pk)."'");
    }

    public function data()
    {
        $response['colleges'] = array();
        $result = $this->select($this->table);
        while ($row = $result->fetch_assoc()) {
            array_push($response['colleges'], $row);
        }
        return json_encode($response);
    }

    public static function name($primary_id)
    {
        $self = new self;
        $result = $self->select($self->table, $self->name, "$self->pk = '$primary_id'");
        if ($result->num_rows < 1)
            return '';
        $row = $result->fetch_assoc();
        return $row[$self->name];
    }

    public function destroy()
    {
        $id = $this->post($this->pk);
        return $this->delete($this->table,"$this->pk = '$id'");
    }
}
