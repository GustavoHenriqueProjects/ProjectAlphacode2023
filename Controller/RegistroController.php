<?php

class RegistroController
{

    //Responsavel por devolver a view
    public static function pageHtmlAlphacode()
    {
        include './View/modules/Registro/RegistroForm.php';
        self::index();
    }

    public static function erroRota()
    {
        include './View/modules/Registro/ErroRota.php';
    }

    public static function index()
    {
        include './Model/RegistroModel.php';
        $model = new RegistroModel();
        $model->getAll();

        include './View/modules/Registro/RegistroForm.php';
    }

    public static function save()
    {

        include './Model/RegistroModel.php';

        $model = new RegistroModel();

        $model->nome = $_POST['nome'];
        $model->data_nascimento = $_POST['data_nascimento'];
        $model->email = $_POST['email'];
        $model->profissao = $_POST['profissao'];
        $model->numero_telefone = $_POST['numero_telefone'];
        $model->numero_celular = $_POST['numero_celular'];
        $model->possui_whatsapp = isset($_POST['possui_whatsapp']) ? 1 : 0;
        $model->enviar_notificacao_sms = isset($_POST['enviar_notificacao_sms']) ? 1 : 0;
        $model->enviar_notificacao_email = isset($_POST['enviar_notificacao_email']) ? 1 : 0;

        $model->save();

        echo '<script>window.location.href = "/";</script>';

        exit();
    }

    public static function patch()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $id = $data['id'] ?? null;

        if ($id !== null) {
            include './Model/RegistroModel.php';
            $model = new RegistroModel();

            $model->pessoa_id = $id;
            $model->nome = $data['nome'] ?? null;
            $model->data_nascimento = $data['dataNascimento'] ?? null;
            $model->email = $data['email'] ?? null;
            $model->numero_celular = $data['numero_celular'] ?? null;

            $model->patch();

            echo json_encode(['success' => true]);
            exit();
        } else {
            echo json_encode(['error' => 'Invalid or missing ID']);
            exit();
        }
    }

    public static function delete()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'] ?? null;

        if ($id !== null) {
            include './Model/RegistroModel.php';
            $model = new RegistroModel();

            $model->pessoa_id = $id;
            $model->delete();

            echo '<script>window.location.href = "/";</script>';

            exit();
        } else {
            echo json_encode(['error' => 'Invalid or missing ID']);
            exit();
        }
    }
}
