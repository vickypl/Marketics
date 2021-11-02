<?php
session_start();
if(isset($_SESSION['log'])) {
	echo " ";
} else {
	header("location:login.php");
}
error_reporting(0);
$usr='admin';
$pwd='12345';
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
	redirect_to("login.php");
	echo "Username or Password Incorrect..";
}
?>
<html>
<head><title>Deletion</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
input[type=text], select, textarea {
  width: 70%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=num], select, textarea {
  width: 70%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
.button[type=submit] {
  background-color: Transparent;
  color: white;
  border: 5px solid white;
}
.button[type=reset] {
  background-color: Transparent;
  color: white;
  border: 5px solid white;
}
</style>
</head>
<link rel = "icon" href = "ico.png" type = "image/x-icon">
<body background="admin.jpg">
<center>
<p style="color:white"><b><i>Re-enter the details along with privious id number:-</i><b></p>
<form method="post" action="deleted.php">
<p style="color:white"><b>id:</b></p><input type="num" id="id" name="id" value="" size="25" placeholder="id" required><br>
<br>
<p style="color:white"><b>Reference Number:</b></p><input type="num" id="rnum" name="rnum" value="" size="25" placeholder="Reference Number" required><br>
<br>
<p style="color:white"><b>Customer Name:</b></label><br><input type="text" id="cname" name="cname" value="" size="25" placeholder="Customer Name" required><br>
<br>
<p style="color:white"><b>Mobile Number:   </b></label><br><input type="num" id="monum" name="monum" value="" size="25" placeholder="Mobile Number" required><br>
<br>
<p style="color:white"><b>E-mail:          </b></label><br><input type="text" id="mail" name="mail" value="" size="25" placeholder="E-mail" required><br>
<br>
<p style="color:white"><b>Address:         </b></label><br><input type="text" id="add" name="add" value="" size="25" placeholder="Address" required><br>
<br>
<p style="color:white"><b>Product Code:    </b></label><br><input type="num" id="code" name="code" value="" size="25" placeholder="Product Code" required><br>
<br>
<p style="color:white"><b>Serial Number:    </b></label><br><input type="text" id="snum" name="snum" value="" size="25" placeholder="Serial Number" required><br>
<br>
<input type="submit" class="button" value="submit">
<input type="reset" class="button" value="reset">
</form>
<p><a href="search.php" style="color:white">Click to go back..</a></p>
</center>
<?php
$id=$_POST["id"];
$rnum = $_POST["rnum"];
$cname = $_POST["cname"];
$monum = $_POST["monum"];
$mail = $_POST["mail"];
$add = $_POST["add"];
$code = $_POST["code"];
$snum = $_POST["snum"];
//$sql = "insert into customers (reference_number, customer_name, mobile_number, email, address, product_code, serial_number) values('434', 'abc', '545343434', 'vicky@123.com', 'stree,43', '54434', '5435')";
$query = "insert into customers (id, reference_number, customer_name, mobile_number, email, address, product_code, serial_number) values ('{$id}', '{$rnum}', '{$cname}', '{$monum}', '{$mail}', '{$add}', '{$code}', '{$snum}')";
$result = mysqli_query($connection, $query);
if($result) {
	header("Location: search.php");
	exit();
	echo "Data successfully saved.<br>";
} else {
	echo "Data input failed(Duplicate id).<br>";
}
?>
</body>
</html>
