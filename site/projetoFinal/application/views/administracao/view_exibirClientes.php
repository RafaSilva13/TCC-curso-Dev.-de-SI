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
            width: 11.8rem;
            margin-bottom: 1rem;
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

    <h2 class="mb-4">Clientes</h2>

    <div class="row">
    
        <div class="col-lg-3 mt-2">
    
            <div class="dropdown" style="margin-bottom: 1.2rem;">
    
                <button class="btn btn-dark dropdown-toggle" type="button"  id="dropdowns" data-mdb-toggle="dropdown" aria-expanded="false">
                    Classificar
                </button>
    
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="<?php echo site_url("Administrador/ordenarCliente/nome_cliente/asc/clientes") ?>">A-Z</a></li>
                    <li><a class="dropdown-item" href="<?php echo site_url("Administrador/ordenarCliente/nome_cliente/desc/clientes") ?>">Z-A</a></li>
                    <li><a class="dropdown-item" href="<?php echo site_url("Administrador/ordenarCliente/id_cliente/asc/clientes") ?>">Menor ID</a></li>
                    <li><a class="dropdown-item" href="<?php echo site_url("Administrador/ordenarCliente/id_cliente/desc/clientes") ?>">Maior ID</a></li>
                    <li><a class="dropdown-item" href="<?php echo site_url("Administrador/ordenarCliente/status/desc/clientes") ?>">Verificados</a></li>
                </ul>
    
            </div>
    
        </div>

        <div class="col-lg-9">

            <div class="outra" style="background-color: #fff;text-align: right;color: black; padding-right:8px; font-family: Roboto,sans-serif; font-size: 17px"> 

                <button type="button" class="btn btn-dark text-white">
                            
                    <b>
                    
                    Total de Clientes: <span><?php echo $cliente[0][9]; ?> </span>
                        
                    </b>

                </button>

            </div>

        </div>

    </div>

    <div class="scrollbar2">

        <table class="table table-striped table-bordered" style="margin-bottom: 0;">

            <thead class="table-dark" style="border-radius: 20px;">

                <tr>

                    <th class="th" style="width: 25rem;">Nome</th>
                    <th class="th" style="width: 10rem;">Username</th>
                    <th class="th" style="width: 7rem;">Verificação</th>
                    <th class="th" style="width: 10rem;">Telefone</th>
                    <th class="th" style="width: 11.5rem;">Opções</th>

                </tr>

            </thead>

        </table>

    </div>

    <div class="table-wrapper-scroll-y my-custom-scrollbar scrollbar scrollbar-primary">

        <table id="dtVerticalScrollExample" class="table table-bordered" style="border-radius: 20px; margin-bottom: 0;" cellspacing="0" width="100%">

            <tbody>

                <div class="areaTabela">
                
                <?php 
                
                //   print_r($cliente);

                foreach($cliente as $key => $value) {
                
                    
                ?> 
                    <tr>

                        <td style="width: 24.8rem;">

                            <div class="d-flex align-items-center">
                                
                                <img src="<?php echo base_url("assets/imgperfil/" . $value[7])?>" alt="" style="width: 45px; height: 45px" class="rounded-circle" />

                                <div class="ms-3">

                                    <p class="fw-bold mb-1"><?php echo $value[1]; ?>  </p>
                                    <p class="text-muted mb-0"><?php echo  $value[4]; ?></p>

                                </div>

                            </div>

                        </td>

                        <td style="width: 9.9rem;">

                            <p class="fw-normal mb-1"><?php echo   $value[3]; ?></p>

                        </td>

                        <td style="width: 7rem;">

                            <?php if ($value[8]== 1) { ?>
                                <span class="badge badge-success rounded-pill d-inline">Verificado</span>
                            <?php } else{ ?>
                                <span class="badge badge-warning  rounded-pill d-inline">Pendente</span> 
                            <?php }?>
                            
                        </td>

                        <td style="width: 10rem;"><?php echo   $value[6]; ?></td>

                        <td style="width: 11rem; padding-top: 1.4rem; padding-left: 2.5rem;">

                            <button type="button" class="btn btn-danger" onclick="excluirCliente(<?php echo $value[0]; ?>)">Excluir</button>

                        </td>

                    </tr>
                    
                </div>
                    
                

                    </tr>
                
                </div>
            <?php } ?>        
            </tbody>

        </table>
    
    </div>

</div>

<script>
    $(document).ready(function () {
        $('<?php echo site_url("Administrador/ordenar/nome_cliente/asc/clientes") ?>dtVerticalScrollExample').DataTable({
          "scrollY": "200px",
          "scrollCollapse": true,
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>