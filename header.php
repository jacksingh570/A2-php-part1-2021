<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Artist | <?php echo $pageTitle; ?></title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <script type="text/javascript" src="js/script.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Artists</a>
            <?php
                session_start();
                if (!empty($_SESSION['username'])) {
            ?>
            <a style="color: gray" class="nav-link" href="edit.php">Add an artist</a>
            <a style="color: gray" class="nav-link" href="#"><?php echo $_SESSION['username']; ?></a>
            <a style="color: gray" class="nav-link" href="logout.php">Logout</a>
            <?php
                }
                else {
            ?>
            <a style="color: gray" class="nav-link" href="register.php">Register</a>
            <a style="color: gray" class="nav-link" href="login.php">Login</a>
            <?php
                }
            ?>
        </div>
    </nav>
