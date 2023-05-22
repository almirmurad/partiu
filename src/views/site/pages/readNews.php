<?php $render('head');?>
<body>
<header>
    <!-- Logo e Search-->
    <?php $render('header',['loggedUser'=>$loggedUser, 'page'=>$page]);?>
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
            <h4>Você está em: <a href="<?=$base?>/noticias">Notícias</a>/<?= $oneNews->title;?></h4>
            <div class="top-round-map">
                <div class="cover-round-map">
                    <img src="<?=$base;?>/media/uploads/imgs/news/<?= $oneNews->cover;?>" alt="">
                </div>
                <div class="data-round-map">
                    <ul>
                        <li class="it-dt-notice"><h1 class="title-package"><?= $oneNews->title;?></h1></li>
                        <li class="it-dt-notice">Postado em: <?= $oneNews->created_at;?></li>
                        <li class="it-dt-notice">Postado por: <?= $oneNews->user->name;?></li>
                        <li class="it-dt-notice">Fonte: <?= $oneNews->source;?></li>
                        <li class="it-dt-notice">Fonte: <?= $oneNews->categorie->name;?></li>
                    </ul>
                </div>
            </div>
            <div class="midlle-integral-notice">
                <div class="text-round-map">
                <?= $oneNews->text;?>
                </div>
            </div>
            <div class="foot-integral-notice">
                <div class="img1">
                    <img src="<?=$base;?>/media/uploads/imgs/news/<?= $oneNews->img1;?>" alt="">
                    <div class="legend"><p><?= $oneNews->legend_img1;?></p></div>
                </div>
                <div class="img2">
                    <img src="<?=$base;?>/media/uploads/imgs/news/<?= $oneNews->img2;?>" alt="">
                    <div class="legend"><p><?= $oneNews->legend_img2;?></p></div>
                </div>
            </div>
        </section>
        <aside>
            <?php $render('aside',['page'=>$page, 'banners'=>$internalPublicity]);?>
        </aside>    
    </div>
</main>
<section class="final">
    <?php $render('internalContentFinal',['events'=>$eventsFoot, 'banners'=>$publicityFoot]);?>
</section>
<footer>
    <?php $render('foot');?>
</footer>
<script src = "<?=$base;?>/assets/js/catSlider.js"></script>
<script src="<?=$base;?>/assets/js/requests.js"></script>
</body>
</html>