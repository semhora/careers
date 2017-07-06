<h1 class="page-header"> Adicionar usuário </h1>

<div class="container">

	<form method="post" action="/admin/user/save" class="form">
	
		<input type="hidden" name="action" value="insert">

		<div class="row">

			<div class="col-md-12 col-xs-12">
				<div class="form-group">
					<label for='cpTitle'> Nome </label>
					<input type="text" name="name" class="form-control" required>
				</div> <!-- .form-control -->
			</div> <!-- .col-md-4 -->

		</div> <!-- .row -->

		<div class="row">

			<div class="col-md-12 col-xs-12">
				<div class="form-group">
					<label for='cpTitle'> E-mail </label>
					<input type="text" name="email" class="form-control" required>
				</div> <!-- .form-control -->
			</div> <!-- .col-md-4 -->

		</div> <!-- .row -->

		<div class="row">

			<div class="col-md-6 col-xs-12">
				<div class="form-group">
					<label for='cpTitle'> Login </label>
					<input type="text" name="login" class="form-control" value="<?= $this->view->user->login ?>" required>
				</div> <!-- .form-control -->
			</div> <!-- .col-md-2 -->

			<div class="col-md-6 col-xs-12">
				<div class="form-group">
					<label for='cpTitle'> Senha </label>
					<input type="password" name="password" class="form-control" required>
				</div> <!-- .form-control -->
			</div> <!-- .col-md-2 -->

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
			<div class="col-md-12 col-xs-12">
				<div class="form-group">
					<input type="submit" value="Salvar" class="btn btn-success">
				</div> <!-- .form-group -->
			</div> <!-- .col-md-4 -->
		</div> <!-- .row -->
	</form>	

	</form>	

</div> <!-- .container -->