<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// If form submission than add the user.
if (isset($_POST['submit'])) {
    $dbserver = "localhost";
    $dbuser = "happy_hxar";
    $dbpassword = "yajnidIcIsdedbobgeabcavDafQuioS";
    $dbname = "seasurf";
    
    $conn = new PDO("mysql:host=" . $dbserver . ";dbname=" . $dbname, $dbuser, $dbpassword);
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO messages (message) VALUES(:message)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":message", $_POST['message']);
    $stmt->execute();
}
?>

<html>
<head>
    <title>Send administrator message</title>
</head>

<body>
<h1>Send administrator message</h1>

<form action="messages_send.php" method="POST">
    <textarea rows="8" cols="50" name="message"></textarea><br />
    <input type="submit" name="submit" />
</form>

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

