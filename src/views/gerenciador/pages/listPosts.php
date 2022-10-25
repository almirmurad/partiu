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
                    <div class="page-title">
                        <h2><?=$page;?></h2>
                        <a href="<?=$base;?>/newPost" class="btn " >+ Inserir Post +</a>
                    </div>
                    <div class="dash-boxes ">
                        <!-- Lista de Usuários -->
                        <table class="list-users">
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Descrição</th>
                                <!-- <th>Capa</th> -->
                                <th>Redator</th>
                                <th>Criado em</th>
                                <th>Ações</th>
                            </tr>
                            <?php foreach($posts as $post): ?>
                            <tr>
                                    
                                <td class="user-item"><?= $post->id;?></td>
                                <td class="user-item"><?= $post->title;?></td>
                                <td class="user-item"><?= $post->description;?></td>
                                <!-- <td class="user-item"><?= $post->cover;?></td> -->
                                <td class='user-item'><?= $post->user->name;?></td>
                                <td class='user-item'><?= date('d/m/Y', strtotime($post->created_at));?></td>
                                
                                <td class="user-item">
                                    <a href="<?=$base;?>/post/<?= $post->id;?>/editPost"><img src="<?=$base?>/assets/img/img_admin/edit.png" width="20px" height="20px" alt=""></a>
                                    <a href="<?=$base;?>/post/<?= $post->id;?>/deletePost" onclick="confirm('Tem certeza que deseja excluir o Post <?= $post->title;?>')"><img src="<?=$base?>/assets/img/img_admin/del.png" width="20px" height="20px" alt=""></a>
                                </td>
                                
                            </tr>
                            <?php endforeach; ?>

                        </table>
                        <!-- fim da lista de Posts -->
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $render('footer');?>