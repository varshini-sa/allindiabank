<!DOCTYPE html>
<html>
<head>
	<title>Customer</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">All India Bank</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="intro.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view.php">View Customers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="history.php">Transaction History</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
    </ul>
  </div>
 </nav>
 <div class="body">
 	<br>
 	<b><p style="text-align:center;font-size:32px ; ">Customer Details</p></b>
 	<div class="section">
 		 <div class="table-responsive">          
  			<table class="table table-hover table-bordered tab">
   			 <thead class="thead-dark">
      			<tr>
       			<th>ID</th>
        		<th>Name</th>
        		<th>Email-id</th>
        		<th>Age</th>
        		<th>Current Balance</th>
     		 	</tr>
    		 </thead>
    		 <tbody>
    		 <?php
    		$conn=new mysqli("localhost","root","","banking");
    		if ($conn-> connect_error){
    			die("connection failed:". $conn-> connect_error);
    		}
    		$id= $_GET['id'];
    		$sql= "SELECT id, name, email,age,balance from customers where id= $id "; 
    		$result=$conn-> query($sql);

    		if ($result->num_rows >0){
    			 while($row = $result->fetch_assoc()) {
    			echo ("<tr><td>".$row["id"]."</td><td>". $row["name"]."</td><td>".$row["email"]."</td><td>".$row["age"]."</td><td>".$row["balance"]."</td></tr>");
    		}
    			echo "</tbody></table>";
    		}
    		else{
    		echo "no result";
    		}
    		$conn->close();
    		?>
  		</div>
  		<br><br>

 	</div>
 	<div class="w-50 m-auto">
 		<form action="transact.php?id=<?php echo $id; ?>" method="post">
 		<div class="form-group">
      		<label for="sel">Select User</label>
      <select class="form-control" id="sel" name="touser">
      	<?php
    		$conn=new mysqli("localhost","root","","banking");
    		if ($conn-> connect_error){
    			die("connection failed:". $conn-> connect_error);
    		}

    		$sql= "SELECT name from customers";
    		$result=$conn-> query($sql);

    		if ($result->num_rows >0){
    			 while($row = $result->fetch_assoc()) {
    			echo ("<option>".$row["name"]."</option>");
    			}
    		}
    		else{
    		echo "no result";
    		}
    		$conn->close();
    		?>
      </select>
    	</div>
    	<div class="form-group">
     		<label for="amt">Amount:</label>
     		<input type="number" class="form-control" name="amount" placeholder="Enter amount">
    	</div>
    	<button type="transfer" class="btn btn-primary bg-dark">Transfer</div></button>
		</form>
 	</div>

</div>
 <footer><div class="footer bg-dark" style="color: white; text-align: center;">All India Banking, Some rights reserved</div></footer>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>