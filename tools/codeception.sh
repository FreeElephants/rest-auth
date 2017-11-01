#!/usr/bin/env bash

source .env
DEV_IMAGE=${DOCKER_IMAGE}-dev
CONTAINER_NAME=rest-auth-dev
echo "Run ${CONTAINER_NAME}"
docker run --rm -d \
    --volume $(pwd):/srv/rest-auth \
    --name ${CONTAINER_NAME} \
    --network host \
    ${DEV_IMAGE} \
    php bin/server.php >> /dev/null

docker logs ${CONTAINER_NAME}

docker exec --interactive --tty \
    ${CONTAINER_NAME} vendor/bin/codecept $@

RESULT=$?
docker logs ${CONTAINER_NAME}
echo "stopping ${CONTAINER_NAME}..."
docker stop ${CONTAINER_NAME} >> /dev/null

exit $RESULT