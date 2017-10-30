#!/usr/bin/env bash

source .env
IMAGE_TAG=${DOCKER_IMAGE}-dev

docker run --rm --tty --sig-proxy=false \
    --volume $(pwd):/srv/rest-auth \
    -p 8080:8080 \
    ${IMAGE_TAG} \
    php bin/server.php