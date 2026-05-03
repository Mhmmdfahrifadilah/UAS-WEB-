<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logistik Terintegrasi - TasikKreatif Go</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        :root { --primary: #02c39a; --dark: #05668d; --bg: #f4f7f6; --white: #ffffff; }
        
        body { background-color: var(--bg); color: #333; }
        .container { max-width: 1100px; margin: 0 auto; padding: 20px; }

        .hero-logistik {
            background: linear-gradient(135deg, var(--dark), var(--primary));
            color: white;
            padding: 60px 20px;
            text-align: center;
            border-radius: 0 0 50px 50px;
            margin-bottom: 40px;
        }

    
        .tracking-card {
            background: var(--white);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            margin-top: -80px;
            margin-bottom: 40px;
        }

        .search-box {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        input {
            flex: 1;
            padding: 15px;
            border: 2px solid #eee;
            border-radius: 12px;
            outline: none;
            font-size: 1rem;
        }

        .btn-track {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0 30px;
            border-radius: 12px;
            font-weight: bold;
            cursor: pointer;
        }

        /* Partner Grid */
        .partner-title { text-align: center; margin-bottom: 30px; color: var(--dark); }
        .partner-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .partner-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            transition: 0.3s;
            border: 1px solid #eee;
        }

        .partner-card:hover { transform: translateY(-5px); border-color: var(--primary); }
        .partner-card i { font-size: 3rem; color: var(--primary); margin-bottom: 15px; }
        
        .price-tag {
            display: inline-block;
            background: #e3f9e5;
            color: var(--primary);
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: bold;
            margin-top: 10px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 40px;
            text-decoration: none;
            color: var(--dark);
            font-weight: bold;
        }
    </style>
</head>
<body>

    <section class="hero-logistik">
        <div class="container">
            <h1>Logistik Terintegrasi</h1>
            <p>Kirim produk UMKM ke seluruh Indonesia dengan tarif khusus.</p>
        </div>
    </section>

    <div class="container">
        <div class="tracking-card">
            <h3><i class="fas fa-search-location"></i> Lacak Pengiriman Otomatis</h3>
            <p style="color: #666; font-size: 0.9rem;">Masukkan nomor resi untuk memantau perjalanan produk Anda.</p>
            <div class="search-box">
                <input type="text" placeholder="Contoh: TKGO-123456789">
                <button class="btn-track">Cek Resi</button>
            </div>
        </div>

        <h2 class="partner-title">Mitra Ekspedisi Pilihan</h2>
        
        <div class="partner-grid">
            <div class="partner-card">
                <i class="fas fa-motorcycle"></i>
                <h3>Kurir Lokal Tasik</h3>
                <p>Khusus pengiriman wilayah Tasikmalaya & sekitarnya.</p>
                <span class="price-tag">Mulai Rp 5.000</span>
            </div>

            <div class="partner-card">
                <i class="fas fa-truck-moving"></i>
                <h3>Ekspedisi Nasional</h3>
                <p>Tarif khusus UMKM untuk pengiriman antar provinsi.</p>
                <span class="price-tag">Diskon 15%</span>
            </div>

            <div class="partner-card">
                <i class="fas fa-boxes"></i>
                <h3>Layanan Cargo</h3>
                <p>Solusi kirim produk jumlah besar (Bordir/Anyaman) lebih hemat.</p>
                <span class="price-tag">Min. 10kg</span>
            </div>
        </div>

        <center>
            <a href="dashboard.php" class="back-btn"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
        </center>
    </div>

</body>
</html>