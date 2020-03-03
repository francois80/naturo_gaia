<?php
require_once ROOT . '/Views/header.php';
require_once ROOT . '/Views/nav.php';
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 card mb-5">
            <div class="card-header .z-depth-4 info-color">
                <h2 class="text-center font-weight-bold text-white">Connexion</h2>
            </div>
            <form class="card-body" method="POST" action="" novalidate="">
                <div class="form-group md-form">
                    <label for="emailLogin">Email : </label>
                    <input autocomplete="false" name="email" type="text" class="form-control" id="emailLogin" required>
                </div>
                <div class="form md-form">
                    <label for="password">Mot de passe : </label>
                    <input name="password" type="password" class="form-control" id="password" required>
                </div>
                <a class="btn btn-link" href="http://">Mot de passe oublié</a>
                <button class="btn btn-info btn-rounded" type="submit">Se connecter</button>
            </form>
        </div>
    </div>
</div>

<?php
require_once ROOT . '/Views/footer.php';
