# Usa l'immagine ufficiale PHP 8.2 con Apache
FROM php:8.2-apache

# Abilita mod_rewrite per Apache
RUN a2enmod rewrite

# Configura ServerName per eliminare il warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Configura Apache per permettere l'accesso completo
RUN echo '<Directory /var/www/html>' >> /etc/apache2/apache2.conf \
    && echo '    Options Indexes FollowSymLinks' >> /etc/apache2/apache2.conf \
    && echo '    AllowOverride All' >> /etc/apache2/apache2.conf \
    && echo '    Require all granted' >> /etc/apache2/apache2.conf \
    && echo '</Directory>' >> /etc/apache2/apache2.conf

# Crea uno script di entrypoint che sistema tutto automaticamente
RUN echo '#!/bin/bash' > /docker-entrypoint.sh \
    && echo 'echo "🔧 Fixing permissions..."' >> /docker-entrypoint.sh \
    && echo 'chown -R www-data:www-data /var/www/html' >> /docker-entrypoint.sh \
    && echo 'find /var/www/html -type d -exec chmod 755 {} \;' >> /docker-entrypoint.sh \
    && echo 'find /var/www/html -type f -exec chmod 644 {} \;' >> /docker-entrypoint.sh \
    && echo 'mkdir -p /var/www/html/data' >> /docker-entrypoint.sh \
    && echo 'chmod 777 /var/www/html/data' >> /docker-entrypoint.sh \
    && echo 'chown -R www-data:www-data /var/www/html/data' >> /docker-entrypoint.sh \
    && echo 'echo "✅ Permissions fixed! Starting Apache..."' >> /docker-entrypoint.sh \
    && echo 'exec apache2-foreground' >> /docker-entrypoint.sh \
    && chmod +x /docker-entrypoint.sh

# Espone la porta 80
EXPOSE 80

# Usa l'entrypoint che sistema tutto
ENTRYPOINT ["/docker-entrypoint.sh"]
