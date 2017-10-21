<?php include __DIR__ . '/../layout/head.php'; ?>

<div class="container">
    &nbsp;<h2>Cadastrar Evento</h2>
</div>
<div class="container">
    <div class="col-lg-6">
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
                <label for="description" class="col-sm-2 control-label">Descrição</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" rows="7"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="local" class="col-sm-2 control-label">Local</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="local" name="local" placeholder="local">
                </div>
            </div>
            <div class="form-group">
                <label for="schedule" class="col-sm-2 control-label">Dia e hora</label>
                <div class="col-sm-10">
                    <input type="text"
                           class="form-control"
                           id="schedule"
                           name="schedule"
                           placeholder="Dia e hora" />
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="col-sm-2 control-label">Imagem</label>
                <div class="col-sm-10">
                    <input type="file" id="image" name="image">
                </div>
            </div>
            <div class="form-group">
                <label for="status" class="col-sm-2 control-label">Status</label>
                <label class="checkbox-inline">
                    <input type="radio" id="inlineCheckbox1" value="1" name="status" checked> Ativo
                </label>
                <label class="checkbox-inline">
                    <input type="radio" id="inlineCheckbox2" value="0" name="status"> Inativo
                </label>
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
