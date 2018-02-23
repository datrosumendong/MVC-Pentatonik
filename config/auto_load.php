<?php

  /**
   *  Spl_Autoload_Register
   *  Load semua class yang ingin kamu gunakan di sini;
   */
  spl_autoload_register(function($class)
  {

    /**
     * Ini adalah sources tempat file class berada
     */
    $sources=array(
                   "database/$class.php",
                   "libs/$class.php",
                   "rout/$class.php",
                   "pentatonik/time/$class.php",
                   "pentatonik/token/$class.php",
                   "pentatonik/redirect/$class.php",
                   "pentatonik/validation/$class.php",
                   "pentatonik/dibug/$class.php",
                   "pentatonik/session/$class.php",
                   "pentatonik/input/$class.php"
                  );

    /**
     * Memanggil semua file class
     */
    foreach($sources as $source)
    {
      if(file_exists($source))
      {
       require_once $source;
      }
    }

  });

?>
