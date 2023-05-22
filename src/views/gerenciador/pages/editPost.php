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

                        <form method="post" enctype="multipart/form-data" action="<?=$base;?>/post/<?=$posts['id'];?>/editPost" class="addUser">
                            <fieldset>
                                <legend>
                                    <h4>Formulário de edição de Postagens do Blog</h4>
                                </legend>
                                <div class="campo">
                                    <label for="title">Título:</label>
                                    <input type="text" id="title" name="title" class="input" value="<?=$posts['title'];?>">
                                </div>
                                <div class="campo">
                                    <label for="description">Descrição:</label>
                                    <input type="text" id="description" name="description" class="input" value="<?=$posts['description'];?>">
                                </div>
                                <div class="campo">
                                    <label for="text">Texto:</label>
                                    <textarea name="text" id="text" cols="30" rows="10">
                                    <?=$posts['text'];?>
                                    </textarea>
                                </div>
                                <div class="campo">
                                    <label for="cover">Capa:</label>
                                    <input type="file" id="cover" name="cover" class="input" value="<?=$posts['cover'];?>">
                                </div>
                                <div class="campo">
                                    <label for="foto1">Foto 1:</label>
                                    <input type="file" id="foto1" name="img1" class="input" placeholder="Escolha a foto 1">
                                </div>
                                
                                <div class="campo">
                                    <label for="foto2">Foto 2:</label>
                                    <input type="file" id="foto2" name="img2" class="input" placeholder="Escolha a foto 2">
                                </div>

                                <div class="campo">
                                    <label for="foto3">Foto 3:</label>
                                    <input type="file" id="foto3" name="img3" class="input" placeholder="Escolha a foto 2">
                                </div>

                                <div class="campo">
                                    <label for="foto4">Foto 4:</label>
                                    <input type="file" id="foto4" name="img4" class="input" placeholder="Escolha a foto 2">
                                </div>
                                
                                <div class="campo">
                                <label for="subCatAsc">Categoria pertencente:</label>
                                    <select name="subCatAsc" id="subCatAsc">
                                        
                                        <option value="<?=$subCat['id'];?>" ><?=$subCat['name'];?></option>
                                        
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