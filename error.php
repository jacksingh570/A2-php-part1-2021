<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            $pageTitle = "Backend Error";
            include 'header';
            $message = "Our team is working on this now.";
            include 'header.php';
            echo "<h1>" . $pageTitle . "</h1>";
            echo "<p>" . $message . "</p>";
            include 'footer.php';
        ?>
    </body>
</html>
