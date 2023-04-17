<?php
class AlumniJobs extends Connection
{
    private $tbl_alumni = 'tbl_alumni';
    private $tbl_jobs = 'tbl_jobs';

    public function best_job()
    {
        if (!isset($_SESSION['user']['id']))
            return json_encode(['user_id' => 0]);

        $Alumni = new Alumni();
        $alumni_id = $Alumni->id();

        $JobSkills = new JobSkills;

        $count = 1;
        $response['jobs'] = array();
        $result = $this->select($this->tbl_jobs, "*", "job_id > 0");
        while ($row = $result->fetch_assoc()) {
            $row['count'] = $count++;
            $row['employers'] = Employers::dataOf($row['employer_id']);
            $row['skills'] = json_decode($JobSkills->data($row['job_id']))->skills;
            array_push($response['jobs'], $row);
        }
        return json_encode($response);
    }

}
