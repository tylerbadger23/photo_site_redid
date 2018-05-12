<?php

include 'config.php';

session_destroy();
session_unset();
$_SESSION = array();
session_start();
header('Location: ../login.php');
exit();