# Desafio Kanastra

## Backend

Se for a primeira vez que clona o projeto precisa rodar os comandos abaixo:

```
composer install

php artisan key:generate

cp .env.example .env
```

Deixei o .env.example igual ao que está rodando na máquina para evitar algum problem.

Para rodar o projeto backend basta rodar o comando abaixo.

```
    docker compose up

    // OU caso queira liberar o terminal

    docker compose up -d
```

Se quiser acompanhar os emails sendo enviados pelo job da fila basta rodar o comando abaixo.

```
    sail artisan queue:work
```

Este comando vai fazer com que um worker fique executando os jobs que estiverem na fila.

Se quiser acompanhar os email sendo enviados o docker sobre um servidor de email local. Para acessar basta acessar a url abaixo:

**http://localhost:8025/**

## Frontend

### Prerequisites

You need to install bun

- To install bun, run this command:
  ```sh
  curl -fsSL https://bun.sh/install | bash
  ```
  _Supported on macOS, Linux, and WSL_

#### If you're using Node instead Bun, please make sure that you Node version is 18 or higher.

_(Recommended if you're using Windows without WSL)_

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/Kanastra-Tech/kanastra-challenge-boilerplate.git
   ```
2. Install the packages

   ```sh
   bun install
   ```

   or

   ```sh
   npm i
   ```

3. With packages installed, run development command:

   ```sh
   bun run dev
   ```

   or

   ```sh
   npm run dev:node
   ```
