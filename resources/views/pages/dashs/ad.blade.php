@extends('layouts.panel')
@section('title', 'Ínicio')
@section('content')
	<div class="content" ng-app="list">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3>Confirmações</h3>
                        </div>
                        <div class="panel-body">
                            <canvas style="display: block;" class="js-full-chart" id="chartEventsConfirmeds" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3>Avaliações</h3>
                        </div>
                        <div class="panel-body">
                            <canvas style="display: block;" class="js-full-chart" id="chartEventsEvaluate" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3>Favoritos nos últimos 5 dias.</h3>
                        </div>
                        <div class="panel-body" style="height: 400px;">
                            <canvas id="chartTimeLine" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection

@push('styles')

@endpush

@push('scripts')
<script type="text/javascript" src="{{ url('bower_components/chart.js/dist/Chart.js') }}"></script>
<script type="text/javascript">
    'use strict';

    (function( $ ) {
        $('.js-full-chart').each(function() {
            var width = $(this).parent().innerWidth();

            $(this).parent().height( width );
        });

        var chartEventsConfirmeds = new Chart(document.getElementById("chartEventsConfirmeds"), {
                type: 'bar',
                data: {
                    labels: {!! $confirmeds['name'] !!},
                    datasets: [{
                        label: 'Usuários confirmados',
                        data: {!! $confirmeds['totals'] !!},
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)'
                        ]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

        var chartEventsEvaluate = new Chart(document.getElementById("chartEventsEvaluate"), {
            type: 'polarArea',
            data: {
                labels: {!! $confirmeds['name'] !!},
                datasets: [{
                    label: 'Usuários confirmados',
                    data: {!! $confirmeds['stars'] !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var chartTimeLineEl = document.getElementById("chartTimeLine"),
            chartTimeLine = new Chart(chartTimeLineEl, {
                type: 'line',
                data: {
                    labels: {!! $lines['days'] !!},
                    datasets: [
                        @if( isset($lines['events']) )
                        @foreach( $lines['events'] as $event )
                        {
                            label: "{{ $event['name'] }}",
                            fill: false,
                            lineTension: 0.1,
                            backgroundColor: "rgba({{ $event['color'] }}, 0.6)",
                            borderColor: "rgba({{ $event['color'] }}, 1)",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            pointBorderColor: "rgba(25, 25, 25, 1)",
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(25, 25, 25, 1)",
                            pointHoverBorderColor: "rgba(220,220,220,1)",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 10,
                            data: {!! json_encode($event['data']) !!},
                            spanGaps: false
                        },
                        @endforeach
                        @endif
                    ]
                },
                options: {
                    maintainAspectRatio: false
                }
            });
    })(jQuery);
</script>
@endpush
