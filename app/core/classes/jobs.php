<?php
class Jobs extends Connection
{
    private $table = 'tbl_jobs';
    public $pk = 'job_id';

    public function add()
    {
        if (!Components::verify_csrf())
            return -1;

        $Employer = new Employers();
        $employer_id = $Employer->id();

        try {
            $this->check();
            $this->begin_transaction();

            $job_id = $this->insert($this->table, [
                'employer_id'       => $employer_id,
                'job_title'         => $this->post('job_title'),
                'job_description'   => $this->post('job_description'),
                'job_type_id'       => $this->post('job_type_id'),
                'job_sched_id'      => $this->post('job_sched_id'),
                'hire_needed'       => $this->post('hire_needed'),
                'salary_min'        => $this->post('salary_min'),
                'salary_max'        => $this->post('salary_max'),
                'salary_details'    => $this->post('salary_min') . " - " . $this->post('salary_max'),
                'courses'           => implode(",",$this->post('courses')),
                'industry_id'       => Employers::dataOf($employer_id,'industry_id'),
            ], 'Y');

            if ($job_id < 1)
                throw new Exception($job_id);

            $JobSkillls = new JobSkills();
            $res = $JobSkillls->add($job_id);
            if ($job_id < 1)
                throw new Exception($res);
            $this->commit();
            return 1;
        } catch (Exception $e) {
            $this->rollback();
            return $e->getMessage();
        }
    }

    public function data_employer()
    {
        $JobSkills = new JobSkills;
        $Employer = new Employers();
        $JobCandidates = new JobCandidates();
        $id = $Employer->id();
        $response['jobs'] = array();
        $result = $this->select($this->table, "*", "employer_id = '$id'");
        while ($row = $result->fetch_assoc()){
            $row['job_type_name'] = JobTypes::name($row['job_type_id']);
            $row['employers'] = Employers::dataOf($row['employer_id']);
            $row['user_img'] = Users::img($row['employers']['user_id']);
            $row['skills'] = json_decode($JobSkills->data($row['job_id']))->skills;
            $row['candidates'] = json_decode($JobCandidates->data($row['job_id']))->candidates;
            array_push($response['jobs'], $row);
        }
        return json_encode($response);
    }

    public function data_alumni()
    {
        $JobSkills = new JobSkills;
        $Alumni = new Alumni();
        $JobCandidates = new JobCandidates();
        $alumni_id = $Alumni->id();
        $response['jobs'] = array();
        $result = $this->select('tbl_job_candidates AS c,tbl_jobs AS j', "*", "c.job_id = j.job_id AND c.alumni_id = '$alumni_id'");
        while ($row = $result->fetch_assoc()) {
            $row['job_type_name'] = JobTypes::name($row['job_type_id']);
            $row['employers'] = Employers::dataOf($row['employer_id']);
            $row['user_img'] = Users::img($row['employers']['user_id']);
            $row['skills'] = json_decode($JobSkills->data($row['job_id']))->skills;
            $row['job_status'] = $JobCandidates->view_status($row['job_id'], $alumni_id);
            $row['qualifications'] = $this->qualifications($row['courses']);
            array_push($response['jobs'], $row);
        }
        return json_encode($response);
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

    public static function countPosted($employer_id = 0)
    {
        $self = new self;
        $inject = $employer_id > 0 ? "employer_id = '$employer_id'" : "";
        $result = $self->select($self->table, "COUNT(job_id) AS count", $inject);
        if ($result->num_rows < 1)
            return 0;
        $row = $result->fetch_assoc();
        return $row['count'];
    }

    public function recent_jobs(){
        $result = $this->select($this->table, "*", "job_id > 0 ORDER BY created_at DESC LIMIT 10");
        $jobs = [];
        while ($row = $result->fetch_assoc()) {
            $employer_data = Employers::dataOf($row['employer_id']);
            $employer_data['users'] = Users::dataOf($employer_data['user_id']);
            $row['employers'] = $employer_data;
            array_push($jobs, $row);
        }
        return $jobs;
    }

    public static function dataOf($primary_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table, $field, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }

    public function destroy()
    {
        $id = $this->post($this->pk);

        $JobSkillls = new JobSkills();
        $JobSkillls->destroyByJob($id);

        return $this->delete($this->table, "$this->pk = '$id'");
    }
}
