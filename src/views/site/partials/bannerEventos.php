<?php if (!empty($banners)):?>
        <?php foreach ($banners as $banner):?>
            <?php if ($banner->position_id === 4):?>
                <div class="itemEventoR">
                    <a class="link-banners" target="_blank" href="<?=$banner->url;?>">
                        <img src="<?=$base?>/media/uploads/imgs/banners/<?=$banner->img;?>" alt="<?=$banner->title;?>">
                    </a>
                </div>
                <?php else:?> 
        <div class="anuncios">Anuncie Aqui!<br/>
        (41) 98533-2397</div>
    
            <?php endif ?>
        <?php endforeach ?> 
    <?php else:?> 
        <div class="itemEventoR">
            <h2>Conheça o Litoral Paranaense</h2>
        </div>
        <div class="itemEventoR">
            <h2>Conheça o Litoral Paranaense</h2>
        </div>
        <div class="itemEventoR">
            <h2>Conheça o Litoral Paranaense</h2>
        </div>
    <?php endif?>