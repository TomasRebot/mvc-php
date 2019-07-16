<?php

require_once  '../vendor/autoload.php';

// Config
define("APP_NAME", "modulo-de-seguridad");

define("ROOT", realpath(dirname(__FILE__) . "/../") . "/");

define("PUBLIC_ROOT", ROOT . "public/");

define("APP_ROOT", ROOT . "App/");

// View Config
define("VIEW_PATH", "../App/View/");

define("DATABASE_HOST", "localhost");

define("DATABASE_NAME", "moduloseguridad");

define("DATABASE_USERNAME", "root");

define("DATABASE_PASSWORD", "");

define("DEFAULT_404_PATH", "plantilla/404.php");

define("DEFAULT_HEADER_PATH", "plantilla/header");
define("DEFAULT_FOOTER_PATH", "plantilla/footer");
define("HTMLENTITIES_FLAGS", ENT_QUOTES);
define("HTMLENTITIES_ENCODING", "UTF-8");
define("HTMLENTITIES_DOUBLE_ENCODE", false);
define("REDIRECT_BASE_PATH", "/modulo-seguridad/");


define("APP_PROTOCOL", stripos($_SERVER["SERVER_PROTOCOL"], "https") === true ? "https://" : "http://");
define("APP_ENV", 'local');

define("CONTROLLER_PATH", "\App\Controller\\");

define("DEFAULT_CONTROLLER", CONTROLLER_PATH . "IndexController");

define("DEFAULT_CONTROLLER_ACTION", "index");

define("APP_CONFIG_FILE", APP_ROOT . "config.php");


