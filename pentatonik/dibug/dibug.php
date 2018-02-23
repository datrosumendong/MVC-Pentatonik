<?php

  class dibug
  {

    /**
     * @Fungsi static untuk dibug var_dump
     */
    public static function v_dump($_results, $_bolean=false, $_die=false)
    {
      if($_bolean==false)
      {
        return false;
      }else{
        self::before();
        highlight_string("<?php\n\$data =\n\n" . var_export($_results, true) . "\n\n;?>");
        self::after();
        $_die==false ? true : die();
      }
    }

    /**
     * @Fungsi static untuk dibug print_r
     */
    public static function p_r($_results, $_bolean=false, $_die=false)
    {
      if($_bolean==false)
      {
        return false;
      }else{
        self::before();
        highlight_string("<?php\n\$data =\n\n" . print_r($_results, true) . "\n;?>");
        self::after();
        $_die==false ? true : die();
      }
    }

    public static function before()
    {

      echo '<div style="background:rgb(215, 215, 215);
                        margin:0 auto;
                        font-size:15px;
                        font-family:sans-serif;
                        width:75%;
                        padding:25px 25px;
                        border:1px solid grey;
                        border-radius:10px;">';

      echo '<div style="margin:0 auto;
                        color:rgb(78, 70, 74);
                        font-family:sans-serif;
                        font-weight:bold;
                        font-size:25px;
                        margin-bottom:25px">

            //Laporan Hasil Dibug

            </div>';

    }

    public static function after()
    {

      echo '<br/></div>';

    }

  }

?>
