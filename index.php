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
  define('SERVER','localhost');
  define('USER','root');
  define('PASS','');
  define('DBNAME','MVC-Pentatonik');

  /**
   * @All Function
   */
  include 'pentatonik/func/allfunction.php';

  /**
   * @Spl_autoload_register
   */
  include 'conf_load.php';

  /**
   * @START SESSION
   */
  session_start();

  /**
   * @Memulai routing controllers
   */
  $start=new rout();
  $start->init(); //Memanggil init load Controller dan Methode

?>
