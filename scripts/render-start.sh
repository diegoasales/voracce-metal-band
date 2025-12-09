#!/usr/bin/env bash
set -euo pipefail

# Garante que o banco SQLite exista em produção e aplica migrações antes de iniciar
# Usa o diretório atual como raiz do app (Render e Docker Compose sobem em /opt/render/project/src ou /var/www/html)
APP_ROOT="${APP_ROOT:-$(pwd)}"
echo "[render-start] PWD=$(pwd)"
echo "[render-start] APP_ROOT='$APP_ROOT'"
echo "[render-start] Incoming DB_DATABASE='${DB_DATABASE:-}'"

# Se DB_DATABASE vier sem barra inicial, prefixa com APP_ROOT
if [ -n "${DB_DATABASE:-}" ]; then
  case "$DB_DATABASE" in
    /*) DB_PATH="$DB_DATABASE" ;;             # já é absoluto
    *)  DB_PATH="${APP_ROOT}/${DB_DATABASE}" ;; # relativo vira dentro do app
  esac
else
  DB_PATH="${APP_ROOT}/database/database.sqlite" # padrão: dentro do projeto
fi

echo "[render-start] Resolved DB_PATH='$DB_PATH'"

echo "[render-start] mkdir -p $(dirname "$DB_PATH")"
mkdir -p "$(dirname "$DB_PATH")"

if [ ! -f "$DB_PATH" ]; then
  echo "[render-start] touch $DB_PATH"
  touch "$DB_PATH"
fi

echo "[render-start] ls -ld $(dirname "$DB_PATH")"
ls -ld "$(dirname "$DB_PATH")" || true
echo "[render-start] ls -l $DB_PATH"
ls -l "$DB_PATH" || true

# Ajusta permissões para que o PHP/FPM consiga escrever
echo "[render-start] chmod 664 $DB_PATH"
chmod 664 "$DB_PATH" || true
echo "[render-start] chmod 775 $(dirname "$DB_PATH")"
chmod 775 "$(dirname "$DB_PATH")" || true

# Aplica migrações sem interação (safe para produção)
echo "[render-start] php artisan migrate --force --no-interaction"
php artisan migrate --force --no-interaction

# Sobe o servidor HTTP embutido do Laravel
php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"

