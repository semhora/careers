<?php
/* Smarty version 3.1.30, created on 2017-07-05 06:26:59
  from "C:\wamp64\www\semhora\views\templates\users\form.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595c86b3be57e4_29545883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '481841bdcb40cf5f754ad23c2f13296853f0b6bb' => 
    array (
      0 => 'C:\\wamp64\\www\\semhora\\views\\templates\\users\\form.html',
      1 => 1499235313,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../app/header.html' => 1,
    'file:../app/footer.html' => 1,
  ),
),false)) {
function content_595c86b3be57e4_29545883 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../app/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
                    Formulário de Usuário <a href="/semhora/usuarios/lista" class="pull-right btn btn-sm btn-default">Lista</a>
                </div>
                <form method="post" id="formCard" class='form-horizontal'>
                    <?php if (isset($_smarty_tpl->tpl_vars['id']->value)) {?>
                    <input type="hidden" name='id' value='<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
'>
                    <input type="hidden" name='method' value='edita'>
                    <?php } else { ?>
                    <input type="hidden" name='method' value='cadastra'>
                    <?php }?>
                    <input type="hidden" name='author' value='<?php echo $_smarty_tpl->tpl_vars['author']->value;?>
'>
                    <div class="col-md-12 mtop20 text-left">
                        <div class="form-group">
                            <label for="nome" class='col-sm-2 text-right'>Nome</label>
                            <div class="col-sm-6">
                                <input type="text" required="" char="4" value="<?php if (isset($_smarty_tpl->tpl_vars['users']->value)) {
echo $_smarty_tpl->tpl_vars['users']->value->getName();
}?>" maxlength="255" class="form-control" id="nome" name="nome">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="login" class='col-sm-2 text-right'>Login</label>
                            <div class="col-sm-6">
                                <input type="text" required="" char="4" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['users']->value)) {
echo $_smarty_tpl->tpl_vars['users']->value->getLogin();
}?>" class="form-control" id="login" name="login">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class='col-sm-2 text-right'>E-mail</label>
                            <div class="col-sm-6">
                                <input type="email" required="" char="4" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['users']->value)) {
echo $_smarty_tpl->tpl_vars['users']->value->getEmail();
}?>" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class='col-sm-2 text-right'>Senha</label>
                            <div class="col-sm-6">
                                <input type="password" required="" char="4" maxlength="255" class="form-control" id="password" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-success pull-right">Submit</button>
                    </div>
                </form>
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
