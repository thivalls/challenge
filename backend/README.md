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
