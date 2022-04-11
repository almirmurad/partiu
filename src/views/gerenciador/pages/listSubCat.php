<?php $render('head');?>

    <?php $render('header', ['loggedUser'=>$loggedUser]);?>
    <main>
        <aside>
            <h4>Navegação</h4>
            <?php $render('nav');?>
        </aside>
        <section>
            <div class="container column">
                <?php $render('breadcrumbs',['page'=>$page]);?>
                <div class="content column">
                    <h2><?=$page;?></h2>
                    <div class="dash-boxes ">
                        <!-- Lista de Usuários -->
                        <table class="list-users">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Imagem</th>
                                <th>Usuário</th>
                                <th>Categoria Ascendente</th>
                                <th>Criado em</th>
                                <th>Ações</th>
                            </tr>
                            <?php foreach($subCats as $subCat): ?>
                            <tr>
                                <td class="user-item"><?= $subCat['id'];?></td>
                                <td class="user-item"><?= $subCat['name'];?></td>
                                <td class="user-item"><?= $subCat['description'];?></td>
                                <td class="user-item"><?= $subCat['img'];?></td>
                                <td class="user-item"><?= $subCat['id_user'];?></td>
                                <td class="user-item"><?= $subCat['id_cat_asc'];?></td>
                                <td class="user-item"><?= $subCat['created_at'];?></td>
                                <td class="user-item">
                                    <a href="<?=$base;?>/subCat/<?= $subCat['id'];?>/editSubCat">Editar</a>
                                    <a href="<?=$base;?>/subCat/<?= $subCat['id'];?>/deleteSubCat" onclick="confirm('Tem certeza que deseja excluir o Usuário <?= $subCat['name'];?>')">Excluir</a>
                                </td>
                                
                            </tr>
                            <?php endforeach; ?>

                        </table>
                        <!-- fim da lista de Usuarios -->
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $render('footer');?>