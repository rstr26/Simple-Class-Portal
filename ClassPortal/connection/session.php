<?php 
    session_start();

    if(isset($_SESSION['accId']) || isset($_SESSION['subject']) || isset($_SESSION['teacher'])){
        return null;
    }
    else{
        $_SESSION['accId'] = "";
    }
?>