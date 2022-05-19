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

</header>
<main>
    <div class="container">
    <div class="content-blog">
    <section class="destaque-blog">
        <h2 class="categoria-titulo-blog">
            Destaques total de posts geral 
        </h2>
        <div class="area-destaque-blog"> 
            <div class="destaque-left" style="background-image:linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.2)),url(<?=$base?>/media/uploads/imgs/posts/<?=$postsDestaques[0]['cover'];?>);">
                <div class="cont-item-blog-transparent"></div>
                <div class="legend">
                    <h3 class="text-legend">
                        <?= $postsDestaques[0]['description'];?>
                    </h3>
                </div>
            </div>
            <div class="destaque-right">
                <div class="destaque-right-top" style="background-image:linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.2)),url(<?=$base?>/media/uploads/imgs/posts/<?=$postsDestaques[1]['cover'];?>);">
                    <div class="cont-item-blog">
                        <div class="cont-item-blog-transparent"></div>
                        <div class="legend">
                            <h3 class="text-legend">
                                <?= $postsDestaques[1]['description'];?>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="destaque-right-bottom" style="background-image:linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.2)),url(<?=$base?>/media/uploads/imgs/posts/<?=$postsDestaques[2]['cover'];?>);">
                    <div class="cont-item-blog">
                        <div class="cont-item-blog-transparent"></div>
                        <div class="legend">
                            <h3 class="text-legend">
                                <?= $postsDestaques[2]['description'];?> 
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <?php foreach ($nameCategorie as $cat): ?>
        <section class="demais-blog">
            <h2 class="categoria-titulo-blog">
                <?=$cat->name;?>
            </h2>
            <div class="content-demais-blog">
                <?php foreach ($posts as $postItem): ?>
                    <?php if($postItem->categorie->name == $cat->name){
                        echo<<<EOT
                        <div class="destaque-demais-left" style="background-image: url($base/media/uploads/imgs/posts/$postItem->cover);">
                        <div class="cont-item-blog" >
                            <div class="cont-item-blog-transparent"></div>
                            <div class="legend">
                                <h3 class="text-legend">
                                    <a href="$base/blog/$postItem->id/readBlog" class="link">$postItem->title </a>
                                </h3>
                            </div>
                        </div>
                    </div>
EOT;
                    }?>               
                    
                <?php endforeach ?>      
            </div>
        </section>
    <?php endforeach ?>    
    </div>
    <aside>
    
        <?php $render('aside',['page'=>$page, 'categories'=>$categories, 'posts'=>$posts, 'total'=>$total]);?>
    </aside>    
    </div>
</main>
<footer>
    <?php $render('foot');?>
</footer>
<script src="<?=$base?>/assets/js/script.js"></script>
<script src="<?=$base;?>/assets/js/requests.js"></script>
</body>
</html>