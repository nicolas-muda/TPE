<?php
/* Smarty version 3.1.39, created on 2021-10-14 22:11:02
  from 'C:\xampp\htdocs\practicos\ultra_pelis\template\formularioPelis.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61688ed67dd257_24369197',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea3017519f5a08cbc253f3b3bd2f992b1264cdcd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\practicos\\ultra_pelis\\template\\formularioPelis.tpl',
      1 => 1634242214,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61688ed67dd257_24369197 (Smarty_Internal_Template $_smarty_tpl) {
?><div>
    <div class="botonera">
        <button type="button" id="crearPelicula" class="btn btn-info boton">mostrar crear pelicula</button>
        <button type="button" id="editarPelicula" class="btn btn-info boton">mostrar editar pelicula</button>
        <button type="button" id="borrarPelicula" class="btn btn-info boton">mostrar borrar pelicula</button>
    </div>

    <div id="crearPeli" class="ocultar">
        <h1>crear pelicula</h1>
        <form action="crearpelicula" method="post">
            <div class="mb-3">
                <label class="form-label">ingrese el nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="nombre" required>
            </div>
            <div class="mb-3">
                <label class="form-label">ingrese la puntuacion</label>
                <input type="number" class="form-control" name="puntuacion" placeholder="de 1 a 10" required>
            </div>
            <div class="mb-3">
                <label class="form-label">ingrese la duracion</label>
                <input type="text" class="form-control" name="duracion" placeholder="xh xxm" required>
            </div>
            <div class="mb-3">
                <label class="form-label">ingrese descripcion</label>
                <textarea class="form-control" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">seleccione categoria</label>
                <select name='genero' class="form-select">
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
            <button type="submit" class="btn btn-info">crear</button>
        </form>
    </div>

    <div id="editarPeli" class="ocultar">
        <h1>editar pelicula</h1>
        <form action="editarpelicula" method="post">
            <div class="mb-3">
                <label class="form-label">seleccione el nombre</label>
                <select name='nombre' class="form-select">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['peliculas']->value, 'pelicula');
$_smarty_tpl->tpl_vars['pelicula']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pelicula']->value) {
$_smarty_tpl->tpl_vars['pelicula']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value->nombre_pelicula;?>
"><?php echo $_smarty_tpl->tpl_vars['pelicula']->value->nombre_pelicula;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">ingrese la puntuacion</label>
                <input type="number" class="form-control" name="puntuacion" placeholder="de 1 a 10" required>
            </div>
            <div class="mb-3">
                <label class="form-label">ingrese la duracion</label>
                <input type="text" class="form-control" name="duracion" placeholder="xh xxm" required>
            </div>
            <div class="mb-3">
                <label class="form-label">ingrese descripcion</label>
                <textarea class="form-control" name="descripcion" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">seleccione categoria</label>
                <select name='genero' class="form-select">
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
            <button type="submit" class="btn btn-info">editar</button>
        </form>
    </div>

    <div id="borrarPeli" class="ocultar">
        <h1>borrar pelicula</h1>
        <form action="borrarpelicula" method="post">
            <div class="mb-3">
                <label class="form-label">seleccione el nombre</label>
                <select name='nombre' class="form-select">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['peliculas']->value, 'pelicula');
$_smarty_tpl->tpl_vars['pelicula']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pelicula']->value) {
$_smarty_tpl->tpl_vars['pelicula']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['pelicula']->value->nombre_pelicula;?>
"><?php echo $_smarty_tpl->tpl_vars['pelicula']->value->nombre_pelicula;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>
            <button type="submit" class="btn btn-info">borrar</button>
        </form>
    </div>
    <hr>
</div><?php }
}
