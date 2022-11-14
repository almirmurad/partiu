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

                            <ul>
                                <?php foreach($packages as $package):?>
                                    <?php 
                                        $today = date('Y-m-d H:i:s', strtotime("now"));
                                        $expires = $package->expires_at;
                                    ?>
                                    <li># <?= $package->id;?></li>
                                    <li>TÍTULO: <?= $package->title;?></li>
                                    <li>DESCRIÇÃO: <?= $package->description;?></li>
                                    <li>TEXTO: <?= $package->text;?></li>
                                    <li>CAPA: <?= $package->cover;?></li>
                                    <li>IMAGEM 1: <?= $package->img1;?></li>
                                    <li>IMAGEM 2: <?= $package->img2;?></li>
                                    <li>IMAGEM 3: <?= $package->img3;?></li>
                                    <li>IMAGEM 4: <?= $package->img4;?></li>
                                    <li>DESTINO: <?= $package->destination;?> - <?= $package->state;?>/<?= $package->country;?></li>
                                    <li>PARCEIRO: <?= $package->partner->name;?></li>
                                    <li>USUÁRIO: <?= $package->user->name;?></li>
                                    <li>CRIADO EM: <?= date('d/m/Y', strtotime($package->created_at));?></li>
                                    <li>EXPIRA EM: <?= date('d/m/Y', strtotime($package->expires_at));?></li>
                                    <li>EXPIRA EM (DIAS): <?= $package->days;?></li>
                                    <li>TOTAL DE DIAS: <?= $package->totalDays;?></li>
                                    <?php if( $package->active == 1 ):?>
                                        <li >SITUAÇÃO: <span class="no-prazo">Ativo</span></li>
                                    <?php else:?>
                                        <li >SITUAÇÃO: <span class="vencido">Inativo</span></li>
                                    <?php endif?>
                                    <?php if( $today < $expires ):?>
                                        <li >STATUS: <span class="no-prazo">No prazo</span></li>
                                    <?php else:?>
                                        <li >STATUS: <span class="vencido">Vencido</span></li>
                                    <?php endif?>
                                    <li>PREÇO: R$ <?= $package->price;?></li>
                                    <li>PARCELAS: <?= $package->installments;?></li>
                                    <li>JUROS: <?= $package->fee;?> </li>
                                    <li>CLICKS: <?= $package->clicks;?></li>
                                    <li>VIEWS: <?= $package->views;?></li>
                                    <li>LINK: <?= $package->link;?> </li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                            </ul>
                            <?php endforeach; ?>

                            

                            
                        </div>
                    </div>
                </div>
            </section>
        </main>
<?php $render('footer');?>