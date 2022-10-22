<div class="anunciosIndex">
    <?php if (!empty($banners)):?>
        <?php foreach ($banners as $banner):?>
            <?php if ($banner->position_id === 5):?>
                <a class="link-banners" target="_blank" href="<?=$banner->url;?>">
                    <img src="<?=$base?>/media/uploads/imgs/banners/<?=$banner->img;?>" alt="<?=$banner->title;?>">
                </a>
                <?php else:?> 
        <div class="anuncios">Anuncie Aqui!<br/>
        (41) 98533-2397</div>
    
            <?php endif ?>
        <?php endforeach ?> 
    <?php else:?> 
        <div class="anuncios">Anuncie Aqui!<br/>
        (41) 98533-2397</div>
        <div class="anuncios">Anuncie Aqui!<br/>
        (41) 98533-2397</div>
        <div class="anuncios">Anuncie Aqui!<br/>
        (41) 98533-2397</div>
        <div class="anuncios">Anuncie Aqui!<br/>
        (41) 98533-2397</div>  
        
    <?php endif?>
    
</div>