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
                        <?php if(isset($banners) && !empty($banners)):?>
                            <a href="<?=$base;?>/newBanner" class="btn ">+ Inserir Banners +</a>
                            <?php else:?>
                                <a href="<?=$base;?>/newBanner" class=" btn-disabled">+ Inserir Banners +</a>
                        <?php endif;?>
                    </div>
                    <div class="dash-boxes ">
                        <!-- Lista de Usuários -->
                        <table class="list-users">
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Criado por</th>
                                <th>Criado em</th>
                                
                                <th>Ações</th>
                            </tr>
                            <?php foreach($banners as $banner): ?>
                            <tr>
                                    
                                <td class="user-item"><?= $banner['id'];?></td>
                                <td class="user-item"><?= $banner['title'];?></td>
                                <td class="user-item"><?= $banner['description'];?>
                                <td class='user-item'><?= $banner['user_id'];?></td>
                                <td class='user-item'><?= date('d/m/Y', strtotime($banner['created_at']));?></td>
                                
                                <td class="user-item">
                                    <a href="<?=$base;?>/partnersType/<?= $banner['id'];?>/editPartnerType"><img src="<?=$base?>/assets/img/img_admin/edit.png" width="20px" height="20px" alt=""></a>
                                    <a href="<?=$base;?>/partnersType/<?= $banner['id'];?>/deletePartnerType" onclick="confirm('Tem certeza que deseja excluir o Parceiro: <?= $partner['title']; '? <br/> Esta ação não poderá ser revertida e excluirá também os pacotes de viagem deste parceiro!'?>')"><img src="<?=$base?>/assets/img/img_admin/del.png" width="20px" height="20px" alt=""></a>
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