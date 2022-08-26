<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "mahastore_db");

if(mysqli_connect_errno()){
    echo "koneksi ke server gagal dilakukan";
    exit();   
}


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $conn;

	$nama = htmlspecialchars($data["nama_barang"]);
	$deskripsi = $data["deskripsi"];
	$stok = htmlspecialchars($data["stok"]);
	$harga = htmlspecialchars($data["harga"]);
	$status = $data["status"];

	// upload gambar
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO produk
				VALUES
			  ('', '$nama', '$deskripsi', '$stok', '$harga', '$status','$gambar')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'webp'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}




function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM produk WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function hapus_data($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM pelanggan WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function hapus_pembelian($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM transaksi WHERE id_pembelian = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama_barang"]);
	$deskripsi = $data["deskripsi"];
	$stok = htmlspecialchars($data["stok"]);
	$harga = htmlspecialchars($data["harga"]);
	$status = $data["status"];
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	
	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}
	

	$query = "UPDATE produk SET
				nama_barang = '$nama',
				deskripsi = '$deskripsi',
				stok = '$stok',
				harga = '$harga',
				status = '$status',
				gambar = '$gambar'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}

function ubah_transaksi($data) {
	global $conn;

	$id = $data["id_pembelian"];
	$id_pelanggan = htmlspecialchars($data["id_pelanggan"]);
	$id_barang = $data["id_barang"];
	$alamat = $data["alamat"];
	$tanggal = $data["tanggal_transaksi"];
	$status = $data["status_pembayaran"];
	$jumlah = $data["jumlah"];
	$total = $data["total_bayar"];

	$query = "UPDATE transaksi SET
				id_pelanggan = '$id_pelanggan',
				id_barang = '$id_barang',
				alamat = '$alamat',
				tanggal_transaksi = '$tanggal',
				status_pembayaran = '$status',
				jumlah = '$jumlah',
				total_bayar = '$total'
			  WHERE id_pembelian = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}

function ubah_akun($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$jk = $data["jk"];
	$alamat = $data["alamat"];
	$nohp = $data["nohp"];
	$username = htmlspecialchars($data["username"]);
	$password = $data["password"];

	$password = password_hash($password, PASSWORD_DEFAULT);

	$query = "UPDATE pelanggan SET
				nama = '$nama',
				jk = '$jk',
				alamat = '$alamat',
				nohp = '$nohp',
				username = '$username',
				password = '$password'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
    $nama = $_POST['nama'];
	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM admins WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO admins VALUES('','$nama', '$username', '$password')");

	return mysqli_affected_rows($conn);

}

?>