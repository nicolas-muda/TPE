<?php
/* Smarty version 3.1.39, created on 2021-10-14 20:37:34
  from 'C:\xampp\htdocs\practicos\ultra_pelis\template\tabla.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616878ee64d2b7_73565462',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5af562a6d3f41f7491d39860c021966ddf9c3b9d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\practicos\\ultra_pelis\\template\\tabla.tpl',
      1 => 1634235891,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616878ee64d2b7_73565462 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <h3>lista de peliculas</h3>
    <table class="table table-dark table-striped">
        <tr>
            <th>Nombre</th>
            <th>Puntuacion</th>
            <th>Duracion</th>
            <th>Descripcion</th>
            <th>genero</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['peliculas']->value, 'pelicula');
$_smarty_tpl->tpl_vars['pelicula']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pelicula']->value) {
$_smarty_tpl->tpl_vars['pelicula']->do_else = false;
?>
            <tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pelicula']->value, 'valor');
$_smarty_tpl->tpl_vars['valor']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['valor']->value) {
$_smarty_tpl->tpl_vars['valor']->do_else = false;
?>
                    <td><?php echo $_smarty_tpl->tpl_vars['valor']->value;?>
</td>
                <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
<div><?php }
}
