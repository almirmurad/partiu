<?php $render('head');?>

    <?php $render('header',['loggedUser'=>$loggedUser]);?>
    <main>
        <aside>
            <h4>Navegação</h4>
            <?php $render('nav', ['loggedUser'=>$loggedUser]);?>
        </aside>
        <section>
            <div class="container column">
                <?php $render('breadcrumbs',['page'=>$page]);?>
                <div class="content column">
                    <h2><?=$page;?></h2>
                    <div class="dash-boxes column">
                        <!-- Form addUser -->
                        <?php if(!empty($flash)): ?>
                                <div class="error-notice">
                                    <span class="notice">Mensagem:<?=$flash;?></span>
                                </div>
                            <?php endif; ?>

                        <form method="post" enctype="multipart/form-data" action="<?=$base;?>/partnersType/<?=$partnerType['id'];?>/editPartnerType" class="addUser">
                        <fieldset>
                                <legend>
                                    <h4>Formulário de inserção de tipos de parcerias</h4>
                                </legend>
                                <div class="campo">
                                    <label for="title">Título do tipo de parceria:</label>
                                    <input type="text" id="title" name="title" class="input" value="<?=$partnerType['title'];?>">
                                </div>
                                
                                <div class="campo">
                                    <label for="description">Descrição:</label>
                                    <input type="text" id="description" name="description" class="input" value="<?=$partnerType['description'];?>">
                                </div>
                                
                                <div class="campo">
                                    <input type="submit" class="btn" value="Alterar">
                                </div>
                                
                            </fieldset>
                        </form>
                        <!-- fim do Form addUser -->
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $render('footer');?>