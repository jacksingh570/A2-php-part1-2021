
        <?php
            try {
                $pageTitle = "Home";
                include 'header.php';
                include 'db.php';
                $sql = "SELECT * FROM artist";
                $cmd = $db->prepare($sql);
                $cmd->execute();
                //retrieving inputs
                $inputs = $cmd->fetchAll();
                //PRINT STATEMENTS
                echo '<main class="container"><table class="table table-striped table-light"><thead><th>Artist</th><th>Album</th><th>Song</th><th>Link</th><th>Photo</th>';
                if (!empty($_SESSION['username'])) {
                    echo '<th>Actions</th>';
                }
                echo '</thead>';
                foreach ($inputs as $indInputs) {
                    echo '<tr><td>' . $indInputs['artistName'] . '</td>'
                        . '<td>' . $indInputs['artistAlbum'] . '</td>'
                        . '<td>' . $indInputs['artistSong'] . '</td>'
                        . '<td><a href="'  . $indInputs['artistLink'] . '">Link</a></td>'
                        . '<td>';
                        if (!empty($indInputs['photo'])) {
                            echo '<img src="images/img-uploads/' . $indInputs['photo'] . '" alt="Artist Photo" class="thumbnail" />';
                        }
                        echo '</td>';
                    if (!empty($_SESSION['username'])) {
                        echo '<td><a href="edit.php?artistId=' . $indInputs['artistId'] . '" class="btn btn-secondary">Edit</a>'
                            . '<a href="delete.php?artistId=' . $indInputs['artistId'] . '" class="btn btn-danger" title="Delete" onclick="return confirmDelete();">Delete</a>'
                            . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</table></main>';
                $db = null;
            }catch (exception $e){
                header('error.php');
            }
            include 'footer.php';
        ?>

