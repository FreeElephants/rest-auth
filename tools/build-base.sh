#!/usr/bin/env bash

source .env
if test; then
    echo 1
   else
    ecpo 2
fi
docker build -t ${DOCKER_IMAGE}-base .