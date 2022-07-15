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
          
            if (isset($packages) && $packages != null){
                $render('pacotes',['packages'=>$packages]);
                echo"existe pacote";
            }else{
                echo"<div clas='pacotes'>
                Sem pacotes para mostrar
                </div>";
            }
  
           
            ?>
            <!-- Call to Action -->
            <?php $render('callToAction');?>
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
                <?php $render('gridNoticias',['news'=>$news]);?>
                <div class="anuncio-news">
                    <h4> Anuncie aqui (41) 98533-2397</h4>
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
                        <?php $render('events',['events'=>$events]);?>
                    </div>
                    <aside class="eventoRight">
                        <!-- Banner Eventos Right -->
                        <?php $render('bannerEventos');?>
                    </aside>
                </div>
            </div>
        </section>
        <section class="depoimentos">
            <div class="container column">
                <!-- Depoimentos -->
                <?php $render('depoimentos');?>
                <!-- Anuncios -->
                <?php $render('anunciosIndex');?>
            </div>
        </section>
    </div>

</main>

    <footer>
        <?php $render('foot');?>
    </footer>

    <script src="<?=$base;?>/assets/js/script.js"></script>
    <script src="<?=$base;?>/assets/js/requests.js"></script>
</body>

</html>