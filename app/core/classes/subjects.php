<?php
class Subjects extends Connection
{
    private $table = 'tbl_subjects';
    public $pk = 'subject_id';
    public $name = 'subject_name';
    public $session = array();

    public $inputs = array();
    public $old = array();


    public static function options($values = [])
    {
        $self = new self;

        $option = '';

        $result = $self->select($self->table, '*', "subject_id > 0 ORDER BY subject_name ASC");
        while ($row = $result->fetch_assoc()){
            $selected = in_array($row['subject_id'], $values) ? "selected":"";
            $option .= "<option value='$row[subject_id]' $selected>$row[subject_name]</option>";
        }
        return $option;
    }

    public function add()
    {
        // $subjects = [
        //     'GEC 1', 'GEC 2', 'GEC 3', 'GEC 4', 'GEC 5', 'GEC 6', 'GEC 7', 'GEC 8', 'GEC 9',
        //     'CCIT 01', 'CCIT 02', 'CCIT 03', 'CCIT 06', 'CCIT 05', 'CCIT 06',
        //     'PCIT 01', 'PCIT 02', 'PCIT 03', 'PCIT 04', 'PCIT 05', 'PCIT 06', 'PCIT 07', 'PCIT 08', 'PCIT 09', 'PCIT 10', 'PCIT 11', 'PCIT 12', 'PCIT 13', 'PCIT 14', 'PCIT 15', 'PCIT 16',
        // ];

        // foreach ($subjects as $subject_name) {
        //     $form = array(
        //         'subject_name'  => $this->clean($subject_name),
        //     );
        //     $this->insert($this->table, $form);
        // }
        $subject_name = $this->inputs['subject_name'];
        $form = array(
            'subject_name'  => $this->clean($subject_name),
        );
        $this->insert($this->table, $form);
    }

    public static function name($primary_id)
    {
        $self = new self;
        $result = $self->select($self->table, $self->name, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row[$self->name];
    }


    public static function imploder($subjects)
    {
        if($subjects == '')
            return '';

        $self = new self;
        $result = $self->select($self->table, $self->name, "subject_id IN($subjects)");
        $response = [];
        while ($row = $result->fetch_assoc()) {
            $response[] = $row['subject_name'];
        }
        return implode(",",$response);
    }
}
