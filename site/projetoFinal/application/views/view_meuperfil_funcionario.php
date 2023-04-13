<!-- container fluido 100% -->
<div class="container-fluid bg1 text-center" style="margin-top: 3rem; padding-left: 3rem; padding-right: 4rem;" id="quem">
    
    <form id="formAtualizarFuncionario" method="POST" enctype="multipart/form-data">

        <div class="row">
            
            <div class="col-lg-4 col-sm-12">

                <div class="bg-image image-upload2">
                                        
                    <img src="<?php echo base_url("assets/imgperfil/" . $_SESSION['dadosFuncionario'][6])?>" id="fotoPerfil" class="figure-img img-fluid file-upload-image2 rounded-circle" style="width: 280px; height: 280px; margin-bottom: 1rem;">
                    
                </div>
                
                <div class="form-outline mb-4 btn btn-primary btnAdicionarImagemInput" id="btnAdicionarImagemInput">
                
                    <label for='arquivo_para_upload2' class="labelImg2" id="labelImg2">Selecionar um arquivo</label>
                    <input type="file" onchange="readURL(this);" class="form-control-lg text-white inputFile" name="arquivo_para_upload2" id="arquivo_para_upload2" style="border-radius: 20px; color: white; height: 3rem;"/>
                    
                </div>

            </div>

            <div class="col-lg-8 col-sm-12">
                
                <div class="row g-10">

                    <label class="form-label" style="text-align: left; margin-bottom: -1px;">Nome</label>

                    <div class="input-group mb-3 col-sm-12">

                        <input type="text" class="form-control" id="nome_motoboy" name="nomeMotoboyAlt" placeholder="Nome Completo" value="<?php echo $_SESSION['dadosFuncionario'][0] ?>" required/>
                        
                        <button class="btn btn-primary" onclick="desabilitarBotao('nome_motoboy')" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                            Alterar
                        </button>

                    </div>

                    <label class="form-label" style="text-align: left; margin-bottom: -1px;">CPF/CNPJ</label>

                    <div class="input-group mb-3 col-sm-12">
                                        
                        <input type="text" class="form-control" id="cpf_motoboy" name="cpfMotoboyAlt" placeholder="CPF" value="<?php echo $_SESSION['dadosFuncionario'][1] ?>" required>
                        
                        <button class="btn btn-primary" onclick="desabilitarBotao('cpf_motoboy')" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                            Alterar
                        </button>

                    </div>
                    
                    <label class="form-label" style="text-align: left; margin-bottom: -1px;">Placa da Moto</label>

                    <div class="input-group mb-3 col-sm-12">
                        
                        <input type="text" class="form-control" id="placa_motoboy" name="placaMotoMotoboy" placeholder="Placa do Veículo" value="<?php echo $_SESSION['dadosFuncionario'][2] ?>" required>
                    
                        <button class="btn btn-primary" onclick="desabilitarBotao('placa_motoboy')" type="button" id="button-addon3" data-mdb-ripple-color="dark">
                            Alterar
                        </button>

                    </div>

                    <label class="form-label" style="text-align: left; margin-bottom: -1px;">Telefone</label>

                    <div class="input-group mb-3 col-sm-12">
                        
                        <input type="text" class="form-control" id="telefone_motoboy" name="telefoneMotoboyAlt" placeholder="Telefone" value="<?php echo $_SESSION['dadosFuncionario'][5] ?>" required>
                        
                        <button class="btn btn-primary" onclick="desabilitarBotao('telefone_motoboy')" type="button" id="button-addon4" data-mdb-ripple-color="dark">
                            Alterar
                        </button>

                    </div>

                    <label class="form-label" style="text-align: left; margin-bottom: -1px;">E-mail</label>

                    <div class="input-group mb-3 col-sm-12">
        
                        <input type="text" class="form-control" id="email_motoboy" name="emailMotoboyAlt" placeholder="E-mail" value="<?php echo $_SESSION['dadosFuncionario'][3] ?>" required>
                            
                        <button class="btn btn-primary" onclick="desabilitarBotao('email_motoboy')" type="button" id="button-addon5" data-mdb-ripple-color="dark">
                            Alterar
                        </button>

                    </div>

                    <label class="form-label" style="text-align: left; margin-bottom: -1px;">Senha</label>

                    <div class="input-group mb-4 col-sm-12">
        
                        <input type="password" class="form-control" id="senha_motoboy" name="senhaMotoboyAlt" placeholder="**********" value="" required>
                            
                        <button class="btn btn-primary" onclick="desabilitarBotao('senha_motoboy')" type="button" id="button-addon6" data-mdb-ripple-color="dark">
                            Alterar
                        </button>

                    </div>

                </div>
                
                <button type="submit" class="w-100 btn btn-primary btn-rounded btn-lg mb-4">Atualizar Perfil</button>

            </div>
                
        </div>
        
    </form>

</div>