<?php $render('head');?>

    <?php $render('header',['loggedUser'=>$loggedUser]);?>
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
                                    <span class="notice">Mensagem:<?=$flash;?></span>
                                </div>
                            <?php endif; ?>

                        <form method="post" enctype="multipart/form-data" action="<?=$base;?>/package/<?=$package['id'];?>/editPackage" class="addUser">
                            <fieldset>
                                <legend>
                                    <h4>Formulário de edição de Pacotes</h4>
                                </legend>
                                <div class="campo">
                                    <label for="title">Título:</label>
                                    <input type="text" id="title" name="title" class="input" value="<?=$package['title'];?>">
                                </div>
                                <div class="campo">
                                    <label for="description">Descrição:</label>
                                    <input type="text" id="description" name="description" class="input" value="<?=$package['description'];?>">
                                </div>
                                <div class="campo">
                                    <label for="text">Texto:</label>
                                    <textarea name="text" id="text" cols="30" rows="10">
                                    <?=$package['text'];?>
                                    </textarea>
                                </div>
                                <div class="campo">
                                    <label for="cover">Capa:</label>
                                    <input type="file" id="cover" name="cover" class="input" value="<?=$package['cover'];?>">
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
                                
                                <!--<div class="campo">
                                <label for="subCatAsc">Categoria pertencente:</label>
                                    <select name="subCatAsc" id="subCatAsc">
                                        
                                        <option value="<?=$subCat['id'];?>" ><?=$subCat['name'];?></option>
                                        
                                    </select>
                                </div>-->
                                <div class="campo">
                                    <label for="destination">Destino:</label>
                                    <input type="text" id="destination" name="destination" class="input" placeholder="Digite o destino do pacote de viagem" value="<?=$package['destination'];?>">
                                </div>
                                <div class="campo">
                                    <label for="state">Estado:</label>
                                    <input type="text" id="state" name="state" class="input" placeholder="Digite o estado do pacote de viagem" value="<?=$package['state'];?>">
                                </div>
                                <div class="campo">
                                    <label for="country">País:</label>
                                    <input type="text" id="country" name="country" class="input" placeholder="Digite o país do pacote de viagem" value="<?=$package['country'];?>">
                                </div>
                                <div class="campo">
                                    <label for="exit_from">Saída de:</label>
                                    <input type="text" id="exit_from" name="exit_from" class="input" placeholder="Digite o país do pacote de viagem" value="<?=$package['exit_from'];?>">
                                </div>
                                <div class="campo">
                                    <label for="going_on">Data de saída:</label>
                                    <input type="DateTime-Local" id="going_on" name="going_on" class="input" placeholder="Digite a data de saída do pacote de viagem" value="<?=$package['going_on'];?>">
                                </div>
                                <div class="campo">
                                    <label for="return_in">Data de retorno:</label>
                                    <input type="DateTime-Local" id="return_in" name="return_in" class="input" placeholder="Digite a data de retorno do pacote de viagem" value="<?=$package['return_in'];?>">
                                </div>
                                <div class="campo">
                                    <label for="expires_at">Expira em:</label>
                                    <input type="DateTime-Local" id="expires_at" name="expires_at" class="input" placeholder="Digite a data de expiração do pacote de viagem" value="<?=$package['expires_at'];?>">
                                </div>
                                <div class="campo">
                                    <label for="price">Preço:</label>
                                    <input type="text" id="price" name="price" class="input" placeholder="Digite preço do pacote de viagem" value="<?=$package['price'];?>" pattern="[0-9.,]{1,10}" title="somente números" />
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