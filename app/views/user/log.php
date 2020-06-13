<!doctype html>
<html lang="ru">
<head>
    <?php require_once 'public/blocks/head.php' ?>
    <title>Вход</title>
</head>
    <body>
        <?php require_once 'public/blocks/header.php' ?>
        <div class="main container">
            <h1>Вход</h1>
            <form action="/User/log" method="post" class="">
                <input type="text" name="login" placeholder="Ваш логин" value = "<?=$_POST['login']?>">
                <input type="password" name="pass" placeholder="Пароль" value = "<?=$_POST['pass']?>">
                <div class="error"><?=$data['message']?></div>
                <button class="btn" id="send">Войти</button>
                <span>Нет аккаунта? <a href="/User/reg">Зарегистрироваться</a></span>
            </form>
        </div>
        <?php require_once 'public/blocks/footer.php' ?>
    </body>
</html>
