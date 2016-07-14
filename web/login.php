<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Redirect those that try to come directly to this page
if (!isset($_POST['username']) || !isset($_POST['password'])) {
    header("Location: index.php");
}

session_start();

$username = (string) $_POST['username'];
$password = (string) $_POST['password'];

$dbserver = "localhost";
$dbuser = "happy_hxar";
$dbpassword = "yajnidIcIsdedbobgeabcavDafQuioS";
$dbname = "seasurf";

$conn = new PDO("mysql:host=" . $dbserver . ";dbname=" . $dbname, $dbuser, $dbpassword);
$stmt = $conn->prepare("SELECT * FROM users WHERE username=:user");
$stmt->bindParam(":user", $_POST['username']);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

// No row returned so the username was incorrect
if (!isset($row['password'])) {
    header("Location: index.php?error=1");
}

// We have a valid user, this checks for a valid password
if (password_verify($password, $row['password'])) {
    $_SESSION['username'] = $username;
    $_SESSION['admin'] = (int) $row['admin'];
    header("Location: dashboard.php");
} else {
    header("Location: index.php?error=1");
}

