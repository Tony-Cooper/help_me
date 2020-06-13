<!doctype html>
<html lang="ru">
<head>
    <?php require_once 'public/blocks/head.php' ?>
    <title>Личный кабинет</title>
</head>
    <body>
        <?php require_once 'public/blocks/header.php' ?>
        <div class="main container">
            <h1>Личный кабинет</h1>
            <form action="/user/exit" method="post">
                <h4>Здравствуйте, <?=$data?>!</h4>
                <input type="hidden" name="exit">
                <button type="submit" class="btn">Выйти</button>
            </form>
        </div>
        <?php require_once 'public/blocks/footer.php' ?>
    </body>
</html>

