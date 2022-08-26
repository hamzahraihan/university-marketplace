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

    <title>Mahastore | Website keperluan Mahasiswa</title>

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
                    <li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
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
    
    <!-- Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false" style="margin: auto; padding: 10px; max-width: 1000px; ">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="images/carousel1.webp" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h6>Selamat Datang di Mahastore</h6>
                <p>Mahastore adalah toko online dari mahasiswa untuk mahasiswa</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="images/carousel2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <p>Produk Berkualitas<p>
                <p>Mahastore menjual produk berkualitas dengan harga murah banget!</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="images/carousel3.webp" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <p>Antar barang sangat cepat!</p>
                <p>Mahastore memiliki kurir khusus yang di rekrut dari mahasiswa sehingga antar barang akan semakin cepat </p>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
    <!-- End carousel -->

    
    <section class="konten">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php 
                    $qry = mysqli_query($conn,"SELECT * FROM produk");
                    while($row = $qry->fetch_assoc()){

                    ?>
                    <div class="col-md-3">
                        <br>
                        <div class="card" style="width: 14rem;">
                            <img src="admin/img/<?= $row["gambar"]; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p style="font-size: 15px;" class="card-title"><?= $row["nama_barang"]; ?></p>
                                
                                <p class="card-text">Rp. <?= number_format($row["harga"]) ; ?></p>
                                
                                <a href="detail-produk.php?id=<?= $row['id'];?>" class="btn btn-outline-dark btn-flat btn-sm">Beli</a>
                                <p><?php if($row['status'] == 1): ?>
                                    <span class="badge badge-success px-3 rounded-pill">Masih Ada</span>
                                <?php else: ?>
                                    <span class="badge badge-danger px-3 rounded-pill">Stok Habis</span>
                                <?php endif; ?></p>
                            </div>
                        </div>
                    </div>
                <?php 
                }
                ?>
                
                </div>
                
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