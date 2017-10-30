# Extending from base image for development.
# Include dev tools:
# - composer (with git and zip extension)
# - phpdbg
ARG FROM_IMAGE_NAME

FROM ${FROM_IMAGE_NAME}

# get composer and required tools
RUN curl -OL https://getcomposer.org/download/1.5.2/composer.phar \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer \
    && apt-get update \
    && apt-get install -y git \
    && apt-get install -y zlib1g-dev \
    && docker-php-ext-install zip

# enable phpdebug
RUN apt-get install -y libxml2-dev \
    && docker-php-source extract \
    && cd /usr/src/php \
    && ./configure --enable-phpdbg \
    && docker-php-source delete