<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SEM HORA - ADMIN</title>

    <!-- Estilo das paginas -->
      <script src="/js/jquery.min.js"></script>
      <link href="/css/bootstrap.min.css" rel="stylesheet">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/i18n/defaults-*.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link href="/css/awesome/font-awesome.css" rel="stylesheet">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="/assets/gallery/blueimp-gallery.min.css">
  		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<link rel="stylesheet" type="text/css" href="/css/isotope.css" media="screen" />
  		<link rel="stylesheet" href="/css/animate.css">
      <link rel="stylesheet" href="/css/style.css">
      <link rel="stylesheet" href="/assets/animate/animate.css" />
      <link rel="stylesheet" href="/assets/animate/set.css" />
      <link href="/css/animate.min.css" rel="stylesheet">
      <link href="/css/custom.css" rel="stylesheet">
      <link href="/css/icheck/flat/green.css" rel="stylesheet" />
      <link href="/css/floatexamples.css" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body class="nav-md">
    <div class="container body">

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="/images/user.png" alt="">{{ Auth::user()->nome }}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  </li>
                  <li>
                    <a href="{{ URL('user/profile')}}">Perfil</a>
                  </li>
                  <li><a href="{{url('user/logout')}}"><i class="fa fa-sign-out pull-right"></i> SAIR</a>
                  </li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                  <li>
                    <a>
                      <span class="image">
                                        <img src="/images/user.png" alt="Profile Image" />
                                    </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="/images/user.png" alt="Profile Image" />
                     </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="/images/user.png" alt="Profile Image" />
                                    </span>

                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image">
                                        <img src="/images/user.png" alt="Profile Image" />
                                    </span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>

      </div>

      <!-- /top navigation -->
