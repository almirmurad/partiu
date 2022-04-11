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
                                <th>Destino</th>
                                <th>Saída de:</th>
                                <th>Criado por</th>
                                <th>Criado em</th>

                                <th>Ações</th>
                            </tr>
                            <?php foreach($packages as $package): ?>
                            <tr>
                                    
                                <td class="user-item"><?= $package['id'];?></td>
                                <td class="user-item"><?= $package['title'];?></td>
                                <td class="user-item"><?= $package['description'];?></td>
                                <td class="user-item"><?= $package['cover'];?></td>
                                <td class="user-item"><?= $package['destination'];?> - <?= $package['state'];?>/<?= $package['country'];?></td>
                                <td class='user-item'><?= $package['exit_from'];?></td>
                                <td class='user-item'><?= $package['user_id'];?></td>
                                <td class='user-item'><?= $package['created_at'];?></td>
                                
                                <td class="user-item">
                                    <a href="<?=$base;?>/package/<?= $package['id'];?>/editPackage">Editar</a>
                                    <a href="<?=$base;?>/package/<?= $package['id'];?>/deletePackage" onclick="confirm('Tem certeza que deseja excluir o Post <?= $package['title'];?>')">Excluir</a>
                                </td>
                                
                            </tr>
                            <?php endforeach; ?>

                        </table>
                        <a href="<?=$base;?>/newPackage">+ Inserir Pacotes +</a>
                        <!-- fim da lista de Usuarios -->
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $render('footer');?>