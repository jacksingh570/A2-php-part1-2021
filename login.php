<?php
    $pageTitle = "Login";
    include 'header.php';
?>
<main container="class">
    <h1>Login</h1>
    <?php
    if (!empty($_GET['invalid'])){
        echo '<div class="alert alert-danger">Invalid Login</div>';
    }else{
        echo '<div class="alert alert-info">Please enter your login:';
    }
    ?>
    <form method="post" action="validate.php">
        <fieldset class="form-group">
            <label for="username" class="col-2">Username:</label>
            <input name="username" id="username" required type="email" placeholder="user@email.com"/>
        </fieldset>
        <fieldset class="form-group">
            <label for="password" class="col-2">Password:</label>
            <input type="password" name="password" id="password" required/>
        </fieldset>
        <div class="offset-3">
            <button class="btn btn-primary"Login</div>
        </div>
    </form>
</main>

<?php include 'footer.php';?>