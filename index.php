<?php

  /**
   * @load env
   */
  include 'vendor/autoload.php';
  $dotenv = new Dotenv\Dotenv(__DIR__);
  $dotenv->load();

  /**
   * @config file
   */
  include 'config/config.php';

  /**
   * @All Function
   */
  include 'pentatonik/func/allfunction.php';

  /**
   * @Spl_autoload_register
   */
  include 'config/auto_load.php';

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
