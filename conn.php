<?php
	$conn=new mysqli("localhost","root","","banking");
    if ($conn-> connect_error)
    {
    	die("connection failed:". $conn-> connect_error);
    }
?>