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
                    <div class="dash-boxes ">
                        <!-- Form addUser -->
                        <form method="post" enctype="multipart/form-data" action="<?=$base?>/newEvent" class="addUser">
                            <fieldset>
                                <legend>
                                    <h4>Formulário de inserção de Pacotes de Viagem</h4>
                                </legend>
                                <div class="campo">
                                    <label for="title">Título:</label>
                                    <input type="text" id="title" name="title" class="input" placeholder="Digite o título do pacote de viagem">
                                </div>
                                <div class="campo">
                                    <label for="description">Descrição:</label>
                                    <input type="text" id="description" name="description" class="input" placeholder="Digite a descrição do pacote de viagem">
                                </div>
                                <div class="campo">
                                    <label for="text">Texto:</label>
                                    <textarea name="text" id="text" cols="30" rows="10">

                                    </textarea>
                                </div>
                                <div class="campo">
                                    <label for="cover">Capa:</label>
                                    <input type="file" id="cover" name="cover" class="input" placeholder="Escolha a foto de capa do pacote de viagem">
                                </div>
                                <div class="campo">
                                    <label for="img1">Foto 1:</label>
                                    <input type="file" id="img1" name="img1" class="input" placeholder="Escolha a foto 1">
                                </div>
                                <div class="campo">
                                    <label for="img2">Foto 2:</label>
                                    <input type="file" id="img2" name="img2" class="input" placeholder="Escolha a foto 2">
                                </div>
                                <div class="campo">
                                    <label for="img3">Foto 3:</label>
                                    <input type="file" id="img3" name="img3" class="input" placeholder="Escolha a foto 3">
                                </div>
                                <div class="campo">
                                    <label for="img4">Foto 4:</label>
                                    <input type="file" id="img4" name="img4" class="input" placeholder="Escolha a foto 4">
                                </div>
                                <div class="campo">
                                    <label for="link">Link:</label>
                                    <input type="text" id="link" name="link" class="input" placeholder="Digite o país do pacote de viagem">
                                </div>
                                
                                <div class="campo">
                                    <label for="expires_at">Expira em:</label>
                                    <input type="DateTime-Local" id="expires_at" name="expires_at" class="input" placeholder="Digite a data de expiração do pacote de viagem">
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
                                    <input type="submit" class="btn" value="Cadastrar">
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