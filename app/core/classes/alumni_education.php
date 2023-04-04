<?php
class AlumniEducations extends Connection
{
    private $table = 'tbl_alumni_educations';
    public $pk = 'educ_id';
    public $session = array();

    public $inputs = array();
    public $old = array();

    public function add()
    {
        $Alumni = new Alumni();
        $alumni_id = $Alumni->id();
        try {
            $this->check();
            $this->begin_transaction();

            $educ_degree = $this->post('educ_degree');
            $educ_school = $this->post('educ_school');
            $year_enrolled = $this->post('year_enrolled');
            $year_graduated = $this->post('year_graduated');
            $honor_received = $this->post('honor_received');

            $ret = $this->insert($this->table, [
                'alumni_id' => $alumni_id,
                'educ_degree' => $educ_degree,
                'educ_school' => $educ_school,
                'year_enrolled' => $year_enrolled,
                'year_graduated' => $year_graduated,
                'honor_received' => $honor_received,
            ]);
            if ($ret != 1)
                throw new Exception($ret);
            $this->commit();
            return 1;
        } catch (Exception $e) {
            $this->rollback();
            return $e->getMessage();
        }
    }

    public function destroy()
    {
        $educ_id = $this->post('educ_id');
        return $this->delete($this->table,"educ_id = '$educ_id'");
    }

    public function data()
    {
        $Alumni = new Alumni();
        $alumni_id = $Alumni->id();

        $response['alumni'] = array();
        $result = $this->select($this->table, "*", "alumni_id = '$alumni_id'");
        while ($row = $result->fetch_assoc()) {
            array_push($response['alumni'], $row);
        }
        return json_encode($response);
    }

    public static function dataOf($primary_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table, $field, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }
}
