<header>
    <div class ='header'>
        <div class='logo'>
            <img src='/public/img/logo.png' alt='logo'>
            <span>и ссылка уменьшена!</span>
        </div>
        <div class="nav">
            <a href ='/'>Главная</a>
            <a href ='/contacts'>Контакты</a>
            <a href ='/about'>О нас</a>
            <?php if($_COOKIE['log'] != ''): ?>
                <a href ='/user'>Личный кабинет</a>
            <?php else: ?>
                <a href ='/user'>Войти</a>
            <?php endif; ?>
        </div>
    </div>
</header>
