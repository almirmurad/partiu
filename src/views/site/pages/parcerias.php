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
                        <a href="">
                            <div class="boxes">
                                <div class="boxes-icon">
                                    <div class="icon">
                                        <i class="fas fa-suitcase-rolling"></i>
                                    </div>
                                </div>
                                PACOTES
                            </div>
                        </a>
                        <a href="">
                            <div class="boxes">
                                <div class="boxes-icon">
                                    <div class="icon">
                                        <i class="fas fa-bullhorn"></i>
                                    </div>
                                </div>
                                ANÚNCIOS
                            </div>
                        </a>
                        <a href="">
                            <div class="boxes">
                                <div class="boxes-icon">
                                    <div class="icon">
                                        <i class="fas fa-suitcase-rolling"></i>
                                    </div> 
                                    <div class="icon">
                                        <i class="fas fa-bullhorn"></i>
                                    </div>
                                </div>
                                PACOTES & ANÚNCIOS
                            </div>
                        </a>
                    </div>
                                        
                    <div class="tag-tipos-anuncios">
                        <div class="boxes-icon center">
                            <div class="icon">
                                <i class="fas fa-suitcase-rolling"></i>
                            </div>
                        </div>
                        <p>
                        Em <strong>Pacotes</strong>, você poderá expor as informações e quatro fotos de seus pacotes de viagens mais atrativos por um preço justo,
                        possibilitando assim o aumento da visibilidade e a lucratividade da sua empresa. <br>
                        Nesta Modalidade além de informações de seus pacotes sua empresa ganhará também uma página interna com descrição, links para seu WhatsApp e 
                        para suas principais redes sociais, além de mais quatro fotos da sua empresa.
                        Entre em contato agora mesmo e seja nosso parceiro!<br>
                        </p>
                        <div class="mais"><a href="" class="mais-info">+ Saiba mais +</a></div>
                    </div>

                    <div class="tag-tipos-anuncios">
                        <div class="boxes-icon center">
                            <div class="icon">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                        </div>
                        <p>
                        Em <strong>Anúncios</strong>, você veícula seus banners de propagandas mais atrativos em diversos formatos, aumenta a visibilidade da sua empresa na internet, 
                        e consequentemente seu faturamento. <br>
                        Conheça as posições e os formatos de nossos anúncios. Promova sua empresa agora mesmo!
                        </p>
                        <div class="mais"><a href="" class="mais-info">+ Saiba mais +</a></div>
                    </div>

                    <div class="tag-tipos-anuncios">
                        <div class="boxes-icon center ">
                            <div class="icon">
                                <i class="fas fa-suitcase-rolling"></i>
                            </div> 
                            <div class="icon">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                        </div>
                        <p>
                        Em <strong>Pacotes & Anúncios</strong>, você poderá anunciar seus pacotes de viagens, obterá uma página interna sobre a sua empresa
                        com links para WhatsApp e redes sociais, divulgará fotos da empresas e promoverá seus banners mais atrativos.
                        Aumente agora o poder de faturamento da sua empresa, anunciando pacotes de viagens e banners publicitários.
                        </p>
                        <div class="mais"><a href="" class="mais-info">+ Saiba mais +</a></div>
                    </div>
                                                         

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