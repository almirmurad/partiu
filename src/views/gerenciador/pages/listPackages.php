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
                            <?php if(isset($partners) && !empty($partners)):?>
                                <a href="<?=$base;?>/newPackage" class="btn " >+ Inserir Pacotes +</a>
                                <?php else:?>
                                    <a href="#" class=" btn-disabled" onclick="alert('Para inserir um pacote é necessário inserir um parceiro!')" >+ Inserir Pacotes +</a>
                            <?php endif;?>
                        </div>
                        <div class="dash-boxes ">
                            <!-- Lista de Usuários -->
                            <table class="list-users">
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Descrição</th>
                                    <!-- <th>Capa</th> -->
                                    <!-- <th>Destino</th> -->
                                    <!-- <th>Saída de:</th> -->
                                    <th>Parceiro</th>
                                    <th>Criado por</th>
                                    <th>Criado em</th>

                                    <th>Ações</th>
                                </tr>
                                
                                <?php foreach($packages as $package): ?>
                                <tr>
                                        
                                    <td class="user-item"><?= $package->id;?></td>
                                    <td class="user-item"><?= $package->title;?></td>
                                    <td class="user-item"><?= $package->description;?></td>
                                    <!-- <td class="user-item"><?= $package->cover;?></td> -->
                                    <!-- <td class="user-item"><?= $package->destination;?> - <?= $package->state;?>/<?= $package->country;?></td> -->
                                    <!-- <td class='user-item'><?= $package->exit_from;?></td> -->
                                    <td class='user-item'><?= $package->partner->name;?></td>
                                    <td class='user-item'><?= $package->user->name;?></td>
                                    <td class='user-item'><?= $package->created_at;?></td>
                                    
                                    
                                    <td class="user-item">
                                        <a href="<?=$base;?>/package/<?= $package->id;?>/editPackage"><img src="<?=$base?>/assets/img/img_admin/edit.png" width="20px" height="20px" alt=""></a>
                                        <a href="<?=$base;?>/package/<?= $package->id;?>/deletePackage" onclick="confirm('Tem certeza que deseja excluir o Post <?= $package->title?>')"><img src="<?=$base?>/assets/img/img_admin/del.png" width="20px" height="20px" alt=""></a>
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