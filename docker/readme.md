Exemple de commandes pour push sur docker hub:

```
docker build -t citizen63000/ubuntu-php-mariadb:2.0 .
docker login
docker push citizen63000/ubuntu-php-mariadb:2.0
# Optionnel
docker tag citizen63000/ubuntu-php-mariadb:2.0 citizen63000/ubuntu-php-mariadb:latest
docker push citizen63000/ubuntu-php-mariadb:latest
```