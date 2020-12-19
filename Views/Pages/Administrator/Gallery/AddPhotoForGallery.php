<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AnimalShelter - Добавление фотографии для галереи</title>
    <link rel="icon" href="/Resources/Images/Icons/Logo.png">
    <link rel="stylesheet" href="/CSS/Pages/Main.css">
    <link rel="stylesheet" href="/CSS/Pages/AddPhotoForGallery.css">
    <link rel="stylesheet" href="/CSS/Elements/Form.css">
    <link rel="stylesheet" href="/CSS/Templates/Header.css">
    <link rel="stylesheet" href="/CSS/Templates/Footer.css">
    <script src="/JS/UnloadFile.js"></script>
    <script src="/JS/XmlHttp.js"></script>
    <script src="/JS/JQuery.js"></script>
    <script src="/JS/Ajax.js"></script>
</head>
<body>
<div class="main">
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/Views/Renders/Header.php"; ?>
    <div class="content">
        <?php if(Access::isAdministrator()): ?>
            <div class="header-block">
                <h1>Добавление фотографии для галереи</h1>
            </div>
            <div class="form-block">
                <form action="." method="post" enctype="multipart/form-data">
                    <div class="form-block-image-block">
                        <div class="form-block-image-block-container">
                            <img id="gallery-photo" name="photo">
                        </div>
                    </div>
                    <div class="form-block-actions">
                        <div class="form-block-actions-button">
                            <input class="action-button" id="login-button" type="submit" name="action" value="Записать"/>
                        </div>
                        <div class="form-block-actions-select-file">
                            <input id="select-file" type="file" name="selectedImage" accept="image/*" onchange="onChangeSelectedFile('select-file' , 'gallery-photo');">
                        </div>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/Views/Renders/Footer.php"; ?>
    <?php !Access::isAdministrator() ? Access::denyAccess() : VisibleError::show(); ?>
</div>
</body>
</html>