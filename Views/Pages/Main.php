<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AnimalShelter - Главная</title>
    <link rel="icon" href="/Resources/Images/Icons/Logo.png">
    <link rel="stylesheet" href="/CSS/Pages/Main.css">
    <link rel="stylesheet" href="/CSS/Templates/Header.css">
    <link rel="stylesheet" href="/CSS/Templates/Footer.css">
    <script src="/JS/XmlHttp.js"></script>
    <script src="/JS/JQuery.js"></script>
    <script src="/JS/Ajax.js"></script>
</head>
<body>
<div class="main">
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/Views/Renders/Header.php"; ?>
    <div class="content">
        <div class="content-image">
            <div class="content-image-container">
                <img src="/Resources/Images/Interface/TQpjdK05ytM.jpg">
            </div>
        </div>
        <div class="about-us">
            <span><a name="aboutUs">Кто мы</a></span>
            <div class="about-us-description">
                В организации «AnimalShelter» мы хорошо знаем, что иногда даже небольшая помощь может способствовать занчительным переменам. С момента основания в 2020 году мы делаем все, чтобы изменить общество к лучшему.
            </div>
        </div>
        <div class="content-image">
            <div class="content-image-container">
                <img src="/Resources/Images/Interface/AJDc3YmtC4Q.jpg">
            </div>
        </div>
        <div class="write-to-us">
            <a name="writeToUs"></a>
            <div class="write-to-us-information">
                <span>«AnimalShelter» связаться</span>
                <ul>
                    <li>Телефон: +7 (951) 122-13-02</li>
                    <li>Адрес: город Челябинск, улица Загородная, дом 15</li>
                    <li>Время работы: с 10:00 до 21:00</li>
                </ul>
            </div>
            <div class="write-to-us-form">
                <form action="<?php echo "http://{$_SERVER["SERVER_NAME"]}/"; ?>" method="post">
                    <div>
                        <div class="write-to-us-form-row">
                            <div class="write-to-us-form-row-column">
                                <div class="write-to-us-form-row-column-input">
                                    <input type="text" name="name" placeholder="Имя" value="<?php echo $_SESSION["user"]["full_name"]; ?>">
                                </div>
                            </div>
                            <div class="write-to-us-form-row-column">
                                <div class="write-to-us-form-row-column-input">
                                    <input type="text" name="eMail" placeholder="Эл. почта" value="<?php echo $_SESSION["user"]["e_mail"]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="write-to-us-form-row">
                            <div class="write-to-us-form-row-column">
                                <div class="write-to-us-form-row-column-input">
                                    <input type="text" name="phone" placeholder="Телефон" value="<?php echo $_SESSION["user"]["phone_number"]; ?>">
                                </div>
                            </div>
                            <div class="write-to-us-form-row-column">
                                <div class="write-to-us-form-row-column-input">
                                    <input type="text" name="address" placeholder="Адрес" value="<?php echo $_SESSION["user"]["address"]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="contact-form-row">
                            <div id="write-to-us-form-row-column-message-block" class="write-to-us-form-row-column">
                                <div class="write-to-us-form-row-column-textarea">
                                    <textarea name="message" placeholder="Добавьте сообщение"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="write-to-us-form-row">
                            <div id="write-to-us-form-row-column-button" class="write-to-us-form-row-column">
                                <div class="write-to-us-form-row-column-button">
                                    <input type="submit" name="action" value="Отправить" />
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d872.8550215858334!2d61.39804403821594!3d55.14283931306913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43c58d58107d4e23%3A0xfc2ebc356314f9fb!2z0JLQtdGC0LXRgNC40L3QsNGA0L3Ri9C1INCf0YDQtdC_0LDRgNCw0YLRiw!5e0!3m2!1sru!2sru!4v1607964286283!5m2!1sru!2sru" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/Views/Renders/Footer.php"; ?>
    <?php VisibleError::show(); ?>
</div>
</body>
</html>