# Desafio Back-End - Nextale

Esse é o código fonte do projeto do desafio Nextale que visa entregar a simulação de uma demanda de um sistema backend para controle interno de conteúdos.

O sistema consiste em dois principais pontos:
 - Gerenciador de contos
 - Gerenciador de midias

## Pré-requisitos
 
Para começar a trabalhar no projeto você vai precisar ter instalados em sua máquina:
 
 - [Laravel](https://laravel.com/)
 - [MySQL/](https://www.mysql.com/)
 - [Insomnia](https://insomnia.rest/)

Para configurar o projeto em sua máquina, siga o passo a passo abaixo:

## Clonando o projeto

- Clone o projeto usando o git, via HTTPS, clicando no botão **Code -> Clone**, na página do GIT do projeto ou usando os comandos abaixo:

Clone via HTTPS:
```
git clone https://github.com/pedroinbezerra/nextale.git
```

## Instalando as dependências

Para instalar as dependências , acesse a pasta onde o projeto foi clonado e em seguida execute o comando abaixo:

```
composer install
```

## Configurando o ambiente

Crie uma base de dados no MySQL para utilizarmos com o projeto.

Copie o arquivo *.env.example* na raiz do projeto e renomeie como *.env* apenas.
Após isso, ajuste os parâmetros conforme abaixo:
```
DB_CONNECTION=mysql //Banco de dados que você quer utilizar
DB_HOST=127.0.0.1 // Nesse exempl aponta para um banco local
DB_PORT=3306 // Essa é a porta padrão do MySQL
DB_DATABASE=database_name // Esse é o nome do banco de dados que você vai usar
DB_USERNAME=root // Esse é o usuário para conexão com o banco de dados
DB_PASSWORD=password // Essa é a senha do usuário acima
```


## Executando o projeto

Na pasta do projeto, execute o comando abaixo para iniciar/criar as tabelas:

``` bash
php artisan migrate
```

Em seguida execute o comando abaixo para iniciar o projeto:

``` bash
php artisan serve
```

O projeto agora deve estar disponível na porta 8000 e poderá ser acessado através do link:

http://localost:8000


## Endpoints

Cada endpoint abaixo executa uma ação específica.

- Cadastra um conto
**POST** http://127.0.0.1:8000/api/tale
**BODY: JSON**
> "title": "Titulo",
> 	"body": "Descrição",
> "is_enabled": true

- Exibe todos os contos cadastrados por ordem de cadastro
**GET** http://127.0.0.1:8000/api/tale

- Exibe um conto por id
**GET** http://127.0.0.1:8000/api/tale/:id

- Altera os dados de um conto por id
**PATCH** http://127.0.0.1:8000/api/tale/:id
**BODY: JSON**
> "title": "Titulo",
> 	"body": "Descrição",
> "is_enabled": true

- Exclui um conto por id
**DELETE** http://127.0.0.1:8000/api/tale/:id

- Faz o upload de uma midia
**POST** http://127.0.0.1:8000/api/file/:id
**BODY: MULTIPART**
> "file" : "File.png",
> "fk_tale_id" : 1,
> "title": "Titulo",
> "is_enabled": 1

- Exibe a url de uma midia por id
**GET** http://127.0.0.1:8000/api/file/:id

- Excluia uma midia por id
**DELETE** http://127.0.0.1:8000/api/file/:id