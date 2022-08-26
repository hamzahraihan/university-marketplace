<?php 
session_start();
require 'function.php';

if( isset($_SESSION["login"]) ) {
	header("Location: index.php");
	exit;
}


if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			
			$_SESSION["login"] = $row;
			header("Location: index.php");
			exit;
		}
	}

	$error = true;

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mahastore | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/style-log.css">

    </head>
  <body style="background-image: url(images/wp6424612.jpg); background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

	<section class="ftco-section" >
		<div class="container">
		
			<div class="row justify-content-center"  >
				<div class="col-md-6 col-lg-4" >
					<div class="login-wrap py-5" style="background: rgba(255, 255, 255, 0.18);
						border-radius: 16px;
						box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
						backdrop-filter: blur(5.5px);
						-webkit-backdrop-filter: blur(5.5px);">
						<div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/521004.webp);"></div>
							<h3 class="text-center mb-0">Welcome</h3>
							<p class="text-center">Log in by entering the information below</p>
									<form action="" method="post" class="login-form">
								<div class="form-group">
									<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
									<input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
								</div>
							<div class="form-group">
								<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
							<input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
							</div>
							<?php if( isset($error) ) : ?>
								<div class="alert alert-danger" role="alert">
                                    username / password salah!
                                </div>
							<?php endif; ?>
							<div class="form-group">
								<button type="submit" name="login" class="btn form-control btn-primary rounded submit px-3">Log in</button>
							</div>
						</form>
						<div class="w-100 text-center mt-4 text">
							<p class="mb-0">Don't have an account?</p>
							<a href="register.php">Sign Up</a>
						</div>
	       			 </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  
    </body>
	<footer style="padding: 30px; background: rgba(255, 255, 255, 0.18);
				box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
				backdrop-filter: blur(5.5px);
				-webkit-backdrop-filter: blur(5.5px);"">
		<div class="container my-auto">
			<div class="copyright text-center my-auto">
				<span>Copyright &copy; Hamzah Raihan Ikhsanul Fikri</span>
			</div>
		</div>
	</footer>
</html>