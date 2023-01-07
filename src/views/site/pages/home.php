<?php $render('head');?>
<body>
    <header>
        <!-- Logo e Search-->
        <?php $render('header');?>
        <div class="nav">
            <!-- Menu navegação-->
            <?php $render('menuNavigation');?>
        </div>
        <!--Ínicio Slider-->
        <?php $render('slider');?>
    </header>
<main class="column">
    <!-- Categorias -->
    <?php $render('categoriasIndex',['categories'=>$categories]);?>
    <section class="column">       
        <div class="container column">
            <!-- Pacotes -->
            <?php 
            //   echo"<pre>";
            //   echo"pacotes";
            //   print_r($packages);
            //   exit;
            if (isset($packages) && $packages != null){
                $render('pacotes',['packages'=>$packages]);
            }else{
                echo"<div clas='pacotes'>
                Sem pacotes para mostrar
                </div>";
            }
    
            ?>
            <!-- Call to Action -->
            <?php $render('callToAction',['banners'=>$bannersCta]);?>
        </div>
    </section>

    <div class="bannerDivisor1">
        <div class="container column">
            <div class="contBannDiv">
                <h2>
                    Os melhores roteiros para sua viagem<br />
                    As melhores hospedagens<br />
                    As melhores dicas
                </h2>
            </div>
        </div>
    </div>
    <div class="container">
        <section class="noticias">
            <div class="container column">
                <?php $render('gridNoticias',['news'=>$news,'bannersNews'=>$bannersNews]);?>
                <div class="anuncio-news">
                    <?php if (!empty($bannersNews)):?>
                        <?php foreach ($bannersNews as $banner):?>
                            <?php if ($banner->position_id === 3):?>
                                <a class="link-banners" target="_blank" href="<?=$banner->url;?>">
                                    <img src="<?=$base?>/media/uploads/imgs/banners/<?=$banner->img;?>" alt="<?=$banner->title;?>">
                                </a> 
                            <?php endif ?>
                        <?php endforeach ?> 
                    <?php else:?>   
                        Anuncie Aqui!<br/>
                        (41) 98533-2397
                    <?php endif?>
                </div>
            </div>
        </section>
    </div>

    <div class="bannerDivisor1">
        <div class="container column">
            <div class="contBannDiv">
                <h2>
                    Os melhores roteiros para sua viagem<br />
                    As melhores hospedagens<br />
                    As melhores dicas
                </h2>
            </div>
        </div>
    </div>
    
    <div class="container column">
        <section class="eventos">
            <div class="container">
                <div class="gridEventos1">
                    <div class="eventoLeft">
                        <!-- Eventos -->
                        <?php $render('events',['events'=>$events, 'banners'=>$bannersEvents]);?>
                    </div>
                    <aside class="eventoRight">
                        <!-- Banner Eventos Right -->
                        <?php $render('bannerEventos', ['banners'=>$bannersEvents]);?>
                    </aside>
                </div>
            </div>
        </section>
        <section class="depoimentos">
            <div class="container column">
                <!-- Depoimentos -->
                <?php $render('depoimentos');?>
                <!-- Anuncios -->
                <?php $render('anunciosIndex',['banners'=>$bannersEndPage]);?>
            </div>
            
        </section>
    </div>

</main>

    <footer>
        <?php $render('foot');?>
    </footer>
    <script type="text/javascript">
        const BASE ='<?=$base;?>';
    </script>
    <script src="<?=$base;?>/assets/js/script.js"></script>
    <script src="<?=$base;?>/assets/js/requests.js"></script>
    <script src="https://www.clubehu.com.br/assets/cmp/js/bloco.js"></script>
</body>

</html>