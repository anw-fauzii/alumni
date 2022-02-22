@extends('layouts.app')

@section('title')
    <title>Beranda</title>
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-mean-fruit"></i>
                </div>
                <div>Beranda
                    <div class="page-title-subheading">
                        Merupakan Halaman Awal
                    </div>
                </div>
            </div>  
        </div> 
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    Dashboard
                </div>
                <div class="card-body">
                    <div class="tab-content">
                    <div class="container">
                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                    <script src="https://code.highcharts.com/modules/export-data.js"></script>
                    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                    <figure class="highcharts-figure">
                      <div id="container"></div>
                    </figure>
                    </div>

                    <script>
                        $(function(){
                            Highcharts.chart('container', {
                      chart: {
                        type: 'column'
                      },
                      title: {
                        text: 'Diagram Kelulusan Siswa'
                      },
                      xAxis: {
                        categories: {!!json_encode($bulan)!!},
                        crosshair: true
                      },
                      yAxis: {
                        min: 0,
                        title: {
                          text: 'Jumlah'
                        }
                      },
                      tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                          '<td style="padding:0"><b>{point.y}</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                      },
                      plotOptions: {
                        column: {
                          pointPadding: 0.2,
                          borderWidth: 0
                        }
                      },
                      series: [{
                        name: 'Laki-Laki',
                        data: {!!json_encode($laki,JSON_NUMERIC_CHECK)!!}
                      },{
                        name: 'Perempuan',
                        data: {!!json_encode($perempuan,JSON_NUMERIC_CHECK)!!},
                      }]
                    });
                        });
                    </script>
                    </div>
                </div> 
            </div>
        </div>    
    </div>
</div>
@endsection