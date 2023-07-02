
@extends('adminlte::page')

@section('title', 'AnalyticaW')

@section('content')
<h1>Operaciones</h1>
<div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-4" >
        <div class="card" style="width: 18rem;" id="containerOne">
        </div>
      </div>
      <div class="col-md-6 col-lg-4" >
        <div class="card" style="width: 18rem;" id="containerTwo">
        </div>
      </div>
      <div class="col-md-6 col-lg-4 d-flex justify-content-center align-items-center">
    <div>
        <div class="card bg-primary" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Horarios Cursos: <?= $dataHorariosCursos+1 ?></h5>
            </div>
        </div>
        <div class="card bg-success" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Total de Eventos: <?= $dataEvento ?></h5>
            </div>
        </div>
        <div class="card bg-secondary" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Horarios Empleos: <?= $dataHoraiosEmpleos ?></h5>
            </div>
        </div>
    </div>
</div>

      <div class="col-md-6 col-lg-4" >
        
      </div>
      <div class="col-md-6 col-lg-4" id="containerFive">
        <!-- Gráfico 5 -->
      </div>
      <div class="col-md-6 col-lg-4" id="containerSix">
        <!-- Gráfico 6 -->
      </div>
      <div class="col-md-6 col-lg-4" id="containerSeven">
        <!-- Gráfico 7 -->
      </div>
      <div class="col-md-6 col-lg-4" id="containerEight">
        <!-- Gráfico 8 -->
      </div>
      <div class="col-md-6 col-lg-4">
        <!-- Gráfico 9 -->
      </div>
      <div class="col-md-6 col-lg-4">
        <!-- Gráfico 10 -->
      </div>
    </div>


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>


    <script>
      // Data retrieved from https://netmarketshare.com
        Highcharts.chart('containerOne', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Horarios Cursos',
                align: 'left'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: <?= $dataEmpleos ?>,
            }]
        });

        
    </script>


    <script>
            Highcharts.chart('containerTwo', {
          chart: {
              type: 'column'
          },
          title: {
              text: 'Duracion cursos'
          },
          xAxis: {
              type: 'Cursos',
              labels: {
                  rotation: -45,
                  style: {
                      fontSize: '13px',
                      fontFamily: 'Verdana, sans-serif'
                  }
              }
          },
          yAxis: {
              min: 0,
              title: {
                  text: 'Duracion (Horas)'
              }
          },
          legend: {
              enabled: false
          },
          tooltip: {
              pointFormat: 'Duracion: <b>{point.y:.1f} horas</b>'
          },
          series: [{
              name: 'Population',
              colors: [
                  '#9b20d9', '#9215ac', '#861ec9', '#7a17e6', '#7010f9', '#691af3',
                  '#6225ed', '#5b30e7', '#533be1', '#4c46db', '#4551d5', '#3e5ccf',
                  '#3667c9', '#2f72c3', '#277dbd', '#1f88b7', '#1693b1', '#0a9eaa',
                  '#03c69b',  '#00f194'
              ],
              colorByPoint: true,
              groupPadding: 0,
              data: <?= $dataCursos ?>,
              dataLabels: {
                  enabled: true,
                  rotation: -90,
                  color: '#FFFFFF',
                  align: 'right',
                  format: '{point.y:.1f}', // one decimal
                  y: 10, // 10 pixels down from the top
                  style: {
                      fontSize: '13px',
                      fontFamily: 'Verdana, sans-serif'
                  }
              }
          }]
      });


    </script> 

  <script>
          // Data retrieved from https://netmarketshare.com/
        Highcharts.chart('containerFour', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        title: {
            text: 'Equipos',
            align: 'center',
            verticalAlign: 'middle',
            y: 60
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: true,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white'
                    }
                },
                startAngle: -90,
                endAngle: 90,
                center: ['50%', '75%'],
                size: '110%'
            }
        },
        series: [{
            type: 'pie',
            name: 'Equipos',
            innerSize: '50%',
            data: <?= $dataContactos ?>
        }]
    });

  </script> 


