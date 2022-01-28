# BACK-END - DESAFIO MULTIPEDIDOS
## _Desenvolvido por Lucas Candido_

Este desafio foi desenvolvido para vaga de Desenvolvedor para empresa Multipedidos.

## RECURSOS

- CRUD completo de usuário

## Tecnologias

Tecnologias utilizadas para o desenvolvimento:

- [Laravel/Lumen] - Um micro-framework incrivelmente rápido do Laravel..
- [MySQL] - O MySQL é um sistema de gerenciamento de banco de dados, que utiliza a linguagem SQL como interface.

## Instalação

O desafio foi desenvolvido nas seguintes versões:
- [Laravel/Lumen] - 8.3.4
- [PHP] - 7.4.16
- [Composer] - 2.0.12

Instale as dependências do projeto com o composer.

```sh
composer update
```

Agora vamos criar o banco de dados e suas tabelas.
Obs: Adicionar o nome do banco de dados no arquivo .env após a criação.

```sh
//Este comando ira criar um banco de dados se o mesmo não existir
php artisan db:create {nome_desejado_para_o_banco}

//Criando as tabelas no banco de dados
php artisan migrate
```

Após o banco ser criado e todas as configurações feitas, vamos iniciar o projeto.
```sh
php -S localhost:8000 -t public
```

## Estrutura da API

* Http > Controllers: Exposição dos endpoints da aplicação.
* database > migrations: Classes de criação de tabelas no banco de dados.
* Models > Entries: Classes com as propriedades de entrada de cada request.
* Models > Outputs: Classes com as propriedades de saida/retorno de cada request.
* Models > Services: Classes responsáveis pelo processamento das requisições .
* web.php: Lista e configuração dos endpoints de cada api exposta.

## Contato

Caso tenham alguma duvida, segue minhas redes:

- [Linkedin] - https://www.linkedin.com/in/lucascandido-ti/
