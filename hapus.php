<?php
include("koneksi.php");

if( isset($_GET['id'])){

$id = $_GET['id'];

$sql = "DELETE FROM produk WHERE id=$id";
$query = mysqli_query($koneksi, $sql);

if( $query ){
    header('location: min.php');
} else {
    die("gagal menghapus...");
}
} else {
    die("anda gagal menghapus...");
}
?>
