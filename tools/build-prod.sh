#!/usr/bin/env bash

FROM_IMAGE_NAME=$(./tools/get-image.sh)
docker build -f Dockerfile-dev -t ${FROM_IMAGE_NAME} .