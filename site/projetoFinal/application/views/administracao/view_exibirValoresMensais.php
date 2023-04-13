<!-- Link Charts.Js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <div class="bgAdmDadosRegiao">

        <!-- Gráfico Linhas -->
        <h2>Lucro P/ Mês</h2>

        <canvas id="myChart2"></canvas>

    </div>

    
<!-- Início Script Do Gráfico de Colunas -->
<script>
    const ctx = document.getElementById('myChart2');

    const MONTHS = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ];
    
    var dados = [];

    $.ajax({
        url: "<?php echo site_url("Administrador/retornarValorMensal")?>",
        type: 'POST',
        success: function(dad){

            var dat = JSON.parse(dad);

            dados = [
                parseInt(dat[0]["sum(valor_frete)"]),
                parseInt(dat[1]["sum(valor_frete)"]),
                parseInt(dat[2]["sum(valor_frete)"]),
                parseInt(dat[3]["sum(valor_frete)"]),
                parseInt(dat[4]["sum(valor_frete)"]),
                parseInt(dat[5]["sum(valor_frete)"]),
                parseInt(dat[6]["sum(valor_frete)"]),
                parseInt(dat[7]["sum(valor_frete)"]),
                parseInt(dat[8]["sum(valor_frete)"])
            ]
        },
        cache: false,
        async: false
    }); 

    new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Julho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        datasets: [{
            label: 'Valor em R$',
            data: dados,
            fill: false,
            borderColor: 'rgb(54, 162, 235)',
            tension: 0.2,
            backgroundColor: 'rgb(54, 162, 235)',
        }]
        },
        options: {
            datalabels: {
                borderColor: 'rgb(54, 162, 235)',
                backgroundColor: 'rgb(54, 162, 235)'
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 16
                        }
                    }
                }
            }
        }
    });
</script>

<!-- Fim Script Do Gráfico de Colunas -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
