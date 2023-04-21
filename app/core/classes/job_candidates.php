<?php
class JobCandidates extends Connection
{
    private $table = 'tbl_job_candidates';
    public $pk = 'candidate_id';
    public $name = 'alumni_id';

    // ----- STATUS ----
    // -1 = Apply
    // 1  = Accepted

    public function apply()
    {
        $Alumni = new Alumni();
        $alumni_id = $Alumni->id();
        $job_id = $this->post('job_id');
        $result = $this->select($this->table, '*', "job_id = '$job_id' AND alumni_id = '$alumni_id'");
        if ($result->num_rows > 0)
            return 2;
        return $this->insert($this->table, [
            'job_id'        => $job_id,
            'employer_id'   => Jobs::dataOf($job_id, 'employer_id'),
            'alumni_id'     => $alumni_id,
            'candidate_status' => -1,
        ]);
    }

    public function hire()
    {
        $job_id = $this->post('job_id');
        $alumni_id = $this->post('alumni_id');

        return $this->update($this->table, [
            'candidate_status' => 1,
        ], "job_id = '$job_id' AND alumni_id = '$alumni_id'");
    }

    public function view_status($job_id, $alumni_id)
    {
        $result = $this->select($this->table, 'candidate_status', "job_id = '$job_id' AND alumni_id = '$alumni_id'");
        if ($result->num_rows < 1)
            return 0;

        $row = $result->fetch_assoc();
        return (int) $row['candidate_status'];
    }
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

    public function active_candidates(){
        
    }

    public static function dataOf($primary_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table, $field, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }
}
