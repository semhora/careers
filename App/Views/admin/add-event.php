<h1 class="page-header"> Adicionar Evento </h1>

<div class="container">

	<form method="post" action="/admin/event/save" class="form" enctype="multipart/form-data">
	
		<input type="hidden" name="action" value="insert">

		<div class="row">

			<div class="col-md-12 col-xs-12">
				<div class="form-group">
					<label for='cpTitle'> Titulo </label>
					<input type="text" name="title" class="form-control" required>
				</div> <!-- .form-control -->
			</div> <!-- .col-md-4 -->

		</div> <!-- .row -->

		<div class="row">

			<div class="col-md-6 col-xs-12">
				<div class="form-group">
					<label for='cpTitle'> Início do Enveto </label>
					<input type="datetime-local" name="starts_at" class="form-control" required>
				</div> <!-- .form-control -->
			</div> <!-- .col-md-2 -->

			<div class="col-md-6 col-xs-12">
				<div class="form-group">
					<label for='cpTitle'> Término do evento </label>
					<input type="datetime-local" name="ends_at" class="form-control">
				</div> <!-- .form-control -->
			</div> <!-- .col-md-2 -->

		</div> <!-- .row -->

		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="form-group">
					<div class="form-group">
						<label for='cpTitle'> Endereço </label>
						<input type="text" name="address" class="form-control" required>
					</div> <!-- .form-control -->
				</div> <!-- .form-group -->
			</div> <!-- .col-md-12 .col-xs-12 -->
		</div> <!-- .row -->

		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="form-group">
					<label for='cpTitle'> Descrição </label>
					<textarea name="description" rows="5" class="form-control"></textarea>
				</div> <!-- .form-control -->
			</div> <!-- .col-md-12 -->
		</div> <!-- .row -->

		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="form-group">
					<select name='status' class="form-control">
						<option value="0"> Desativado </option>
						<option value="1"> Ativado </option>
					</select> <!-- .status -->
				</div> <!-- .form-group -->
			</div> <!-- .col-md-12 -->
		</div> <!-- .row -->

		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label> Imagem </label>
					<input type="file" name="imagem">
				</div> <!-- .form-group -->
			</div> <!-- .col-md-12 -->
		</div> <!-- .row -->

		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="form-group">
					<input type="submit" value="Salvar" class="btn btn-success">
				</div> <!-- .form-group -->
			</div> <!-- .col-md-4 -->
		</div> <!-- .row -->
	</form>	

</div> <!-- .container -->