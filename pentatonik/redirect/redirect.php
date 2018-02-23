<?php

  class redirect
  {

    public static function to($lokasi)
    {
      echo '<meta http-equiv="Refresh" Content="0; URL='.$lokasi.'">';
      // header('Location:'.$lokasi.'');
      // header('Location:'.$lokasi.'',TRUE,307);
      exit;
    }

  }

?>
