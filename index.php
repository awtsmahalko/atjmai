<?php
session_start();
if (!isset($_SESSION['user']['id'])) {
    header("location:app/signin.php");
} else {
    header("location:app/");
}
