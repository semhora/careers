<?php
session_start();
require '_conf/func.php';
$EvObj = new Eventos();
if ( isset($_GET['p']) && strcasecmp( $_GET['p'], 'logout' ) == 0 ){
	session_destroy();
	$EvObj->logged = false;
	header('Location: ?p=admin');
	die();
}
if ( isset($_GET['del']) ){
	if($EvObj->DeletarEvento($_GET['del'])){
		$EvObj->Alert("Evento Deletado!");
	}
}
if (isset($_POST['usuario']) && isset($_POST['senha']) ){
	if($EvObj->Login($_POST['usuario'],$_POST['senha']))
	{
		$EvObj->Alert("Bem vindo!");
		$EvObj->logged = true;
	}else{
		$EvObj->Alert("Erro ao realizar o Login!");
	}
}
else if (isset($_POST['cadusuario']) && isset($_POST['cadsenha']) ){
	if($EvObj->CadastroUser($_POST['cadusuario'],$_POST['cadsenha']))
	{
		$EvObj->Alert("Cadastro efetuado com sucesso!");
	}else{
		$EvObj->Alert("Erro ao realizar o cadastro!");
	}
}else if (isset($_POST['nome']) && isset($_POST['descr']) && isset($_POST['local']) && isset($_POST['dataevento']) && isset($_POST['horaevento']) && isset($_POST['status'])){
	if($EvObj->CadastroEvento($_POST['nome'],$_POST['descr'],$_POST['local'],$_POST['dataevento'],$_POST['horaevento'],$_POST['status'],$_FILES["imagem"]["name"]))
	{
		if($EvObj->EnviarImg($_FILES["imagem"])){
			$EvObj->Alert("Cadastro efetuado com sucesso!");
		}else{
			$EvObj->Alert("Cadastro efetuado com sucesso, Problemas com a imagem!");
		}
	}else{
		$EvObj->Alert("Erro ao realizar o cadastro!");
	}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Eventos</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript">
	function UpdateDesc( id , descmin , descmax)
	{
		var MeuObj = document.getElementById("edesc"+id);
		MeuObj.innerHTML=descmax;
		document.getElementById("eimg"+id).scrollIntoView();
		console.log("called " + id);
	}
	</script>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Sistema de Eventos</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Eventos</a>
                    </li>
					<?php if($EvObj->logged == false){ ?>
                    <li>
                        <a href="index.php?p=admin">Admin</a>
                    </li><?php }else{ ?>
					<li>
                        <a href="index.php?p=caduser">Cadastro de Usuário</a>
                    </li>
					<li>
                        <a href="index.php?p=cadev">Cadastro de Evento</a>
                    </li>
					<li>
                        <a href="index.php?p=logout">Logout</a>
                    </li>
					<?php } ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $EvObj->title; ?>
                </h1>
            </div>
        </div>
		<?php
		if ( $EvObj->login == true && $EvObj->logged == false ){
			?>
		<div class="col-md-12 row">
			<div class="span12">
				<form class="form-group row" action='' method="POST">
				  <fieldset>
					<div class="col-xs-12">
					  <label class="control-label" for="usuario">Usuário</label>
					  <div class="controls">
						<input type="text" id="usuario" name="usuario" placeholder="" class="form-control" required>
					  </div>
					</div>
					<div class="col-xs-12">
					  <label class="control-label" for="senha">Senha</label>
					  <div class="controls">
						<input type="password" id="senha" name="senha" placeholder="" class="form-control" required>
					  </div>
					</div>
					<div class="col-xs-12" style="height:10px;"></div>
					<div class="col-xs-12">
						<button class="btn btn-success">Login</button>
					</div>
				  </fieldset>
				</form>
			</div>
		</div>	
			<?php
		}else if (strcasecmp( $EvObj->currentpage, 'caduser' ) == 0){
			?>
		<div class="col-md-12 row">
			<div class="span12">
				<form class="form-group row" action='' method="POST">
				  <fieldset>
					<div class="col-xs-12">
					  <label class="control-label" for="cadusuario">Usuário</label>
					  <div class="controls">
						<input type="text" id="cadusuario" name="cadusuario" placeholder="" class="form-control" required>
					  </div>
					</div>
					<div class="col-xs-12">
					  <label class="control-label" for="cadsenha">Senha</label>
					  <div class="controls">
						<input type="password" id="cadsenha" name="cadsenha" placeholder="" class="form-control" required>
					  </div>
					</div>
					<div class="col-xs-12" style="height:10px;"></div>
					<div class="col-xs-12">
						<button class="btn btn-success">Cadastrar</button>
					</div>
				  </fieldset>
				</form>
			</div>
		</div>	
			<?php
		}
		else if (strcasecmp( $EvObj->currentpage, 'cadev' ) == 0){
			?>
		<div class="col-md-12 row">
			<div class="span12">
				<form class="form-group row" action='' method="POST" enctype="multipart/form-data">
				  <fieldset>
					<div class="col-xs-12">
					  <label class="control-label" for="nome">Nome do Evento</label>
					  <div class="controls">
						<input type="text" id="nome" name="nome" placeholder="" class="form-control" required>
					  </div>
					</div>
					<div class="col-xs-12">
					  <label class="control-label" for="descr">Descrição do Evento</label>
					  <div class="controls">
					    <textarea class="form-control" rows="5" id="descr" name="descr" required></textarea>
					  </div>
					</div>
					<div class="col-xs-6">
					  <label class="control-label" for="local">Local do Evento</label>
					  <div class="controls">
						<input type="text" id="local" name="local" placeholder="" class="form-control" required>
					  </div>
					</div>
					<div class="col-xs-6">
					  <label class="control-label" for="dataevento">Data do Evento</label>
					  <div class="controls">
						<input type="date" id="dataevento" name="dataevento" placeholder="" class="form-control" required>
					  </div>
					</div>
					<div class="col-xs-6">
					  <label class="control-label" for="horaevento">Horário do Evento</label>
					  <div class="controls">
						<input type="time" id="horaevento" name="horaevento" placeholder="" class="form-control" required>
					  </div>
					</div>
					<div class="col-xs-6">
					  <label class="control-label" for="status">Status</label>
					  <div class="controls">
						<select class="form-control" id="status" name="status" required>
							<option value="1">Ativado</option>
							<option value="0">Desativado</option>
						</select>
					  </div>
					</div>
					<div class="col-xs-12">
					  <label class="control-label" for="imagem">Imagem</label>
					  <div class="controls">
						<input class="form-control" type="file" name="imagem" id="imagem" required>
					  </div>
					</div>
					<div class="col-xs-12" style="height:10px;"></div>
					<div class="col-xs-6">
						<button class="btn btn-success">Cadastrar</button>
					</div>
				  </fieldset>
				</form>
			</div>
		</div>	
			<?php
		}else{
			$EvObj->ListaEventos();
		}
		?>
        <hr>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Sistema de Eventos</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>