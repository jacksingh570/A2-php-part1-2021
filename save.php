
            <?php

                    $pageTitle = "Save";
                    include 'header.php';
                    //SAVE VARIABLES
                    $artistName = $_POST['artistName'];
                    $albumName = $_POST['carModel'];
                    $songName = $_POST['songName'];
                    //CONNECTION CODE
                try {
                    $db = new PDO('mysql:host=172.31.22.43;dbname=Jackson1141574', 'Jackson1141574', 'Eq0W7b1PrZ');
                    $sql = "INSERT INTO artist (artistName, albumName, songName) VALUES (:artistName, :albumName, :songName)";
                    $cmd = $db->prepare($sql);
                    $cmd->execute();
                    //PARAMETERS
                    $cmd->bindParam(':artistName', $artistName, PDO::PARAM_STR, 30);
                    $cmd->bindParam(':albumName', $albumName, PDO::PARAM_STR, 30);
                    $cmd->bindParam(':songName', $songName, PDO::PARAM_STR, 30);
                    $cmd->execute();
                    $db = null;
                }catch (exception $e){
                    header('location:error.php');
                }
                include "footer.php";
            ?>
