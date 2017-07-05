<?php
/* Smarty version 3.1.30, created on 2017-07-05 06:26:56
  from "C:\wamp64\www\semhora\views\templates\users\list.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595c86b035eae9_77545325',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c093abdcf70a1d3926d2e68eed6c5499d24da1a' => 
    array (
      0 => 'C:\\wamp64\\www\\semhora\\views\\templates\\users\\list.html',
      1 => 1499235601,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../app/header.html' => 1,
    'file:../app/footer.html' => 1,
  ),
),false)) {
function content_595c86b035eae9_77545325 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../app/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel mtop20 panel-default">
                <div class="panel-heading">Usuários <a href="/semhora/register" class="pull-right btn btn-sm btn-default">Novo</a> </div>
                <table class="table text-center table-bordered">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($_smarty_tpl->tpl_vars['users']->value != false) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getName();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getLogin();?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getEmail();?>
</td>
                        <td>
                            <button class="btn btn-sm btn-danger glyphicon glyphicon-trash" id="<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
"></button>
                            <a href="usuarios/edita/<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
" class="btn btn-sm btn-default glyphicon glyphicon-edit"></a>

                        </td>
                    </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <?php }?>
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
