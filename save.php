
            <?php

                    $pageTitle = "Save";
                    include 'header.php';
                    //SAVE VARIABLES
                    $artistName = $_POST['artistName'];
                    $artistAlbum = $_POST['artistAlbum'];
                    $artistSong = $_POST['artistSong'];
                    $artistId = $_POST['artistId'];
                    $artistLink = $_POST['artistLink'];
                    $ok = true;

                    if (!empty($_FILES['photo']['name'])) {
                        $type = mime_content_type($_FILES['photo']['tmp_name']);
                        if ($type != 'image/jpeg' && $type != 'image/png' && $type != 'image/jpg') {
                            echo 'Invalid file type<br />';
                            $ok = false;
                        }
                        else {
                            $photo = session_id() . "-" . $_FILES['photo']['name'];
                            move_uploaded_file($_FILES['photo']['tmp_name'], "images/img-uploads/$photo");
                            echo $photo ;
                        }
                    }
                    else {
                        $photo = null;
                    }
                    if ($ok) {
                        //CONNECTION CODE
                        try {
                            $db = new PDO('mysql:host=172.31.22.43;dbname=Jackson1141574', 'Jackson1141574', 'Eq0W7b1PrZ');
                            if (empty($artistId)) {
                                $sql = "INSERT INTO artist (artistName, artistAlbum, artistSong, artistLink, photo) VALUES (:artistName, :artistAlbum, :artistSong, :photo, :artistLink)";
                            } else {
                                $sql = "UPDATE artist SET artistName = :artistName, artistAlbum = :artistAlbum, artistSong = :artistSong, photo = :photo, artistLink = :artistLink WHERE artistId = :artistId";
                            }
                            $cmd = $db->prepare($sql);
                            $cmd->execute();
                            //PARAMETERS
                            $cmd->bindParam(':artistName', $artistName, PDO::PARAM_STR, 100);
                            $cmd->bindParam(':artistAlbum', $artistAlbum, PDO::PARAM_STR, 100);
                            $cmd->bindParam(':artistSong', $artistSong, PDO::PARAM_STR, 100);
                            $cmd->bindParam(':artistLink', $artistLink, PDO::PARAM_STR, 100);
                            $cmd->bindParam(':photo', $photo, PDO::PARAM_STR, 100);
                            if (!empty($artistId)) {
                                $cmd->bindParam(':artistId', $artistId, PDO::PARAM_INT);
                            }
                            $cmd->execute();
                            $db = null;
                            header('location:index.php');
                        } catch (exception $e) {
                            header('location:error.php');
                        }
                    }
                include "footer.php";
            ?>
