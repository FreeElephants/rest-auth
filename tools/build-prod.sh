#!/usr/bin/env bash

FROM_IMAGE_NAME=${DOCKER_IMAGE}-base
docker build \
    --build-arg ${FROM_IMAGE_NAME} \
    -f prod.Dockerfile \
    -t ${DOCKER_IMAGE} .