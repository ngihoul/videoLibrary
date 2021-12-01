<?php

require 'database.php';

define("DB_NAME", "root");
define("DB_PASS", "");
define("DB_SERVER", "localhost");
define("DB_DATABASE", "videotheque");

define("DEBUG", true);

$mysqli = connexion(DB_NAME, DB_PASS, DB_DATABASE, DB_SERVER);
