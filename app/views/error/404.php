<!doctype html>
<html lang="ru">
<head>
    <?php require_once 'public/blocks/head.php' ?>
    <title>Ошибка</title>
</head>
    <body>
        <?php require_once 'public/blocks/header.php' ?>
        <div class="main container">
            <h3>Упс....</h3>
            <p class="notFound">К сожалению, запрашиваемая ссылка
                <?php $data ?>
                не найдена. Вы можете <a href="/main/index">создать новую или
                    просмотреть список своих ссылок</a></p>
        </div>
        <?php require_once 'public/blocks/footer.php' ?>
    </body>
</html>

