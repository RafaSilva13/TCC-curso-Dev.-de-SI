<div class="landing-page">
    
    <div class="container">

        <div class="row" style="margin-top: 3rem; margin-bottom: 15rem;">

            <div class="col"></div>

            <div class="col">

                <div class="col-lg-4" id="fundoLoginMotoboy">

                    <h1 style="margin-top: -0.5rem; margin-bottom: 2.5rem;">

                        <center>

                            <b>

                            Login Motoboy

                            </b>

                        </center>

                    </h1>


                    <form id="formLoginFuncionario">

                        <div class="form-outline mb-3">

                            <input type="email" id="loginName" name="email_motoboy" class="form-control" placeholder="Ex.: carlos@gmail.com" required>

                            <label class="form-label" for="loginName" style="margin-left: 0px;">Email</label>

                            <div class="invalid-feedback">Campo vazio!</div>

                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">

                            <input type="password" id="senha" name="senha_motoboy" class="form-control" required>

                            <label class="form-label" for="senha" style="margin-left: 0px;">Senha</label>

                            <div class="invalid-feedback">Campo vazio!</div>

                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">

                            <div class="col d-flex justify-content">
                                
                                <!-- Checkbox -->
                                <div class="form-check gap-5">

                                    <input type="checkbox" class="form-check-input" id="loginCheck1">

                                    <label class="form-check-label" for="loginCheck1">Mostrar senha</label>

                                </div>

                            </div>

                        </div>
                        
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4" id="btnEntrarLogin">Entrar</button>

                        <!-- Register buttons -->
                        <div class="text-center">

                            <p class="mb-1">Não possui login? <a href="<?= site_url('Geral/cadastroFuncionario')?>">Cadastre-se</a></p>

                        </div>

                    </form>
                
                </div>
                
            </div>

            <div class="col"></div>

        </div>

    </div>

</div>