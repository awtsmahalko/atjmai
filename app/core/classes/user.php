<?php
class Users extends Connection
{
    private $table = 'tbl_users';
    public $pk = 'user_id';
    public $name = 'user_fname';

    public function update_profile()
    {
        if (!Components::verify_csrf())
            return -1;


        try {
            $this->check();
            $this->begin_transaction();

            $fetch = $this->select($this->table, "user_id", "user_email = '".$this->post('user_email')."' AND user_id != '".$_SESSION['user']['id']."'");
            if ($fetch->num_rows > 0)
                throw new Exception(2);


            $update_success = $this->update($this->table, [
                'user_fullname' => $this->post('user_fullname'),
                'user_email' => $this->post('user_email'),
            ], "user_id = '" . $_SESSION['user']['id'] . "'");

            if ($update_success != 1)
                throw new Exception($update_success);
            $res = $this->update_profile_picture();
            $this->commit();
            $_SESSION['user']['fullname'] = $this->post('user_fullname');
            $_SESSION['user']['email'] = $this->post('user_email');
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

        $this->update($this->table, ['user_img' => $newFileName], "user_id = '" . $_SESSION['user']['id'] . "'");
        $_SESSION['user']['img'] = $newFileName;

        return "IMG-SUCCESS";
    }
    public function profile()
    {
        return json_encode([
            'fullname' => $_SESSION['user']['fullname'],
            'email' => $_SESSION['user']['user_email'],
        ]);
    }

    public static function name($primary_id)
    {
        $self = new self;
        $result = $self->select($self->table, $self->name, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row[$self->name];
    }
    public static function img($primary_id)
    {
        $self = new self;
        $result = $self->select($self->table, 'user_img', "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $row['user_img'];
    }

    public static function dataOf($primary_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table, $field, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }
}
