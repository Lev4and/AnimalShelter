<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";

$pets = array();

if(isset($_GET["action"]) && $_GET["action"] == "Добавить"){
    header("Location: AddPet.php");
    exit();
}

if(isset($_GET["action"]) && $_GET["action"] == "Изменить"){
    header("Location: EditPet.php?petId={$_GET["petId"]}");
    exit();
}

if(isset($_GET["action"]) && $_GET["action"] == "Удалить"){
    QueryExecutor::getInstance()->removePet($_GET["petId"]);

    header("Location: .");
    exit();
}

if(isset($_POST["action"]) && $_POST["action"] == "Записать") {
    if (isset($_POST["name"]) && iconv_strlen($_POST["name"], "UTF-8") > 0 && isset($_POST["age"]) && $_POST["age"] > 0 && isset($_FILES["selectedImage"]["name"]) && iconv_strlen($_FILES["selectedImage"]["name"], "UTF-8") > 0 && isset($_FILES["selectedImage"]["tmp_name"]) && iconv_strlen($_FILES["selectedImage"]["tmp_name"], "UTF-8") > 0) {
        $fileName = $_FILES["selectedImage"]["name"];
        $tmpFileName = $_FILES["selectedImage"]["tmp_name"];

        if(isset($fileName) && isset($tmpFileName)){
            move_uploaded_file($tmpFileName, $_SERVER["DOCUMENT_ROOT"] . "/Resources/Images/Upload/$fileName");
        }

        QueryExecutor::getInstance()->addPet(iconv_strlen($fileName) > 0 ? $fileName : $_GET["photo"], $_POST["name"], $_POST["age"], $_POST["description"]);

        header("Location: http://{$_SERVER["SERVER_NAME"]}/Views/Pages/Administrator/Pet/");
        exit();
    }
    else{
        $_SESSION["error"] = "Вы указали неверные данные.";

        $_SESSION["params"]["addPet"] = array();
        $_SESSION["params"]["addPet"] = $_POST;

        header("Location: AddPet.php");
        exit();
    }
}

if(isset($_POST["action"]) && $_POST["action"] == "Сохранить") {
    if (isset($_POST["name"]) && iconv_strlen($_POST["name"], "UTF-8") > 0 && isset($_POST["age"]) && $_POST["age"] > 0 ) {
        $fileName = $_FILES["selectedImage"]["name"];
        $tmpFileName = $_FILES["selectedImage"]["tmp_name"];

        if(isset($fileName) && isset($tmpFileName)){
            move_uploaded_file($tmpFileName, $_SERVER["DOCUMENT_ROOT"] . "/Resources/Images/Upload/$fileName");
        }

        QueryExecutor::getInstance()->updatePet($_GET["petId"], iconv_strlen($fileName) > 0 ? $fileName : $_GET["photo"], $_POST["name"], $_POST["age"], $_POST["description"]);

        header("Location: http://{$_SERVER["SERVER_NAME"]}/Views/Pages/Administrator/Pet/");
        exit();
    }
    else{
        $_SESSION["error"] = "Вы указали неверные данные.";

        $_SESSION["params"]["editPet"] = array();
        $_SESSION["params"]["editPet"] = $_POST;

        header("Location: EditPet.php?petId={$_GET["petId"]}");
        exit();
    }
}

if(!isset($_POST["action"])){
    $pets = QueryExecutor::getInstance()->getPets();

    $_SESSION["params"] = array();

    include "Pets.php";
}
?>