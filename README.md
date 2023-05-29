# AngularApiPhp

Este projeto foi gerado com [Angular CLI](https://github.com/angular/angular-cli) version 15.2.6. 

## Descrição do projeto

O Angular-api-php é um CRUD (Create,Read,Update e Delete) simples em Angular que interage com o banco de dados MariaDB através de uma api Php. 

## Tecnologias utilizadas

* Framework Angular 
* Linguagem de programação Php (api)
* Stack Xampp (Apache e MariaDB)
* Editor Sublime
* Sistema operacional Windows

## Instruções

* Criar uma pasta (com um nome qualquer) em htdocs no XAMPP (c:\xampp\htdocs\pastaNomeQualquer); no caso do WAMPP (c:\wampp\www).
* Clonar o projeto angular-api-php para a pasta criada anteriormente.
* Retirar a pasta api-php de src/app/assets e colocá-la ao lado da pasta angular-api-php na pasta anteriormente criada, ou seja, as duas pastas, angular-api-php e api-php ficaram na mesma pasta.
* Ligar o XAMPP e "startar" o servidor Apache e o MariaDB (o MariaDB só funciona com o Apache ligado).
* Obs 1: no arquivo api.service.ts está o caminho da api php ( PHP_API = "http://localhost/projetos/angular-api-php/api-php"; ), esse caminho devevar ser trocado pelo caminho do seu sistema, ou seja, ( PHP_API = "http://localhost/pastaNomeQualquer/api-php"; ).
* Obs 2: a pasta db em src/app/assets contém o esquena do banco de dados, não faz parte da estrutura do Angular.

## Servidor Angular

No prompt de comando, navegue até o diretório angular-api-php e execute `ng serve` para rodar o servidor. Navegue até `http://localhost:4200/`. O aplicativo será recarregado automaticamente se você alterar qualquer um dos arquivos de origem.

## Mais ajuda

Para obter mais ajuda sobre o uso do Angular CLI `ng help` ou vá conferir [Angular CLI Overview and Command Reference](https://angular.io/cli).



