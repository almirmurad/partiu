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
                    <img src="assets/img/sobre.jpg" alt="">
                </div>
                
            </div>
            <div class="midlle-about">
                <div class="text-about">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum iaculis posuere suscipit. Duis quis orci diam. Suspendisse potenti. Etiam ut turpis quam.
                    Vivamus id metus fermentum, maximus lectus non, tempus ex. Etiam eget enim vel turpis suscipit pellentesque. Pellentesque sed eros et nunc egestas feugiat eget quis est.
                    Nulla commodo vehicula pellentesque. Nam dapibus lorem nec felis interdum, vel sagittis dolor egestas. Aenean a risus nibh. Ut et ultricies metus.
                    Praesent sit amet lacus ut massa mollis ultricies id sit amet tellus. Proin vulputate magna vitae risus tristique semper. Donec eu arcu purus.

                    Donec a ipsum auctor, maximus tellus ut, dignissim nibh. Proin rhoncus fermentum semper. Cras nisi quam, condimentum euismod ullamcorper a, laoreet id purus.
                    Suspendisse non erat facilisis, accumsan erat a, dictum libero. Nam sapien nisl, dictum at risus eget, commodo pretium velit. Morbi quis risus quis urna lacinia convallis et sed nisi.
                    Aliquam finibus nisi et sodales rutrum. Curabitur nisl sem, pellentesque sit amet malesuada fringilla, placerat quis quam. Morbi sagittis ante ut ligula egestas iaculis. Duis lobortis quam nisl.
                    Aliquam at malesuada risus. Duis molestie lacus quis erat luctus, luctus laoreet eros scelerisque. Aliquam volutpat convallis odio, ac vestibulum massa lacinia ut. Praesent vitae ullamcorper urna.

                    Curabitur ultricies aliquam urna non rutrum. Vivamus nec metus elit. Curabitur justo mauris, posuere dignissim ante nec, luctus euismod metus. Aenean tincidunt ac diam id pretium. Phasellus quis vehicula mi. 
                    Ut sem erat, venenatis sed ex in, luctus vulputate ipsum. In et ex dolor. In vel nisi quis mi mollis hendrerit. Curabitur ornare maximus ipsum, eget pharetra ex eleifend at. Donec mi diam, suscipit eu luctus eu,
                    lacinia id ante. Nulla eget euismod libero. Mauris quis arcu risus. Sed tincidunt pellentesque ultricies. Aenean vitae purus hendrerit metus rhoncus porttitor sed et metus. Nulla facilisi.
                </div>
            </div>
            <div class="foot-about">
                <?php $render('galerie');?>
            </div>
        

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
    <?php $render('foot');?>
</footer>
<script src = "<?=$base;?>/assets/js/catSlider.js"></script>
</body>
</html>