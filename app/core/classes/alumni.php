<?php
class Alumni extends Connection
{
    private $table = 'tbl_alumni';
    public $pk = 'alumni_id';
    public $session = array();

    public $inputs = array();
    public $old = array();

    public function add($user_id)
    {
        $is_employed = $this->post('is_employed') == 'on' ? 1 : 0;
        $alumni_id = $this->insert($this->table, [
            'user_id'           => $user_id,
            'alumni_fname'      => $this->post('user_fname'),
            'alumni_mname'      => $this->post('user_mname'),
            'alumni_lname'      => $this->post('user_lname'),
            'alumni_contact'    => $this->post('alumni_contact'),
            'alumni_address'    => $this->post('alumni_address'),
            'course_id'         => $this->post('course_id'),
            'alumni_graduation' => $this->post('alumni_graduation'),
            'is_employed'       => $is_employed,
        ],'Y');

        if($is_employed == 1 && $alumni_id > 0){
            $AlumniWork = new AlumniWorkExperiences();
            $AlumniWork->add_from_register($alumni_id);

            $AlumniJobPreferences = new AlumniJobPreferences();
            $AlumniJobPreferences->add_from_register($alumni_id);
        }
        $AlumniEducation = new AlumniEducations();
        $AlumniEducation->add_from_register($alumni_id);
        return 1;

    }

    public function update_profile()
    {
        if (!Components::verify_csrf())
            return -1;

        try {
            $this->check();
            $this->begin_transaction();

            $update_success = $this->update($this->table, [
                'alumni_fname'       => $this->post('alumni_fname'),
                'alumni_mname'       => $this->post('alumni_mname'),
                'alumni_lname'       => $this->post('alumni_lname'),
                'course_id'          => $this->post('course_id'),
                'alumni_graduation'  => $this->post('alumni_graduation'),
                'alumni_gender'      => $this->post('alumni_gender'),
                'alumni_contact'     => $this->post('alumni_contact'),
                'alumni_address'     => $this->post('alumni_address'),
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

        if($fileName == '')
            return 1;

        // Get the file extension
        $fileExtension = strtolower(end(explode('.', $fileName)));

        // Allowed file extensions
        $allowedExtensions = array("jpeg", "jpg", "png");

        if(!in_array($fileExtension, $allowedExtensions))
            return 'NO-FILE-EXTENSION';

        if($fileError != 0)
            return 'FILE-UPLOAD-ERROR';

        if($fileSize >= 1000000)
            return 'FILE-TOO-BIG';

        $newFileName = uniqid('', true) . "." . $fileExtension;
        $fileDestination = __DIR__ . "../../../../assets/img/users/" . $newFileName;

        // Move the file to the destination
        move_uploaded_file($fileTempName, $fileDestination);

        $this->update("tbl_users",['user_img' => $newFileName],"user_id = '".$_SESSION['user']['id']."'");
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

    public function id($id = 0)
    {
        $user_id = $id == 0 ? $_SESSION['user']['id'] : $id;
        $result = $this->select($this->table, "alumni_id", "user_id = '$user_id'");
        $row = $result->fetch_assoc();
        return $row['alumni_id'];
    }

    public static function dataOf($primary_id, $field = '*')
    {
        $self = new self;
        $result = $self->select($self->table, $field, "$self->pk = '$primary_id'");
        $row = $result->fetch_assoc();
        return $field == '*' ? $row : $row[$field];
    }
}
