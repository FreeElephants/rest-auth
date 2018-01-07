<?php
/**
 * Application configurable parameters
 *
 * Default values adopt to run codeception tests and local developments
 * DO NOT FORGET OVERRIDE IT IN PRODUCTION MODE!
 */
define('REST_AUTH_DB_CONNECTION_URL', getenv('DB_CONNECTION_URL') ?: 'sqlite:////srv/rest-auth/db.sqlite');
define('REST_AUTH_DEV_MODE', explode(',', getenv('REST_AUTH_DEV_MODE') ?: true));
define('REST_AUTH_HTTP_HOST', getenv('REST_AUTH_HTTP_HOST') ?: '127.0.0.1');
define('REST_AUTH_PORT', getenv('REST_AUTH_PORT') ?: 8080); // TODO make static - can be mapped with docker
define('REST_AUTH_ADDRESS', getenv('REST_AUTH_ADDRESS') ?: '0.0.0.0');
define('REST_AUTH_ORIGIN', explode(',', getenv('REST_AUTH_ORIGIN') ?: '*'));
define('REST_JWT_KEY', explode(',', getenv('REST_JWT_KEY') ?: 'secret'));
