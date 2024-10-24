<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
$total = 0;

$id_user = $_SESSION['id_user'];
if(isset($id_user)){
    if (isset($id_user))
    if (isset($_POST['add'])){
        
        if(isset($_SESSION['cart'])){
            $item_array_id = array_column($_SESSION['cart'], 'id');
            if(!in_array($_GET["id"], $item_array_id)){
                $count = count($_SESSION['cart']);
                $item_array = array(
                    'id' => $_GET['id'],
                    'nama' => $_POST['nama'],
                    'harga' => $_POST['harga'],
                    'foto' => $_POST['foto'],
                    'jumlah' => $_POST['jumlah'],
                );

                $_SESSION['cart'] [$count] = $item_array;
                echo "<script>
                alert('berhasil dimasukkan ke keranjang');
                </script>";
            }else {
                echo"<script>
                alert('sudah ada di keranjang');
                </script>";
         }
        }else{
            $item_array = array(
                'id' => $_GET['id'],
                'nama' => $_POST['nama'],
                'harga' => $_POST['harga'],
                'foto' => $_POST['foto'],
                'jumlah' => $_POST['jumlah'],
            );

            $_SESSION['cart'] [0] = $item_array;
            echo "<script>
            alert('berhasil dimasukkan ke keranjang');
            </script>";
        }
    }
    if(isset($_GET['aksi'])){
        if($_GET['aksi'] == 'hapus'){
            foreach($_SESSION['cart'] as $key => $value){
                if($value['id'] == $_GET['id']){
                    unset($_SESSION{'cart'} [$key]);
                    echo"<script>alert('produk dihapus dari keranjang');</script>";
                    echo"<script>window.location = 'keranjang.php';</script>";
                }
            }
        }else if ($_GET['aksi'] == 'beli'){
            foreach($_SESSION['cart'] as $key => $value){
                $total = $total + ($value["jumlah"] * $value['harga']);
            }

            $query = mysqli_query($koneksi, "INSERT INTO tb_transaksi(tanggal,id_pelanggan,total) VALUES ('". date("Y-m-d") . "','$id_user','$total')");
            $id_transaksi = mysqli_insert_id($koneksi);
            
            foreach($_SESSION['cart'] as $key => $value){
                $id_produk = $value['id'];
                $jumlah = $value['jumlah'];
                $sql = "INSERT INTO tb_detail(id_transaksi,id_produk,jumlah) VALUES ('$id_transaksi','$id_produk','$jumlah')";
                $res = mysqli_query($koneksi, $sql);

                if ($res > 0){
                    unset($_SESSION['cart']);

                    echo "<script>
                    alert('terimakasih sudah berbelanja');
                    </script>";

                    echo "<script>
                    window.location = 'cetak.php?id=". $id_transaksi."';
                    </script>";
                }
            }
        }
    }
}else{
     echo "<script>
    alert('login dulu');
    </script>";
    echo "<script>
   document.location.href = 'login.php';
    </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Keranjang Belanja</title>
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="css/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>

</style>
</head>
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-white" href="#!">AYBSTORE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item "><a class="nav-link active text-white" aria-current="page" href="index.php">Home</a></li>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <a href="profil.php" class="btn  me-2 bg-white">
                            <i class="fa-solid fa-user"></i> 
                        </a>
                        <button class="btn bg-white" type="submit" formaction="keranjang.php">
                            <i class="bi-cart-fill me-1"></i>
                            
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo count($_SESSION['cart']);?></span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>

   
    <main class="container mx-auto my-8 p-4 bg black shadow-lg rounded-lh">
        <h2 class="text 2x1 font-semibold mb-4">Keranjang Belanja</h2>
        <div class="space-y-4">
            <?php
                if (!empty($_SESSION['cart'])) {    
                    foreach($_SESSION['cart'] as $value){ ?>
                <div class="min-w-full bg-slate-50 flex items-center gap-4 p-4 justify-between">
                    <div class="flex items-center gap-4">
                        <img src="produk/<?php echo $value['foto']?>" alt="" height="200px">
                        <div class="flex flex-col gap-1">
                        <h1 class="font-bold text-x1"><?php echo $value['nama']?></h1>
                        <p>jumlah beli : <span><?php echo $value['jumlah']?></span></p>
                        <p class="text-lg font-bold text yellow-500"><?php echo number_format($value['harga'] * $value['jumlah']) ?></p>
                        </div>
                    </div>

                    <form action="" method="POST">
                        <a name="hapus" href="keranjang.php?aksi=hapus&id=<?php echo $value['id']?>" class="btn btn-danger btn-sm">hapus</a>
                    </form>
                </div>        
                <?php
                    
                    }
                 ?>
                <?php } ?>
        </div>
        <div class="flex justify-between font=bold border-t pt-4 mt-4">
            <?php 
            foreach($_SESSION['cart'] as $value){
                $total = $total + ($value['harga'] = $value['jumlah']);
            }  ?>
            <span>Total <?php echo number_format($total) ?></span>
        </div>

        <div class="mt-8">
            <form action="" method="POST">
                <a href="keranjang.php?aksi=beli" class="btn btn-primary btn-sm ">Checkout</a>
            </form>
        </div>
    </main>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>