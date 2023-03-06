<?php
    session_start();
    $username = NULL;
    session_unset();
    session_destroy();
    header("Location:./index.php");
?>