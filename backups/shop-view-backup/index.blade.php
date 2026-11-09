
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shop - SPORTSPACE</title>

    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-width: 320px;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #172033;
        }

        button,
        input {
            font: inherit;
        }

        button {
            -webkit-tap-highlight-color: transparent;
        }

        .shop-page {
            width: 100%;
            max-width: 1280px;
            min-height: 100vh;
            margin: 0 auto;
            padding: 22px 20px 120px;
        }

        /* HEADER */
        .shop-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 24px;
        }

        .shop-header-left {
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 0;
        }

         /* TOMBOL KEMBALI RESPONSIF */
        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            width: 44px;
            height: 44px;
            min-width: 44px;
            flex-shrink: 0;
            padding: 0;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #fff;
            color: #1e293b;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s ease, border-color 0.2s ease,
                        transform 0.2s ease;
        }

        .back-button svg {
            display: block;
            width: 22px;
            height: 22px;
            flex-shrink: 0;
        }

        .back-button:hover {
            background: #eaf2ff;
            border-color: #c9dcff;
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.16);
            transform: translateY(-1px);
        }

        .back-button:active {
            transform: scale(0.97);
        }

        .back-button:focus-visible {
            outline: 3px solid rgba(37, 99, 235, 0.35);
            outline-offset: 3px;
        }

        .shop-title {
            min-width: 0;
        }

        .shop-title h1 {
            margin: 0;
            font-size: 27px;
            letter-spacing: -0.5px;
            overflow-wrap: anywhere;
        }

        .shop-title p {
            margin: 4px 0 0;
            color: #7b8798;
            font-size: 14px;
            line-height: 1.4;
        }

        .cart-button {
            position: relative;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            border: none;
            border-radius: 16px;
            background: #172033;
            color: #ffffff;
            font-size: 21px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .cart-button:hover {
            transform: translateY(-2px);
        }

        .cart-count {
            position: absolute;
            top: -6px;
            right: -6px;
            width: 21px;
            height: 21px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #f5f7fb;
            border-radius: 50%;
            background: #ef4444;
            color: white;
            font-size: 11px;
            font-weight: 800;
        }

        /* SEARCH */
        .shop-search {
            display: flex;
            align-items: center;
            gap: 11px;
            width: 100%;
            margin-bottom: 24px;
            padding: 0 16px;
            border: 1px solid #e4e9f1;
            border-radius: 17px;
            background: #ffffff;
            transition: 0.2s ease;
        }

        .shop-search:focus-within {
            border-color: #2563eb;
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.08);
        }

        .search-icon {
            color: #94a3b8;
            font-size: 22px;
        }

        .shop-search input {
            width: 100%;
            height: 54px;
            border: none;
            outline: none;
            background: transparent;
            color: #172033;
            font-size: 14px;
        }

        /* HERO */
        .shop-hero {
            position: relative;
            margin-bottom: 28px;
            padding: 32px;
            overflow: hidden;
            border-radius: 28px;
            background: linear-gradient(135deg, #172033 0%, #1e3a8a 55%, #2563eb 100%);
            color: white;
        }

        .shop-hero::before {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            top: -90px;
            right: -60px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.07);
        }

        .shop-hero::after {
            content: "";
            position: absolute;
            width: 150px;
            height: 150px;
            bottom: -80px;
            right: 120px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
        }

        .shop-hero-content {
            position: relative;
            z-index: 2;
            max-width: 570px;
        }

        .hero-label {
            display: inline-flex;
            margin-bottom: 13px;
            padding: 7px 11px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.12);
            font-size: 12px;
            font-weight: 700;
        }

        .shop-hero h2 {
            margin: 0 0 10px;
            font-size: 31px;
            line-height: 1.2;
            letter-spacing: -0.6px;
        }

        .shop-hero p {
            margin: 0;
            color: rgba(255, 255, 255, 0.78);
            line-height: 1.6;
            font-size: 14px;
        }

        .hero-button {
            margin-top: 20px;
            padding: 12px 17px;
            border: none;
            border-radius: 13px;
            background: #ffffff;
            color: #1d4ed8;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .hero-button:hover {
            transform: translateY(-2px);
        }

        /* SECTION */
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 15px;
        }

        .section-header h2 {
            margin: 0;
            font-size: 20px;
            letter-spacing: -0.3px;
        }

        .product-total {
            color: #7b8798;
            font-size: 13px;
        }

        /* CATEGORY */
        .category-row {
            display: flex;
            gap: 10px;
            margin-bottom: 26px;
            padding-bottom: 4px;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .category-row::-webkit-scrollbar {
            display: none;
        }

        .category-button {
            min-width: max-content;
            padding: 11px 17px;
            border: 1px solid #e1e7ef;
            border-radius: 999px;
            background: #ffffff;
            color: #64748b;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .category-button:hover {
            border-color: #93c5fd;
            color: #2563eb;
        }

        .category-button.active {
            border-color: #2563eb;
            background: #2563eb;
            color: white;
            box-shadow: 0 7px 18px rgba(37, 99, 235, 0.22);
        }

        /* PRODUCT */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }

        .product-card {
            position: relative;
            overflow: hidden;
            border: 1px solid #e8edf5;
            border-radius: 22px;
            background: #ffffff;
            cursor: pointer;
            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.04);
            transition: transform 0.22s ease, box-shadow 0.22s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 14px 30px rgba(15, 23, 42, 0.1);
        }

        .product-image {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            aspect-ratio: 1 / 0.82;
            overflow: hidden;
            background: linear-gradient(135deg, #eff6ff, #f8fafc);
            font-size: 66px;
        }

        .product-card:nth-child(2n) .product-image {
            background: linear-gradient(135deg, #f0fdf4, #f8fafc);
        }

        .product-card:nth-child(3n) .product-image {
            background: linear-gradient(135deg, #fff7ed, #f8fafc);
        }

        .product-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            padding: 6px 10px;
            border-radius: 999px;
            background: #172033;
            color: white;
            font-size: 10px;
            font-weight: 800;
        }

        .favorite-product {
            position: absolute;
            top: 11px;
            right: 11px;
            width: 36px;
            height: 36px;
            border: none;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.9);
            color: #64748b;
            font-size: 18px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .favorite-product:hover,
        .favorite-product.active {
            color: #ef4444;
            transform: scale(1.08);
        }

        .product-content {
            padding: 16px;
        }

        .product-category {
            margin: 0 0 7px;
            color: #2563eb;
            font-size: 11px;
            font-weight: 800;
        }

        .product-name {
            min-height: 42px;
            margin: 0 0 14px;
            font-size: 16px;
            line-height: 1.35;
        }

        .product-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .product-price {
            font-size: 16px;
            font-weight: 800;
        }

        .add-cart-button {
            min-width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 13px;
            background: #eff6ff;
            color: #2563eb;
            font-size: 21px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .add-cart-button:hover,
        .add-cart-button.added {
            background: #2563eb;
            color: white;
        }

        .empty-product {
            grid-column: 1 / -1;
            padding: 42px 20px;
            border: 1px dashed #cbd5e1;
            border-radius: 20px;
            background: #ffffff;
            text-align: center;
            color: #7b8798;
        }

        /* TOAST */
        .toast {
            position: fixed;
            z-index: 9999;
            left: 50%;
            bottom: 95px;
            width: calc(100% - 32px);
            max-width: 390px;
            padding: 14px 17px;
            border-radius: 15px;
            background: #172033;
            color: white;
            font-size: 13px;
            font-weight: 600;
            text-align: center;
            opacity: 0;
            pointer-events: none;
            transform: translate(-50%, 25px);
            transition: 0.3s ease;
            box-shadow: 0 15px 40px rgba(15, 23, 42, 0.25);
        }

        .toast.show {
            opacity: 1;
            transform: translate(-50%, 0);
        }

        /* RESPONSIVE */
        @media (max-width: 1050px) {
            .product-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 720px) {
            .shop-page {
                padding: 16px 14px 105px;
            }

            .shop-header {
                gap: 12px;
                margin-bottom: 18px;
            }

            .shop-header-left {
                gap: 12px;
            }

            .shop-title h1 {
                font-size: 22px;
            }

            .shop-title p {
                font-size: 12px;
            }

            .cart-button {
                width: 46px;
                height: 46px;
            }

            .shop-hero {
                padding: 24px 20px;
                border-radius: 23px;
            }

            .shop-hero h2 {
                font-size: 25px;
            }

            .product-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 12px;
            }

            .product-card {
                border-radius: 18px;
            }

            .product-image {
                font-size: 52px;
            }

            .product-content {
                padding: 13px;
            }

            .product-name {
                min-height: 38px;
                margin-bottom: 10px;
                font-size: 14px;
            }

            .product-price {
                font-size: 14px;
            }
        }

        @media (max-width: 370px) {
            .shop-page {
                padding-right: 10px;
                padding-left: 10px;
            }

            .shop-header-left {
                gap: 9px;
            }

            .shop-title h1 {
                font-size: 19px;
            }

            .shop-title p {
                font-size: 11px;
            }

            .back-button,
            .cart-button {
                width: 44px;
                height: 44px;
                min-width: 44px;
            }

            .back-button {
                padding: 0;
            }

            .back-button svg {
                width: 22px;
                height: 22px;
            }

            .product-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<main class="shop-page">

    <header class="shop-header">

        <div class="shop-header-left">

            <button
                type="button"
                class="back-button"
                onclick="window.history.back()"
                aria-label="Kembali"
                title="Kembali"
            >
                <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                >
            <path d="M19 12H5"></path>
            <path d="m12 19-7-7 7-7"></path>
        </svg>
            </button>

            <div class="shop-title">
                <h1>SPORTSPACE Shop</h1>
                <p>Perlengkapan untuk permainan terbaikmu.</p>
            </div>

        </div>

        <button
            type="button"
            class="cart-button"
            onclick="showToast('Keranjang kamu memiliki ' + cartCount + ' produk')"
            aria-label="Lihat keranjang"
            title="Lihat keranjang"
        >
            🛒
            <span class="cart-count" id="cartCount">0</span>
        </button>

    </header>

    <div class="shop-search">
        <span class="search-icon">⌕</span>

        <input
            type="text"
            id="searchProduct"
            placeholder="Cari bola, raket, perlengkapan..."
            autocomplete="off"
            aria-label="Cari produk"
        >
    </div>

    <section class="shop-hero">
        <div class="shop-hero-content">
            <span class="hero-label">SPORT GEAR</span>

            <h2>Siap main? Lengkapi dulu gear kamu.</h2>

            <p>
                Temukan perlengkapan olahraga favoritmu dan
                persiapkan permainan terbaik hari ini.
            </p>

            <button
                type="button"
                class="hero-button"
                onclick="document.getElementById('productSection').scrollIntoView({ behavior: 'smooth' })"
            >
                Lihat Produk 
            </button>
        </div>
    </section>

    <section>
        <div class="section-header">
            <h2>Belanja berdasarkan olahraga</h2>
        </div>

        <div class="category-row">
            <button type="button" class="category-button active" data-category="all">
                Semua
            </button>

            <button type="button" class="category-button" data-category="Futsal">
                ⚽ Futsal
            </button>

            <button type="button" class="category-button" data-category="Badminton">
                🏸 Badminton
            </button>

            <button type="button" class="category-button" data-category="Basket">
                🏀 Basket
            </button>

            <button type="button" class="category-button" data-category="Tenis">
                🎾 Tenis
            </button>

            <button type="button" class="category-button" data-category="Padel">
                🎾 Padel
            </button>
        </div>
    </section>

    <section id="productSection">
        <div class="section-header">
            <h2>Produk Pilihan</h2>
            <span class="product-total" id="productTotal">6 produk</span>
        </div>

        <div class="product-grid" id="productGrid">

            <article class="product-card"
                data-category="Futsal"
                data-name="Bola Futsal Pro">

                <div class="product-image">
                    <span class="product-badge">BEST SELLER</span>
                    <button type="button" class="favorite-product" aria-label="Favoritkan Bola Futsal Pro">♡</button>
                    ⚽
                </div>

                <div class="product-content">
                    <p class="product-category">FUTSAL</p>
                    <h3 class="product-name">Bola Futsal Pro</h3>

                    <div class="product-bottom">
                        <span class="product-price">Rp189.000</span>
                        <button type="button" class="add-cart-button" aria-label="Tambah Bola Futsal Pro ke keranjang">+</button>
                    </div>
                </div>
            </article>

            <article class="product-card"
                data-category="Badminton"
                data-name="Shuttlecock Premium">

                <div class="product-image">
                    <button type="button" class="favorite-product" aria-label="Favoritkan Shuttlecock Premium">♡</button>
                    🏸
                </div>

                <div class="product-content">
                    <p class="product-category">BADMINTON</p>
                    <h3 class="product-name">Shuttlecock Premium</h3>

                    <div class="product-bottom">
                        <span class="product-price">Rp85.000</span>
                        <button type="button" class="add-cart-button" aria-label="Tambah Shuttlecock Premium ke keranjang">+</button>
                    </div>
                </div>
            </article>

            <article class="product-card"
                data-category="Basket"
                data-name="Bola Basket Indoor">

                <div class="product-image">
                    <button type="button" class="favorite-product" aria-label="Favoritkan Bola Basket Indoor">♡</button>
                    🏀
                </div>

                <div class="product-content">
                    <p class="product-category">BASKET</p>
                    <h3 class="product-name">Bola Basket Indoor</h3>

                    <div class="product-bottom">
                        <span class="product-price">Rp249.000</span>
                        <button type="button" class="add-cart-button" aria-label="Tambah Bola Basket Indoor ke keranjang">+</button>
                    </div>
                </div>
            </article>

            <article class="product-card"
                data-category="Tenis"
                data-name="Bola Tenis Competition">

                <div class="product-image">
                    <span class="product-badge">NEW</span>
                    <button type="button" class="favorite-product" aria-label="Favoritkan Bola Tenis Competition">♡</button>
                    🎾
                </div>

                <div class="product-content">
                    <p class="product-category">TENIS</p>
                    <h3 class="product-name">Bola Tenis Competition</h3>

                    <div class="product-bottom">
                        <span class="product-price">Rp120.000</span>
                        <button type="button" class="add-cart-button" aria-label="Tambah Bola Tenis Competition ke keranjang">+</button>
                    </div>
                </div>
            </article>

            <article class="product-card"
                data-category="Padel"
                data-name="Grip Raket Padel">

                <div class="product-image">
                    <button type="button" class="favorite-product" aria-label="Favoritkan Grip Raket Padel">♡</button>
                    🎾
                </div>

                <div class="product-content">
                    <p class="product-category">PADEL</p>
                    <h3 class="product-name">Grip Raket Padel</h3>

                    <div class="product-bottom">
                        <span class="product-price">Rp65.000</span>
                        <button type="button" class="add-cart-button" aria-label="Tambah Grip Raket Padel ke keranjang">+</button>
                    </div>
                </div>
            </article>

            <article class="product-card"
                data-category="Futsal"
                data-name="Kaos Kaki Olahraga">

                <div class="product-image">
                    <button type="button" class="favorite-product" aria-label="Favoritkan Kaos Kaki Olahraga">♡</button>
                    🧦
                </div>

                <div class="product-content">
                    <p class="product-category">FUTSAL</p>
                    <h3 class="product-name">Kaos Kaki Olahraga</h3>

                    <div class="product-bottom">
                        <span class="product-price">Rp35.000</span>
                        <button type="button" class="add-cart-button" aria-label="Tambah Kaos Kaki Olahraga ke keranjang">+</button>
                    </div>
                </div>
            </article>

            <div class="empty-product" id="emptyProduct" style="display: none;">
                😕<br><br>
                Produk yang kamu cari belum tersedia.
            </div>

        </div>
    </section>

</main>

<div class="toast" id="toast" role="status" aria-live="polite"></div>

<script>
    let cartCount = 0;

    const categoryButtons = document.querySelectorAll('.category-button');
    const productCards = document.querySelectorAll('.product-card');
    const searchProduct = document.getElementById('searchProduct');
    const emptyProduct = document.getElementById('emptyProduct');
    const productTotal = document.getElementById('productTotal');
    const cartCountElement = document.getElementById('cartCount');
    const toast = document.getElementById('toast');

    function showToast(message) {
        toast.textContent = message;
        toast.classList.add('show');

        clearTimeout(window.toastTimer);

        window.toastTimer = setTimeout(function() {
            toast.classList.remove('show');
        }, 2500);
    }

    function filterProducts() {
        const activeCategory =
            document.querySelector('.category-button.active')
                ?.dataset.category || 'all';

        const keyword = searchProduct.value.toLowerCase().trim();

        let totalVisible = 0;

        productCards.forEach(function(product) {
            const category = product.dataset.category.toLowerCase();
            const name = product.dataset.name.toLowerCase();

            const categoryMatch =
                activeCategory === 'all' ||
                category === activeCategory.toLowerCase();

            const searchMatch =
                name.includes(keyword) ||
                category.includes(keyword);

            if (categoryMatch && searchMatch) {
                product.style.display = '';
                totalVisible++;
            } else {
                product.style.display = 'none';
            }
        });

        emptyProduct.style.display =
            totalVisible === 0 ? 'block' : 'none';

        productTotal.textContent = totalVisible + ' produk';
    }

    categoryButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            categoryButtons.forEach(function(item) {
                item.classList.remove('active');
            });

            this.classList.add('active');
            filterProducts();
        });
    });

    searchProduct.addEventListener('input', function() {
        filterProducts();
    });

    document.querySelectorAll('.favorite-product').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.stopPropagation();

            this.classList.toggle('active');

            this.textContent = this.classList.contains('active')
                ? '♥'
                : '♡';
        });
    });

    document.querySelectorAll('.add-cart-button').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.stopPropagation();

            const product = this.closest('.product-card');
            const productName = product.dataset.name;

            if (!this.classList.contains('added')) {
                this.classList.add('added');
                this.textContent = '✓';

                cartCount++;
                cartCountElement.textContent = cartCount;

                showToast('✓ ' + productName + ' ditambahkan ke keranjang');
            } else {
                this.classList.remove('added');
                this.textContent = '+';

                cartCount--;
                cartCountElement.textContent = cartCount;

                showToast(productName + ' dihapus dari keranjang');
            }
        });
    });

    productCards.forEach(function(product) {
        product.addEventListener('click', function() {
            const productName = this.dataset.name;

            showToast(productName + ' • Detail produk segera tersedia');
        });
    });
</script>

</body>
</html>
