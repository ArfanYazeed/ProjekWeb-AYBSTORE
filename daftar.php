<?php
include 'koneksi.php';

session_start();
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $hp = $_POST['hp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
    $simpan = mysqli_query($koneksi,"INSERT INTO user(nama,email,hp,username,password,alamat,role)
    values('$nama','$email','$hp','$username','$password','$alamat','pelanggan')"
 );

 if ($simpan > 0) {
    header("location: index.php");
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <style>
        body {
            background-image: url("./assets/img/bg.jpg");
            background-size: cover;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 40%;
            width: 400%;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #0084ff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
        p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registrasi</h1>
        <form method="post">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required>
            
            <label for="email">email</label>
            <input type="email" id="email" name="email" required>
            
            <label for="username">no.Hp</label>
            <input type="text" id="password" name="password" required>

            <label for="username">username</label>
            <input type="text" id="usrname" name="username" required>

            <label for="password">password</label>
            <input type="password" id="password" name="password" required>

            <label for="alamat">alamat</label>
            <input type="text" id="alamat" name="alamat" required>
            
            <button type="submit" name="simpan" value="daftar">Daftar</button>
            <div class="link">
            <p>sudah punya akun? <a href="login.php">Masuk</a></p>
        </div>
        </form>
    </div>
</body>
</html>
