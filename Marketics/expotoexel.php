<?php
	$con = mysqli_connect("localhost","vicky","vicky123","markets");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
	}

	$sql = "select * from customers";
	$statement = $con->prepare($sql);
	

	$result = mysqli_query($con, $sql);
	 //print_r($result);
	 header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	 header("Content-Disposition: attachment;filename=\"Markets_db.xls\"");
	 header("Cache-Control: max-age=0");
	mysqli_close($con);

?> 
<!DOCTYPE html>
<html>
<head>
<title>Welcom</title>
</head>
<body>
<table>
	<thead>
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
	</thead>
	<tbody>
		
			<?php 
				while ($row = $result->fetch_object()) {
			?>
				<tr>
					<td><?php  echo $row->id;  ?></td>
					<td><?php  echo $row->reference_number;  ?></td>
					<td><?php  echo $row->customer_name;  ?></td>
					<td><?php  echo $row->mobile_number;  ?></td>
					<td><?php  echo $row->email;  ?></td>
					<td><?php  echo $row->address;  ?></td>
					<td><?php  echo $row->product_code;  ?></td>
					<td><?php  echo $row->serial_number;  ?></td>
					<td><?php  echo $row->datetime;  ?></td>
				</tr>
			<?php
			 } 
			?>	
	</tbody>
</table>
</body>
</html>
