<?php
session_start();
error_reporting(1);
function random_strings($length_of_string) 
{ 
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';  
    return substr(str_shuffle($str_result),  
                       0, $length_of_string); 
}   
echo "\n"; 
$cap=random_strings(5); 
$_SESSION["cap"]="$cap";
?> 
<html>
<title>Marketicks</title>
<head>
<style>
.field_set{
  border-color: white;
  border-style: solid;
  max-width:500px;
  padding:16px;
}
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
input[type=txt], select, textarea {
  width: 20%;
  padding: 3px;
  border: 1px solid #zzz;
  border-radius: 2px;
  resize: vertical;
}
.variablecolor{
  color: red;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<link rel = "icon" href = "ico.png" type = "image/x-icon">
<center>
<p style="color:white"><h1><b1>Marketicks</b1></h1></p>
<p><a href="login.php" style="color:white">Click to log in as admin..</a></p>
<body background="pro.jpg"> 
<p style="color:white"><b><i>Fill the form with accurate details:-</i><b></p>
<form method="post" action="save.php">
<fieldset class="field_set">
<legend style="color:white">Details:</legend>
<?php
echo "<p style='color:red;'>".$_SESSION['message']."</p>";
unset($_SESSION['message']);
?>
<p style="color:white"><b>Reference Number:</b></p><input type="num" id="rnum" name="rnum" value="" size="25" placeholder="Reference Number" required><br>
<p style="color:white"><b>Customer Name:</b></label><br><input type="text" id="cname" name="cname" value="" size="25" placeholder="Customer Name" required><br>
<br>
<p style="color:white"><b>Mobile Number:</b></label><br><input type="num" id="monum" name="monum" value="" size="25" maxlength="10" placeholder="Mobile Number"><br>
<small id="emailHelp" class="form-text text-muted">Type your 10 digit mobile number here.</small>
<br>
<br>
<p style="color:white"><b>E-mail:          </b></label><br><input type="text" id="mail" name="mail" value="" size="25" placeholder="E-mail" required><br>
<br>
<p style="color:white"><b>Address:         </b></label><br><input type="text" id="add" name="add" value="" size="25" placeholder="Address" required><br>
<br>
<p style="color:white"><b>Product Code:    </b></label><br><input type="num" id="code" name="code" value="" size="25" placeholder="Product Code" required><br>
<br>
<p style="color:white"><b>Serial Number:    </b></label><br><input type="text" id="snum" name="snum" value="" size="25" placeholder="Serial Number" required><br>
<br>
<label>Enter captcha</label>
<input type="txt" name="captcha" id="captcha_code" required/><?php echo $cap ?><br><br>
<input type="submit" class="button" value="submit">
<input type="reset" class="button" value="reset">
</fieldset>
</form>
</center>
</body>
 <!-- <footer>
  <p style="color:white">Developed by: Vicky</p>
  <p><a style="color:white">Vicky542011@gmail.com</a></p>
</footer>
--> 
</html>
