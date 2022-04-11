<div class="categorias">
    <div class="container column">
        <div class="categoriasGeral">
            <?php foreach($categories as $categorie): ?>
                <div class="catImg">
                    <a href="<?=$base?>/roteiros/<?=$categorie->id?>/roteirosCat">
                    <img src="<?=$base?>/assets/img/<?=$categorie->img?>" alt=""></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>