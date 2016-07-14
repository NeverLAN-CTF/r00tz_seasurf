<?php
session_start();

// If user does not have session variables set redirect them to login
if (!isset($_SESSION['username']) || !isset($_SESSION['admin'])) {
    header("Location: index.php");
}
?>

<html>
    <head>
        <title>Portal Dashboard</title>
    </head>

    <body>
        <h1>Welcome <?=$_SESSION['username']?></h1>
        <p><a href="user_add.php">Add a new user</a>
        <p><a href="logout.php">Logout</a>
    </body>
</html>

