FROM php:8.4-fpm-alpine

# Instalar dependências do sistema
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libzip-dev \
    bash \
    sqlite-dev \
    zip \
    unzip \
    nginx \
    supervisor

# Instalar extensões PHP necessárias (inclui SQLite)
RUN docker-php-ext-install pdo pdo_mysql pdo_sqlite zip gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar diretório de trabalho
WORKDIR /var/www/html

# Copiar arquivos do projeto
COPY . .

# Instalar dependências
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Configurar permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Configurar Nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf

# Configurar Supervisor
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Entrypoint: cria SQLite, roda migrações e inicia supervisor (nginx + php-fpm)
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Expor porta
EXPOSE 80

ENTRYPOINT ["/entrypoint.sh"]

