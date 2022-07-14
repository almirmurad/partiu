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
<?php foreach($events as $event): ?>
    <div class="container ">
        <section class="internal-content column">
            <h4>Você está em: <a href="<?=$base?>/eventos">Eventos</a>/<?= $event->title;?></h4>
            <div class="top-round-map">
                <div class="cover-round-map">
                    <img src="<?=$base;?>/media/uploads/imgs/events/<?=$event->cover?>" alt="">
                </div>
                <div class="data-round-map">
                    <ul>
                        <li class="it-dt-notice"><h1 class="title-package"><?= $event->title;?></h1></li>
                        <li class="it-dt-notice">Data do Evento: <?= date('d/m/y H:i:s',strtotime($event->expires_at));?></li>
                        <li class="it-dt-notice">Postado em: <?= date('d/m/y H:i:s',strtotime($event->created_at));?></li>
                        <li class="it-dt-notice">Postado por: <?= $event->user->name?></li>
                        <li class="it-dt-notice">Fonte:<?= $event->link;?></li>
                    </ul>
                </div>
            </div>
            <div class="midlle-integral-notice">
                <div class="text-round-map">
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
    <?php $render('foot');?>
</footer>
<script src = "<?=$base;?>/assets/js/catSlider.js"></script>
<script src="<?=$base;?>/assets/js/requests.js"></script>
</body>
</html>