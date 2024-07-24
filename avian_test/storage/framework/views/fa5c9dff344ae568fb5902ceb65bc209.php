<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaraLux</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS untuk styling tambahan */
        .hero {
            background-image: url(<?php echo e(asset('storage/welcome/welcomeSearchBackground.jpg')); ?>);
        background-size: cover;
        height: 100vh;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        }

        .hero-overlay {
            background: rgba(0, 0, 0, 0.3);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }

        .search-bar {
            margin-top: 30px;
        }

        .features {
            padding: 50px 0;
            background-color: #f8f9fa;
        }

        .features h3 {
            margin-top: 20px;
            color: #ff69b4;
        }

        .features img {
            width: 100px;
            height: 100px;
        }

        footer {
            background-color: #343a40;
            color: white;
        }

        footer a {
            color: #ff69b4;
        }

        .logo {
            font-family: 'Arial', sans-serif;
            font-size: 1.5rem;
            font-weight: bold;
            color: #ff69b4;
            /* Laravel pink */
            display: flex;
            align-items: center;
        }

        .logo-icon {
            margin-right: 5px;
        }

        .logo-icon svg {
            width: 30px;
            height: 30px;
            fill: #ff69b4;
        }

        .btn-primary {
            background-color: #ff69b4;
            border-color: #ff69b4;
        }

        .btn-primary:hover {
            background-color: #ff4081;
            border-color: #ff4081;
        }

        .navbar-light .navbar-brand,
        .navbar-light .navbar-nav .nav-link {
            color: #ff69b4;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php if(Route::has('login')): ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div class="logo">
                    <div class="logo-icon">
                        <!-- Laravel Icon -->
                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M504 256C504 119 393 8 256 8S8 119 8 256s111 248 248 248 248-111 248-248zM380.3 204.7L312 240v104c0 9.5-7.5 16-16 16s-16-6.5-16-16V256l-40.7-23.7c-9.3-5.4-20.9 2.3-20.9 12.7v99.6c0 18.8 14.4 32 32 32h32c17.6 0 32-13.2 32-32v-84l56.3-32.7c10.3-6 10.3-21.3 0-27.3zM221 306V206c0-18.8-14.4-32-32-32h-32c-17.6 0-32 13.2-32 32v100c0 18.8 14.4 32 32 32h32c17.6 0 32-13.2 32-32zm-32 0h-32V206h32v100z" />
                        </svg>
                    </div>
                    LaraLux
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('/dashboard')); ?>">Dashboard</a>
                    </li>

                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>">Log in</a>
                    </li>
                    <?php if(Route::has('register')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>
    <?php endif; ?>

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <h1>Ayo staycation sekarang</h1>
            <form class="search-bar">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari destinasi, hotel, dan lain-lain">
                    <button class="btn btn-primary" type="button">Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Features Section -->
    <div class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="<?php echo e(asset('storage/welcome/home1.jpg')); ?>" alt="Best Prices" class="mb-3">
                    <h3>Best Prices</h3>
                    <p>Find the best deals on hotels, flights, and more.</p>
                </div>
                <div class="col-md-4 text-center">
                    <img src="<?php echo e(asset('storage/welcome/home2.jpeg')); ?>" alt="Wide Selection" class="mb-3">
                    <h3>Wide Selection</h3>
                    <p>Choose from a wide range of destinations and accommodations.</p>
                </div>
                <div class="col-md-4 text-center">
                    <img src="<?php echo e(asset('storage/welcome/home3.jpg')); ?>" alt="Customer Support" class="mb-3">
                    <h3>Customer Support</h3>
                    <p>24/7 customer support to assist with all your needs.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="text-uppercase">About Us</h5>
                    <p>Kami adalah perusahaan perjalanan yang berdedikasi untuk memberikan pengalaman liburan terbaik.</p>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: #212529;">
            &copy; 2024 LaraLux
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH E:\Aplikasi\data\htdocs\wfp\laralux\resources\views/welcome.blade.php ENDPATH**/ ?>