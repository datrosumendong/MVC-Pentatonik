<?php

  /**
   * Membuat class View
   */
  class view
  {

    /**
     * @Single page view
     * Ini untuk menampilkan view pada masing-masing frame
     */
    public function allRender($nama)
    {
      require_once 'app/views/models_view/'.$nama.'.php';
    }

    /**
     * @Frame single page view
     */
    public function frame($mains){
      require_once 'app/views/templates/core/header.php';
      require_once 'app/views/models_view/'.$mains.'.php';
      require_once 'app/views/templates/core/footer.php';
    }

  }

?>
