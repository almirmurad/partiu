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
                                <th>E-Mail</th>
                                <th>Telefone</th>
                                <th>Tipo</th>
                                <th>Avatar</th>
                                <th>Criado em</th>
                                <th>Ações</th>
                            </tr>
                            <?php foreach($usuarios as $usuario): ?>
                            <tr>
                                <td class="user-item"><?= $usuario['id'];?></td>
                                <td class="user-item"><?= $usuario['name'];?></td>
                                <td class="user-item"><?= $usuario['email'];?></td>
                                <td class="user-item"><?= $usuario['phone'];?></td>
                                <td class="user-item"><?= $usuario['type_user'];?></td>
                                <td class="user-item"><?= $usuario['avatar'];?></td>
                                <td class="user-item"><?= $usuario['created_at'];?></td>
                                <td class="user-item">
                                    <a href="<?=$base;?>/user/<?= $usuario['id'];?>/editUser">Editar</a>
                                    <a href="<?=$base;?>/user/<?= $usuario['id'];?>/deleteUser" onclick="confirm('Tem certeza que deseja excluir o Usuário <?= $usuario['name'];?>')">Excluir</a>
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