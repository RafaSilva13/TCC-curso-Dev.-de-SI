<center>
    <!-- Modal confirmação sair  -->
    <div class="modal fade" id="exampleCentralModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" data-gtm-vis-recent-on-screen-2340190_1302="399562" data-gtm-vis-first-on-screen-2340190_1302="399562" data-gtm-vis-total-visible-time-2340190_1302="100" data-gtm-vis-has-fired-2340190_1302="1">

        <div class="modal-dialog modal-sm">

            <div class="modal-content text-center" style="width: 300px;">

                <div class="modal-header bg-primary text-white d-flex justify-content-center">

                    <h6 class="modal-title" id="exampleModalLabel">Confirmação</h6>

                </div>
                
                <div class="modal-body">
                    
                    <b>
                        Deseja realmente sair?
                    </b>
                
                </div>

                <div class="modal-footer d-flex justify-content-center">

                    <button type="button" class="btn btn-outline-primary" data-mdb-dismiss="modal">Não</button>

                    <button type="button" class="btn btn-primary" data-mdb-dismiss="modal" id="btnSair">Sim</button>

                </div>

            </div>

        </div>

    </div>

</center>

<center>
    <!-- Modal confirmação cancelar  -->
    <div class="modal fade" id="confirmarCancelarServico" tabindex="-1" aria-labelledby="exampleModalLabel5" aria-modal="true" role="dialog" data-gtm-vis-recent-on-screen-2340190_1302="399562" data-gtm-vis-first-on-screen-2340190_1302="399562" data-gtm-vis-total-visible-time-2340190_1302="100" data-gtm-vis-has-fired-2340190_1302="1">

        <div class="modal-dialog modal-sm">

            <div class="modal-content text-center" style="width: 300px;">

                <div class="modal-header bg-danger text-white d-flex justify-content-center">

                    <h6 class="modal-title" id="exampleModalLabel5">Confirmação</h6>

                </div>

                <div class="modal-body">
                    
                    <b>
                        Deseja cancelar o serviço?
                    </b>
                
                </div>

                <div class="modal-footer d-flex justify-content-center">

                    <button type="button" class="btn btn-outline-danger" data-mdb-dismiss="modal">Não</button>

                    <button type="button" class="btn btn-danger" data-mdb-dismiss="modal" id="btnCancelarServicoCliente" value="" onclick="cancelarServicoCliente(this.value)">Sim</button>

                </div>

            </div>

        </div>

    </div>
    
</center>

<center>
    <!-- Modal confirmação finalizar servico  -->
    <div class="modal fade" id="confirmarFinalizarServico" tabindex="-1" aria-labelledby="exampleModalLabel5" aria-modal="true" role="dialog" data-gtm-vis-recent-on-screen-2340190_1302="399562" data-gtm-vis-first-on-screen-2340190_1302="399562" data-gtm-vis-total-visible-time-2340190_1302="100" data-gtm-vis-has-fired-2340190_1302="1">

        <div class="modal-dialog modal-sm">

            <div class="modal-content text-center" style="width: 300px;">

                <div class="modal-header bg-danger text-white d-flex justify-content-center">

                    <h6 class="modal-title" id="exampleModalLabel5">Confirmação</h6>

                </div>

                <div class="modal-body">
                    
                    <b>
                        Finalizar entrega?
                    </b>
                
                </div>

                <div class="modal-footer d-flex justify-content-center">

                    <button type="button" class="btn btn-outline-danger" data-mdb-dismiss="modal">Não</button>

                    <button type="button" class="btn btn-danger" data-mdb-dismiss="modal" id="btnFinalizarEntregaMotoboy">Sim</button>

                </div>

            </div>

        </div>

    </div>
    
</center>

