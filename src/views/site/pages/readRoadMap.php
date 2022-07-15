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
    <div class="container ">
        <section class="internal-content column">
            <h4>Você está em:<a href="<?=$base?>/roteiros">Roteiros</a>/ <?=$page?></h4>
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
                    <div class="round-map flex">
                        <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/road-map/<?=$roadMap['img1']?>);"><a href="" class="galerie-link">Galeria</a></div>
                        <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/road-map/<?=$roadMap['img2']?>);"><a href="" class="galerie-link">Galeria</a></div>
                        <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/road-map/<?=$roadMap['img3']?>);"><a href="" class="galerie-link">texto</a></div>
                        <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/road-map/<?=$roadMap['img4']?>);"><a href="" class="galerie-link">texto</a></div>  
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
    <?php $render('foot');?>
</footer>
<script src = "<?=$base;?>/assets/js/catSlider.js"></script>
<script src="<?=$base;?>/assets/js/requests.js"></script>
</body>
</html>