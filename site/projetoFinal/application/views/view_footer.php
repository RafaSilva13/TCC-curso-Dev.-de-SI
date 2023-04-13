    
    <!-- Jquery -->
    <script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>

    <!-- LocalWeb -->
    <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>

    <script>
        $("#cardAdmClientes").click(function (){
            window.location.href = "<?= site_url('Administrador/ordenarCliente/nome_cliente/asc/clientes')?>";
        });

        $("#cardAdmMotoBoys").click(function (){
            window.location.href = "<?= site_url('Administrador/ordenarMotoboy/nome_motoboy/asc/motoboy')?>";
        });

        $("#cardAdmServicos").click(function (){
            window.location.href = "<?= site_url('Administrador/ordenarServico/id_servicos/asc/servicos')?>";
        });

        $("#cardAdmDadosMensais").click(function (){
            window.location.href = "<?= site_url('Administrador/admDadosMensais')?>";
        });

        $("#cardAdmValoresMensais").click(function (){
            window.location.href = "<?= site_url('Administrador/admValoresMensais')?>";
        });

        $("#cardAdmSuporte").click(function (){
            window.location.href = "<?= site_url('Administrador/admSuporte')?>";
        });
    </script>   

    <script type="text/javascript">
        var map;
        var endereco1;
        var endereco2;
        var tempo;
        var distancia;
        var peso;

        $("#btnVerificar").click(function() {
    
            if ($("#cep1").val() == "" || $("#txtRuaUm").val() == "" || $("#txtNumeroUm").val() == "" || $("#txtBairroUm").val() == "" || $("#txtCidadeUm").val() == "" || $("#txtEstadoUm").val() == "" || $("#cep2").val() == "" || $("#txtRuaDois").val() == "" || $("#txtNumeroDois").val() == "" || $("#txtBairroDois").val() == "" || $("#txtCidadeDois").val() == "" || $("#txtEstadoDois").val() == "")
            {
                $(".campoIncom").toast('show'); 
            }
            else
            {
                var texto = $("#cep1").val();
                var texto2 = $("#cep2").val();
                
                var RegExp = /\d{5}-\d{3}/;

                if (texto.match(RegExp) != null && texto2.match(RegExp) != null)
                {        
                    var cep1 = $("#cep1").val();
                    var cep2 = $("#cep2").val();
                
                    $.ajax({
                        url: "https://viacep.com.br/ws/"+cep1+"/json/?data=?",
                        type: 'GET',
                        success: function(data) {
                            endereco1 = $("#txtRuaUm").val() + ", " + $("#txtNumeroUm").val() + " - " + $("#txtBairroUm").val() + " , " + $("#txtCidadeUm").val() + " - " + $("#txtEstadoUm").val();
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                        async: false
                    });
                    
                    $.ajax({
                        url: "https://viacep.com.br/ws/"+cep2+"/json/?data=?",
                        type: 'GET',
                        success: function(data) {
                            endereco2 = $("#txtRuaDois").val() + ", " + $("#txtDoiseroDois").val() + " - " + $("#txtBairroDois").val() + " , " + $("#txtCidadeDois").val() + " - " + $("#txtEstadoDois").val();
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                        async: false
                    });

                    <?php if(isset($_SESSION['user'])) { ?>

                        retorno = initMap(endereco1, endereco2);

                    <?php } else {?>

                        retorno = "InvalidValueError";
                        
                    <?php } ?>

                    if (retorno == "InvalidValueError") 
                    {

                        $('.btnContinuarMapa').attr('disabled', 'disabled');
                        
                        alert("Endereço não encontrado!");

                    }
                    else
                    {

                        $('.btnContinuarMapa').removeAttr("disabled");

                    }

                };

            }

        });

        <?php 
        if(isset($_SESSION['user'])) {

            if($_SESSION['user'][1] == "clientes") {?>
                
                function initMap(endereco1, endereco2) {
                        
                    const directionsService = new google.maps.DirectionsService();
                    const directionsRenderer = new google.maps.DirectionsRenderer({
                        // draggable: true
                    });

                    var mapOptions = {
                        center:{ lat: -18.885549175004556, lng: -44.023773991189564},
                        zoom: 4,
                        disableDefaultUI: true,
                        mapId: "a660b0427c33390",
                    }    

                    const map = new google.maps.Map(document.getElementById('map'), mapOptions);

                    var icone = {
                        icon: '<?= base_url('assets/img/location.png');?>',
                    };

                    var pOptions = {
                        strokeColor: "#fff",
                        strokeWeight: 5,
                    };

                    var options = {
                        markerOptions : icone,
                        polylineOptions: pOptions,
                        InfoWindow: true,
                    }
                    
                    directionsRenderer.setMap(map);

                    directionsRenderer.addListener('directions_changed', () => {
                
                        console.log(directionsRenderer);

                        console.log(directionsRenderer["directions"]["routes"][0]["legs"][0]);
                        tempo = (directionsRenderer["directions"]["routes"][0]["legs"][0]["duration"]['value'])/(60);
                        distancia = (directionsRenderer["directions"]["routes"][0]["legs"][0]["distance"]['value'])/(1000);
                    
                        $("#campoTempo").text(Math.ceil((directionsRenderer["directions"]["routes"][0]["legs"][0]["duration"]['value'])/(60)) + " minutos");
                    
                    });

                    directionsService.route({
                        origin: endereco1,
                        destination: endereco2,
                        travelMode: google.maps.TravelMode.DRIVING
                    }).then(response => {
                        directionsRenderer.setDirections(response);
                        directionsRenderer.setOptions(options);
                    }).catch(err => {
                        return err['name'];
                    });
                };

                <?php 
            } 
        }?>

        function alterarPeso(opcao)
        {
            peso = opcao;
        }

        $("#btnContinuarMapa").click(function (){

            var enderecos = [
                $("#cep1").val(),
                $("#txtCidadeUm").val(),
                $("#txtEstadoUm").val(),
                $("#txtBairroUm").val(),
                $("#txtRuaUm").val(),
                $("#txtNumeroUm").val(),
                $("#cep2").val(),
                $("#txtCidadeDois").val(),
                $("#txtEstadoDois").val(),
                $("#txtBairroDois").val(),
                $("#txtRuaDois").val(),
                $("#txtNumeroDois").val()
            ];
             
            $.ajax({
                url: "<?php echo site_url("Cliente/calcularServico");?>",
                type: 'POST',
                data: { dadosTrajeto:enderecos, tempo:tempo, distancia:distancia , peso:peso },
                success: function(data) {

                    var dat = JSON.parse(data);
                    
                    $("#campoValorPeso").text((parseFloat(dat["valor_peso"]).toFixed(2)).toString().replace(".", ","));
                    $("#campoTaxas").text(((parseFloat(dat["valor_distancia"]) + parseFloat(dat["valor_tempo"])).toFixed(2)).toString().replace(".", ","));
                    $("#campoValorTotal").text((parseFloat(dat["valor_frete"]).toFixed(2)).toString().replace(".", ","));

                }
            });
            
        });
 
        $("#btnCriarServico").click(function (){

            var enderecos = [
                $("#cep1").val(),
                $("#txtCidadeUm").val(),
                $("#txtEstadoUm").val(),
                $("#txtBairroUm").val(),
                $("#txtRuaUm").val(),
                $("#txtNumeroUm").val(),
                $("#cep2").val(),
                $("#txtCidadeDois").val(),
                $("#txtEstadoDois").val(),
                $("#txtBairroDois").val(),
                $("#txtRuaDois").val(),
                $("#txtNumeroDois").val()
            ];

            $.ajax({
                url: "<?php echo site_url("Cliente/criarServico");?>",
                type: 'POST',
                data: { dadosTrajeto:enderecos, tempo:tempo, distancia:distancia , peso:peso },
                success: function(data) {

                    var dat = JSON.parse(data);
                    
                },
                cache: false
            });

            setTimeout(function() {
                 
                window.location.href = "<?= site_url('Geral/areaCliente')?>";

            }, 1200);

        });      
    </script>

    <script>
        var enderecoMb1;
        var enderecoMb2;

        <?php if(isset($_SESSION["user"])) { 

                if($_SESSION["user"][1] == "clientes") { ?>
                    
                    setInterval(function() {
                        
                        verificarServicosCliente();
                    
                    }, 1200);
        <?php 
            }    
        }?>

        function verificarServicosCliente () {

            $.ajax({
                url: "<?php echo site_url("Cliente/retornarServicos")?>",
                type: 'POST',
                success: function(datas) {

                    data = JSON.parse(datas);

                    console.log(data);
                    
                    if(data != "0") {

                        $("#msgSemServico").css("display", "none");

                        if(data[3] == "3") {
                            
                            $("#btnCancelarServicoCliente").val(data[0]);

                            var divInfoSerivicoCliente = $('#pedidoAccordionCliente');

                            divInfoSerivicoCliente.empty(); 

                            divInfoSerivicoCliente.append("<div class='row' style='padding-right: 0.5rem;'><div class='col-lg-8 col-md-12 d-flex' style='padding-right: 0; margin-top: 18px; margin-left: 0.5rem; margin-right: -0.5rem; padding-right: 1rem;'><div style='padding-left: 15px;'><div class='d-flex align-items-top justify-content-start endExibirServicoCliente'><p class='card-text' style='text-align: left;'><i class='fas fa-location-dot' style='margin-right: 0.5rem;'></i><b>Endereço Retirada: </b> <span id='enderecoRetiradaAreaCliente'>" + data[1] + "</span></p></div><div class='d-flex align-items-top justify-content-start endExibirServicoCliente'><p class='card-text' style='text-align: left;'><i class='fas fa-location-dot' style='margin-right: 0.5rem;'></i><b>Endereço Destino: </b> <span id='enderecoDestinoAreaCliente'>" + data[2] + "</span></p></div><div class='d-flex align-items-top justify-content-start' style='height: 2rem;'><p class='card-text'><i class='fas fa-weight-hanging' style='margin-right: 0.4rem;'></i><b>Peso: </b> <span id='mostragemPesoAreaCliente'> " + data[5] + " </span></p></div><div class='d-flex align-items-top justify-content-start' style='height: 2rem;'><p class='card-text'><i class='fas fa-dollar-sign' style='margin-right: 0.8rem;'></i><b>Valor: </b>R$<span id='mostragemValorServicoAreaCliente'> " + (parseFloat(data[6]).toFixed(2)).toString().replace(".", ",") + " </span></p></div></div></div><div class='col-lg-4 col-md-12' style='margin-right: 0;'><div class='d-flex align-items-center' style='height: 10rem;' id='areabotaoCardServicoCliente'><div class='d-block'><b>Status: </b><span class='badge badge-success rounded-pill d-inline' id='badgeAcaminhoDestino' style='margin-left: 8px; margin-bottom: 2rem;'>A caminho do destino</span><br><span id='areaInfoClienteNomeMotoBoy'><b>Nome Motoboy: </b><span id='infoInfoClienteNomeMotoBoy'>" + data[7] + "</span></span></div></div> </div></div>");

                            $(".btnAreaClienteCard").attr('disabled', 'disabled');
                        
                        } 
                        else if(data[3] == "2") {

                            $("#btnCancelarServicoCliente").val(data[0]);

                            var divInfoSerivicoCliente = $('#pedidoAccordionCliente');

                            divInfoSerivicoCliente.empty(); 

                            divInfoSerivicoCliente.append("<div class='row' style='padding-right: 0.5rem;'><div class='col-lg-8 col-md-12 d-flex' style='padding-right: 0; margin-top: 18px; margin-left: 0.5rem; margin-right: -0.5rem; padding-right: 1rem;'><div style='padding-left: 15px;'><div class='d-flex align-items-top justify-content-start endExibirServicoCliente'><p class='card-text' style='text-align: left;'><i class='fas fa-location-dot' style='margin-right: 0.5rem;'></i><b>Endereço Retirada: </b> <span id='enderecoRetiradaAreaCliente'>" + data[1] + "</span></p></div><div class='d-flex align-items-top justify-content-start endExibirServicoCliente'><p class='card-text' style='text-align: left;'><i class='fas fa-location-dot' style='margin-right: 0.5rem;'></i><b>Endereço Destino: </b> <span id='enderecoDestinoAreaCliente'>" + data[2] + "</span></p></div><div class='d-flex align-items-top justify-content-start' style='height: 2rem;'><p class='card-text'><i class='fas fa-weight-hanging' style='margin-right: 0.4rem;'></i><b>Peso: </b> <span id='mostragemPesoAreaCliente'> " + data[5] + " </span></p></div><div class='d-flex align-items-top justify-content-start' style='height: 2rem;'><p class='card-text'><i class='fas fa-dollar-sign' style='margin-right: 0.8rem;'></i><b>Valor: </b>R$<span id='mostragemValorServicoAreaCliente'> " + (parseFloat(data[6]).toFixed(2)).toString().replace(".", ",") + " </span></p></div></div></div><div class='col-lg-4 col-md-12' style='margin-right: 0;'><div class='d-flex align-items-center' style='height: 10rem;' id='areabotaoCardServicoCliente'><div class='d-block'><b>Status: </b><span class='badge badge-success rounded-pill d-inline' id='badgeAcaminhoRetirada' style='margin-left: 8px; margin-bottom: 2rem;'>A caminho da retirada</span><br></div></div> </div></div>");

                            $(".btnAreaClienteCard").attr('disabled', 'disabled');
                        
                        } 
                        else if (data[3] == "1")
                        {
                            
                            $("#btnCancelarServicoCliente").val(data[0]);

                            var divInfoSerivicoCliente = $('#pedidoAccordionCliente');

                            divInfoSerivicoCliente.empty(); 

                            divInfoSerivicoCliente.append("<div class='row' style='padding-right: 0.5rem;'><div class='col-lg-8 col-md-12 d-flex' style='padding-right: 0; margin-top: 18px; margin-left: 0.5rem; margin-right: -0.5rem; padding-right: 1rem;'><div style='padding-left: 15px;'><div class='d-flex align-items-top justify-content-start endExibirServicoCliente'><p class='card-text' style='text-align: left;'><i class='fas fa-location-dot' style='margin-right: 0.5rem;'></i><b>Endereço Retirada: </b> <span id='enderecoRetiradaAreaCliente'>" + data[1] + "</span></p></div><div class='d-flex align-items-top justify-content-start endExibirServicoCliente'><p class='card-text' style='text-align: left;'><i class='fas fa-location-dot' style='margin-right: 0.5rem;'></i><b>Endereço Destino: </b> <span id='enderecoDestinoAreaCliente'>" + data[2] + "</span></p></div><div class='d-flex align-items-top justify-content-start' style='height: 2rem;'><p class='card-text'><i class='fas fa-weight-hanging' style='margin-right: 0.4rem;'></i><b>Peso: </b> <span id='mostragemPesoAreaCliente'> " + data[5] + " </span></p></div><div class='d-flex align-items-top justify-content-start' style='height: 2rem;'><p class='card-text'><i class='fas fa-dollar-sign' style='margin-right: 0.8rem;'></i><b>Valor: </b>R$<span id='mostragemValorServicoAreaCliente'> " + (parseFloat(data[6]).toFixed(2)).toString().replace(".", ",") + " </span></p></div></div></div><div class='col-lg-4 col-md-12' style='margin-right: 0;'><div class='d-flex align-items-center' style='height: 10rem;' id='areabotaoCardServicoCliente'><div class='d-block'><b>Status: </b><span class='badge badge-success rounded-pill d-inline' id='badgeAcaminhoRetirada' style='margin-left: 8px; margin-bottom: 2rem;'>A caminho da retirada</span><span class='badge badge-success rounded-pill d-inline' id='badgeAcaminhoDestino' style='margin-left: 8px; margin-bottom: 2rem;'>A caminho do destino</span><span class='badge badge-warning rounded-pill d-inline' id='badgeAguardando' style='margin-left: 8px; margin-bottom: 2rem;'>Buscando Motoboys</span><br><span id='areaInfoClienteNomeMotoBoy'><b>Nome Motoboy: </b><span id='infoInfoClienteNomeMotoBoy'>" + data[7] + "</span></span><button type='button' class='btn btn-danger' id='btnChamaModalCancelarServicoCliente' style='margin-top: 0.8rem;' data-mdb-toggle='modal' data-mdb-target='#confirmarCancelarServico'>Cancelar Serviço</button></div></div> </div></div>");

                            $(".btnAreaClienteCard").attr('disabled', 'disabled');

                        }  
                        else
                        {
                            $("#msgSemServico").css("display", "block");
                            $("#servicoAberto").css("display", "none");

                            $(".btnAreaClienteCard").removeAttr("disabled");
                        
                        }

                    } 
                    else
                    {
                        $("#msgSemServico").css("display", "block");
                        $("#servicoAberto").css("display", "none");
                    }
                }
            });

        }

        $(function() {

            $("#btnFinalizarEntregaMotoboy").click(function () {
                $.ajax({
                    url: "<?php echo site_url("Motoboy/finalizarServico");?>",
                    type: 'POST',
                    success: function(data) {
                        if(data == "1")
                        {
                            window.location.href = "<?= site_url('Motoboy/areaMotoboy')?>";
                        }
                    },
                    cache: false
                });
            });

            $("#formAtualizarClientes").submit(function(e){
                e.preventDefault();
                
                $('#nome_cliente').removeAttr("disabled");
                $('#cpf_cliente').removeAttr("disabled");
                $('#usuario_cliente').removeAttr("disabled");
                $('#telefone_cliente').removeAttr("disabled");
                $('#email_cliente').removeAttr("disabled");

                var filename = "imagemPadrao";
                
                var fileInput = document.getElementById('arquivo_para_upload');

                if((fileInput.files).length != 0) {

                    filename = fileInput.files[0].name;
                }

                var formData = new FormData(this);
                formData.append("nome", filename);
               
                $.ajax({
                    url: "<?= site_url("Cliente/atualizarcliente")?>",
                    type: 'POST',
                    data: formData,
                    success: function(data){
                        if(data == '1')
                        {
                            $.ajax({
                                url: "<?php echo site_url("Cliente/retornarCliente")?>",
                                type: 'POST',
                                success: function(){
                                },
                                cache: false,
                                contentType: false,
                                processData: false
                            });

                            setTimeout(function() {

                                window.location.href = "<?php echo site_url('Geral/verificacao')?>";

                            }, 1000);
                        }
                        else 
                        {
                            $(".imgErroToast").toast('show');
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false

                });

            });

            $("#formAtualizarFuncionario").submit(function(e){
                e.preventDefault();
                
                $('#nome_motoboy').removeAttr("disabled");
                $('#cpf_motoboy').removeAttr("disabled");
                $('#placa_motoboy').removeAttr("disabled");
                $('#telefone_motoboy').removeAttr("disabled");
                $('#email_motoboy').removeAttr("disabled");

                var filename = "imagemPadrao";
                
                var fileInput = document.getElementById('arquivo_para_upload2');

                if((fileInput.files).length != 0) {

                    filename = fileInput.files[0].name;
                }

                var formData = new FormData(this);
                formData.append("nome", filename);
               
                $.ajax({
                    url: "<?php echo site_url("Funcionario/atualizarFuncionario")?>",
                    type: 'POST',
                    data: formData,
                    success: function(data){
                        if(data == '1')
                        {
                            $.ajax({
                                url: "<?php echo site_url("Funcionario/retornarFuncionario")?>",
                                type: 'POST',
                                success: function(){
                                },
                                cache: false,
                                contentType: false,
                                processData: false
                            });

                            setTimeout(function() {

                                window.location.href = "<?php echo site_url('Geral/verificacao')?>";
                            
                            }, 1000);
                        }
                        else 
                        {
                            $(".imgErroToast").toast('show');
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false

                });

            });

        });
        
        function aceitarCorrida(codigo)
        {
            $.ajax({
                url: "<?php echo site_url("Motoboy/aceitarServico");?>",
                type: 'POST',
                data: {codigoServico : codigo},
                success: function(data) {

                    if(data == "1")
                    {
                        window.location.href = "<?= site_url('Motoboy/areaMotoboy')?>";
                    }
                },
                cache: false
            });
        }

        <?php if(isset($_SESSION["user"])) { 

            if($_SESSION["user"][1] == "motoboy") {?>
                
                verificarCorridasMb();
                    
                initMap();
                
        <?php 
            } 
        }?>

        function verificarCorridasMb()
        {
            $.ajax({
                url: "<?= site_url("Motoboy/verificarCorridasMb");?>",
                type: 'POST',
                success: function(data) {
                    dat = JSON.parse(data);

                    if(dat.length != 0)
                    {
                        $("#exibicaoServicosMb").hide();
                        $("#exibirServicoMb").show();

                        if(dat[0].status != 1)
                        {
                            $("#btnCancelarServicoAreaMb").hide();
                            $("#btnConfirmarRetiradaMb").hide(); 
                        }
                        else
                        {
                            $("#btnCancelarServicoAreaMb").show();
                            $("#btnConfirmarRetiradaMb").show(); 
                            $("#btnConfirmarFinalizarServico").hide();
                        }
                    }
                    else 
                    {
                        $("#exibicaoServicosMb").show();
                        $("#exibirServicoMb").hide();
                    }

                    switch (parseFloat(dat[0].valor_peso)) {

                        case 3.00:

                            pesoAlt = "Abaixo de 1KG";

                            break;

                        case 5.00:

                            pesoAlt = "De 1KG a 3KG";

                            break;

                        case 9.00:

                            pesoAlt = "De 3KG a 8KG";

                            break;

                        case 12.00:

                            pesoAlt = "De 8KG a 12KG";

                            break;
                    }

                    $("#infoEnderecoRetiradaServicoMotoboy").text(dat[0].endereco_retirada);
                    $("#infoEnderecoDestinoServicoMotoboy").text(dat[0].endereco_destino);
                    $("#infoDistanciaServicoMotoboy").text(dat[0].distancia);
                    $("#infoTempoServicoMotoboy").text(Math.round(dat[0].tempo));
                    $("#infoPesoServicoMotoboy").text(pesoAlt);
                    $("#infoValorCorridaServicoMotoboy").text((parseFloat((dat[0].valor_frete)*0.7).toFixed(2)).toString().replace(".", ","));

                    enderecoMb1 = dat[0].endereco_retirada;
                    enderecoMb2 = dat[0].endereco_destino;
                }, 
                cache: false
            });

        }

        <?php 
        if(isset($_SESSION['user'])){

            if($_SESSION['user'][1] == "motoboy") {?>
                
                function initMap() {
                    
                    const directionsService = new google.maps.DirectionsService()
                    const directionsRenderer = new google.maps.DirectionsRenderer({
                        // draggable: false
                    });

                    var mapOptions = {
                        center:{ lat: -18.885549175004556, lng: -44.023773991189564},
                        zoom: 4,
                        disableDefaultUI: true,
                        mapId: "a660b0427c33390",
                    }

                    const map = new google.maps.Map(document.getElementById('mapMb'), mapOptions);
                    

                    var icone = {
                        icon: '<?= base_url('assets/img/location.png');?>',
                    };

                    var pOptions = {
                        strokeColor: "#fff",
                        strokeWeight: 5,
                    };

                    var options = {
                        markerOptions : icone,
                        polylineOptions: pOptions,
                        InfoWindow: true,
                    }
                    
                    directionsRenderer.setMap(map);

                    directionsRenderer.addListener('directions_changed', () => {
                        console.log(directionsRenderer);
                    });

                    directionsService.route({
                        origin: enderecoMb1,
                        destination: enderecoMb2,
                        travelMode: google.maps.TravelMode.DRIVING
                    }).then(response => {
                        directionsRenderer.setDirections(response);
                        directionsRenderer.setOptions(options);
                    }).catch(err => {
                        return err['name'];
                    });
                };
                <?php 
            } 
        }?>

        function confirmarRetiradaMb(){
            $.ajax({
                url: "<?php echo site_url("Motoboy/confirmarRetiradaServico");?>",
                type: 'POST',
                success: function(data) {
                    
                    if(data == "1")
                    {
                        $("#btnCancelarServicoAreaMb").hide();
                        $("#btnConfirmarRetiradaMb").hide();

                        window.location.href = "<?= site_url('Motoboy/areaMotoboy')?>";
                    }
                },
                cache: false
            });
        }

        function cancelarEntregaMb(){
            $.ajax({
                url: "<?php echo site_url("Motoboy/cancelarEntregaMb");?>",
                type: 'POST',
                success: function(data) {
                    
                    if(data == "1")
                    {
                        window.location.href = "<?= site_url('Motoboy/areaMotoboy')?>";
                    }
                },
                cache: false
            });
        }

        function cancelarServicoCliente(cod) {
            $.ajax({
                url: "<?php  echo site_url("Cliente/cancelarServicos");?>",
                type: 'POST',
                data: {codigoServico : cod},
                success: function(data) {
                    if(data == "1")
                    {
                        window.location.href = "<?= site_url('Geral/areaCliente')?>";
                    }

                },
                cache: false
            });
        }
    </script>

    <script type="text/javascript">
        var tipocartao;
        var numeroDoCartaoSelec;

        $(function() {

            const input = document.getElementById("cep1");

            input.addEventListener("keyup", formatarCep);

            function formatarCep(e){

                var v = e.target.value.replace(/\D/g,"")                

                v = v.replace(/^(\d{5})(\d)/,"$1-$2") 

                e.target.value = v;

            }

            const input2 = document.getElementById("cep2");

                input2.addEventListener("keyup", formatarCep2);

                function formatarCep2(e2){

                var v2 = e2.target.value.replace(/\D/g,"")                

                v2 = v2.replace(/^(\d{5})(\d)/,"$1-$2") 

                e2.target.value = v2;

            }

            const input3 = document.getElementById("validadeCartao");

            input3.addEventListener("keyup", formatarData);

            function formatarData(e3){

                var v3 = e3.target.value.replace(/\D/g,"")

                v3 = v3.replace(/^(\d{2})(\d)/, "$1/$2")

                e3.target.value = v3;

            }
            
            const input4 = document.getElementById("numeroCartao");

            input4.addEventListener("keyup", formatarNumero);

            function formatarNumero(e4){

                var v4 = e4.target.value.replace(/\D/g,"");

                v4 = v4.replace(/(\d{4})(\d)/,"$1 $2")
                v4 = v4.replace(/(\d{4})(\d)/,"$1 $2")
                v4 = v4.replace(/(\d{4})(\d)/,"$1 $2")
                v4 = v4.replace(/(\d{4})(\d)/,"$1 $2")

                e4.target.value = v4;

            }

            $("#cep1").keyup(function() {

                var texto = $("#cep1").val();

                var RegExp = /\d{5}-\d{3}/;

                if (texto.match(RegExp) != null)
                {  
                    $.ajax({
                        url: "https://viacep.com.br/ws/"+texto+"/json/?data=?",
                        type: 'GET',
                        success: function(data) {

                            $("#txtCidadeUm").val(data['localidade']);
                            $("#txtEstadoUm").val(data['uf']);
                            $("#txtBairroUm").val(data['bairro']);
                            $("#txtRuaUm").val(data['logradouro']);

                            document.querySelectorAll('.form-outline').forEach((formOutline) => {
                                new mdb.Input(formOutline).update();
                            });

                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                        async: false
                    });
                }
            });

            $("#cep2").keyup(function() {

                var texto = $("#cep2").val();

                var RegExp = /\d{5}-\d{3}/;

                if (texto.match(RegExp) != null)
                {  
                    $.ajax({
                        url: "https://viacep.com.br/ws/"+texto+"/json/?data=?",
                        type: 'GET',
                        success: function(data) {
                            
                            $("#txtCidadeDois").val(data['localidade']);
                            $("#txtEstadoDois").val(data['uf']);
                            $("#txtBairroDois").val(data['bairro']);
                            $("#txtRuaDois").val(data['logradouro'])
                            
                            document.querySelectorAll('.form-outline').forEach((formOutline) => {
                                new mdb.Input(formOutline).update();
                            });
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                        async: false
                    });
                }
            });

            $("#formVerificaCodCliente").submit(function(e){
                e.preventDefault();
                                    
                var formData = new FormData(this);
                
                $.ajax({
                    url: "<?php echo site_url("Cliente/verifica_codigo_cliente")?>",
                    type: 'POST',
                    data: formData,
                    success:  function(data){
                        if(data == 'incorreto')
                        {
                            $(".coderror").toast('show');
                        }
                        else
                        {
                            $('#areaMenu').show();
                            
                            $.ajax({
                                url: "<?php echo site_url("Cliente/retornarCliente")?>",
                                type: 'POST',
                                success: function(){
                                },
                                cache: false,
                                contentType: false,
                                processData: false
                            });
                            
                            window.location.href = "<?= site_url('Geral/areaCliente')?>";

                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });

            });
            
            $("#formVerificaCodFuncionario").submit(function(e){
                e.preventDefault();
                                    
                var formData = new FormData(this);
                
                $.ajax({
                    url: "<?php echo site_url("Funcionario/verifica_codigo_funcionario")?>",
                    type: 'POST',
                    data: formData,
                    success:  function(data){
                        if(data == 'incorreto')
                        {
                            $(".coderror").toast('show');
                        }
                        else
                        {
                            $('#areaMenu').show();

                            window.location.href = "<?= site_url('Motoboy/areaMotoboy')?>";

                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });

                $.ajax({
                    url: "<?php echo site_url("Funcionario/retornarFuncionario")?>",
                    type: 'POST',
                    success: function(){
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });

            $("#formLoginCliente").submit(function(e){
                e.preventDefault();
                                    
                var formData = new FormData(this);
                
                $.ajax({
                    url: "<?php echo site_url("Cliente/login")?>",
                    type: 'POST',
                    data: formData,
                    success:  function(data){
                        if(data == 'SenhaUserIn')
                        {
                            $(".erroToast").toast('show');
                        }
                        else if (data == "naoVerf")
                        {
                            $(".naoverificado").toast('show');

                            email = "email_cliente";

                            window.location.href = "<?= site_url('Geral/verifica_cadastro/')?>" + email + "";
                        }
                        else
                        {
                            $('#areaMenu').show();

                            $("#msgSemServico").css("display", "block");
                            $("#servicoAberto").css("display", "none");

                            $.ajax({
                                url: "<?php echo site_url("Cliente/retornarCliente")?>",
                                type: 'POST',
                                success: function(){
                                },
                                cache: false,
                                contentType: false,
                                processData: false
                            });

                            window.location.href = "<?= site_url('Geral/areaCliente')?>";

                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });

            $("#formLoginAdministrador").submit(function(e){
                e.preventDefault();
                                    
                var formData = new FormData(this);
                
                $.ajax({
                    url: "<?php echo site_url("Administrador/login")?>",
                    type: 'POST',
                    data: formData,
                    success:  function(data){
                        if(data == 'SenhaUserIn')
                        {
                            $(".erroToast").toast('show');
                        }
                        else
                        {
                            window.location.href = "<?= site_url('Geral/administrador')?>";
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });

            $("#formCadastroCliente").submit(function(e){
                e.preventDefault();

                if($("#senhaCliente2").val() == $("#senhaCliente3").val()) {

                    var formData = new FormData(this);

                    $.ajax({
                        url: "<?= site_url("Cliente/cadastro")?>",
                        type: 'POST',
                        data: formData,
                        success: function(data){
                            if(data == '1')
                            {
                                $(".cadastroToast").toast('show');

                                $("#registerName").val("");
                                $("#cpf").val("");
                                $("#telefone").val("");
                                $("#registerUsername").val("");
                                $("#email").val();
                                $("#senhaCliente2").val("");
                                $("#senhaCliente3").val("");

                                $.ajax({
                                    url: "<?php echo site_url("Cliente/retornarCliente")?>",
                                    type: 'POST',
                                    success: function(){
                                    },
                                    cache: false,
                                    contentType: false,
                                    processData: false
                                });

                                setInterval(function() {
                                    var email_cliente = $("#email").val();
                                    window.location.href = "<?= site_url('Geral/verifica_cadastro_cliente/')?>" + email_cliente + "";
                                }, 1200);

                            }
                            else
                            {
                                $(".cadErroToast").toast('show');
                            }
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    }); 
                }
                else
                {
                    $(".senhasDif").toast("show");
                }
            });
            
            $("#formCadastroFuncionario").submit(function(e){
                e.preventDefault();

                var formData = new FormData(this);

                if($("#senhaFuncionario2").val() == $("#senhaFuncionario3").val()) {

                    $.ajax({
                        url: "<?php echo site_url("Funcionario/cadastro")?>",
                        type: 'POST',
                        data: formData,
                        success: function(data){
                            if(data == '1')
                            {
                                $(".cadastroToast").toast('show');

                                $("#registerName").val("");
                                $("#cpf").val("");
                                $("#telefone").val("");
                                $("#registerplaca").val("");
                                $("#email").val();
                                $("#senhaFuncionario2").val("");
                                $("#senhaFuncionario3").val("");

                                $.ajax({
                                    url: "<?php echo site_url("Funcionario/retornarFuncionario")?>",
                                    type: 'POST',
                                    success: function(){
                                    },
                                    cache: false,
                                    contentType: false,
                                    processData: false
                                });

                                setInterval(function() {
                                    var email_motoboy = $("#email").val();
                                    window.location.href = "<?= site_url('Geral/verifica_cadastro_funcionario/')?>" + email_motoboy + "";
                                }, 1200);

                            }
                            else
                            {
                                $(".cadErroToast").toast('show');
                            }
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                }
                else
                {
                    $(".senhasDif").toast("show");
                }
            });

            $("#formLoginFuncionario").submit(function(e){
                e.preventDefault();
                
                var formData = new FormData(this);
                
                $.ajax({
                    url: "<?php echo site_url("Funcionario/login")?>",
                    type: 'POST',
                    data: formData,
                    success:  function(data){
                        if(data == 'SenhaUserIn')
                        {
                            $(".erroToast").toast('show');
                        }
                        else if (data == "naoVerf")
                        {
                            $(".naoverificado").toast('show');

                            email = "email_motoboy";

                            window.location.href = "<?= site_url('Geral/verifica_cadastro_funcionario/')?>" + email + "";
                        }
                        else
                        {
                            $('#areaMenu').show();

                            $.ajax({
                                url: "<?php echo site_url("Funcionario/retornarFuncionario")?>",
                                type: 'POST',
                                success: function(){
                                },
                                cache: false,
                                contentType: false,
                                processData: false
                            });

                            window.location.href = "<?= site_url('Motoboy/areaMotoboy')?>";

                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });

            <?php
        
            if(isset($_SESSION['user'])) {

                if($_SESSION['user'][1] == "clientes") { ?>

                    $('#areaMenu').show();

                <?php }
                
                else if($_SESSION['user'][1] == "motoboy") { ?>

                    $('#areaMenu').show();

                <?php }
                
                else if($_SESSION['user'][1] == "administrador") { ?>
                    
                    $('#areaMenu').show();
                    $('#op1menu').hide();
                    $('#op2menu').hide();

                <?php } 

            } else { ?>

                $('#areaMenu').hide();

            <?php } ?>

            $('#btnSair').click(function(){
                $.ajax({
                    url: "<?php echo site_url("Geral/sair")?>",
                    type: 'POST',
                    success: function(){
                        console.log('Saida efetuada!');
                        location.reload(true);
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                }); 
            });

            $("#numeroCartao").keyup(function() {

                numero = $("#numeroCartao").val();

                if(numero != "")
                {    
                    $("#numeroCartaoCard").text(numero);
                }
                else 
                {
                    $("#numeroCartaoCard").text("0000 0000 0000 0000");
                }

            });

            $("#nomeCartao").keyup(function() {

                nomeCard = $("#nomeCartao").val();

                if(nomeCard != "")
                {  
                    $("#nomeCardCartao").text(nomeCard);
                }
                else 
                {
                    $("#nomeCardCartao").text("Carlos Eduardo");
                }
            });
            
            $("#cvvCartao").focus(function() {

                const card = document.querySelector(".cardCartao");
    
                card.classList.add("is-flipped");
                
            });

            $("#cvvCartao").blur(function() {

                const card = document.querySelector(".cardCartao");

                card.classList.remove("is-flipped");

            });

            $("#cvvCartao").keyup(function() {
                
                cvvCard = $("#cvvCartao").val();

                if(cvvCard != "")
                {  
                    $("#cvvCardCartao").text(cvvCard);
                }
                else 
                {
                    $("#cvvCardCartao").text("213");
                }
            });
           
            $("#validadeCartao").keyup(function() {
                
                validadeCard = $("#validadeCartao").val();

                if(validadeCard != "")
                {  
                    $("#validadeCardCartao").text(validadeCard);
                }
                else 
                {
                    $("#validadeCardCartao").text("11/28");
                }
            });

            $("#opCartaoCredito").click(function () {

                if(numeroDoCartaoSelec != undefined)
                {
                    $('#' + numeroDoCartaoSelec).attr("checked", "checked");
                    $('#' + numeroDoCartaoSelec).prop('checked','checked');
                }

                $("#verificarCartao").css("display", "block");
                $("#selecionarCartao").css("display", "none");

                $.ajax({
                    url: "<?= site_url("Cliente/listarCartoes")?>",
                    type: 'POST',
                    success: function(data){
                        
                        dadosCard = JSON.parse(data);

                        if(dadosCard.length === 0)
                        {
                            $("#msgVazio").show();
                        }
                        else
                        {
                            $("#msgVazio").hide();

                        }

                        var divPai = $('#accordionCartoes');

                        divPai.empty(); 

                        dadosCard.forEach(function(dados, n) {

                            numeroParte1 = (dados.numero.substr(0,4));

                            numeroParte2 = (dados.numero.substr(15,19));

                            if(dados.bandeira == "visa")
                            {                                
                                tipocartao = "<?php echo base_url('assets/img/')?>" + "visa-10.svg";
                            }
                            
                            if (dados.bandeira == "mastercard")
                            {
                                tipocartao = "<?php echo base_url('assets/img/')?>" + "mc_symbol.svg";
                            }

                            divPai.append("<div class='accordion-item exibicaoCartao' id='idCard" + n + "'><div class='row' style='padding-right: 0.5rem;'><div class='col-10 d-flex' style='padding-right: 0;'><div class='form-check'><input class='form-check-input' type='radio' onclick='cartaoSelecionadoId("+n+")' name='cartaoSelecionado' id='idInputCard" + n + "' value='idInputCard" + n + "' id='flexCheckDefault' style='margin-top: 1rem; margin-right: 0.5rem;'/></div><img src='" + tipocartao + "' class='logoApresCard'><div style='margin-left: 10px;'><b><span>" + dados.nome_cartao + "</span><br><small>" + numeroParte1 + " **** **** " + numeroParte2 + "</small></b></div></div><div class='col-2' style='margin-right: 0; margin-top: 0.6rem;'><button type='button' class='btn btn-danger' onclick='removerCartao("+n+")'>X</button></div></div></div>");

                        });
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    async: false
                }); 
            });

            $("#adicionarCartao").click(function () {

                if($("#nomeCartao").val() != "" && $("#numeroCartao").val() != "" && $("#validadeCartao").val() != "" && $("#cvvCartao").val() != ""){

                    setTimeout(function() {

                        $("#nomeCartao").val("");
                        $("#numeroCartao").val("");
                        $("#validadeCartao").val("");
                        $("#cvvCartao").val("");

                        $("#validadeCardCartao").text("11/28");
                        $("#cvvCardCartao").text("213");
                        $("#nomeCardCartao").text("Carlos Eduardo");
                        $("#numeroCartaoCard").text("0000 0000 0000 0000");
                        
                        $('button#selecionarCard').text("Visa").attr({
                            title:"Visa"
                        });

                        $('#selecionarCard').val("visa");
                        $('#valueDropDown').val("visa");

                        $(".card__logo").attr('src', "<?=base_url('assets/img/visa-logo.svg');?>");

                        $.ajax({
                            url: "<?= site_url("Cliente/listarCartoes")?>",
                            type: 'POST',
                            success: function(data){
                                
                                dadosCard = JSON.parse(data);

                                if(dadosCard.length === 0)
                                {
                                    $("#msgVazio").show();
                                }
                                else
                                {
                                    $("#msgVazio").hide();

                                }

                                var divPai = $('#accordionCartoes');

                                divPai.empty(); 

                                dadosCard.forEach(function(dados, n) {

                                    numeroParte1 = (dados.numero.substr(0,4));

                                    numeroParte2 = (dados.numero.substr(15,19));
                                    
                                    if(dados.bandeira == "visa")
                                    {                                
                                        tipocartao = "<?php echo base_url('assets/img/')?>" + "visa-10.svg";
                                    }
                                    
                                    if (dados.bandeira == "mastercard")
                                    {
                                        tipocartao = "<?php echo base_url('assets/img/')?>" + "mc_symbol.svg";
                                    }

                                    divPai.append("<div class='accordion-item exibicaoCartao' id='idCard" + n + "'><div class='row' style='padding-right: 0.5rem;'><div class='col-10 d-flex' style='padding-right: 0;'><div class='form-check'><input class='form-check-input' type='radio' onclick='cartaoSelecionadoId("+n+")' name='cartaoSelecionado' id='idInputCard" + n + "' value='idInputCard" + n + "' id='flexCheckDefault' style='margin-top: 1rem; margin-right: 0.5rem;'/></div><img src='" + tipocartao + "' class='logoApresCard'><div style='margin-left: 10px;'><b><span>" + dados.nome_cartao + "</span><br><small>" + numeroParte1 + " **** **** " + numeroParte2 + "</small></b></div></div><div class='col-2' style='margin-right: 0; margin-top: 0.6rem;'><button type='button' class='btn btn-danger' onclick='removerCartao("+n+")'>X</button></div></div></div>");

                                });

                            },
                            cache: false,
                            contentType: false,
                            processData: false,
                            async: false
                        });
                    
                        $(".cartaoAdicionadoToast").toast('show');

                    }, 1200);
                    
                }
                else
                {
                    $(".campoIncom").toast('show');
                }

                }); 

                $("#selectCardVisa").click(function (){

                    $('button#selecionarCard').text("Visa").attr({
                        title:"Visa"
                    });

                    $('#selecionarCard').val("visa");
                    $('#valueDropDown').val("visa");

                    $(".card__logo").attr('src', "<?=base_url('assets/img/visa-logo.svg');?>");

                });

                $("#selectCardMasterCard").click(function (){

                    $('button#selecionarCard').text("MasterCard").attr({
                        title:"MasterCard"
                    });

                    $('#selecionarCard').val("mastercard");
                    $('#valueDropDown').val("mastercard");

                    $(".card__logo").attr('src', "<?=base_url('assets/img/mc_symbol.svg');?>");

                });

            $("#formAddCartao").submit(function (e){
                e.preventDefault();
                
                var formData = new FormData(this);
                
                if($("#nomeCartao").val() != "" && $("#numeroCartao").val() != "" && $("#validadeCartao").val() != "" && $("#cvvCartao").val() != ""){
                    
                    $.ajax({
                        url: "<?= site_url("Cliente/addCartao")?>",
                        type: 'POST',
                        data: formData,
                        success: function(data) {
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    }); 

                }

            });

        });
        
        $('#btnConcluirPix').click(function() {

            $('.btnConcluirPedido').removeAttr("disabled");

            $("#simboloConfimMetPag1").css("display", "none");

            $("#simboloConfimMetPag2").css("display", "block");

        });

        $('#verificarCartao').click(function() {

            if($('#accordionCartoes input[type="radio"]').is(':checked'))
            {
                $("#selecionarCartao").css("display", "block");
                $("#verificarCartao").css("display", "none");

                $(".cartaoVerificado").toast('show');
            }
            else
            {
                $(".selecionarCartaoErro").toast('show');
            }

        });

        $("#selecionarCartao").click(function (){

            $('.btnConcluirPedido').removeAttr("disabled");

            $("#simboloConfimMetPag2").css("display", "none");

            $("#simboloConfimMetPag1").css("display", "block");

        });

        $("#selectCPFCliente").click(function (){
            
            $("#cpf").val("");

            $('button#selecionarDados').text("CPF").attr({
                title:"CPF"
            });

            $('#selecionarCard').val("CPF");

            $("#cpf").mask("999.999.999-99");

            $('#cpf').attr({placeholder:"Ex.: 999.999.999-99"});

        });

        $("#selectCNPJCliente").click(function (){
            
            $("#cpf").val("");

            $('button#selecionarDados').text("CNPJ").attr({
                title:"CNPJ"
            });

            $('#selecionarCard').val("CNPJ");

            $("#cpf").mask("99.999.999/9999-99");

            $('#cpf').attr({placeholder:"Ex.: 99.999.999/9999-99"});
        });

        function desabilitarBotao(btn)
        {
            $("#" + btn).removeAttr("disabled");
        }

        function cartaoSelecionadoId(numeroDoCartao)
        {
            numeroDoCartaoSelec = numeroDoCartao;
        }

        function removerCartao(num) {

            $.ajax({
                url: "<?= site_url("Cliente/removerCartoes")?>",
                type: 'POST',
                data: { idCartao : num },
                success: function() {
                    $.ajax({
                        url: "<?= site_url("Cliente/listarCartoes")?>",
                        type: 'POST',
                        success: function(data){
                            
                            dadosCard = JSON.parse(data);
                            
                            var divPai = $('#accordionCartoes');
                            
                            divPai.empty(); 
                            
                            dadosCard.forEach(function(dados, n) {
                                
                                numeroParte1 = (dados.numero.substr(0,4));

                                numeroParte2 = (dados.numero.substr(15,19));

                                if(dados.bandeira == "visa")
                                {                                
                                    tipocartao = "<?php echo base_url('assets/img/')?>" + "visa-10.svg";
                                }
                                
                                if (dados.bandeira == "mastercard")
                                {
                                    tipocartao = "<?php echo base_url('assets/img/')?>" + "mc_symbol.svg";
                                }

                                divPai.append("<div class='accordion-item exibicaoCartao' id='idCard" + n + "'><div class='row' style='padding-right: 0.5rem;'><div class='col-10 d-flex' style='padding-right: 0;'><div class='form-check'><input class='form-check-input' type='radio' onclick='cartaoSelecionadoId("+n+")' name='cartaoSelecionado' id='idInputCard" + n + "' value='idInputCard" + n + "' id='flexCheckDefault' style='margin-top: 1rem; margin-right: 0.5rem;'/></div><img src='" + tipocartao + "' class='logoApresCard'><div style='margin-left: 10px;'><b><span>" + dados.nome_cartao + "</span><br><small>" + numeroParte1 + " **** **** " + numeroParte2 + "</small></b></div></div><div class='col-2' style='margin-right: 0; margin-top: 0.6rem;'><button type='button' class='btn btn-danger' onclick='removerCartao("+n+")'>X</button></div></div></div>");

                            });
                            
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                        async: false
                    }); 
                    
                    $(".cartaoRemovToast").toast('show');
                    
                },
                cache: false
            }); 
        };

        function excluirCliente(id_cliente){

            $.ajax({
                url: "<?php echo site_url("Administrador/excluirCliente")?>",
                type: 'POST',
                data: { id_cliente : id_cliente },
                success: function(){
                    location.reload(true);
                },
                
                cache: false
            }); 
        };
        
        function excluirMotoboy(id_motoboy){
            
            $.ajax({
                url: "<?php echo site_url("Administrador/excluirMotoboy")?>",
                type: 'POST',
                data: { id_motoboy : id_motoboy },
                success: function(){
                    location.reload(true);
                },
                
                cache: false
            }); 
        };

        function excluirServico(id_servicos){

            $.ajax({
                url: "<?php echo site_url("Administrador/excluirServico")?>",
                type: 'POST',
                data: { id_servicos : id_servicos },
                success: function(){
                    location.reload(true);
                },
    
                cache: false
            }); 
        };
        
    </script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 300,
            modifier: 1,
            slideShadows: false,
        },
        pagination: {
            el: ".swiper-pagination",
        },
        });
    </script>  

    <!-- Owl Carrousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        
        <?php  
            $tamanho = 1;
            $margem = 165;
            $loop = "false";

            if(isset($servicos)) {

                switch (sizeof($servicos)) {

                    case 0:
    
                        $tamanho = 0;
    
                        break;
    
                    case 1:
    
                        $tamanho = 1;
                        $margem = 165;
                        $loop = "false";
    
                        break;
    
                    case 2:
                        
                        $tamanho = 2;
                        $margem = -160;
                        $loop = "false";
    
                        break;
                    
                    default:
                        
                        $tamanho = 4;
                        $margem = 15;
                        $loop = "true";
    
                        break;
                }
            }
            
        ?>

        $('.owl-carousel2').owlCarousel({
            margin: 165,
            responsiveClass:true,
            nav: false,
            autoplay:true,
            autoplayTimeout:4000,
            dots: false,
            loop: <?php echo $loop?>,
            responsive:{
                0:{
                    items:1
                },
                392:{
                    items:1
                },
                820:{
                    items:2,
                    margin: 120
                },
                1000:{
                    items:2,
                    margin: 55
                },
                1280:{
                    items: <?php echo $tamanho; ?>,
                    margin: <?php echo $margem; ?>
                }
            }
        });

        <?php 
        if(isset($servicos)) {
            if(sizeof($servicos) == 0){ ?>

                $("#msgSemServicoAreaMb").css("display", "block");

            <?php } else { ?>

                $("#msgSemServicoAreaMb").css("display", "none");

            <?php } 
        }?>
        
    </script>

    <!-- qrious -->
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

    <?php 
        if(isset($_SESSION['user'])) {?>
            <!-- Maps API  -->
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDLG5sEkd7WG9Cc0cYXktgszdi02gNSsw&callback=initMap" async defer></script>
        
        <?php } 
    ?>

    <!-- Link script -->
    <script src="<?= base_url('assets/js/script.js')?>"></script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</body>
</html>