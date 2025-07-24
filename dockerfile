# 1. Imagem base
FROM php:8.1-apache

# 2. Dependências
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip unzip git && \
    docker-php-ext-install pdo pdo_pgsql zip

# 3. Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Copiar código
COPY . /var/www/html/

# 5. Definir diretório
WORKDIR /var/www/html

# 6. Instalar dependências PHP
RUN composer install --no-dev --optimize-autoloader

# 7. Limpar cache antigo
RUN php artisan config:clear && php artisan route:clear && php artisan view:clear

# 8. Copiar .env e gerar chave
COPY .env .env
RUN php artisan key:generate

# 9. Cachear config novamente
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# 10. Permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 11. Apache
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

RUN php artisan migrate --force

EXPOSE 80
CMD ["apache2-foreground"]

RUN cat storage/logs/laravel.log || true
