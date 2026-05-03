<?php
include 'koneksi.php'; 
$query_umkm = mysqli_query($conn, "SELECT * FROM tabel_pemilik ORDER BY id_user DESC LIMIT 1");
$data_umkm = mysqli_fetch_assoc($query_umkm);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard UMKM - TasikKreatif Go</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        :root {
            --primary: #02c39a;
            --dark: #05668d;
            --bg-light: #f4f7f6;
            --white: #ffffff;
            --text-muted: #6c757d;
        }

        body {
            display: flex;
            min-height: 100vh;
            background-color: var(--bg-light);
        }
        .sidebar {
            width: 260px;
            background-color: var(--dark);
            color: var(--white);
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100%;
        }

        .sidebar-header {
            padding: 30px 20px;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header span { color: var(--primary); }

        .sidebar-menu {
            padding: 20px 0;
            flex-grow: 1;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: 0.3s;
            gap: 15px;
        }

        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: rgba(255,255,255,0.1);
            color: var(--primary);
            border-left: 4px solid var(--primary);
        }

        .logout-btn {
            padding: 20px 25px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #ff4d4d;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .main-content {
            margin-left: 260px;
            flex-grow: 1;
            padding: 30px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            background: white;
            padding: 8px 15px;
            border-radius: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--white);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .stat-card h3 {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-bottom: 10px;
        }

        .stat-card .value {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--dark);
        }

        .stat-card .trend {
            font-size: 0.8rem;
            margin-top: 5px;
        }

        .trend.up { color: #27ae60; }
        .table-container {
            background: var(--white);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .table-container h2 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: var(--dark);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            text-align: left;
            padding: 12px;
            border-bottom: 2px solid var(--bg-light);
            color: var(--text-muted);
        }

        table td {
            padding: 15px 12px;
            border-bottom: 1px solid var(--bg-light);
        }

        .status-pill {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: bold;
        }

        .status-done { background: #e3f9e5; color: #27ae60; }
        .status-pending { background: #fff4e5; color: #f39c12; }
        .btn-action {
            background: var(--primary);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-action:hover { background: #00a896; }

        @media (max-width: 768px) {
            .sidebar { width: 70px; }
            .sidebar-header, .menu-text { display: none; }
            .main-content { margin-left: 70px; }
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">
            TK-<span>Go</span> Admin
        </div>
        <nav class="sidebar-menu">
            <a href="" class="active"><i class="fas fa-home"></i> <span class="menu-text">Beranda</span></a>
            <a href="lihatkatalog.php"><i class="fas fa-box"></i> <span class="menu-text">Produk Saya</span></a>
            <a href="saku.php"><i class="fas fa-wallet"></i> <span class="menu-text">Saku UMKM</span></a>
            <a href="etalase.php"><i class="fas fa-store"></i> <span class="menu-text">Sentra</span></a>
            <a href="pengaturan.php"><i class="fas fa-cog"></i> <span class="menu-text">Pengaturan</span></a>
        </nav>
        <a href="index.php" class="logout-btn">
            <i class="fas fa-sign-out-alt"></i> <span class="menu-text">Keluar</span>
        </a>
    </div>

    <div class="main-content">
        <header class="top-bar">
            <h1>Ringkasan Bisnis</h1>
            <div class="user-profile">
                <i class="fas fa-user-circle fa-lg"></i>
                <span class="user-name"><?php echo $data_umkm['nama_usaha']; ?></span>
            </div>
        </header>

        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Pendapatan</h3>
                <p class="value">Rp 8.450.000</p>
                <p class="trend up"><i class="fas fa-arrow-up"></i> +15% bulan ini</p>
            </div>
            <div class="stat-card">
                <h3>Pesanan Baru</h3>
                <p class="value">12</p>
                <p class="trend">Perlu diproses</p>
            </div>
            <div class="stat-card">
                <h3>Stok Produk</h3>
                <p class="value">156</p>
                <p class="trend">3 Produk hampir habis</p>
            </div>
        </div>
        <div style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-top: 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="margin: 0; color: #05668d; font-size: 1.2rem;">Pesanan Terakhir</h3>
        
    <a href="tambahproduk.php" style="text-decoration: none;">
       <button type="button" style="background: #02c39a; color: white; border: none; padding: 10px 15px; border-radius: 8px; font-weight: bold; cursor: pointer;">
        + Tambah Produk
        </button>
    </a>
    </div>
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="text-align: left; color: #888; font-size: 0.9rem; border-bottom: 1px solid #eee;">
                <th style="padding: 15px 10px;">ID Pesanan</th>
                <th style="padding: 15px 10px;">Produk</th>
                <th style="padding: 15px 10px;">Pelanggan</th>
                <th style="padding: 15px 10px;">Total</th>
                <th style="padding: 15px 10px;">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "db_tasikkreatif");
            
            // Query ambil data dari tabel_pesanan
            $query = mysqli_query($conn, "SELECT * FROM tabel_pesanan ORDER BY id_pesanan DESC LIMIT 5");
            
            while($row = mysqli_fetch_array($query)) {
                // Logika warna badge status
                $bg_color = "#fef9c3"; // Default kuning (Diproses)
                $text_color = "#ca8a04";
                
                if($row['status_order'] == 'Selesai') {
                    $bg_color = "#dcfce7"; // Hijau
                    $text_color = "#16a34a";
                } elseif($row['status_order'] == 'Baru') {
                    $bg_color = "#dbeafe"; // Biru
                    $text_color = "#2563eb";
                }
            ?>
            <tr style="border-bottom: 1px solid #f9f9f9; color: #333; font-size: 0.95rem;">
                <td style="padding: 15px 10px; color: #666;">#TK-<?php echo $row['id_pesanan']; ?></td>
                <td style="padding: 15px 10px; font-weight: 500;"><?php echo $row['nama_produk']; ?></td>
                <td style="padding: 15px 10px;"><?php echo $row['nama_pelanggan']; ?></td>
                <td style="padding: 15px 10px; font-weight: bold;">Rp <?php echo number_format($row['total_bayar'], 0, ',', '.'); ?></td>
                <td style="padding: 15px 10px;">
                    <span style="background: <?php echo $bg_color; ?>; color: <?php echo $text_color; ?>; padding: 5px 15px; border-radius: 20px; font-size: 0.75rem; font-weight: bold; display: inline-block;">
                        <?php echo $row['status_order']; ?>
                    </span>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
