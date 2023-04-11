<?php
class Jobs extends Connection
{
    private $table = 'tbl_jobs';
    public $pk = 'job_id';
    public $session = array();

    public $inputs = array();
    public $old = array();

    public function add()
    {
        $Employer = new Employers();
        if (!Components::verify_csrf())
            return -1;

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

            $this->commit();
            return 1;
        } catch (Exception $e) {
            $this->rollback();
            return $e->getMessage();
        }
    }

    public function update_profile()
    {
        if (!Components::verify_csrf())
            return -1;

        try {
            $this->check();
            $this->begin_transaction();

            $update_success = $this->update($this->table, [
                'employer_name'         => $this->post('employer_name'),
                'employer_foundation'   => $this->post('employer_foundation'),
                'employer_address'      => $this->post('employer_address'),
                'employer_contact'      => $this->post('employer_contact'),
                'employer_address'      => $this->post('employer_address'),
            ], "user_id = '" . $_SESSION['user']['id'] . "'");

            if ($update_success != 1)
                throw new Exception($update_success);

            $this->commit();
            return 1;
        } catch (Exception $e) {
            $this->rollback();
            return $e->getMessage();
        }
    }

    public function profile()
    {
        if (!isset($_SESSION['user']['id']))
            return json_encode(['user_id' => 0]);

        $user_id = $_SESSION['user']['id'];
        $result = $this->select($this->table, "*", "user_id = '$user_id'");
        $row = $result->fetch_assoc();
        return json_encode($row);
    }

    public static function dataOf($primary_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table, $field, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }
}
