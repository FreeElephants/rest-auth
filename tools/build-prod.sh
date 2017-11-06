#!/usr/bin/env bash

source .env

FROM_IMAGE_NAME=${DOCKER_IMAGE}-base

docker build \
    --build-arg ${FROM_IMAGE_NAME} \
    -f prod.Dockerfile \
    -t ${DOCKER_IMAGE} .