<?php
class AlumniJobs extends Connection
{
    private $tbl_alumni = 'tbl_alumni';
    private $tbl_jobs = 'tbl_jobs';

    public function best_job()
    {
        if (!isset($_SESSION['user']['id']))
            return json_encode(['user_id' => 0]);


        $alumni_id = $this->post('alumni_id');
        $salary_details = $this->post('salary_details');
        $job_type_id = $this->post('job_type_id');

        $inject = "";
        $inject .= $job_type_id > 0 ? "AND job_type_id IN(0,$job_type_id)" : "";

        $alumni_preference = $this->preference();

        $JobSkills = new JobSkills;

        $count = 1;
        $response['jobs'] = array();
        $result = $this->select($this->tbl_jobs, "*", "job_id > 0 $inject");
        $job_scores = [];
        while ($row = $result->fetch_assoc()) {
            $job_preference = $row['job_title'] . ": " . $row['job_description'];

            $score = similar_text(strtolower($alumni_preference), strtolower($job_preference), $percent);
            // $job_scores[$row['job_id']] =  round($percent, 2);

            $employer_data = Employers::dataOf($row['employer_id']);
            $employer_data['users'] = Users::dataOf($employer_data['user_id']);
            $row['count'] = $count++;
            $row['employers'] = $employer_data;
            $row['skills'] = json_decode($JobSkills->data($row['job_id']))->skills;
            $row['percentage'] = round($percent, 2);
            array_push($response['jobs'], $row);
        }
        return json_encode($response);
    }

    public function preference()
    {
        $job_title = $this->post('job_title');
        $job_description = $this->post('job_description');
        $skills = $this->post('skills');

        $alumni_preference = $job_title . ": ";
        foreach ($skills as $skill_id) {
            $alumni_preference .= Skills::name($skill_id) . ",";
        }
        $alumni_preference .= $job_description;
        return $alumni_preference;
    }
}
