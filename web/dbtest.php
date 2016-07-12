<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$server = "localhost";
$dbuser = "happy_hxar";
$password = "yajnidIcIsdedbobgeabcavDafQuioS";
$dbname = "seasurf";
$username = "admin";

$conn = new PDO("mysql:host=" . $server . ";dbname=" . $dbname, $dbuser, $password);
$stmt = $conn->prepare("SELECT * FROM users WHERE uname=:user");
$stmt->bindParam(":user", $username);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

echo("username: " . $row['uname'] . "<br />");
echo("password: " . $row['passw'] . "<br />");
echo("admin status: " . $row['admin'] . "<br />");

