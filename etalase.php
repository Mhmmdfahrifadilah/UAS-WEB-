<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etalase Kolektif - TasikKreatif Go</title>
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
            --bg: #f4f7f6;
        }

        body {
            background-color: var(--bg);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background: white;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
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

        .logo span { color: var(--primary); }

        /* Section Hero Etalase */
        .etalase-hero {
            background: linear-gradient(rgba(5, 102, 141, 0.8), rgba(5, 102, 141, 0.8)), 
                        url('https://images.unsplash.com/photo-1523474253046-5cd2c48b63cd?auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 60px 20px;
        }

        /* Grid Sentra */
        .sentra-container {
            padding: 50px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
            color: var(--dark);
        }

        .sentra-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .sentra-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: 0.3s;
        }

        .sentra-card:hover {
            transform: translateY(-10px);
        }

        .sentra-img {
            height: 180px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .sentra-tag {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background: var(--primary);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .sentra-info {
            padding: 20px;
        }

        .sentra-info h3 {
            margin-bottom: 10px;
            color: var(--dark);
        }

        .sentra-info p {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 15px;
        }

        .stats {
            display: flex;
            justify-content: space-between;
            border-top: 1px solid #eee;
            padding-top: 15px;
            font-size: 0.8rem;
            font-weight: bold;
            color: var(--primary);
        }

        .btn-kunjungi {
            display: block;
            text-align: center;
            background: var(--dark);
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 8px;
            margin-top: 15px;
            transition: 0.3s;
        }

        .btn-kunjungi:hover {
            background: var(--primary);
        }
    </style>
</head>
<body>

    <header>
        <nav class="container">
            <a href="index.html" class="logo">TasikKreatif <span>Go</span></a>
            <a href="index.html" style="text-decoration: none; color: var(--dark); font-weight: bold;">Kembali</a>
        </nav>
    </header>

    <section class="etalase-hero">
        <div class="container">
            <h1>Etalase Kolektif UMKM</h1>
            <p>Menghubungkan Sentra Kerajinan Tasikmalaya ke Pasar Dunia</p>
        </div>
    </section>

    <main class="container sentra-container">
        <h2 class="section-title">Pilih Berdasarkan Sentra Wilayah</h2>
        
        <div class="sentra-grid">
            <div class="sentra-card">
                <div class="sentra-img" style="background-image: url('https://images.unsplash.com/photo-1605647540924-852290f6b0d5?auto=format&fit=crop&w=500&q=80')">
                    <span class="sentra-tag">Kec. Kawalu</span>
                </div>
                <div class="sentra-info">
                    <h3>Sentra Bordir</h3>
                    <p>Koleksi mukena dan pakaian bordir kualitas premium langsung dari tangan pengrajin Kawalu.</p>
                    <div class="stats">
                        <span><i class="fas fa-store"></i> 45 UMKM</span>
                        <span><i class="fas fa-box"></i> 120+ Produk</span>
                    </div>
                    <a href="katalog.html" class="btn-kunjungi">Kunjungi Etalase</a>
                </div>
            </div>

            <div class="sentra-card">
                <div class="sentra-img" style="background-image: url('https://images.unsplash.com/photo-1590736704728-f4730bb30770?auto=format&fit=crop&w=500&q=80')">
                    <span class="sentra-tag">Kec. Rajapolah</span>
                </div>
                <div class="sentra-info">
                    <h3>Sentra Anyaman</h3>
                    <p>Pusat kerajinan mendong dan bambu. Tersedia tas, tikar, hingga dekorasi rumah ramah lingkungan.</p>
                    <div class="stats">
                        <span><i class="fas fa-store"></i> 32 UMKM</span>
                        <span><i class="fas fa-box"></i> 85+ Produk</span>
                    </div>
                    <a href="katalog.html" class="btn-kunjungi">Kunjungi Etalase</a>
                </div>
            </div>

            <div class="sentra-card">
                <div class="sentra-img" style="background-image: url('https://images.unsplash.com/photo-1544967082-d9d25d867d66?auto=format&fit=crop&w=500&q=80')">
                    <span class="sentra-tag">Kec. Tamansari</span>
                </div>
                <div class="sentra-info">
                    <h3>Sentra Kelom Geulis</h3>
                    <p>Alas kaki kayu tradisional dengan ukiran tangan yang cantik dan eksklusif khas Tasikmalaya.</p>
                    <div class="stats">
                        <span><i class="fas fa-store"></i> 18 UMKM</span>
                        <span><i class="fas fa-box"></i> 50+ Produk</span>
                    </div>
                    <a href="katalog.html" class="btn-kunjungi">Kunjungi Etalase</a>
                </div>
            </div>
        </div>
    </main>

</body>
</html>