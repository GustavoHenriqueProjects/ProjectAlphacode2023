<?php

class RegistroDAO
{
    private $conexao;

    public function __construct()
    {

        try {
            //Conecção com o banco de dados
            $servername = "localhost";
            $username = "root";
            $password = "135796Ar";
            $database = "db_register_alphacode";

            $this->conexao = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        } catch (Throwable $error) {
            echo "Ocorreu o sequinte erro: {$error->getMessage()}";

            die();
        }
    }

    public function insert(RegistroModel $model)
    {
        try {
            // Inserção na tabela tbl_pessoa
            $stmt = $this->conexao->prepare("
                INSERT INTO tbl_pessoa (nome, email, data_nascimento, profissao)
                VALUES (:nome, :email, :data_nascimento, :profissao)
            ");
            $stmt->bindParam(':nome', $model->nome);
            $stmt->bindParam(':email', $model->email);
            $stmt->bindParam(':data_nascimento', $model->data_nascimento);
            $stmt->bindParam(':profissao', $model->profissao);
            $stmt->execute();

            // Recupera o ID gerado automaticamente
            $pessoa_id = $this->conexao->lastInsertId();

            // Inserção na tabela tbl_contato
            $stmt = $this->conexao->prepare("
                INSERT INTO tbl_contato (pessoa_id, numero_telefone, numero_celular, possui_whatsapp)
                VALUES (:pessoa_id, :numero_telefone, :numero_celular, :possui_whatsapp)
            ");
            $stmt->bindParam(':pessoa_id', $pessoa_id);
            $stmt->bindParam(':numero_telefone', $model->numero_telefone);
            $stmt->bindParam(':numero_celular', $model->numero_celular);
            $stmt->bindParam(':possui_whatsapp', $model->possui_whatsapp);
            $stmt->execute();

            // Inserção na tabela tbl_notificacao
            $stmt = $this->conexao->prepare("
                INSERT INTO tbl_notificacao (pessoa_id, enviar_notificacao_sms, enviar_notificacao_email)
                VALUES (:pessoa_id, :enviar_notificacao_sms, :enviar_notificacao_email)
            ");
            $stmt->bindParam(':pessoa_id', $pessoa_id);
            $stmt->bindParam(':enviar_notificacao_sms', $model->enviar_notificacao_sms);
            $stmt->bindParam(':enviar_notificacao_email', $model->enviar_notificacao_email);
            $stmt->execute();
        } catch (Throwable $error) {
            echo "Ocorreu o seguinte erro durante a inserção: {$error->getMessage()}";
            die();
        }
    }

    public function select()
    {
        try {
            $sql = "
                SELECT
                    pessoa.id AS pessoa_id,
                    pessoa.nome,
                    pessoa.email,
                    pessoa.data_nascimento,
                    pessoa.profissao,
                    contato.numero_telefone,
                    contato.numero_celular,
                    contato.possui_whatsapp,
                    notificacao.enviar_notificacao_sms,
                    notificacao.enviar_notificacao_email
                FROM
                    tbl_pessoa pessoa
                LEFT JOIN
                    tbl_contato contato ON pessoa.id = contato.pessoa_id
                LEFT JOIN
                    tbl_notificacao notificacao ON pessoa.id = notificacao.pessoa_id
            ";

            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Throwable $error) {
            echo "Ocorreu o seguinte erro durante a seleção: {$error->getMessage()}";
            die();
        }
    }

    public function patchRegister(RegistroModel $model)
    {
        try {

            $stmt = $this->conexao->prepare("
                UPDATE tbl_pessoa
                SET nome = :nome,
                    data_nascimento = :data_nascimento,
                    email = :email
                WHERE id = :pessoa_id
            ");

            $stmt->bindParam(':pessoa_id', $model->pessoa_id);
            $stmt->bindParam(':nome', $model->nome);
            $stmt->bindParam(':data_nascimento', $model->data_nascimento);
            $stmt->bindParam(':email', $model->email);
            $stmt->execute();

            $stmt = $this->conexao->prepare("
                UPDATE tbl_contato
                SET numero_celular = :numero_celular
                WHERE pessoa_id = :pessoa_id
            ");

            $stmt->bindParam(':pessoa_id', $model->pessoa_id);
            $stmt->bindParam(':numero_celular', $model->numero_celular);
            $stmt->execute();

            echo "Dados Recebidos para Atualização:";
            print_r($model);
        } catch (PDOException $error) {
            echo "Ocorreu o seguinte erro durante a atualização da pessoa: {$error->getMessage()}";
            die();
        }
    }

    public function delete($pessoa_id)
    {
        try {
            // Delete from tbl_notificacao
            $stmt = $this->conexao->prepare("DELETE FROM tbl_notificacao WHERE pessoa_id = :pessoa_id");
            $stmt->bindParam(':pessoa_id', $pessoa_id);
            $stmt->execute();

            // Delete from tbl_contato
            $stmt = $this->conexao->prepare("DELETE FROM tbl_contato WHERE pessoa_id = :pessoa_id");
            $stmt->bindParam(':pessoa_id', $pessoa_id);
            $stmt->execute();

            // Delete from tbl_pessoa
            $stmt = $this->conexao->prepare("DELETE FROM tbl_pessoa WHERE id = :pessoa_id");
            $stmt->bindParam(':pessoa_id', $pessoa_id);
            $stmt->execute();
        } catch (Throwable $error) {
            echo "Ocorreu o seguinte erro durante a exclusão: {$error->getMessage()}";
            die();
        }
    }
}
