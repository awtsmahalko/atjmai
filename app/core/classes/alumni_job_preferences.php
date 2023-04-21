<?php
class AlumniJobPreferences extends Connection
{
    private $table = 'tbl_alumni_job_preferences';
    public $pk = 'preference_id';
    public $session = array();

    public $inputs = array();
    public $old = array();

    public function add_from_register($alumni_id)
    {
        $ret = $this->insert($this->table, [
            'alumni_id' => $alumni_id,
            'job_title' => $this->post('job_title'),
        ]);
    }

    public function update_preferences()
    {
        $Alumni = new Alumni();
        $alumni_id = $Alumni->id();
        try {
            $this->check();
            $this->begin_transaction();

            $form = [
                'alumni_id'         => $alumni_id,
                'job_title'         => $this->post('job_title'),
                'job_description'   => $this->post('job_description'),
                'job_type_id'       => $this->post('job_type_id'),
                'job_sched_id'      => $this->post('job_sched_id'),
                'salary_details'    => $this->post('salary_details'),
            ];

            $preference_id = $this->id($alumni_id);
            $ret = $preference_id > 0 ? $this->update($this->table, $form, "preference_id = '$preference_id'") : $this->insert($this->table, $form);
            if ($ret != 1)
                throw new Exception($ret);
            $this->commit();
            return 1;
        } catch (Exception $e) {
            $this->rollback();
            return $e->getMessage();
        }
    }

    public function data()
    {
        if (!isset($_SESSION['user']['id']))
            return json_encode(['user_id' => 0]);

        $Alumni = new Alumni();
        $alumni_id = $Alumni->id();

        $result = $this->select($this->table, "*", "alumni_id = '$alumni_id'");
        if ($result->num_rows < 1)
            return json_encode([
                'job_title' => '',
                'job_description' => '',
                'job_type_id' => 0,
                'job_sched_id' => 0,
                'salary_details' => '',
            ]);

        $row = $result->fetch_assoc();
        $row['alumni_id'] = $alumni_id;
        return json_encode($row);
    }

    public function id($alumni_id)
    {
        $result = $this->select($this->table, "preference_id", "alumni_id = '$alumni_id'");
        $row = $result->fetch_assoc();
        return $row['preference_id'];
    }

    public static function AlumniJobTitle($alumni_id)
    {
        $self = new self;
        $result = $self->select($self->table, "job_title", "alumni_id = '$alumni_id'");
        $row = $result->fetch_assoc();
        return $row['job_title'];
    }

    public static function dataOfByAlumniId($alumni_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table, $field, "alumni_id = '$alumni_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }

    public static function dataOf($primary_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table, $field, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }
}
