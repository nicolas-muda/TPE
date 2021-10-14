<?php
/* Smarty version 3.1.39, created on 2021-10-14 22:11:02
  from 'C:\xampp\htdocs\practicos\ultra_pelis\template\formularioGeneros.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61688ed6849191_66087215',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01b7b8fa33dd157f69e09535e8706eda0df62dd7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\practicos\\ultra_pelis\\template\\formularioGeneros.tpl',
      1 => 1634242241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61688ed6849191_66087215 (Smarty_Internal_Template $_smarty_tpl) {
?><div>
    <div class="botonera">
        <button type="button" id="crearGenero" class="btn btn-info boton">mostrar crear genero</button>
        <button type="button" id="editarGenero" class="btn btn-info boton">mostrar editar genero</button>
        <button type="button" id="borrarGenero" class="btn btn-info boton">mostrar borrar genero</button>
    </div>

    <div id="formCrearGenero" class="ocultar">
        <h1>crear genero</h1>
        <form action="crearGenero" method="post">
            <div class="mb-3">
                <label class="form-label">ingrese el nombre del nuevo genero</label>
                <input type="text" class="form-control" name="nombre" placeholder="nombre" required>
            </div>
            <button type="submit" class="btn btn-info">crear</button>
        </form>
    </div>

    <div id="formEditarGenero" class="ocultar">
        <h1>editar genero</h1>
        <form action="editarGenero" method="post">
            <div class="mb-3">
                <label class="form-label">seleccione genero</label>
                <select name='id' class="form-select">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_generos;?>
"><?php echo $_smarty_tpl->tpl_vars['categoria']->value->genero;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
                <label class="form-label">ingrese el nuevo nombre</label>
                <input type="text" class="form-control" name="nuevo" placeholder="nombre" required>
            </div>
            <button type="submit" class="btn btn-info">editar</button>
        </form>
    </div>

    <div id="formBorrarGenero" class="ocultar">
        <h1>borrar genero</h1>
        <form action="borrarGenero" method="post">
            <div class="mb-3">
                <label class="form-label">seleccione genero</label>
                <select name='id' class="form-select">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id_generos;?>
"><?php echo $_smarty_tpl->tpl_vars['categoria']->value->genero;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>
            <button type="submit" class="btn btn-danger">borrar</button>
        </form>
    </div>
</div><?php }
}
