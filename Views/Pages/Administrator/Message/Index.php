<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";

$messages = array();

if(!isset($_POST["action"])){
    $messages = QueryExecutor::getInstance()->getMessages();

    $_SESSION["params"] = array();

    include "Messages.php";
}
?>