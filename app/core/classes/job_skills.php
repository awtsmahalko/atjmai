<?php
class JobSkills extends Connection
{
    private $table = 'tbl_job_skills';
    public $pk = 'job_skill_id';

    public function add($job_id)
    {
        $skills = $this->post('skills');
        foreach ($skills as $skill_id) {
            $this->insert($this->table, [
                'job_id'    => $job_id,
                'skill_id'  => $skill_id,
            ]);
        }
        return 1;
    }

    public function data($job_id)
    {
        $response['skills'] = array();
        $result = $this->select($this->table, "*", "job_id = '$job_id'");
        while ($row = $result->fetch_assoc()) {
            $row['skill_name'] = Skills::name($row['skill_id']);
            array_push($response['skills'], $row);
        }
        return json_encode($response);
    }

    public function destroyByJob($job_id){
        $this->delete($this->table, "job_id = '$job_id'");
    }

    public static function dataOf($primary_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table, $field, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }
}