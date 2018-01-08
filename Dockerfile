# Base image: should be extended to dev and prod versions

FROM php:7.1.10-cli-jessie

WORKDIR /srv/rest-auth

EXPOSE 8080

CMD ["php bin/server.php"]
