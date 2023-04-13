<div class="containerAreaCliente" style="margin-top: 2rem;">

    <div class="bgExibirAtivosClientes">

        <h4 class="mb-4" style="color: #494949;">
            Serviços abertos
        </h4>

        <center>
            
            <div id="msgSemServico">

                <div class="d-flex align-items-center justify-content-center" id="textoServicoNaoEncontrado">

                    <h4 style="vertical-align: baseline; color: #707070;">Nenhum serviço ativo</h4>

                </div>

            </div>

            <div class="accordion" style="width: 100%;" id="servicoAberto">
                    
                <div class='accordion-item pedidoAccordionCliente' id="pedidoAccordionCliente"></div>

            </div>

        </center>

    </div>

    <h4 class="mt-5 md-3">
        Escolha uma opção abaixo
    </h4>

    <div class="owl-carousel owl-carousel1 owl-theme">

        <div class="item mb-4 mt-3">

            <div class="card" style="width: 18rem;" id="cardPacotes">

                <div class="card-body">
                    
                    <h4 class="card-title mt-3" style="color: #494949;">Abaixo de 1KG</h4>

                    <p class="card-text">
                                                    
                        Ideal para pequenos itens

                    </p>

                    <hr>

                    <div class="row">

                        <button type="button" class="btn btn-primary btnAreaClienteCard" data-mdb-toggle="modal" data-mdb-target="#menuCliente" onclick="alterarPeso(1)">
                            Selecionar
                        </button>

                    </div>

                </div>

            </div>
            
        </div>

        <div class="item mb-4 mt-3">

            <div class="card" style="width: 18rem;" id="cardPacotes">

                <div class="card-body">
                    
                    <h6 class="card-subtitle mb-2" style="color: green;">Popular</h6>

                    <h4 class="card-title" style="color: #494949;">De 1KG a 3KG</h4>

                    <p class="card-text">
                                                    
                        Ideal para objetos médios

                    </p>

                    <hr>

                    <div class="row">

                        <button type="button" class="btn btn-primary btnAreaClienteCard" data-mdb-toggle="modal" data-mdb-target="#menuCliente" onclick="alterarPeso(2)">
                            Selecionar
                        </button>

                    </div>

                </div>

            </div>
            
        </div>

        <div class="item mb-4 mt-3">

            <div class="card" style="width: 18rem;" id="cardPacotes">

                <div class="card-body">
                    
                    <h4 class="card-title mt-3" style="color: #494949;">De 3KG a 8KG</h4>

                    <p class="card-text">
                                                    
                        Ideal para objetos pesados

                    </p>

                    <hr>

                    <div class="row">

                        <button type="button" class="btn btn-primary btnAreaClienteCard" data-mdb-toggle="modal" data-mdb-target="#menuCliente" onclick="alterarPeso(3)">
                            Selecionar
                        </button>

                    </div>

                </div>

            </div>
            
        </div>

        <div class="item mb-4 mt-3">

            <div class="card" style="width: 18rem;" id="cardPacotes">

                <div class="card-body">
                    
                    <h4 class="card-title mt-3" style="color: #494949;">De 8KG a 12KG</h4>

                    <p class="card-text">
                                                    
                        Ideal para pesos elevados

                    </p>

                    <hr>

                    <div class="row">

                        <button type="button" class="btn btn-primary btnAreaClienteCard" data-mdb-toggle="modal" data-mdb-target="#menuCliente" onclick="alterarPeso(4)">
                            Selecionar
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>