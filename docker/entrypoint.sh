#!/usr/bin/env bash
set -euo pipefail

# Entrypoint para ambiente Docker (Render com runtime Docker).
# Cria o SQLite (se preciso), aplica migrações e sobe supervisor (nginx + php-fpm).

APP_ROOT="/var/www/html"
cd "$APP_ROOT"

DB_INPUT="${DB_DATABASE:-database/database.sqlite}"
case "$DB_INPUT" in
  /*) DB_PATH="$DB_INPUT" ;;
  *)  DB_PATH="${APP_ROOT}/${DB_INPUT}" ;;
esac

echo "[entrypoint] APP_ROOT=$APP_ROOT"
echo "[entrypoint] DB_INPUT=$DB_INPUT"
echo "[entrypoint] DB_PATH=$DB_PATH"

mkdir -p "$(dirname "$DB_PATH")"
if [ ! -f "$DB_PATH" ]; then
  echo "[entrypoint] touch $DB_PATH"
  touch "$DB_PATH"
fi

chmod 664 "$DB_PATH" || true
chmod 775 "$(dirname "$DB_PATH")" || true

echo "[entrypoint] ls -ld $(dirname "$DB_PATH")"
ls -ld "$(dirname "$DB_PATH")" || true
echo "[entrypoint] ls -l $DB_PATH"
ls -l "$DB_PATH" || true

echo "[entrypoint] php artisan migrate --force --no-interaction"
php artisan migrate --force --no-interaction

echo "[entrypoint] starting supervisor"
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf



