<div class="landing-page">
    
    <div class="container">

        <div class="row" style="margin-top: 3rem; margin-bottom: 15rem;">

            <div class="col"></div>

            <div class="col">

                <div class="col-lg-4" id="fundoLoginCliente">

                    <h1 style="margin-top: -0.5rem; margin-bottom: 2.5rem;">

                        <center>

                            <b>

                                Login Cliente

                            </b>

                        </center>

                    </h1>


                    <form id="formLoginCliente" >

                        <div class="form-outline mb-3">

                            <input type="email" id="loginName" name="email_cliente" class="form-control" placeholder="Ex.: carlos@gmail.com" required>

                            <label class="form-label" for="loginName" style="margin-left: 0px;">Email</label>

                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">

                            <input type="password" id="senhaCliente" name="senha_cliente" class="form-control" required>

                            <label class="form-label" for="senhaCliente" style="margin-left: 0px;">Senha</label>

                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">

                            <div class="col d-flex justify-content">
                                
                                <!-- Checkbox -->
                                <div class="form-check gap-5">

                                    <input type="checkbox" class="form-check-input" id="loginCheck4">

                                    <label class="form-check-label" for="loginCheck4">Mostrar senha</label>

                                </div>

                            </div>

                        </div>
                        
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4" id="btnEntrarLogin">Entrar</button>

                        <!-- Register buttons -->
                        <div class="text-center">

                            <p class="mb-1">Não possui login? <a href="<?= site_url('Geral/cadastroCliente')?>">Cadastre-se</a></p>

                        </div>

                    </form>
                
                </div>
                
            </div>

            <div class="col"></div>

        </div>

    </div>

</div>