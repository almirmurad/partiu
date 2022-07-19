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

                        <form method="post" enctype="multipart/form-data" action="<?=$base;?>/partner/<?=$partner['id'];?>/editPartner" class="addUser">
                            <fieldset>
                                <legend>
                                    <h4>Formulário de edição de Pacotes</h4>
                                </legend>
                                <div class="campo">
                                    <label for="name">*Nome/Razão Social:</label>
                                    <input type="text" id="name" name="name" class="input" value="<?=$partner['name'];?>">
                                </div>
                                <div class="campo">
                                    <label for="cpf">*CPF:</label>
                                    <input type="text" id="cpf" name="cpf" class="input"  value="<?=$partner['cpf'];?>">
                                </div>
                                <div class="campo">
                                    <label for="cnpj">CNPJ:</label>
                                    <input type="text" id="cnpj" name="cnpj" class="input" value="<?=$partner['cnpj'];?>">
                                </div>
                                <div class="campo">
                                    <label for="email">E-mail:</label>
                                    <input type="text" id="email" name="email" class="input" value="<?=$partner['email'];?>">
                                </div>
                                <div class="campo">
                                    <label for="phone">Telefone:</label>
                                    <input type="text" id="phone" name="phone" class="input" value="<?=$partner['phone'];?>">
                                </div>
                                <div class="campo">
                                    <label for="adress">Endereço:</label>
                                    <input type="text" id="adress" name="adress" class="input" value="<?=$partner['adress'];?>">
                                </div>
                                <div class="campo">
                                    <label for="number">Número:</label>
                                    <input type="text" id="number" name="number" class="input" value="<?=$partner['number'];?>">
                                </div>
                                <div class="campo">
                                    <label for="complement">Complemento:</label>
                                    <input type="text" id="complement" name="complement" class="input" value="<?=$partner['complement'];?>">
                                </div>
                                <div class="campo">
                                    <label for="district">Bairro:</label>
                                    <input type="text" id="district" name="district" class="input" value="<?=$partner['district'];?>">
                                </div>
                                <div class="campo">
                                    <label for="city">Cidade:</label>
                                    <input type="text" id="city" name="city" class="input" value="<?=$partner['city'];?>">
                                </div>
                                <div class="campo">
                                    <label for="state">Estado:</label>
                                    <input type="text" id="state" name="state" class="input" value="<?=$partner['state'];?>">
                                </div>
                                <div class="campo">
                                    <label for="country">País:</label>
                                    <input type="text" id="country" name="country" class="input" value="<?=$partner['country'];?>">
                                </div>
                                <div class="campo">
                                    <label for="postal_code">CEP:</label>
                                    <input type="text" id="postal_code" name="postal_code" class="input" value="<?=$partner['postal_code'];?>">
                                </div>
                                <div class="campo">
                                    <label for="description">Descrição:</label>
                                    <input type="text" id="description" name="description" class="input" value="<?=$partner['description'];?>">
                                </div>
                                <div class="campo">
                                    <label for="about">Sobre:</label>
                                    <textarea name="about" id="about" cols="30" rows="10"><?=$partner['about'];?></textarea>
                                </div>
                                <div class="campo">
                                    <label for="cover">Capa:</label>
                                    <input type="file" id="cover" name="cover" class="input" value="<?=$partner['cover'];?>">
                                </div>
                                <div class="campo">
                                    <label for="img1">Foto 1:</label>
                                    <input type="file" id="img1" name="img1" class="input" value="<?=$partner['img1'];?>">
                                </div>
                                <div class="campo">
                                    <label for="img2">Foto 2:</label>
                                    <input type="file" id="img2" name="img2" class="input" value="<?=$partner['img2'];?>">
                                </div>
                                <div class="campo">
                                    <label for="img3">Foto 3:</label>
                                    <input type="file" id="img3" name="img3" class="input" value="<?=$partner['img3'];?>">
                                </div>
                                <div class="campo">
                                    <label for="img4">Foto 4:</label>
                                    <input type="file" id="img4" name="img4" class="input" value="<?=$partner['img4'];?>">
                                </div>
                                <div class="campo">
                                    <label for="url">Site:</label>
                                    <input type="url" id="url" name="url" class="input" value="<?=urldecode($partner['url']);?>">
                                </div>
                                <div class="campo">
                                    <label for="whats">WhatsApp:</label>
                                    <input type="text" id="whats" name="whats" class="input" value="<?=urldecode($partner['whats']);?>">
                                </div>
                                <div class="campo">
                                    <label for="face">Facebook:</label>
                                    <input type="url" id="face" name="face" class="input" value="<?=urldecode($partner['face']);?>">
                                </div>
                                <div class="campo">
                                    <label for="insta">Instagram:</label>
                                    <input type="url" id="insta" name="insta" class="input" value="<?=urldecode($partner['insta']);?>">
                                </div>
                                
                                <!--<div class="campo">
                                <label for="subCatAsc">Categoria pertencente:</label>
                                    <select name="subCatAsc" id="subCatAsc">
                                        <?php foreach ($subCats as $subCat):?>
                                        <option value="<?=$subCat['id'];?>" ><?=$subCat['name'];?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>-->
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