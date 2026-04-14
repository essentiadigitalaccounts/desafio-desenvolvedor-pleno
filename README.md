# API REST - Catálogo de Produtos

API para gerenciamento do catálogo de produtos da Essential Nutrition, desenvolvida com Laravel.

## Sobre o Projeto

O Essentia Group precisa de uma API para gerenciar o catálogo de produtos da Essential Nutrition, uma marca do grupo. A API suporta CRUD de produtos e categorias, busca com filtros (categoria, faixa de preço, disponibilidade), paginação e autenticação via JWT.

## Tecnologias

- PHP 8.3
- Laravel 13
- MySQL 8.0
- Nginx
- Docker / Docker Compose
- JWT (autenticação)

## Requisitos

- Docker e Docker Compose

## Instalação com Docker

```bash
cd projeto-php

# Copie o arquivo de ambiente
cp .env.example .env

# Suba os containers
docker compose up -d --build

# Gere a chave da aplicação
docker compose exec app php artisan key:generate

# Rode as migrations
docker compose exec app php artisan migrate

# (Opcional) Rode os seeders
docker compose exec app php artisan db:seed
```

A API estará disponível em `http://desafio-dev-pleno.localhost:8000`.

## Instalação Local (sem Docker)

```bash
cd projeto-php
composer install
cp .env.example .env
php artisan key:generate
# Configure o banco de dados no .env
php artisan migrate
php artisan serve
```

## Containers

| Container | Serviço | Porta |
|-----------|---------|-------|
| catalogo-app | PHP 8.3 FPM | 9000 (interno) |
| catalogo-nginx | Nginx | 8000 |
| catalogo-mysql | MySQL 8.0 | 3306 |

## Comandos Úteis (Docker)

```bash
# Parar containers
docker compose down

# Ver logs
docker compose logs -f app

# Acessar o container da aplicação
docker compose exec app bash

# Rodar testes
docker compose exec app php artisan test

# Rodar migrations fresh
docker compose exec app php artisan migrate:fresh --seed
```

## Estrutura da API

### Autenticação
| Método | Endpoint | Descrição |
|--------|----------|-----------|
| POST | `/api/register` | Registro de usuário |
| POST | `/api/login` | Login (retorna token JWT) |
| POST | `/api/logout` | Logout (invalida token) |

### Categorias
| Método | Endpoint | Descrição |
|--------|----------|-----------|
| GET | `/api/categories` | Listar categorias |
| POST | `/api/categories` | Criar categoria |
| GET | `/api/categories/{id}` | Detalhar categoria |
| PUT | `/api/categories/{id}` | Atualizar categoria |
| DELETE | `/api/categories/{id}` | Remover categoria |

### Produtos
| Método | Endpoint | Descrição |
|--------|----------|-----------|
| GET | `/api/products` | Listar produtos (com filtros, ordenação e paginação) |
| POST | `/api/products` | Criar produto |
| GET | `/api/products/{id}` | Detalhar produto |
| PUT | `/api/products/{id}` | Atualizar produto |
| DELETE | `/api/products/{id}` | Remover produto |

### Filtros de Produtos (query params)
| Parâmetro | Tipo | Descrição |
|-----------|------|-----------|
| `category_id` | integer | Filtrar por categoria |
| `min_price` | decimal | Preço mínimo |
| `max_price` | decimal | Preço máximo |
| `available` | boolean | Filtrar por disponibilidade |
| `search` | string | Busca por nome/descrição |
| `sort_by` | string | Campo para ordenação (name, price, created_at) |
| `sort_order` | string | Direção (asc, desc) |
| `per_page` | integer | Itens por página (padrão: 15) |

## Modelagem do Banco de Dados

### users
| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | bigint | PK |
| name | string | Nome do usuário |
| email | string | Email (único) |
| password | string | Senha (hash) |
| timestamps | | created_at, updated_at |

### categories
| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | bigint | PK |
| name | string | Nome da categoria |
| description | text | Descrição (nullable) |
| timestamps | | created_at, updated_at |

### products
| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | bigint | PK |
| category_id | bigint | FK → categories |
| name | string | Nome do produto |
| description | text | Descrição (nullable) |
| price | decimal(10,2) | Preço |
| available | boolean | Disponibilidade (default: true) |
| timestamps | | created_at, updated_at |

## Validações

- Campos obrigatórios são validados via Form Requests
- Emails devem ser únicos e válidos
- Preço deve ser positivo
- Categoria deve existir ao criar produto
- Respostas de erro seguem formato padronizado JSON

## Testes

```bash
# Com Docker
docker compose exec app php artisan test

# Local
php artisan test
```

## Critérios de Avaliação

| # | Critério | Descrição |
|---|----------|-----------|
| 1 | Sistema funcional (Form + API — CRUD, Busca e Auth) | O sistema deve rodar sem erros. Espera-se uma aplicação completa que cubra tanto a interface web quanto a API REST, incluindo autenticação, gerenciamento de produtos e categorias, e mecanismos de busca e filtragem. Quanto mais completa e funcional a entrega, melhor a avaliação. |T. |
| 2 | Modelagem do Banco de Dados | Migrations corretas, tipos de dados adequados, relacionamentos bem definidos (FK com constraints), uso de índices quando necessário. |
| 3 | Arquitetura e Padrões de Código | Organização em camadas (Controllers, Form Requests, Resources, Models/Services), código limpo seguindo PSR-12, controllers enxutos, separação entre rotas web e API. |
| 4 | Padrão de Mensagens de Commits | Commits atômicos e descritivos seguindo conventional commits (feat, fix, docs, test, refactor). Histórico de commits que conta a evolução do desenvolvimento. |
| 5 | Segurança e Validações | Form Requests com regras de validação, proteção contra mass assignment, autenticação JWT nas rotas protegidas, tratamento de erros padronizado em JSON, dados sensíveis não expostos. |
| 6 | Documentação do Projeto | README atualizado com instruções de uso, endpoints documentados com exemplos de request/response, variáveis de ambiente explicadas. |
| 7 | Testes | Testes automatizados cobrindo endpoints da API, validações, autenticação e filtros. Uso de factories para dados de teste. |

## Licença

Este projeto é parte de um desafio técnico para o Essentia Group.
