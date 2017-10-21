<?php include __DIR__ . '/../layout/head.php'; ?>

<div class="col-md-3">
    &nbsp;
</div>
<div class="col-md-5">
    <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Acesse</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Senha" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
