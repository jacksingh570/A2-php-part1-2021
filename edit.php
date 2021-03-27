    <?php
        $pageTitle = "Edit";
        include 'header.php';

        $artist = null;
        $artist['artistName'] = null;
        $artist['artistAlbum'] = null;
        $artist['artistSong'] = null;

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
                <form method="post" action="save.php">
                    <fieldset>
                        <label for="artistName" class="col-2">Artist Name</label>
                        <input name="artistName" id="artistName" required value="<?php echo $artist['artistName'];?>"/>
                    </fieldset>
                    <fieldset>
                        <label for="artistAlbum" class="col-2">Artist Album</label>
                        <input name="artistAlbum" id="artistAlbum" required value="<?php echo $artist['artistAlbum'];?>"/>
                    </fieldset>
                    <fieldset>
                        <label for="artistSong" class="col-2">Artist Album</label>
                        <input name="artistSong" id="artistSong" required value="<?php echo $artist['artistSong'];?>"/>
                    </fieldset>
                    <input type="hidden" name="artistId" id="artistId" value="<?php echo $artist['artistId'];?>"/>
                    <button class="offset-2 btn btn-primary">Save</button>
                </form>
            </main>
        <?php include 'footer.php';?>
