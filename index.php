<?php

//Para rodar o php use o comando: php -S localhost:8000 -c php.ini

include './Controller/RegistroController.php';

//Seleciona a rota do usuario
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
print_r($url);

switch($url)
{
    case '/':
        RegistroController::pageHtmlAlphacode();
    break;

    case '/form/save':
        RegistroController::save();
    break;
}
