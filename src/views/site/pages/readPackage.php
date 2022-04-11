<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base?>/assets/css/style.css">
    <link rel="stylesheet" href="<?=$base?>/assets/css/internas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <title><?=$page?></title>
</head>
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
            <h4>Você está em: <?=$page?></h4>
            <?php foreach($data as $package): ?>
                <div class="top-round-map">
                    <div class="cover-round-map">
                        <img src="<?=$base?>/media/uploads/imgs/packages/<?=$package->cover?>" alt="">
                    </div>
                    <div class="post-round-map">
                        <ul>
                            <li><h1><?=stripslashes($package->title);?></h1></li>
                            <li>Destino: <?=stripslashes($package->destination);?> - <?=$package->state?></li>
                            <li>País: <?=stripslashes($package->country);?></li>
                            <li>Saída de: <?=stripslashes($package->exit_from);?></li>
                            <li>Saída em: <?=$package->going_on?></li>
                            <li>Retorna em: <?=$package->return_in?></li>
                            <li>Disponivel até: <?=$package->expires_at?></li>
                            <li><strong>Preço: </strong> R$<?=$package->price?></li>
                        </ul>
                    </div>
                    
                </div>
                <div class="midlle-round-map">
                    <div class="text-round-map">
                    <?=stripslashes($package->text);?>
                    </div>
                </div>
                <div class="foot-round-map">
                    <div class="round-map">
                        <div class="grid-round-map">
                            <div class=" left-item " style="background-image:url(<?=$base?>/media/uploads/imgs/packages/<?=$package->img1?>);"><a href="" class="galerie-link">Galeria</a></div>
                            <div class=" right-top-item" style="background-image:url(<?=$base?>/media/uploads/imgs/packages/<?=$package->img2?>);"><a href="" class="galerie-link">Galeria</a></div>
                            <div class=" right-bottom-item" style="background-image:url(<?=$base?>/media/uploads/imgs/packages/<?=$package->img3?>);"><a href="" class="galerie-link">texto</a></div>
                        </div>
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
</footer>
<script src = "<?=$base;?>/assets/js/catSlider.js"></script>
</body>
</html>