<?php
    $pageTitle = "Registering...";
    include 'header.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $ok = true;

    //check user inputs
    if (empty($username)){
        echo 'Username required<br/>';
        $ok = false;
    }
    if(empty($password)){
        echo 'Password required';
        $ok = false;
    }
    if($password != $confirm){
        echo 'Password is Incorrect<br/>';
        $ok = false;
    }

    //saves the correct password
    if($ok){
        include 'db.php';
            //checks if username has been used or not
            $sql = "SELECT userId FROM users WHERE username = :username";
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
            $cmd->execute();
            $user = $cmd->fetch();

            if($user){
                echo '<p class="alert alert-danger">User already exists</p>';
            }else{
                $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
                $cmd = $db->prepare($sql);

                $password = password_hash($password, PASSWORD_DEFAULT);
                $cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
                $cmd->bindParam(':password', $password, PDO::PARAM_STR, 128);

                $cmd->execute();

                echo '<h1>Registration Saved</h1><p>Click <a href="login.php"></a>to enter the site</p>';

            }
            $db = null;
    }
    include 'footer.php';
?>