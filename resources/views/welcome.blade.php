@extends('layouts.app')

@section('content')
      @if (Auth::user() == null || Auth::user()->type == "user")
            <div class="container-fluid py-5 px-4" >
                  @if ($message = Session::get('message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>C'est fait!</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                  @endif
                  <h1 class="display-5 fw-bold mb-4">Offres d'emploi</h1>
                  <div class="col-12 row">
                        @foreach ($offres as $offre)
                        
                              <div class="card bg-white border-0 text-white col-4" >
                                    <a href="/offres/{{ $offre->id }}" class="text-white">
                                    <img src="{{ $offre->image_url }}" style="filter: brightness(65%); height: 12rem" class="card-img">
                                    <div class="card-img-overlay p-4">
                                    <span class="badge bg-primary mb-2">{{date('d-m-Y', strtotime($offre->updated_at)) }}</span>
                                    @if ( $offre->etat == true )
                                    <span class="badge bg-success mb-2">En cours</span>
                                    @endif
                                    @if ( $offre->etat == false )
                                    <span class="badge bg-danger mb-2">Expiré</span>
                                    @endif
                                          <h3 class="card-title fw-bold">{{ $offre->title }}</h3>
                                          <p class="card-text mb-5">{!! $offre->desc !!}</p>
                                    </div>
                              </a>
                              </div>
                        
                        @endforeach
                  </div>
            </div>
      @endif

      @if (Auth::user() != null)
            @if (Auth::user()->type == "admin")
                  <div class="container-fluid py-5 px-4" >
                        <h1 class="display-5 fw-bold mb-4">Tableau de bord</h1>
                        <div class="row">
                              <div class="col-4 card text-white bg-dark border-0 ms-3" style="max-width: 18rem;">
                                    <div class="card-header">Offres</div>
                                    <div class="card-body">
                                    <h5 class="card-title">{{ $countOffres }} Offres</h5>
                                    </div>
                              </div>
                              <div class="col-4 card text-dark bg-light border-0 mx-3" style="max-width: 18rem;">
                                    <div class="card-header">Employé(e)s</div>
                                    <div class="card-body">
                                    <h5 class="card-title">{{ $countEmployees }} Employé(e)s</h5>
                                    </div>
                              </div>
                              <div class=" col-4card text-light border-0 bg-primary" style="max-width: 18rem;">
                                    <div class="card-header">Postulations</div>
                                    <div class="card-body">
                                    <h5 class="card-title">{{ $countPostule }} Postulations</h5>
                                    </div>
                              </div>
                        </div>
                        <div class="my-4">
                              <h4 class="fw-bold mb-4 mt-5">Statistiques</h4>
                              <div class="row">
                                    <div class="col-4">
                                          <canvas id="pie-chart1"></canvas>
                                    </div>
                                    <div class="col-4">
                                          <canvas id="pie-chart2"></canvas>
                                    </div>
                                    <div class="col-4">
                                          <canvas id="pie-chart3"></canvas>
                                    </div>
                              </div>
                        </div>
                        <h4 class="fw-bold mb-4 mt-5">liens rapides</h4>
                        <div class="row">
                              <div class="col-2">
                                   <a class="btn btn-primary rounded-pill" href="/employees">Voir la liste des employé(e)s</a>
                              </div>
                              <div class="col-2">
                                    <a class="btn btn-primary rounded-pill" href="/postules">Voir la liste des postulations</a>     
                              </div>
                              <div class="col-2">
                                    <a class="btn btn-primary rounded-pill" href="/offres">Voir la liste des offres insérées</a>    
                              </div>
                              <div class="col-2">
                                    <a class="btn btn-primary rounded-pill" href="/offre/add">Ajouter une nouvelle offre</a>    
                              </div>
                        </div>
                  </div>
            @endif
      @endif
 
  <!-- javascript -->
 
   <script>
      $(function(){
            //get the pie chart canvas
            var employeeData = JSON.parse(`<?php echo $employeesChart; ?>`);
            var employeeCtx = $("#pie-chart1");

            var offersData = JSON.parse(`<?php echo $offresChart; ?>`);
            var offersCtx = $("#pie-chart2");

            var postuleData = JSON.parse(`<?php echo $postuleChart; ?>`);
            var postuleCtx = $("#pie-chart3");
      
            //pie chart data
            var data1 = {
            labels: employeeData.label,
            datasets: [
            {
                  label: "Employé(e)s",
                  data: employeeData.data,
                  backgroundColor: [
                  "#f0f1f2",
                  "#d3d4d5",
                  "#bebebf",
                  "#a6a6a7",
                  ],
                  borderColor: [
                  "#d3d4d5",
                  ],
                  borderWidth: [1, 1, 1, 1, 1,1,1]
            }
            ]
            };

            var data2 = {
            labels: offersData.label,
            datasets: [
            {
                  label: "Offres",
                  data: offersData.data,
                  backgroundColor: [
                  "#212222",
                  "#3b3c3c",
                  "#5a5c5c",
                  ],
                  borderColor: [
                  "#d1d1d1",
                  ],
                  borderWidth: [1, 1, 1, 1, 1,1,1]
            }
            ]
            };

            var data3 = {
            labels: postuleData.label,
            datasets: [
            {
                  label: "Postulations",
                  data: postuleData.data,
                  backgroundColor: [
                  "#0d6dfd",
                  "#3c82eb",
                  "#5c95e9",
                  ],
                  borderColor: [
                  "#98bef5",
                  ],
                  borderWidth: [1, 1, 1, 1, 1,1,1]
            }
            ]
            };
      
            //options
            var options1 = {
            responsive: true,
            title: {
            display: true,
            position: "top",
            text: "Employé(e)s inscrits la semaine dernière",
            fontSize: 15,
            fontColor: "#333"
            },
            legend: {
            display: true,
            position: "bottom",
            labels: {
                  fontColor: "#333",
                  fontSize: 16
            }
            }
            };

            var options2 = {
            responsive: true,
            title: {
            display: true,
            position: "top",
            text: "Offres lancées la semaine dernière",
            fontSize: 15,
            fontColor: "#333"
            },
            legend: {
            display: true,
            position: "bottom",
            labels: {
                  fontColor: "#333",
                  fontSize: 16
            }
            }
            };

            var options3 = {
            responsive: true,
            title: {
            display: true,
            position: "top",
            text: "Postulations faites la semaine dernière",
            fontSize: 15,
            fontColor: "#333"
            },
            legend: {
            display: true,
            position: "bottom",
            labels: {
                  fontColor: "#333",
                  fontSize: 16
            }
            }
            };
      
            //create Pie Chart class object
            var chart1 = new Chart(employeeCtx, {
            type: "pie",
            data: data1,
            options: options1
            });

            var chart2 = new Chart(offersCtx, {
            type: "bar",
            data: data2,
            options: options2
            });

            var chart3 = new Chart(postuleCtx, {
            type: "line",
            data: data3,
            options: options3
            });
      
      });
      </script>
      </div>


@endsection
