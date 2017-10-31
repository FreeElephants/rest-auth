#!/usr/bin/env bash

source .env
IMAGE_TAG=${DOCKER_IMAGE}-dev

docker run --rm --tty --interactive \
    --volume $(pwd):/srv/rest-auth \
    -p 8080:8080 \
    ${IMAGE_TAG} \
    bash
#    php bin/server.php