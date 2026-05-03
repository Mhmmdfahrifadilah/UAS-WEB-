<?php
$conn = mysqli_connect("localhost", "root", "", "db_tasikkreatif");

// Logika Simpan Data
if (isset($_POST['simpan_saku'])) {
    $ket = mysqli_real_escape_string($conn, $_POST['keterangan']);
    $nom = $_POST['nominal'];
    $tipe = $_POST['jenis']; // 'masuk' atau 'keluar'
    $user_id = 1;

    mysqli_query($conn, "INSERT INTO tabel_saku (id_user, keterangan, jenis, nominal) VALUES ('$user_id', '$ket', '$tipe', '$nom')");
    header("Location: saku.php");
    exit();
}
// Logika Hapus Data 
if (isset($_GET['hapus'])) {
    $id_hapus = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM tabel_saku WHERE id_transaksi = '$id_hapus'");
    header("Location: saku.php?r=" . time());
    exit();
}

// Logika Hitung Saldo 
$query_masuk = mysqli_query($conn, "SELECT SUM(nominal) as total FROM tabel_saku WHERE jenis='masuk'");
$query_keluar = mysqli_query($conn, "SELECT SUM(nominal) as total FROM tabel_saku WHERE jenis='keluar'");
$masuk = mysqli_fetch_assoc($query_masuk)['total'] ?? 0;
$keluar = mysqli_fetch_assoc($query_keluar)['total'] ?? 0;
$saldo_total = $masuk - $keluar;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saku UMKM - Catatan Keuangan Digital</title>
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
            --danger: #e63946;
            --light: #f8f9fa;
        }

        body {
            background-color: var(--light);
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .header-saku {
            background: var(--dark);
            color: white;
            padding: 30px;
            border-radius: 20px;
            margin-bottom: 25px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(5, 102, 141, 0.2);
        }

        .header-saku h1 { font-size: 1.2rem; opacity: 0.9; margin-bottom: 10px; }
        .balance { font-size: 2.5rem; font-weight: bold; }

        .card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        .form-title { margin-bottom: 15px; color: var(--dark); font-weight: bold; }

        .input-group { margin-bottom: 15px; }
        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            font-size: 1rem;
        }

        .btn-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .btn {
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            color: white;
            transition: 0.3s;
        }

        .btn-in { background: var(--primary); }
        .btn-out { background: var(--danger); }
        .btn:hover { opacity: 0.8; }

        .history-title {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            color: var(--dark);
            font-weight: bold;
        }

        .history-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background: white;
            border-radius: 10px;
            margin-bottom: 10px;
            border-left: 5px solid #ccc;
        }

        .item-info p { font-size: 0.9rem; color: #666; }
        .item-info h4 { color: #333; }

        .amount-in { color: var(--primary); font-weight: bold; }
        .amount-out { color: var(--danger); font-weight: bold; }
        
        .item-in { border-left-color: var(--primary); }
        .item-out { border-left-color: var(--danger); }

        .back-home {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: var(--dark);
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header-saku">
        <h1>Saldo Saku UMKM</h1>
        <div class="balance">
        Rp <?php echo number_format($saldo_total, 0, ',', '.'); ?>
</div>
    </div>

    <div class="card">
    <p class="form-title">Tambah Catatan Baru</p>
    <form method="POST">
    <input type="hidden" id="jenis_input" name="jenis" value="masuk">
    <div class="input-group">
    <input type="text" name="keterangan" placeholder="Keterangan (misal: Jual Mukena)" required>
    </div>
    
    <div class="input-group">
    <input type="number" name="nominal" placeholder="Nominal (Rp)" required>
    </div>
    <div class="btn-grid">
        <button type="submit" name="simpan_saku" class="btn btn-in" 
        onclick="document.getElementById('jenis_input').value='masuk'">
        <i class="fas fa-plus-circle"></i> Pemasukan
        </button>

        <button type="submit" name="simpan_saku" class="btn btn-out" 
                onclick="document.getElementById('jenis_input').value='keluar'">
            <i class="fas fa-minus-circle"></i> Pengeluaran
        </button>
    </div>
</form>
<?php
$riwayat = mysqli_query($conn, "SELECT * FROM tabel_saku ORDER BY tanggal_waktu DESC LIMIT 5");
if (mysqli_num_rows($riwayat) > 0) {
    while ($row = mysqli_fetch_assoc($riwayat)) {
        // Tentukan class berdasarkan jenis (masuk/keluar)
        $is_masuk = ($row['jenis'] == 'masuk');
        $item_class = $is_masuk ? 'item-in' : 'item-out';
        $amount_class = $is_masuk ? 'amount-in' : 'amount-out';
        $simbol = $is_masuk ? '+' : '-';
?>
    <!-- Blok ini akan otomatis diulang sebanyak data yang ada di database -->
    <div class="history-item <?php echo $item_class; ?>">
        <div class="item-info">
            <h4><?php echo htmlspecialchars($row['keterangan']); ?></h4>
            <p><?php echo date('d M Y - H:i', strtotime($row['tanggal_waktu'])); ?></p>
            <div class="action-links" style="margin-top: 5px;">
        <a href="edit_saku.php?id=<?php echo $row['id_transaksi']; ?>" style="color: #05668d; font-size: 0.7rem; text-decoration: none; margin-right: 10px;">
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="saku.php?hapus=<?php echo $row['id_transaksi']; ?>" 
           onclick="return confirm('Yakin ingin menghapus catatan ini?')" 
           style="color: #e63946; font-size: 0.7rem; text-decoration: none;">
            <i class="fas fa-trash"></i> Hapus
        </a>
    </div>
</div
        </div>
        <div class="<?php echo $amount_class; ?>">
            <?php echo $simbol; ?> Rp <?php echo number_format($row['nominal'], 0, ',', '.'); ?>
        </div>
    </div>
<?php 
    } 
} else {
    echo "<p style='text-align:center; color:#999; padding:20px;'>Belum ada transaksi.</p>";
}
?>