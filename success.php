<?php
session_start()
if(!isset($_SESSION['logged in']) || $_SESSION['logged in'] == false){
    header("Location: login.php");
}
?>

<h2>You have logged in!</h2>