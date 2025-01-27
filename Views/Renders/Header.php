<header class="header">
    <div class="header-content">
        <div class="header-content-logo">
            <div class="header-content-logo-container">
                <a href="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/"; ?>"><img src="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/Resources/Images/Icons/Logo.png"; ?>"></a>
            </div>
            <div class="header-content-logo-name">
                <a href="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/"; ?>"><b>AnimalShelter</b></a>
            </div>
        </div>
        <div class="header-content-sections">
            <?php if(Access::isAdministrator()): ?>
                <div id="header-content-section-database" class="header-content-section">
                    <a href="#"><b>База данных</b></a>
                    <ul>
                        <li><a href="<?php echo "http://{$_SERVER["SERVER_NAME"]}/Views/Pages/Administrator/Pet/"; ?>">Питомцы</a></li>
                        <li><a href="<?php echo "http://{$_SERVER["SERVER_NAME"]}/Views/Pages/Administrator/Gallery/"; ?>">Галерея</a></li>
                        <li><a href="<?php echo "http://{$_SERVER["SERVER_NAME"]}/Views/Pages/Administrator/Mailing/"; ?>">Почтовая рассылка</a></li>
                        <li><a href="<?php echo "http://{$_SERVER["SERVER_NAME"]}/Views/Pages/Administrator/Message/"; ?>">Сообщения</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <div class="header-content-section">
                    <a href="<?php echo "http://{$_SERVER["SERVER_NAME"]}/Views/Pages/Pets.php"; ?>"><b>Питомцы</b></a>
                </div>
                <div class="header-content-section">
                    <a href="<?php echo "http://{$_SERVER["SERVER_NAME"]}/Views/Pages/Gallery.php"; ?>"><b>Галерея</b></a>
                </div>
                <div class="header-content-section">
                    <a href="#aboutUs"><b>О нас</b></a>
                </div>
                <div class="header-content-section">
                    <a href="#writeToUs"><b>Напишите нам</b></a>
                </div>
                <div class="header-content-section">
                    <a href="#contacts"><b>Контакты</b></a>
                </div>
            <?php endif; ?>
        </div>
        <div class="header-content-user-block">
            <?php if(!Access::isAuthorized()): ?>
                <div class="header-content-login">
                    <a href="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/Views/Pages/Authorization.php"; ?>"><button>Войти</button></a>
                </div>
            <?php else: ?>
                <div class="header-content-user-information">
                    <div class="header-content-user-login">
                        <b><?php echo $_SESSION["user"]["login"]; ?></b>
                    </div>
                    <ul>
                        <li onclick="onClickExit();"><a href="#">Выход</a></li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>