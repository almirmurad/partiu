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
                        <a href="<?=$base;?>/newCat" class="btn " >+ Inserir Categoria +</a>
                    </div>
                    <div class="dash-boxes ">
                        <!-- inicio dos boxes individuais-->
                        <?php $render('dashBoxesCats', [
                            'loggedUser'=>$loggedUser,
                            'cats'=>$cats]);?>
                        <!-- fim dos boxes individuais-->
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $render('footer');?>