<?php $render('head');?>
<body>
<header>
        <!-- Logo e Search-->
        
        <?php $render('header',['loggedUser'=>$loggedUser, 'page'=>$page]);?>
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
            <h4>Você está em: Parcerias / <?=$page?></h4>
            <div class="top-about">
                <div class="cover-about">
                    <!-- <img src="assets/img/sobre.jpg" alt=""> -->
                </div>
                
            </div>
            <div class="midlle-about">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi provident hic aspernatur veritatis iure quas fuga cupiditate ab nam quae unde tempore magnam, recusandae aperiam, ducimus nesciunt. Modi, officia facilis.
                <div class="area-boxes-partnership">
                <?php foreach($partnerships as $partnership):?>
                    <div class="boxes-partnership">
                        <div class="capa-partnership" style="background-image:url('<?=$base?>/media/uploads/imgs/packages/<?=$partnership->cover;?>'); ">
                            <div class="titulo-partnership">
                                <?=$partnership->title;?><br>
                            </div>
                        </div>
                        
                        <div class="descricao-partnership">
                            

                             <?=$partnership->description;?><br>
                        </div>
                        <div class="rodape-partnership">
                            Máximo de pacotes no plano: <?=$partnership->max_pack;?><br>
                            Preço: <?=$partnership->price;?><br>

                            <?php if($loggedUser->partnerstype === NULL):?>
                                <a href="<?=$base?>/registration/<?=$parceria?>/partnerid/<?=$partnership->id;?>/parceria" class="btn-partnership" >Contratar</a>
                            <?php else:?>
                                <a href="#" class="btn-partnership btn-disabled" onclick="alert('Parceiro (<?=$loggedUser->name?>)  ja possui parceria contratada!\nCaso queira, faça um upgrade através do painel do usuário.')">Contratar</a>
                            <?php endif?>
                        </div>
                        
                    </div>
                <?php endforeach?>
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
