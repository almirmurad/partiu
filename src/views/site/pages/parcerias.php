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
    <div class="container ">
        <section class="internal-content column">
            <h4>Você está em: <?=$page?></h4>
            <div class="top-about">
                <div class="cover-about">
                    <!-- <img src="assets/img/sobre.jpg" alt=""> -->
                </div>
                
            </div>
            <div class="midlle-about">
                <div class="text-about">
                    <h1>Estamos muito felizes em saber que tenha interesse em ser nosso <strong>PARCEIRO</strong>!</h1>
                    <p>Preparamos as melhores parcerias para que possa aproveitar o melhor da nossa plataforma. <br>
                    São três tipos de parcerias:</p>
                    <div class="boxes-parcerias">
                        <?php foreach($parcerias as $parceria): ?> 
                        <a href="">
                            <div class="boxes">
                                <div class="boxes-icon">
                                <?php switch ($parceria->id): ?><?php case 1: ?>
                                    <div class="icon">
                                        <i class="fas fa-suitcase-rolling"></i>
                                     </div>
                                    <?php break;?>
                                <?php case 2: ?>
                                    <div class="icon">
                                        <i class="fas fa-bullhorn"></i>
                                    </div>
                                    <?php break;?>
                                <?php case 3: ?>
                                    <div class="icon">
                                        <i class="fas fa-suitcase-rolling"></i>
                                     </div> 
                                    <div class="icon">
                                        <i class="fas fa-bullhorn"></i>
                                    </div>
                                <?php endswitch ?>
                                </div>
                                <?=$parceria->title?>
                            </div>
                        </a>
                        <?php endforeach;?>
                    </div>
                    
                    <?php foreach($parcerias as $parceria): ?>                
                        <div class="tag-tipos-anuncios">
                            <div class="boxes-icon center">
                                <?php switch ($parceria->id): ?><?php case 1: ?>
                                        <div class="icon">
                                            <i class="fas fa-suitcase-rolling"></i>
                                        </div>
                                        <?php break;?>
                                    <?php case 2: ?>
                                        <div class="icon">
                                            <i class="fas fa-bullhorn"></i>
                                        </div>
                                        <?php break;?>
                                    <?php case 3: ?>
                                        <div class="icon">
                                            <i class="fas fa-suitcase-rolling"></i>
                                        </div> 
                                        <div class="icon">
                                            <i class="fas fa-bullhorn"></i>
                                        </div>
                                <?php endswitch ?>
                            </div>
                            <p>
                                <strong><?=$parceria->title?></strong>: <?=$parceria->description?>
                            </p>
                            <div class="mais"><a href="<?=$base?>/parcerias/<?=$parceria->id?>/verParceria" class="mais-info">+ Saiba mais +</a></div>
                        </div>
                    <?php endforeach;?>                                                         

                </div>
            </div>
            <div class="foot-about">
                <?php // $render('galerie');?>
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