<?php
session_start();
unset($_SESSION['example']);
header("Location: login.php");
?>