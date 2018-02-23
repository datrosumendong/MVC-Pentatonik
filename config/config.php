<?php

/**
 * @URL BASE disesuaikan
 */
define('URL','http://localhost/MVC-Pentatonik/');

/**
 * @DATAWEBSITE WEBSITE
 */
define('TITLE', 'MVC-Pentatonik');

/**
 * @Session BASE
 * Session yang diambil sebagai filter data
 */
define('SESBASE', 'email');

/**
 * @Memulai coneksi Database
 * Ubalah isi konstanta di bawah ini sesuai kebutuhan
 */
define('SERVER', $_ENV['DB_SERVER']);
define('USER', $_ENV['DB_USER']);
define('PASS', $_ENV['DB_PASS']);
define('DBNAME', $_ENV['DB_NAME']);

?>
