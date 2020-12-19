<footer class="footer">
    <div class="footer-content">
        <div class="footer-top">
            <div class="footer-top-logo">
                <div class="footer-top-logo-container">
                    <img src="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/Resources/Images/Icons/Logo.png"; ?>">
                </div>
                <div class="footer-top-logo-name">
                    <b>AnimalShelter</b>
                </div>
            </div>
        </div>
        <div class="footer-middle">
            <div class="footer-middle-sections">
                <div id="footer-middle-section-links-block" class="footer-middle-section">
                    <div class="footer-middle-section-links">
                        <span>Клиентам</span>
                        <ul>
                            <li><a href="<?php echo  "http://" . $_SERVER["SERVER_NAME"] . "/Views/Pages/Policy.php";  ?>">Политика конфиденциальности</a></li>
                        </ul>
                    </div>
                </div>
                <div id="footer-middle-section-contacts" class="footer-middle-section">
                    <div class="footer-middle-section-contacts-links-block">
                        <span><a name="contacts">Контакты</a></span>
                        <div class="footer-middle-section-contacts-links">
                            <div class="footer-middle-section-contacts-link">
                                <img src="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/Resources/Images/Interface/VK.png"; ?>">
                            </div>
                            <div class="footer-middle-section-contacts-link">
                                <img src="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/Resources/Images/Interface/YouTube.png"; ?>">
                            </div>
                            <div class="footer-middle-section-contacts-link">
                                <img src="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/Resources/Images/Interface/Instagram.png"; ?>">
                            </div>
                            <div class="footer-middle-section-contacts-link">
                                <img src="<?php echo "http://" . $_SERVER["SERVER_NAME"] . "/Resources/Images/Interface/Telegram.png"; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="footer-middle-section-contacts-mailing">
                        <span>Рассылка о новостях и акциях:</span>
                        <form id="footer-middle-section-contacts-mailing-form" class="footer-middle-section-contacts-mailing-form" action="." method="post">
                            <div class="footer-middle-section-contacts-mailing-form-input-container">
                                <input class="footer-middle-section-contacts-mailing-email" type="eMail" name="eMail" placeholder="Введите email и подпшитесь" value="<?php echo $_SESSION["user"]["e_mail"]; ?>">
                            </div>
                            <div class="footer-middle-section-contacts-mailing-form-icon-button-container">
                                <span class="footer-middle-section-contacts-mailing-email-icon-button"><a><input type="submit" name="action" value="❯"></a></span>
                            </div>
                        </form>
                    </div>
                    <div class="footer-middle-section-contacts-data-block">
                        <ul>
                            <li>Телефон: +7 (951) 122-13-02</li>
                            <li>Адрес: город Челябинск, улица Загородная, дом 15</li>
                            <li>Время работы: с 10:00 до 21:00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <span>© 2020 AnimalShelter by <a href="https://vk.com/k.larina69">Екатерина Архиреева</a>.</span>
        </div>
    </div>
</footer>