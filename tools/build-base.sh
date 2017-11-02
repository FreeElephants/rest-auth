#!/usr/bin/env bash

source .env

docker build -t ${DOCKER_IMAGE}-base .