<div class="modal" tabindex="-1" id="modalInfoServicoMb">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">informações do pedido</h5>

                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            
            </div>
            
            <div class="modal-body" style="padding-left: 2rem; padding-right: 2rem;">

                <p class="card-text">
                    
                    <p style="margin-bottom: 1rem;">
                        <i class="fas fa-location-dot" style="margin-right: 0.5rem;"></i>
                        <b>Endereço Retirada: </b> <span id="infoEnderecoRetiradaServicoMotoboy">--</span>
                    </p>

                    <p style="margin-bottom: 1rem;">
                        <i class="fas fa-location-dot" style="margin-right: 0.5rem;"></i> 
                        <b>Endereço Destino: </b> <span id="infoEnderecoDestinoServicoMotoboy">--</span> 
                    </p>

                    <p>
                        <i class="fas fa-people-arrows" style="margin-right: 0.4rem;"></i>
                        <b>Distancia: </b> <span id="infoDistanciaServicoMotoboy">-- </span> Km
                    </p>

                    <p>

                        <i class="far fa-clock" style="margin-right: 0.4rem;"></i>
                        <b>Tempo: </b> <span id="infoTempoServicoMotoboy">-- </span> minutos

                    </p>

                    <p>

                        <i class="fas fa-weight-hanging" style="margin-right: 0.4rem;"></i>
                        <b>Peso: </b> <span id="infoPesoServicoMotoboy">--</span> 

                    </p>
                
                    <p style="font-size: 17px;">
                   
                        <i class="fas fa-dollar-sign" style="margin-right: 0.8rem;"></i>
                        <b>Valor: </b>R$ <span id="infoValorCorridaServicoMotoboy"> -,--</span>

                    </p>

                </p>
                
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Fechar</button>

            </div>

        </div>

    </div>

</div>

<center>
    <!-- Modal confirmação cancelar servico motoboy -->
    <div class="modal fade" id="confirmarCancelarServicoMb" tabindex="-1" aria-labelledby="exampleModalLabel5" aria-modal="true" role="dialog" data-gtm-vis-recent-on-screen-2340190_1302="399562" data-gtm-vis-first-on-screen-2340190_1302="399562" data-gtm-vis-total-visible-time-2340190_1302="100" data-gtm-vis-has-fired-2340190_1302="1">

        <div class="modal-dialog modal-sm">

            <div class="modal-content text-center" style="width: 300px;">

                <div class="modal-header bg-dark text-white d-flex justify-content-center">

                    <h6 class="modal-title" id="exampleModalLabel5">Confirmação</h6>

                </div>

                <div class="modal-body">
                    
                    <b>
                        Cancelar entrega?
                    </b>
                
                </div>

                <div class="modal-footer d-flex justify-content-center">

                    <button type="button" class="btn btn-outline-dark" data-mdb-dismiss="modal">Não</button>

                    <button type="button" class="btn btn-dark" data-mdb-dismiss="modal" onclick="cancelarEntregaMb()">Sim</button>

                </div>

            </div>

        </div>

    </div>
    
</center>

