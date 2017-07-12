<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - SEM HORA - ADMIN</title>

    <link rel="stylesheet" href="{{ url('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="{{ url('css/custom.css') }}">

    <script src="{{ url('js/pace/pace.min.js') }}"></script>

    @stack('styles')

    <style>
        .right_col {
            background: #fff;
        }
        .main-footer {
            height: 50px;
            line-height: 50px;
            padding: 0;
            width: 100%;
            float: left;
            position: absolute;
            bottom: 0;
            right: 0;
        }

        .main-footer p {
            margin-bottom: 0;
        }

        .left_col {
            padding: 0;
        }

        .container-fluid.body {
            padding: 0;
        }

        .btn-menu-toggle,
        .btn-menu-toggle .fa {
            width: 58px;
            padding: 0;
            text-align: center;
            line-height: 58px;
            float: left;
        }

        .side-mob {
            position: absolute;
            width: 94px;
            left: 0;
            top: 0;
            z-index: 999;
            height: 100%;
            background: #2A3F54;
            display: block !important;
        }
        .side-mob .left_col {
            width: 100%;
            float: left;
            height: 100%;
        }
    </style>

</head>
<body class="nav-md">
    <div class="container-fluid body">
        @include('includes.sidebar')
        <div class="col-lg-10 col-md-9 col-sm-9 right_col" role="main" style="padding: 0 !important;">
            @include('includes.header')
            <div id="works" class="clearfix grid" style="float: left; width: 100%; padding: 15px 15px 65px;">
                @if( Session::has('success') )
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if( Session::has('error') )
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ Session::get('error') }}
                    </div>
                @endif
                @yield('content')
            </div>
            <footer class="main-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                            <p class="pull-right">© 2017 - SEM HORA</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/custom.js') }}"></script>
    <script src="{{ url('js/main.js') }}"></script>

    <script>
        (function ($) {
            $(window).load(function() {
                $('#works').each(function() {
                    var hc = $('.top_nav').innerHeight();
                    var total = $(window).innerHeight() - hc;
                    $(this).css('min-height', total - 80 );
                });
            });

            $("#menu_toggle").on("click", function(event)
            {
                $('.js-left-col').addClass('side-mob');
                event.stopPropagation();
            });

            $(".js-left-col").on("click", function(event)
            {
                event.stopPropagation();
            });

            $(document).on("click", function(event)
            {
                $(".js-left-col").removeClass('side-mob');
            });
        })(jQuery);
        function Mudarestado(el) {
            var display = document.getElementById(el).style.display;

            if(display == "none")
                document.getElementById(el).style.display = 'block';
            else
                document.getElementById(el).style.display = 'none';
        }
    </script>

    @stack('scripts')

</div>
</body>
</html>
