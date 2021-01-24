@extends('admin.admin-layout')
@section('content')
    <div class="card">
        <h5 class="card-header">Thống kê sản phẩm bán ngày
            <input type="date"
                   value="{{request('date', today()->format('Y-m-d'))}}"
                   id="data">
        </h5>
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
        $(document).on('change', '#data', function () {
            let date = $(this).val();
            let urlSearchParams = new URLSearchParams(window.location.search);
            urlSearchParams.set('date', date);
            window.location.search = urlSearchParams.toString();
        });
        Chart.defaults.global.legend.display = false;
        let ctx = document.getElementById('myChart');
        const labels = JSON.parse($('#labels').val())
        const data = JSON.parse($('#datasetsData').val())
        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: '# of Votes',
                    data: data,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    xAxes: [{
                        maxBarThickness: 60
                    }],
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
