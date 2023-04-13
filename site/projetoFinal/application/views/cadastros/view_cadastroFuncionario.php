<div class="landing-page">
    
    <div class="container">

        <div class="row" style="margin-top: 1rem;">

            <div class="col"></div>

            <div class="col">

                <div class="col-lg-4" id="fundoCadastroMotoboy">

                    <h1 style="margin-top: -0.5rem; margin-bottom: 2.5rem;">

                        <center>

                            <b>

                                Cadastro Motoboy

                            </b>

                        </center>

                    </h1>

                    <form id="formCadastroFuncionario" >
                        
                        <div class="form-outline mb-3">
                            
                            <input type="text" id="registerName" name="cad_nome_completo" class="form-control" required>
                            
                            <label class="form-label" for="registerName" style="margin-left: 0px;">Nome Completo</label>
                        
                        </div>

                        <div class="input-group mb-3">
                                
                            <input type="text" id="cpf" name="cad_cpf" class="form-control" placeholder="Ex.: 999.999.999-99" required style="background-color: transparent;">
                            
                            <button class="btn btn-primary dropdown-toggle" type="button" value="CPF" id="selecionarDados" data-mdb-toggle="dropdown" aria-expanded="false" id="btnSelecionarDados">
                                CPF
                            </button>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="selecionarDados">

                                <li> 
                                    <a class="dropdown-item" href="#" id="selectCPFCliente">
                                        CPF
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="#" id="selectCNPJCliente"> 
                                        CNPJ
                                    </a>
                                </li>        
                    
                            </ul>
                            
                        </div>
                            
                        <div class="form-outline mb-3">

                            <input type="text" id="telefone"  name="cad_telefone" class="form-control cel-sp-mask"  placeholder="Ex.: (00) 00000-0000" required>
                        
                            <label class="form-label" for="telefone" style="margin-left: 0px;">Telefone</label>
                        
                        </div>
                        
                        <!-- Username input -->
                        <div class="form-outline mb-3">
                            
                            <input type="text" id="registerplaca" name="cad_placa" class="form-control" required>
                                
                            <label class="form-label" for="registerplaca" style="margin-left: 0px;">Placa do Veículo</label>

                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-3">
                            
                            <input type="email" id="email" name="cad_email" class="form-control" placeholder="Ex.: carlos@gmail.com" required>
                            
                            <label class="form-label" for="email" style="margin-left: 0px;">Email</label>
                        
                        </div>

                        <div class="row g-3">
                                
                            <div class="col">

                                <div class="form-outline mb-3">
                                
                                    <input type="password" id="senhaFuncionario2" name="cad_senha" class="form-control" required>
                                
                                    <label class="form-label" for="senhaFuncionario2" style="margin-left: 0px;">Senha</label>
                                    
                                </div>
                            </div>

                            <div class="col">

                                <div class="form-outline mb-3">

                                    <input type="password" id="senhaFuncionario3" class="form-control" required>
                                    
                                    <label class="form-label" for="senhaFuncionario3" style="margin-left: 0px;">Repita a senha</label>
                                
                                </div>
                                
                            </div>

                        </div>

                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content mb-3">
                            
                            <input type="checkbox" class="form-check-input" id="loginCheck3">
                            
                            <label class="form-check-label" for="loginCheck3">Mostrar Senha</label>

                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-3">Cadastrar</button>

                        <div class="text-center">

                            <p class="mb-1" style="margin-top: 10px;font-size:16px;">Já possui uma conta? <a href="<?= site_url('Geral/loginFuncionario')?>">Fazer Login</a></p>

                        </div>

                    </form>
                
                </div>

            </div>

            <div class="col"></div>

        </div>

    </div>

</div>