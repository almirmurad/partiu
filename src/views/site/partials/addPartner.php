<form method="post" enctype="multipart/form-data" action="<?=$base?>/newUserSite" class="addUser">
                            <fieldset>
                                <legend>
                                    <h4>Formulário de inserção de usuários</h4>
                                </legend>
                                <div class="campo full">
                                    <label for="name">Nome:</label>
                                    <input type="text" id="name" name="name" class="input" placeholder="Digite seu nome">
                                </div>
                                <div class="campo full">
                                    <label for="mail">E-Mail:</label>
                                    <input type="email" id="mail" name="mail" class="input" placeholder="Digite seu e-mail">
                                </div>
                                <div class="campo full">
                                    <label for="pass">Senha:</label>
                                    <input type="password" id="pass" name="pass" class="input" placeholder="Digite sua senha">
                                </div>
                                <div class="campo full">
                                    <label for="phone">Telefone:</label>
                                    <input type="tel" id="phone" name="phone" class="input" placeholder="Digite seu telefone">
                                </div>
                                
                                    <input type="hidden" id="parceria" name="parceria" class="input" value="<?=$parceria?>" >
                               
                                 
                                    <input type="hidden" id="parcTipo" name="typesPartner_id" class="input" value="<?=$pid?>" >
                                
                                
                                    <input type="hidden" id="userType" name="type" class="input" value="3" >
                             
                                <!-- <div class="campo">
                                    <label for="type">Tipo:</label>
                                    <select name="type" id="type" class="input">
                                        <option value="3">Parceiro-Banners</option>
                                        <option value="4">Parceiro-Anúncios</option>
                                        <option value="5">Parceiro-Banners e Anúncios</option>
                                    </select>
                                </div> -->
                                <div class="campo full">
                                    <label class="foto" for="avatar">Avatar:</label>
                                    <input type="file" id="avatar" name="avatar" class="input" placeholder="Escolha uma foto">
                                </div>
                                <div class="campo full">
                                    <input type="submit" class="btn" value="Cadastrar">
                                </div>
                                
                            </fieldset>
                        </form>

<!-- <form method="post" enctype="multipart/form-data" action="<?=$base?>/newPartner" class="addPartner">
    <fieldset>
        <legend>
            <h4>Formulário de Cadastro de Parceiros</h4>
        </legend>
        <div class="campo full">
            <label for="name">Parceria Escolhida:</label>
            <input type="text" id="parceria" name="parceria" class="input" value="<?=$parceria?>" disabled>
        </div>
        <div class="campo full">
            <label for="name">*Nome/Razão Social:</label>
            <input type="text" id="name" name="name" class="input" placeholder="Digite o nome/razão social do parceiro">
        </div>
        <div class="campo full">
            <label for="cpf">*CPF:</label>
            <input type="text" id="cpf" name="cpf" class="input" placeholder="Digite CPF do parceiro">
        </div>
        <div class="campo full">
            <label for="cnpj">CNPJ:</label>
            <input type="text" id="cnpj" name="cnpj" class="input" placeholder="Digite CNPJ do parceiro">
        </div>
        <div class="campo full">
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" class="input" placeholder="Digite email do parceiro">
        </div>
        <div class="campo full">
            <label for="phone">Telefone:</label>
            <input type="text" id="phone" name="phone" class="input" placeholder="Digite telefone do parceiro">
        </div>

        <div class="campo">
                                    <label for="pass">Senha:</label>
                                    <input type="password" id="pass" name="pass" class="input" placeholder="Digite sua senha">
                                </div>
        
        <div class="campo ">
            <input type="submit" class="btn" value="Enviar Solicitação">
        </div>
        
    </fieldset>
</form> -->