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
        $alumni_preference = $this->preference();

        $JobSkills = new JobSkills;
        $JobCandidates = new JobCandidates();

        $count = 1;
        $response['jobs'] = array();
        $result = $this->select($this->tbl_jobs, "*", $this->filter());
        $job_scores = [];
        while ($row = $result->fetch_assoc()) {
            $qualifications = $this->qualifications($row['courses']);
            $skills = json_decode($JobSkills->data($row['job_id']))->skills;
            $job_preference = $this->job_preference($row,$qualifications,$skills);

            $score = similar_text( strtolower($job_preference), strtolower($alumni_preference), $percent);
            // $job_scores[$row['job_id']] =  round($percent, 2);

            $employer_data = Employers::dataOf($row['employer_id']);
            $employer_data['users'] = Users::dataOf($employer_data['user_id']);
            $row['count'] = $count++;
            $row['employers'] = $employer_data;
            $row['skills'] = $skills;
            $row['qualifications'] = $qualifications;
            $row['percentage'] = round($percent, 2);
            $row['job_status'] = $JobCandidates->view_status($row['job_id'], $alumni_id);
            array_push($response['jobs'], $row);
        }

        usort($response['jobs'], function($a, $b) {
            return $b['percentage'] - $a['percentage'];
        });
        return json_encode($response);
    }

    public function filter(){
        $alumni_id = $this->post('alumni_id');
        $course_id = Alumni::dataOf($alumni_id,'course_id');
        $salary_min = $this->post('salary_min');
        $job_type_id = $this->post('job_type_id');
        $job_sched_id = $this->post('job_sched_id');

        return "FIND_IN_SET($course_id,courses) AND (salary_min >= $salary_min OR job_type_id IN(0,$job_type_id) OR job_sched_id IN(0,$job_sched_id))";
    }

    public function qualifications($courses){
        $courses = explode(",",$courses);
        $course = [];
        foreach($courses as $course_id){
            $course[] = array(
                'course_id' => $course_id,
                'qualification_name' => Courses::name($course_id),
            );
        }
        return $course;
    }

    public function preference()
    {
        $course_id = Alumni::dataOf($this->post('alumni_id'),'course_id');
        $job_title = $this->post('job_title');
        $job_description = $this->post('job_description');
        $skills = $this->post('skills');

        $alumni_preference = "Job Title: ". $job_title ."\n";
        $alumni_preference .= "Job Summary: ". $job_description ."\n";
        $alumni_preference .= "Skills: ";
        foreach ($skills as $skill_id) {
            $alumni_preference .= Skills::name($skill_id) . ",";
        }
        $alumni_preference .= "\n";
        // $alumni_preference .= "Qualifications: " . Courses::name($course_id);
        return $alumni_preference;
    }

    public function job_preference($row,$qualifications,$skills)
    {
        $alumni_preference = "Job Title: ". $row['job_title'] ."\n";
        $alumni_preference .= "Job Summary: ". $row['job_description'] ."\n";
        $alumni_preference .= "Skills: ";
        foreach ($skills as $skill) {
            $alumni_preference .= $skill->skill_name . ",";
        }
        $alumni_preference .= "\n";

        // $alumni_preference .= "Qualifications: ";
        // foreach ($qualifications as $qualification) {
        //     $alumni_preference .= $qualifications['qualification_name'] . ",";
        // }
        $alumni_preference .= "\n";
        return $alumni_preference;
    }
}
