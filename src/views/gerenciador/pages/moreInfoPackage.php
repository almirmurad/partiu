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
                            <?php foreach($packages as $package):?>
                                <div class="top-more-package">
                                    <div class="cover-more-package">
                                        <img src="<?=$base;?>/media/uploads/imgs/packages/<?=$package->cover?>" alt="">
                                    </div>
                                    <div class="data-more-package">
                                        <ul>
                                            <?php 
                                                $today = date('Y-m-d H:i:s', strtotime("now"));
                                                $expires = $package->expires_at;
                                            ?>
                                            <li>Id <?= $package->id;?></li>
                                            <li>TÍTULO: <?= $package->title;?></li>
                                            <li>DESTINO: <?= $package->destination;?> - <?= $package->state;?>/<?= $package->country;?></li>
                                            <li>USUÁRIO: <?= $package->user->name;?></li>
                                            <li>CRIADO EM: <?= date('d/m/Y', strtotime($package->created_at));?></li>
                                            <li>EXPIRA EM: <?= date('d/m/Y', strtotime($package->expires_at));?></li>
                                            <li>EXPIRA EM (DIAS): <?= $package->days;?></li>
                                    <li>TOTAL DE DIAS: <?= $package->totalDays;?></li>
                                            <li>PREÇO: R$ <?= $package->price;?></li>
                                            
                                        </ul>
                                        <div class="espaco">

                                        </div>
                                        <ul>
                                            <li>Responsável: <a href="<?=$base;?>/partner/<?=stripslashes($package->partner->id);?>/readPartner"><?=stripslashes($package->partner->name);?></a></li>
                                            <li>Telefone: <?=$package->partner->phone?></li>
                                            <li>E-mail: <?=stripslashes($package->partner->email);?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="midlle-more-package">
                                    <div class="text-more-package">
                                        <h4>DESCRIÇÃO:</h4>
                                        <?= $package->description;?><br/>
                                        <h4>TEXTO:</h4>
                                        <?=stripslashes($package->text);?>                                       
                                        
                                    </div>
                                    <div class="more">
                                        <div class="info-financ">
                                            <h5>Informações Financeiras</h5>
                                            <ul>
                                                <li>PREÇO: R$ <?= $package->price;?></li>
                                                <li>PARCELAS: <?= $package->installments;?></li>
                                                <li>JUROS: <?= $package->fee;?> </li>
                                            </ul>
                                        </div>
                                        <div class="more-info">
                                            <h5>Mais Informações</h5>
                                            <ul>
                                                <li>LINK: <a href="<?= $package->link;?>" target="_blank"><?= $package->link_title;?></a></li>
                                                <?php if( $package->active == 'A' ):?>
                                                    <li >SITUAÇÃO: <span class="no-prazo">Ativo</span></li>
                                                <?php else:?>
                                                    <li >SITUAÇÃO: <span class="vencido">Inativo</span></li>
                                                <?php endif?>
                                                <?php if( $today < $expires ):?>
                                                    <li >STATUS: <span class="no-prazo">No prazo</span></li>
                                                <?php else:?>
                                                    <li >STATUS: <span class="vencido">Vencido</span></li>
                                                <?php endif?>
                                                <li>CLICKS: <?= $package->clicks;?></li>
                                                <li>VIEWS: <?= $package->views;?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="foot-more-package">
                                <h5>Galeria de Imagens</h5>
                                    <div class="galerie">
                                        <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/packages/<?=$package->img1?>);"><a href="" class="galerie-link">Galeria</a></div>
                                        <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/packages/<?=$package->img2?>);"><a href="" class="galerie-link">Galeria</a></div>
                                        <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/packages/<?=$package->img3?>);"><a href="" class="galerie-link">texto</a></div>
                                        <div class="internal-img" style="background-image:url(<?=$base?>/media/uploads/imgs/packages/<?=$package->img4?>);"><a href="" class="galerie-link">texto</a></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
<?php $render('footer');?>