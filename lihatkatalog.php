<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - TasikKreatif Go</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary: #02c39a;
            --dark: #05668d;
            --light: #f4f7f6;
            --white: #ffffff;
        }

        body {
            background-color: var(--light);
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header & Navigasi */
        header {
            background: var(--white);
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--dark);
            text-decoration: none;
        }

        .logo span {
            color: var(--primary);
        }

        nav ul {
            display: flex;
            list-style: none;
            align-items: center;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #555;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-daftar {
            border: 2px solid var(--primary);
            padding: 8px 18px;
            border-radius: 25px;
            color: var(--primary) !important;
        }

        /* Hero Katalog */
        .catalog-hero {
            background: var(--dark);
            color: var(--white);
            text-align: center;
            padding: 80px 20px;
        }

        .catalog-hero h1 {
            font-size: 2.8rem;
            margin-bottom: 10px;
        }
        .filter-section {
            padding: 40px 0 20px;
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 10px 25px;
            border: none;
            background: var(--white);
            border-radius: 30px;
            cursor: pointer;
            font-weight: 600;
            color: #666;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: 0.3s;
        }

        .filter-btn.active, .filter-btn:hover {
            background: var(--primary);
            color: var(--white);
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            padding: 20px 0 80px;
        }

        .product-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-10px);
        }

        .badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--primary);
            color: var(--white);
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: bold;
            z-index: 10;
        }

        .product-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .product-info {
            padding: 25px;
        }

        .product-info h3 {
            font-size: 1.3rem;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .product-origin {
            font-size: 0.85rem;
            color: #888;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            display: block;
        }

        .btn-buy {
            width: 100%;
            background: var(--dark);
            color: var(--white);
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: 0.3s;
        }

        .btn-buy:hover {
            background: var(--primary);
        }

        footer {
            background: #222;
            color: #888;
            text-align: center;
            padding: 40px 0;
        }
    </style>
</head>
<body>

    <header>
        <nav class="container">
            <a href="index.php" class="logo">TasikKreatif <span>Go</span></a>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="daftarumkm.php" class="btn-daftar">Daftar UMKM</a></li>
            </ul>
        </nav>
    </header>

    <section class="catalog-hero">
        <div class="container">
            <h1>Katalog Produk UMKM</h1>
            <p>Jelajahi karya terbaik dari pengrajin lokal Tasikmalaya.</p>
        </div>
    </section>

    <main class="container">
        
        <div class="filter-section">
            <button class="filter-btn active">Semua</button>
            <button class="filter-btn">Bordir</button>
            <button class="filter-btn">Kelom</button>
            <button class="filter-btn">Anyaman</button>
            <button class="filter-btn">Kuliner</button>
        </div>
        <div class="product-grid">
    <?php
    include "koneksi.php"; 

    // Query SELECT untuk mengambil data produk
    $query = mysqli_query($conn, "SELECT * FROM produk");
    while ($row = mysqli_fetch_assoc($query)) {
        $no_wa = preg_replace('/[^0-9]/', '', $row['no_whatsapp']);
        if (substr($no_wa, 0, 1) === '0') {
            $no_wa = '62' . substr($no_wa, 1);
        }
        $pesan = urlencode("Halo, saya tertarik dengan " . $row['nama_produk']);
    ?>
        
        <div class="product-card">
            <span class="badge">Kategori</span> 
            <img src="img/<?php echo $row['foto']; ?>" height="300px" width="200px">
            
            <div class="product-info">
                <h3><?php echo $row['nama_produk']; ?></h3>
                <div class="product-origin"><i class="fas fa-map-marker-alt"></i> Tasikmalaya</div>
                <span class="price">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></span>
                
                <a href="https://wa.me/<?php echo $no_wa; ?>?text=<?php echo $pesan; ?>" 
                   target="_blank" class="btn-buy" style="text-decoration: none; display: flex; align-items: center; justify-content: center;">
                   <i class="fab fa-whatsapp"></i> Hubungi Penjual
                </a>
            </div>
        </div>

    <?php 
    } 
    ?>
</div>
       <div class="product-grid">
    <?php
    // Ambil data dari database
    $query = mysqli_query($conn, "SELECT * FROM produk");

    while ($row = mysqli_fetch_assoc($query)) {

        $no_wa = preg_replace('/[^0-9]/', '', $row['no_whatsapp']);
        if (substr($no_wa, 0, 1) === '0') {
            $no_wa = '62' . substr($no_wa, 1);
        }
        $pesan = urlencode("Halo, saya tertarik dengan " . $row['nama_produk']);
    ?>

        <div class="product-card">
            <span class="badge">UMKM Tasik</span>
            <img src="img/<?php echo $row['foto']; ?>" height="300px" width="200px">
            
            <div class="product-info">
                <h3><?php echo $row['nama_produk']; ?></h3>
                <div class="product-origin">
                    <i class="fas fa-map-marker-alt"></i> Tasikmalaya
                </div>
                <span class="price">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></span>
                
                <a href="https://wa.me/<?php echo $no_wa; ?>?text=<?php echo $pesan; ?>" 
                   target="_blank" 
                   class="btn-buy" 
                   style="text-decoration: none; display: flex; align-items: center; justify-content: center; background-color: #05668d; color: white; padding: 10px; border-radius: 5px;">
                   <i class="fab fa-whatsapp" style="margin-right: 8px;"></i> Hubungi Penjual
                </a>
            </div>
        </div>

    <?php 
    } // Akhir perulangan while
    ?>
</div>
            </div>

        </div>
    </main>

    <footer>
        <p>&copy; 2026 TasikKreatif Go. Bangga Buatan Lokal.</p>
    </footer>

</body>
</html>