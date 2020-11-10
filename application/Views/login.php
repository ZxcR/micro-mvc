<form class="form-signin text-center" action="auth" method="POST">
    <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>
    <div class="form-group">
        <label for="login" class="sr-only">Логин</label>
        <input type="text" id='login' class="form-control" placeholder="Логин" name='login' required="required" autofocus="">
        <?php if(isset($messages["login"])): ?>
            <?php foreach($messages["login"] as $loginMessage): ?>
                <span class="text-danger"><?= $loginMessage ?></span>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="password" class="sr-only">Пароль</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Пароль" required="required">
        <?php if(isset($messages["password"])): ?>
            <?php foreach($messages["password"] as $passwordMessage): ?>
                <span class="text-danger"><?= $passwordMessage ?></span>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Авторизоваться</button>
</form>