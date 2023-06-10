<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rakith's Pizzeria!</title>
    <meta name="description" content="Pizza menu">
    <meta name="robots" content="noindex, nofollow">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
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
<section class="masthead">
    <div>
        <h1>Rakith's Pizzeria!</h1>
    </div>
</section>
<main class="container">
    <section class="form-row row justify-content-center">
        <?php
        if($_SERVER[REQUEST_METHOD] == "POST"){
            // Create our Variables
            $fname = trim($_POST['fname']);
            $lname = trim($_POST['lname']);
            $email = trim($_POST['email']);
            $phoneNum = trim($_POST['phoneNum']);
            $address = trim($_POST['address']);

            // add our error variables
            $error = '';

            // now for our validation
            if(empty($fname)){
                $error = "<p>First name needed!</p>";
            }else if (empty($lname)){
                $error = "<p>Last name needed!</p>";
            }else if(empty($email)){
                $error = "<p>Email is needed!</p>";
            }else if(!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email)){
                $error = "<p>Not a valid email!</p>";
            }else if(empty($phoneNum)){
                $error = "<p>Phone number needed!</p>";
            }else if(!is_numeric($phoneNum)){
                $error = "<p>Please use numbers only!</p>";
            }else if(strlen($phoneNum) != 10) {
                $error = "<p>Phone number should be 10 numbers long</p>";
            }else if(empty($address)){
                $error = "<p>Address needed!</p>";
            }

            if (!empty($error)) {
                echo $error;
            } else {
                // Success message or other actions
                echo "<script>alert('Order up! Please check receipt to view your order.');</script>";
            }
        }
        ?>

        <form method="post" class="form-horizontal col-md-6 col-md-offset-3">
            <h2>Order here!</h2>

            <div class="form-group">
                <label for="input1" class="form-label">First Name:</label>
                <div>
                    <input type="fname" name="fname" class="form-control" id="input1">
                </div>
            </div>

            <div class="form-group">
                <label for="input2" class="form-label">Last Name:</label>
                <div>
                    <input type="lname" name="lname" class="form-control" id="input2">
                </div>
            </div>


            <div class="form-group">
                <label for="input3" class="control-label">Your Email:</label>
                <div>
                    <input type="email" name="email" class="form-control" id="input3">
                </div>
            </div>

            <div class="form-group">
                <label for="input4" class="control-label">Phone Number:</label>
                <div>
                    <input type="tel" name="phoneNum" class="form-control" id="input4">
                </div>
                <div id="fname" class="form-text">Must be 10 digits</div>
            </div>

            <div class="form-group">
                <label for="input5" class="control-label">Address:</label>
                <div>
                    <input type="text" name="address" class="form-control" id="input5">
                </div>
            </div>

            <div class="form-group">
                <label for="input6" class="control-label">Pizza Type:</label>
                <div>
                    <select name="pizzatype" class="form-control">
                        <option>Select Your Pizza</option>
                        <option value="Cheese">Cheese Pizza</option>
                        <option value="Veggie">Veggie Pizza</option>
                        <option value="Chicken">Chicken Pizza</option>
                    </select>
                </div>
                <div id="fname" class="form-text">Choose your pizza!</div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary col-md-2 col-md-offset-10">
            </div>

        </form>
        <div class="form-group submit-message">
            <?php
            require_once ('database.php');
            if (isset($_POST)& !empty($_POST)) {
                $fname = $database->sanitize($_POST['fname']);
                $lname = $database->sanitize($_POST['lname']);
                $email = $database->sanitize($_POST['email']);
                $phoneNum = $database->sanitize($_POST['phoneNum']);
                $address = $database->sanitize($_POST['address']);
                $pizzatype = $database->sanitize($_POST['pizzatype']);
                $result = $database->create($fname, $lname, $email, $phoneNum, $address, $pizzatype);
                if ($result) {
                    echo "<p>Order up!</p>";
                } else {
                    echo "<p>Opps try again!</p>";
                }
            }
            ?>
        </div>
    </section>
</main>
</body>
</html>
