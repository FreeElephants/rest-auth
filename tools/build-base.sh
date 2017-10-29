#!/usr/bin/env bash

IMAGE_TAG=$(./tools/get-image.sh)-base

docker build -f Dockerfile -t ${IMAGE_TAG} .