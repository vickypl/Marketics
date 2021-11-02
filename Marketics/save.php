<?php
session_start();
//echo $_SESSION["cap"];
//echo $_POST["captcha"];
if($_POST["captcha"]==$_SESSION["cap"]) {
//	echo "captcha matched";
} else {
	$_SESSION['message'] = 'Invalid captcha! try again...';
	header("location:index.php");
	exit();
}
?>
<html>
<head><title> </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
fieldset {
  background-color: #eeeeee;
}

legend {
  background-color: gray;
  color: blue;
  padding: 5px 5px;
}

input {
  margin: 5px;
}
</style>
</head>
<body background="db.jpg">
<link rel = "icon" href = "ico.png" type = "image/x-icon">
<?php
error_reporting(0);
$servername = "localhost";
$username = "vicky";
$password = "vicky123";
$dbname = "markets";
$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
} //else {
	//echo "Connected...\n";
	//echo "<br>";
//}
?> 
<?php
$rnum = $_POST["rnum"];
$cname = $_POST["cname"];
$monum = $_POST["monum"];
$mail = $_POST["mail"];
$add = $_POST["add"];
$code = $_POST["code"];
$snum = $_POST["snum"];
//$captcha= $_POST["captcha"];
//$query = "insert into customers (reference_number, customer_name, mobile_number, email, address, product_code, serial_number) values('434', 'abc', '545343434', 'vicky@123.com', 'stree,43', '54434', '5435')";
$query = "insert into customers (reference_number, customer_name, mobile_number, email, address, product_code, serial_number) values ('{$rnum}', '{$cname}', '{$monum}', '{$mail}', '{$add}', '{$code}', '{$snum}')";
//$query = "insert into customers (reference_number, customer_name, mobile_number, email, address, product_code, serial_number) values('{$_POST["rnum"]}', '{$_POST["cname"]}', '{$_POST["monum"]}', '{$_POST["mail"]}', '{$_POST["add"]}', '{$_POST["code"]}', '{$_POST["snum"]}')";
//$x=$rnum;
//$y=$cname;
//$z=$monum;
//$query="insert into customers(reference_number, customer_name, mobile_number)  values('{$x}', '{$y}', '{$z}')";
$result = mysqli_query($connection, $query);
if($result) {
	echo "Data successfully saved.<br>";
} else {
	echo "Data input failed.<br>";
}
//$sql = "SELECT id, reference_number, customer_name, mobile_number, email, address, product_code, serial_number FROM customers";
//$result = mysqli_query($connection, $sql);
//if($result) {
//	echo "Readed.<br>";
//} else {
//	echo "Failed.<br>";
//}
//echo "Refrence number:- $rnum";
//echo "<br>";
//echo "Customer name:- $cname";
//echo "<br>";
//echo "Mobile number:- $monum";
//echo "<br>";
//echo "E-mail:- $mail";
//echo "<br>";
//echo "Address:- $add";
//echo "<br>";
//echo "Product code:- $code";
//echo "<br>";
//echo "Serial number:- $snum";
$result = mysqli_query($connection,"SELECT id FROM customers where serial_number like $snum");
$row = mysqli_fetch_array($result);
$x="91{$monum}";
//echo "$x";
$y="Registration successfull id={$row["id"]}, Ref:-{$rnum}, Name:-{$cname}";
//echo "$y";
?>
<?php
	// Account details
	$apiKey = urlencode('bhRTzu4sGe4-Ythi6apk1sxpYIh9jnPdbCCemzijwd');
	
	// Message details
	$numbers = array($x);
	//$message = rawurlencode('Data saved. ref_num:'$_POST["rnum"]', Name:'$_POST["cnum"]'');
 	$message = rawurlencode($y);
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	//echo $response;
	echo "Message successfully delivered to admin";
?>
<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<center>
<FIELDSET>
<table style="width:50%">
<th>Your id number:- </th>
<td><?php echo $row["id"]; ?></td>
<tr>
<th>Refrence number:- </th>
<td><?php echo $rnum?></td>
<tr>
<th>Customer name:- </th>
<td><?php echo $cname?></td>
<tr>
<th>Mobile number:- </th>
<td><?php echo $monum?></td>
<tr>
<th>E-mail:- </th>
<td><?php echo $mail?></td>
<tr>
<th>Address:- </th>
<td><?php echo $add?></td>
<tr>
<th>Product code:- </th>
<td><?php echo $code?></td>
<tr>
<th>Serial number:- </th>
<td><?php echo $snum?></td>
</table>
<form action="index.php">
<input type="submit" value="Tap to add more info.">
</FIELDSET>
</form>
</center>
</body>
</html>
