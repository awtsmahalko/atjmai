<?php
include '../core/config.php';
session_destroy();
header("location:../signin.php");
