<?php
/* Smarty version 3.1.39, created on 2021-10-14 20:37:10
  from 'C:\xampp\htdocs\practicos\ultra_pelis\template\navbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616878d6979dc5_03562112',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd51bd43b9a1b62a5bd256a665b1c331a3fedcd7b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\practicos\\ultra_pelis\\template\\navbar.tpl',
      1 => 1634235895,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616878d6979dc5_03562112 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="home">
            <img src="img/pngwing.com.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
            <label>ultra pelis</label>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home">Home</a>
                </li>
            </ul>
            <?php if ((isset($_SESSION['email']))) {?>
                <div class="d-flex">
                    <p>bienvenido <?php echo $_SESSION['email'];?>
</p>
                    <a href="desconectar">desconectar</a>
                </div>
            <?php } else { ?>
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="login">iniciar sesion</a>
                        </li>
                    </ul>
                </div>
            <?php ob_start();
}
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

        </div>
    </div>
</nav><?php }
}
