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
            <h4>Você está em: <?=$page?></h4>
            <?php foreach($data as $package): ?>
                <div class="top-round-map">
                    <div class="cover-round-map">
                        <img src="<?=$base?>/media/uploads/imgs/packages/<?=$package->cover?>" alt="">
                    </div>
                    <div class="data-round-map">
                        <ul>
                            <li><h1><?=stripslashes($package->title);?></h1></li>
                            <li>Destino: <?=stripslashes($package->destination);?> - <?=$package->state?></li>
                            <li>País: <?=stripslashes($package->country);?></li>
                            <li>Saída de: <?=stripslashes($package->exit_from);?></li>
                            <li>Saída em: <?=$package->going_on?></li>
                            <li>Retorna em: <?=$package->return_in?></li>
                            <li>Disponivel até: <?=$package->expires_at?></li>
                            <li><strong>Preço: </strong> R$<?=$package->price?></li>
                        </ul>
                    </div>
                    
                </div>
                <div class="midlle-round-map">
                    <div class="text-round-map">
                    <?=stripslashes($package->text);?>
                    </div>
                </div>
                <div class="foot-round-map">
                    <div class="round-map flex">
                    <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/packages/<?=$package->img1?>);"><a href="" class="galerie-link">Galeria</a></div>
                    <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/packages/<?=$package->img2?>);"><a href="" class="galerie-link">Galeria</a></div>
                    <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/packages/<?=$package->img3?>);"><a href="" class="galerie-link">texto</a></div>
                    <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/packages/<?=$package->img4?>);"><a href="" class="galerie-link">texto</a></div>  
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
    <?php $render('internalContentFinal',['events'=>$events]);?>
</section>
<footer>
    <?php $render('foot');?>
</footer>
<script src = "<?=$base;?>/assets/js/catSlider.js"></script>
</body>
</html>