<!-- Modal mapa e endereco  -->
<div class="modal fade" id="menuCliente" tabindex="-1" aria-hidden="true" >

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    Adicionar Local

                </h5>

                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

                <div class="mapa">

                    <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 100%">
                        
                        <div id="map"></div>

                        <div class="row" id="localizacao">

                            <p><b>Tempo:</b> <span id="campoTempo">--</span></p>

                            <hr>  
                        
                            <div class="col-lg-6 col-md-12 col-sm-12" style="margin-top: 1rem;">

                                <h5 style="margin-bottom: 1.5rem;">Endereço 1</h5>
                                
                                <form id="formEndereco1">

                                    <div class="form-outline mb-3">
        
                                        <div class="row">

                                            <div class="col">

                                                <div class="form-outline">

                                                    <input type="text" id="cep1" class="form-control cep-mask" placeholder="Ex.: 00000-000" maxlength="9" required/>
                                                    <label class="form-label" for="cep1">CEP</label>
                                                        
                                                </div>

                                            </div>

                                            <div class="col"></div>

                                        </div>

                                    </div>

                                    <div class="form-outline mb-3">

                                        <div class="row">

                                            <div class="col-7">

                                                <div class="form-outline">

                                                    <input type="text" id="txtCidadeUm" class="form-control" placeholder="Ex.: Juiz de Fora" required/>
                                                    <label class="form-label" for="txtCidadeUm">Cidade</label>
                                                        
                                                </div>

                                            </div>

                                            <div class="col" style="padding-left: 0;"> 

                                                <div class="form-outline"> 

                                                    <input type="text" id="txtEstadoUm" class="form-control" placeholder="Ex.: MG" required/>
                                                    <label class="form-label" for="txtEstadoUm">Estado</label>
                            
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-outline mb-3" style="padding-right: 0;">

                                        <input type="text" id="txtBairroUm" class="form-control" placeholder="Ex.: R. José Calil Ahouag" required/>
                                        <label class="form-label" for="txtBairroUm">Bairro</label>
                                                    
                                    </div>

                                    <div class="form-outline mb-3">

                                        <div class="row">

                                            <div class="col-9">

                                                <div class="form-outline">

                                                    <input type="text" id="txtRuaUm" class="form-control" placeholder="Ex.: R. José Calil Ahouag" required/>
                                                    <label class="form-label" for="txtRuaUm">Rua</label>
                                                            
                                                </div>

                                            </div>

                                            <div class="col" style="padding-left: 0;">

                                                <div class="form-outline">

                                                    <input type="text" id="txtNumeroUm" class="form-control" placeholder="Ex.: 121" required/>
                                                    <label class="form-label" for="txtNumeroUm">N°</label>

                                                </div>

                                            </div>

                                        </div>

                                    </div> 

                                </form>       

                            </div>

                            <div class="col-lg-6 col-md-12 col-sm-12" style="margin-top: 1rem;">

                                <h5 style="margin-bottom: 1.5rem;">Endereço 2</h5>
                                
                                <form id="formEndereco2">

                                    <div class="form-outline mb-3">

                                        <div class="row"> 

                                            <div class="col">
                                                
                                                <div class="form-outline">
                                                    
                                                    <input type="text" id="cep2" class="form-control cep-mask" placeholder="Ex.: 00000-000" maxlength="9" required/>
                                                    <label class="form-label" for="cep2">CEP</label>
                                                    
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="col"></div>
                                            
                                        </div>

                                    </div>

                                    <div class="form-outline mb-3">

                                        <div class="row">

                                            <div class="col-7">

                                                <div class="form-outline">

                                                    <input type="text" id="txtCidadeDois" class="form-control" placeholder="Ex.: Juiz de Fora" required/>
                                                    <label class="form-label" for="txtCidadeDois">Cidade</label>
                                                        
                                                </div>

                                            </div>

                                            <div class="col" style="padding-left: 0;"> 

                                                <div class="form-outline"> 

                                                    <input type="text" id="txtEstadoDois" class="form-control" placeholder="Ex.: MG" required/>
                                                    <label class="form-label" for="txtEstadoDois">Estado</label>
                            
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-outline mb-3">

                                        <input type="text" id="txtBairroDois" class="form-control" placeholder="Ex.: R. José Calil Ahouag" required/>
                                        <label class="form-label" for="txtBairroDois">Bairro</label>
                                                    
                                    </div>

                                    <div class="form-outline mb-3">

                                        <div class="row">

                                            <div class="col-9">

                                                <div class="form-outline" style="padding-right: 0;">

                                                    <input type="text" id="txtRuaDois" class="form-control" placeholder="Ex.: R. José Calil Ahouag" required/>
                                                    <label class="form-label" for="txtRuaDois">Rua</label>
                                                            
                                                </div>

                                            </div>

                                            <div class="col" style="padding-left: 0;">

                                                <div class="form-outline">

                                                    <input type="text" id="txtNumeroDois" class="form-control" placeholder="Ex.: 121" required/>
                                                    <label class="form-label" for="txtNumeroDois">N°</label>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>
                    
                    </div>
                    
                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Fechar</button>                                
                <button class="btn btn-success" id="btnVerificar">Verificar informações</button>
                <button class="btn btn-primary btnContinuarMapa" id="btnContinuarMapa" data-mdb-toggle="modal" data-mdb-target="#menuCliente2">Continuar</button>

            </div>

        </div>

    </div>

</div>

