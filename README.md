# Studio Amanda - Painel Administrativo (MVP)

Projeto inicial em PHP + MySQL para gerenciamento básico de clientes.

## Requisitos

- PHP 8.1+
- MySQL 8+
- Servidor web (Apache/Nginx) apontando para `public/`

## Configuração

1. Crie o banco e as tabelas:
   ```bash
   mysql -u root -p < sql/schema.sql
   ```
2. Configure variáveis de ambiente (opcional):
   - `DB_HOST` (default: `127.0.0.1`)
   - `DB_PORT` (default: `3306`)
   - `DB_NAME` (default: `studio_amanda`)
   - `DB_USER` (default: `root`)
   - `DB_PASS` (default: vazio)

## Funcionalidades implementadas

- Dashboard inicial (`/`)
- CRUD de clientes:
  - Listagem
  - Criação
  - Edição
  - Exclusão

## Próximos passos

- CRUD de serviços
- CRUD de pagamentos
- Dashboard com métricas financeiras
- Autenticação de usuários
