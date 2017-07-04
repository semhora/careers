<html>
    <head>
        <?php include_once(getcwd() . '/View/includes/includes.html'); ?>

        <title>Login</title>
    </head>
    <body>  
        <div class="container">
            <?php include_once(getcwd() . '/View/includes/header.php'); ?>  
            <div class="row main">
                <div class="panel-heading">
                    <div class="panel-title text-center">
                        <h1 class="title">Sistema de Eventos</h1>
                        <hr />
                    </div>
                </div> 
                <div class="main-login main-center">
                    <div class="container">

                        <div class="row">                
                            <div class="col-lg-2 col-md-2 col-sm-2"> </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 ">
                                <?php
                                if (isset($_SESSION['success'])) {
                                    ?>

                                    <div class="alert alert-danger">
                                        <?php echo $_SESSION['msg']; ?>
                                    </div>

                                    <?php                                   
                                    unset($_SESSION['success']);
                                    unset($_SESSION['msg']);
                                }
                                ?>


                                <form method="POST" action="?controller=home&action=login">
                                    <div class="form-group">
                                        <label for="email">E-mail</label> 
                                        <input type="text" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : null; ?>" class="form-control" maxlength="50" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="senha">Senha</label> 
                                        <input type="password" name="senha" value="<?php echo isset($_SESSION['senha']) ? $_SESSION['senha'] : null; ?>" class="form-control" maxlength="50" required/>
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" value="Entrar" required/>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2"></div>
                        </div>
                    </div>
                </div>
            </div>



    </body>
</html>
