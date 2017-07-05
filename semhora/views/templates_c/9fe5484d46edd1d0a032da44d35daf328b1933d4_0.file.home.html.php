<?php
/* Smarty version 3.1.30, created on 2017-07-05 06:32:24
  from "C:\wamp64\www\semhora\views\templates\eventos\home.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595c87f86b1557_04448131',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fe5484d46edd1d0a032da44d35daf328b1933d4' => 
    array (
      0 => 'C:\\wamp64\\www\\semhora\\views\\templates\\eventos\\home.html',
      1 => 1499236343,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../app/header.html' => 1,
    'file:../app/sidenav.html' => 1,
    'file:../app/footer.html' => 1,
  ),
),false)) {
function content_595c87f86b1557_04448131 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../app/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="/semhora/public/css/events.css" rel="stylesheet">
<div class="container-fluid">
  <div class="row content">
    <h3>Lista de Eventos</h3>
    <?php $_smarty_tpl->_subTemplateRender("file:../app/sidenav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php if (isset($_smarty_tpl->tpl_vars['events']->value[0])) {?>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['events']->value, 'event');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['event']->value) {
?>
        <div class="col-sm-3">
            <?php if ($_smarty_tpl->tpl_vars['event']->value->getImagem() == '') {?>
            <img src="/semhora/public/images/no-image-200x200.jpg" class="img-responsive">
            <?php } else { ?>
            <img src="/semhora/public/uploads/<?php echo $_smarty_tpl->tpl_vars['event']->value->getImagem();?>
" class="img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['event']->value->getNome();?>
">
            <?php }?>
            <h4><small><?php echo $_smarty_tpl->tpl_vars['event']->value->getNome();?>
</small></h4>
            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modal<?php echo $_smarty_tpl->tpl_vars['event']->value->getId();?>
">Detalhes</a>
            <h5><span class="glyphicon glyphicon-time"></span> Evento criado por <?php echo $_smarty_tpl->tpl_vars['event']->value->getAuthor();?>
,<br> <?php echo $_smarty_tpl->tpl_vars['event']->value->getCreatedAt();?>
</h5>
        </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

     <?php } else { ?>
      <div class="col-sm-9">
          <div class="jumbotron mtop20">
              <h1>Olá visitante!</h1>
              <?php if (isset($_smarty_tpl->tpl_vars['key']->value)) {?>
                <p>Não encontramos nada com "<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"! :(</p>
              <?php } else { ?>
                <p>Ainda não temos nenhum evento cadastrado! :(</p>
              <?php }?>
          </div>
      </div>
     <?php }?>
  </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:../app/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
