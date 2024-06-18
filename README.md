# Controle de revisões de carros.

O projeto Controle de revisões de carros é um gerênciamento de proprietários, veículos dos próprietários e revisões desses veículos.

Por meio desta plataforma, é viável realizar diversas operações relacionadas a proprietários, veículos e revisões. É possível cadastrar novos proprietários, editar os dados dos proprietários existentes, listar todos os proprietários cadastrados e excluí-los do banco de dados. Da mesma forma, permite cadastrar novos veículos para um proprietário, editar os dados dos veículos existentes, listar todos os veículos cadastrados de um proprietário e excluí-los do banco de dados. Além disso, a plataforma possibilita o cadastro de novas revisões em um veículo de um proprietário, a edição dos dados das revisões existentes, a listagem de todas as revisões de um veículo cadastradas para um proprietário e a exclusão destas informações do banco de dados.

## Instruções de Execução

Siga estas instruções para obter uma cópia do projeto em funcionamento na sua máquina local para fins de desenvolvimento e teste.

### Pré-requisitos

Certifique-se de que sua máquina atenda aos seguintes requisitos:

- PHP >= 8.2
- Composer - [Instalação do Composer](https://getcomposer.org/download/)
- Node.js e NPM - [Instalação do Node.js](https://nodejs.org/)


## Tecnologias Utilizadas:
  
- Laravel 11
- Vue.js 3
- Tailwind CSS 3
- Inertia.js 1
- PostgreSQL 16

### Instalação

Siga os passos abaixo para configurar o projeto:

1. Clone o repositório:

```bash
git clone https://github.com/MarlomMedeiros/car-revision.git
cd dompixel-shop
```

2. Instale as dependências do PHP executando:

```bash
composer install
```

3. Instale as dependências do front-end executando:

```bash
npm install
```

4. Faça uma cópia do arquivo `.env.example` para `.env`:

```bash
cp .env.example .env
```

5. Gere uma chave de aplicativo:

```bash
php artisan key:generate
```

6. Configure o banco de dados no arquivo `.env`. Exemplo:

```dotenv
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

7. Execute as migrações para criar as tabelas no banco de dados:

```bash
php artisan migrate
```

8. Inicie o servidor de desenvolvimento:

```bash
php artisan serve
```

9. Acesse o projeto em seu navegador através da URL:

```
http://localhost:8000
```
