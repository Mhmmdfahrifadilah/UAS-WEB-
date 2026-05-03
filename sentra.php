<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sentra Kerajinan - TasikKreatif Go</title>
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
            --white: #ffffff;
        }
        body {
            background-color: var(--bg);
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        header {
            background: var(--white);
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
        .sentra-hero {
            background: var(--dark);
            color: white;
            text-align: center;
            padding: 60px 20px;
        }
        .sentra-hero h1 { font-size: 2.5rem; margin-bottom: 10px; }
        .sentra-section {
            padding: 50px 0;
        }
        .sentra-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }
        .sentra-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
        }
        .sentra-image {
            height: 200px;
            background-size: cover;
            background-position: center;
        }
        .sentra-content {
            padding: 25px;
        }
        .sentra-content h2 {
            color: var(--dark);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sentra-content p {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .product-tags {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .tag {
            background: #e3f9e5;
            color: var(--primary);
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .btn-explore {
            background: var(--primary);
            color: white;
            text-decoration: none;
            text-align: center;
            padding: 12px;
            border-radius: 10px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-explore:hover {
            background: var(--dark);
        }

        footer {
            text-align: center;
            padding: 40px;
            color: #999;
        }
    </style>
</head>
<body>

    <header>
        <nav class="container">
            <a href="index.html" class="logo">TasikKreatif <span>Go</span></a>
            <a href="index.html" style="text-decoration: none; color: var(--dark); font-weight: bold;">Kembali ke Beranda</a>
        </nav>
    </header>

    <section class="sentra-hero">
        <div class="container">
            <h1>Sentra Ekonomi Kreatif</h1>
            <p>Jelajahi pusat-pusat kerajinan unggulan di wilayah Tasikmalaya.</p>
        </div>
    </section>

    <main class="container sentra-section">
        <div class="sentra-grid">
            
            <div class="sentra-card">
                <div class="sentra-image" style="background-image: url('https://images.unsplash.com/photo-1528813145821-2f7781f88547?auto=format&fit=crop&w=600&q=80')"></div>
                <div class="sentra-content">
                    <h2><i class="fas fa-cut"></i> Sentra Kawalu</h2>
                    <p>Dikenal secara nasional sebagai pusat bordir terbaik. Produk utama meliputi mukena, baju koko, dan kebaya dengan detail bordir halus.</p>
                    <div class="product-tags">
                        <span class="tag">Bordir</span>
                        <span class="tag">Fashion Muslim</span>
                    </div>
                    <a href="katalog.html" class="btn-explore">Lihat Produk Kawalu</a>
                </div>
            </div>

            <div class="sentra-card">
                <div class="sentra-image" style="background-image: url('https://images.unsplash.com/photo-1590736704728-f4730bb30770?auto=format&fit=crop&w=600&q=80')"></div>
                <div class="sentra-content">
                    <h2><i class="fas fa-leaf"></i> Sentra Rajapolah</h2>
                    <p>Pusat anyaman mendong dan bambu. Menghasilkan berbagai macam kerajinan tangan seperti tas, tikar, dan souvenir khas Tasikmalaya.</p>
                    <div class="product-tags">
                        <span class="tag">Anyaman</span>
                        <span class="tag">Souvenir</span>
                    </div>
                    <a href="katalog.html" class="btn-explore">Lihat Produk Rajapolah</a>
                </div>
            </div>

            <div class="sentra-card">
                <div class="sentra-image" style="background-image: url('https://images.unsplash.com/photo-1544967082-d9d25d867d66?auto=format&fit=crop&w=600&q=80')"></div>
                <div class="sentra-content">
                    <h2><i class="fas fa-shoe-prints"></i> Sentra Tamansari</h2>
                    <p>Pusat produksi Kelom Geulis, alas kaki kayu tradisional yang diukir cantik. Warisan budaya yang tetap eksis secara turun-temurun.</p>
                    <div class="product-tags">
                        <span class="tag">Kelom Geulis</span>
                        <span class="tag">Alas Kaki Kayu</span>
                    </div>
                    <a href="katalog.html" class="btn-explore">Lihat Produk Tamansari</a>
                </div>
            </div>

        </div>
    </main>

    <footer>
        <p> 2026 TasikKreatif Go. Mengangkat Potensi Lokal.</p>
    </footer>

</body>
</html>