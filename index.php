<?php

//Para rodar o php use o comando: php -S localhost:8000 -c php.ini

include './Controller/RegistroController.php';

//Seleciona a rota do usuario
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
print_r($url);

switch ($url) {
    case '/':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Se o método de requisição for POST, chame o método save
            RegistroController::save();
        }else {
            // Se não, chame a página principal
            RegistroController::pageHtmlAlphacode();
        }
        break;

    default:
        echo "Rota não encontrada";
        break;
}