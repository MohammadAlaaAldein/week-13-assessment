<?php 
    session_start();
    require "db.php";
    echo "Hello " . $_SESSION['username'];
?>