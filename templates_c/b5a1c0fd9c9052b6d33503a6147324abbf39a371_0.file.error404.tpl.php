<?php
/* Smarty version 3.1.39, created on 2021-10-13 21:11:41
  from 'C:\xampp\htdocs\practicos\ultra_pelis\template\error404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61672f6d695761_74524490',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5a1c0fd9c9052b6d33503a6147324abbf39a371' => 
    array (
      0 => 'C:\\xampp\\htdocs\\practicos\\ultra_pelis\\template\\error404.tpl',
      1 => 1634133962,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:template/head.tpl' => 1,
    'file:template/navbar.tpl' => 1,
    'file:template/lanzamientos.tpl' => 1,
    'file:template/footer.tpl' => 1,
  ),
),false)) {
function content_61672f6d695761_74524490 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:template/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:template/navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:template/lanzamientos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="error">
    <img src="https://i.pinimg.com/originals/3f/09/8a/3f098afeb1b21894fc0eb990778ca137.png" alt="">
</div>
<?php $_smarty_tpl->_subTemplateRender("file:template/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
