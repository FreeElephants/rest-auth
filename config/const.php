<?php
/**
 * Application configurable parameters
 *
 * Default values adopt to run codeception tests and local developments
 * DO NOT FORGET OVERRIDE IT IN PRODUCTION MODE!
 */
define('REST_AUTH_DB_CONNECTION_URL', getenv('DB_CONNECTION_URL') ?: 'sqlite:////srv/rest-auth/db.sqlite');
define('REST_AUTH_HTTP_HOST', getenv('REST_AUTH_HTTP_HOST') ?: '127.0.0.1');
define('REST_AUTH_PORT', getenv('REST_AUTH_PORT') ?: 8080);
define('REST_AUTH_ADDRESS', getenv('REST_AUTH_ADDRESS') ?: '0.0.0.0');
define('REST_AUTH_ORIGIN', explode(',', getenv('REST_AUTH_ORIGIN') ?: '*'));