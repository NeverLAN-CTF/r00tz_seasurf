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

// If form submission than add the user.
if (isset($_GET['submit'])) {
    $dbserver = "localhost";
    $dbuser = "happy_hxar";
    $dbpassword = "yajnidIcIsdedbobgeabcavDafQuioS";
    $dbname = "seasurf";
    
    $conn = new PDO("mysql:host=" . $dbserver . ";dbname=" . $dbname, $dbuser, $dbpassword);
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
    $stmt->bindParam(":username", $_GET['username']);
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Row returned so the username has already been used
    if (isset($row['password'])) {
        header("Location: user_add.php?error=1");
        die();
    }

    $password = password_hash($_GET['password'], PASSWORD_BCRYPT);
    $admin = isset($_GET['admin']) ? $_GET['admin'] : 0;

    $conn = null;
    $conn = new PDO("mysql:host=" . $dbserver . ";dbname=" . $dbname, $dbuser, $dbpassword);
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO users (username, password, admin) VALUES(:username, :password, :admin)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":username", $_GET['username']);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":admin", $admin, PDO::PARAM_INT);
    $stmt->execute();
}
?>

<html>
<head>
    <title>Add user</title>
</head>

<body>
<h1>Add a new user</h1>

<?php
if (isset($_GET['error'])) {
    echo('<h3>Username is already in use.</h3>');
}
?>

<form action="user_add.php" method="GET">
    <label for="username">Username: </label><input type="text" name="username"><br />
    <label for="password">Password: </label><input type="password" name="password"><br />
    <label for="admin">Admin: </label><input type="checkbox" name="admin" value="1"><br />
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

