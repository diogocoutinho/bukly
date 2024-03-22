# Teste para Desenvolvedor(a) PHP - Bulky

Este é um projeto de exemplo para o teste de desenvolvedor(a) PHP da Bulky. O objetivo deste projeto é avaliar as habilidades do(a) candidato(a) em desenvolvimento web com PHP e Laravel.

## Sobre o Projeto

O projeto consiste em uma aplicação web para gerenciamento de hoteis e seus respectivos quartos. O sistema deve permitir o cadastro de hoteis e quartos, bem como a visualização e edição dos mesmos.

## Tecnologias Utilizadas

- PHP
- Laravel
- JavaScript
- MySQL

## Requisitos

Para rodar este projeto, você precisa ter os seguintes softwares instalados em seu sistema:

- PHP 7.4 ou superior
- Composer
- Node.js
- NPM
- MySQL

Além disso, você precisa ter uma cópia deste repositório em seu sistema local.

## Configuração do Ambiente de Desenvolvimento

Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente do seu projeto. Altere as variáveis `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD` para as configurações do seu banco de dados.
Altere a variável `APP_URL` para a URL do seu projeto.
Em seguida, execute os seguintes comandos:

```bash
# Instalar as dependências do PHP
composer install

# Instalar as dependências do JavaScript
npm install

# Gerar a chave de aplicação
php artisan key:generate

# Criar a estrutura do banco de dados
php artisan migrate

# Popular o banco de dados com dados de exemplo
php artisan db:seed --class=CreateHotelsAndRooms
```

## Como Rodar o Projeto

Para rodar o projeto, execute o seguinte comando:

```bash
php artisan serve
```

## Estrutura do Projeto

O projeto está organizado da seguinte forma:

- `app/`: Contém os modelos, controllers e outros arquivos PHP do projeto.
- `database/`: Contém as factories, migrações e seeds do projeto.
- `public/`: Contém os arquivos públicos do projeto, como imagens, CSS e JavaScript.
- `resources/`: Contém os arquivos de recursos do projeto, como as views, arquivos de tradução e arquivos de JavaScript e CSS.
- `routes/`: Contém os arquivos de rotas do projeto.
- `tests/`: Contém os testes do projeto.

## Funcionalidades

A aplicação deve possuir as seguintes funcionalidades:

- Cadastro de hoteis
- Cadastro de quartos
- Visualização de hoteis
- Visualização de quartos
- Edição de hoteis
- Edição de quartos
- Exclusão de hoteis
- Exclusão de quartos

## Testes

Os testes do projeto estão localizados no diretório `tests/Feature`. Agrupei os testes de hoteis e quartos para facilitar a execução dos mesmos. Para rodar os testes, execute o seguinte comando:

```bash
php artisan test --group=room,hotel
```

## Autor

Desenvolvido por [Diogo C. Coutinho](https://www.linkedin.com/in/diogoccoutinho/). 

Repositório original em [GitHub](https://github.com/diogocoutinho/bukly)


