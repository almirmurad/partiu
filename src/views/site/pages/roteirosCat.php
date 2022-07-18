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
            
    <?php $render('internalCategories');?>     
</header>
<main>
    <div class="container ">
        <section class="internal-content column">
            <h4>Você está em: <?=$page?></h4>
   
            <div class="midlle-round-map">
                <div class="round-map">
                    <div class="grid-round-map">

                        <div class="left-item" >
                            <div class="cont-left-item" style="background-image:url(<?=$base?>/assets/img/<?= $roadMaps[0]['cover'];?>);">
                             <a href="<?=$base?>/readRoadMap/<?= $roadMaps[0]['id'];?>/read" class="galerie-link"><?= $roadMaps[0]['title'];?></a></div>
                        </div>
  
                        <div class="right-top-item" >
                            <div class="cont-right-top-item" style="background-image:url(<?=$base?>/assets/img/<?= $roadMaps[1]['cover'];?>);" >
                                <a href="<?=$base?>/readRoadMap/<?= $roadMaps[1]['id'];?>/read" class="galerie-link"><?= $roadMaps[1]['title'];?></a>
                            </div>
                        </div>
                        
                        <div class=" right-bottom-item" >
                            <div class="cont-right-bottom-item" style="background-image:url(<?=$base?>/assets/img/<?= $roadMaps[2]['cover'];?>);">
                                <a href="<?=$base?>/readRoadMap/<?= $roadMaps[2]['id'];?>/read" class="galerie-link"><?= $roadMaps[2]['title'];?></a>
                            </div>
                        </div>   
         
                            <div class=" cont-item " >
                                <div class="text-round-map">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum iaculis posuere suscipit. Duis quis orci diam. Suspendisse potenti. Etiam ut turpis quam.
                                    Vivamus id metus fermentum, maximus lectus non, tempus ex. Etiam eget enim vel turpis suscipit pellentesque. Pellentesque sed eros et nunc egestas feugiat eget quis est.
                                    Nulla commodo vehicula pellentesque. Nam dapibus lorem nec felis interdum, vel sagittis dolor egestas. Aenean a risus nibh. Ut et ultricies metus.
                                    Praesent sit amet lacus ut massa mollis ultricies id sit amet tellus. Proin vulputate magna vitae risus tristique semper. Donec eu arcu purus.

                                    Curabitur ultricies aliquam urna non rutrum. Vivamus nec metus elit. Curabitur justo mauris, posuere dignissim ante nec, luctus euismod metus. Aenean tincidunt ac diam id pretium. Phasellus quis vehicula mi. 
                                    Ut sem erat, venenatis sed ex in, luctus vulputate ipsum. In et ex dolor. In vel nisi quis mi mollis hendrerit. Curabitur ornare maximus ipsum, eget pharetra ex eleifend at. Donec mi diam, suscipit eu luctus eu,
                                    lacinia id ante. Nulla eget euismod libero. Mauris quis arcu risus. Sed tincidunt pellentesque ultricies. Aenean vitae purus hendrerit metus rhoncus porttitor sed et metus. Nulla facilisi.
                                    
                                    
                                    Curabitur ultricies aliquam urna non rutrum. Vivamus nec metus elit. Curabitur justo mauris, posuere dignissim ante nec, luctus euismod metus. Aenean tincidunt ac diam id pretium. Phasellus quis vehicula mi. 
                                    Ut sem erat, venenatis sed ex in, luctus vulputate ipsum. In et ex dolor. In vel nisi quis mi mollis hendrerit. Curabitur ornare maximus ipsum, eget pharetra ex eleifend at. Donec mi diam, suscipit eu luctus eu,
                                    lacinia id ante. Nulla eget euismod libero. Mauris quis arcu risus. Sed tincidunt pellentesque ultricies. Aenean vitae purus hendrerit metus rhoncus porttitor sed et metus. Nulla facilisi.
                                </div>
                            </div>
                        <div class="galerie-round-item" >
                            <?php $render('galerie')?>  
                        </div>
                    </div>
                </div>
            </div>
            
        

        </section>
        <aside>
        <?php $render('aside',['page'=>$page, 'idPageCat'=>$args]);?>
        </aside>    
    </div>
</main>
<section class="final">
    <?php $render('internalContentFinal',['events'=>$eventsFoot]);?>
</section>
<footer>
    <?php $render('foot');?>
</footer>
<script src="<?=$base;?>/assets/js/requests.js"></script>
</body>
</html>