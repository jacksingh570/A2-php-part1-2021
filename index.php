
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
                echo '<table><thread><th>Artist</th><th>Album</th><th>Song</th></thread>';
                foreach ($inputs as $indInputs) {
                    echo '<tr><td>' . $indInputs['artistName'] . '</td><td>' . $indInputs['albumName'] . '</td><td>' . $indInputs['songName'] . '</td></tr>';
                }
                echo '</table>';
                $db = null;
            }catch (exception $e){
                header('error.php');
            }
            include 'footer.php';
        ?>

