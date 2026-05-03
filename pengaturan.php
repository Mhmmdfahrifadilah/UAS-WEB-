<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - TasikKreatif Go</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-color: #02c39a; 
            --sidebar-color: #05668d;
            --bg-light: #f4f7f6;
            --white: #ffffff;
            --text-dark: #333;
            --text-muted: #666;
        }

        body {
            display: flex;
            background-color: var(--bg-light);
            min-height: 100vh;
        }

        
        .sidebar {
            width: 260px;
            background-color: var(--sidebar-color);
            color: var(--white);
            position: fixed;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 30px 20px;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header span { color: var(--primary-color); }

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
            color: var(--primary-color);
            border-left: 4px solid var(--primary-color);
        }

        
        .main-content {
            margin-left: 260px;
            flex-grow: 1;
            padding: 40px;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-header h1 {
            color: var(--sidebar-color);
            font-size: 1.8rem;
        }

    
        .settings-card {
            background: var(--white);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            max-width: 800px;
            margin-bottom: 25px;
        }

        .settings-card h2 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: var(--sidebar-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
            font-size: 0.9rem;
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            font-size: 0.95rem;
        }

        .form-group input:focus {
            border-color: var(--primary-color);
        }

        .btn-save {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-save:hover {
            background-color: #00a896;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .sidebar { width: 70px; }
            .sidebar-header, .menu-text { display: none; }
            .main-content { margin-left: 70px; padding: 20px; }
            .form-grid { grid-template-columns: 1fr; }
            .form-group.full-width { grid-column: span 1; }
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">
            TK-<span>Go</span> Admin
        </div>
        <nav class="sidebar-menu">
            <a href="dashboard.html"><i class="fas fa-home"></i> <span class="menu-text">Beranda</span></a>
            <a href="katalog.html"><i class="fas fa-box"></i> <span class="menu-text">Produk Saya</span></a>
            <a href="saku.html"><i class="fas fa-wallet"></i> <span class="menu-text">Saku UMKM</span></a>
            <a href="sentra.html"><i class="fas fa-store"></i> <span class="menu-text">Sentra</span></a>
            <a href="pengaturan.html" class="active"><i class="fas fa-cog"></i> <span class="menu-text">Pengaturan</span></a>
        </nav>
        <a href="index.html" style="margin-top: auto; padding: 20px 25px; color: #ff4d4d; text-decoration: none; display: flex; align-items: center; gap: 15px; border-top: 1px solid rgba(255,255,255,0.1);">
            <i class="fas fa-sign-out-alt"></i> <span class="menu-text">Keluar</span>
        </a>
    </div>

    <div class="main-content">
        <div class="page-header">
            <h1>Pengaturan Akun</h1>
        </div>

        <div class="settings-card">
            <h2><i class="fas fa-user-edit"></i> Informasi Profil Usaha</h2>
            <form>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Nama Lengkap Pemilik</label>
                        <input type="text" value="Muhammad Fahri Fadilah">
                    </div>
                    <div class="form-group">
                        <label>Nama UMKM / Usaha</label>
                        <input type="text" value="Konveksi Bordir">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="fahri@example.com">
                    </div>
                    <div class="form-group">
                        <label>Nomor WhatsApp</label>
                        <input type="tel" value="08123456789">
                    </div>
                    <div class="form-group full-width">
                        <label>Alamat Workshop (Tasikmalaya)</label>
                        <textarea rows="3">Jl. Raya Sumelap, Kelurahan Mugarsari, Kecamatan Tamansari</textarea>
                    </div>
                </div>
                <button type="button" class="btn-save">Simpan Perubahan</button>
            </form>
        </div>

        <div class="settings-card">
            <h2><i class="fas fa-shield-alt"></i> Keamanan & Kata Sandi</h2>
            <form>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Kata Sandi Lama</label>
                        <input type="password" placeholder="********">
                    </div>
                    <div class="form-group">
                        <label>Kata Sandi Baru</label>
                        <input type="password" placeholder="********">
                    </div>
                </div>
                <button type="button" class="btn-save">Update Kata Sandi</button>
            </form>
        </div>
    </div>

</body>
</html>
