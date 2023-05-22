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
                        <?php if(isset($partner) && !empty($partner)):?>
                            
                            <a href="<?=$base;?>/newBanner" class="btn ">+ Inserir Banners +</a>
                            <?php else:?>
                                
                                <a href="#" class=" btn-disabled" onclick="alert('Para inserir um banner é necessário inserir um parceiro!')" >+ Inserir Banners +</a>
                        <?php endif;?>
                    </div>
                    <div class="dash-boxes ">
                        <!-- Lista de Usuários -->
                        <table class="list-users">
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Clicks</th>
                                <th>$/Clicks</th>
                                <th>Custo/clicks</th>
                                <th>Criado por</th>
                                <th>Criado em</th>
                                
                                <th>Ações</th>
                            </tr>
                            <?php if($loggedUser->type === 'Administrador'):?>
                                <?php foreach($banners as $banner): ?>
                                <tr>
                                        
                                    <td class="user-item"><?= $banner->id;?></td>
                                    <td class="user-item"><?= $banner->title;?></td>
                                    <td class="user-item"><?= $banner->description;?></td>
                                    <td class="user-item"><?= $banner->clicks;?></td>
                                    <td class="user-item"><?="R$ ".number_format($banner->priceClick,2,',');?></td>
                                    <td class="user-item"><?="R$ ".number_format($banner->coustClick,2,',');?></td>
                                    <td class='user-item'><?= $banner->user->name;?></td>
                                    <td class='user-item'><?= date('d/m/Y', strtotime($banner->created_at));?></td>
                                    
                                    <td class="user-item">
                                        <a href="<?=$base;?>/banner/<?= $banner->id;?>/editBanner"><img src="<?=$base?>/assets/img/img_admin/edit.png" width="20px" height="20px" alt=""></a>
                                        <a href="<?=$base;?>/banner/<?= $banner->id;?>/deleteBanner" onclick="confirm('Tem certeza que deseja excluir o Parceiro: <?= $banner->title; '? <br/> Esta ação não poderá ser revertida e excluirá também os pacotes de viagem deste parceiro!'?>')"><img src="<?=$base?>/assets/img/img_admin/del.png" width="20px" height="20px" alt=""></a>
                                    </td>
                                    
                                </tr>
                                <?php endforeach; ?>
                            <?php else:?>
                                <?php if(!empty($bannersPartner)):?>
                                    <?php foreach($bannersPartner as $banner): ?>
                                        <tr>
                                                
                                            <td class="user-item"><?= $banner->id;?></td>
                                            <td class="user-item"><?= $banner->title;?></td>
                                            <td class="user-item"><?= $banner->description;?></td>
                                            <td class="user-item"><?= $banner->clicks;?></td>
                                            <td class="user-item"><?="R$ ".number_format($banner->priceClick,2,',');?></td>
                                            <td class="user-item"><?="R$ ".number_format($banner->coustClick,2,',');?></td>
                                            <td class='user-item'><?= $banner->user->name;?></td>
                                            <td class='user-item'><?= date('d/m/Y', strtotime($banner->created_at));?></td>
                                            
                                            <td class="user-item">
                                                <a href="<?=$base;?>/banner/<?= $banner->id;?>/editBanner"><img src="<?=$base?>/assets/img/img_admin/edit.png" width="20px" height="20px" alt=""></a>
                                                <a href="<?=$base;?>/banner/<?= $banner->id;?>/deleteBanner" onclick="confirm('Tem certeza que deseja excluir o Parceiro: <?= $banner->title; '? <br/> Esta ação não poderá ser revertida e excluirá também os pacotes de viagem deste parceiro!'?>')"><img src="<?=$base?>/assets/img/img_admin/del.png" width="20px" height="20px" alt=""></a>
                                            </td>
                                            
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php else:?>
                                        <p>Você não possui banners cadastrados!</p>
                                <?php endif;?>
                            <?php endif;?>
                        </table>
                        <!-- fim da lista de Usuarios -->
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $render('footer');?>