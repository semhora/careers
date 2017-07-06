<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<title> <?= ($this->view->page_title)? $this->view->page_title : 'EventSys' ?>  </title>

	<link rel="stylesheet" type="text/css" href="/assets/style.min.css?v=0.1">

</head>
<body>

	<div id="page" class="site logged">

		<nav class="navbar navbar-inverse navbar-fixed-top">
	      	<div class="container-fluid">

	        	<div class="navbar-header">
	          		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            		<span class="sr-only">Toggle navigation</span>
	            		<span class="icon-bar"></span>
	            		<span class="icon-bar"></span>
	            		<span class="icon-bar"></span>
	          		</button>
	          		
	          		<a class="navbar-brand" href="/admin/events"> EventSys </a>
	        	</div> <!-- .navbar-header -->
	        	
	        	<div id="navbar" class="navbar-collapse collapse">
	          		<ul class="nav navbar-nav navbar-right">
	            		<li><a href="/admin/logout"> Sair </a></li>
	          		</ul>
	        	</div> <!-- #navbar -->

	      	</div> <!-- .container-fluid -->
	    </nav> <!-- .navbar .navbar-inverse .navbar-fixed-top -->


		<div class="container-fluid">
			<div class="row">

				<div class="col-sm-3 col-md-2 sidebar">

					<ul class="nav nav-sidebar">
						<!-- <li class="<?= ($url == '/admin/dashboard')? 'active' : '' ?>" >
							<a href="/admin/dashboard"> Dashboard </a>
						</li> -->
						
						<li class="<?= ($url == '/admin/events')? 'active' : '' ?>" >
							<a href="/admin/events"> Eventos </a>
						</li>
						
						<li class="<?= ($url == '/admin/profile')? 'active' : '' ?>" >
							<a href="/admin/users"> Usuários </a>
						</li>
					</ul>

				</div> <!-- .sidebar --> 

				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">