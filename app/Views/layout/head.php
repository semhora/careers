<html>
<head>
    <title>SemHora Test</title>

    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/jquery/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=getUrl('home')?>">SemHora Teste</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?=getUrl('home')?>">Home</a></li>

                <?php if (session()->get('logged')): ?>
                <li class="dropdown">
                    <a href="#"
                       class="dropdown-toggle"
                       data-toggle="dropdown"
                       role="button"
                       aria-haspopup="true"
                       aria-expanded="false">Eventos <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?=getUrl('home');?>">Listar</a></li>
                        <li><a href="<?=getUrl('new_event');?>">Cadastrar</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#"
                       class="dropdown-toggle"
                       data-toggle="dropdown"
                       role="button"
                       aria-haspopup="true"
                       aria-expanded="false">Usuários <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?=getUrl('user_list');?>">Listar</a></li>
                        <li><a href="<?=getUrl('user_new');?>">Cadastrar</a></li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                <?php if (session()->get('logged')): ?>
                <li class="dropdown">
                    <a href="#"
                       class="dropdown-toggle"
                       data-toggle="dropdown"
                       role="button"
                       aria-haspopup="true"
                       aria-expanded="false"><?= session()->get('username'); ?> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?=getUrl('logout');?>">Sair</a></li>
<!--                        <li><a href="#">Cadastrar</a></li>-->
                    </ul>
                </li>
                <?php else: ?>
                <a href="<?=getUrl('login');?>">Login</a>
<!--                <li><a href="../navbar-static-top/">Static top</a></li>-->
<!--                <li class="active"><a href="./">Fixed top <span class="sr-only">(current)</span></a></li>-->
                <?php endif; ?>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container">
    <div class="col-md-6">
        <?php
        foreach (session()->getFlashBag()->get('success', array()) as $message) {
            echo '<div class="alert alert-success">'.$message.'</div>';
        }
        foreach (session()->getFlashBag()->get('error', array()) as $message) {
            echo '<div class="alert alert-danger">'.$message.'</div>';
        }
        foreach (session()->getFlashBag()->get('notice', array()) as $message) {
            echo '<div class="alert alert-warning">'.$message.'</div>';
        }
        ?>
    </div>
</div>
<div class="container">
