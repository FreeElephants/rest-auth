# Base image: should be extended to dev and prod versions

FROM php:7.1.10-cli-jessie

WORKDIR /srv/rest-auth

CMD ["php bin/server.php"]
