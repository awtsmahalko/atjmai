<?php
include '../core/config.php';
$Auth = new Authentication();
$Auth->inputs = $_POST;
$response = $Auth->login();
if ($response == 1) {
    $_SESSION['user'] = $Auth->session;
    header("location:../index.php");
} else {
    $_SESSION['login_error'] = '<div class="alert alert-danger">Credentials does not match to our records.</div>';
    $_SESSION['login'] = $Auth->old;
    header("location:../authentication.php");
}

// $_SESSION['user']['id'] = 1;
// $_SESSION['user']['name'] = "Onir C. Arton";
// $_SESSION['user']['category'] = "Residents";


// header("location:../index.php");
