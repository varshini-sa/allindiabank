<?php

$conn=new mysqli("localhost","root","","banking");
    if ($conn-> connect_error)
    {
    	die("connection failed:". $conn-> connect_error);
    }

$id= $_GET['id'];
$amt=$_POST['amount'];
$touser= $_POST['touser'];

$sql = "SELECT name FROM customers where id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		$name=$row['name'];
		$query="  INSERT INTO transaction(user,recip,amount) VALUES ('$name','$touser','$amt')   ";
		mysqli_query($conn,$query);
	}
}

$sql = "SELECT balance FROM customers where id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		$bal=$row['balance']-$amt;
		echo($bal);
		$query="  UPDATE customers SET balance='$bal' where id='$id'  ";
		mysqli_query($conn,$query);
	}
}

$sql = "SELECT balance FROM customers where name='$touser'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		$balen=$row['balance']+$amt;
		echo($balen);
		$query="  UPDATE customers SET balance='$balen' where name='$touser'  ";
		mysqli_query($conn,$query);
	}
}
header('location:success.php')
?>
