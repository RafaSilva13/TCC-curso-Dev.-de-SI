<div class="containerAreaMotoboy" style="margin-top: 3rem;">

    <div class="exibirServicoMb" id="exibirServicoMb">

        <div class="mapaExibicaoMb" id="mapMb"></div>

            <div class="d-flex justify-content-center">

                <div class="mx-2" id="btnConfirmarRetiradaMb">
                    
                    <button type="button" class="btn btn-success" onclick="confirmarRetiradaMb()">Confirmar retirada</button>

                </div>

                <div class="mx-2" id="btnConfirmarFinalizarServico">

                    <button type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#confirmarFinalizarServico">Finalizar</button>

                </div>

                <div class="mx-2" id="btnCancelarServicoAreaMb">

                    <button type="button" class="btn btn-dark" data-mdb-toggle="modal" data-mdb-target="#confirmarCancelarServicoMb">Cancelar</button>

                </div>

                <div class="mx-2">

                    <button type="button" class="btn btn-info" data-mdb-toggle="modal" data-mdb-target="#modalInfoServicoMb">Info</button>

                </div>

            </div>


    </div>

    <div id="exibicaoServicosMb" class="exibicaoServicosMb">

        <h3>
            <b>Serviços</b>
        </h3>

        <div id="msgSemServicoAreaMb">
            
            <center>
        
                <h2 style="margin-top: 5rem;">Nenhum serviço encontrado</h2>
        
            </center>
            
        </div>
        
        <div class="d-flex justify-content-center">

            <div class="owl-carousel owl-carousel2 owl-theme mb-6">

                <?php foreach ($servicos as $n => $value) { ?>
                    
                    <div class="item mb-4 mt-4">

                        <div class="card" id="cardPacotes">

                            <div class="card-body">

                                <p class="card-text">

                                    <img src="<?=base_url('assets/img/localizacao.png');?>" id="iconCardMb">

                                    <center>

                                        <p>
                                            <i class="fas fa-people-arrows" style="margin-right: 0.3rem;"></i>
                                            <b>Distancia: </b> <span><?php echo $value->distancia; ?> Km</span>
                                            
                                            <br>

                                            <i class="far fa-clock" style="margin-right: 0.1rem; margin-top: 0.5rem;"></i>
                                            <b>Tempo Aproximado: </b> <span><?php echo ceil($value->tempo); ?> minutos</span> 

                                            <br>

                                            <i class="fas fa-weight-hanging" style="margin-right: 0.1rem; margin-top: 0.5rem;"></i>
                                            <b>Peso: </b> <span><?php

                                                switch ($value->valor_peso) {

                                                    case 3:
                                                        echo "Abaixo de 1KG";
                                                        break;
                                        
                                                    case 5:
                                                        echo "De 1KG a 3KG";
                                                        break;
                                        
                                                    case 9:
                                                        echo "De 3KG a 8KG";
                                                        break;
                                        
                                                    case 12:
                                                        echo "De 8KG a 12KG";
                                                        break;
                                                
                                                    default:
                                                        break;
                                                };
                                            ?></span> 

                                        </p>

                                    </center>
                                
                                    <center>

                                        <p style="font-size: 21px; margin-bottom: 0.2rem;">

                                            <b>R$ <span><?php echo number_format((($value->valor_frete)*0.7), 2, ',', ' ');?></span></b> 

                                        </p>

                                    </center>
                                
                                </p>

                                <div class="row">

                                    <button type="button" class="btn btn-success" value="<?php echo $value->id_servicos?>" onclick="aceitarCorrida(this.value)">
                                        Aceitar
                                    </button>

                                </div>

                            </div>

                        </div>
                        
                    </div>

                <?php } ?>

            </div>
            
        </div>
        
    </div>

</div>

