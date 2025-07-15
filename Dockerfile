# Usa l'immagine ufficiale PHP con Apache
FROM php:8.2-apache

# Abilita mod_rewrite per Apache
RUN a2enmod rewrite

# Copia i file del progetto nella directory di Apache
COPY . /var/www/html/

# Imposta i permessi corretti
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

# Crea la directory data se non esiste e imposta i permessi
RUN mkdir -p /var/www/html/data \
    && chown -R www-data:www-data /var/www/html/data \
    && chmod -R 777 /var/www/html/data

# Espone la porta 80
EXPOSE 80

# Avvia Apache in foreground
CMD ["apache2-foreground"]
