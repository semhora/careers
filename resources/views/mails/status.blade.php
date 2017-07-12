<html>
    <head>
        <title>Evento {{ $status }}</title>
    </head>
    <body>
        <h1>Evento {{ $name }} foi {{ $status }}.</h1>
        <p>{{ $description }}</p>
        @if( $get_status == 'open' )
            <p><a href="{{ $url }}" target="_blank">Acessar link</a></p>
        @endif
    </body>
</html>