<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
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
      <li class="nav-item">
        <a class="nav-link" href="view.php">View Customers</a>
      </li>
      <li class="nav-item active">
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
	<div class="container">
    <form action="_GET">                                                                                 
  <div class="table-responsive">          
  <table class="table table-hover table-bordered table-sm" id="data">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>Sender</th>
        <th>Reciever</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $conn=new mysqli("localhost","root","","banking");
      if ($conn-> connect_error){
        die("connection failed:". $conn-> connect_error);
      }

      $sql= "SELECT id, user, recip,amount from transaction";
      $result=$conn-> query($sql);
      $i=1;
      if ($result->num_rows >0){
        while ($row = $result->fetch_assoc()) {
          ?>
          <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["user"]; ?></td>
            <td><?php echo$row["recip"]; ?></td>
            <td><?php echo$row["amount"]; ?></td>
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



	<footer><div class="footer bg-dark" style="color: white; text-align: center;">All India Banking, Some rights reserved</div></footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>