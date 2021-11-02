<?php
session_start();
if(isset($_SESSION['log'])) {
	echo "welcome admin";
} else {
	header("location:login.php");
}
?>
<?php
error_reporting(0);
$sub=$_POST["out"];
if(isset($sub)) {
	session_unset();
	session_destroy(); 
	header("location: login.php");
	exit();
}
?>
<html>
<head><title>Welcome to admin section...</title>
<style>
.button {
  background-color: silver; /* Green */
  border: round;
  color: black;
  padding: 5px 15px;
  text-align: center;
  text-decoration: black;
  display: inline-block;
  font-size: 16px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 16px;
  text-decoration: solid;
}

li a:hover {
  background-color: #111111;
}
.field_set{
  border-color: black;
  border-style: solid;
  max-width: 500px;
  padding: 16px;
}
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
hr.new1 {
  border-top: 4px dashed black;
}
</style>
  <meta charset="UTF-8">  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<link rel = "icon" href = "ico.png" type = "image/x-icon">
<body background="admin.jpg">
<?php
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
	echo "Login Succesfull...\n";
	echo "<br>";
}
} else {
	redirect_to("login.php");
	echo "Username or Password Incorrect..";
}
?>
<?php
$id=$_POST["x"];
if(isset($id)) {
	header("location: search.php?id=$id");
	exit();
	}
