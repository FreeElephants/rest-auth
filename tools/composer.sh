#!/usr/bin/env bash

source .env

DEV_IMAGE=${DOCKER_IMAGE}-dev

mkdir -p $HOME/.composer/cache/

docker run --rm --interactive --tty \
    --user $UID:$UID \
    --volume /etc/passwd:/etc/passwd:ro \
    --volume /etc/group:/etc/group:ro \
    --volume $PWD:/srv/rest-auth \
    --volume $HOME/.composer:/tmp/.composer \
    --env COMPOSER_HOME=/tmp/.composer \
    ${DEV_IMAGE} composer $@
