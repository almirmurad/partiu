<?php foreach($cats as $cat): ?>
<div class="dash-box column">
    <div class="box-title">
        <h4><?=$cat['name']?></h4>
    </div>
    <div class="box-content ">
        <ul class="column">
            <li><a href="<?=$base?>/cat/<?=$cat['id']?>/newSubCat"> <span>Inserir Subcategorias</span> <img src="<?=$base?>/assets/img/img_admin/insert.png" alt="" class="nav-box-insert">  </a></li>
            <li><a href="<?=$base?>/cat/<?=$cat['id']?>/listSubCat"> <span>Listar Subcategorias</span> <img src="<?=$base?>/assets/img/img_admin/list.png" alt="" class="nav-box-list">  </a></li>
            <li><a href="<?=$base?>/cat/<?=$cat['id']?>/editCat"> <span>Editar</span> <img src="<?=$base?>/assets/img/img_admin/edit.png" alt="" class="nav-box-edit">  </a></li>
            <li><a onclick="alert('Categorias não podem ser excluídas')" href="" > <span>Excluir</span> <img src="<?=$base?>/assets/img/img_admin/del.png" alt="" class="nav-box-delete">
            <!-- <li><a onclick="confirm('Tem certeza que deseja excluir a Categoria: <?= $cat['name'];?>')" href="<?=$base?>/cat/<?=$cat['id']?>/deleteCat" > <span>Excluir</span> <img src="<?=$base?>/assets/img/img_admin/del.png" alt="" class="nav-box-delete">   </a></li> -->
        </ul>                                                     
    </div>
    <div class="box-footer">
        <a href="">Visitar Página</a>
    </div>
</div>
<?php endforeach;?>
<div class="more">
    <a href="<?=$base?>/newCat" class="moreCats"> + Adicionar categoria + </a>
</div>