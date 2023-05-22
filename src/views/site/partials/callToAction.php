<div class="callToAction1">
    <div class="cta1-left">
        <h2>Partiu!</h2>
        <p>Encontre aqui o seu melhor roteiro de viajem!</p>
        <a href="<?=$base;?>/roteiros" class="btn">Descubra</a>
    </div>
    <div class="cta1-right">
        <div class="cta1-right-top">
            <h2>Está na dúvida?</h2>
            <p>Encontre aqui o seu melhor roteiro de viajem!</p>
            <a href="<?=$base;?>/roteiros"> Descubra</a>
        </div>
        <div class="cta1-right-bottom">
            <h2>Em busca de aventura?!</h2>
            <p>Encontre aqui o seu melhor roteiro de viajem!</p>
            <a href="<?=$base;?>/roteiros">Descubra</a>
        </div>
        
    </div>
    <div class="cta-publicity">
        <?php if (!empty($banners)):?>
            <?php foreach ($banners as $banner):?>
                <?php if ($banner->position_id === 1):?>
                    <a class="link-banners" target="_blank" href="<?=$banner->url;?>" data-id="<?=$banner->id;?>">
                        <img src="<?=$base?>/media/uploads/imgs/banners/<?=$banner->img;?>" alt="<?=$banner->title;?>">
                    </a>
                
                <?php endif ?>
            <?php endforeach ?> 
        <?php else:?>   
            Anuncie Aqui!<br/>
            (41) 98533-2397
        <?php endif?>
    </div>
    
</div>