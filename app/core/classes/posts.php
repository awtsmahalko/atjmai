<?php
class Posts extends Connection
{
    private $table = 'tbl_posts';
    public $pk = 'post_id';

    public function add()
    {
        try {
            $this->check();
            $this->begin_transaction();

            $res = $this->insert($this->table, [
                'post_type'         => $this->post('post_type'),
                'post_message'      => $this->post('post_message'),
                'college_id'        => $this->post('college_id'),
                'show_to_employer'  => $this->post('show_to_employer'),
                'user_id'           => $_SESSION['user']['id'],
            ]);

            if ($res < 1)
                throw new Exception($res);
            $this->commit();
            return 1;
        } catch (Exception $e) {
            $this->rollback();
            return $e->getMessage();
        }
    }

    public function timeline()
    {
        $response['posts'] = array();
        $result = $this->select($this->table);
        while ($row = $result->fetch_assoc()) {
            $row['users'] = Users::dataOf($row['user_id']);
            $row['time_ago'] = $this->time_ago($row['created_at']);
            $row['college_name'] = $row['college_id'] > 0 ? Colleges::name($row['college_id']) : 'All Colleges';
            array_push($response['posts'], $row);
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
