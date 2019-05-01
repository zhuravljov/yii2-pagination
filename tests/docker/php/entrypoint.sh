#!/bin/sh

set -eu

# Installs Composer packages
flock tests/runtime/composer-install.lock composer install --prefer-dist --no-interaction

# Executes container command
set -x
exec "$@"
