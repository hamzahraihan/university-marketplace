<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'function.php';

?>
<!doctype html>
<html lang="en">
    
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!--bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--Style-->
    <link rel="stylesheet" href="css/style-navbar.css">
    <link rel="stylesheet" href="/css/style.css">

    <title>Mahastore | Tentang kami </title>

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container-fluid">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu</button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="index.php" class="nav-link"><i class='bx bxs-store' style="color:red;"></i> MAHASTORE</a></li>
                </ul>
                <ul class="navbar-nav m-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item active"><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="produk-cart.php" class="nav-link">Cart</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           Halo, <?php echo $_SESSION['login']['nama']; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="logout.php">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>    
            </div>
        </div>
        
    </nav>
    <!-- END nav -->

    
    <div class="page-home" data-aos="zoom-in">
      <section class="store-landing" style="background-color: #F8F6F3; background-attachment: fixed; padding: 150px 0 150px 0;">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <h1 class="" style="font-size: 60px;">Mahastore</h1>
              <h5 class="">Toko online khusus Mahasiswa</h5>
              <a
                  href="https://wa.me/+62123456789"
                  target="_blank"
                  class="btn btn-success mt-2 px-4 py-2 text-white"
                  ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 18 18">
                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                </svg> Hubungi Kami</a
                >
            </div>
          </div>
        </div>
      </section>
      <section class="store-adventeges" id="adventeges">
        <div class="container">
          <div class="row text-center">
            <div class="col-12">
              <h2 class="font-weight-bold mb-2">Mahastore</h2>   
          </div>
          <div class="row text-center">
            <div class="col-md-12">
              <p>Mahastore merupakan website yang didirikan oleh mahasiswa untuk membantu para mahasiswa 
                  dalam bidang pendidikan,perdagangan, dan pekerjaan. Mahastore berkantor di Purwakarta. 
                  saat ini mahastore berfokus untuk membantu mahasiswa Universitas Singaperbangsa Karawang dalam 
                  memenuhi kebutuhan baik itu sumber belajar, alat tulis, jasa printing, jasa skripsi, dan lainnya.
              </p>
            </div>
          </div>
          <div class="row text-center" style="margin-top: 100px;">
            <div class="col-12">
              <h2 class="font-weight-bold">Visi dan Misi</h2>
            </div>
          </div>
          <div class="row justify-content-center text-center">
            <div class="col-md-6">
                <h5>Visi</h5>
                <p>Menjadi toko online mahasiswa yang dapat membantu mahasiswa untuk mendapatkan produk yang berkualitas dan bermanfaat</p>
            </div>
            <div class="col-md-6">
                <h5>Misi</h5>
                <p>Meningkatkan produktifitas mahasiswa dan memberikan lapangan pekerjaan khusus mahasiswa untuk mengurangi pengangguran</p>
            </div>
          </div>
        </div>
      </section>
    <br>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>
<footer class="sticky-footer bg-black" style="padding: 30px;">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Hamzah Raihan Ikhsanul Fikri</span>
        </div>
    </div>
</footer>
</html>