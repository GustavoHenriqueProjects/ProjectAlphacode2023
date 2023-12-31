<?php

class RegistroModel
{

    public $nome;
    public $email;
    public $data_nascimento;
    public $profissao;

    public $numero_telefone;
    public $numero_celular;
    public $possui_whatsapp;

    public $enviar_notificacao_sms;
    public $enviar_notificacao_email;

    public $pessoa_id;

    public $registro;

    public function save()
    {
        include './Dao/RegistroDao.php';
        $dao = new RegistroDAO();

        $dao->insert($this);

        $this->registro = $dao->select();
    }

    public function getAll()
    {
        include './Dao/RegistroDAO.php';

        $dao = new RegistroDAO();

        $this->registro = $dao->select();
    }

    public function patch()
    {
        include './Dao/RegistroDao.php';
        $dao = new RegistroDAO();

        // Verifica se pelo menos um campo para atualização foi fornecido
        if ($this->nome !== null || $this->data_nascimento !== null || $this->email !== null || $this->numero_celular !== null) {
            $dao->patchRegister($this);

            if ($this->nome !== null || $this->data_nascimento !== null || $this->email !== null || $this->numero_celular !== null) {
                $dao->patchRegister($this);

                // Atualiza a propriedade de registro no modelo com os dados atualizados
                $this->registro = $dao->select();
            }
        }
    }

    public function delete()
    {
        include './Dao/RegistroDAO.php';
        $dao = new RegistroDAO();
        $dao->delete($this->pessoa_id);

        $this->registro = $dao->select();
    }
}
