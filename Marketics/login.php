<?php
session_start();
?>
<html>
<head><title>Welcome to admin panel..</title>
<style>
.field_set{
  border-color: black;
  border-style: double;
  max-width:500px;
  padding:16px;
  opacity: 10;
}
body {
	color: black;
}
h1 {
	color: black;
}
p {
	color: rgb(0,0,255)
}
input[type=text], select, textarea {
  width: 60%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=password], select, textarea {
  width: 60%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
.button[type=submit] {
  background-color: Transparent;
  color: black;
  border: 6px solid white;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<link rel = "icon" href = "ico.png" type = "image/x-icon">
<body background="admin.jpg">
<center>
<h1>Admin Login</h1>
<form action="login.php" method="post">
<fieldset class="field_set">
<legend style="color:black">Login panel:</legend>
  <div class="imgcontainer">
    <img src="ico.png" alt="Avatar" class="avatar">
  </div>
<br >

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="usr" required><br>
	<br>
    <label for="pwd"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" required><br>
	<br>
        
    <button type="submit" class="button">Login</button>
  </div>
</fieldset>
</form>
</center>
<center>
<?php
error_reporting(0);
if($_POST["usr"]=='admin' && $_POST["pwd"]=='12345') {
  $_SESSION['logged']='admin';
  header("Location:admin.php");
  exit();
} elseif($_POST["usr"]!='' && $_POST["pwd"]!='') {
    echo "Username or Password Invalid";
}
?>
<?php
/*
error_reporting(0);
if($_POST["usr"]=='admin' && $_POST["pwd"]=='12345') {
$_SESSION['logged']='admin';
$servername = "localhost";
$username = "vicky";
$password = "vicky123";
$dbname = "markets";
$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
} else {
	header("Location: admin.php");
	exit();
}
} 
//if($_POST["usr"]!='admin' && $_POST["pwd"]!='12345' && $_POST["usr"]!= '' && $_POST["pwd"]!='') {
  //$_SESSION['msg']='Username or Password Incorrect...';
	//$msg='try failed';
  //echo $_SESSION['msg'];
  echo $msg;
*/
?>
</center>
</body>
</html>
