<?php
class AlumniWorkAchievements extends Connection
{
    private $table = 'tbl_work_achievements';
    public $pk = 'achievements_id';

    public function add($work_exp_id)
    {
        $achievements = json_decode($this->post('achievements', false), true);
        foreach ($achievements as $row) {
            $this->insert($this->table, [
                'work_exp_id' => $work_exp_id,
                'achievement_name' => $this->clean($row['tag']),
            ]);
        }
    }

    public function edit($work_exp_id)
    {
        $this->to_delete($work_exp_id);

        $achievements = json_decode($this->post('achievements', false), true);
        foreach ($achievements as $row) {
            if($row['id'] > 0){
                $this->update($this->table, [
                    'achievement_name' => $this->clean($row['tag']),
                    'to_delete' => 0
                ],"$this->pk = '$row[id]'");
            }else{
                $this->insert($this->table, [
                    'work_exp_id' => $work_exp_id,
                    'achievement_name' => $this->clean($row['tag']),
                ]);
            }
        }
        $this->destroy_to_delete($work_exp_id);
    }

    public function data_by_work($work_exp_id)
    {
        $response = array();
        $result = $this->select($this->table, "*", "work_exp_id = '$work_exp_id'");
        while ($row = $result->fetch_assoc()) {
            array_push($response, $row);
        }
        return $response;
    }

    public function destroy_by_work($work_exp_id)
    {
        return $this->delete($this->table,"work_exp_id = '$work_exp_id'");
    }

    public function destroy_to_delete($work_exp_id)
    {
        return $this->delete($this->table,"work_exp_id = '$work_exp_id' AND to_delete = '1'");
    }

    public function to_delete($work_exp_id,$to_delete = 1)
    {
        return $this->update($this->table,['to_delete' => $to_delete], "work_exp_id = '$work_exp_id'");
    }

}
