<?php
// --- BAGIAN PHP: DATA MANAGEMENT ---

// 1. Data Produk (Biasanya datang dari Database)
$products = [
    [
        "name" => "Pena Roller Gold Series",
        "desc" => "Ujung jarum 0.5mm, tinta hitam gelap, grip nyaman.",
        "price" => "Rp 25.000",
        "img" => "https://images.unsplash.com/photo-1585336261022-680e295ce3fe?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
    ],
    [
        "name" => "Set Pensil Kayu Premium",
        "desc" => "Karya seni lengkap dari 2B hingga 6B.天然 kayu pilihan.",
        "price" => "Rp 120.000",
        "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmz2PSZEodIcD6tSA7Rc_0eDpqhaHIhBevjg&s=10"
    ],
    [
        "name" => "Buku Sketsa A4 Hardcover",
        "desc" => "Kertas putih premium 200gsm, binding jahiti kuat.",
        "price" => "Rp 45.000",
        "img" => "https://officemart.id/wp-content/uploads/2025/08/sinar-dunia-buku-gambar.jpeg"
    ]
];

// 2. Data Testimoni
$testimonials = [
    ["user" => "Budi Santoso", "text" => "Kualitas pulpennya luar biasa, menulis jadi nyaman dan halus."],
    ["user" => "Ani Susilowati", "text" => "Pengiriman cepat, packing rapih. Buku sketsanya recomend!"],
    ["user" => "Dedi Kurniawan", "text" => "Tempat beli alat tulis terbaik, vielen grakat atas赠品."]
];

// 3. Konfigurasi Website
$company_name = "PaperCraft Stationery";
$contact_email = "hello@papercraft.id";
$contact_phone = "021-12345678";
$year = date("Y");

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $company_name; ?> - Alat Tulis Berkualitas</title>
    <style>
        /* --- BAGIAN CSS: DESAIN TAMPILAN --- */
        :root {
            --primary: #4F46E5;
            --secondary: #10B981;
            --dark: #1F2937;
            --light: #F3F4F6;
            --white: #ffffff;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
        }

        /* Reset & Layout */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }

        a { text-decoration: none; }

        /* Komponen 1 & 2: Hero Section & Sub Headline */
        header.hero {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1456735190827-d1262f71b8a3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--white);
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 10px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 30px;
            font-weight: 300;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-cta {
            background-color: var(--primary);
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: bold;
            transition: 0.3s;
            display: inline-block;
            border: 2px solid var(--primary);
        }

        .btn-cta:hover {
            background-color: transparent;
            color: var(--primary);
        }

        /* Komponen 3: Item Produk */
        section.products {
            padding: 80px 0;
            background-color: var(--white);
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            font-size: 2.5rem;
            color: var(--dark);
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .product-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .product-card:hover {
            transform: translateY(-10px);
        }

        .product-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .product-info {
            padding: 20px;
            text-align: center;
        }

        .product-price {
            color: var(--secondary);
            font-weight: bold;
            font-size: 1.2rem;
            margin: 10px 0;
        }

        /* Komponen 4: Media Visual (Video) */
        section.media-visual {
            padding: 80px 0;
            background-color: var(--dark);
            color: white;
            text-align: center;
        }

        .video-wrapper {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 */
            height: 0;
            overflow: hidden;
            max-width: 800px;
            margin: 0 auto;
            background: #000;
            border-radius: 10px;
        }

        .video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }

        /* Komponen 5: Testimoni */
        section.testimonials {
            padding: 80px 0;
            background-color: #eef2ff;
        }

        .testi-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .testi-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            border-left: 5px solid var(--primary);
        }

        .testi-text {
            font-style: italic;
            margin-bottom: 15px;
        }

        .testi-author {
            font-weight: bold;
            color: var(--primary);
        }

        /* Komponen 6: CTA Section */
        .cta-section {
            padding: 60px 20px;
            text-align: center;
            background-color: white;
        }

        /* Komponen 7: Footer */
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

        .footer-col h3 {
            color: white;
            margin-bottom: 20px;
        }

        .social-links a {
            color: white;
            margin-right: 15px;
            font-size: 1.2rem;
        }

        .copyright {
            text-align: center;
            border-top: 1px solid #374151;
            padding-top: 20px;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 { font-size: 2.5rem; }
            .hero p { font-size: 1.1rem; }
        }
    </style>
</head>
<body>

    <!-- 1. HERO SECTION (HEADLINE & SUB HEADLINE) -->
    <header class="hero">
        <div class="container">
            <h1><?php echo $hero_headline = "TULISMU CERDAS BERSAMA KAMI"; ?></h1>
            <p><?php echo $hero_sub = "Koleksi lengkap alat tulis premium untuk mendukung produktivitas dan kreativitas harian Anda."; ?></p>
            <a href="#products" class="btn-cta">Lihat Koleksi</a>
        </div>
    </header>

    <!-- 3. ITEM PRODUK (Dihasilkan Dinamis oleh PHP) -->
    <section id="products" class="products">
        <div class="container">
            <h2 class="section-title">Produk Unggulan</h2>
            <div class="product-grid">
                <?php foreach($products as $p): ?>
                <div class="product-card">
                    <img src="<?php echo $p['img']; ?>" alt="<?php echo $p['name']; ?>" class="product-img">
                    <div class="product-info">
                        <h3><?php echo $p['name']; ?></h3>
                        <p><?php echo $p['desc']; ?></p>
                        <div class="product-price"><?php echo $p['price']; ?></div>
                        <a href="#" class="btn-cta" style="padding: 10px 20px; font-size: 1rem;">Beli</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">Apa Kata Pelanggan</h2>
            <div class="testi-grid">
                <?php foreach($testimonials as $t): ?>
                <div class="testi-card">
                    <p class="testi-text">"<?php echo $t['text']; ?>"</p>
                    <p class="testi-author">- <?php echo $t['user']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 6. CALL TO ACTION (CTA) -->
    <section class="cta-section">
        
        <div class="container">

            <h2 style="margin-bottom: 20px;">Siap Men