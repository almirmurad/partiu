<?php $render('head');?>
<body>
<header>
    <!-- Logo e Search-->
    <?php $render('header',['loggedUser'=>$loggedUser]);?>

    <div class="nav">
        <!-- Menu navegação-->
        <?php $render('menuNavigation');?>
    </div>
    <?php $render('internalSlider',['page'=>$page]);?>
    
    <?php $render('internalCategories',['categories'=>$categories])?>
        
</header>
<main>
    <div class="container" >
        <section class="internal-content" >

            <?php 

            if (isset($pacotes) && $pacotes !== null){
                $render('pacotes',['packages'=>$pacotes]);
                
            }else{
                echo"<div clas='pacotes'>
                Sem pacotes para mostrar na pagina pacotes aqui
                </div>";
            }
    
            ?>
            
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
<script src="assets/js/requests.js"></script>
</body>
</html>