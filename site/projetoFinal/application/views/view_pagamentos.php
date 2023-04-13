<div class="modal fade" id="modalPix" tabindex="-1" aria-labelledby="exampleModalLabel" data-gtm-vis-first-on-screen-2340190_1302="18380" data-gtm-vis-total-visible-time-2340190_1302="100" data-gtm-vis-has-fired-2340190_1302="1" aria-modal="true" role="dialog">
    
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Pix</h5>

                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>

            </div>
                
            <div class="modal-body">

                <div class="text-center">

                    <center>

                        <div id="qrcode"></div>

                        <div class="col-7 areaCopiarCodigoPix">

                            <p style="text-align: left;">

                                <small>

                                    <b>

                                        Copiar Código

                                    </b>

                                </small>

                            </p>
                            
                            <div class="input-group groupCopiarPix">
                                
                                <input type="text" class="form-control txtInputPix" id="txtInputPix" value="5q35naa9f8j0fanfaklmf0" disabled/>

                                <button type="button" class="btn btn-outline-primary copy" id="btnCopiarPix">

                                    <i class="fas fa-copy trailing"></i>
                                    
                                </button>

                            </div>
                            
                        </div>

                    </center>

                </div>
                
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-outline-primary" data-mdb-toggle="modal" data-mdb-target="#menuCliente2">Voltar</button>
                <button type="button" class="btn btn-primary" id="btnConcluirPix" data-mdb-toggle="modal" data-mdb-target="#menuCliente2">Concluir</button>

            </div>

        </div>

    </div>

</div>


<div class="modal fade" id="modalCartao" tabindex="-1" aria-labelledby="exampleModalLabel" data-gtm-vis-first-on-screen-2340190_1302="18380" data-gtm-vis-total-visible-time-2340190_1302="100" data-gtm-vis-has-fired-2340190_1302="1" aria-modal="true" role="dialog">
    
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Cartões</h5>

                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>

            </div>
                
            <div class="modal-body">

                <div class="accordion" id="accordionCartoes">
                    
                

                </div>

                <div id="msgVazio">

                    <center>

                        <h3>
                            Nenhum cartão encontrado!
                        </h3>

                    </center>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-mdb-toggle="modal" data-mdb-target="#menuCliente2">Voltar</button>

                <button type="button" class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#modalAddCartao">Adicionar</button>

                <button type="button" class="btn btn-primary" id="verificarCartao">Verificar</button>
                
                <button type="button" class="btn btn-primary" id="selecionarCartao" data-mdb-toggle="modal" data-mdb-target="#menuCliente2">Concluir</button>

            </div>

        </div>

    </div>

</div>

<div class="modal fade" id="modalAddCartao" tabindex="-1" aria-labelledby="exampleModalLabel" data-gtm-vis-first-on-screen-2340190_1302="18380" data-gtm-vis-total-visible-time-2340190_1302="100" data-gtm-vis-has-fired-2340190_1302="1" aria-modal="true" role="dialog">
    
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Adicionar Cartão</h5>

                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>

            </div>
                
            <form id="formAddCartao">

                <div class="modal-body" style="padding: 0;">

                    <div class="cartao">

                        <main class="main-container">

                            <div class="scene">

                                <!-- Card -->
                                <div class="cardCartao" style="background: url('<?=base_url('assets/img/bgCard.png');?>') no-repeat right top fixed;">

                                    <!-- Card front -->
                                    <div class="card__front">

                                        <img src="<?=base_url('assets/img/visa-logo.svg');?>" class="card__logo">

                                        <div class="card__number number" style="padding-right: 0px;">

                                            <div class="number-group number-group--0" id="numeroCartaoCard" maxlength="19">0000 0000 0000 0000</div>

                                        </div>

                                        <div class="card__details">

                                            <div class="card__holder">

                                                <span class="card__holder_title">Nome</span>

                                                <span class="card__holder__name" id="nomeCardCartao">Carlos Eduardo</span>
                                                
                                            </div>
                                        
                                            <div class="card__expiration">

                                                <span class="card__expiration__title">Válidade</span>

                                                <span class="card__expiration__date" id="validadeCardCartao">11/28</span>

                                            </div>
                                            
                                        </div>

                                    </div>

                                    <!-- Card back -->
                                    <div class="card__back">

                                        <div class="card__stripe"></div>

                                        <div class="card__signature">

                                            <span class="card__cvv">CVV</span>
                                            <span class="card__cvv-number" id="cvvCardCartao">213</span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </main>

                    </div>

                    <div class="container containerFormCartao" style="padding-left: 4rem; padding-right: 4rem;">

                        <h5 class="mb-3">Dados do Cartão</h5>

                        <div class="row mb-3">

                            <div class="col">

                                <div class="form-outline">

                                    <input type="text" id="nomeCartao" name="nomeCartao" class="form-control" required/>
                                    <label class="form-label" for="nomeCartao">Nome</label>

                                </div>

                            </div>
                            
                        </div>

                        <div class="row mb-3">

                            <div class="col-8">

                                <div class="form-outline">

                                    <input type="text" id="numeroCartao" name="numeroCartao" class="form-control" maxlength="19" required/>
                                    <label class="form-label" for="numeroCartao">Número</label>

                                </div>

                            </div>

                            <div class="col-4">
                        
                                <div class="dropdown">

                                    <input type="hidden" name="bandeiraCartao" value="visa" id="valueDropDown">

                                    <button class="btn btn-dark dropdown-toggle" type="button" value="visa" id="selecionarCard" style="width: 120px; margin-left: -11px; --mdb-btn-padding-x: 0.8rem; height: 35px;" data-mdb-toggle="dropdown" aria-expanded="false">
                                        Visa
                                    </button>
                                                                    
                                    <ul class="dropdown-menu dropdown-menu" aria-labelledby="selecionarCard">

                                        <li> 
                                            <a class="dropdown-item" href="#" id="selectCardVisa">
                                                Visa
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="#" id="selectCardMasterCard"> 
                                                MasterCard
                                            </a>
                                        </li>           
                                            
                                    </ul>
                                            
                                </div>

                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col" style="margin-right: -15px;">

                                <div class="form-outline">

                                    <input type="text" id="validadeCartao" name="validadeCartao" class="form-control" maxlength="5" required/>
                                    <label class="form-label" for="validadeCartao">Validade</label>

                                </div>

                            </div>

                            <div class="col mb-3">

                                <div class="form-outline">

                                    <input type="text" id="cvvCartao" name="cvvCartao" class="form-control" maxlength="3" required/>
                                    <label class="form-label" for="cvvCartao">CVV</label>
                                    
                                </div>

                            </div>

                        </div>

                    </div>
                                        
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-outline-primary" data-mdb-toggle="modal" data-mdb-target="#modalCartao">Voltar</button>
                    <button type="submit" class="btn btn-primary" id="adicionarCartao">Adicionar</button>
                
                </div>

            </form>

        </div>

    </div>

</div>