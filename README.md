# Finch Flow Challenge – PHP Clean Architecture

Este repositório implementa uma API RESTful para gerenciamento de usuários, projetos e tarefas, utilizando **PHP puro** com foco em **Clean Architecture**, **princípios SOLID**, **PSRs**, **TDD**, e **boas práticas de engenharia de software**.

---

## 🧱 Tecnologias e Ferramentas

- PHP 8.2 (FPM)
- MySQL 8.0
- Nginx
- Docker e Docker Compose
- Composer (autoload PSR-4)
- Xdebug (ativado para debug local)
- PHPUnit (testes unitários e de integração)
- JWT para autenticação
- `.env` para configuração de ambiente

---

## 📐 Arquitetura

A aplicação segue os princípios da **Clean Architecture**, organizada em camadas:

### 🏗️ Estrutura de Camadas

1. **Domain Layer (Camada de Domínio)**

   - Entidades
   - Interfaces dos Repositórios
   - Regras de Negócio
   - Exceções do Domínio

2. **Application Layer (Camada de Aplicação)**

   - Casos de Uso
   - DTOs
   - Serviços de Aplicação
   - Orquestração de Fluxos

3. **Infrastructure Layer (Camada de Infraestrutura)**

   - Implementações dos Repositórios
   - Configurações do Banco de Dados
   - Serviços Externos
   - Adaptadores

4. **Interface Layer (Camada de Interface)**
   - Controllers
   - Middlewares
   - Rotas
   - Presenters/ViewModels

### 🔄 Fluxo de Dados

O fluxo de dados na aplicação segue o padrão de Clean Architecture, onde:

1. As requisições HTTP chegam pela Interface Layer
2. Os Controllers processam as requisições e chamam os Casos de Uso apropriados
3. Os Casos de Uso orquestram a lógica de negócio usando as Entidades
4. As Entidades encapsulam as regras de negócio e validações
5. Os Repositórios na Infrastructure Layer gerenciam a persistência dos dados
6. As respostas são formatadas e retornadas ao cliente

### 📁 Estrutura de Diretórios

```
src/
├── Domain/           # Camada de Domínio
│   ├── Entities/     # Entidades do domínio
│   ├── Repositories/ # Interfaces dos repositórios
│   └── Exceptions/   # Exceções do domínio
│
├── Application/      # Camada de Aplicação
│   ├── UseCases/     # Casos de uso
│   ├── DTOs/         # Data Transfer Objects
│   └── Services/     # Serviços de aplicação
│
├── Infrastructure/   # Camada de Infraestrutura
│   ├── Database/     # Configurações do banco de dados
│   ├── Repositories/ # Implementações dos repositórios
│   └── Services/     # Serviços externos
│
└── Interface/        # Camada de Interface
    ├── Controllers/  # Controladores
    ├── Middlewares/  # Middlewares
    └── Routes/       # Definição de rotas
```

---

## 🚀 Configuração e Instalação

### Pré-requisitos

- Docker
- Docker Compose
- Git

### Passos para Instalação

1. Clone o repositório:

   ```bash
   git clone [URL_DO_REPOSITÓRIO]
   cd finch
   ```

2. Configure o ambiente:

   ```bash
   cp .env.example .env
   ```

3. Inicie os containers:

   ```bash
   docker compose up -d
   ```

4. Instale as dependências:

   ```bash
   docker compose exec app composer install
   ```

5. Execute as migrações:
   ```bash
   docker compose exec app php artisan migrate
   ```

---

## 🧪 Testes

A aplicação utiliza PHPUnit para testes. Para executar os testes:

```bash
docker compose exec app vendor/bin/phpunit
```

### Tipos de Testes

- **Testes Unitários**: Testam componentes isolados
- **Testes de Integração**: Testam a integração entre componentes
- **Testes de API**: Testam os endpoints da API

---

## 📝 Documentação da API

### Autenticação

A API utiliza JWT para autenticação. Para acessar endpoints protegidos:

1. Faça login para obter o token JWT
2. Inclua o token no header das requisições:
   ```
   Authorization: Bearer {seu_token}
   ```

### Endpoints Principais

#### Usuários

- `POST /api/users` - Criar usuário
- `GET /api/users` - Listar usuários
- `GET /api/users/{id}` - Obter usuário específico
- `PUT /api/users/{id}` - Atualizar usuário
- `DELETE /api/users/{id}` - Remover usuário

#### Projetos

- `POST /api/projects` - Criar projeto
- `GET /api/projects` - Listar projetos
- `GET /api/projects/{id}` - Obter projeto específico
- `PUT /api/projects/{id}` - Atualizar projeto
- `DELETE /api/projects/{id}` - Remover projeto

#### Tarefas

- `POST /api/tasks` - Criar tarefa
- `GET /api/tasks` - Listar tarefas
- `GET /api/tasks/{id}` - Obter tarefa específica
- `PUT /api/tasks/{id}` - Atualizar tarefa
- `DELETE /api/tasks/{id}` - Remover tarefa

---

## 🔧 Desenvolvimento

### Debug

O Xdebug está configurado para desenvolvimento local. Para usar:

1. Configure seu IDE para escutar na porta 9003
2. Ative o modo de debug no seu IDE
3. As breakpoints serão acionadas durante a execução

### Convenções de Código

- Seguir PSR-12 para estilo de código
- Documentar classes e métodos com PHPDoc
- Escrever testes para novas funcionalidades
- Manter a cobertura de testes acima de 80%

---

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
