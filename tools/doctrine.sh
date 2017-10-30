#!/usr/bin/env bash

source .env
DEV_IMAGE=${DOCKER_IMAGE}-dev

docker run --rm --interactive --tty \
    --user $UID:$UID \
    --volume $PWD:/srv/rest-auth \
    ${DEV_IMAGE} vendor/bin/doctrine $@
