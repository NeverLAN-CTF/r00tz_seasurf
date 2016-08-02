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

<?php
if ($_SESSION['admin'] === 1) {
    echo('CTF Flag: Nonce it and verify actions are authorized');
    echo('<p><a href="user_add.php">Add a new user</a></p>');
    echo('<p><a href="messages_view.php">View messages</a></p>');
} else {
    echo('<p>You must have admin access to view the flag.</p>');
}
?>

<p><a href="logout.php">Logout</a></p>

<style>
html {
    background: url(images/ocean.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.textbox {
    border: 3px outset #100;
    outline:0;
    height:25px;
    width: 275px;
}
</style>

</body>
</html>

