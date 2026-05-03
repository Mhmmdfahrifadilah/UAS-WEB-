<?php
// 1. KONEKSI KE DATABASE
$conn = mysqli_connect("localhost", "root", "", "db_tasikkreatif");

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Cek apakah tombol dengan name='daftar' diklik
if (isset($_POST['tombol_daftar'])) {
    
    // 2. TANGKAP DATA DARI FORM
    $nama_pemilik    = mysqli_real_escape_string($conn, $_POST['nama_pemilik']);
    $nama_usaha      = mysqli_real_escape_string($conn, $_POST['nama_usaha']);
    $jenis_produk    = mysqli_real_escape_string($conn, $_POST['jenis_produk']);
    $alamat_workshop = mysqli_real_escape_string($conn, $_POST['alamat_workshop']);

    // 3. QUERY INSERT
    // Kita tidak memasukkan 'id_user' karena dia AUTO_INCREMENT di database
    $sql = "INSERT INTO tabel_pemilik (nama_pemilik, nama_usaha, jenis_produk, alamat_workshop) 
            VALUES ('$nama_pemilik', '$nama_usaha', '$jenis_produk', '$alamat_workshop')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Data berhasil disimpan ke TasikKreatif Go!');
                window.location='dashboard.php'; 
              </script>";
    } else {
        // Jika gagal, tampilkan pesan error dari MySQL
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar UMKM - TasikKreatif Go</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .register-container {
            padding: 120px 20px;
            display: flex;
            justify-content: center;
            background: #f4f7f6;
            min-height: 100vh;
        }
        .register-box {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 100%;
        }
        .register-box h2 {
            color: #05668d;
            margin-bottom: 10px;
            text-align: center;
        }
        .register-box p {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
        }
        .btn-submit {
            width: 100%;
            padding: 15px;
            background: #02c39a;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-submit:hover {
            background: #00a896;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-box">
            <h2>Gabung TasikKreatif</h2>
            <p>Mulai digitalisasi usaha Anda sekarang.</p>
            
            <form action="" method="POST">
                <div class="form-group">
                    <label>Nama Lengkap Pemilik</label>
                    <input type="text" name="nama_pemilik" placeholder="Masukkan nama Anda" required>
                </div>
                
                <div class="form-group">
                    <label>Nama UMKM / Usaha</label>
                    <input type="text" name="nama_usaha" placeholder="Contoh: Bordir Sukses Kawalu" required>
                </div>

                <div class="form-group">
                    <label>Jenis Produk</label>
                    <select name="jenis_produk" required>
                        <option value="">Pilih Jenis Produk</option>
                        <option value="bordir">Bordir</option>
                        <option value="kelom">Kelom Geulis</option>
                        <option value="makanan">Kuliner / Makanan</option>
                        <option value="anyaman">Anyaman / Mendong</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Alamat Workshop (Tasikmalaya)</label>
                    <textarea rows="3" name="alamat_workshop" placeholder="Alamat lengkap di Tasikmalaya"></textarea>
                </div>
                <button type="submit" name="tombol_daftar" class="btn-submit">Daftar Sekarang</button>
            </form>
            <div style="margin-top: 20px; text-align: center;">
                <a href="index.php" style="color: #05668d; text-decoration: none; font-size: 0.9rem;"> Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</body>
</html>