<div class="col-md-3 left_col">
                  <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                      <a href="{{ url('user/home')}}" class="site_title"><i class="fa fa-location-arrow"></i> <span>SEM HORA</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <div class="profile">
                      <div class="profile_pic">
                        <img src="/images/user.png" alt="..." class="img-circle profile_img">
                      </div>
                      <div class="profile_info">
                        <span>Bem vindo(a),</span>
                        <h2> {{ Auth::user()->nome }} </h2>
                      </div>
                    </div>

                    <br />

                <!-- Barra lateral -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                  <div class="menu_section">
                    <h3>Geral</h3>
                    <ul class="nav side-menu">
                      <li><a><i class="fa fa-home"></i> Eventos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                          <li><a href="{{ url('user/home') }}">Geral</a>
                          </li>
                          <li><a href="{{ url('user/confirmed') }}">Confirmados</a>
                          </li>
                        </ul>
                      </li>
                      <li><a href="{{url('user/profile')}}"><i class="fa fa-edit"></i> Meu Perfil</a></li>
                      <li><a href="{{ url('user/logout') }}"><i class="fa fa-sign-out pull-right"></i>Sair</a>
                    </ul>
                  </div>
                </div>
                    <!-- /sidebar menu -->
                </div>
                </div>

    @yield('content')
    <!-- FIM DO CONTEÚDO -->

  <footer>
    <div class="copyright-info">
      <p class="pull-right">© 2017 - SEM HORA
      </p>
    </div>
    <div class="clearfix"></div>
  </footer>

  <!-- bootstrap progress js -->
  <script src="/js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="/js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="/js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="/js/moment/moment.min.js"></script>
  <script type="text/javascript" src="/js/datepicker/daterangepicker.js"></script>
  <!-- chart js -->
  <script src="/js/chartjs/chart.min.js"></script>

  <script src="/js/custom.js"></script>

  <!-- slide galeria -->
  <script src="/js/jquery.isotope.min.js"></script>
	<script src="/js/skrollr.min.js"></script>
	<script src="/js/jquery.scrollTo-1.4.3.1-min.js"></script>
	<script src="/js/jquery.localscroll-1.2.7-min.js"></script>
  <script src="/js/main.js"></script>

  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="/js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="/js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="/js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="/js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="/js/flot/date.js"></script>
  <script type="text/javascript" src="/js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="/js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="/js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="/js/flot/jquery.flot.resize.js"></script>
  <script>
    $(document).ready(function() {
      // [17, 74, 6, 39, 20, 85, 7]
      //[82, 23, 66, 9, 99, 6, 2]
      var data1 = [
        [gd(2012, 1, 1), 17],
        [gd(2012, 1, 2), 74],
        [gd(2012, 1, 3), 6],
        [gd(2012, 1, 4), 39],
        [gd(2012, 1, 5), 20],
        [gd(2012, 1, 6), 85],
        [gd(2012, 1, 7), 7]
      ];

      var data2 = [
        [gd(2012, 1, 1), 82],
        [gd(2012, 1, 2), 23],
        [gd(2012, 1, 3), 66],
        [gd(2012, 1, 4), 9],
        [gd(2012, 1, 5), 119],
        [gd(2012, 1, 6), 6],
        [gd(2012, 1, 7), 9]
      ];
      $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
        data1, data2
      ], {
        series: {
          lines: {
            show: false,
            fill: true
          },
          splines: {
            show: true,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
            radius: 0,
            show: true
          },
          shadowSize: 2
        },
        grid: {
          verticalLines: true,
          hoverable: true,
          clickable: true,
          tickColor: "#d5d5d5",
          borderWidth: 1,
          color: '#fff'
        },
        colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
        xaxis: {
          tickColor: "rgba(51, 51, 51, 0.06)",
          mode: "time",
          tickSize: [1, "day"],
          //tickLength: 10,
          axisLabel: "Date",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: 'Verdana, Arial',
          axisLabelPadding: 10
            //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
        },
        yaxis: {
          ticks: 8,
          tickColor: "rgba(51, 51, 51, 0.06)",
        },
        tooltip: false
      });

      function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
      }
    });
  </script>

  <!-- worldmap -->
  <script type="text/javascript" src="js/maps/jquery-jvectormap-2.0.3.min.js"></script>
  <script type="text/javascript" src="js/maps/gdp-data.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script type="text/javascript" src="js/maps/jquery-jvectormap-us-aea-en.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>

  <!-- dashbord linegraph -->
  <script>
    Chart.defaults.global.legend = {
      enabled: false
    };

    var data = {
      labels: [
        "Symbian",
        "Blackberry",
        "Other",
        "Android",
        "IOS"
      ],
      datasets: [{
        data: [15, 20, 30, 10, 30],
        backgroundColor: [
          "#BDC3C7",
          "#9B59B6",
          "#455C73",
          "#26B99A",
          "#3498DB"
        ],
        hoverBackgroundColor: [
          "#CFD4D8",
          "#B370CF",
          "#34495E",
          "#36CAAB",
          "#49A9EA"
        ]

      }]
    };

    var canvasDoughnut = new Chart(document.getElementById("canvas1"), {
      type: 'doughnut',
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: data
    });
  </script>
  <!-- /dashbord linegraph -->
  <!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      }

      var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2020',
        dateLimit: {
          days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Clear',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
        }
      };
      $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
      $('#reportrange').daterangepicker(optionSet1, cb);
      $('#reportrange').on('show.daterangepicker', function() {
        console.log("show event fired");
      });
      $('#reportrange').on('hide.daterangepicker', function() {
        console.log("hide event fired");
      });
      $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
      });
      $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
      });
      $('#options1').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
      });
      $('#options2').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
      });
      $('#destroy').click(function() {
        $('#reportrange').data('daterangepicker').remove();
      });
    });
  </script>
  <script>
  function Mudarestado(el) {
    var display = document.getElementById(el).style.display;

    if(display == "none")
        document.getElementById(el).style.display = 'block';
    else
        document.getElementById(el).style.display = 'none';
}
  </script>

</div>
</body>
</html>
