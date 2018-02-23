<?php

  class Waktu
  {

    public  $_dt;

    public function __construct(){
      $this->_dt=new DateTime();
    }

    public function checkDifference($time){
      if($time->y>0) return $time->y.' tahun lalu';
      if($time->m>0) return $time->m.' bulan lalu';
      if($time->d>0) return $time->d.' hari lalu';
      if($time->h>0) return $time->h.' jam lalu';
      if($time->i>0) return $time->i.' menit lalu';
      if($time->s<60) return 'Baru Saja';
    }

  }

?>
