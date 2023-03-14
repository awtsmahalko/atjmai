<?php

include '../core/config.php';

$Auth = new Authentication();
$Auth->inputs = $_POST;
$response = $Auth->signup();
if ($response == 1) {
    $_SESSION['user'] = $Auth->session;
    if($_SESSION['user']['category'] == 1){
        header("location:../index.php?q=account-settings&tab=nav-status");
    }else{
        header("location:../index.php");
    }
} else if ($response == 2) {
    $_SESSION['signup_error'] = '<div class="alert alert-danger">Email is already taken.</div>';
    $_SESSION['signup'] = $Auth->old;
    header("location:../authentication.php");
} else if ($response == -1) {
    $_SESSION['signup_error'] = '<div class="alert alert-danger">Password does not match.</div>';
    $_SESSION['signup'] = $Auth->old;
    header("location:../authentication.php");
} else {
    header("location:../authentication.php");
}
