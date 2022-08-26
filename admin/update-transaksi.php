<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'function.php';

// ambil data di URL
$id = $_GET['id'];

$transaksi = query("SELECT * FROM transaksi WHERE id_pembelian = '$id'")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil diubah atau tidak
	if( ubah_transaksi($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			</script>
		";
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

    <title>Mahastore Admin | Update Transaksi</title>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon ">
                <i class='bx bxs-store'></i>
                </div>
                <div class="sidebar-brand-text mx-3">Mahastore</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- List Produk -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard-produk.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Produk List</span></a>
            </li>

            <!-- List Pelanggan -->
            <li class="nav-item">
                <a class="nav-link" href="pelanggan.php">
                    <i class="nav-icon fas fa-users"></i>
                    <span>Pelanggan List</span></a>
            </li>

            <!-- list pembelian -->
            <li class="nav-item active">
                <a class="nav-link" href="detail-pembelian.php">
                    <i class="nav-icon fas fa-users"></i>
                    <span>List Pembelian</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->

           
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                
                <div class="container-fluid">

                <div class="container"

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update Produk</h6>
                        </div>
                        <div class="container">
                            <div class="table-responsive">
                                <form action="" method="post" id="transaksi" enctype="multipart/form-data">
                                <input type="hidden" name="id_pembelian" value="<?= $transaksi["id_pembelian"]; ?>">
                                    <div class="mb-3">
                                        <label for="id_pelanggan" class="form-label"> ID Pelanggan : </label>
                                        <input type="text" class="form-control" name="id_pelanggan" id="id_pelanggan" value="<?= $transaksi["id_pelanggan"]; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_barang" class="form-label"> ID Barang : </label>
                                        <input type="text" class="form-control" name="id_barang" id="id_barang" value="<?= $transaksi["id_barang"]; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat : </label>
                                        <textarea id="summernote" class="form-control"  name="alamat" ><?= $transaksi["alamat"]; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal_transaksi" class="form-label">Tanggal transaksi : </label>
                                        <input type="text" class="form-control" name="tanggal_transaksi" id="tanggal_transaksi" value="<?= $transaksi["tanggal_transaksi"];?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status_pembayaran">Status :</label>
                                            <select name="status_pembayaran" id="status_pembayaran" class="custom-select selevt">
                                            <option value="1" <?php echo isset($status) && $status == 1 ? 'selected' : '' ?>>Sudah Bayar</option>
                                            <option value="0" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>Belum Bayar</option>
                                            </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah" class="form-label">Jumlah Produk : </label>
                                        <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?= $transaksi["jumlah"]; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="total_bayar" class="form-label">Total bayar: </label>
                                        <input type="text" class="form-control" name="total_bayar" id="total_bayar" value="<?= $transaksi["total_bayar"]; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary" name="submit">Ubah Data</button>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Hamzah Raihan Ikhsanul Fikri</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script>
      $('#summernote').summernote({
        placeholder: 'Description',
        tabsize: 2,
        height: 120
      });
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    
</body>

</html>