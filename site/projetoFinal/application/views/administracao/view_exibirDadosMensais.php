<!-- Link Charts.Js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Gráfico Colunas -->
    <div class="bgAdmDadosRegiao">
        <h2>Serviços P/ Mês</h2>
        <canvas id="myChart"></canvas></canvas>
    </div>


    <!-- <button class="carousel-control-prev" style="color: grey; padding-right:50px;" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" style="color: grey; padding-left:50px;" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button> -->
</div>




<?php 
    foreach($servicos as $key => $value) {
        $mes[] = $value[1]  ;
    }                     
?> 
<!-- Início Script Do Gráfico de Colunas -->
<script>

    var dados = [];

    $.ajax({
        url: "<?php echo site_url("Administrador/retornarServicosMensal")?>",
        type: 'POST',
        success: function(dad){

            var dat = JSON.parse(dad);

            dados = [
                parseInt(dat[0]["COUNT(id_servicos)"]),
                parseInt(dat[1]["COUNT(id_servicos)"]),
                parseInt(dat[2]["COUNT(id_servicos)"]),
                parseInt(dat[3]["COUNT(id_servicos)"]),
                parseInt(dat[4]["COUNT(id_servicos)"]),
                parseInt(dat[5]["COUNT(id_servicos)"]),
                parseInt(dat[6]["COUNT(id_servicos)"]),
                parseInt(dat[7]["COUNT(id_servicos)"]),
                parseInt(dat[8]["COUNT(id_servicos)"])
            ]
        },
        cache: false,
        async: false
    }); 

    const labels = <?php echo json_encode($mes)?>;
    const data = {
    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Julho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
    datasets: [{
        label: 'Numero de serviços por mês',
        data: dados,
        backgroundColor: 'rgb(54, 162, 235)',
        borderWidth: 1
    }]
    };

    const config = {
    type: 'bar',
    data: data,
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    },
    };

    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

</script>

<!-- Fim Script Do Gráfico de Colunas -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
