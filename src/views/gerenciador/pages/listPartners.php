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
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Descrição</th>
                                <th>Pacote</th>
                                <th>Criado por</th>
                                <th>Criado em</th>
                                <th>Ativo</th>
                                <th>Ações</th>
                            </tr>
                            <?php foreach($partners as $partner): ?>
                            <tr>
                                    
                                <td class="user-item"><?= $partner['id'];?></td>
                                <td class="user-item"><?= $partner['name'];?></td>
                                <td class="user-item"><?= $partner['email'];?></td>
                                <td class="user-item"><?= $partner['phone'];?></td>
                                <td class="user-item"><?= $partner['description'];?> - <?= $partner['state'];?>/<?= $partner['country'];?></td>
                                <td class='user-item'><?= $partner['package_id'];?></td>
                                <td class='user-item'><?= $partner['user_id'];?></td>
                                <td class='user-item'><?= $partner['created_at'];?></td>
                                <td class='user-item'><?= $partner['active'];?></td>
                                <td class="user-item">
                                    <a href="<?=$base;?>/partner/<?= $partner['id'];?>/editPartner">Editar</a>
                                    <a href="<?=$base;?>/partner/<?= $partner['id'];?>/deletePartner" onclick="confirm('Tem certeza que deseja excluir o Post <?= $partner['name'];?>')">Excluir</a>
                                </td>
                                
                            </tr>
                            <?php endforeach; ?>

                        </table>
                        <a href="<?=$base;?>/newPartner">+ Inserir Parceiros +</a>
                        <!-- fim da lista de Usuarios -->
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $render('footer');?>