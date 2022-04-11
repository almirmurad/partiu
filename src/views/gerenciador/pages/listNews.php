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
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Capa</th>
                                <th>Redator</th>
                                <th>Criado em</th>
                                <th>Ações</th>
                            </tr>
                            <?php foreach($news as $lastedNews): ?>
                            <tr>
                                <td class="user-item"><?= $lastedNews['id'];?></td>
                                <td class="user-item"><?= $lastedNews['title'];?></td>
                                <td class="user-item"><?= $lastedNews['description'];?></td>
                                <td class="user-item"><?= $lastedNews['cover'];?></td>
                                <td class="user-item"><?= $lastedNews['user_id'];?></td>
                                <td class="user-item"><?= $lastedNews['created_at'];?></td>
                                <td class="user-item">
                                    <a href="<?=$base;?>/news/<?= $lastedNews['id'];?>/editNews">Editar</a>
                                    <a href="<?=$base;?>/news/<?= $lastedNews['id'];?>/deleteNews" onclick="confirm('Tem certeza que deseja excluir o Usuário <?= $usuario['name'];?>')">Excluir</a>
                                </td>
                                
                            </tr>
                            <?php endforeach; ?>

                        </table>
                        <a href="<?=$base;?>/newNews">+ Inserir Notícias +</a>
                        <!-- fim da lista de Noticias -->
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $render('footer');?>