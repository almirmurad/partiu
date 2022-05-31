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
            <?php foreach($data as $partner): ?>
                <h4>Você está em: <?=$page?> / <?=stripslashes($partner->name);?></h4>
                <div class="top-round-map">
                    <div class="cover-round-map">
                        <img src="<?=$base?>/media/uploads/imgs/partners/<?=$partner->cover?>" alt="">
                    </div>
                    <div class="data-round-map">
                        <div class="partner-info">
                            <ul class="pi">
                                <li><h1 class="title-package"><?=stripslashes($partner->name);?></h1></li>
                                <li>E-mail: <?=stripslashes($partner->email);?> - <?=$partner->state?></li>
                                <li>Telefone: <?=stripslashes($partner->phone);?></li>
                                <li>CPF: <?=stripslashes($partner->cpf);?></li>
                                <li>CNPJ: <?=$partner->cnpj?></li>
                                <li>Endereço: <?=$partner->adress?>, <?=$partner->number?></li>
                                <li>Complemento: <?=$partner->complement?></li>
                                <li>Bairro: <?=$partner->district?></li>
                                <li>Cidade: <?=$partner->city?></li>
                                <li>Estado: <?=$partner->state?> - <?=$partner->country?></li>
                                <li>CEP: <?=$partner->postal_code?></li>
                                <li>Site: <?=$partner->url?></li>
                            </ul>
                            <div class="actions-partner">
                                <div class="social-icons collum">
                                    <div class="socialBg"><a href="mailto:<?=stripslashes($partner->email);?>"><i class="fas fa-at fa-2x"></i></a></div>
                                    <div class="socialBg"><a href="<?=$partner->phone?>"><i class="fas fa-phone-alt fa-2x"></i></a></div>
                                    <div class="socialBg"><i class="fab fa-facebook-f fa-2x"></i></div>
                                    <div class="socialBg"><a href="https://wa.me/55<?=$partner->phone?>?text=Contato%20através%20do%20site%20partiu" target="_blank"><i class="fab fa-whatsapp fa-2x"></a></i></div>
                                    <div class="socialBg"><i class="fab fa-instagram fa-2x"></i></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="midlle-round-map">
                    <div class="text-round-map">
                    
                    <?=stripslashes($partner->package->title);?><br>

                  

                    <?=stripslashes($partner->about);?>
                    </div>
                </div>
                <div class="foot-round-map">
                    <div class="round-map flex">
                    <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/partners/<?=$partner->img1?>);"><a href="" class="galerie-link">Galeria</a></div>
                    <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/partners/<?=$partner->img2?>);"><a href="" class="galerie-link">Galeria</a></div>
                    <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/partners/<?=$partner->img3?>);"><a href="" class="galerie-link">texto</a></div>
                    <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/partners/<?=$partner->img4?>);"><a href="" class="galerie-link">texto</a></div>  
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
<script src="<?=$base;?>/assets/js/requests.js"></script>
</body>
</html>