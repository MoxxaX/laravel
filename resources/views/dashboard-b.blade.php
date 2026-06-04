@extends('main')

@section('content')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<style>
    #container,
    #container2,
    #container3,
    #container4 {
        height: 400px;
    }

    .card-chart {
        background: #fff;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,.1);
    }
</style>

<div class="container-fluid">

    <div class="row">
        <div class="col-md-6">
            <div class="card-chart">
                <div id="container"></div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card-chart">
                <div id="container2"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card-chart">
                <div id="container3"></div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card-chart">
                <div id="container4"></div>
            </div>
        </div>
    </div>

</div>

<script>


    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Jumlah Mahasiswa per Program Studi'
        },
        xAxis: {
            categories: [
                @foreach ($grafikmhs as $data)
                    '{{ $data->nama_prodi }}',
                @endforeach
            ]
        },
        yAxis: {
            title: {
                text: 'Jumlah Mahasiswa'
            }
        },
        tooltip: {
            valueSuffix: ' Orang'
        },
        series: [{
            name: 'Mahasiswa',
            data: [
                @foreach ($grafikmhs as $data)
                    {{ $data->jumlah_mhs }},
                @endforeach
            ]
        }]
    });


    Highcharts.chart('container2', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Persentase Mahasiswa per Program Studi'
        },
        tooltip: {
            pointFormat: '<b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '{point.name}<br>{point.percentage:.1f}%'
                }
            }
        },
        series: [{
            name: 'Mahasiswa',
            colorByPoint: true,
            data: [
                @foreach ($grafikmhs as $data)
                {
                    name: '{{ $data->nama_prodi }}',
                    y: {{ $data->jumlah_mhs }}
                },
                @endforeach
            ]
        }]
    });


    Highcharts.chart('container3', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Jumlah Mahasiswa per Tahun Angkatan'
        },
        xAxis: {
            categories: [
                @foreach ($grafikmhspertahun as $data)
                    '20{{ $data->tahun_angkatan }}',
                @endforeach
            ]
        },
        yAxis: {
            title: {
                text: 'Jumlah Mahasiswa'
            }
        },
        tooltip: {
            valueSuffix: ' Orang'
        },
        series: [{
            name: 'Mahasiswa',
            data: [
                @foreach ($grafikmhspertahun as $data)
                    {{ $data->jumlah_mhs }},
                @endforeach
            ]
        }]
    });


    Highcharts.chart('container4', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Tren Mahasiswa per Program Studi'
        },
        xAxis: {
            categories: ['2023', '2024', '2025']
        },
        yAxis: {
            title: {
                text: 'Jumlah Mahasiswa'
            }
        },
        tooltip: {
            shared: true
        },
        series: [
            @foreach ($grafiktrenmahasiswa as $data)
            {
                name: '{{ $data->nama_prodi }}',
                data: [
                    {{ $data->jmhs_2023 }},
                    {{ $data->jmhs_2024 }},
                    {{ $data->jmhs_2025 }}
                ]
            },
            @endforeach
        ]
    });

</script>

@endsection