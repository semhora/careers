<?php include __DIR__ . '/../layout/head.php'; ?>

<div class="col-md-3">
    &nbsp;
</div>
<div class="col-md-9">
    <h2>Cadastrar usuário</h2>

    <div class="col-lg-8">
        <form class="form-horizontal"
              method="post"
              enctype="multipart/form-data"
              action="">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Senha</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                </div>
            </div>
            <div class="form-group">
                <label for="retype_password" class="col-sm-2 control-label">Confirmação de senha</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="Senha">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>
        </form>

        <hr />

        <div class="pull-right">
            <a href="javascript:history.back()" class="btn btn-info">Voltar</a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
