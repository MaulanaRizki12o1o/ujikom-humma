<?php

$products = [
    [
        "name" => "Pena Roller Gold Series",
        "desc" => "Ujung jarum 0.5mm, tinta hitam gelap, grip nyaman.",
        "price" => "Rp 10.000",
        "img" => "https://images.unsplash.com/photo-1585336261022-680e295ce3fe?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
    ],
    [
        "name" => "Set Pensil Kayu Premium",
        "desc" => "Karya seni lengkap dari 2B hingga 6B. Kayu pilihan.",
        "price" => "Rp 10.000",
        "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmz2PSZEodIcD6tSA7Rc_0eDpqhaHIhBevjg&s=10"
    ],
    [
        "name" => "Buku Sketsa A4 Hardcover",
        "desc" => "Kertas putih premium 200gsm, binding jahit kuat.",
        "price" => "Rp 5.000",
        "img" => "https://officemart.id/wp-content/uploads/2025/08/sinar-dunia-buku-gambar.jpeg"
    ],
    [
        "name" => "Stabilo Boss Highlighter Set",
        "desc" => "Set 6 warna cerah, tinta fluorescent tahan lama, ideal untuk catatan.",
        "price" => "Rp 25.000",
        "img" => "https://images.unsplash.com/photo-1583485088034-697b5bc54ccd?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
    ],
    [
        "name" => "Penggaris Stainless 30cm",
        "desc" => "Bahan baja anti karat, skala presisi mm & cm, tepi rata sempurna.",
        "price" => "Rp 15.000",
        "img" => "https://images.unsplash.com/photo-1611532736597-de2d4265fba3?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
    ],
    [
        "name" => "Sticky Notes Warna-Warni",
        "desc" => "400 lembar per pack, 4 warna pastel, lem kuat tidak merusak kertas.",
        "price" => "Rp 20.000",
        "img" => "https://images.unsplash.com/photo-1586281380349-632531db7ed4?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
    ]
];


$testimonials = [
    ["user" => "Budi Santoso",    "text" => "Kualitas pulpennya luar biasa, menulis jadi nyaman dan halus."],
    ["user" => "Ani Susilowati",  "text" => "Pengiriman cepat, packing rapih. Buku sketsanya recomend!"],
    ["user" => "Dedi Kurniawan",  "text" => "Tempat beli alat tulis terbaik di Indonesia!"]
];


$company_name  = "Toko Alat Tulis Sanjaya";
$contact_email = "hello@sanjaya.id";
$contact_phone = "021-12345678";
$year          = date("Y");


session_start();
$login_error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === 'demo@sanjaya.id' && $password === 'demo123') {
        $_SESSION['user'] = ['name' => 'Demo User', 'email' => $email];
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $login_error = "Email atau kata sandi salah.";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
    exit;
}

