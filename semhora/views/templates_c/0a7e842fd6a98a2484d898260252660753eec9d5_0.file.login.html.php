<?php
/* Smarty version 3.1.30, created on 2017-07-05 06:47:48
  from "C:\wamp64\www\semhora\views\templates\auth\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595c8b94b68206_53843697',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a7e842fd6a98a2484d898260252660753eec9d5' => 
    array (
      0 => 'C:\\wamp64\\www\\semhora\\views\\templates\\auth\\login.html',
      1 => 1499235962,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../app/header.html' => 1,
    'file:../app/footer.html' => 1,
  ),
),false)) {
function content_595c8b94b68206_53843697 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../app/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="/semhora/public/css/login.css" rel="stylesheet">
<div class="wrapper">
    <form class="form-signin" method="post">
      <h2 class="form-signin-heading">Login</h2>
      <input type="text" class="form-control top5" name="login" placeholder="Login" required="" autofocus="" />
      <input type="password" class="form-control top5" name="pass" placeholder="Senha" required=""/>
      <button class="btn btn-lg btn-primary btn-block  top5" type="submit">Login</button>
      <a href="/semhora/register" class="btn btn-lg btn-primary btn-block">Registrar</a>
    </form>
</div>
<?php if (isset($_smarty_tpl->tpl_vars['falhaLogin']->value)) {?>

<?php echo '<script'; ?>
 src="/semhora/public/js/valida.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    manipulaModal(1, '<?php echo $_smarty_tpl->tpl_vars['falhaLogin']->value;?>
');
<?php echo '</script'; ?>
>

<?php }
$_smarty_tpl->_subTemplateRender("file:../app/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
