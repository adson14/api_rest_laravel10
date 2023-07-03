# API REST LARAVEL 10

## Tecnologias utilizadas:
- Laravel
- JWT
- SWAGGER
- MySql
- Queue
- Meilisearch
- Docker
- Nginx

## Funcionalidades
- Crud de despesas
- Envio de e-mail quando uma despesa é cadastrada
- Autenticação
- Controle de acesso
- Validações de request

## Instruções

- Clone o projeto: ``git clone https://github.com/adson14/api_rest_laravel10.git``
- Abra a pasta do projeto e executar o comando: ``docker-compose up -d``
- entrar no container(app) e executar composer install para instalar as dependências
- ainda dentro do container executar php artisan key:generate
- Fazer uma cópia do .env.example para .env (Isso criará as variáveis necessárias para o ambiente)
- Executar as migration: ```php artisan migrate```
- Subir as seeders ``php artisan db:seed``
- Para Testar já existe um usuário padrão criado ``email: test@test.com senha: password``
- A api está documentada com swagger: ``http://localhost:8000/documentation``
- Para teste de e-mail acessar: ``http://localhost:8025/`` (Assim que uma despesa é criada deverá receber na caixa de entrada) 
