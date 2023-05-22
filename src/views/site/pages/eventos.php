<?php $render('head');?>
<body>
<header>
        <!-- Logo e Search-->
        <?php $render('header',['loggedUser'=>$loggedUser]);?>
        <div class="nav">
            <!-- Menu navegação-->
            <?php $render('menuNavigation');?>
        </div>
        <?php $render('internalSlider',['page'=>$page]);?>
        <?php $render('internalCategories',['categories'=>$categories])?>
</header>
<main>

    <div class="container collum">
        <h4 class="eventsH4">Você está em: <?=$page?></h4>
            <section class="internal-content">
            
                    <div class="gridEventos1">
                    
                        <div class="eventoLeft">
                            <!-- Eventos -->
                            <?php $render('events',['page'=>$page,
                                            'events'=>$events]);?> 
                        </div>
                        <aside class="eventoRight">
                            <?php $render('aside',['page'=>$page, 'banners'=>$internalPublicity]);?>
                        </aside>
                        <div class="paginationArea">
                            <?php 
                                $render('paginacao',[
                                        'total'=>$events['pageCount'],
                                        'current'=>$events['currentPage'],
                                        'link'=>'eventos'
                                        ]);
                            ?>
                        </div>
            
                    </div>   
   
            </section>
            
    </div>
</main>
<section class="final">
    <?php $render('internalContentFinal',['events'=>$eventsFoot, 'banners'=>$publicityFoot ]);?>
    
</section>
<footer>
    <?php $render('foot');?>
</footer>
<script src = "<?=$base;?>/assets/js/catSlider.js"></script>
<script src = "<?=$base;?>/assets/js/script.js"></script>
<script src="<?=$base;?>/assets/js/requests.js"></script>
</body>
</html>