?>
<form method="post" action="search.php">
<p style="color:black"><b>Enter the id number who's data you want to search: </b></p><input type="num" name="id" placeholder="search here">
<input type="submit" value="search" >
</form>
<form method="post" action="search.php">
<p style="color:black"><b>Enter the refrence number who's data you want to search: </b></p><input type="num" name="ref" placeholder="search here">
<input type="submit" value="search" >
</form>
<form method="post" action="search.php">
<p style="color:black"><b>Enter the product code who's data you want to search: </b></p><input type="num" name="ref1" placeholder="search here">
<input type="submit" value="search" >
</form>
<form method="post" action="search.php">
<fieldset class="field_set">
<legend style="color:white">Manipulation:</legend>
<p style="color:black"><b>Enter the Serial Number to delete a record: </b></p><input type="num" name="rec" placeholder="Type here">
<input type="submit" value="Delete" >
</form>
<p><a href="deleted.php" style="color:white">Click to add the deleted raw...</a></p>
</fieldset>
<form method="post" action="expotoexel.php">
<input type="submit" name="export" class="btn btn-success" value="Export to Excel" />
</form>
<form method="post" action="search.php">
<input type="submit" value="Logout" name="out" id="myButton" class="button" ></button>
<form>
<button onclick="location.href = 'search.php';" id="myButton" class="button" >Refresh</button>
<?php
$id=$_POST["id"];
$result = mysqli_query($connection,"SELECT * FROM customers where id like $id");
if (mysqli_num_rows($result) > 0) {
?>
  <table>
  <tr>
    <td>id:</td>
    <td>Reference Number:</td>
    <td>Customer Name:</td>
    <td>Mobile Number:</td>
    <td>E-mail:</td>
    <td>Address:</td>
    <td>Product Code:</td>
    <td>Serial Number:</td>
    <td>Date-time: </td>  
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["reference_number"]; ?></td>
    <td><?php echo $row["customer_name"]; ?></td>
    <td><?php echo $row["mobile_number"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
    <td><?php echo $row["product_code"]; ?></td>
    <td><?php echo $row["serial_number"]; ?></td>
    <td><?php echo $row["datetime"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
 <?php
} else {
    //echo "=========================================================================";
}
?>
</table>
<?php
$ref=$_POST["ref"];
$ref1=$_POST["ref1"];
$rec=$_POST["rec"];
$del = mysqli_query($connection,"DELETE FROM customers where serial_number like $rec");
if (mysqli_num_rows($del) > 0) {
	echo "Record succefully deleted...";
}
?>
<hr class="new1">
<?php
$result = mysqli_query($connection,"SELECT * FROM customers where reference_number like $ref");
if (mysqli_num_rows($result) > 0) {
?>
  <table>
  <tr>
    <td>id:</td>
    <td>Reference Number:</td>
    <td>Customer Name:</td>
    <td>Mobile Number:</td>
    <td>E-mail:</td>
    <td>Address:</td>
    <td>Product Code:</td>
    <td>Serial Number:</td>
    <td>Date-time: </td>  
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["reference_number"]; ?></td>
    <td><?php echo $row["customer_name"]; ?></td>
    <td><?php echo $row["mobile_number"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
    <td><?php echo $row["product_code"]; ?></td>
    <td><?php echo $row["serial_number"]; ?></td>
    <td><?php echo $row["datetime"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
 <?php
} else {
    //echo "==========================";
}
?>
<hr class="new1">
</table>
<?php
//echo "==================================================================================";
$result = mysqli_query($connection,"SELECT * FROM customers where product_code like $ref1");
if (mysqli_num_rows($result) > 0) {
?>
  <table>
  <tr>
    <td>id:</td>
    <td>Reference Number:</td>
    <td>Customer Name:</td>
    <td>Mobile Number:</td>
    <td>E-mail:</td>
    <td>Address:</td>
    <td>Product Code:</td>
    <td>Serial Number:</td>
    <td>Date-time: </td>  
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["reference_number"]; ?></td>
    <td><?php echo $row["customer_name"]; ?></td>
    <td><?php echo $row["mobile_number"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
    <td><?php echo $row["product_code"]; ?></td>
    <td><?php echo $row["serial_number"]; ?></td>
    <td><?php echo $row["datetime"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
 <?php
} else {
    //echo "No result found";
}
?>
<?php
  $start=1;
  $limit=100;

  $t=mysqli_query($connection,"select * from customers");
  $total=mysqli_num_rows($t);
   
   if(isset($_GET['id'])) {
     $id=$_GET['id']; 
     $start=($id-1)*$limit;
   } else {
        $id=1;
   }
   $page=ceil($total);

   $query=mysqli_query($connection,"select * from customers limit $start, $limit");
 ?>
<div class="container">
 <h2>Database</h2>
<form method="post" action="search.php">
<input type="submit" value="Jump to page" size="5">
<input type="num" name="x" value="" placeholder="page number" maxlength="10" size="8"><br>
</form>
    <table id="example" class="display" border="5" cellspacing="25">
    <head>
      <tr>
   <td>id:</td>
    <td>Reference Number: </td>
    <td>Customer Name: </td>
    <td>Mobile Number: </td>
    <td>E-mail: </td>
    <td>Address: </td>
    <td>Product Code: </td>
    <td>Serial Number: </td>
    <td>Date-time: </td>
 </tr>
</head>

<?php
  while($ft=mysqli_fetch_array($query))
 {?>
 <tr>
    <td><?php echo $ft["id"]; ?></td>
    <td><?php echo $ft["reference_number"]; ?></td>
    <td><?php echo $ft["customer_name"]; ?></td>
    <td><?php echo $ft["mobile_number"]; ?></td>
    <td><?php echo $ft["email"]; ?></td>
    <td><?php echo $ft["address"]; ?></td>
    <td><?php echo $ft["product_code"]; ?></td>
    <td><?php echo $ft["serial_number"]; ?></td>
    <td><?php echo $ft["datetime"]; ?></td>
  </tr>
<?php
 }
?>
</table>
 <ul class="pagination">
  <?php if($id > 1) {?> <li><a href="?id=<?php echo ($id-1); ?>">Previous</a></li><?php } ?>
  <?php
  for($i=1; $i<=$page; $i++){
   ?>
  <li><a href="?id=<?php echo $i; ?>"><?php echo $i; ?></a></li>
   <?php
   }
?>
</table>
<script type="text/javascript">
       $(document).ready(function(){
       var baseurl = "http://localhost/php/search.php";
       var xmlhttp = new XMLHttpRequest();
       xmlhttp.open("GET",baseurl+"/all",true);
       xmlhttp.onreadystatechange = function(){
         if(xmlhttp.readyState==4 && xmlhttp.status ==200){
           var persons = JSON.parse(xmlhttp.responseText);
           $("#example").DataTable({
            data:persons,
            "columns":[
              {"data":"id"},
              {"data":"reference_number"},
              {"data":"customer_name"},
              {"data":"mobile_number"},
              {"data":"email"},
              {"data":"address"},
              {"data":"product_code"},
              {"data":"serial_number"}
            ]
           });
         }
       };
       xmlhttp.send();
      });
</script>
</body>
</html>
