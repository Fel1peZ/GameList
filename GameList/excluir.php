<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("dao/JogoDAO.php");

    $dao = new JogoDAO;
    $dao->removerJogos($_GET['id']);
    header("location: index.php");
    exit();