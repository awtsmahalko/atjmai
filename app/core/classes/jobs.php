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

        try {
            $this->check();
            $this->begin_transaction();

            $job_id = $this->insert($this->table, [
                'employer_id'       => $Employer->id(),
                'job_title'         => $this->post('job_title'),
                'job_description'   => $this->post('job_description'),
                'job_type_id'       => $this->post('job_type_id'),
                'job_sched_id'      => $this->post('job_sched_id'),
                'hire_needed'       => $this->post('hire_needed'),
                'salary_details'    => $this->post('salary_details'),
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
        while ($row = $result->fetch_assoc()) {
            $row['job_type_name'] = JobTypes::name($row['job_type_id']);
            $row['employers'] = Employers::dataOf($row['employer_id']);
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
        $id = $Alumni->id();
        $response['jobs'] = array();
        $result = $this->select($this->table, "*", "alumni = '$id'");
        while ($row = $result->fetch_assoc()) {
            // $row['job_type_name'] = JobTypes::name($row['job_type_id']);
            // $row['employers'] = Employers::dataOf($row['employer_id']);
            // $row['skills'] = json_decode($JobSkills->data($row['job_id']))->skills;
            // $row['candidates'] = json_decode($JobCandidates->data($row['job_id']))->candidates;
            array_push($response['jobs'], $row);
        }
        return json_encode($response);
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

    public static function dataOf($primary_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table, $field, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }
}
