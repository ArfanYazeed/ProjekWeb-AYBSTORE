<?php
session_start(); // Pastikan session_start() dipanggil di awal

// Cek apakah parameter 'id' ada dalam query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cek apakah $_SESSION['keranjang'] ada, jika tidak, inisialisasi dengan array kosong
    if (!isset($_SESSION['keranjang'])) {
        $_SESSION['keranjang'] = array();
    }

    // Periksa apakah item sudah ada dalam keranjang
    if (isset($_SESSION['keranjang'][$id])) {
        $_SESSION['keranjang'][$id] += 1; // Tambah jumlah jika sudah ada
    } else {
        $_SESSION['keranjang'][$id] = 1; // Tambah item baru jika belum ada
    }
    
    // Alihkan ke halaman keranjang setelah menambahkan produk
    header('Location: keranjang.php');
    exit(); // Hentikan eksekusi skrip setelah redirect
} else {
    // Jika parameter 'id' tidak ada dalam query string, tampilkan pesan error atau redirect ke halaman lain
    echo "Produk ID tidak valid.";
}
