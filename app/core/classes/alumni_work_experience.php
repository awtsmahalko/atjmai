<?php
class AlumniWorkExperiences extends Connection
{
    private $table = 'tbl_work_experiences';
    public $pk = 'work_exp_id';
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

            $company_name = $this->post('company_name');
            $job_title = $this->post('job_title');
            $date_hired = $this->post('date_hired');
            $date_resigned = $this->post('date_resigned');
            $currently_worked = $this->post('currently_worked') == 'on' ? 1 : 0;

            $ret = $this->insert($this->table, [
                'alumni_id' => $alumni_id,
                'company_name' => $company_name,
                'job_title' => $job_title,
                'date_hired' => $date_hired,
                'date_resigned' => $date_resigned,
                'currently_worked' => $currently_worked,
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
    public function add_from_register($alumni_id)
    {
        $company_name = $this->post('company_name');
        $job_title = $this->post('job_title');
        $date_hired = $this->post('date_hired');

        $ret = $this->insert($this->table, [
            'alumni_id' => $alumni_id,
            'company_name' => $company_name,
            'job_title' => $job_title,
            'date_hired' => $date_hired,
            'currently_worked' => 1,
        ]);
    }
    public function edit()
    {
        try {
            $this->check();
            $this->begin_transaction();

            $work_exp_id = $this->post('work_exp_id');
            $company_name = $this->post('company_name');
            $job_title = $this->post('job_title');
            $date_hired = $this->post('date_hired');
            $date_resigned = $this->post('date_resigned');
            $currently_worked = $this->post('currently_worked') == 'on' ? 1 : 0;

            $ret = $this->update($this->table, [
                'company_name' => $company_name,
                'job_title' => $job_title,
                'date_hired' => $date_hired,
                'date_resigned' => $date_resigned,
                'currently_worked' => $currently_worked,
            ],"work_exp_id = '$work_exp_id'");
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
        $id = $this->post($this->pk);
        return $this->delete($this->table,"$this->pk = '$id'");
    }

    public function data()
    {
        $Alumni = new Alumni();
        $alumni_id = $Alumni->id();

        $response['alumni'] = array();
        $result = $this->select($this->table, "*", "alumni_id = '$alumni_id'");
        while ($row = $result->fetch_assoc()) {
            $year_end = $row['currently_worked'] == 1 ? "Current" : date("M Y",strtotime($row['date_resigned']));
            $row['year_span'] = date("M Y",strtotime($row['date_hired'])) . " - " . $year_end;
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
