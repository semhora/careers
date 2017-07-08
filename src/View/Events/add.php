<?php $this->layout('Layout/default') ?>
<?php $this->section('content') ?>
<h1>Adicionar evento</h1>
<form method="post" action="/save" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="name" required >
    </div>
    <div class="form-group">
        <label for="">Descrição</label>
        <textarea class="form-control" cols="30" name="description" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label for="">Local</label>
        <input type="text" class="form-control" name="place" required>
    </div>
    <div class="form-group">
        <label for="">Data</label>
        <input type="date" class="form-control" name="date" required >
    </div>
    <div class="form-group">
        <label for="">Horario</label>
        <input type="time" class="form-control" required name="time" >
    </div>
    <div class="form-group">
        <label for="">Imagem</label>
        <input type="file" name="img" required>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="status"> Ativo
        </label>
    </div>
    <button type="submit" class="btn btn-default">Enviar</button>
</form>

<?php $this->append() ?>
