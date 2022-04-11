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
                            <?php foreach($roadMaps as $roadMap): ?>
                            <tr>
                                    
                                <td class="user-item"><?= $roadMap['id'];?></td>
                                <td class="user-item"><?= $roadMap['title'];?></td>
                                <td class="user-item"><?= $roadMap['description'];?></td>
                                <td class="user-item"><?= $roadMap['cover'];?></td>
                                <td class='user-item'><?= $roadMap['name'];?></td>
                                <td class='user-item'><?= $roadMap['created_at'];?></td>
                                
                                <td class="user-item">
                                    <a href="<?=$base;?>/roadMap/<?= $roadMap['id'];?>/editRoadMap">Editar</a>
                                    <a href="<?=$base;?>/roadMap/<?= $roadMap['id'];?>/deleteRoadMap" onclick="confirm('Tem certeza que deseja excluir o Usuário <?= $usuario['name'];?>')">Excluir</a>
                                </td>
                                
                            </tr>
                            <?php endforeach; ?>

                        </table>
                        <a href="<?=$base;?>/newRoadMap">+ Inserir Roteiro +</a>
                        <!-- fim da lista de Usuarios -->
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $render('footer');?>