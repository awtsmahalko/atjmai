<?php
class Courses extends Connection
{
    private $table = 'tbl_courses';
    public $pk = 'course_id';
    public $name = 'course_name';
    public $session = array();

    public $inputs = array();
    public $old = array();

    public static function options($values = 0)
    {
        $self = new self;

        $option = '';

        $result = $self->select($self->table, '*', "course_id > 0 ORDER BY course_name ASC");
        while ($row = $result->fetch_assoc()){
            $selected = $row['course_id'] == $values ? "selected":"";
            $option .= "<option value='$row[course_id]' $selected>$row[course_name]</option>";
        }
        return $option;
    }

    public function add()
    {
        // $courses = [
        //     'BSHM', 'BSAB', 'BSIT', 'BSCRIM', 'BSED Major in Mathematics', 'BSED Major in Biological Science', 'BSED Major in General Education'
        // ];

        // foreach ($courses as $course_name) {
        //     $form = array(
        //         'course_name'  => $this->clean($course_name),
        //     );
        //     $this->insert($this->table, $form);
        // }
        $course_name = $this->inputs['course_name'];
        $form = array(
            'course_name'  => $this->clean($course_name),
        );
        $this->insert($this->table, $form);
    }

    public static function name($primary_id)
    {
        $self = new self;
        $result = $self->select($self->table, $self->name, "$self->pk = '$primary_id'");
        if($result->num_rows < 1)
            return '';
        $row = $result->fetch_assoc();
        return $row[$self->name];
    }
}
