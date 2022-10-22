<div class="container">

    <?php if (!empty($banners)):?>
        <?php foreach ($banners as $banner):?>
            <?php if ($banner->position_id === 7):?>
                <a class="link-banners" target="_blank" href="<?=$banner->url;?>">
                <div class="roteiro1" style="background-image:linear-gradient(
        to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.2)), url(<?=$base?>/media/uploads/imgs/banners/<?=$banner->img;?>);">
                    
                    
                        <h3> <?=$banner->title;?> </h3>    
                     
                </div>
                </a>
                
            <?php endif ?>
        <?php endforeach ?> 
    <?php else:?>   
        Anuncie Aqui!<br/>
        (41) 98533-2397
    <?php endif?>




    <!-- <div class="roteiro1">
        <h3> SUAS FÉRIAS DE VERÃO EM <span>GUARATUBA</span></h3>
    </div>
    <div class="roteiro2">
        <h3>PROGRAME SEU NATAL EM <span>CURITIBA</span></h3>
    </div> -->
</div>    
<div class="container">
    <?php $render('events',['events'=> $events]);?>
    <!--<div class="itemEventoL">
        <div class="imgEvento">
            <h3>Nando Reis faz show ao vivo na Pedreira</h3>
        </div>
        <div class="footEvento">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit Minus consectetur
                voluptatibus...
            </p>
        </div>
    </div>   
    <div class="itemEventoL">
        <div class="imgEvento">
            <h3>Nando Reis faz show ao vivo na Pedreira</h3>
        </div>
        <div class="footEvento">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit Minus consectetur
                voluptatibus...
            </p>
        </div>
    </div>     
    <div class="itemEventoL">
        <div class="imgEvento">
            <h3>Nando Reis faz show ao vivo na Pedreira</h3>
        </div>
        <div class="footEvento">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit Minus consectetur
                voluptatibus...
            </p>
        </div>
    </div> -->     
</div>  