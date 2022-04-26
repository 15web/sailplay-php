#!/usr/bin/env bash

set -Eeuo pipefail

./bin/docker_build.bash

docker run --rm --volume "$(pwd):/home/dev/app/" sailplay-sdk-php-cli "$@";
