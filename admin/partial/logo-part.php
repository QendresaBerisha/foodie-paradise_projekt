<?php 

    include('../config/constants.php'); 
   // include('login-check.php');

?>
<html>

<head>

    <title>Foodie Paradise - Menu</title>

    <meta name="viewport" content="initial-scale=1.0 width=device-width">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Antic&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='../../css/admin.css'>
</head>

<body>

    <header class="main-header">
        <div class="container">
            <h1 class="mh-logo">
                <img src="../image/logo2.2.png" width="350px" height="150px" alt="Foodie Paradise logo">
            </h1>
            <nav class="main-nav">
                <ul class="main-nav-list" style="margin-right: -200px">
                <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-food.php">Food</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>