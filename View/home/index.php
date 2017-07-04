<html>
    <head>
        <?php include_once(getcwd() . '/View/includes/includes.html'); ?>

        <title>Cadastro</title>
    </head>
    <body>
        <div class="container">
            <?php include_once(getcwd() . '/View/includes/header.php'); ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12"> 

                    <div class="page-header">
                        <h1><small>Home</small></h1>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12"> 
                    <div class="page-header">
                        <?php if (isset($_SESSION['user']['id'])) { ?>
                            <h1>Bem Vindo <?php echo utf8_encode($_SESSION['user']['nome']); ?>!</h1>
                        <?php } else { ?>
                            <h1>Você não está logado no sistema.</h1>
                        <?php } ?>
                    </div>
                </div>
            </div>
    </body>
</html>
