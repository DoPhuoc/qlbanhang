@extends('admin.admin-layout')
@section('content')
    <div class="card">
        <h5 class="card-header">Thống kê sản phẩm bán
            ngày {{ $selectedDate->format('d/m/Y') }}</h5>
        <div class="card-body">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <input type="hidden" value="{{ json_encode($chartData['label']) }}"
               id="labels">
        <input type="hidden"
               value="{{ json_encode($chartData['datasetsData']) }}"
               id="datasetsData">
    </div>
@endsection
@push('javascripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        var dynamicColors = function () {
            let r = Math.floor(Math.random() * 255);
            let g = Math.floor(Math.random() * 255);
            let b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
        }
        let poolColors = function (a) {
            let pool = [];
            for (let i = 0; i < a; i++) {
                pool.push(dynamicColors());
            }
            return pool;
        }
        Chart.defaults.global.legend.display = false;
        let ctx = document.getElementById('myChart');
        const labels = JSON.parse($('#labels').val())
        const data = JSON.parse($('#datasetsData').val())
        console.log(poolColors(labels));
        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: '# of Votes',
                    data: data,
                    backgroundColor: poolColors(labels.length),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    </script>
@endpush
