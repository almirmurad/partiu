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
                            <a href="<?=$base;?>/newPartner"class="btn ">+ Inserir Parceiros +</a>
                            <?php else:?>
                                <a href="<?=$base;?>/newPartner" class=" btn-disabled">+ Inserir Parceiros +</a>
                        <?php endif;?>
                    </div>
                    <div class="dash-boxes ">
                        <!-- Lista de Usuários -->
                        <table class="list-users">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Descrição</th>
                                <th>Tipo</th>
                                <th>Criado por</th>
                                <th>Criado em</th>
                                <th>Ativo</th>
                                <th>Ações</th>
                            </tr>
                            <?php foreach($partners as $partner): ?>
                            <tr>
                                    
                                <td class="user-item"><?= $partner->id;?></td>
                                <td class="user-item"><?= $partner->name;?></td>
                                <td class="user-item"><?= $partner->email;?></td>
                                <td class="user-item"><?= $partner->phone;?></td>
                                <td class="user-item"><?= $partner->description;?> - <?= $partner->state;?>/<?= $partner->country;?></td>
                                <td class='user-item'><?= $partner->partnerType->title;?></td>
                                <td class='user-item'><?= $partner->user->name;?></td>
                                <td class='user-item'><?= date('d/m/Y', strtotime($partner->created_at));?></td>
                                <td class='user-item'><?= $partner->active;?></td>
                                <td class="user-item">
                                    <a href="<?=$base;?>/partner/<?= $partner->id;?>/editPartner"><img src="<?=$base?>/assets/img/img_admin/edit.png" width="20px" height="20px" alt=""></a>
                                    <a href="<?=$base;?>/partner/<?= $partner->id;?>/deletePartner" onclick="confirm('Tem certeza que deseja excluir o Parceiro: <?= $partner->name; '? <br/> Esta ação não poderá ser revertida e excluirá também os pacotes de viagem deste parceiro!'?>')"><img src="<?=$base?>/assets/img/img_admin/del.png" width="20px" height="20px" alt=""></a>
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