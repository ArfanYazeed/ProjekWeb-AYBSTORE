<?php
include 'koneksi.php';

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$user = $_SESSION['user'];

if(isset($_GET['aksi'])) {
  $aksi = $_GET['aksi'];
}
else{
  $aksi = "";
}

if ($aksi== "edit") {
  $id = $_GET['id'];
  $result = mysqli_query($koneksi, "SELECT * FROM produk where id='$id' ");
  while($data = mysqli_fetch_array($result)) {
    $nama = $data['nama'];
    $harga = $data['harga'];
    $stock = $data['stock'];
    $jenis = $data['jenis'];
    $foto = $data['foto'];
    $deskripsi = $data['deskripsi'];
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pelanggan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url("./assets/img/bg.jpg");
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        header {
            background: #000;
            color: #ffc800;
            padding: 20px 30px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
            border-bottom: 2px solid;
        }
        header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 700;
        }
        header .header-icon {
            font-size: 20px;
            margin: 0 10px;
            color: #fff;
            cursor: pointer;
            transition: color 0.3s;
        }
        header .header-icon:hover {
            color: #0084ff;
        }
        .container {
            width: 95%;
            max-width: 1200px;
            margin: auto;
            padding: 30px;
        }
        .profile-card {
            background: #ffffff;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            margin-bottom: 20px;
        }
        .profile-card:hover {
            transform: scale(1.03);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        .profile-card img {
            border-radius: 50%;
            width: 120px;
            height: 120px;
            margin-right: 20px;
            border: 6px solid #0084ff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .profile-card img:hover {
            border-color: #0084ff;
            box-shadow: 0 8px 16px rgba(0,0,0,0.3);
        }
        .profile-card > div {
            z-index: 1;
        }
        .profile-card h2 {
            margin: 0;
            font-size: 28px;
            color: #333;
        }
        .profile-card p {
            margin: 5px 0;
            color: #666;
        }
        .tabs {
            display: flex;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            margin: 20px 0;
            position: relative;
            overflow: hidden;
        }
        .tab {
            flex: 1;
            padding: 15px;
            text-align: center;
            cursor: pointer;
            background: #fff;
            border-bottom: none;
            transition: background 0.3s, color 0.3s, transform 0.3s;
            position: relative;
        }
        .tab:hover {
            background: #0084ff;
            transform: translateY(-2px);
        }
        .tab.active {
            background: #0084ff
            color: #fff;
            border-bottom: 1px solid #0084ff;
        }
        .tabs .underline {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 4px;
            background: #0084ff;
            transition: transform 0.3s ease, width 0.3s ease;
        }
        .tab-content {
            background: #fff;
            padding: 20px;
            border: 1px solid #d1c4e9;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            position: relative;
            transition: opacity 0.3s ease-in-out;
        }
        .tab-content.hidden {
            display: none;
        }
        .button:hover{
            transition: opacity 0.3s ease-in-out;
            border-radius: 30px;
            background-color: #0061bd;
        }
        .button {
            transition: opacity 0.3s ease-in-out;
            font-family: 'Poppins', sans-serif;
            border: #0084ff;
            flex: 1;
            position: relative;
            padding: 10px;      
            color: #fff;
            border-radius: 30px;
            background-color: #0084ff;
        }
        .delete:hover{
            transition: opacity 0.3s ease-in-out;
            border-radius: 30px;
            background-color: #8b0000;
        }
        .delete {
            transition: opacity 0.3s ease-in-out;
            font-family: 'Poppins', sans-serif;
            border: #dc143c;
            flex: 1;
            position: relative;
            padding: 10px;      
            color: #fff;
            border-radius: 30px;
            background-color: #dc143c;
        }
        .order-item, .review-item {
            border-bottom: 1px solid #d1c4e9;
            padding: 10px 0;
            transition: background 0.3s;
        }
        .order-item:hover, .review-item:hover {
            background: #ede7f6;
        }
        .order-item:last-child, .review-item:last-child {
            border-bottom: none;
        }
        .order-item p, .review-item p {
            margin: 5px 0;
        }
        .order-item strong, .review-item strong {
            color: #7e57c2;
        }
        form {
            display: grid;
            gap: 15px;
        }
        input[type="text"], input[type="email"], input[type="tel"], textarea {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #d1c4e9;
            background: #ffffff;
            color: #333;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="tel"]:focus, textarea:focus {
            border-color: #b39ddb;
            box-shadow: 0 0 8px rgba(179, 157, 219, 0.3);
            outline: none;
        }
        textarea {
            resize: vertical;
        }
        .notification {
            background: #ede7f6;
            border: 1px solid #d1c4e9;
            padding: 15px;
            border-radius: 15px;
            margin-bottom: 20px;
            color: #333;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .notification strong {
            color: #7e57c2;
        }
    </style>
</head>
<body>
    <header>


        <h1>Profil Pelanggan</h1>
        <div>
            <a href="index.php"><i class="fas fa-sign-out-alt header-icon" title="Keluar"></i></a>
        </div>
    </header>

    <div class="container">
        <!-- Notification -->
        <div class="notification">
            <p>Selamat datang, <strong></strong>! Pastikan untuk memperbarui informasi Anda jika ada perubahan.</p>
        </div>

        <!-- Profil Card -->
        <div class="profile-card">
            <img src="" alt="Foto Profil">
            <div>
                <h2></h2>
                <p><strong>Email:</strong></p>
                <p><strong>Telepon:</strong></p>
                <p><strong>Alamat:</strong> </p>
                <a href="login.php"><button type="submit" class="delete">logout</button></a>
            </div>
        </div>

        <!-- Tabs -->
        <div class="tabs">
            <div class="tab active" onclick="showTab('orders')">Riwayat Pesanan</div>
            <div class="tab" onclick="showTab('settings')">Pengaturan Akun</div>
            <div class="tab" onclick="showTab('reviews')">Ulasan</div>
            <div class="underline"></div> <!-- Untuk animasi underline -->
        </div>

        <!-- Tab Content -->
        <div id="orders" class="tab-content">
            <h3>Riwayat Pesanan</h3>
        </div>

        <div id="settings" class="tab-content hidden">
            <h3>Pengaturan Akun</h3>
            <form action="#" method="post">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control-plaintext" readonly value="<?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['pelanggan']) : 'Pelanggan tidak tersedia'; ?>">
                <label for="email" class="form-label">email</label>
                <input type="text" class="form-control-plaintext" readonly value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['pelanggan']) : 'Pelanggan tidak tersedia'; ?>">
                <label for="hp">No.Hp</label>
                <input type="text" class="form-control-plaintext" readonly value="<?php echo isset($_SESSION['hp']) ? htmlspecialchars($_SESSION['pelanggan']) : 'Pelanggan tidak tersedia'; ?>">
                <label for="password">password</label>
                <input type="password" class="form-control-plaintext" readonly value="<?php echo isset($_SESSION['password']) ? htmlspecialchars($_SESSION['pelanggan']) : 'Pelanggan tidak tersedia'; ?>">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control-plaintext" readonly value="<?php echo isset($_SESSION['alamat']) ? htmlspecialchars($_SESSION['alamat']) : 'Pelanggan tidak tersedia'; ?>">
                <button type="submit" class="button">Simpan Perubahan</button>
            </form>
        <div id="reviews" class="tab-content hidden">
            <h3>Ulasan</h3>
            <div class="review-item">
                <p><strong>Produk A</strong></p>
                <p>Rating: ★★★★☆</p>
                <p>"Produk ini sangat bagus, tetapi pengiriman agak lambat."</p>
            </div>
            <div class="review-item">
                <p><strong>Produk B</strong></p>
                <p>Rating: ★★★★★</p>
                <p>"Sangat puas dengan kualitas produk dan pelayanan."</p>
            </div>
            <!-- Tambahkan lebih banyak ulasan di sini -->
        </div>
    </div>

    <script>
        function showTab(tabId) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.add('hidden');
            });
            // Remove active class from all tabs
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            // Show the selected tab content
            document.getElementById(tabId).classList.remove('hidden');
            // Add active class to the selected tab
            const activeTab = document.querySelector(`.tab[onclick="showTab('${tabId}')"]`);
            activeTab.classList.add('active');
            
            // Update underline animation
            const tabs = document.querySelector('.tabs');
            const underline = tabs.querySelector('.underline');
            const tabWidth = activeTab.offsetWidth;
            const tabOffsetLeft = activeTab.offsetLeft;
            underline.style.width = `${tabWidth}px`;
            underline.style.transform = `translateX(${tabOffsetLeft}px)`;
        }

        // Default to showing the orders tab
        showTab('orders');
    </script>
</body>
</html>
