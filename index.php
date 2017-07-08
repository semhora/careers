<?php
    define( 'WWW_ROOT' , dirname( __FILE__ ) );
    define( 'DS', DIRECTORY_SEPARATOR );

    require_once( WWW_ROOT . DS . 'autoload.php');

    use Model\Evento;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos - Sem Hora</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Listagem de Eventos
                        </div>
                    </div>
                    <div class="panel-body">
                        <?php
                        $eventos = Evento::buscarTodos();
                        foreach($eventos as $evento) {
                            
                        }
                        ?>
                        <div class="col-lg-4">
                            <label style="width: 100%; text-align: center;">Balada Top</label>
                            <img src="img1.jpg" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <form>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Cadastro de usuário para a área privada
                            </div>
                        </div>
                        <div class="panel-body">
                            <fieldset>
                                <div class="row form-group">
                                    <div class="col-lg-12">
                                        <label>Nome de usuário</label>
                                        <input class="form-control" type="text" name="nome">
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-lg btn-info">Cadastrar usuário</button>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </form>
                <form>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Cadastro de eventos
                            </div>
                        </div>
                        <div class="panel-body">
                            <fieldset>
                                <div class="row form-group">
                                    <div class="col-lg-12">
                                        <label>Nome</label>
                                        <input class="form-control" type="text" name="nome">
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Descricao</label>
                                        <input class="form-control" type="text" name="descricao">
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Local</label>
                                        <input class="form-control" type="text" name="local">
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Horário de início</label>
                                        <input class="form-control" type="text" name="horario">
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Imagem</label>
                                        <input class="form-control" type="text" name="imagem">
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option>Ativo</option>
                                            <option>Inativo</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-lg btn-info">Cadastrar evento</button>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>