#!/usr/bin/env bash

DEV_IMAGE=$(./tools/get-image.sh)-dev

mkdir -p $HOME/.composer/cache/

docker run --rm --interactive --tty \
    --user $UID:$UID \
    --volume /etc/passwd:/etc/passwd:ro \
    --volume /etc/group:/etc/group:ro \
    --volume $PWD:/srv/rest-auth \
    --volume $HOME/.composer:/tmp/.composer \
    --env COMPOSER_HOME=/tmp/.composer \
    ${DEV_IMAGE} composer $@
