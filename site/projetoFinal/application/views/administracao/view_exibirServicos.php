<style>
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
        bottom: .5em;
    }

    .my-custom-scrollbar {
        position: relative;
        height: 550px;
        overflow: auto;
    }
    .table-wrapper-scroll-y {
        display: block;
    }

    .scrollbar {
        margin-left: 0px;
        float: left;
        height: 370px;
        width: 1025px;
        background: #fff;
        overflow-y: scroll;
        margin-bottom: 25px;
    }

    
    @media screen and (max-width: 545px) {
        .scrollbar {
            width: 22rem;
            margin-left: -1.5rem;
            height: 300px;
            overflow-x: scroll;
        }

        .scrollbar2 {
            width: 22rem;
            margin-left: -1.5rem;
            overflow-x: scroll;
        }

        .outra {
            text-align: left;
            width: 12rem;
            margin-bottom: 1rem;
            margin-left: -2px;
        }
    }

    .scrollbar-primary::-webkit-scrollbar {
        width: 12px;
        background-color: #F5F5F5;
    }

    .scrollbar-primary::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
        background-color: #4285F4;
    }

    .scrollbar-primary {
        scrollbar-color: #F5F5F5;
    }

</style>



<div class="bgAdmClientes">

    <h2 class="mb-4">Serviços</h2>

    <div class="row">
    
        <div class="col-lg-3 mt-2">
    
            <div class="dropdown" style="margin-bottom: 1.2rem;">
    
                <button class="btn btn-dark dropdown-toggle" type="button"  id="dropdowns" data-mdb-toggle="dropdown" aria-expanded="false">
                    Classificar
                </button>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="<?php echo site_url("Administrador/ordenarServico/id_servicos/asc/servicos") ?>">Menor ID</a></li>
                    <li><a class="dropdown-item" href="<?php echo site_url("Administrador/ordenarServico/id_servicos/desc/servicos") ?>">Maior ID</a></li>
                    <li><a class="dropdown-item" href="<?php echo site_url("Administrador/ordenarServico/endereco_retirada/asc/servicos") ?>">Endereço Retirada(A-Z)</a></li>
                    <li><a class="dropdown-item" href="<?php echo site_url("Administrador/ordenarServico/endereco_destino/asc/servicos") ?>">Endereço Destino(A-Z)</a></li>
                </ul>         
                
            </div>
    
        </div>

        <div class="col-lg-9">

            <div class="outra" style="background-color: #fff;text-align: right;color: black; padding-right:8px; font-family: Roboto,sans-serif; font-size: 17px"> 

                <button type="button" class="btn btn-dark text-white">
                            
                    <b>
                    
                    Total de Serviços: <span><?php echo $servico[0][12]; ?></span>
                        
                    </b>

                </button>

            </div>

        </div>

    </div>

    <div class="scrollbar2">
    
        <table class="table table-striped table-bordered" style="margin-bottom: 0;">

            <thead class="table-dark" style="border-radius: 20px;">

                <tr>
                
                    <th class="th" style="width: 0rem;">Id</th>
                    <th class="th" style="width: 18rem;">Endereço</th>
                    <th class="th" style="width: 6rem;">Horário</th>
                    <th class="th" style="width: 3.5rem;">Tempo</th>
                    <th class="th" style="width: 3rem;">Distância</th>
                    <th class="th" style="width: 6rem;">Valor</th>
                    <th class="th" style="width: 6.5rem;">Status</th>
                    <th class="th" style="width: 9rem;">Actions</th>
                    

                </tr>

            </thead>
            
        </table>

    </div>

    <div class="table-wrapper-scroll-y my-custom-scrollbar scrollbar scrollbar-primary">
    
        <table id="dtVerticalScrollExample" class="table table-striped table-bordered" style="border-radius: 20px; margin-bottom: 0;" cellspacing="0" width="100%">
        
            <tbody>

                <div class="areaTabela">
                
                <?php 
                
                    foreach($servico as $key => $value ) { ?> 
                        
                        <tr>
                            <td style="width: 4rem;">

                            <p class="text-muted mb-0"><?php echo $value[0]; ?>  </p>
                                
                            </td>

                            <td style="width: 30rem;">

                                <div class="d-flex align-items-center">
                                    
                        

                                    <div class="ms-1">

                                        <p>
                                            <b style="text-align: justify;">Retirada: </b><span class="text-muted"><?php echo $value[2]; ?></span>
                                        </p>
                                        
                                        <p>
                                            <b style="text-align: justify;">Destino:</b><span class="text-muted"><?php echo $value[4]; ?></span>
                                        </p>

                                    </div>

                                </div>

                            </td>

                            <td style="width: 5rem;">

                                        <p class="fw-bold mb-1">Retirada:</p>
                                        <p class="text-muted"><?php echo $value[8]; ?>  </p>

                                        <p class="fw-bold mb-1">Previsto:</p>
                                        <p class="text-muted"><?php echo $value[9]; ?>  </p>

                                        <p class="fw-bold mb-1">Chegada:</p>
                                        <p class="text-muted"><?php echo $value[10]; ?>  </p>

                            </td>


                            <td style="width: 7rem;"><?php echo ceil($value[6]) . " min"?></td>
                            
                            <td style="width: 10rem;"><?php echo number_format($value[7], 1, ',', ' ') . " km"; ?></td>
                            
                            <td style="width: 8rem;"><?php echo "R$ " . number_format($value[11], 2, ',', ' '); ?></td>

                            <td style="width: 2rem;">

                                <?php  if($value[5] == 1){ ?>
                                    <span class="badge badge-warning  rounded-pill d-inline">Solicitado</span> 
                                <?php } else if($value[5] == 2){ ?>
                                    <span class="badge badge-success  rounded-pill d-inline">Aceito</span> 
                                <?php } else if($value[5] == 3){ ?>
                                    <span class="badge badge-primary  rounded-pill d-inline">A Caminho</span> 
                                <?php } else{ ?>
                                    <span class="badge badge-info  rounded-pill d-inline">Concluído</span> 
                                <?php }?>
                                
                            </td>

                            <td style="width: 4.5rem;">

                                <button type="button" class="btn btn-danger" onclick="excluirServico(<?php echo $value[0]; ?>)">Excluir</button>

                            </td>

                        </tr>
                        
                    </div>
                        
                <?php } ?> 

            </tbody>

        </table>
       
    </div>
    
<script>
    $(document).ready(function () {
        $('<?php echo site_url("Administrador/ordenarServico/id_servicos/asc/servicos") ?>dtVerticalScrollExample').DataTable({
          "scrollY": "200px",
          "scrollCollapse": true,
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>