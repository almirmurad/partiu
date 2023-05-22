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
                        <?php if(isset($bannerPosition) && !empty($bannerPosition)):?>
                            <a href="<?=$base;?>/newBannerPosition" class="btn ">+ Inserir posições de banner +</a>
                            <?php else:?>
                                <a href="<?=$base;?>/newBannerPosition" class=" btn-disabled">+ Inserir Tipo de Parcerias +</a>
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
                            <?php foreach($bannerPosition as $partner): ?>
                            <tr>
                                    
                                <td class="user-item"><?= $partner->id;?></td>
                                <td class="user-item"><?= $partner->title;?></td>
                                <td class="user-item"><?= $partner->description;?>
                                <td class='user-item'><?= $partner->user->name;?></td>
                                <td class='user-item'><?= date('d/m/Y', strtotime($partner->created_at));?></td>
                                
                                <td class="user-item">
                                    <a href="<?=$base;?>/partnersType/<?= $partner->id;?>/editPartnerType"><img src="<?=$base?>/assets/img/img_admin/edit.png" width="20px" height="20px" alt=""></a>
                                    <a href="<?=$base;?>/partnersType/<?= $partner->id;?>/deletePartnerType" onclick="confirm('Tem certeza que deseja excluir o Parceiro: <?= $partner->title; '? <br/> Esta ação não poderá ser revertida e excluirá também os pacotes de viagem deste parceiro!'?>')"><img src="<?=$base?>/assets/img/img_admin/del.png" width="20px" height="20px" alt=""></a>
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