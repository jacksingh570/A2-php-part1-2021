<?php
    $pageTitle='404 Error';
    $title = "404";
    include 'header.php';
    $message = "We're sorry but something went wrong. Please try again.";
    echo '<h1>' . $title . '</h1>';
    echo '<p>' . $message . '</p>';
    include 'footer.php';
?>