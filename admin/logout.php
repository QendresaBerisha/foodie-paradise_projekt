<?php 
    include('../config/constants.php');
    //Destory the Session
    session_destroy();

    //Redirect to Login Page
    header('location:'.SITEURL.'admin/login.php');

?>