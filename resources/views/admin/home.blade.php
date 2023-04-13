@extends('layouts.app')

@section('content')
    <div class="card mt-3">
        <div class="card-header text-center mb-2">
            <h3>Dados referentes as manifestações</h3>
        </div>
        <div class="card-body">
            @if ( true)
                <div class="row align-items-start p-3">
                    <div class="p-3 col-12 text-center border">
                        <h3>Tipo de Manifestação</h3>
                        <canvas id="myChart1" width="200" height="50"></canvas>  
                    </div>  
                    <div class="p-3 col-12 text-center border mt-3">
                        <h3>Quantidade de Manifestações</h3>
                        <canvas id="myChart3" width="200" height="50"></canvas>  
                    </div>  
                    <div class="p-3 col-12 text-center border mt-3 d-flex justify-content-evenly">
                        <div class="col-4 border">
                            <h3>Situação</h3>
                            <canvas id="myChart" width="400" height="200"></canvas>  
                        </div>
                        <div class="col-4 border">
                            <h3>Estado-Processo</h3>
                            <canvas id="myChart2" width="200" height="50"></canvas>  
                        </div>
                    </div>  
                </div>
            @endif
        </div>
    </div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@section('scripts')


<script>
    
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: <?=json_encode($resumo_situacoes_nomes)?>,
        datasets: [{
            data: {{json_encode($resumo_situacoes_qtd)}},
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


const ctx3 = document.getElementById('myChart2').getContext('2d');
const myChart2 = new Chart(ctx3, {
    type: 'doughnut',
    data: {
        labels: <?=json_encode($resumo_estados_processo_nomes)?>,
        datasets: [{
            label: '# of Votes',
            data: {{json_encode($resumo_estados_processo_qtd)}},
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const ctx2 = document.getElementById('myChart1').getContext('2d');
const myChart1 = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        datasets: <?=$dataSet?>
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

const ctx4 = document.getElementById('myChart3').getContext('2d');
const myChart3 = new Chart(ctx4, {
    type: 'bar',
    data: {
        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
        datasets: [{
            label: '# of Votes',
            data: <?=json_encode($manifestacoes_qtd)?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>
@endsection