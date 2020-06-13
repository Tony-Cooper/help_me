<!doctype html>
<html lang="ru">
<head>
    <?php require_once 'public/blocks/head.php' ?>
    <title>Регистрация</title>
</head>
<body>
    <?php require_once 'public/blocks/header.php' ?>
        <div class="main container">
            <h1>Регистрация</h1>
            <form action="/User/reg" method="post" class="">
                <input type="text" name="login" placeholder="Ваш логин" value = "<?=$_POST['login']?>">
                <input type="email" name="email" placeholder="Ваш email" value = "<?=$_POST['email']?>">
                <input type="password" name="pass" placeholder="Пароль" value = "<?=$_POST['pass']?>">
                <input type="password" name="re_pass" placeholder="Повторите пароль" value = "<?=$_POST['re_pass']?>">
                <div class="error"><?=$data['message']?></div>
                <button class="btn" id="send">Отправить</button>
                <span>Уже есть аккаунт? <a href="/User/log">Авторизоваться</a></span>
            </form>
        </div>
    <?php require_once 'public/blocks/footer.php' ?>
    </body>
</html>
