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

    <h2 class="mb-4">Meu Histórico</h2>

    <br>
    
    <table class="table table-striped table-bordered" style="margin-bottom: 0;">

        <thead class="table-dark" style="border-radius: 20px;">

            <tr>
            
                <th class="th" style="width: 4rem;">Motoboy</th>
                <th class="th" style="width: 21rem;">Endereço</th>
                <th class="th" style="width: 7rem;">Data</th>
                <th class="th" style="width: 3.5rem;">Tempo</th>
                <th class="th" style="width: 3.5rem;">Distância</th>
                <th class="th" style="width: 4rem;">Peso</th>
                <th class="th" style="width: 5.6rem;">Valor</th>                

            </tr>

        </thead>

    </table>

    <div class="table-wrapper-scroll-y my-custom-scrollbar scrollbar scrollbar-primary">
    
        <table id="dtVerticalScrollExample" class="table table-striped table-bordered" style="border-radius: 20px; margin-bottom: 0;" cellspacing="0" width="100%">
        
            <tbody>

                <div class="areaTabela">
                
                <?php 
                
                    foreach($servicos as $key => $value ) {

                ?> 
                    <tr>

                        <td style="width: 10.5rem;">

                            <p class="text-muted mb-0"><?php echo current($value[7]) ?>  </p>
                            
                        </td>

                        <td style="width: 46rem;">

                            <div class="d-flex align-items-center">
                                
                    

                                <div class="ms-1">

                                    <p class="fw-bold mb-1">Retirada:</p>
                                    <p class="text-muted mb-0"><?php echo $value[1]; ?> </p>
                                    <p class="fw-bold mb-1">Destino:</p>
                                    <p class="text-muted mb-0"><?php echo $value[2]; ?>  </p>

                                </div>

                            </div>

                        </td>

                        <td style="width: 1rem;">

                            <p class="text-muted mb-0"><?php echo $value[8]; ?>  </p>

                        </td>


                        <td style="width: 10rem;"><?php echo $value[4]; echo " min"?></td>
                        
                        <td style="width: 10rem;"><?php echo  $value[6]; echo " km" ?></td>
                        
                        <td style="width: 7rem;"><?php echo   $value[5]; ?></td>

                        <td style="width: 4rem;"><?php echo "R$" ;echo   $value[6]; ?></td>

                    </tr>
                    
                </div>
                    
                

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

