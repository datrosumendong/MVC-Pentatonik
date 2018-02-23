<?php

  class input
  {

    public static function gp($name)
    {

      if(isset($_POST[$name]))
      {
        return $_POST[$name];
      }

      if(isset($_GET[$name]))
      {
        return $_GET[$name];
      }
      return false;

    }

    public static function gpFiles($input, $nama)
    {

      if(isset($_FILES[$input][$nama])){
        return $_FILES[$input][$nama];
      }
      return false;

    }

  }

?>
