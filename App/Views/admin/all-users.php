<?php $status = ['Desativado', 'Ativo']; ?>

<div class="row">
	<div class="col-md-12">
		<h1 class="page-header"> Usuários </h1>
	</div> <!-- .col-md-12 -->
</div> <!-- .row -->

<div class="row">
	<div class="col-md-12">
		<a href="/admin/add-user" class="btn btn-primary"> Adicionar Usuário </a>
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
				<th width='300'> Nome </th>
				<th> E-mail </th>
				<th> &nbsp; </th>
			</thead>

			<tbody>
				<?php foreach($this->view->allUsers as $user): ?>
					<tr class='<?= ($user->status == 0)? 'disabled' : '' ?>'>
						<td> <?= $user->id ?> </td>
						<td> 
							<?= ($user->status == 0)? '<span class="label label-default">':'<span class="label label-success">' ?> 
							<?= $status[$user->status] ?> 
							</span> 
						</td>
						<td> <?= $user->name ?> </td>

						<td> <?= $user->email ?> </td>

						<td>
							<div class="dropdown">
								<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									Ações
									<span class="caret"></span>
								</button>
								
								<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
									<li><a href="/admin/user?id=<?= $user->id ?>"> Editar </a></li>
									<li role="separator" class="divider"></li>
									<li><a href="/admin/delete-user?id=<?= $user->id ?>" class="delete"> Excluir </a></li>
								</ul>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>

		</table>
	</div> <!-- .col-md-12 -->
</div> <!-- .row -->