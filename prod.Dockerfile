ARG FROM_IMAGE_NAME

FROM ${FROM_IMAGE_NAME}

COPY ./bin/ /srv/rest-auth/bin/
COPY ./src/ /srv/rest-auth/src/
COPY ./config/ /srv/rest-auth/config/
COPY ./vendor/ /srv/rest-auth/vendor/
