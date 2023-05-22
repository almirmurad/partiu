<?php $render('../../site/partials/head');?>
<body>
<header class="pg-form-user">
        <!-- Logo e Search-->
        
        <?php $render('../../site/partials/header',['loggedUser'=>$loggedUser]);?>
        <div class="nav">
            <!-- Menu navegação-->
            
            <?php $render('../../site/partials/menuNavigation');?>
        </div>
        <?php // $render('internalSlider',['page'=>$page]);?>
        
        <?php //$render('internalCategories',['categories'=>$categories])?>
        

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
            <div class="midlle-about area-form-parceiro">
                <div class="form-cadastro-parceiro">
                    <?php

                        switch($id){
                            case 1:
                                $parceria = "Simple";
                                break;
                            case 2:
                                $parceria = "Plus";
                                break;
                            case 3:
                                $parceria = "Premium";
                                break;
                        }
                    ?>
                    <?php if(empty($loggedUser)):?>
                        <?php $render('../../site/partials/addPartner',['parceria'=>$parceria, 'pid'=>$pid]);?>
                    <?php else:?>
                        <div> 
                            <p>Olá <?=$loggedUser->name?>, você já é um usuário cadastrado.<br/>
                            Retorne ao <a href="<?=$base?>/">Início</a>! </p> 
                        </div>
                    <?php endif?>
                    
               </div>
            </div>
            <div class="foot-about">
                <?php // $render('galerie');?>
            </div>

        </section>
        <aside class="hidden">
        <?php //$render('aside',['page'=>$page, 'banners'=>$internalPublicity]);?>
        </aside>    
    </div>
</main>
<section class="final">
    <?php //$render('internalContentFinal',['events'=>$eventsFoot, 'banners'=>$publicityFoot]);?>
</section>
<footer>
    <?php $render('foot');?>
</footer>
<script src = "<?=$base;?>/assets/js/catSlider.js"></script>
<script src="<?=$base;?>/assets/js/requests.js"></script>
</body>
</html>