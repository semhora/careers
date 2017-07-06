<?php $status = ['Desativado', 'Ativo']; ?>

<div class="row">
	<div class="col-md-12">
		<h1 class="page-header"> Eventos </h1>
	</div> <!-- .col-md-12 -->
</div> <!-- .row -->

<div class="row">
	<div class="col-md-12">
		<a href="/admin/add-event" class="btn btn-primary"> Adicionar Evento </a>
	</div> <!-- .col-md-12 -->
</div> <!-- .row -->

<div class="row">
	<div class="col-md-12 message">
		<?= $_SESSION['message'] ?>
	</div> <!-- .col-md-12 -->
</div> <!-- .row -->

<div class="row">
	<div class="col-md-12">
		<table class="table table-striped">

			<thead>
				<th> # </th>
				<th> Status </th>
				<th width='300'> Evento </th>
				<th> Início </th>
				<th> Termino </th>
				<th> &nbsp; </th>
			</thead>

			<tbody>
				<?php foreach($this->view->allEvents as $event): ?>
					<tr class='<?= ($event->status == 0)? 'disabled' : '' ?>'>
						<td> <?= $event->id ?> </td>
						<td> 
							<?= ($event->status == 0)? '<span class="label label-default">':'<span class="label label-success">' ?> 
							<?= $status[$event->status] ?> 
							</span> 
						</td>
						<td> <?= $event->title ?> </td>

						<td> <?= date('d/m/Y H:i:s', strtotime($event->starts_at)); ?> </td>
						
						<?php $enddate = ($event->ends_at == '')? '- - -' : date('d/m/Y H:i:s', strtotime($event->ends_at)); ?> 
						<td> <?= $enddate; ?> </td>
						
						<td>
							<div class="dropdown">
								<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									Ações
									<span class="caret"></span>
								</button>
								
								<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									<li><a href="/admin/event?id=<?= $event->id ?>"> Editar </a></li>
									<li role="separator" class="divider"></li>
									<li><a href="/admin/delete-event?id=<?= $event->id ?>" class="delete"> Excluir </a></li>
								</ul>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>

		</table>
	</div> <!-- .col-md-12 -->
</div> <!-- .row -->