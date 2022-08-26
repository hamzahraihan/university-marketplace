<?php 

session_start();
$id = isset($_GET['id']) ? $_GET['id'] : '';

unset($_SESSION["produk-cart"][$id]);

echo "<script> alert ( ' produk dihapus dari keranjang '); </script>";
echo "<script> location='produk-cart.php' </script>";


?>