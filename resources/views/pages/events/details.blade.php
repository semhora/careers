@extends('layouts.panel')
@section('title', $event->name)
@section('content')
    <div class="content event">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 event-img">
                    <img src="{{ $event->image_url['full'] }}" alt="">
                    <a href="javascript:;" class="js-zoom-img"><i class="fa fa-search-plus"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <h2 style="font-size: 24px;">Descrição</h2>
                    <div class="event-description">
                        <blockquote>
                            <p>{{ $event->description }}</p>
                        </blockquote>
                        <blockquote>
                            <p>Valor: R$ {{ $event->value }}</p>
                            <p>Início: {{ $event->init }}</p>
                            <p>Término: {{ $event->end }}</p>
                        </blockquote>
                    </div>
                    @if( \Auth::user()->role != 'ad' )
                    <div class="event-actions">
                        <blockquote>
                            <div class="event-actions-confirm" style="margin-bottom: 15px; width: 100%; float: left">
                                <div class="pull-left">
                                    <a href="javascript:;" data-event="{{ $event->id }}" onclick="return setConfirm( {{ $event->id }}, {{ \Auth::user()->id }}, false, this );" class="btn btn-info js-confirm false {{ $event->is_confirmed ? 'hidden' : '' }}" role="button">
                                        Confirmar presença
                                    </a>
                                    <a href="javascript:;" data-event="{{ $event->id }}" onclick="return setConfirm( {{ $event->id }}, {{ \Auth::user()->id }}, true, this );" class="btn btn-success js-confirm true {{ !$event->is_confirmed ? 'hidden' : '' }}" role="button">
                                        <i class="fa fa-heart"></i>
                                        Confirmado
                                    </a>
                                </div>
                                <div class="pull-left">
                                    <a href="javascript:;" data-event="{{ $event->id }}" onclick="return setFavorite( {{ $event->id }}, {{ \Auth::user()->id }}, false, this );" class="btn btn-default text-danger js-favorite false {{ $event->is_favorite ? 'hidden' : '' }}" role="button">
                                        <i class="fa fa-heart text-danger"></i>
                                        Favoritar
                                    </a>
                                    <a href="javascript:;" data-event="{{ $event->id }}" onclick="return setFavorite( {{ $event->id }}, {{ \Auth::user()->id }}, true, this );" class="btn btn-danger js-favorite true {{ !$event->is_favorite ? 'hidden' : '' }}" role="button">
                                        <i class="fa fa-heart"></i>
                                        Favorito
                                    </a>
                                </div>
                            </div>
                            <div class="event-actions-evaluate">
                                @if( ! $event->is_evaluate )
                                    <h4>Avaliar evento</h4>
                                    <div class="event-eval-stars">
                                        <a href="javascript:;" data-star="1"><i class="fa fa-star"></i></a>
                                        <a href="javascript:;" data-star="2"><i class="fa fa-star"></i></a>
                                        <a href="javascript:;" data-star="3"><i class="fa fa-star"></i></a>
                                        <a href="javascript:;" data-star="4"><i class="fa fa-star"></i></a>
                                        <a href="javascript:;" data-star="5"><i class="fa fa-star"></i></a>
                                        <span class="js-number-stars text-success"></span>
                                    </div>
                                @else
                                    <span class="text-success">Você já votou.</span>
                                @endif
                            </div>
                        </blockquote>
                    </div>
                    @endif
                </div>
                <div class="col-sm-12 col-md-4">
                    <h2 style="font-size: 24px; text-align: right;">Dados</h2>
                    <div class="event-params text-right">
                        <div class="event-params-class" style="margin-bottom: 15px;">
                            <h5 style="margin-bottom: 0;">
                                Classificação
                            </h5>
                            <span style="font-size: 16px;">{{ $event->classification }}</span>
                        </div>
                        <div class="event-params-class" style="margin-bottom: 15px;">
                            <h5 style="margin-bottom: 0;">
                                Período
                            </h5>
                            <span style="font-size: 16px;">{{ $event->period }}</span>
                        </div>
                        <div class="event-params-stars" style="margin-bottom: 15px;">
                            <h5 style="margin-bottom: 0;">
                                Avaliação
                            </h5>
                            <span style="font-size: 16px;">{{ $event->evaluate }}</span>
                        </div>
                        <div class="event-params-confirmeds">
                            <h5 style="margin-bottom: 0;">
                                Confirmados
                            </h5>
                            <span style="font-size: 16px;">{{ $event->total_confirmeds }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @if( \Auth::user()->role != 'user' )
                <div class="row">
                    <div class="col-xs-12">
                        <hr>
                        <h2 style="font-size: 24px;">Dados</h2>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3>Por idade</h3>
                                    </div>
                                    <div class="panel-body">
                                        <canvas style="display: block;" class="js-full-chart" id="eventAge" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3>Por genêro</h3>
                                    </div>
                                    <div class="panel-body">
                                        <canvas style="display: block;" class="js-full-chart" id="eventGenre" width="400" height="400"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-xs-12">
                    <hr>
                    <h2 style="font-size: 24px;">Comentários</h2>
                    <div class="event-comments">
                        <div id="disqus_thread"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .event-img {
        width: 100%;
        float: left;
        height: 200px;
        overflow: hidden;
        position: relative;
        margin-bottom: 30px;
    }

    .event-img img {
        width: 100%;
        float: left;
    }

    .event-img a {
        position: absolute;
        left: 30px;
        top: 15px;
        z-index: 999;
        font-size: 21px;
        color: #fff;
        background: #2A3F54;
        padding: 5px 10px;
    }

    .event-img.event-img-view {
        height: auto !important;
        text-align: center;
    }

    .event-img.event-img-view img {
        width: auto;
        float: none;
        display: inline-block;
    }

    .js-number-stars {
        padding-left: 15px;
    }
</style>
@endpush

@push('scripts')
<script>

    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    /*
     var disqus_config = function () {
     this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
     this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
     };
     */
    var disqus_config = function() {
        this.page.identifier = 'event_{{ $event->id }}';
    };
    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = '//SEM HORAstage.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<script id="dsq-count-scr" src="//SEM HORAstage.disqus.com/count.js" async></script>
<script type="text/javascript" src="{{ url('bower_components/chart.js/dist/Chart.js') }}"></script>
<script>
    function setFavorite( event, user, status, element )
    {
        var el = $(element);
        $.ajax({
            url: '{{ url('api/events/favorite') }}',
            method: 'POST',
            data: {
                user: user,
                event: event,
                status: (status ? 1 : 0)
            },
            success: function() {
                el.parent('div').find('.js-favorite').removeClass('hidden');
                el.addClass('hidden');
            }
        });
    }

    function setConfirm( event, user, status, element )
    {
        var el = $(element);
        $.ajax({
            url: '{{ url('api/events/confirm') }}',
            method: 'POST',
            data: {
                user: user,
                event: event,
                status: (status ? 1 : 0)
            },
            success: function() {
                el.parent('div').find('.js-confirm').removeClass('hidden');
                el.addClass('hidden');
            }
        });
    }


    (function($) {
        $('.event-eval-stars a')
                .mouseover(function() {
                    var star = $(this).data('star');
                    if( star == 1 ) {
                        $('.js-number-stars').text('1 estrela');
                    } else {
                        $('.js-number-stars').text( star + ' estrelas');
                    }
                })
                .mouseout(function() {
                    $('.js-number-stars').text('');
                })
                .click(function() {
                    var event = "{{ $event->id }}",
                        user = "{{ \Auth::user()->id }}",
                        star = $(this).data('star');
                    $.ajax({
                        url: '{{ url('api/events/evaluate') }}',
                        method: 'POST',
                        data: {
                            event: event,
                            user: user,
                            star: star
                        },
                        success: function( response ) {
                            console.log( response );
                            $('.event-actions-evaluate').html('<span class="text-success">Você já votou.</span>');
                        },
                        error: function( response ) {
                            console.log( response );
                        }
                    });
                });

        $('.js-zoom-img').click(function() {
            $(this).addClass('js-opened').removeClass('js-zoom-img');
            $(this).parent().toggleClass('event-img-view');
            $(this).find('.fa').toggleClass('fa-search-minus');
        });

        var eventAge = new Chart(document.getElementById("eventAge"), {
            type: 'pie',
            data: {
                labels: [
                    "0 a 20",
                    "20 a 30",
                    "30 a 40",
                    "40+"
                ],
                datasets: [
                    {
                        data: [
                            {{ $charts['birth']['0-20'] }},
                            {{ $charts['birth']['20-30'] }},
                            {{ $charts['birth']['30-40'] }},
                            {{ $charts['birth']['40>'] }}
                        ],
                        backgroundColor: [
                            "#FF6384",
                            "#36A2EB",
                            "#FFCE56",
                            "#73879C"
                        ],
                        hoverBackgroundColor: [
                            "#FF6384",
                            "#36A2EB",
                            "#FFCE56",
                            "#73879C"
                        ]
                    }
                ]
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

        var eventGenre = new Chart(document.getElementById("eventGenre"), {
            type: 'pie',
            data: {
                labels: [
                    "Homens",
                    "Mulheres"
                ],
                datasets: [
                    {
                        data: [
                            {{ $charts['genre']['masc'] }},
                            {{ $charts['genre']['fem'] }}
                        ],
                        backgroundColor: [
                            "#36A2EB",
                            "#FF6384"
                        ],
                        hoverBackgroundColor: [
                            "#36A2EB",
                            "#FF6384"
                        ]
                    }
                ]
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

    })(jQuery);
</script>
@endpush
