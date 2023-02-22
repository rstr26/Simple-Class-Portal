<?php 
require '../connection/session.php';

session_unset();
session_destroy();
header("location: ../pages/index.php");
?>