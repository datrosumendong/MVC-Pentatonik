<?php

  class token
  {
    public static function generate(){
      return Session::set('token', md5(uniqid(rand(), true)));
    }

    public static function check($token){
      if($token===Session::get('token')){
        return true;
      }else{
        return false;
      }
    }

    public function v_building($length)
    {
      $data = 'abcdefghijklmnopqrstuvwxyz0987654321ABCDEFGHIJKLMNOPQRSTU1234567890';
      $string = '';
      for($i = 0; $i < $length; $i++) {
          $pos = rand(0, strlen($data)-1);
          $string .= $data{$pos};
      }
      return $string;
    }
  }

?>
