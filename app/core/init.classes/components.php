<?php
class Components extends Connection
{
    public static function csrf()
    {
        $self = new static;
        $csrf = $self->generateRandomString(32);
        $_SESSION['csrf_token'] = $csrf;
        $text = "<input type='hidden' id='csrf' value='$csrf' name='csrf'>";
        return $text;
    }

    public static function verify_csrf()
    {
        $self = new self;
        return $_SESSION['csrf_token'] == $self->post('csrf'); //$_POST['csrf'];
    }

    public static function option_years()
    {
        $year_now = date("Y");
        $year_start = 1998;
        $option = '';
        for ($i = $year_now; $i >= $year_start; $i--) {
            $option .= "<option value='$i'>Batch $i</option>";
        }
        return $option;
    }
}
