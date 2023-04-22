<?php
class Courses extends Connection
{
    private $table = 'tbl_courses';
    public $pk = 'course_id';
    public $name = 'course_name';

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
        return $this->insert($this->table, [$this->name  => $this->post($this->name), 'college_id' => $this->post('college_id')]);
    }

    public function edit()
    {
        return $this->update($this->table, [$this->name  => $this->post($this->name), 'college_id' => $this->post('college_id')], "$this->pk = '" . $this->post($this->pk) . "'");
    }

    public function data($inject = "")
    {
        $response['courses'] = array();
        $result = $this->select($this->table, "*", $inject);
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            $row['count'] = $count++;
            $row['colleges'] = Colleges::dataOf($row['college_id']);
            array_push($response['courses'], $row);
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
        return $this->delete($this->table, "$this->pk = '$id'");
    }
}
