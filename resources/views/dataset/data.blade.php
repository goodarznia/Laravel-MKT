@extends('layouts.master')
@section('page_title','Show Dataset Details')

@section('content')
    @if($dataset->user_id===auth()->user()->id)
        <div class="alert-info">
            <table style="width: 100%">
                <tr>
                    <td>
                        <div class="h3">{{$dataset->title}}</div>
                    </td>
                    <td style="width: 70px">
                        <a href="/user_area/datasets">
                            <button class=" btn-sm btn-info"><i class="fa fa-undo"></i> Back</button>
                        </a></td>
                </tr>
            </table>

            <div class="h6">Activation Energy: <B>{{$dataset->activation_energy}}</B></div>
            <div class="h6">Mean Kinetic Temperature (MKT):<B> {{$dataset->MKT}}</B></div>
            <div class="h6">Submitted by: <B>{{auth()->user()->name}}</B> ({{auth()->user()->email}})</div>
            <div class="h6">User IP:<B> {{$dataset->user_ip}}</B></div>
            <div class="h6">Submission Time(UTC): <B>{{$dataset->created_at}}</B></div>
        </div>
        <div id="google-line-chart" class="alert-success">


            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {'packages': ['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Sample Time', 'Sample Temperature'],

                        @php
                            foreach($dataRecords as $dataRecord) {
                                echo "['".$dataRecord->sample_time."', ".$dataRecord->sample_temperature."],";
                            }
                        @endphp
                    ]);

                    var options = {
                        title: 'The trend of temperature changes',
                        curveType: 'function',
                        legend: {position: 'bottom'}
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('google-line-chart'));

                    chart.draw(data, options);
                }
            </script>
        </div>
        <div class="alert-secondary">
            <div class="h5">Data Logs</div>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Sample Time(UTC)</th>
                    <th>Temperature</th>
                </tr>
                </thead>
                <tbody>
                @foreach($dataRecords as $dataRecord)
                    <tr>
                        <td>{{$dataRecord->sample_time}}</td>
                        <td>{{$dataRecord->sample_temperature}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="card"></div>
    @else
        <div class="alert-danger h1">Access denied!</div>
    @endif
    <table style="width: 100%">
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
    </table>

@endsection
