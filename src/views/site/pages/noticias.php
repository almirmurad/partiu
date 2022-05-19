<?php $render('head');?>
<body>
<header>
        <!-- Logo e Search-->
        <?php $render('header');?>
        <div class="nav">
            <!-- Menu navegação-->
            <?php $render('menuNavigation');?>
        </div>
        <?php $render('internalSlider',['page'=>$page]);?>
        <?php $render('internalCategories',['categories'=>$categories])?>
</header>
<main>
    
    
        <div class="container">
            <section class="internal-content">
                <div class="noticias">   
                    <?php $render('gridNoticias',['news'=> $news]);?>
                </div>
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