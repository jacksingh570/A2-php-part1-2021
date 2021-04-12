<?php
    $pageTitle = 'Register';
    include 'header.php';
?>

<main class="container">
    <h1>User Registration</h1>
    <form method="post" action="save-registration.php">
        <fieldset class="form-group">
            <label for="username" class="col-2">Username:</label>
            <input name="username" id="username" required type="email" placeholder="user@email.com"/>
        </fieldset>
        <fieldset class="form-group">
            <label for="password" class="col-2">Password:</label>
            <input type="password" name="password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"/>
        </fieldset>
        <fieldset class="from-group">
            <label for="confirm" class="col-2">Confirm Password:</label>
            <input type="password" name="confirm" id="confirm" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onkeyup="return comparePasswords()"/>
            <span id="passwordMsg"></span>
        </fieldset>
        <div class="offset-3">
            <button>Register</button>
        </div>
    </form>
</main>
<?php include 'footer.php'; ?>