<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}
 
require 'function.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
if (isset($_SESSION['produk-cart'][$id])){
    $_SESSION['produk-cart'][$id]+=1;
} else {
    $_SESSION['produk-cart'][$id] = 1;
}

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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <!--bootstrap CSS-->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--Style-->
    <link rel="stylesheet" href="css/style-navbar.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Mahastore | Keranjang Anda</title>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container-fluid">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu</button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="index.php" class="nav-link"><i class='bx bxs-store' style="color:red;"></i></i> MAHASTORE</a></li>
                </ul>
                <ul class="navbar-nav m-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item active"><a href="produk-cart.php" class="nav-link">Cart</a></li>
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
    
    <div class="container">
        <h1>Keranjang Belanja</h1>
        <div class="col d-flex justify-content-end mb-2">
            <a href="allHapus-cart.php" class="btn btn-outline-dark btn-flat btn-sm" type="button" id="empty_cart">Empty Cart</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>No.</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                error_reporting(0);
                $i = 1;
                foreach ($_SESSION['produk-cart'] as $id => $jumlah):
                
                $ambil = $conn->query("SELECT * FROM produk WHERE id = '$id' ");
                $row = $ambil->fetch_assoc();
                $subharga = $row["harga"]*$jumlah;
                ?>
                <tr>
                    <td><a href="hapus-cart.php?id=<?= $id ?>" class="btn btn-outline-dark btn-flat btn-sm"><span class="fa fa-trash text-danger"></span></a></td>
                    <td><?= $i++; ?></td>
                    <td><?= isset($row['nama_barang']) ? $row['nama_barang'] : '';?></td>
                    <td>Rp.<?= number_format($row["harga"]);  ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td>Rp.<?= number_format($subharga);  ?></td>
                </tr>
            <?php 
            endforeach
            ?>
            </tbody>
        </table>
        <a href="checkout.php" class="btn btn-outline-dark btn-flat btn-sm">Checkout</a>
        <a href="index.php" class="btn btn-outline-dark btn-flat btn-sm">Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/main.js"></script>

</body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer class="sticky-footer bg-black" style="padding: 30px;">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Hamzah Raihan Ikhsanul Fikri</span>
        </div>
    </div>
</footer>
</html>