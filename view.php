<?php
	// add code here
require_once ('database.php');
$res = $database->read();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rakith's Pizzeria!</title>
	<meta name="description" content="Pizza menu">
	<meta name="robots" content="noindex, nofollow">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="./css/stl.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body>
	<header>
    <nav class="navbar navbar-dark bg-danger">
      <div class="container-fluid">
		  <a class="navbar-brand" href="index.php"><img src="./img/pizza%20chef.jpg" alt= "header logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="view.php">Receipt</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
<div class="container">
	<div class="row">
		<table class="table">
			<tr>
				<th>#</th>
				<th>Full Name</th>
				<th>Email</th>
				<th>Phone Number</th>
				<th>Address</th>
				<th>Pizza Type</th>
			</tr>
			<?php
				// add code here
			while($r = mysqli_fetch_assoc($res)){
				?>
				<tr>
					<td><?php echo $r['id']; ?></td>
					<td><?php echo $r['fname'] . " " . $r['lname']; ?></td>
					<td><?php echo $r['email']; ?></td>
                    <td><?php echo $r['phoneNum'];?></td>
					<td><?php echo $r['address'];?></td>
					<td><?php echo $r['pizzatype']; ?></td>
				</tr>
			<?php
			}
			?>
		</table>
	</div>
</div>
</body>
</html>
