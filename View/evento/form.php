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
                        <h1><small>Cadastro</small></h1>
                    </div>
                </div>
            </div>
            <br>

            <div class="row">  
                <div class="col-lg-2 col-md-2 col-sm-2"> </div>
                <div class="col-lg-8 col-md-8 col-sm-8 ">

                    <?php
                    if (isset($_SESSION['msg'])) {
                        ?>

                        <div class="alert alert-danger">
                            <?php echo $_SESSION['msg']; ?>
                        </div>

                        <?php
                        unset($_SESSION['msg']);
                    }
                    ?>
                    <?php if (isset($_SESSION['id']) && $_SESSION['id'] != '') { ?>
                        <img src="Files/<?php echo isset($_SESSION['imagem']) ? $_SESSION['imagem'] : null; ?>"   class="img-rounded" height="100" width="100"/>
                    <?php } ?>
                </div>
            </div><br>


            <div class="row">                
                <div class="col-lg-2 col-md-2 col-sm-2"> </div>
                <div class="col-lg-8 col-md-8 col-sm-8 ">

                    <form method="POST" action="?controller=evento&action=salvar" enctype='multipart/form-data'>
                        <input type="hidden" name="id" value="<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : null; ?>"/> 
                        <div class="form-group">
                            <label for="status">Status</label>                          
                            <select name="status" class="form-control">
                                <option value="1" <?php echo isset($_SESSION['status']) && $_SESSION['status'] == 1 ? 'selected' : null; ?>>Ativo</option>
                                <option value="0" <?php echo isset($_SESSION['status']) && $_SESSION['status'] == 0 ? 'selected' : null; ?>>Inativo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome</label> 
                            <input type="text" name="nome" value="<?php echo isset($_SESSION['nome']) ? utf8_encode($_SESSION['nome']) : null; ?>" class="form-control" maxlength="80" required />
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label> 
                            <textarea name="descricao" class="form-control" rows="5" cols="60" required><?php echo isset($_SESSION['descricao']) ? utf8_encode($_SESSION['descricao']) : null; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="local">Local</label> 
                            <input type="text" name="local" value="<?php echo isset($_SESSION['local']) ? utf8_encode($_SESSION['local']) : null; ?>" class="form-control" maxlength="50" required/>
                        </div>
                        <div class="form-group">
                            <label for="hora_inicio">Hora Início</label> 
                            <input type="text" name="hora_inicio" value="<?php echo isset($_SESSION['hora_inicio']) ? $_SESSION['hora_inicio'] : null; ?>" class="form-control" maxlength="5" required/>
                        </div>
                        <div class="form-group">
                            <label for="imagem">Arquivo</label> 
                            <input type="file" name="imagem" class="form-control" accept="image/*" <?php echo isset($_SESSION['id']) ? null : 'required'; ?>/>
                        </div>

                        <div class="form-group">
                            <a class='btn btn-small btn-info' href="?controller=evento&action=listar&status=1">Voltar</a>
                            <input type="submit" class="btn btn-success" value="Salvar" required/>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2"></div>
            </div>
    </body>
</html>
<script>
    $('input[name=hora_inicio]').mask('99:99');
</script>
