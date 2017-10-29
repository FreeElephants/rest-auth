#!/usr/bin/env bash

FROM_IMAGE_NAME=$(./tools/get-image.sh)-base
IMAGE_TAG=$(./tools/get-image.sh)-dev

docker build \
    --build-arg FROM_IMAGE_NAME=${FROM_IMAGE_NAME} \
    -f Dockerfile-dev \
    -t ${IMAGE_TAG} .