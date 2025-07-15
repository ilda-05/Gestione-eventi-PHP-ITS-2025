# Usa l'immagine ufficiale PHP 8.2 con Apache
FROM php:8.2-apache

# Abilita mod_rewrite per Apache
RUN a2enmod rewrite

# Configura ServerName per eliminare il warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copia tutti i file del progetto dalla cartella progetto
COPY ./progetto/ /var/www/html/

# Imposta i permessi corretti
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

# Crea la directory data e imposta i permessi di scrittura
RUN mkdir -p /var/www/html/data \
    && chown -R www-data:www-data /var/www/html/data \
    && chmod -R 777 /var/www/html/data

# Espone la porta 80
EXPOSE 80

# Avvia Apache in foreground
CMD ["apache2-foreground"]
