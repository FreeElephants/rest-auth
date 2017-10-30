#!/usr/bin/env bash

FROM_IMAGE_NAME=${DOCKER_IMAGE}-base
docker build -f Dockerfile-dev -t ${FROM_IMAGE_NAME} .