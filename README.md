
# CRUD usando Laravel
Um mini-blog voltado para o cinema, com o intuito de aprender mais sobre o Laravel

## Como instalar
1 Passo: Clone esse repositório
```
git clone https://github.com/marcelonralves/laravel-movies.git
```
2 Passo: Instalar as dependências
```
composer install
```
3 Passo: Configure a conexão com o banco de dados pelo .env e após isso execute o comando abaixo para rodar as migrations
```
php artisan migrate
```
4 Passo: Caso queira rodar com o servidor imbutido do PHP, basta executar o comando abaixo
```
php -S localhost:8080 -t public
```
## Funcionalidades

- Painel admin com função de visualizar, criar, editar, apagar postagens
- Usuário visualizar as postagens através do site
- Listagem com os 4 filmes mais assistidos do dia, usando a [API do The Movie Database](https://www.themoviedb.org/)

## O que falta implementar

- Filtrar postagens por categoria e autor
- Consumir mais da API, com mais informações de séries e filmes assistidos da semana/mês
- Melhorar UI e UX
- Adicionar tinyMCE no textarea
- Controle de permissão de acesso para novos autores
- Sistema de comentários
- Sistema de busca de postagens
- Usar outra API para traduzir textos relacionados a API da The Movie Database

## Screenshots

Visualizando posts/acessando painel e criando post (nome aleatório do usuário que foi gerado pelo factory)
![App Screenshot](https://i.imgur.com/Rl2LAv9.gif)
Visualizando as postagens
![App Screenshot](https://i.imgur.com/HxWvzdD.gif)
Apagando e editando posts pelo painel
![App Screenshot](https://i.imgur.com/hZowvUB.gif)

