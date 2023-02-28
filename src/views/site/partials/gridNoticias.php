<div class="gridNoticias">
    <?php foreach($news['news'] as $lastedNews):?>
        <div class="noticia">
            <div style="background-image:linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)), url(<?=$base;?>/media/uploads/imgs/news/<?=$lastedNews->cover;?>);" class="notImg">
            </div>
            <div class="notCont">
                <h2> <?=$lastedNews->title;?></h2>
                <p> <?=$lastedNews->description;?></p>
                <a href="<?=$base;?>/readNews/<?=$lastedNews->id;?>/read">Leia Mais</a>
            </div>
            <div class="notFoot">
                <span><strong>Data:</strong>  <?=$lastedNews->created_at;?></span>
                <span><strong>Autor:</strong>  <?=$lastedNews->user->name;?></span>
                <span><strong>Fonte:</strong>  <?=$lastedNews->source;?> </span>
                <span><strong>Categoria:</strong>  <?=$lastedNews->categorie->name;?> </span>
            </div>
        </div>
    <?php endforeach?>
</div>
<?php 
    if(isset($news['pageCount']) && isset($news['currentPage'])) { 
        $render('paginacao',[
                'total'=>$news['pageCount'],
                'current'=>$news['currentPage'],
                'link'=>'noticias'
                ]);
    }
?>