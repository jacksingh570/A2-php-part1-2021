<?php
    $pageTitle = "Delete";
    include 'header.php';

    if(is_numeric($_GET['artistId'])){
        $artistId = $_GET['artistId'];
        try{
            include 'db.php';

            //execute sql delete command
            $sql = "DELETE FROM artist WHERE artistId = :artistId";
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':artistId', $artistId, PDO::PARAM_INT);
            $cmd->execute();
            $db = null;
            echo '<main class="container">Item deleted</main>';

            header('location:index.php');
        }catch (exception $e){

            header('location:error.php');
        }
    }
    include 'footer.php';
    ?>
