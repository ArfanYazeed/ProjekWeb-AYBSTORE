<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Detail</title>
        <!-- Favicon-->
        <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> -->
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
    body {
       background-image: url("./assets/img/bg.jpg");
       background-size: cover;
    }
    .m-5{
        padding: 1rem;
    }
    .button {
            transition: opacity 0.3s ease-in-out;
            font-family: 'Poppins', sans-serif;
            border: #0084ff;
            flex: 1;
            position: relative;
            padding: 10px;      
            color: #fff;
            border-radius: 3px;
            background-color: #0084ff;
        }
    .button:hover{
            transition: opacity 0.3s ease-in-out;
            border-radius: 3px;
            background-color: #0061bd;
        }
</style>
        
    </head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand text-white" href="#!">AYBSTORE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item "><a class="nav-link active text-white" aria-current="page" href="index.php">Home</a></li>
                    </ul>
                    <form class="d-flex">
                        <a href="profil.php" class="btn  me-2 bg-white">
                            <i class="fa-solid fa-user"></i> 
                        </a>
                        <button class="btn bg-white" type="submit" formaction="keranjang.php">
                            <i class="bi-cart-fill me-1"></i>
                            
                            <span class="badge bg-dark text-white ms-1 rounded-pill"></span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
  
        <main class="container mx-auto my-8 p-4 bg-white shadow-lg rounded-lg">

            <div class="grid grid-cols-1cmd:grid-cols-2 gap-8 w-full min-h-96 justify-center items-center">
                <?php
                include('koneksi.php');

                $id = $_GET['id'];

                $query = "SELECT * FROM produk where id=$id";
                $hasil = mysqli_query($koneksi, $query);

                while($h = mysqli_fetch_array($hasil)){

                ?>

                <div>
                    <img src="produk/<?php echo $h['foto']?>" alt="nama_barang">
                </div>    

                <div class="m-5">
                    <form action="keranjang.php?id=<?= $h['id'] ?>" method="post">
                        <h2 class="text-3x1 font-semibold mb-4"><?php echo $h['nama']?></h2>
                        <p class="text-gray-700 mb-4"><?php echo $h['deskripsi']?></p>
                        <p>Harga: Rp <?php echo $h['harga']?></p>

                        <input type="number" class="border border-slate-900 w-44 h-13 px-2 py-1 rounded-full text-slate-900 font-bold text-x1 mb-4" name="jumlah" value="1">
                        <input type="hidden" name="nama" value="<?php echo $h['nama']?>">
                        <input type="hidden" name="harga" value="<?php echo $h['harga']?>">
                        <input type="hidden" name="foto" value="<?php echo $h['foto']?>">
                        <div class="flex space-x-4">
                        <input type="submit" name="add" value="add to cart" class="button">
                     </form>
                </div>
                <?php } ?>
            </div>
        </main>


        <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
</body>