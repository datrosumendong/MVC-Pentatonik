<?php

  /**
   * @Set Default Time Zone
   */
  date_default_timezone_set('Asia/Makassar');

  /**
   * @START SESSION
   */
  session_start();

  /**
   * @config file
   */
  require_once 'config/config.php';

  /**
   * @All Function
   */
  require_once 'pentatonik/func/allfunction.php';

  /**
   * @Spl_autoload_register
   */
  require_once 'config/auto_load.php';

  /**
   * @Memulai routing controllers
   */
  $start=new rout();
  $start->init(); //Memanggil init load Controller dan Methode

?>
