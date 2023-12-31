# Projeto Alphacode 2023

## Instalação

1. Utilize o PHP versão: PHP 7.4.8.
2. Utilize Mysql versão: 5.x
3. Clone ou Fork o seguinte repositório: https://github.com/GustavoHenriqueProjects/ProjectAlphacode2023.git

## Configuração do banco de dados

1. Crie o banco de dados com o comando: CREATE DATABASE db_register_alphacode;

2. Selecione o banco de dados executando o comando: USE db_register_alphacode;

3. Crie as tabelas com as relações:

```sql
### Tabela `tbl_pessoa`
CREATE TABLE tbl_pessoa (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    profissao VARCHAR(100) NOT NULL,
    UNIQUE INDEX(id)
);


### Tabela `tbl_contato`
CREATE TABLE tbl_contato (
    id_contato INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pessoa_id INT NOT NULL,
    numero_telefone VARCHAR(15) NOT NULL,
    numero_celular VARCHAR(15) NOT NULL,
    possui_whatsapp BOOLEAN NOT NULL,
    FOREIGN KEY (pessoa_id) REFERENCES tbl_pessoa(id)
);


### Tabela `tbl_notificacao`
CREATE TABLE tbl_notificacao (
    id_notificacao INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pessoa_id INT NOT NULL,
    enviar_notificacao_sms BOOLEAN NOT NULL,
    enviar_notificacao_email BOOLEAN NOT NULL,
    FOREIGN KEY (pessoa_id) REFERENCES tbl_pessoa(id)
);

```
4. O seu workbench deverá ficar semelhante a esse:
![Imagem do workbench com as tabelas](./Assets/imagesVideosMarkdow/ModeloLogico.png)

## Para inicializar o Projeto
1. Na pasta DAO acesse o arquivo RegistroDao e mude o username e a password que são os acessos do seu banco.

2. Na pasta raiz do projeto execute o seguinte comando para iniciar o serviço: php -S localhost:8000 -c php.ini

3. Apois isso é só usar a aplicação acessando o seu localhost.

### Click na imagem para assistir ou baixar o vídeo

[![Assista à apresentação em vídeo](./Assets/imagesVideosMarkdow/FrontendAlphacode2023.png)](./Assets/imagesVideosMarkdow/apresentacaoAlphacode.mp4)



