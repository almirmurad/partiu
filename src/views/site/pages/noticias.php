<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/internas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <title><?= $page ?></title>
</head>
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
    <div class="container">
    <section class="internal-content">
     <div class="noticias">   
        <?php $render('gridNoticias',['news'=> $news]);?>
    </div>
   
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