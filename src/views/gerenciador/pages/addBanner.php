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
                    <?php
                    // echo "<pre>";
                    //  print_r($positions);
                    //  exit;
                    ?>
                    <div class="dash-boxes ">
                        <!-- Form addUser -->
                        <form method="post" enctype="multipart/form-data" action="<?=$base?>/newBanner" class="addUser">
                            <fieldset>
                                <legend>
                                    <h4>Formulário de inserção de posições de banners</h4>
                                </legend>
                                <div class="campo">
                                    <label for="title">Título:</label>
                                    <input type="text" id="title" name="title" class="input" placeholder="Digite o título da postagem">
                                </div>
                                <div class="campo">
                                    <label for="description">Descrição:</label>
                                    <input type="text" id="description" name="description" class="input" placeholder="Digite a descrição da postagem">
                                </div>
                                <div class="campo">
                                    <label for="position">Posição:</label>
                                    <select name="position" id="position">
                                        <?php foreach ($positions as $position):?>
                                            <option value="<?=$position->id;?>" ><?=$position->title;?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="campo">
                                    <label for="url">URL:</label>
                                    <input type="url" id="url" name="url" class="input" placeholder="Digite o url do Banner">
                                </div>
                                <div class="campo">
                                    <label for="img">Imagem:</label>
                                    <input type="file" id="img" name="img" class="input" placeholder="Escolha a imagem do banner">
                                </div>
                                <div class="campo">
                                    <label for="advertiser">Anunciante:</label>
                                    <input type="text" id="advertiser" name="advertiser" class="input" placeholder="Anunciante">
                                </div>

                                <div class="campo">
                                    <label for="partner_id">Parceiro:</label>
                                    <select name="partner_id" id="partner_id">
                                        <?php foreach ($partners as $partner):?>
                                            <option value="<?=$partner->id;?>" ><?=$partner->name;?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="campo">
                                    <label for="width">Largura:</label>
                                    <input type="text" id="width" name="width" class="input" placeholder="Digite o título da postagem">
                                </div>
                                <div class="campo">
                                    <label for="height">Altura:</label>
                                    <input type="text" id="height" name="height" class="input" placeholder="Digite o título da postagem">
                                </div>
                                <div class="campo">
                                    <label for="created_at">Criado em:</label>
                                    <input type="DateTime-Local" id="created_at" name="created_at" class="input" placeholder="Digite o título da postagem">
                                </div>
                                <div class="campo">
                                    <label for="expires_at">Expira em:</label>
                                    <input type="DateTime-Local" id="expires_at" name="expires_at" class="input" placeholder="Digite o título da postagem">
                                </div>
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