<?php
if(isset($_SESSION['current_username'])) {
    $current_username = $_SESSION['current_username'];
    $current_id = $_SESSION['current_id'];
} else {
    header("Location: login.php?needtologin");
    exit();
}


?>