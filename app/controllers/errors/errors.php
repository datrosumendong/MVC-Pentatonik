<?php

  class errors extends controller
  {

    public function __construct()
    {
      $this->loadView('errors');
    }

    public function errors()
    {
      $this->view->errors();
    }

  }

?>