<!-- Modal medotos de pagamento  -->
<div class="modal fade" id="menuCliente2" tabindex="-1" aria-hidden="true" >

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                </h5>

                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">
                
                <div class="row" id="areaPagamento">
                    
                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12" id="area1">

                        <h5 style="margin-bottom: 1rem; margin-left: 2px;">        

                            Métodos de Pagamento

                        </h5>

                        <div class="accordion" id="accordionExample">
                            
                            <div class="accordion-item metodoPagamentoAcordion" style="padding: 1rem;" data-mdb-toggle="modal" data-mdb-target="#modalCartao" id="opCartaoCredito">

                                <div class="row">

                                    <div class="col-11">Cartão de Crédito</div>

                                    <div class="col-1" id="simboloConfimMetPag1">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    
                                </div>

                            </div>

                            <div class="accordion-item metodoPagamentoAcordion" style="padding: 1rem;" data-mdb-toggle="modal" data-mdb-target="#modalPix">
                            
                                <div class="row">

                                    <div class="col-11">Pix</div>

                                    <div class="col-1" id="simboloConfimMetPag2">
                                        <i class="fas fa-check"></i>
                                    </div>

                                </div>
                                                        
                            </div>

                        </div>

                    </div>

                    <div class="vr" id="barraAreaPagamento" style="height: 25rem; padding: inherit;"></div>
                        
                    <hr id="infoDetalhesLinha1">

                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 " id="area2">

                        <h5 style="width: 200px;">

                            <b>

                                Detalhes 

                            </b>

                        </h5>

                        <div class="row" id="infoDetalhesPagamentos">
                                
                            <div class="col-xl-8 col-lg-11 col-md-10 col-sm-10">

                                <b>
                                    
                                    Valor por peso: 
            
                                </b>

                                <br>
                                
                                <b>
                                    
                                    Outras taxas: 
            
                                </b>
                                    
                                <br>
                                
                            </div>

                            <div class="col-xl-4 col-lg-1 col-md-2 col-sm-2" style="padding: 0;">

                                <span style="text-align: right;">R$ <span id="campoValorPeso">0,00</span></span>

                                <br>

                                <span style="text-align: right;" >R$ <span id="campoTaxas">0,00</span></span>
                                
                                <br>

                            </div>
                        
                        </div>

                        <hr id="infoDetalhesLinha2">

                        <div class="row" id="infoDetalhesValorFinal">
                        
                            <div class="col-xl-8 col-lg-11 col-md-10 col-sm-10">

                                <b>Valor Total: </b> 
                                
                            </div>  
                            
                            <div class="col-xl-4 col-lg-1 col-md-2 col-sm-2" style="padding: 0;">
                                
                                <span style="text-align: right;">R$ <span id="campoValorTotal">0,00</span></span> 
                            
                            </div> 

                        </div> 
                    
                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-toggle="modal" data-mdb-target="#menuCliente" id="btnCancelarServico">Voltar</button>
                <button type="button" class="btn btn-primary btnConcluirPedido" id="btnCriarServico">Confirmar</button>
            </div>

        </div>

    </div>

</div>

<!-- Modal confirmação excluir  -->
<!-- <div class="modal fade" id="exampleModalExcluir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" data-gtm-vis-recent-on-screen-2340190_1302="399562" data-gtm-vis-first-on-screen-2340190_1302="399562" data-gtm-vis-total-visible-time-2340190_1302="100" data-gtm-vis-has-fired-2340190_1302="1">

    <div class="modal-dialog modal-sm">

        <div class="modal-content text-center">

            <div class="modal-header bg-primary text-white d-flex justify-content-center">

                <h5 class="modal-title" id="exampleModalLabel">Deseja realmente excluir?</h5>

            </div>

            <div class="modal-footer d-flex justify-content-center">

                <button type="button" class="btn btn-outline-primary" data-mdb-dismiss="modal">Não</button>

                <button type="button" class="btn btn-primary" data-mdb-dismiss="modal" id="btnExcluirCliente">Sim</button>

            </div>

        </div>

    </div>

</div> -->