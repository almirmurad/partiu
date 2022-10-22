<?php $render('head');?>
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
<?php foreach($oneNews as $lastedNews): ?>
    <div class="container ">
        <section class="internal-content column">
            <h4>Você está em: <a href="<?=$base?>/noticias">Notícias</a>/<?= $lastedNews['title'];?></h4>
            <div class="top-round-map">
                <div class="cover-round-map">
                    <img src="<?=$base;?>/media/uploads/imgs/news/<?= $lastedNews['cover'];?>" alt="">
                </div>
                <div class="data-round-map">
                    <ul>
                        <li class="it-dt-notice"><h1 class="title-package"><?= $lastedNews['title'];?></h1></li>
                        <li class="it-dt-notice">Postado em: <?= $lastedNews['created_at'];?></li>
                        <li class="it-dt-notice">Postado por: <?= $lastedNews['name'];?></li>
                        <li class="it-dt-notice">Fonte: <?= $lastedNews['source'];?></li>
                    </ul>
                </div>
            </div>
            <div class="midlle-integral-notice">
                <div class="text-round-map">
                <?= $lastedNews['text'];?>
                </div>
            </div>
            <div class="foot-integral-notice">
                <div class="img1">
                    <img src="<?=$base;?>/media/uploads/imgs/news/<?= $lastedNews['img1'];?>" alt="">
                    <div class="legend"><p><?= $lastedNews['legend_img1'];?></p></div>
                </div>
                <div class="img2">
                    <img src="<?=$base;?>/media/uploads/imgs/news/<?= $lastedNews['img2'];?>" alt="">
                    <div class="legend"><p><?= $lastedNews['legend_img2'];?></p></div>
                </div>
            </div>
        </section>
        <aside>
            <?php $render('aside',['page'=>$page, 'banners'=>$internalPublicity]);?>
        </aside>    
    </div>
<?php endforeach; ?>    
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