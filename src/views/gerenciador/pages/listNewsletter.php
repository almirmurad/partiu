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
                        <?php if(isset($newsletter) && !empty($newsletter)):?>
                            <a href="<?=$base;?>/" class="btn ">+ Exportar Lista +</a>
                            <?php else:?>
                                <a href="<?=$base;?>/newPartnerType" class=" btn-disabled">+ Inserir Tipo de Parcerias +</a>
                        <?php endif;?>
                    </div>
                    <div class="dash-boxes ">
                        <!-- Lista de Contatos -->
                        <table class="list-users">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Criado em</th>
                                
                                <th>Ações</th>
                            </tr>
                            <?php foreach($newsletter as $newsl): ?>
                            <tr>
                                    
                                <td class="user-item"><?= $newsl->id;?></td>
                                <td class="user-item"><?= $newsl->name;?></td>
                                <td class="user-item"><?= $newsl->email;?>
                                <td class='user-item'><?= $newsl->phone;?></td>
                                <td class='user-item'><?= date('d/m/Y', strtotime($newsl->created_at));?></td>
                                
                                <td class="user-item">
                                    <a href="<?=$base;?>/newsletter/<?= $newsl->id;?>/deleteNewsletter" onclick="confirm('Tem certeza que deseja excluir o contato: <?= $newsl->email; '?'?>')"><img src="<?=$base?>/assets/img/img_admin/del.png" width="20px" height="20px" alt=""></a>
                                </td>
                                
                            </tr>
                            <?php endforeach; ?>

                        </table>
                        <!-- fim da lista de contatos -->
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $render('footer');?>