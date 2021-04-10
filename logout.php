<?php

    //gets session
    session_start();

    //removes session variables
    session_unset();

    //ends the session
    session_destroy();

    //goes back to login
    header('location:login.php');
    exit();
?>
