@extends('template.app')
    @section('content')
      <div class="content">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h1 class="title">Fiche Voiture : {{ $vehicule[0]->numero}}</h1>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <h4> <?php echo ($disponibilite==true)? ' <p class="text-success"> Disponible </p>' : ' <p class="text-danger"> Indisponible </p>' ;  ?></h4>
                      </div>
                    </div>
                </div>                  
                <div class="row">
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <h4>Echeance : </h4>
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                nom
                                </th>
                                <th>
                                expiration
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($echeances as $one)
                            <tr>
                                <td>
                                {{$one->typeEcheance}}
                                </td>
                                <td>
                                <p <?php if ($one->date<15) echo 'class="text-danger"' ;else if ($one->date<=40) echo'style="color:yellow"' ;  ?>>{{($one->date)? $one->date." jours" : "pas encore payé"}}</p>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                        <h4>Maintenance : </h4>
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                nom
                                </th>
                                <th>
                                expiration
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($maintenances as $one)
                            <tr>
                                <td>
                                {{$one->typeMaintenance}}
                                </td>
                                <td>
                                <p <?php if ($one->expiration<=200) echo 'class="text-danger"' ;else if ($one->expiration<=500) echo'style="color:yellow"' ;  ?>>{{($one->expiration)? $one->expiration." jours" : "pas encore payé"}}</p>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="card-footer">
              </div>
            </div>
          </div>
    <?php  if(session('admin')->admin==true) {?>  
          <div class="col-md-6">
            <div class="card z-index-2 ">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <div class="chart">
                    <canvas id="chart-bars" class="chart-canvas" height="300"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>

    <!-- dashboard -->
    <script>
      var tabprix=[];
      var tabsemaine=[];
    </script>
    @foreach($distance as $one)
      <script>
          tabprix.push({{ $one->distance }});
          tabsemaine.push("{{$one->jour }}");
      </script>;
    @endforeach -->
  <script src="{{ asset('dashboard/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('dashboard/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('dashboard/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('dashboard/js/plugins/chartjs.min.js') }}"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");
    new Chart(ctx, {
      type: "bar",
      data: {
        labels: tabsemaine,
        datasets: [{
          label: "distance",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: tabprix,
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
  <?php } ?>
    @endsection
