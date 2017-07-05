<?php
/* Smarty version 3.1.30, created on 2017-07-05 06:34:54
  from "C:\wamp64\www\semhora\views\templates\app\header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595c888eb0cce7_57485205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '887751c6022fdac69c216150fe25fbc72934d6de' => 
    array (
      0 => 'C:\\wamp64\\www\\semhora\\views\\templates\\app\\header.html',
      1 => 1499236486,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_595c888eb0cce7_57485205 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Test</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Language" content="pt-br" />
        <!-- includes css -->
        <link href="/semhora/public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/semhora/public/css/jquery-ui-1.9.2.custom.min.css" rel="stylesheet">
        <link href="/semhora/public/css/jquery-ui.theme.css" rel="stylesheet">
        <link href="/semhora/public/css/style.css" rel="stylesheet">
        <!-- includes js -->
        <?php echo '<script'; ?>
 type="text/javascript" src="/semhora/public/js/jquery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="/semhora/public/js/bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="/semhora/public/js/jquery-ui-1.9.2.custom.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="/semhora/public/js/modalwaitingfor.js"><?php echo '</script'; ?>
>
        <!-- includes cdn -->
        <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"  type="text/javascript"><?php echo '</script'; ?>
>
    </head>
    <body>
        <div id="modal-load" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title txt-vermelho" id="modal-title">Erro de preenchimento</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" id="tipo-modal" role="alert">
                          <h5><span id="error-text"></span></h5>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <a href="#" class="btn btn-default" data-dismiss="modal">Fechar</a>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                <?php if ($_smarty_tpl->tpl_vars['online']->value == "true") {?>
                  <li class="active"><a href="/semhora">Home</a></li>
                  <li><a href="/semhora/administracao/eventos/">Gerenciador de Eventos</a></li>
                  <li><a href="/semhora/usuarios">Usuários</a></li>
                  <li><a href="mailto:diegogandradex@gmail.com">Contato</a></li>
                <?php }?>
                    <li><a href="/semhora/eventos/">Eventos</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php if ($_smarty_tpl->tpl_vars['online']->value == "true") {?>
                  <li><a href="/semhora/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <?php } else { ?>
                  <li><a href="/semhora/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php }?>
                </ul>
              </div>
            </div>
        </nav><?php }
}
