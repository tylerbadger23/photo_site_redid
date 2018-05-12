<?php
if(isset($_SESSION['current_username'])) {
    $current_username = $_SESSION['current_username'];
} else {
    header("Location: login.php?needtologin");
    exit();
}


?>