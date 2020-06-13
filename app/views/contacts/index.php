<!doctype html>
<html lang="ru">
<head>
    <?php require_once 'public/blocks/head.php' ?>
    <title>Обратная связь</title>
</head>
    <body>
        <?php require_once 'public/blocks/header.php' ?>
        <div class="main container">
            <h1>Обратная связь</h1>
            <form action="/Contacts" method="post" class="">
                <p>Есть вопрос? Задавайте</p>
                <input type="text" name="name" placeholder="Ваше имя" value = "<?=$_POST['name']?>">
                <input type="email" name="email" placeholder="Ваш email" value = "<?=$_POST['email']?>">
                <input type="number" name="age" placeholder="Ваш возраст" value = "<?=$_POST['age']?>">
                <textarea name="message" placeholder="Ваш вопрос"><?=$_POST['message']?></textarea>
                <div class="error"><?=$data['message']?></div>
                <button class="btn" id="send">Отправить</button>
            </form>
        </div>
        <?php require_once 'public/blocks/footer.php' ?>
    </body>
</html>
