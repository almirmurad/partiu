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
                        <a href="<?=$base;?>/newEvent" class="btn " >+ Inserir Evento +</a>
                    </div>
                    <div class="dash-boxes ">
                        <!-- Lista de Usuários -->
                        <table class="list-users">
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Capa</th>
                                <th>Criado por</th>
                                <th>Criado em</th>
                                <th>Ações</th>
                            </tr>
                            <?php foreach($events as $event): ?>
                            <tr>
                                    
                                <td class="user-item"><?= $event['id'];?></td>
                                <td class="user-item"><?= $event['title'];?></td>
                                <td class="user-item"><?= $event['description'];?></td>
                                <td class="user-item"><?= $event['cover'];?></td>
                                <td class='user-item'><?= $event['user_id'];?></td>
                                <td class='user-item'><?= $event['created_at'];?></td>
                                <td class="user-item">
                                    <a href="<?=$base;?>/event/<?= $event['id'];?>/editEvent"><img src="<?=$base?>/assets/img/img_admin/edit.png" width="20px" height="20px" alt=""></a>
                                    <a href="<?=$base;?>/event/<?= $event['id'];?>/deleteEvent" onclick="confirm('Tem certeza que deseja excluir o Post <?= $event['title'];?>')"><img src="<?=$base?>/assets/img/img_admin/del.png" width="20px" height="20px" alt=""></a>
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