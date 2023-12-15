<?php

class RegistroModel{

    public $nome;
    public $email;
    public $data_nascimento;
    public $profissao;

    public $numero_telefone;
    public $numero_celular;
    public $possui_whatsapp;

    public $enviar_notificacao_sms;
    public $enviar_notificacao_email;

    public function save() {
        include './Dao/RegistroDao.php';

        $dao = new RegistroDAO();

        $dao->insert($this);
    }
}