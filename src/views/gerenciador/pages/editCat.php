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
                    <h2><?=$page;?></h2>
                    <div class="dash-boxes column">
                        <!-- Form addUser -->
                        <?php if(!empty($flash)): ?>
                                <div class="error-notice">
                                    <span class="notice">Mensagem: <?=$flash;?></span>
                                </div>
                            <?php endif; ?>
                        <form method="post" enctype="multipart/form-data" action="<?=$base?>/cat/<?=$cat['id']?>/editCat" class="addUser">
                            <fieldset>
                                <legend>
                                    <h4>Formulário de edição de categoria</h4>
                                </legend>
                                <div class="campo">
                                    <label for="name">Nome:</label>
                                    <input type="text" id="name" name="name" class="input" value="<?=$cat['name']?>">
                                </div>
                                <div class="campo">
                                    <label for="description">Descrição:</label>
                                    <input type="description" id="mail" name="description" class="input" value="<?=$cat['description']?>">
                                </div>
                                <div class="campo">
                                    <label for="img">Imagem de capa:</label>
                                    <input type="file" id="img" name="img" class="input" placeholder="Escolha a imagem da categoria">
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