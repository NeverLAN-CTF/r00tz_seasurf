<?php
session_start();

// If user does not have session variables set redirect them to login
if (!isset($_SESSION['username']) || !isset($_SESSION['admin'])) {
    header("Location: index.php");
}
?>

<html>
    <head>
        <title>Add user</title>
    </head>

    <body>
        <!-- Need a form asking for username, password and a checkbox for admin --->
    </body>
</html>

