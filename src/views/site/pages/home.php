<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base;?>/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <title>Partiu - Viajens e Turismo</title>
</head>

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
<main>
    <section class="column">
        <!-- Categorias -->
        
        <?php $render('categoriasIndex',['categories'=>$categories]);?>
        <div class="container column">
        <!-- Pacotes -->
        
        <?php /*echo"<pre>"; print_r($pacotes);*/ $render('pacotes',['packages'=>$packages]);?>

        <!-- Call to Action -->
       
        <?php $render('callToAction');?>
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
    </section>
    <section class="noticias">
        <div class="container">
        <!-- Call to Action -->
        
        <?php $render('gridNoticias',['news'=>$news]);?>
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

    <section class="depoimentos ">
        <div class="container column">
            <!-- Depoimentos -->
            
            <?php $render('depoimentos');?>
            <!-- Anuncios -->
            
            <?php $render('anunciosIndex');?>
        </div>
    </section>
    </main>
    <footer>

    </footer>

    <script src="assets/js/script.js"></script>
</body>

</html>