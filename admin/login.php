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

	$result = mysqli_query($conn, "SELECT * FROM admins WHERE username = '$username'");

	// cek username
	if( mysqli_num_rows($result) === 1 ) {
        $_SESSION['username'] = $username;
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



if( isset($_POST["register"]) ) {

	if( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
			  </script>";
	} else {
		echo mysqli_error($conn);
	}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mahastore | Admin Login</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body style="background-image: url(../images/new-planet-portal-4k-7o-1920x1080.jpg); background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

    <div class="container" style="margin-top: 80px;">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5" style="background: rgba(255, 255, 255, 0.18);
                border-radius: 16px;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(5.5px);
                -webkit-backdrop-filter: blur(5.5px);">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background-image: url(../images/wp6424612.jpg); 
                            background-attachment: fixed;
                            background-position: right;
                            background-repeat: no-repeat;
                            background-size: cover;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center" >
                                        <h5 style="color: white; "  >Login Admin</h5>
                                    </div>
                                    <form method="post" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" name="username" aria-describedby="emailHelp"
                                                placeholder="Enter Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password" required>
                                        </div>
                                        <?php if( isset($error) ) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                username / password salah!
                                            </div>
                                        <?php endif; ?>
                                        <button name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a href="#" class="small" data-toggle="modal" data-target="#registerModal" style="color: white;">Register</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Register Administration Account</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form method="post" class="user">
                            <input type="text" class="form-control form-control-user"
                                id="nama" name="nama" placeholder="Full Name" required>
                            <br>
                            <input type="text" class="form-control form-control-user"
                                id="username" name="username" placeholder="Enter Username" required>
                            <br>
                            <input type="password" class="form-control form-control-user"
                                id="password" name="password" placeholder="Password" required>
                            <br>
                        </div>  
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit" name="register">Register</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
<br>
<footer class="sticky-footer bg-black" style="background: rgba(255, 255, 255, 0.18);
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(5.5px);
                -webkit-backdrop-filter: blur(5.5px);">
        <div class="container my-auto" >
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Hamzah Raihan Ikhsanul Fikri</span>
            </div>
        </div>
    </footer>
</html>