<?php

  class api extends controller
  {
    public function __construct()
    {
      $this->loadModel('api');
    }

    public function api()
    {
      $this->loadView('errors');
      $this->view->errors();
    }
  }

?>
