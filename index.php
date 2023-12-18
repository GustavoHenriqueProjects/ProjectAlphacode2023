<?php

//Para rodar o php use o comando: php -S localhost:8000 -c php.ini

include './Controller/RegistroController.php';

//Seleciona a rota do usuario
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
print_r($url);

switch ($url) {
    case '/':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            RegistroController::save();
        }else if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
            RegistroController::delete();
        }else if($_SERVER['REQUEST_METHOD'] === 'PATCH'){
           RegistroController::patch();
        }
        else {
            RegistroController::pageHtmlAlphacode();
        }
        break;

    default:
        RegistroController::erroRota();
        break;
}