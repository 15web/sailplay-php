#!/usr/bin/env bash

set -Eeuo pipefail

docker build \
        --tag sailplay-sdk-php-cli \
        --build-arg USER_ID=$(id -u) \
    ./docker
