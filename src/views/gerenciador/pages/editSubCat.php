<?php $render('head');?>

    <?php $render('header', ['loggedUser'=>$loggedUser]);?>
    <main>
        <aside>
            <h4>Navegação</h4>
            <?php $render('nav');?>
        </aside>
        <section>
            <div class="container column">
                <?php $render('breadcrumbs',[
                    'page'=>$page,
                    'subCat'=>$subCat['name']]);?>
                <div class="content column">
                    <h2><?=$page, $subCat['name'];?></h2>
                    <div class="dash-boxes column">
                        <!-- Form addUser -->
                        <?php if(!empty($flash)): ?>
                                <div class="error-notice">
                                    <span class="notice">Mensagem: <?=$flash;?></span>
                                </div>
                            <?php endif; ?>
                        <form method="post" enctype="multipart/form-data" action="<?=$base?>/subCat/<?=$subCat['id']?>/editSubCat" class="addUser">
                            <fieldset>
                                <legend>
                                    <h4>Formulário de edição de subcategoria </h4>
                                </legend>
                                <div class="campo">
                                    <label for="name">Nome:</label>
                                    <input type="text" id="name" name="name" class="input" value="<?=$subCat['name']?>">
                                </div>
                                <div class="campo">
                                    <label for="description">Descrição:</label>
                                    <input type="description" id="mail" name="description" class="input" value="<?=$subCat['description']?>">
                                </div>
                                <div class="campo">
                                    <label for="img">Imagem de capa:</label>
                                    <input type="file" id="img" name="img" class="input" placeholder="Escolha a imagem da categoria">
                                </div>
                                <div class="campo">
                                <label for="subCatAsc">Categoria pertencente:</label>
                                    <select name="subCatAsc" id="subCatAsc">
                                        <option value="1">Sem Categoria</option>
                                        <option value="2">Notícias</option>
                                        <option value="3">Roteiros</option>
                                        <option value="4">Blog</option>
                                    </select>
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