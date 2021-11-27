<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                {if isset($smarty.session.rol) && $smarty.session.rol=="administrador"}
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="administracion">administracion</a>
                    </li>
                {/if}
            </ul>
            {if isset($smarty.session.email)}
                <div class="d-flex">
                    <p>bienvenido {$smarty.session.email}</p>
                    <a href="desconectar"><input type="button" class="btn btn-info" value="desconectar"></a>
                </div>
            {else}
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="login">iniciar sesion</a>
                        </li>
                    </ul>
                </div>
            {{/if}}
        </div>
    </div>
</nav>