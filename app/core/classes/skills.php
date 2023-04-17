<?php
class Skills extends Connection
{
    private $table = 'tbl_skills';
    public $pk = 'skill_id';
    public $name = 'skill_name';

    public static function options($values = [])
    {
        $self = new self;

        $option = '';

        $result = $self->select($self->table, '*', "$self->pk > 0 ORDER BY $self->name ASC");
        while ($row = $result->fetch_assoc()) {
            $selected = in_array($row[$self->pk],$values) ? "selected" : "";
            $option .= "<option value='".$row[$self->pk]."' $selected>".$row[$self->name]."</option>";
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

    public function data()
    {
        $response['courses'] = array();
        $result = $this->select($this->table);
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
