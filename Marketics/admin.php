<?php
session_start();
$_SESSION['log']=$_SESSION['logged'];
?>
<html>
<head><title>Welcome to admin panel..</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
<link rel = "icon" href = "ico.png" type = "image/x-icon">
<body background="admin.jpg">
<?php
error_reporting(0);
$usr=$_POST["usr"];
$pwd=$_POST["pwd"];
if($usr=='admin' && $pwd=='12345') {
$servername = "localhost";
$username = "vicky";
$password = "vicky123";
$dbname = "markets";
$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
} else {
	echo "Connected...\n";
	echo "<br>";
}
} else {
	 echo "Login Successfull...";
		header("Location: search.php"); 
  		exit; 
}
?>
</body>
</html>
