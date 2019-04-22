# Utilisation de PHP 7.3 avec FPM
# voir hub.docker.com/_/php
FROM php:7.3-fpm

# Ajout des fichiers du dépôt dans /var/www/html
COPY . /var/www/html

# Autoriser l'exécution sur deploy.sh
RUN chmod +x deploy.sh

# Exécution de deploy.sh
CMD ["./deploy.sh"]
