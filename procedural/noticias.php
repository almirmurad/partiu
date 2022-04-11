<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php $page = "Notícias"?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/internas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <title><?= $page ?></title>
</head>
<body>

<header>
        <!-- Logo e Search-->
        <?php include_once('assets/php/includes/header.php');?>

        <div class="nav">
            <!-- Menu navegação-->
            <?php include_once('assets/php/includes/menuNavigation.php');?>
        </div>
        <?php include_once('assets/php/includes/internalSlider.php');?>
        
        <?php include_once('assets/php/includes/internalCategories.php');?>
        

</header>
<main>
    <div class="container">
    <section class="internal-content">
        
    <?php include_once('assets/php/includes/gridNoticias.php');?>

    </section>
    <aside>
    <?php include_once('assets/php/includes/aside.php');?>

    </aside>    
    </div>
</main>
<section class="final">
    <?php include_once('assets/php/includes/internalContentFinal.php');?>
</section>
<footer>


</footer>
</body>
</html>