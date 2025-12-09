# 🐳 Docker Setup Guide

## Quick Start

1. **Create a `.env` file** (if you don't have one):
   ```bash
   cp .env.example .env
   ```

2. **Generate APP_KEY** (if not set):
   ```bash
   php artisan key:generate
   ```
   
   Or manually add to `.env`:
   ```env
   APP_KEY=base64:your-generated-key-here
   ```

3. **Set your environment variables** in `.env`:
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_KEY=base64:your-key-here
   APP_URL=http://localhost:8000
   LOG_LEVEL=error
   DB_CONNECTION=sqlite
   DB_DATABASE=/var/www/html/database/database.sqlite
   ```

4. **Run Docker Compose**:
   ```bash
   docker compose up --build
   ```

Your app will be available at `http://localhost:8000`

## Environment Variables

All environment variables are now loaded from `.env` file. The `docker-compose.yml` uses:
- `env_file: - .env` - Loads all variables from `.env`
- `${VARIABLE:-default}` - Uses environment variable or default value

**Important:** Never commit your `.env` file to git (it's already in `.gitignore`).

