<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

session_start();

// If user does not have session variables set redirect them to login
if (!isset($_SESSION['username']) || !isset($_SESSION['admin'])) {
    header("Location: index.php");
}

// Only admin allowed to use this page
if ($_SESSION['admin'] !== 1) {
    header("Location: dashboard.php");
}

$dbserver = "localhost";
$dbuser = "happy_hxar";
$dbpassword = "yajnidIcIsdedbobgeabcavDafQuioS";
$dbname = "seasurf";

$conn = new PDO("mysql:host=" . $dbserver . ";dbname=" . $dbname, $dbuser, $dbpassword);
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT message FROM messages WHERE `read`=0");
$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html>
<head>
    <title>View messages</title>
</head>

<body>
<h1>Unread messages</h1>

<?php
foreach($rows as $row) {
    echo('------------------------------------------------------------');
    echo('<p>' . $row['message'] . '</p>');
}
?>

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

<?php
$conn = null;
$conn = new PDO("mysql:host=" . $dbserver . ";dbname=" . $dbname, $dbuser, $dbpassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("UPDATE messages SET `read`=1");
$stmt->execute();
?>

</body>
</html>


