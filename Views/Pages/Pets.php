<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AnimalShelter - Питомцы</title>
    <link rel="icon" href="/Resources/Images/Icons/Logo.png">
    <link rel="stylesheet" href="/CSS/Pages/Main.css">
    <link rel="stylesheet" href="/CSS/Pages/CatalogPets.css">
    <link rel="stylesheet" href="/CSS/Elements/ItemBlock.css">
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
        <div class="items-block">
            <?php foreach (QueryExecutor::getInstance()->getPets() as $pet): ?>
                <div class="item-block">
                    <div class="item-block-container">
                        <div class="item-block-container-image-container">
                            <img src="<?php echo "http://{$_SERVER["SERVER_NAME"]}/Resources/Images/Upload/{$pet["photo"]}"; ?>">
                        </div>
                        <div class="item-block-container-title">
                            <span>Кличка: <?php echo $pet["name"]; ?></span>
                            <span>Возраст: <?php echo $pet["age"]; ?></span>
                            <div>Описание: <?php echo $pet["description"]; ?></div>
                            <span><button onclick="onClickSelectPet(this, <?php echo $_SESSION["user"]["id"]; ?>, <?php echo $pet["id"]; ?>)" <?php echo isset($_SESSION["user"]["id"]) ? (QueryExecutor::getInstance()->containsUserPet($_SESSION["user"]["id"], $pet["id"]) ? "disabled='disabled'" : "") : "disabled='disabled'"; ?>>Выбрать</button></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/Views/Renders/Footer.php"; ?>
    <?php VisibleError::show(); ?>
</div>
</body>
</html>