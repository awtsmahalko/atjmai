<?php
class Components extends Connection
{
    public static function csrf()
    {
        $self = new static;
        $csrf = $self->generateRandomString(32);
        $_SESSION['csrf_token'] = $csrf;
        $text = "<input type='text' value='$csrf' name='csrf'>";
        return $text;
    }

    public static function verify_csrf()
    {
        return $_SESSION['csrf_token'] == $_POST['csrf'];
    }
}
