@extends(config('app.theme').'.admin.layout')

@section('content')
<div id="chart" class="p-4 bg-white rounded-lg shadow-lg"></div>
@endsection

@section('script')
<script type="">
    document.addEventListener('DOMContentLoaded', function () {
        var options = {
            chart: {
                type: 'area',
                height: 320
            },
            series: [{
                name: 'Example Data',
                data: [10, 20, 30, 40, 50]
            }],
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May']
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>

@endsection