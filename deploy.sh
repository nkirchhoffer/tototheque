#!/bin/bash

# Copie des fichiers dans /code
# Un volume vide est monté par Kubernetes sur /code 
# Le but de ce fichier est de copier les fichiers après le montage du volume
# Pour ne pas avoir un dossier vide après avoir mis en place le code
# Exécution de FPM ensuite
cp -R /var/www/html/* /code &&
    php-fpm
