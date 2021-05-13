<!DOCTYPE html>
<html>
<head>
	<title>All Customers</title>
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
      <li class="nav-item">
        <a class="nav-link" href="intro.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
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
  	<div class="context">
  	</div>
  	<br>
  <div class="container">
    <form action="_GET">                                                                                 
  <div class="table-responsive">          
  <table class="table table-hover table-bordered table-sm" id="data">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email-id</th>
        <th>Age</th>
        <th>Current Balance</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	$conn=new mysqli("localhost","root","","banking");
    	if ($conn-> connect_error){
    		die("connection failed:". $conn-> connect_error);
    	}

    	$sql= "SELECT id, name, email,age,balance from customers";
    	$result=$conn-> query($sql);
      $i=1;
    	if ($result->num_rows >0){
    		while ($row = $result->fetch_assoc()) {
          ?>
    			<tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo$row["email"]; ?></td>
            <td><?php echo$row["age"]; ?></td>
            <td><?php echo$row["balance"]; ?></td>
            <td style="color: black"><a href="transfer.php?id=<?php echo $row['id']; ?>">View</a></td>
          </tr>
    		 <?php 
    		}
    	
    		echo "</body></table>";
    	}
    	else{
    		echo "no result";
    	}
    	$conn->close();
    	?>
    	</tbody>
    </table>
  </form>
  </div>
</div>
</div>
</body>
	<footer>
		<div class="footer bg-dark" style="text-align: center;color: white;">All India Banking, Some Rights Reserved</div>
	</footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</html>