<?php
/* Smarty version 3.1.30, created on 2017-07-05 06:26:53
  from "C:\wamp64\www\semhora\views\templates\home.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595c86adaf87e7_79904706',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1fbd32b45a9244ef2cbe2e3970ed25c24f56dc3a' => 
    array (
      0 => 'C:\\wamp64\\www\\semhora\\views\\templates\\home.html',
      1 => 1499133214,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:app/header.html' => 1,
    'file:app/footer.html' => 1,
  ),
),false)) {
function content_595c86adaf87e7_79904706 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:app/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      
    </div>
    <div class="col-sm-8 text-left">
      <h1>Eventos Sem Tempo</h1>
      <p>Bem vindo ao Teste realizado por Diego Andrade.</p>
      <hr>
      <h3>Data</h3>
      <p>03/07/2017</p>
    </div>
    <div class="col-sm-2 sidenav">
      
    </div>
  </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:app/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
