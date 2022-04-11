<div class="categories">
    <div class="container">
            <div class="internal-categories-controllers">
                <div class="left" onclick="goPrevCat()"> < </div>
                <div class="right" onclick="goNextCat()"> > </div>
            </div> 
            <div class="rollover-categories">
                <div class="internal-categories-area">
                    <?php foreach($categories as $categorie):?>                             
                <div style="background-image:url('<?=$base;?>/assets/img/<?=$categorie->img;?>');" 
                    class="internal-categorie-item" > 
                </div>
                    <?php endforeach; ?>               
            </div>
        </div>
    </div>        
</div>    
