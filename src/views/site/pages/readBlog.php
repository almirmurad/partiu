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
        <?php $render('header',['page'=>$page]);?>

        <div class="nav">
            <!-- Menu navegação-->
            <?php $render('menuNavigation',['page'=>$page]);?>
        </div>
        <?php $render('internalSlider',['page'=>$page]);?>
        
        <?php $render('internalCategories',['categories'=>$categories]);?>
                

</header>
<main>
    <div class="container ">
        <section class="internal-content column">
            
            <?php foreach($data as $post): ?>
                <h4>Você está em: <a href="<?=$base?>/blog">Blog</a>/<?=$page?>/<?=$post->title?></h4>
            <div class="top-round-map">
                <div class="cover-round-map">
                    <img src="<?=$base?>/media/uploads/imgs/posts/<?=$post->cover?>" alt="">
                </div>
                <div class="data-round-map">
                    <ul>
                        <li><h1><?=$post->title?></h1></li>
                        <li><?=$post->created_at?></li>
                        <li>postado por: <?=$post->user->name?></li>
                        <li>Categoria: <?=$post->categorie->name?></li>
                    </ul>
                </div>
                
            </div>
            <div class="midlle-round-map">
                <div class="text-round-map">
                <?=$post->text?>
                </div>
            </div>
            <div class="foot-round-map">
                <div class="round-map flex">
                    <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/posts/<?=$post->img1?>);"><a href="" class="galerie-link">Galeria</a></div>
                    <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/posts/<?=$post->img2?>);"><a href="" class="galerie-link">Galeria</a></div>
                    <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/posts/<?=$post->img3?>);"><a href="" class="galerie-link">texto</a></div>
                    <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/posts/<?=$post->img4?>);"><a href="" class="galerie-link">texto</a></div>  
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
    <?php $render('internalContentFinal');?>
</section>
<footer>


</footer>
<script src = "<?=$base;?>/assets/js/catSlider.js"></script>
</body>
</html>