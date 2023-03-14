<?php
class Authentication extends Connection
{
    private $table = 'tbl_users';
    public $pk = 'user_id';
    public $session = array();

    public $inputs = array();
    public $old = array();

    public function signup()
    {
        $user_fname = $this->clean($this->inputs['user_fname']);
        $user_mname = $this->clean($this->inputs['user_mname']);
        $user_lname = $this->clean($this->inputs['user_lname']);
        $user_category = $this->clean($this->inputs['user_category']);
        $email = $this->clean($this->inputs['user_email']);
        $user_mobile = $this->clean($this->inputs['user_mobile']);
        $password = $this->clean($this->inputs['password']);
        $password2 = $this->clean($this->inputs['password2']);

        $fetch = $this->select($this->table, "user_id", "user_email = '$email'");
        if ($fetch->num_rows > 0) {
            $this->old = [
                'user_fname'    => $user_fname,
                'user_mname'    => $user_mname,
                'user_lname'    => $user_lname,
                'email'         => $email,
                'user_category' => $user_category,
                'user_mobile'   => $user_mobile
            ];
            return 2;
        } else {
            if($password != $password2){
                $this->old = [
                    'user_fname'    => $user_fname,
                    'user_mname'    => $user_mname,
                    'user_lname'    => $user_lname,
                    'email'         => $email,
                    'user_category' => $user_category,
                    'user_mobile'   => $user_mobile
                ];
                return -1;
            }
            $form = array(
                'user_fname'    => $user_fname,
                'user_mname'    => $user_mname,
                'user_lname'    => $user_lname,
                'password'      => md5($password),
                'user_mobile'   => $user_mobile,
                'user_email'    => $email,
                'user_category' => $user_category
            );
            $user_id =  $this->insert($this->table, $form, 'Y');
            if ($user_id > 0) {
                if($user_category == 1)
                    $this->insert('tbl_tutors',['user_id' => $user_id]);

                $this->session = [
                    'id'        => $user_id,
                    'fname'     => $user_fname,
                    'mname'     => $user_mname,
                    'lname'     => $user_lname,
                    'category'  => $user_category,
                    'user_mobile'   => $user_mobile,
                    'img'     => "default-user.png"
                ];
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function login()
    {
        $user_email = $this->clean($this->inputs['email']);
        $password = md5($this->inputs['password']);

        $fetch = $this->select($this->table, "*", "user_email = '$user_email' AND password = '$password'");
        if ($fetch->num_rows > 0) {
            $row = $fetch->fetch_assoc();
            $this->session = [
                'id'        => $row['user_id'],
                'fname'     => $row['user_fname'],
                'mname'     => $row['user_mname'],
                'lname'     => $row['user_lname'],
                'category'  => $row['user_category'],
                'user_email'    => $row['user_email'],
                'img'           => $row['user_img'],
            ];
            return 1;
        } else {
            $this->old = [
                'user_email'  => $user_email,
                'password'  => $this->inputs['password'],
            ];
            return 0;
        }
    }

    public function emailSender($user_email, $user_otp)
    {
        $to = $user_email;
        $subject = "CPSU TUTOR FINDER: Reset Password";

        $message = "
                <html>
                <head>
                <title>CPSU TUTOR FINDER: Reset Password</title>
                </head>
                <body>
                <p>Your OTP is : <b>$user_otp</b></p>
                </body>
                </html>
                ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        // $headers .= 'From: <webmaster@example.com>' . "\r\n";
        // $headers .= 'Cc: myboss@example.com' . "\r\n";

        mail($to, $subject, $message, $headers);
    }

    public function logout()
    {
        session_destroy();
    }
}
