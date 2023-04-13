 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container-fluid">
        
        <a class="navbar-brand me-2" href="<?php
        
        if(isset($_SESSION['user'])) {

            if($_SESSION['user'][1] == 'clientes') { 

                echo site_url('Geral/areaCliente') ;

            }
            else if($_SESSION['user'][1] == 'motoboy') {

               echo site_url('Motoboy/areaMotoboy');

            } 
            else if($_SESSION['user'][1] == 'administrador') {
                
                echo site_url('Geral/administrador');

            } 
        } else {

            echo site_url('Geral/index');

        } ?>" style="margin-left: 0.3rem;">
    
            <div class="logo"> 
                <i>
            
                    <b>Express</b><b style="color: #407BFF;">Go</b>
                    
                </i>
            
            </div>
            
        </a>

        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExemple" aria-controls="navbarButtonsExemple" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarButtonsExemple">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            
            <ul class="navbar-nav d-flex flex-row" style="margin-right: 0.5rem;">

                <li class="nav-item me-3 me-lg-0 dropdown dropdowAreaMenu" id="areaMenu">
                    
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <li>
                            <a class="dropdown-item" id="op1menu" href="<?= site_url('Geral/verificacao')?>">Meu Perfil</a>
                        </li>

                        <li>
                            <a class="dropdown-item" id="op2menu" href="<?= site_url('Geral/historico')?>">Histórico</a>
                        </li>
                        
                        <li>
                            <button class="dropdown-item" id="btnsaida"  data-mdb-toggle="modal" data-mdb-target="#exampleCentralModal1">Sair</button>
                        </li>
                       
                    </ul>

                </li> 

            </ul>

        </div>

    </div>

</nav>