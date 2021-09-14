<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Shirt Shop</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <!-- HEADER -->
    <header class="site-header">
        <div class="logo">
            <figure>
                <img src="assets/img/camiseta.png" alt="Camiseta logo" />
            </figure>
            <a href="index.php">
                SHIRT SHOP
            </a>
        </div>
    <!-- Menu -->
        <nav class="header-menu">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="">Category 1</a></li>
                <li><a href="">Category 2</a></li>
            </ul>
        </nav>
    </header>
    
    <!-- MAIN -->
    <main class="site-main">
        <!-- SIDERBAR -->
        <aside class="sidebar">
            <div class="block-siderbar sidebar-login">
                <form action="#" method="POST">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                    
                    <label for="password">Password</label>
                    <input type="password" name="password">

                    <input type="submit" value="Enter">
                </form>

                <a href="#">My Orders</a>
                <a href="#">Orders Management</a>
                <a href="#">Categories Management</a>
            </div>
        </aside>
        <div class="main-content">
            <div class="product">
                <figure>
                    <img src="assets/img/camiseta.png" alt="">
                </figure>
                <h2>Wide Blue T-Shirt</h2>
                <p>$30 Euros</p>
                <a href="#">Buy</a>
            </div>
            <div class="product">
                <figure>
                    <img src="assets/img/camiseta.png" alt="">
                </figure>
                <h2>Wide Blue T-Shirt</h2>
                <p>$30 Euros</p>
                <a href="#">Buy</a>
            </div>
            <div class="product">
                <figure>
                    <img src="assets/img/camiseta.png" alt="">
                </figure>
                <h2>Wide Blue T-Shirt</h2>
                <p>$30 Euros</p>
                <a href="#">Buy</a>
            </div>
            <div class="product">
                <figure>
                    <img src="assets/img/camiseta.png" alt="">
                </figure>
                <h2>Wide Blue T-Shirt</h2>
                <p>$30 Euros</p>
                <a href="#">Buy</a>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="site-footer">
        <p>Developed for Christian Vargas &copy <?=date('Y')?></p>
    </footer>

</body>
</html>