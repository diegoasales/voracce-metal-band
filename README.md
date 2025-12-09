# Voracce Metal Band 🎸

Site oficial da banda Voracce Metal Band desenvolvido com Laravel.

## 🚀 Deploy no Render.com

Este projeto está configurado para deploy automático no [Render.com](https://render.com).

### Passos para Deploy

1. Acesse [render.com](https://render.com) e crie uma conta (pode usar GitHub)
2. Clique em "New +" → "Web Service"
3. Conecte seu repositório GitHub: `diegoasales/voracce-metal-band`
4. O Render detectará automaticamente o arquivo `render.yaml` e configurará tudo
5. Adicione as variáveis de ambiente necessárias:
   - `APP_ENV=production`
   - `APP_DEBUG=false`
   - `APP_KEY=` (gere com: `php artisan key:generate --show`)
   - `APP_URL=https://voracce-metal-band.onrender.com`
   - `DB_CONNECTION=sqlite`
   - `DB_DATABASE=database/database.sqlite`
   - `LOG_LEVEL=error`
6. Clique em "Create Web Service"
7. Aguarde o deploy (pode levar alguns minutos)
8. Seu site estará disponível em: `https://voracce-metal-band.onrender.com`

**Nota:** O arquivo `render.yaml` já está configurado no projeto e criará automaticamente o banco SQLite e rodará as migrations!

### 📝 Variáveis de Ambiente Necessárias

Configure estas variáveis no painel do Render:

```env
APP_ENV=production
APP_DEBUG=false
APP_KEY=<sua-chave-gerada>
APP_URL=https://voracce-metal-band.onrender.com
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
LOG_LEVEL=error
```

### 🔑 Gerar APP_KEY

Antes de fazer o deploy, gere uma chave de aplicação:

```bash
php artisan key:generate --show
```

Copie a chave gerada e adicione como variável de ambiente `APP_KEY` no Render.

### 🔄 Deploy Automático

O Render suporta **deploy automático**:
- Quando você fizer `git push` para o GitHub
- O Render detectará as mudanças
- Fará o deploy automaticamente
- Seu site será atualizado!

Para mais detalhes sobre o deploy, consulte o arquivo [DEPLOY_RENDER.md](DEPLOY_RENDER.md).

---

## 🛠️ Desenvolvimento Local

### Requisitos

- PHP 8.2 ou superior
- Composer
- Node.js e NPM

### Instalação

```bash
# Clone o repositório
git clone https://github.com/diegoasales/voracce-metal-band.git
cd voracce-metal-band

# Instale as dependências
composer install
npm install

# Configure o ambiente
cp .env.example .env
php artisan key:generate

# Execute as migrações
php artisan migrate

# Inicie o servidor de desenvolvimento
php artisan serve
```

O site estará disponível em `http://localhost:8000`

### 🐳 Desenvolvimento com Docker

Para desenvolvimento local com Docker, consulte o arquivo [DOCKER.md](DOCKER.md).

---

## 📁 Estrutura do Projeto

- `/app` - Código da aplicação
- `/resources/views` - Views Blade
- `/routes/web.php` - Rotas da aplicação
- `/public` - Arquivos públicos
- `/scripts` - Scripts de deploy e configuração

---

## 📄 Licença

Este projeto está sob a licença MIT.
