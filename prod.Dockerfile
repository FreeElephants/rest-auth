ARG FROM_IMAGE_NAME

FROM ${FROM_IMAGE_NAME}

COPY ./bin/ /srv/rest-auth/bin/
COPY ./config/ /srv/rest-auth/config/
COPY ./src/ /srv/rest-auth/src/
COPY ./vendor/ /srv/rest-auth/vendor/
