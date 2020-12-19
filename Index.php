<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";

if(!isset($_SESSION["params"])){
    $_SESSION["params"] = array();
}

if(!isset($_SESSION["user"])){
    $_SESSION["user"] = array();
}

if(!isset($_SESSION["error"])){
    $_SESSION["error"] = "";
}

if(isset($_POST["action"]) && $_POST["action"] == "Авторизоваться"){
    if(isset($_POST["login"]) && iconv_strlen($_POST["login"], "UTF-8") > 0 && isset($_POST["password"]) && iconv_strlen($_POST["password"], "UTF-8") > 0){
        if(QueryExecutor::getInstance()->authorization($_POST["login"], $_POST["password"])){
            $_SESSION["user"] = QueryExecutor::getInstance()->getUser($_POST["login"]);

            $_SESSION["params"]["authorization"] = array();
        }
        else{
            $_SESSION["error"] = "Вы ввели неверный логин или пароль.";

            $_SESSION["params"]["authorization"] = array();
            $_SESSION["params"]["authorization"] = $_POST;

            header("Location: /Views/Pages/Authorization.php");
            exit();
        }
    }
    else{
        $_SESSION["error"] = "Вы указали неверные данные.";

        $_SESSION["params"]["authorization"] = array();
        $_SESSION["params"]["authorization"] = $_POST;

        header("Location: /Views/Pages/Authorization.php");
        exit();
    }
}

if(isset($_POST["action"]) && $_POST["action"] == "Зарегистрироваться"){
    if(isset($_POST["roleId"]) && isset($_POST["fullName"]) && iconv_strlen($_POST["fullName"], "UTF-8") > 0 && isset($_POST["eMail"]) && iconv_strlen($_POST["eMail"], "UTF-8") > 0 && isset($_POST["phoneNumber"]) && iconv_strlen($_POST["phoneNumber"], "UTF-8") > 0 && isset($_POST["address"]) && iconv_strlen($_POST["address"], "UTF-8") > 0 && isset($_POST["dateOfBirth"]) && iconv_strlen($_POST["dateOfBirth"], "UTF-8") > 0 && isset($_POST["login"]) && iconv_strlen($_POST["login"], "UTF-8") > 0 && isset($_POST["password"]) && iconv_strlen($_POST["password"], "UTF-8") > 0 && isset($_POST["repeatPassword"]) && iconv_strlen($_POST["repeatPassword"], "UTF-8") > 0){
        if($_POST["password"] == $_POST["repeatPassword"]){
            if(!QueryExecutor::getInstance()->containsUser($_POST["login"])){
                QueryExecutor::getInstance()->registration($_POST["roleId"], $_POST["fullName"], $_POST["eMail"], $_POST["phoneNumber"], $_POST["address"], $_POST["dateOfBirth"], $_POST["login"], $_POST["password"]);

                $_SESSION["params"]["registration"] = array();

                header("Location: /Views/Pages/Authorization.php");
                exit();
            }
            else{
                $_SESSION["error"] = "Пользователь с таким логином уже существует.";

                $_SESSION["params"]["registration"] = array();
                $_SESSION["params"]["registration"] = $_POST;

                header("Location: /Views/Pages/Registration.php");
                exit();
            }
        }
        else{
            $_SESSION["error"] = "Пароли не совпадают.";

            $_SESSION["params"]["registration"] = array();
            $_SESSION["params"]["registration"] = $_POST;

            header("Location: /Views/Pages/Registration.php");
            exit();
        }
    }
    else{
        $_SESSION["error"] = "Вы указали неверные данные.";

        $_SESSION["params"]["registration"] = array();
        $_SESSION["params"]["registration"] = $_POST;

        header("Location: /Views/Pages/Registration.php");
        exit();
    }
}

if(isset($_POST["action"]) && $_POST["action"] == "Отправить"){
    if(Access::isAuthorized()){
        if(isset($_POST["message"]) && iconv_strlen($_POST["message"], "UTF-8") > 0){
            QueryExecutor::getInstance()->sendMessage($_SESSION["user"]["id"], $_POST["message"]);

            $_SESSION["error"] = "Ваше сообщение было успешно отправлено";
        }
        else{
            $_SESSION["error"] = "Вы указали неверные данные.";
        }
    }
    else{
        $_SESSION["error"] = "Для отправки сообщения необходимо быть авторизованным";
    }
}

if(isset($_POST["action"]) && $_POST["action"] == "❯"){
    if(Access::isAuthorized()){
        if(isset($_POST["eMail"]) && iconv_strlen($_POST["eMail"], "UTF-8") > 0){
            if(!QueryExecutor::getInstance()->containsMailing($_SESSION["user"]["id"])){
                QueryExecutor::getInstance()->addMailing($_SESSION["user"]["id"]);

                $_SESSION["error"] = "Ваша электронная почта подписалась на рассылку о новостях компании.";
            }
            else{
                $_SESSION["error"] = "Ваша электронная почта уже получает от нас рассылку о новостях компании.";
            }
        }
        else{
            $_SESSION["error"] = "Вы указали неверные данные.";
        }
    }
    else{
        $_SESSION["error"] = "Для отправки сообщения необходимо быть авторизованным";
    }
}

if(isset($_POST["action"]) && $_POST["action"] == "Выбрать питомца"){
    QueryExecutor::getInstance()->addUserPet($_POST["userId"], $_POST["petId"]);
}

if(isset($_POST["action"]) && $_POST["action"] == "Выход"){
    $_SESSION["user"] = array();


}

include "Views/Pages/Main.php";
?>