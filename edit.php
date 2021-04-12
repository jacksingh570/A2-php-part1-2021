    <?php
        $pageTitle = "Edit";
        include 'header.php';

        if (!empty($_SESSION['username'])) {

        $artist = null;
        $artist['artistName'] = null;
        $artist['artistAlbum'] = null;
        $artist['artistSong'] = null;
        $artist['artistLink'] = null;
        $artist['photo'] = null;

        if(!empty($_GET['artistId'])){
            if(is_numeric($_GET['artistId'])){
                $artistId = $_GET['artistId'];
                try{
                    include 'db.php';
                    //gets selected item
                    $sql = "SELECT * FROM artist WHERE artistId = :artistId";
                    $cmd = $db->prepare($sql);
                    $cmd->bindParam(':artistId', $artistId, PDO::PARAM_INT);
                    $cmd->execute();
                    $artist = $cmd->fetch();
                }catch (exception $e){
                    header('location:error.php');
                }
            }
        }
        ?>
            <main class="container">
                <h1>Artists</h1>
                <form method="post" action="save.php" enctype="multipart/form-data">
                    <fieldset>
                        <label for="artistName" class="col-2">Artist Name</label>
                        <input name="artistName" id="artistName" required value="<?php echo $artist['artistName'];?>"/>
                    </fieldset>
                    <fieldset>
                        <label for="artistAlbum" class="col-2">Artist Album</label>
                        <input name="artistAlbum" id="artistAlbum" required value="<?php echo $artist['artistAlbum'];?>"/>
                    </fieldset>
                    <fieldset>
                        <label for="artistSong" class="col-2">Artist Song</label>
                        <input name="artistSong" id="artistSong" required value="<?php echo $artist['artistSong'];?>"/>
                    </fieldset>
                    <fieldset>
                        <label for="artistLink" class="col-2">Artist Link</label>
                        <input name="artistLink" id="artistLink" required value="<?php echo $artist['artistLink'];?>"
                    </fieldset>
                    <fieldset>
                        <label for="photo" class="col-2">Photo</label>
                        <input type="file" name="photo" id="photo" accept=".jpg, .png, .jpeg" />
                    </fieldset>
                    <input type="hidden" name="artistId" id="artistId" value="<?php echo $artist['artistId'];?>"/>
                    <input type="hidden" name="currentPhoto" id="currentPhoto" value-="<?php echo $artist['photo']; ?>" />
                    <?php
                        if (!empty($artist['photo'])) {
                            echo '<img src="images/img-uploads/' . $artist['photo'] . '" alt="Artist Photo" class="thumbnail offset-2" />';
                        }
                    ?>
                    <button class="offset-2 btn btn-primary">Save</button>
                </form>
            </main>
        <?php
            include 'footer.php';
        }
        else {
            header('location:login.php');
        }
        ?>
