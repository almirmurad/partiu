<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/style.css">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/internas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <title>Ler Notícia</title>
</head>
<body>
<header>
    <!-- Logo e Search-->
    <?php $render('header');?>
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
<?php foreach($events as $event): ?>
    <div class="container ">
        <section class="internal-content column">
            <h4>Você está em: Notícias/<?= $event->title;?></h4>
            <div class="top-integral-notice">
                <div class="cover">
                    <img src="<?=$base;?>/media/uploads/imgs/events/<?=$event->cover?>" alt="">
                </div>
                <div class="data-notice">
                    <ul>
                        <li><h1><?= $event->title;?></h1></li>
                        <li>Postado em: <?= $event->created_at;?></li>
                        <li>Postado por: <?= $event->user->name?></li>
                        <li>Fonte:<?= $event->link;?></li>
                    </ul>
                </div>
            </div>
            <div class="midlle-integral-notice">
                <div class="text-integral-notice">
                    <?= $event->text?>
                </div>
            </div>
            <div class="foot-integral-notice">
                <div class="img1">
                    <img src="<?=$base;?>/media/uploads/imgs/events/<?=$event->img1?>" alt="">
                </div>
                <div class="img2">
                    <img src="<?=$base;?>/media/uploads/imgs/events/<?=$event->img2?>" alt="">
                </div>
            </div>
        </section>
        <aside>
            <?php $render('aside',['page'=>$page]);?>
        </aside>    
    </div>
<?php endforeach; ?>    
</main>
<section class="final">
    <?php $render('internalContentFinal');?>
</section>
<footer>
</footer>
<script src = "<?=$base;?>/assets/js/catSlider.js"></script>
</body>
</html>