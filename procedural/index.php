<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <title>Partiu - Viajens e Turismo</title>
</head>

<body>
    <header>
        <!-- Logo e Search-->
        <?php include_once('assets/php/includes/header.php');?>

        <div class="nav">
            <!-- Menu navegação-->
            <?php include_once('assets/php/includes/menuNavigation.php');?>
        </div>
        <!--Ínicio Slider-->
        <?php include_once('assets/php/includes/slider.php');?>

    </header>
<main>
    <section class="column">
        <!-- Categorias -->
        <?php include_once('assets/php/includes/categoriasIndex.php');?>
        <div class="container column">
        <!-- Pacotes -->
        <?php include_once('assets/php/includes/pacotes.php');?>

        <!-- Call to Action -->
        <?php include_once('assets/php/includes/callToAction.php');?>
        
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
        <?php include_once('assets/php/includes/gridNoticias.php');?>
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
                    <?php include_once('assets/php/includes/eventos.php');?>   

                </div>
                <aside class="eventoRight">
                    <!-- Banner Eventos Right -->
                    <?php include_once('assets/php/includes/bannerEventos.php');?>
                </aside>
            </div>
        </div>
    </section>

    <section class="depoimentos ">
        <div class="container column">
            <!-- Depoimentos -->
            <?php include_once('assets/php/includes/depoimentos.php');?>
            <!-- Anuncios -->
            <?php include_once('assets/php/includes/anunciosIndex.php');?>
        </div>
    </section>
    </main>
    <footer>

    </footer>

    <script src="assets/js/script.js"></script>
</body>

</html>