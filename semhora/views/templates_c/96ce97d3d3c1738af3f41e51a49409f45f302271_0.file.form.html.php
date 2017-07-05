<?php
/* Smarty version 3.1.30, created on 2017-07-05 06:40:46
  from "C:\wamp64\www\semhora\views\templates\eventsManager\form.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595c89eeba4aa3_22498088',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96ce97d3d3c1738af3f41e51a49409f45f302271' => 
    array (
      0 => 'C:\\wamp64\\www\\semhora\\views\\templates\\eventsManager\\form.html',
      1 => 1499236843,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../app/header.html' => 1,
    'file:../app/footer.html' => 1,
  ),
),false)) {
function content_595c89eeba4aa3_22498088 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../app/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="/semhora/public/css/events-manager.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="/semhora/public/js/valida.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/semhora/public/js/events-manager.js"><?php echo '</script'; ?>
>
<?php if (isset($_smarty_tpl->tpl_vars['events']->value[0])) {?>
    <?php $_smarty_tpl->_assignInScope('dataHorario', (($tmp = @$_smarty_tpl->tpl_vars['events']->value[0]->getHorario())===null||$tmp==='' ? '' : $tmp));
} else { ?>
    <?php $_smarty_tpl->_assignInScope('dataHorario', '');
}?>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-md-8 col-md-offset-2 col-lg-7 col-lg-offset-2">
            <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) {?>
            <div class="alert <?php echo $_smarty_tpl->tpl_vars['msg']->value['color'];?>
 text-left mtop20" role="alert">
                <span class="glyphicon <?php echo $_smarty_tpl->tpl_vars['msg']->value['glyphicon'];?>
" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                <?php echo $_smarty_tpl->tpl_vars['msg']->value['text'];?>

            </div>
            <?php }?>
            <div class="panel mtop20 panel-default">
                <div class="panel-heading">
                    Cadastro de Evento <a href="/semhora/administracao/eventos/" class="pull-right btn btn-sm btn-default">Lista</a>
                </div>
                <form method="post" id="formCard" enctype="multipart/form-data">
                    <?php if (isset($_smarty_tpl->tpl_vars['id']->value)) {?>
                    <input type="hidden" name='id' value='<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'>
                    <input type="hidden" name='method' value='edita'>
                    <?php } else { ?>
                    <input type="hidden" name='method' value='cadastra'>
                    <?php }?>
                    <input type="hidden" name='author' value='<?php echo $_smarty_tpl->tpl_vars['author']->value;?>
'>
                    <div class="col-md-3 mtop20 text-left">
                        <div class="form-group">
                          <label for="nome">Nome:</label>
                          <input type="text" required="" char="4" value="<?php if (isset($_smarty_tpl->tpl_vars['events']->value[0])) {
echo $_smarty_tpl->tpl_vars['events']->value[0]->getNome();
}?>" maxlength="255" class="form-control" id="nome" name="nome">
                        </div>
                        <div class="form-group">
                            <label for="local">Local: </label>
                          <input type="text" required="" char="4" value="<?php if (isset($_smarty_tpl->tpl_vars['events']->value[0])) {
echo $_smarty_tpl->tpl_vars['events']->value[0]->getLocal();
}?>" maxlength="255" class="form-control" id="local" name="local">
                        </div>
                        <div class="form-group">
                            <label for="horario">Data: </label>
                            <input type="text" required="" char="10" value="<?php echo substr($_smarty_tpl->tpl_vars['dataHorario']->value,0,10);?>
" maxlength="255" class="form-control" id="data" name="data">
                        </div>
                        <div class="form-group">
                            <label for="horario">Horário: </label>
                            <input type="text" required="" char="5" value="<?php echo substr($_smarty_tpl->tpl_vars['dataHorario']->value,11,16);?>
" maxlength="255" class="form-control" id="horario" name="horario">
                        </div>
                        <div class="form-group">
                            <label for="status">Status: </label>
                            <select name="status" id="status" class="form-control">
                                <option>--</option>
                                <option value="1" <?php if (isset($_smarty_tpl->tpl_vars['events']->value[0]) && $_smarty_tpl->tpl_vars['events']->value[0]->getStatus() == 1) {?>selected<?php }?>>Ativo</option>
                                <option value="0" <?php if (isset($_smarty_tpl->tpl_vars['events']->value[0]) && $_smarty_tpl->tpl_vars['events']->value[0]->getStatus() == 0) {?>selected<?php }?>>Inativo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-9 mtop20 text-left">
                        <div class="form-group">
                            <label for="imagem">Imagem: </label>
                            <!-- image-preview-filename input [CUT FROM HERE]-->
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                <span class="input-group-btn">
                                    <!-- image-preview-clear button -->
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="glyphicon glyphicon-remove"></span> Limpar
                                    </button>
                                    <!-- image-preview-input -->
                                    <div class="btn btn-default image-preview-input">
                                        <span class="glyphicon glyphicon-folder-open"></span>
                                        <span class="image-preview-input-title">Procurar</span>
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="imagem" id="imagem"/> <!-- rename it -->
                                    </div>
                                </span>
                            </div><!-- /input-group image-preview [TO HERE]-->
                            <!--<input type="text" required="" char="4" value="<?php if (isset($_smarty_tpl->tpl_vars['events']->value[0])) {
echo $_smarty_tpl->tpl_vars['events']->value[0]->getImagem();
}?>" maxlength="255" class="form-control" id="imagem" name="imagem">-->
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea  char="4" class="form-control" rows="8" maxlength="500" id="descricao" name="descricao"><?php if (isset($_smarty_tpl->tpl_vars['events']->value[0])) {
echo $_smarty_tpl->tpl_vars['events']->value[0]->getDescricao();
}?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:../app/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
