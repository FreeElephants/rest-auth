#!/usr/bin/env bash

DEV_IMAGE=$(./tools/get-image.sh)-dev

docker run --rm --interactive --tty \
    --user $UID:$UID \
    --volume $PWD:/srv/rest-auth \
    ${DEV_IMAGE} vendor/bin/codecept $@
