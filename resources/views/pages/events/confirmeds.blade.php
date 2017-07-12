@extends('layouts.panel')
@section('title', 'Eventos')
@section('content')
    <div class="content" ng-app="list">
        <h4>Eventos que confirmei presença.</h4>
        @if( isset($events) )
        <table id="dataTable" class="table table-bordered table-striped table-hover table-linked">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Início/Fim</th>
                <th>Confirmados</th>
                <th>Detalhes</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                @if( $event->is_confirmed )
                    <tr data-href="{{ (\Auth::user()->role == 'user' ? url('panel/events/details/' . $event->id) : $event->edit) }}">
                        <td class="linked">{{ $event->id }}</td>
                        <td class="linked">{{ $event->name }}</td>
                        <td class="linked">R$ {{ $event->value }}</td>
                        <td class="linked">{{ $event->status }}</td>
                        <td class="linked">{{ $event->init }} - {{ $event->end }}</td>
                        <td class="linked">{{ $event->total_confirmeds }}</td>
                        <td><a href="{{ url('panel/events/details/' . $event->id) }}">Ver detalhes</a></td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        @else
        <h2>Você não está confirmado em nenhum evento</h2>
        @endif
    </div>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
<style>
    .linked {
        cursor: pointer;
    }
</style>
@endpush

@push('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
<script>
    (function($) {

        $('.linked').click(function() {
            var href = $(this).parent('tr').data('href');
            window.location = href;
        });

        var dataTable = $('#dataTable').DataTable({
            paging: true,
            lengthChange: false,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            language: {
                processing:     "Traitement en cours...",
                search:         "Buscar item",
                lengthMenu:    "Mostrando _MENU_ items",
                info:           "Mostrando de _START_ &agrave; _END_, total: _TOTAL_ items.",
                infoEmpty:      "",
                infoFiltered:   "(_MAX_ items)",
                infoPostFix:    "",
                loadingRecords: "Chargement en cours...",
                zeroRecords:    "Nenhum item encontrado.",
                emptyTable:     "Nenhum item.",
                paginate: {
                    first:      "Primeira",
                    previous:   "Anterior",
                    next:       "Próxima",
                    last:       "Última"
                }
            }
        });
    })(jQuery);
</script>
@endpush
