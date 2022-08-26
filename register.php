<?php 
require 'function.php';

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

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mahastore | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style-log.css">
</head>

<body style="background-image: url(images/wp6424612.jpg); background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
    <style>
        
    </style>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4" >
                    <div class="login-wrap py-5" style="background: rgba(255, 255, 255, 0.18);
                    border-radius: 16px;
                    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                    backdrop-filter: blur(5.5px);
                    -webkit-backdrop-filter: blur(5.5px);">
                    <div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/hero_2.jpg);"></div>
                    <h3 class="text-center mb-0">Welcome</h3>
                <p class="text-center">Sign up by entering the information below</p>
                <form action="" method="post" class="login-form">
                    <div class="form-group">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Fullname" required>
                    </div>
                    <div class="form-group">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group" >
                        <select class=" form-select " id="jk" name="jk" style="border-color: transparent ; background: rgba(255, 255, 255, 0.18);
                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                            backdrop-filter: blur(5.5px);
                            -webkit-backdrop-filter: blur(5.5px); color: 
                            grey; ">
                            <option value="3" >Jenis Kelamin</option>
                            <option value="0" id="jk">Perempuan</option>
                            <option value="1" id="jk">Laki-Laki</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="icon d-flex align-items-center justify-content-center"><i class='bx bxs-contact' style="color: white;"></i></div>
                        <input type="text" id="nohp" name="nohp" class="form-control" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group">
                        <div class="icon d-flex align-items-center justify-content-center"><i class='bx bx-home-alt' style="color: white;"></i></div>
                        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Address" required>
                    </div>
                <div class="form-group">
                    <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
                <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="register" class="btn form-control btn-primary rounded submit px-3">Sign up</button>
                </div>

            </form>
            <div class="w-100 text-center mt-4 text">
                <p class="mb-0">Already have account?</p>
                <a href="login.php">Log in</a>
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
                -webkit-backdrop-filter: blur(5.5px);">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Hamzah Raihan Ikhsanul Fikri</span>
            </div>
        </div>
    </footer>
</html>