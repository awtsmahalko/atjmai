<?php
class JobCandidates extends Connection
{
    private $table = 'tbl_job_candidates';
    public $pk = 'candidate_id';
    public $name = 'alumni_id';

    public function data($job_id)
    {
        $response['candidates'] = array();
        $result = $this->select($this->table, '*', "job_id = '$job_id'");
        while ($row = $result->fetch_assoc()) {
            $alumni_id = $row['alumni_id'];
            $row_data = Alumni::dataOf($alumni_id);

            $row['user_img'] = Users::img($row_data['user_id']);
            $row['name'] = $row_data['alumni_lname'] . ", " . $row_data['alumni_fname'];
            $row['job_title'] = AlumniJobPreferences::AlumniJobTitle($alumni_id);
            array_push($response['candidates'], $row);
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
