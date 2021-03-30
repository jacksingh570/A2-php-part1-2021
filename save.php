
            <?php

                    $pageTitle = "Save";
                    include 'header.php';
                    //SAVE VARIABLES
                    $artistName = $_POST['artistName'];
                    $artistAlbum = $_POST['artistAlbum'];
                    $artistSong = $_POST['artistSong'];
                    $artistId = $_POST['artistId'];
                    //CONNECTION CODE
                try {
                    $db = new PDO('mysql:host=172.31.22.43;dbname=Jackson1141574', 'Jackson1141574', 'Eq0W7b1PrZ');
                    if (empty($artistId)) {
                        $sql = "INSERT INTO artist (artistName, artistAlbum, artistSong) VALUES (:artistName, :artistAlbum, :artistSong)";
                    }
                    else {
                        $sql = "UPDATE artist SET artistName = :artistName, artistAlbum = :artistAlbum, artistSong = :artistSong WHERE artistId = :artistId";
                    }
                    $cmd = $db->prepare($sql);
                    $cmd->execute();
                    //PARAMETERS
                    $cmd->bindParam(':artistName', $artistName, PDO::PARAM_STR, 100);
                    $cmd->bindParam(':artistAlbum', $artistAlbum, PDO::PARAM_STR, 100);
                    $cmd->bindParam(':artistSong', $artistSong, PDO::PARAM_STR, 100);
                    if (!empty($artistId)) {
                        $cmd->bindParam(':artistId', $artistId, PDO::PARAM_INT);
                    }
                    $cmd->execute();
                    $db = null;
                    header('location:index.php');
                }catch (exception $e){
                    header('location:error.php');
                }
                include "footer.php";
            ?>
