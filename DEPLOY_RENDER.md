# 🚀 Guia de Deploy no Render.com

## ⚠️ IMPORTANTE: Configuração Manual Necessária

Se o Render estiver tentando usar Docker e dando erro, siga estes passos:

### Passo 1: Criar Novo Web Service

1. Acesse [render.com](https://render.com)
2. Clique em **"New +"** → **"Web Service"**
3. Conecte seu repositório: `diegoasales/voracce-metal-band`
4. Clique em **"Connect"**

### Passo 2: Configurações OBRIGATÓRIAS

**Nome:**
```
voracce-metal-band
```

**Environment:**
```
PHP
```
⚠️ **NÃO escolha Docker!** Escolha **PHP** explicitamente.

**Region:**
```
São Paulo (ou mais próximo de você)
```

**Branch:**
```
main
```

**Root Directory:**
```
(Deixe vazio)
```

**Build Command:**
```bash
composer install --no-dev --optimize-autoloader && php artisan config:cache && php artisan route:cache && php artisan view:cache
```

**Start Command:**
```bash
php artisan serve --host=0.0.0.0 --port=$PORT
```

### Passo 3: Variáveis de Ambiente

Na seção **"Environment Variables"**, adicione:

| Key | Value |
|-----|-------|
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_KEY` | `base64:your-key-here` |
| `APP_URL` | `https://voracce-metal-band.onrender.com` (ou a URL que o Render gerar) |
| `LOG_LEVEL` | `error` |

### Passo 4: Deploy

1. Clique em **"Create Web Service"**
2. Aguarde o build (pode levar 5-10 minutos na primeira vez)
3. Seu site estará disponível em: `https://voracce-metal-band.onrender.com`

### 🔧 Se Ainda Der Erro de Docker

Se mesmo assim o Render tentar usar Docker:

1. Vá em **Settings** do seu serviço
2. Procure por **"Dockerfile Path"** ou **"Use Dockerfile"**
3. **Deixe em branco** ou **desmarque** essa opção
4. Na seção **"Build & Deploy"**, certifique-se de que:
   - **"Dockerfile Path"** está **VAZIO**
   - **"Docker Command"** está **DESABILITADO**
5. Salve e faça **"Manual Deploy"** → **"Clear build cache & deploy"**

### ⚠️ IMPORTANTE: Desabilitar Docker no Render

**No painel do Render, você DEVE:**

1. Ir em **Settings** → **Build & Deploy**
2. Procurar a opção **"Dockerfile Path"**
3. **DELETAR qualquer valor** nesse campo (deixar completamente vazio)
4. Salvar as alterações
5. Fazer um novo deploy

O Render só deve usar o `render.yaml` que está configurado para PHP nativo!

### ✅ Verificação

Após o deploy, você deve ver:
- ✅ Build concluído com sucesso
- ✅ Serviço rodando (status: Live)
- ✅ URL pública funcionando

---

**Nota:** O arquivo `render.yaml` está no repositório, mas se o Render não estiver detectando automaticamente, use as configurações manuais acima.

