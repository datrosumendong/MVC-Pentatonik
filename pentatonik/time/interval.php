<?php

  class interval extends waktu
  {
    public static function _waktu($tanggal)
    {
      $waktu=new waktu;
      $tgl=$tanggal;
      $datetime=new DateTime($tgl);
      $now=$waktu->_dt;
      $interval=$datetime->diff($now);
      echo $waktu->checkDifference($interval);
    }
  }

?>
