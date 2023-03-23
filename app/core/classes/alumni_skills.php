<?php
class AlumniSkills extends Connection
{
    private $table = 'tbl_alumni_skills';
    public $pk = 'as_id';
    public $session = array();

    public $inputs = array();
    public $old = array();

    public function edit()
    {
        if(!Components::verify_csrf())
            return -1;

        $Alumni = new Alumni();
        $alumni_id = $Alumni->id();
        try{
            $this->check();
            $this->begin_transaction();

            $skills = json_decode($this->post('skills',false),true);
            foreach ($skills as $skillRow) {
                $update_success = $this->add($alumni_id,$skillRow['skill_id'],$skillRow['rate']);
                if($update_success != 1)
                    throw new Exception($update_success);
            }
            $this->commit();
            return 1;
        }catch(Exception $e){
            $this->rollback();
            return $e->getMessage();
        }

    }

    public function add($alumni_id,$skill_id,$rate)
    {
        $result = $this->select($this->table, "*","skill_id = '$skill_id' AND alumni_id = '$alumni_id'");
        if($result->num_rows > 0){
            return $this->update($this->table,['skill_rate' => $rate],"skill_id = '$skill_id' AND alumni_id = '$alumni_id'");
        }

        if($rate < 1)
            return 1;

        return $this->insert($this->table,[
            'alumni_id' => $alumni_id,
            'skill_id' => $skill_id,
            'skill_rate' => $rate,
        ]);
    }

    public function data()
    {
        $response['category'] = array();
        $result = $this->select('tbl_skills_category', "*");
        while($row = $result->fetch_assoc()){
            $categories = array(
                'id'        => $row['sc_id'],
                'name'      => $row['sc_name'],
                'skills'    => $this->category($row['sc_id']),
            );
            array_push($response['category'],$categories);
        }
        return json_encode($response);
    }

    public function category($sc_id)
    {
        $Alumni = new Alumni();
        $alumni_id = $Alumni->id();
        $skills = [];
        $result = $this->select('tbl_skills', "*","sc_id = '$sc_id'");
        while($row = $result->fetch_assoc()){
            $skills[] = array(
                'id'    => (int) $row['skill_id'],
                'name'  => $row['skill_name'],
                'rate'  => $this->rate($alumni_id,$row['skill_id'])
            );
        }
        return $skills;
    }

    public function rate($alumni_id,$skill_id)
    {
        $result = $this->select("tbl_alumni_skills", "skill_rate", "alumni_id = '$alumni_id' AND skill_id = '$skill_id'");
        $row = $result->fetch_assoc();
        return (int) $row['skill_rate'];
    }

    public static function dataOf($primary_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table, $field, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }
}
