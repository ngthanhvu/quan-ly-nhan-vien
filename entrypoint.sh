#!/usr/bin/env bash

set -euo pipefail

run_composer_install() {
    composer install \
        --no-interaction \
        --prefer-dist \
        --optimize-autoloader
}

run_npm_install() {
    if command -v npm >/dev/null 2>&1; then
        npm install --no-progress
    fi
}

case "${COMPOSER_INSTALL:-auto}" in
    always) run_composer_install ;;
    auto) [ -d vendor ] || run_composer_install ;;
esac

case "${NPM_INSTALL:-auto}" in
    always) run_npm_install ;;
    auto) [ -d node_modules ] || run_npm_install ;;
esac

# Fix permissions for storage and bootstrap/cache directories
# This ensures www-data can write to these directories
if [ -d storage ]; then
    chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true
    chmod -R 775 storage bootstrap/cache 2>/dev/null || true
fi

exec "$@"