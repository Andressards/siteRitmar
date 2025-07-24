# 1. Imagem base PHP 8.1 com Apache
FROM php:8.1-apache

# 2. Instalar dependências necessárias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip unzip git && \
    docker-php-ext-install pdo pdo_pgsql zip

# 3. Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Copiar todo código para o container
COPY . /var/www/html/

# 5. Definir diretório de trabalho
WORKDIR /var/www/html

# 6. Instalar dependências PHP via Composer
RUN composer install --no-dev --optimize-autoloader

# 7. Cachear config, rotas e views
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# 8. Ajustar permissões para storage e bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Definir DocumentRoot para a pasta public do Laravel
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Habilitar mod_rewrite do Apache
RUN a2enmod rewrite

# 9. Expor a porta 80 para Apache
EXPOSE 80

# 10. Rodar Apache no foreground
CMD ["apache2-foreground"]
