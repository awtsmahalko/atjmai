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
            // 'company_name'      => $this->post('company_name'),
            'company_contact'   => $this->post('company_contact'),
            'company_address'   => $this->post('company_address'),
            'industry_id'       => $this->post('industry_id'),
            // 'sub_industry_id'   => $this->post('sub_industry_id'),
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
                'industry_id'           => $this->post('industry_id'),
                'employer_name'         => $this->post('employer_name'),
                'company_address'       => $this->post('company_address'),
                'company_contact'       => $this->post('company_contact'),
                'company_address'       => $this->post('company_address'),
            ], "user_id = '" . $_SESSION['user']['id'] . "'");

            if ($update_success != 1)
                throw new Exception($update_success);
            $res = $this->update_profile_picture();
            $this->commit();
            return $res;
        } catch (Exception $e) {
            $this->rollback();
            return $e->getMessage();
        }
    }
    public function update_profile_picture()
    {

        $file = $this->files('file');

        // Get file properties
        $fileName = $file['name'];
        $fileTempName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        if ($fileName == '')
            return 1;

        // Get the file extension
        $fileExtension = strtolower(end(explode('.', $fileName)));

        // Allowed file extensions
        $allowedExtensions = array("jpeg", "jpg", "png");

        if (!in_array($fileExtension, $allowedExtensions))
            return 'NO-FILE-EXTENSION';

        if ($fileError != 0)
            return 'FILE-UPLOAD-ERROR';

        if ($fileSize >= 1000000)
            return 'FILE-TOO-BIG';

        $newFileName = uniqid('', true) . "." . $fileExtension;
        $fileDestination = __DIR__ . "../../../../assets/img/users/" . $newFileName;

        // Move the file to the destination
        move_uploaded_file($fileTempName, $fileDestination);

        $this->update("tbl_users", ['user_img' => $newFileName], "user_id = '" . $_SESSION['user']['id'] . "'");
        $_SESSION['user']['img'] = $newFileName;

        return "IMG-SUCCESS";
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

    public function data()
    {
        $response['employers'] = array();
        if ($this->post('industry_id') > 0) {
            $response['industry_name'] = Industries::dataOf($this->post('industry_id'), 'industry_name');
            $result = $this->select($this->table, '*', "industry_id = '" . $this->post('industry_id') . "'");
        } else {
            $result = $this->select($this->table);
        }
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            $row['count'] = $count++;
            array_push($response['employers'], $row);
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

    public static function count()
    {
        $self = new self;
        $result = $self->select($self->table, "COUNT(employer_id) AS count");
        $row = $result->fetch_assoc();
        return (int) $row['count'];
    }

    public function id($id = 0)
    {
        $user_id = $id == 0 ? $_SESSION['user']['id'] : $id;
        $result = $this->select($this->table, "employer_id", "user_id = '$user_id'");
        $row = $result->fetch_assoc();
        return $row['employer_id'];
    }
}
