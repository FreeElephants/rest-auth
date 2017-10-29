#!/usr/bin/env bash

IMAGE_TAG=$(./tools/get-image.sh)-dev

docker run -d \
    --volume $(pwd):/srv/rest-auth \
    -p 8080:8080 \
    ${IMAGE_TAG} \
    php bin/server.php