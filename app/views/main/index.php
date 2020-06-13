<!doctype html>
<html lang="ru">
<head>
    <?php require_once 'public/blocks/head.php' ?>
    <title>Главная</title>
</head>
    <body>
        <?php require_once 'public/blocks/header.php' ?>
        <div class="main container">
            <h1>Ну что, уберём всё лишнее?</h1>
            <form action="/Main/addLink" method="post">
                <input type="text" name="long" placeholder="Ссылка, которую нужно сократить" value = "<?=$_POST['long']?>">
                <input type="text" name="short" placeholder="Желаемое сокращение" value = "<?=$_POST['short']?>">
                <div class="error"><?=$info['error']?></div>
                <div class="success"><?=$info['success']?></div>
                <button class="btn" id="send">Сократить</button>
            </form>
            <?php for($i = 0; $i < count($data); $i++): ?>
                <div class="singleLink">
                    <p>Длинная ссылка: <a href='<?=$data[$i]['LongLink']?>'><?=$data[$i]['LongLink']?></a></p>
                    <p>Короткая ссылка: <a href='<?=$data[$i]['ShortLink']?>'><?=$data[$i]['ShortLink']?></a></p>
                    <div class="delButton">Удалить ссылку <i class="far fa-trash-alt"></i></div>
                </div>
            <?php endfor; ?>
        </div>
        <?php require_once 'public/blocks/footer.php' ?>
    </body>
</html>
