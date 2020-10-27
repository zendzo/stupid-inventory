@extends('layouts.sleek.main')

@section('scripts')
    <script>
      var bar3 = document.getElementById("barChart3");
      if (bar3 !== null) {
      var bar_Chart = new Chart(bar3, {
      type: "bar",
      data: {
      labels: [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec"
      ],
      datasets: [
      {
      label: "signup",
      data: [5, 6, 4.5, 5.5, 3, 6, 4.5, 6, 8, 3, 5.5, 4],
      // data: [2, 3.2, 1.8, 2.1, 1.5, 3.5, 4, 2.3, 2.9, 4.5, 1.8, 3.4, 2.8],
      backgroundColor: "#ffffff"
      }
      ]
      },
      options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
      display: false
      },
      scales: {
      xAxes: [
      {
      gridLines: {
      drawBorder: false,
      display: false
      },
      ticks: {
      display: false, // hide main x-axis line
      beginAtZero: true
      },
      barPercentage: 1.8,
      categoryPercentage: 0.2
      }
      ],
      yAxes: [
      {
      gridLines: {
      drawBorder: false, // hide main y-axis line
      display: false
      },
      ticks: {
      display: false,
      beginAtZero: true
      }
      }
      ]
      },
      tooltips: {
      enabled: true
      }
      }
      });
      }
    </script>
@endsection

@section('content')
    <!-- Fourth Row  -->
      <div class="row">
        <div class="col-xl-3 col-sm-6">
          <div class="card widget-block p-4 rounded bg-primary ">
            <div class="card-block">
              <h3 class="text-white">71,503</h3>
              <p class="py-2">Online Signups</p>
            </div>
            <div class="chartjs-wrapper" style="height: 110px;">
              <canvas id="barChart3"></canvas>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card widget-block p-4 rounded bg-warning ">
            <div class="card-block">
              <h3 class="text-white">9,503</h3>
              <p class="py-2">New Visitors Today</p>
            </div>
            <div class="chartjs-wrapper" style="height: 110px;">
              <canvas id="dual-line3"></canvas>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card widget-block p-4 rounded bg-danger ">
            <div class="card-block">
              <h3 class="text-white">71,503</h3>
              <p class="py-2">Monthly Total Order</p>
            </div>
            <div class="chartjs-wrapper" style="height: 110px;">
              <canvas id="area-chart3"></canvas>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card widget-block p-4 rounded bg-success ">
            <div class="card-block">
              <h3 class="text-white">9,503</h3>
              <p class="py-2">Total Revenue This Year</p>
            </div>
            <div class="chartjs-wrapper" style="height: 110px;">
              <canvas id="line3"></canvas>
            </div>
          </div>
        </div>
      </div>
@endsection