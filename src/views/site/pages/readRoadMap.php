<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base?>/assets/css/style.css">
    <link rel="stylesheet" href="<?=$base?>/assets/css/internas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <title><?=$page?></title>
</head>
<body>
<header>
    <!-- Logo e Search-->
    <?php include_once('assets/php/includes/header.php');?>
    <div class="nav">
        <!-- Menu navegação--> 
        <?php $render('menuNavigation');?>
    </div>
    <!--BannerPrincipal-->
    <?php $render('internalSlider',['page'=>$page]);?>
    <!--categorias-->
    <?php $render('internalCategories',['categories'=>$categories]);?>
</header>
<main>
    <div class="container ">
        <section class="internal-content column">
            <h4>Você está em: <?=$page?></h4>
            <?php foreach($roadMaps as $roadMap): ?>
                <div class="top-round-map">
                    <div class="cover-round-map">
                        <img src="<?=$base?>/media/uploads/imgs/road-map/<?=$roadMap['cover']?>" alt="">
                    </div>
                    <div class="data-round-map">
                        <ul>
                            <li><h1><?=$roadMap['title']?></h1></li>
                            <li><?=$roadMap['created_at']?></li>
                            <li>Postado por: <?=$roadMap['name']?></li>
                            <li>Categoria: <?=$roadMap['categorie']?></li>
                        </ul>
                    </div>
                </div>
                <div class="midlle-round-map">
                    <div class="text-round-map">
                    <?=$roadMap['text']?>
                    </div>
                </div>
                <div class="foot-round-map">
                    <div class="round-map">
                        <div class="grid-round-map">
                            <div class=" left-item " style="background-image:url(<?=$base?>/media/uploads/imgs/road-map/<?=$roadMap['img1']?>);"><a href="" class="galerie-link">Galeria</a></div>
                            <div class=" right-top-item" style="background-image:url(<?=$base?>/media/uploads/imgs/road-map/<?=$roadMap['img2']?>);"><a href="" class="galerie-link">Galeria</a></div>
                            <div class=" right-bottom-item" style="background-image:url(<?=$base?>/media/uploads/imgs/road-map/<?=$roadMap['img3']?>);"><a href="" class="galerie-link">texto</a></div>      
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>   
        </section>
        <aside>
            <?php $render('aside',['page'=>$page]);?>
        </aside>    
    </div>
</main>
<section class="final">
    <?php $render('internalContentFinal');?>
</section>
<footer>
</footer>
<script src = "<?=$base;?>/assets/js/catSlider.js"></script>
</body>
</html>