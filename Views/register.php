<?php 
    require_once ROOT . '/Views/header.php';
    require_once ROOT . '/Views/nav.php';
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 card">
            <div class="card-header .z-depth-4 info-color">
                <h2 class="text-center font-weight-bold text-white">Sign in</h2>
            </div>
            <form class="card-body bg-softGreen" method="POST" action="" novalidate="">
                <div class="form-group md-form">
                    <label for="firstname">Prénom : </label>
                    <input  autocomplete="false" name="firstname" type="text" class="form-control <?= (isset($isSubmit) && !isset($errors['firstname'])) ? 'is-valid' : '' ?> <?= (isset($isSubmit) && isset($errors['firstname'])) ? 'is-invalid' : '' ?>" id="firstname" required>
                    <div class="invalid-feedback">
                    <?= $errors['firstname'] ?? '' ?>.
                    </div>
                </div>
                <div class="form-group md-form">
                    <label for="lastname">Nom : </label>
                    <input  autocomplete="false" name="lastname" type="text" class="form-control <?= (isset($isSubmit) && !isset($errors['lastname'])) ? 'is-valid' : '' ?> <?= (isset($isSubmit) && isset($errors['lastname'])) ? 'is-invalid' : '' ?>" id="lastname" required>
                    <div class="invalid-feedback">
                    <?= $errors['lastname'] ?? '' ?>.
                    </div>
                </div>
                <div class="form-group md-form">
                    <label for="emailRegister">Email : </label>
                    <input  autocomplete="false" name="email" type="text" class="form-control <?= (isset($isSubmit) && !isset($errors['email'])) ? 'is-valid' : '' ?> <?= (isset($isSubmit) && isset($errors['email'])) ? 'is-invalid' : '' ?>" id="emailRegister" required>
                    <div class="invalid-feedback">
                        <?= $errors['email'] ?? '' ?>
                    </div>
                </div>
                <div class="form md-form">
                    <label for="password">Mot de passe : </label>
                    <input  autocomplete="false" name="password" type="password" class="form-control <?= (isset($isSubmit) && !isset($errors['password'])) ? 'is-valid' : '' ?> <?= (isset($isSubmit) && isset($errors['password'])) ? 'is-invalid' : '' ?>" id="password" required>
                    <div class="invalid-feedback">
                    <?= $errors['password'] ?? '' ?>.
                    </div>
                    <div class="form md-form">
                        <label for="password_confirmation">Confirmation du mot de passe : </label>
                        <input  autocomplete="false" name="password_confirmation" type="password" class="form-control <?= (isset($isSubmit) && !isset($errors['password_confirmation'])) ? 'is-valid' : '' ?> <?= (isset($isSubmit) && isset($errors['password_confirmation'])) ? 'is-invalid' : '' ?>"
                            id="password_confirmation" required>
                        <div class="invalid-feedback">
                        <?= $errors['password_confirmation'] ?? '' ?>.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input name="terms" class="form-check-input <?= (isset($isSubmit) && !isset($errors['terms'])) ? 'is-valid' : '' ?> <?= (isset($isSubmit) && isset($errors['terms'])) ? 'is-invalid' : '' ?>" type="checkbox" value="" id="terms"
                            required>
                        <label class="form-check-label" for="terms">Agree to terms and conditions</label>
                    </div>
                    <div class="invalid-feedback mt-3 ml-0">
                    <?= $errors['terms'] ?? '' ?>.
                    </div>
                </div>
                <button class="btn btn-info btn-rounded" type="submit">S'inscrire</button>
            </form>
        </div>
    </div>
</div>

<?php
require_once ROOT . '/Views/footer.php';