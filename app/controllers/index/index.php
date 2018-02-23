<?php

  class index extends controller
  {

    /**
     * @Fungsi __construct controllers index
     */
    public function __construct()
    {
      $this->loadView('index');
    }

    /**
     * @Meload tampilan atau view index sebelum login
     */
    public function index()
    {
      $this->view->index();
    }

  }

?>
