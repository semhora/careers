<?php
/* Smarty version 3.1.30, created on 2017-07-05 06:27:13
  from "C:\wamp64\www\semhora\views\templates\eventsManager\list.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595c86c174d783_96602680',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c289c94285bda1d941b07d32b0a3b179f522137c' => 
    array (
      0 => 'C:\\wamp64\\www\\semhora\\views\\templates\\eventsManager\\list.html',
      1 => 1499234311,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../app/header.html' => 1,
    'file:../app/footer.html' => 1,
  ),
),false)) {
function content_595c86c174d783_96602680 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../app/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-md-8 col-md-offset-2 col-lg-7 col-lg-offset-2">
            <div class="panel mtop20 panel-default">
                <div class="panel-heading">Eventos <a href="/semhora/administracao/eventos/cadastra" class="pull-right btn btn-sm btn-default">Novo</a> </div>
                <table class="table text-center table-bordered">
                    <thead>
                    <tr>
                        <th>Autor</th>
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Local</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php if ($_smarty_tpl->tpl_vars['events']->value != false) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['events']->value, 'event');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['event']->value) {
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['event']->value->getAuthor();?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['event']->value->getNome();?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['event']->value->getHorario();?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['event']->value->getLocal();?>
</td>
                            <td><?php if ($_smarty_tpl->tpl_vars['event']->value->getStatus() == true) {?>Ativo<?php } else { ?>Inativo<?php }?></td>
                            <td>
                                <button class="btn btn-sm btn-danger glyphicon glyphicon-trash" id="<?php echo $_smarty_tpl->tpl_vars['event']->value->getId();?>
"></button>
                                <a href="/semhora/administracao/eventos/edita/<?php echo $_smarty_tpl->tpl_vars['event']->value->getId();?>
" class="btn btn-sm btn-default glyphicon glyphicon-edit"></a>
                            </td>
                        </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        <?php } else { ?>
                        <tr>
                            <td colspan="6">Nenhum evento encontrado</td>
                        </tr>
                        <?php }?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 src="/semhora/public/js/valida.js"><?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:../app/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
