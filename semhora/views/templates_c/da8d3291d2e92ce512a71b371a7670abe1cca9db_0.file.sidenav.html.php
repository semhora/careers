<?php
/* Smarty version 3.1.30, created on 2017-07-05 06:27:17
  from "C:\wamp64\www\semhora\views\templates\app\sidenav.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595c86c5763649_99616174',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da8d3291d2e92ce512a71b371a7670abe1cca9db' => 
    array (
      0 => 'C:\\wamp64\\www\\semhora\\views\\templates\\app\\sidenav.html',
      1 => 1499231456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_595c86c5763649_99616174 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-sm-3 sidenav">
<h4>Eventos Sem Hora</h4>
<ul class="nav nav-pills nav-stacked">
    <?php if (isset($_smarty_tpl->tpl_vars['eventsSidebar']->value[0])) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['eventsSidebar']->value, 'eventSidebar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['eventSidebar']->value) {
?>
            <li <?php if (isset($_smarty_tpl->tpl_vars['key']->value) && $_smarty_tpl->tpl_vars['eventSidebar']->value->getNome() == $_smarty_tpl->tpl_vars['key']->value) {?>class="active"<?php }?>  data-toggle="modal" data-target="#modal<?php echo $_smarty_tpl->tpl_vars['eventSidebar']->value->getId();?>
">
                <span class="label label-default"><?php echo $_smarty_tpl->tpl_vars['eventSidebar']->value->getNome();?>
</span>
            </li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <?php }?>
</ul><br>
    <?php if (isset($_smarty_tpl->tpl_vars['eventsSidebar']->value[0])) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['eventsSidebar']->value, 'eventSidebar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['eventSidebar']->value) {
?>
        <!-- Modal -->
        <div id="modal<?php echo $_smarty_tpl->tpl_vars['eventSidebar']->value->getId();?>
" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><?php echo $_smarty_tpl->tpl_vars['eventSidebar']->value->getNome();?>
</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if ($_smarty_tpl->tpl_vars['eventSidebar']->value->getImagem() == '') {?>
                                <img src="/semhora/public/images/no-image-200x200.jpg" class="img-responsive">
                                <?php } else { ?>
                                <img src="/semhora/public/uploads/<?php echo $_smarty_tpl->tpl_vars['eventSidebar']->value->getImagem();?>
" style="max-height: 500px; max-width: 400px;" alt="<?php echo $_smarty_tpl->tpl_vars['eventSidebar']->value->getNome();?>
">
                                <?php }?>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Local:</strong> <?php echo $_smarty_tpl->tpl_vars['eventSidebar']->value->getLocal();?>
</p>
                                <p><strong>Data/Horário:</strong> <?php echo $_smarty_tpl->tpl_vars['eventSidebar']->value->getHorario();?>
</p>
                                <p><strong>Descrição:</strong> <?php echo $_smarty_tpl->tpl_vars['eventSidebar']->value->getDescricao();?>
</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <?php }?>
<form method="post">
<div class="input-group">
  <input type="text" class="form-control" name="any" placeholder="Procurar Evento..">
  <span class="input-group-btn">
    <button class="btn btn-default" type="button">
      <span class="glyphicon glyphicon-search"></span>
    </button>
  </span>
</div>
</form>
</div><?php }
}
