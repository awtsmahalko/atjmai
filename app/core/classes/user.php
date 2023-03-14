<?php
class Users extends Connection
{
    private $table = 'tbl_users';
    public $pk = 'user_id';
    public $name = 'user_fname';
    public $session = array();

    public $inputs = array();
    public $files = array();

    public function datatable()
    {
        $response['data'] = [];
        $result = $this->select($this->table);
        $count = 1;
        while ($row = $result->fetch_assoc()) {
            array_push($response['data'], [
                'count' => $count++,
                'user_id' => $row['user_id'],
                'user_fullname' => $row['user_fname'],
                'user_address' => $row['user_address'],
                'user_category' => $row['user_category'],
                'user_mobile' => $row['user_mobile'],
                'date_added' => date("F d, Y", strtotime($row['date_added'])),
            ]);
        }

        return json_encode($response);
    }

    public function updateProfile()
    {

        $user_id        = $this->clean($this->inputs['user_id']);
        $user_fname     = $this->clean($this->inputs['user_fname']);
        $user_mname     = $this->clean($this->inputs['user_mname']);
        $user_lname     = $this->clean($this->inputs['user_lname']);
        $user_address   = $this->clean($this->inputs['user_address']);
        $user_mobile    = $this->clean($this->inputs['user_mobile']);
        $user_email     = $this->clean($this->inputs['user_email']);
        $user_dob       = $this->clean($this->inputs['user_dob']);
        $user_pob       = $this->clean($this->inputs['user_pob']);
        $user_gender    = $this->clean($this->inputs['user_gender']);
        $nationality    = $this->clean($this->inputs['nationality']);
        $user_civil_status  = $this->clean($this->inputs['user_civil_status']);

        $form = array(
            'user_id' => $user_id,
            'user_fname' => $user_fname,
            'user_mname' => $user_mname,
            'user_lname' => $user_lname,
            'user_address' => $user_address,
            'user_mobile' => $user_mobile,
            'user_email' => $user_email,
            'user_dob' => $user_dob,
            'user_pob' => $user_pob,
            'user_gender' => $user_gender,
            'nationality' => $nationality,
            'user_civil_status' => $user_civil_status,
        );

        $this->update($this->table, $form, "user_id = '$user_id'");
        header("location:../index.php?q=account-settings&tab=nav-acc");
    }

    public function updateBackground()
    {

        $user_id        = $this->clean($this->inputs['user_id']);
        $educ_highest   = $this->clean($this->inputs['educ_highest']);
        $educ_degree    = $this->clean($this->inputs['educ_degree']);
        $educ_school    = $this->clean($this->inputs['educ_school']);
        $educ_year      = $this->clean($this->inputs['educ_year']);

        $form = array(
            'educ_highest' => $educ_highest,
            'educ_degree' => $educ_degree,
            'educ_school' => $educ_school,
            'educ_year' => $educ_year,
        );

        $this->update($this->table, $form, "user_id = '$user_id'");
        header("location:../index.php?q=account-settings&tab=nav-status");
    }

    public function updateExperience()
    {

        $user_id        = $this->clean($this->inputs['user_id']);
        $exp_company   = $this->clean($this->inputs['exp_company']);
        $exp_position    = $this->clean($this->inputs['exp_position']);
        $exp_duration    = $this->clean($this->inputs['exp_duration']);
        $exp_responsibility      = $this->clean($this->inputs['exp_responsibility']);

        $form = array(
            'exp_company' => $exp_company,
            'exp_position' => $exp_position,
            'exp_duration' => $exp_duration,
            'exp_responsibility' => $exp_responsibility,
        );

        $this->update($this->table, $form, "user_id = '$user_id'");
        header("location:../index.php?q=account-settings&tab=nav-experience");
    }

    public function updateSkills()
    {

        $user_id    = $this->clean($this->inputs['user_id']);
        $skills     = $this->clean($this->inputs['skills']);
        $certifications = $this->clean($this->inputs['certifications']);

        $form = array(
            'skills' => $skills,
            'certifications' => $certifications,
        );

        $this->update($this->table, $form, "user_id = '$user_id'");
        header("location:../index.php?q=account-settings&tab=nav-skills");
    }

    public function updateAvailability()
    {

        $user_id    = $this->clean($this->inputs['user_id']);
        $availability     = $this->clean($this->inputs['availability']);
        $tutor_method = $this->clean($this->inputs['tutor_method']);

        $form = array(
            'availability' => $availability,
            'tutor_method' => $tutor_method,
        );

        $this->update($this->table, $form, "user_id = '$user_id'");
        header("location:../index.php?q=account-settings&tab=nav-avail");
    }

    public function updateReference()
    {

        $user_id    = $this->clean($this->inputs['user_id']);
        $ref_name     = $this->clean($this->inputs['ref_name']);
        $ref_relation = $this->clean($this->inputs['ref_relation']);
        $ref_contact = $this->clean($this->inputs['ref_contact']);

        $form = array(
            'ref_name' => $ref_name,
            'ref_relation' => $ref_relation,
            'ref_contact' => $ref_contact,
        );

        $this->update($this->table, $form, "user_id = '$user_id'");
        header("location:../index.php?q=account-settings&tab=nav-ref");
    }

    public function change_profile()
    {
        $file = $this->files['file'];

          // Get file properties
          $fileName = $file['name'];
          $fileTempName = $file['tmp_name'];
          $fileSize = $file['size'];
          $fileError = $file['error'];
          $fileType = $file['type'];

          // Get the file extension
          $fileExtension = strtolower(end(explode('.', $fileName)));

          // Allowed file extensions
          $allowedExtensions = array("jpeg", "jpg", "png");

          // Check if the extension is allowed
          if(in_array($fileExtension, $allowedExtensions)) {
            // Check if there are no errors
            if($fileError === 0) {
              // Check if the file size is within limits
              if($fileSize < 1000000) {
                // Create a unique file name
                $newFileName = uniqid('', true) . "." . $fileExtension;

                // Specify the file destination
                $fileDestination = __DIR__ . "../../../../images/users/" . $newFileName;

                // Move the file to the destination
                move_uploaded_file($fileTempName, $fileDestination);

                $this->update($this->table,['user_img' => $newFileName],"user_id = '".$_SESSION['user']['id']."'");
                $_SESSION['user']['img'] = $newFileName;

                $response = "Image uploaded successfully!";
              } else {
                $response = "File size is too large!";
              }
            } else {
              $response = "There was an error uploading the file!";
            }
          } else {
            $response = "File extension not allowed!";
          }
          $_SESSION['upload']['error'] = $response;

        header("location:../index.php?q=account-settings&tab=nav-photo");
    }

    public function students_lists()
    {
        $response['students'] = [];
        $result = $this->select($this->table, '*', "user_category = '2'");
        while($row = $result->fetch_assoc()){
            array_push($response['students'],$row);
        }
        return json_encode($response);
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
