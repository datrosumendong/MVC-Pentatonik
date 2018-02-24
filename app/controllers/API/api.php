<?php

  class api extends controller
  {
    public function __construct()
    {
      $this->loadModel('api');
      $this->loadView('api');
    }

    public function api()
    {
      $this->model->api();
      $this->view->api();
    }
  }

?>
