<?php
if($_SESSION['current_username'] != "adminuser") {
    header("Loccation: index.php?notadmin");
    exit();
}
?>