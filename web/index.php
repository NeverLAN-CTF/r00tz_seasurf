<html>
 <center>
  	<h1>Welcome To haxnet</h1>
	<br>
	<h2>Please Login Below</h2>
	<br>

    <?php
    if (isset($_GET['error'])) {
        echo('<h3>Either the username or password was incorrect.</h3>');
        echo('<p><a href="messages_send.php">Send administrator a message.</a></p>');
    }
    ?>

<form action="login.php" method="POST">
	<input type="text" name="username" class="textbox" placeholder="Username" />
	<br>
	<br>
	<input type="password" class="textbox" name="password" placeholder="Password"  />  
	<br>
	<br>
	<input type="submit" name="submit" value="Login" />
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

