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
                            <?php foreach($posts as $post): ?>
                            <tr>
                                    
                                <td class="user-item"><?= $post['id'];?></td>
                                <td class="user-item"><?= $post['title'];?></td>
                                <td class="user-item"><?= $post['description'];?></td>
                                <td class="user-item"><?= $post['cover'];?></td>
                                <td class='user-item'><?= $post['user_id'];?></td>
                                <td class='user-item'><?= $post['created_at'];?></td>
                                
                                <td class="user-item">
                                    <a href="<?=$base;?>/post/<?= $post['id'];?>/editPost">Editar</a>
                                    <a href="<?=$base;?>/post/<?= $post['id'];?>/deletePost" onclick="confirm('Tem certeza que deseja excluir o Post <?= $post['title'];?>')">Excluir</a>
                                </td>
                                
                            </tr>
                            <?php endforeach; ?>

                        </table>
                        <a href="<?=$base;?>/newPost">+ Inserir Posts +</a>
                        <!-- fim da lista de Usuarios -->
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $render('footer');?>