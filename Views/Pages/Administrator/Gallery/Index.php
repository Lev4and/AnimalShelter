<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";

$photos = array();

if(isset($_GET["action"]) && $_GET["action"] == "Добавить"){
    header("Location: AddPhotoForGallery.php");
    exit();
}

if(isset($_GET["action"]) && $_GET["action"] == "Изменить"){
    header("Location: EditPhotoForGallery.php?photoId={$_GET["photoId"]}");
    exit();
}

if(isset($_GET["action"]) && $_GET["action"] == "Удалить"){
    QueryExecutor::getInstance()->removePhotoForGallery($_GET["photoId"]);

    header("Location: .");
    exit();
}

if(isset($_POST["action"]) && $_POST["action"] == "Записать") {
    if (isset($_FILES["selectedImage"]["name"]) && iconv_strlen($_FILES["selectedImage"]["name"], "UTF-8") > 0 && isset($_FILES["selectedImage"]["tmp_name"]) && iconv_strlen($_FILES["selectedImage"]["tmp_name"], "UTF-8") > 0) {
        $fileName = $_FILES["selectedImage"]["name"];
        $tmpFileName = $_FILES["selectedImage"]["tmp_name"];

        if(isset($fileName) && isset($tmpFileName)){
            move_uploaded_file($tmpFileName, $_SERVER["DOCUMENT_ROOT"] . "/Resources/Images/Upload/$fileName");
        }

        QueryExecutor::getInstance()->addPhotoForGallery(iconv_strlen($fileName) > 0 ? $fileName : $_GET["photo"]);

        header("Location: http://{$_SERVER["SERVER_NAME"]}/Views/Pages/Administrator/Gallery/");
        exit();
    }
    else{
        $_SESSION["error"] = "Вы указали неверные данные.";

        $_SESSION["params"]["addPhotoForGallery"] = array();
        $_SESSION["params"]["addPhotoForGallery"] = $_POST;

        header("Location: AddPhotoForGallery.php");
        exit();
    }
}

if(isset($_POST["action"]) && $_POST["action"] == "Сохранить") {
    if (isset($_FILES["selectedImage"]["name"]) && iconv_strlen($_FILES["selectedImage"]["name"], "UTF-8") > 0 && isset($_FILES["selectedImage"]["tmp_name"]) && iconv_strlen($_FILES["selectedImage"]["tmp_name"], "UTF-8") > 0 || (isset($_GET["photo"]) && iconv_strlen($_GET["photo"], "UTF-8") > 0)) {
        $fileName = $_FILES["selectedImage"]["name"];
        $tmpFileName = $_FILES["selectedImage"]["tmp_name"];

        if(isset($fileName) && isset($tmpFileName)){
            move_uploaded_file($tmpFileName, $_SERVER["DOCUMENT_ROOT"] . "/Resources/Images/Upload/$fileName");
        }

        QueryExecutor::getInstance()->updatePhotoForGallery($_GET["photoId"], iconv_strlen($fileName) > 0 ? $fileName : $_GET["photo"]);

        header("Location: http://{$_SERVER["SERVER_NAME"]}/Views/Pages/Administrator/Gallery/");
        exit();
    }
    else{
        $_SESSION["error"] = "Вы указали неверные данные.";

        $_SESSION["params"]["editPhotoForGallery"] = array();
        $_SESSION["params"]["editPhotoForGallery"] = $_POST;

        header("Location: EditPhotoForGallery.php?photoId={$_GET["photoId"]}");
        exit();
    }
}

if(!isset($_POST["action"])){
    $photos = QueryExecutor::getInstance()->getGallery();

    $_SESSION["params"] = array();

    include "Photos.php";
}
?>