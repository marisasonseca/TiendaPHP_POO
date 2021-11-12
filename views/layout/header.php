<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Shirt Shop</title>
    <link rel="stylesheet" href="<?=BASE_URL?>assets/css/style.css">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300&display=swap" rel="stylesheet"> 
</head>
<body>
    <!-- HEADER -->
    <header class="site-header">
        <div class="header-logo">
            <figure class="logo">
                <img src="<?=BASE_URL?>assets/img/camiseta.png" alt="Camiseta logo" />
            </figure>
            <a href="<?=BASE_URL?>">
                shirts shop
            </a>
        </div>
    <!-- Menu -->
        <?php $categories = Utils::showCategories();?>
        <nav class="header-menu">
            <ul>
                <li><a href="<?=BASE_URL?>">Home</a></li>
                <?php while($category = $categories->fetch_object()): ?>
                    <li><a href="<?=BASE_URL?>category/view&id=<?=$category->id?>"><?=$category->name?></a></li>
                <?php endwhile;?>
            </ul>
        </nav>
    </header>
    
    <!-- MAIN -->
    <main class="site-main">