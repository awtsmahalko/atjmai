<?php
class Employers extends Connection
{
    private $table = 'tbl_employers';
    public $pk = 'employer_id';
    public $session = array();

    public $inputs = array();
    public $old = array();

    public function add($user_id)
    {
        return $this->insert($this->table, [
            'user_id'           => $user_id,
            'employer_name'     => $this->post('employer_name'),
            'employer_contact'  => $this->post('employer_contact'),
            'employer_address'  => $this->post('employer_address'),
            'employer_industry' => $this->post('employer_industry'),
        ]);
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
