<?php

  class session
  {
    
    public static $nilai='';

    public static function exists($nama)
    {
      return(isset($_SESSION[$nama])) ? true : false;
    }

    public static function exists_cook($nama)
    {
      return(isset($_COOKIE[$nama])) ? true : false;
    }

    public static function set($nama, $nilai)
    {
      return $_SESSION[$nama]=$nilai;
    }

    public static function get($nama)
    {
      return $_SESSION[$nama];
    }

    public static function flash($nama, $pesan='')
    {
      if(self::exists($nama))
      {
        global $session;
        $session=self::get($nama);
        self::delete($nama);
        return $session;
      }else{
        self::set($nama, $pesan);
      }
    }

    public static function delete($nama)
    {
      if(self::exists($nama)){
        unset($_SESSION[$nama]);
      }
    }

    public static function ingat_saya($nama, $nilai)
    {
      $year=time()+31536000;
      setcookie($nama, $nilai, $year);
    }

    public static function lupakan($nama, $nilai)
    {
      $year = time() - 100;
      setcookie($nama, $nilai, $year);
    }

    public static function get_ingat($nama)
    {
      if(empty($_COOKIE[$nama]))
      {
        return self::$nilai;
      }else{
        return $_COOKIE[$nama];
      }
    }

  }

?>
