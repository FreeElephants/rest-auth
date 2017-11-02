#!/usr/bin/env bash

source .env

FROM_IMAGE_NAME=${DOCKER_IMAGE}-base
IMAGE_TAG=${DOCKER_IMAGE}-dev

docker build \
    --build-arg FROM_IMAGE_NAME=${FROM_IMAGE_NAME} \
    -f dev.Dockerfile \
    -t ${IMAGE_TAG} .