@extends('layouts.panel')
@section('title', 'Ínicio')
@section('content')
	<div class="content" ng-app="list">
		<!-- Galeria aqui -->
		<div id="app" class="app" ng-controller="ListController">
			<div class="col-xs-12 form-horizontal" style="padding-bottom: 15px; text-align: left;">
				<label for="search" class="control-label pull-left">Pesquisar</label>
				<input type="text" ng-model="searchBy" class="form-control pull-left"  style="width: auto; margin: 0 10px;" placeholder="Digite o nome...">

				<div class="form-group pull-left" style="margin-right: 10px;">
                    <select ng-model="get_categories" class="form-control" style="float: left; width: auto;">
                        <option value="">Categoria</option>
                        @foreach( $categories as $category )
                            <option value="{{ $category['name'] }}">{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>

				<div class="form-group pull-left" style="margin-right: 10px;">
                    <select ng-model="value" class="form-control" style="float: left; width: auto;">
                        <option value="">Ordernação</option>
                        <option value="value">Menor preço</option>
                        <option value="-value">Maior preço</option>
                        <option value="-name">Nome (z-a)</option>
                        <option value="name">Nome (a-z)</option>
                        <option value="init_at">Início (a-z)</option>
                        <option value="-init_at">Início (z-a)</option>
                        <option value="end_at">Fim (a-z)</option>
                        <option value="-end_at">Fim (z-a)</option>
                        <option value="+distance">Perto</option>
                        <option value="-distance">Longe</option>
                    </select>
                </div>

                <div class="form-group pull-left">
                    <select ng-model="maxVal" class="form-control" style="width: auto;">
                        <option value="" selected>Faixa de preço</option>
                        <option value="1000">Até R$ 10,00</option>
                        <option value="2000">Até R$ 20,00</option>
                        <option value="3000">Até R$ 30,00</option>
                        <option value="4000">Até R$ 40,00</option>
                        <option value="5000">Até R$ 50,00</option>
                        <option value="50>">Maior que R$ 50,00</option>
                    </select>
                </div>

				<button type="button" class="btn btn-success pull-right" onclick="Mudarestado('minhaDiv')">Mostrar/Ocultar Preferidos</button>
			</div>
			<div id="minhaDiv"  style="display:none">
				<h3> Seus preferidos: </h3>
				<div class="row line-row">
					<div class="hr">&nbsp;</div>
				</div>
				<div class="row">
					<?php foreach ($preferences as $event): ?>
						<div class="col-sm-6 col-md-4">
							<div class="event-item">
								<div class="thumbnail">
									<img src="{{ $event->foto }}" class="img-responsive" alt="">
								</div>
								<div class="event-item-content">
									<h3 class="event-item-name">{{ $event->name  }}</h3>
									<div class="event-item-hover">
										<p>{{ $event->description  }}</p>
										<p>R$ {{ $event->value  }} - Início: {{ $event->init  }}</p>
										<div class="event-item-hover-footer">
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
											<a href="{{ $event->url  }}" class="btn btn-primary" role="button">Detalhes</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="panel panel-primary">
				</div>
			</div>
			<div>
				<div>
					<div class="col-sm-6 col-md-4"
                         data-ng-repeat="event in events
                         | filter: { name: searchBy, get_categories: get_categories }
                         | priceRange: maxVal
                         | orderBy: value">
						<div class="event-item">
							<div class="thumbnail" ng-if="event.foto">
								<img src="[[ event.foto ]]" class="img-responsive" alt="">
							</div>
							<div class="event-item-content">
								<h3 class="event-item-name">[[ event.name ]]</h3>
								<div class="event-item-hover">
									<p>[[ event.description ]]</p>
									<p>R$ [[ event.value ]] - Início: [[ event.init ]]</p>
									<div class="event-item-hover-footer">
										<a href="[[ event.url ]]" class="btn btn-primary" role="button">Detalhes</a>
                                        <div class="pull-left">
                                            <a href="javascript:;" ng-click="confirm( event.id, $event, false )" class="btn js-confirm false btn-info" ng-class="{'hidden': event.is_confirmed}" role="button">
                                                Confirmar presença
                                            </a>
                                            <a href="javascript:;" ng-click="confirm( event.id, $event, true )" class="btn js-confirm true btn-success" ng-class="{'hidden': !event.is_confirmed}" role="button">
                                                <i class="fa fa-heart"></i>
                                                Confirmado
                                            </a>
                                        </div>

										<div class="pull-left">
											<a href="javascript:;" ng-click="favorite( event.id, $event, false )" class="btn js-favorite false btn-default text-danger" ng-class="{'hidden': event.is_favorite}" role="button">
												<i class="fa fa-heart text-danger"></i>
												Favoritar
											</a>
                                            <a href="javascript:;" ng-click="favorite( event.id, $event, true )" class="btn js-favorite true btn-danger" ng-class="{'hidden': !event.is_favorite}" role="button">
                                                <i class="fa fa-heart"></i>
                                                Favorito
                                            </a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">
<style>
	.app .bootstrap-select {
		float: left !important;
		margin: 0 15px;
		max-width: 120px !important;
	}
	.app .bootstrap-select .filter-option {
		color: #ffffff;
	}
	.event-item {
		width: 100%;
		float: left;
		position: relative;
		margin-bottom: 15px;
	}
	.event-item-hover p {
		margin-bottom: 15px;
	}
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
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


	var app = angular.module('list', [], function($interpolateProvider) {
		$interpolateProvider.startSymbol('[[');
		$interpolateProvider.endSymbol(']]');
	});

    app.filter('priceRange', function () {
        return function ( events, value ) {
            var filteredItems = [];
            angular.forEach(events, function ( event ) {
                if( value == null ) {
                    filteredItems.push(event);
                } else if ( value == '50>' ) {
                    if ( event.price > 0 ) {
                        filteredItems.push(event);
                    }
                } else {
                    if ( event.price <= value ) {
                        filteredItems.push(event);
                    }
                }
            });
            return filteredItems;
        }
    });

	app.controller('ListController', ['$scope', '$http', function( $scope, $http ) {
		$scope.events = {!! (isset($json) ? $json : null) !!};

		$scope.order = 'name';

		$scope.setOrder = function (order) {
			$scope.order = order;
		};

		$scope.confirm = function( event, $event, status )
		{
			$http({
				method: 'POST',
				url: '{{ url('api/events/confirm') }}',
				data: {
					event: event,
					user: {{ \Auth::user()->id }},
                    status: status
				}
			}).then(function successCallback(response) {
                if(status == true) {
                    $($event.target).parent().parent().find('.js-confirm.false').removeClass('hidden');
                } else {
                    $($event.target).parent().parent().find('.js-confirm.true').removeClass('hidden');
                }
                if( $($event.target).hasClass('fa') ) {
                    $($event.target).parent().addClass('hidden');
                } else {
                    $($event.target).addClass('hidden');
                }
			});
		};


		$scope.favorite = function( event, $event, status )
		{
			$http({
				method: 'POST',
				url: '{{ url('api/events/favorite') }}',
				data: {
					event: event,
					user: {{ \Auth::user()->id }},
                    status: status
				}
			}).then(function successCallback(response) {
                if(status == true) {
                    $($event.target).parent().parent().find('.js-favorite.false').removeClass('hidden');
                } else {
                    $($event.target).parent().parent().find('.js-favorite.true').removeClass('hidden');
                }

                if( $($event.target).hasClass('fa') ) {
                    $($event.target).parent().addClass('hidden');
                } else {
                    $($event.target).addClass('hidden');
                }
			});
		};

	}]);
</script>
@endpush
