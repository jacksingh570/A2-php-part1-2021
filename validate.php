<?php
    //user login inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    //connect to database
    include 'db.php';

    $sql = "SELECT * FROM users WHERE username = :username";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
    $cmd->execute();
    $user = $cmd->fetch();

    if (!$user) {
        $db = null;
        header('location:login.php?invalid=true');
    } else {
        if (password_verify($password, $user['password'])) {
            session_start();

            $_SESSION['username'] = $username;

            $db = null;
            header('location:index.php');
        } else {
            $db = null;
            header('location:login.php?invalid=true');
        }
    }
?>