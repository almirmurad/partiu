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
                            <?php
                            // echo"<div style='width:500px'>";
                            // echo"<pre>";
                            
                            // print_r($news);
                            // echo"</div>";
                            // exit;
                            ?>
                        <?php foreach($news as $oneNews):?>
                        <form method="post" enctype="multipart/form-data" action="<?=$base;?>/news/<?=$oneNews->id;?>/editNews" class="addUser">
                            <fieldset>
                                <legend>
                                    <h4>Formulário de edição de notícias</h4>
                                </legend>
                                <div class="campo">
                                    <label for="title">Título:</label>
                                    <input type="text" id="title" name="title" class="input" value="<?=$oneNews->title;?>">
                                </div>
                                <div class="campo">
                                    <label for="description">Descrição:</label>
                                    <input type="text" id="description" name="description" class="input" value="<?=$oneNews->description;?>">
                                </div>
                                <div class="campo">
                                    <label for="text">Texto:</label>
                                    <textarea name="text" id="text" cols="30" rows="10"><?=$oneNews->text;?></textarea>
                                </div>
                                <div class="campo">
                                    <label for="cover">Capa:</label>
                                    <input type="file" id="cover" name="cover" class="input" value="<?=$oneNews->cover;?>">
                                </div>
                                <div class="campo">
                                    <label for="foto1">Foto 1:</label>
                                    <input type="file" id="foto1" name="foto1" class="input" placeholder="Escolha a foto 1">
                                </div>
                                <div class="campo">
                                    <label for="legend_img1">Legenda da Foto 1:</label>
                                    <input type="text" id="legend_img1" name="legend_img1" class="input" value="<?=$oneNews->legend_img1;?>">
                                </div>
                                <div class="campo">
                                    <label for="foto2">Foto 2:</label>
                                    <input type="file" id="foto2" name="foto2" class="input" placeholder="Escolha a foto 2">
                                </div>
                                <div class="campo">
                                    <label for="legend_img2">Legenda da Foto 2:</label>
                                    <input type="text" id="legend_img2" name="legend_img2" class="input" value="<?=$oneNews->legend_img2;?>">
                                </div>
                                <div class="campo">
                                    <label for="source">Fonte:</label>
                                    <input type="text" id="source" name="source" class="input" value="<?=$oneNews->source;?>">
                                </div>
                                <!-- <div class="campo">                                 
                                    <label for="subCatAsc">Categoria pertencente:</label>
                                    <select name="subCatAsc" id="subCatAsc">
                                            <option value="<?=$oneNews->subCat->id;?>" ><?=$oneNews->subCat->name;?></option>
                                    </select>
                                </div> -->
                                <div class="campo">
                                    <label for="subCatAsc">Categoria pertencente:</label>
                                    <select name="subCatAsc" id="subCatAsc">
                                        <?php foreach ($subCats as $subCat):?>
                                            <option value="<?=$subCat->id;?>" ><?=$subCat->name;?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="campo">
                                    <input type="submit" class="btn" value="Alterar">
                                </div>
                                
                            </fieldset>
                        </form>
                        <?php endforeach;?>
                        <!-- fim do Form addUser -->
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php $render('footer');?>