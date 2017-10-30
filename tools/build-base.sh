#!/usr/bin/env bash

source .env

docker build -f Dockerfile -t ${DOCKER_IMAGE}-base .