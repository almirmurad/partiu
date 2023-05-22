<?php $render('head');?>
    <?php $render('header', ['loggedUser'=>$loggedUser]);?>
        <main>
            <aside>
                <h4>Navegação</h4>
                <?php $render('nav', ['loggedUser'=>$loggedUser]);?>
            </aside>
            <section>
                <div class="container column">
                    <?php $render('breadcrumbs',['page'=>$page]);?>
                    <div class="content column">
                        <div class="page-title">
                            <h2><?=$page;?></h2>
                            <?php if(isset($partners) && !empty($partners)):?>
                                <a href="<?=$base;?>/newPackage?userId=<?=$loggedUser->id?>" class="btn " >+ Inserir Pacotes +</a>
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
                                    <th>Parceiro</th>
                                    <th>Criado em</th>
                                    <th>Situação</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                                <?php if($loggedUser->type === 'Administrador'):?>
                                    <?php foreach($packages as $package): ?>
                                        <?php 
                                            $today = date('Y-m-d H:i:s', strtotime("now"));
                                            $expires = $package->expires_at;
                                        ?>
                                    <tr>
                                            
                                        <td class="user-item"><?= $package->id;?></td>
                                        <td class="user-item"><?= $package->title;?></td>
                                        <td class="user-item"><?= $package->description;?></td>                                   
                                        <td class='user-item'><?= $package->partner->name;?></td>
                                        <td class='user-item'><?= date('d/m/Y', strtotime($package->created_at));?></td>
                    

                                        <?php if( $package->active === 'A' ):?>
                                            <td class='user-item'><span class="no-prazo">Ativo</span></td>
                                        <?php else:?>
                                            <td class='user-item'><span class="vencido">Inativo</span></td>
                                        <?php endif?>
                                        

                                        <?php if( $today < $expires ):?>
                                            <td class='user-item'><span class="no-prazo">No prazo</span></td>
                                        <?php else:?>
                                            <td class='user-item'><span class="vencido">Vencido</span></td>
                                            <?php endif?>
                                        <td class="user-item">
                                            <a href="<?=$base;?>/package/<?= $package->id;?>/editPackage"><img src="<?=$base?>/assets/img/img_admin/edit.png" width="20px" height="20px" alt=""></a>
                                            <a href="<?=$base;?>/package/<?= $package->id;?>/deletePackage" onclick="confirm('Tem certeza que deseja excluir o Post <?= $package->title?>')"><img src="<?=$base?>/assets/img/img_admin/del.png" width="20px" height="20px" alt=""></a>
                                            <a href="<?=$base;?>/package/<?= $package->id;?>/moreInfoPackage"><img src="<?=$base?>/assets/img/img_admin/search.png" width="20px" height="20px" alt=""></a>
                                        </td>
                                        
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else:?>
                                    <?php if(!empty($packagesPartner)):?>
                                            
                                        <?php foreach($packagesPartner as $package): ?>
                                        
                                        <?php 
                                            $today = date('Y-m-d H:i:s', strtotime("now"));
                                            $expires = $package->expires_at;

                                            
                                        ?>
                                        <tr>
                                                
                                            <td class="user-item"><?= $package->id;?></td>
                                            <td class="user-item"><?= $package->title;?></td>
                                            <td class="user-item"><?= $package->description;?></td>                                   
                                            <td class='user-item'><?= $package->partner->name;?></td>
                                            <td class='user-item'><?= date('d/m/Y', strtotime($package->created_at));?></td>
                        

                                            <?php if( $package->active === 'A' ):?>
                                            <td class='user-item'><span class="no-prazo">Ativo</span></td>
                                            <?php else:?>
                                                <td class='user-item'><span class="vencido">Inativo</span></td>
                                                <?php endif?>
                                            

                                            <?php if( $today < $expires ):?>
                                            <td class='user-item'><span class="no-prazo">No prazo</span></td>
                                            <?php else:?>
                                                <td class='user-item'><span class="vencido">Vencido</span></td>
                                                <?php endif?>
                                            <td class="user-item">
                                                <a href="<?=$base;?>/package/<?= $package->id;?>/editPackage"><img src="<?=$base?>/assets/img/img_admin/edit.png" width="20px" height="20px" alt=""></a>
                                                <a href="<?=$base;?>/package/<?= $package->id;?>/deletePackage" onclick="confirm('Tem certeza que deseja excluir o Post <?= $package->title?>')"><img src="<?=$base?>/assets/img/img_admin/del.png" width="20px" height="20px" alt=""></a>
                                                <a href="<?=$base;?>/package/<?= $package->id;?>/moreInfoPackage"><img src="<?=$base?>/assets/img/img_admin/search.png" width="20px" height="20px" alt=""></a>
                                            </td>
                                            
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else:?>
                                        <p>Você não possui pacotes cadastrados!</p>
                                        <?php endif;?>
                                <?php endif; ?>

                            </table>                         
                            <!-- fim da lista de Usuarios -->
                        </div>
                    </div>
                </div>
            </section>
        </main>
<?php $render('footer');?>