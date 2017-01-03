<?php

session_start(); 

$start_time = microtime(TRUE);
if (isset($_POST['logout'])) {
    session_destroy();

    header('Location: ../home');

}    

?>