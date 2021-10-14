<?php
/* Smarty version 3.1.39, created on 2021-10-14 20:37:10
  from 'C:\xampp\htdocs\practicos\ultra_pelis\template\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616878d67dec00_57703666',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bbc5300e00fb881a9a741c13a0ca15d5692f474' => 
    array (
      0 => 'C:\\xampp\\htdocs\\practicos\\ultra_pelis\\template\\login.tpl',
      1 => 1634235903,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:template/head.tpl' => 1,
    'file:template/navbar.tpl' => 1,
    'file:template/footer.tpl' => 1,
  ),
),false)) {
function content_616878d67dec00_57703666 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:template/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:template/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
    <h1>iniciar sesión</h1>
    <form action="verificar" method="post">
        <div class="mb-3">
            <label class="form-label">ingrese el email</label>
            <input type="email" class="form-control" name="email" placeholder="ejemplo@gmail.com" required>
        </div>
        <div class="mb-3">
            <label class="form-label">ingrese la contraseña</label>
            <input type="password" class="form-control" name="contraseña" placeholder="contraseña" required>
        </div>
        <button type="submit" class="btn btn-info">ingresar</button>
    </form>
</div>
<br>
<?php if ($_smarty_tpl->tpl_vars['mensaje']->value) {?>
    <div class="container">
        <div class="alert alert-danger" role="alert">
            <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>

        </div>
    </div>
<?php }?>
<br>
<br>

<?php $_smarty_tpl->_subTemplateRender("file:template/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
