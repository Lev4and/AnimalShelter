<?php
session_start();

require_once $_SERVER["DOCUMENT_ROOT"] . "/Logic/Main.php";

$mailing = array();

if(!isset($_POST["action"])){
    $mailing = QueryExecutor::getInstance()->getMalling();

    $_SESSION["params"] = array();

    include "Mailing.php";
}
?>