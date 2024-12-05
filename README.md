<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Como Rodar o Projeto

Siga os passos abaixo para configurar e rodar o projeto:

### 1. Clonar o Repositório
Faça o clone do repositório:

```bash
git clone <URL_DO_REPOSITORIO>
```
### 2. Instalar as Dependências do PHP
Execute o comando para instalar as dependências do Laravel:

```bash
composer install
# ou
composer update
```
### 3. Instalar as Dependências do Node.js
Baixe as dependências do frontend:

```bash
npm install
```

### 4. Configurar o Banco de Dados
Configure o arquivo .env com as informações do seu banco de dados.
Execute as migrations para criar as tabelas:

```bash
php artisan migrate
```
### 5. Rodar o Servidor do Laravel
Inicie o servidor do Laravel com o comando:

```bash
php artisan serve
```
### 6. Rodar o Servidor de Desenvolvimento do Frontend
Compile os assets do frontend e inicie o servidor:

```bash
npm run dev
```

### 7. Popular o Banco de Dados com Dados de Teste
Execute o seguinte comando para inserir dados iniciais, incluindo um usuário administrador padrão:

```bash
php artisan db:seed
```

Dados do Usuário Administrador Padrão:
```bash
- Email: admin@example.com
- Senha: 123456789
```
---

Agora o projeto está configurado e pronto para ser usado!