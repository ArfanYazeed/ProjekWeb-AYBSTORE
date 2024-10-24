<?php
include 'koneksi.php';

session_start();
if(isset($_POST['login'])){
    $username = $_POST ['username'];
    $password = $_POST['password'];
    $login = mysqli_query($koneksi, "select * from user where username = '$username' and password='$password'"
);
if (mysqli_num_rows($login) > 0) {
    $data = mysqli_fetch_assoc($login);
    if ($data['role'] == "admin") {
        $_SESSION['admin'] = $username;
        header("location: min.php");
    }elseif ($data['role'] == "pelanggan") {
        $_SESSION['user'] = $data['username'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['id_user'] = $data['id_user'];
        header("location: index.php");
    }
} else {
    echo "username dan password salah!";
    header("location: login.php");
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign in</title>
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
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
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
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .link {
            text-align: center;
            margin-top: 10px;
        }

        .link a {
            color: #007bff;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>login</h1>
        <form action="#" method="post">
            <label for="username">username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" name="login" value="login">Masuk</button>
            <div class="link">
            <p>belum punya akun? <a href="daftar.php">daftar</a></p>
        </div>
        </form>
    </div>
</body>
</html>
