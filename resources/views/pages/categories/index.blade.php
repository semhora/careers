@extends('layouts.panel')
@section('title', 'Eventos')
@section('content')
    <div class="content" ng-app="list">
        <table id="dataTable" class="table table-bordered table-striped table-hover table-linked">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de criação</th>
                <th>Deletar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr data-href="{{ $category->edit_url }}">
                    <td class="linked">{{ $category->id }}</td>
                    <td class="linked">{{ $category->name }}</td>
                    <td class="linked">{{ $category->created }}</td>
                    <td>
                        <a href="{{ url( 'panel/categories/delete/' . $category->id ) }}" title="Deletar">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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