$logged_in   = isset($_SESSION['user']);
$user_name   = $logged_in ? htmlspecialchars($_SESSION['user']['name']) : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($company_name); ?> - Alat Tulis Berkualitas</title>
    <style>
        :root {
            --primary:   #4F46E5;
            --primary-d: #3730A3;
            --secondary: #10B981;
            --dark:      #1F2937;
            --light:     #F3F4F6;
            --white:     #ffffff;
            --nav-h:     68px;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
        }

        .container { max-width: 1100px; margin: 0 auto; padding: 0 20px; }
        a { text-decoration: none; }

        nav.navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            background: rgba(255,255,255,0.97);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid #e5e7eb;
            height: var(--nav-h);
            display: flex;
            align-items: center;
        }

        .navbar .container {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-brand {
            font-size: 1.35rem;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: -0.5px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
            list-style: none;
            margin: 0; padding: 0;
        }

        .nav-links a {
            color: var(--dark);
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.2s;
            position: relative;
            padding-bottom: 3px;
        }

        .nav-links a:not(.btn-nav-login)::after {
            content: '';
            position: absolute;
            bottom: -2px; left: 50%; right: 50%;
            height: 2px;
            background: var(--primary);
            border-radius: 2px;
            transition: left 0.25s ease, right 0.25s ease;
        }

        .nav-links a:not(.btn-nav-login):hover::after { left: 0; right: 0; }
        .nav-links a:hover { color: var(--primary); }

        .nav-links a.nav-active:not(.btn-nav-login) { color: var(--primary); }
        .nav-links a.nav-active:not(.btn-nav-login)::after { left: 0; right: 0; }

        nav.navbar { transition: box-shadow 0.3s, background 0.3s; }
        nav.navbar.scrolled { box-shadow: 0 4px 24px rgba(0,0,0,0.10); }

        .btn-nav-login {
            background: var(--primary);
            color: white !important;
            padding: 8px 22px;
            border-radius: 50px;
            font-weight: 600 !important;
            font-size: 0.9rem !important;
            transition: background 0.2s, transform 0.15s !important;
            white-space: nowrap;
        }

        .btn-nav-login:hover {
            background: var(--primary-d) !important;
            color: white !important;
            transform: translateY(-1px);
        }

        .user-menu {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .user-avatar {
            width: 36px; height: 36px;
            background: var(--primary);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        .user-name-label {
            font-weight: 600;
            color: var(--dark);
            font-size: 0.9rem;
        }

        .user-dropdown {
            display: none;
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
            min-width: 180px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            transform-origin: top right;
        }

        @keyframes dropdownIn {
            from { opacity: 0; transform: scale(0.92) translateY(-6px); }
            to   { opacity: 1; transform: scale(1)    translateY(0); }
        }

        .user-menu:hover .user-dropdown,
        .user-menu:focus-within .user-dropdown {
            display: block;
            animation: dropdownIn 0.2s ease forwards;
        }

        .user-dropdown a {
            display: block;
            padding: 11px 18px;
            color: var(--dark);
            font-size: 0.9rem;
            transition: background 0.15s;
        }

        .user-dropdown a:hover { background: var(--light); color: var(--primary); }

        .user-dropdown .logout-link { color: #ef4444 !important; border-top: 1px solid #e5e7eb; }

        .nav-toggle {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 6px;
            flex-direction: column;
            gap: 5px;
        }

        .nav-toggle span {
            display: block;
            width: 24px; height: 2px;
            background: var(--dark);
            border-radius: 2px;
            transition: transform 0.3s ease, opacity 0.3s ease, width 0.3s ease;
            transform-origin: center;
        }

        .nav-toggle.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
        .nav-toggle.open span:nth-child(2) { opacity: 0; transform: scaleX(0); }
        .nav-toggle.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

        header.hero {
            margin-top: var(--nav-h);
            background:
                linear-gradient(rgba(0,0,0,0.58), rgba(0,0,0,0.58)),
                url('https://images.unsplash.com/photo-1456735190827-d1262f71b8a3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            min-height: calc(80vh - var(--nav-h));
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--white);
            padding: 60px 20px;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 10px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .hero p {
            font-size: 1.4rem;
            margin-bottom: 30px;
            font-weight: 300;
            max-width: 680px;
            margin-left: auto; margin-right: auto;
        }

        .btn-cta {
            background-color: var(--primary);
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: bold;
            transition: 0.3s;
            display: inline-block;
            border: 2px solid var(--primary);
        }

        .btn-cta:hover {
            background-color: transparent;
            color: var(--primary);
        }

        section.products {
            padding: 80px 0;
            background-color: var(--white);
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            font-size: 2.2rem;
            color: var(--dark);
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .product-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .product-card:hover { transform: translateY(-8px); }

        .product-img { width: 100%; height: 230px; object-fit: cover; }

        .product-info { padding: 20px; text-align: center; }

        .product-price {
            color: var(--secondary);
            font-weight: bold;
            font-size: 1.2rem;
            margin: 10px 0;
        }

        section.testimonials {
            padding: 80px 0;
            background-color: #eef2ff;
        }

        .testi-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .testi-card {
            background: white;
            padding: 28px;
            border-radius: 10px;
            border-left: 5px solid var(--primary);
        }

        .testi-text { font-style: italic; margin-bottom: 12px; }
        .testi-author { font-weight: bold; color: var(--primary); }

        .cta-section {
            padding: 70px 20px;
            text-align: center;
            background-color: white;
        }

        .cta-section h2 { font-size: 2rem; margin-bottom: 14px; }
        .cta-section p  { color: #6b7280; margin-bottom: 28px; }

        footer {
            background-color: #111827;
            color: #9CA3AF;
            padding: 60px 0 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-col h3 { color: white; margin-bottom: 16px; }
        .footer-col p, .footer-col a { color: #9CA3AF; font-size: 0.9rem; display: block; margin-bottom: 6px; }
        .footer-col a:hover { color: white; }

        .copyright {
            text-align: center;
            border-top: 1px solid #374151;
            padding-top: 20px;
            font-size: 0.85rem;
        }

        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.55);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.active { display: flex; }

        .modal-box {
            background: white;
            border-radius: 16px;
            width: 100%;
            max-width: 420px;
            padding: 40px 36px 32px;
            position: relative;
            box-shadow: 0 25px 50px rgba(0,0,0,0.25);
            animation: slideUp 0.25s ease;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .modal-close {
            position: absolute;
            top: 14px; right: 16px;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #9ca3af;
            line-height: 1;
            padding: 4px 8px;
            border-radius: 6px;
            transition: background 0.15s;
        }

        .modal-close:hover { background: #f3f4f6; color: var(--dark); }

        .modal-logo {
            text-align: center;
            margin-bottom: 6px;
        }

        .modal-logo span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 52px; height: 52px;
            background: var(--primary);
            border-radius: 14px;
            font-size: 1.6rem;
        }

        .modal-box h2 {
            text-align: center;
            font-size: 1.5rem;
            margin: 12px 0 4px;
            color: var(--dark);
        }

        .modal-box .modal-sub {
            text-align: center;
            color: #6b7280;
            font-size: 0.9rem;
            margin-bottom: 28px;
        }

        .form-group { margin-bottom: 18px; }

        .form-group label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 6px;
        }

        .form-group input {
            width: 100%;
            padding: 11px 14px;
            border: 1.5px solid #d1d5db;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
            font-family: inherit;
        }

        .form-group input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79,70,229,0.12);
        }

        .form-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
            font-size: 0.85rem;
        }

        .form-row label { display: flex; align-items: center; gap: 6px; cursor: pointer; color: #4b5563; }
        .form-row a     { color: var(--primary); font-weight: 600; }
        .form-row a:hover { text-decoration: underline; }

        .btn-login {
            width: 100%;
            padding: 13px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s, transform 0.15s;
            font-family: inherit;
        }

        .btn-login:hover { background: var(--primary-d); transform: translateY(-1px); }
        .btn-login:active { transform: translateY(0); }

        .modal-divider {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 20px 0;
            color: #9ca3af;
            font-size: 0.8rem;
        }

        .modal-divider::before,
        .modal-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e5e7eb;
        }

        .btn-register {
            width: 100%;
            padding: 12px;
            background: white;
            color: var(--primary);
            border: 2px solid var(--primary);
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s;
            font-family: inherit;
        }

        .btn-register:hover { background: #eef2ff; }

       
        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #1cb97d;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 0.88rem;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .demo-hint {
            text-align: center;
            font-size: 0.8rem;
            color: #9ca3af;
            margin-top: 16px;
            padding: 10px;
            background: #f9fafb;
            border-radius: 8px;
        }

        .demo-hint b { color: var(--dark); }

        @media (max-width: 7668px) {
            .hero h1 { font-size: 2.2rem; }
            .hero p   { font-size: 1rem; }

            .nav-links {
                display: flex;
                flex-direction: column;
                position: absolute;
                top: var(--nav-h);
                left: 1px; right: 0;
                background: white;
                padding: 0 20px;
                border-bottom: 1px solid #e5e7eb;
                gap: 0;
                max-height: 0;
                overflow: hidden;
                opacity: 1;
                transition: max-height 0.35s ease, opacity 0.3s ease, padding 0.3s ease;
            }

            .nav-links li {
                border-bottom: 1px solid #f3f4f6;
                padding: 12px 0;
            }

            .nav-links li:last-child { border-bottom: none; }

            .nav-links.open {
                max-height: 400px;
                opacity: 1;
                padding: 8px 20px 16px;
            }

            .nav-toggle { display: flex; }
            .modal-box { padding: 32px 22px 24px; }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="container">
            <a href="#" class="nav-brand">✒️ <?php echo htmlspecialchars($company_name); ?></a>

            <ul class="nav-links" id="navLinks">
                <li><a href="#products">Produk</a></li>
                <li><a href="#testimonials">Testimoni</a></li>
                <li><a href="mailto:<?php echo $contact_email; ?>">Kontak</a></li>
                <li>
                    <?php if ($logged_in): ?>
                        <div class="user-menu" tabindex="0">
                            <div class="user-avatar"><?php echo strtoupper(substr($user_name, 0, 1)); ?></div>
                            <span class="user-name-label"><?php echo $user_name; ?></span>
                            <div class="user-dropdown">
                                <a href="#">👤 Profil Saya</a>
                                <a href="#">🛍️ Pesanan</a>
                                <a href="?logout=1" class="logout-link">🚪 Keluar</a>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="#" class="btn-nav-login" id="openLoginBtn">Masuk</a>
                    <?php endif; ?>
                </li>
            </ul>

            <button class="nav-toggle" id="navToggle" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </nav>

    <header class="hero">
        <div class="container">
            <h1>TULISMU CERDAS BERSAMA KAMI</h1>
            <p>Koleksi lengkap alat tulis premium untuk mendukung produktivitas dan kreativitas harian Anda.</p>
            <a href="#products" class="btn-cta">Lihat Koleksi</a>
        </div>
    </header>

    <section id="products" class="products">
        <div class="container">
            <h2 class="section-title">Produk Unggulan</h2>
            <div class="product-grid">
                <?php foreach ($products as $p): ?>
                <div class="product-card">
                    <img src="<?php echo htmlspecialchars($p['img']); ?>"
                         alt="<?php echo htmlspecialchars($p['name']); ?>"
                         class="product-img">
                    <div class="product-info">
                        <h3><?php echo htmlspecialchars($p['name']); ?></h3>
                        <p><?php echo htmlspecialchars($p['desc']); ?></p>
                        <div class="product-price"><?php echo htmlspecialchars($p['price']); ?></div>
                        <?php if ($logged_in): ?>
                            <a href="#" class="btn-cta" style="padding:10px 22px;font-size:0.95rem;">Beli Sekarang</a>
                        <?php else: ?>
                            <!-- FIX: pakai class "open-login-btn" bukan id duplikat -->
                            <a href="#" class="btn-cta open-login-btn" style="padding:10px 22px;font-size:0.95rem;">Masuk untuk Beli</a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="testimonials" class="testimonials">
        <div class="container">
            <h2 class="section-title">Apa Kata Pelanggan</h2>
            <div class="testi-grid">
                <?php foreach ($testimonials as $t): ?>
                <div class="testi-card">
                    <p class="testi-text">"<?php echo htmlspecialchars($t['text']); ?>"</p>
                    <p class="testi-author">— <?php echo htmlspecialchars($t['user']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <h2>Siap Menulis Lebih Produktif?</h2>
            <p>Bergabunglah bersama ribuan pelanggan yang telah mempercayai <?php echo htmlspecialchars($company_name); ?>.</p>
            <?php if (!$logged_in): ?>
                <a href="#" class="btn-cta" id="openLoginBtnCTA">Daftar / Masuk Sekarang</a>
            <?php else: ?>
                <a href="#products" class="btn-cta">Belanja Sekarang</a>
            <?php endif; ?>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h3><?php echo htmlspecialchars($company_name); ?></h3>
                    <p>Alat tulis berkualitas untuk semua kebutuhan belajar dan berkreasi Anda.</p>
                </div>
                <div class="footer-col">
                    <h3>Navigasi</h3>
                    <a href="#products">Produk</a>
                    <a href="#testimonials">Testimoni</a>
                    <a href="#">Tentang Kami</a>
                </div>
                <div class="footer-col">
                    <h3>Kontak</h3>
                    <a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a>
                    <a href="tel:<?php echo $contact_phone; ?>"><?php echo $contact_phone; ?></a>
                </div>
            </div>
            <p class="copyright">&copy; <?php echo $year; ?> <?php echo htmlspecialchars($company_name); ?>. Semua hak dilindungi.</p>
        </div>
    </footer>

    <div class="modal-overlay <?php echo !empty($login_error) ? 'active' : ''; ?>" id="loginModal">
        <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
            <button class="modal-close" id="closeModal" aria-label="Tutup">&times;</button>

            <div class="modal-logo"><span>✒️</span></div>
            <h2 id="modalTitle">Selamat Datang</h2>
            <p class="modal-sub">Masuk ke akun <?php echo htmlspecialchars($company_name); ?> Anda</p>

            
            <?php if (!empty($login_error)): ?>
            <div class="alert-error">
                <span>⚠️</span> <?php echo htmlspecialchars($login_error); ?>
            </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="hidden" name="action" value="login">

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" id="email" name="email"
                           placeholder="nama@email.com" required
                           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" id="password" name="password"
                           placeholder="Masukkan kata sandi" required>
                </div>

                <div class="form-row">
                    <label>
                        <input type="checkbox" name="remember"> Ingat saya
                    </label>
                    <a href="#">Lupa kata sandi?</a>
                </div>

                <button type="submit" class="btn-login">Masuk</button>
            </form>

            <p class="demo-hint">
                Demo akun: <b>demo@sanjaya.id</b> / <b>demo123</b>
            </p>
        </div>
    </div>

    <script>
    (function () {
        const modal     = document.getElementById('loginModal');
        const closeBtn  = document.getElementById('closeModal');
        const navToggle = document.getElementById('navToggle');
        const navLinks  = document.getElementById('navLinks');
        const navbar    = document.querySelector('nav.navbar');

        function openModal()  { modal.classList.add('active');  document.body.style.overflow = 'hidden'; }
        function closeModal() { modal.classList.remove('active'); document.body.style.overflow = ''; }

        // FIX: tombol navbar & CTA pakai id, tombol produk pakai class
        ['openLoginBtn', 'openLoginBtnCTA'].forEach(function(id) {
            var el = document.getElementById(id);
            if (el) el.addEventListener('click', function(e) { e.preventDefault(); openModal(); });
        });

        // FIX: tangkap semua tombol produk dengan class open-login-btn
        document.querySelectorAll('.open-login-btn').forEach(function(el) {
            el.addEventListener('click', function(e) { e.preventDefault(); openModal(); });
        });

        if (closeBtn) closeBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', function(e) { if (e.target === modal) closeModal(); });
        document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeModal(); });

        if (navToggle) {
            navToggle.addEventListener('click', function() {
                var isOpen = navLinks.classList.toggle('open');
                navToggle.classList.toggle('open', isOpen);
                navToggle.setAttribute('aria-expanded', isOpen);
            });
        }

        window.addEventListener('scroll', function() {
            navbar.classList.toggle('scrolled', window.scrollY > 20);
        }, { passive: true });

        function easeInOutCubic(t) {
            return t < 0.5
                ? 4 * t * t * t
                : 1 - Math.pow(-2 * t + 2, 3) / 2;
        }

        function smoothScrollTo(targetY, duration) {
            var startY    = window.scrollY;
            var distance  = targetY - startY;
            var startTime = null;
            var actualDuration = Math.min(duration, Math.max(400, Math.abs(distance) * 0.5));

            function step(timestamp) {
                if (!startTime) startTime = timestamp;
                var elapsed  = timestamp - startTime;
                var progress = Math.min(elapsed / actualDuration, 1);
                var ease     = easeInOutCubic(progress);
                window.scrollTo(0, startY + distance * ease);
                if (progress < 1) requestAnimationFrame(step);
            }

            requestAnimationFrame(step);
        }

        navLinks.querySelectorAll('a[href^="#"]').forEach(function(link) {
            link.addEventListener('click', function(e) {
                var target = document.querySelector(this.getAttribute('href'));
                if (!target) return;
                e.preventDefault();

                navLinks.classList.remove('open');
                navToggle.classList.remove('open');

                var offset = navbar.offsetHeight + 8;
                var top    = target.getBoundingClientRect().top + window.scrollY - offset;
                smoothScrollTo(top, 800);
            });
        });

        var sections   = document.querySelectorAll('section[id], header[id]');
        var navAnchors = navLinks.querySelectorAll('a[href^="#"]');

        function setActiveLink() {
            var scrollY = window.scrollY + navbar.offsetHeight + 40;
            sections.forEach(function(sec) {
                if (scrollY >= sec.offsetTop && scrollY < sec.offsetTop + sec.offsetHeight) {
                    navAnchors.forEach(function(a) {
                        a.classList.toggle('nav-active', a.getAttribute('href') === '#' + sec.id);
                    });
                }
            });
        }

        window.addEventListener('scroll', setActiveLink, { passive: true });
    })();
    </script>

</body>
</html>