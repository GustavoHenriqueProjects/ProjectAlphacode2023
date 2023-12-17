# Projeto Alphacode 2023

## Instalação

1. Utilize o PHP verção: PHP 7.4.8.
2. Utilize Mysql verção: 5.x
3. Clone ou Fork o sequinte repositorio: https://github.com/GustavoHenriqueProjects/ProjectAlphacode2023.git

## Configuração do banco de dados

1. Crie o banco: CREATE DATABASE db_register_alphacode;

2. Selecione o comando: USE db_register_alphacode;

3. Crie as tabelas com e as relações:

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
![Texto Alternativo](./Assets/imagesVideosMarkdow/ModeloLogico.png)

## Para inicializar o Projeto
1. Na pasta DAO mude o username e a password se nessesario.

2. Rode o sequinte comando para inicialiar o serviço: php -S localhost:8000 -c php.ini

3. Apois isso é usar a aplicação acessando o seu localhost.

### Apresentação de video
<iframe width="560" height="315" src="./Assets/imagesVideosMarkdow/apresentacaoAlphacode.mp4" frameborder="0" allowfullscreen></iframe>


