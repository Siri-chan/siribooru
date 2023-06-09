<?php
/**
 * Working environment.
 */
if (!defined('RAILS_ENV')) {
    define('RAILS_ENV', 'development');
}

/**
 * Application's root directory.
 */
define('RAILS_ROOT', dirname(__DIR__));

/**
 * Path to Rails.
 */
$railsPath = __DIR__ . '/../vendor/yupiel/railsphp/lib/Rails';

/**
 * Load and initialize Rails.
 */
require $railsPath . '/Rails.php';
Rails::initialize();

/**
 * Load and initialize application.
 */
require __DIR__ . '/application.php';
MyImouto\Application::initialize();
