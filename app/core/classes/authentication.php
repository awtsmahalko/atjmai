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
        if(!Components::verify_csrf())
            return -1;

        $user_fname     = $this->post('user_fname');
        $user_mname     = $this->post('user_mname');
        $user_lname     = $this->post('user_lname');
        $user_fullname  = $user_fname.' '.$user_mname.' '.$user_lname;
        $user_category  = $this->post('user_category');
        $email          = $this->post('user_email');
        $password       = $this->post('password');
        $password2      = $this->post('password2');

        try{
            $this->check();
            $this->begin_transaction();

            $fetch = $this->select($this->table, "user_id", "user_email = '$email'");
            if ($fetch->num_rows > 0)
                throw new Exception(2);

            if($password != $password2)
                throw new Exception(-2);

            $user_id =  $this->insert($this->table, [
                'user_fullname' => $user_fullname,
                'user_password' => md5($password),
                'user_email'    => $email,
                'user_category' => $user_category,
                'user_status'   => 1
            ], 'Y');

            if ($user_id > 0) {
                $this->inputs['user_id'] = $user_id;
                if($user_category == 'S'){
                    $Alumni         = new Alumni();
                    $Alumni->inputs = $this->inputs;
                    $response       = $Alumni->add();
                    if($response == 1){
                        $this->commit();
                        $_SESSION['user'] = [
                            'id'            => $user_id,
                            'fullname'      => $user_fullname,
                            'category'      => $user_category,
                            'user_email'    => $email,
                            'img'           => "default.png",
                        ];
                        return 1;
                    }else{
                        throw new Exception($response); 
                    }
                }
                return 1;
            } else {
                throw new Exception('Error occur please contact your support!');
            }

        }catch(Exception $e){
            $this->rollback();
            return $e->getMessage();
        }
    }

    public function login()
    {
        if(!Components::verify_csrf())
            return -1;

        $email      = $this->post('user_email');
        $password   = md5($this->post('user_password'));

        try{
            $fetch = $this->select($this->table, "*", "user_email = '$email' AND user_password = '$password'");
            if ($fetch->num_rows < 1)
                throw new Exception(2);

            $row = $fetch->fetch_assoc();
            $_SESSION['user'] = [
                'id'            => $row['user_id'],
                'fullname'      => $row['user_fullname'],
                'category'      => $row['user_category'],
                'user_email'    => $row['user_email'],
                'img'           => $row['user_img'],
            ];
            return 1;
        }catch(Exception $e){
            return $e->getMessage();
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
