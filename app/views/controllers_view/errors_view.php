<?php

  class errors_view extends view
  {

    public function __construct()
    {
      $this->view=new view();
    }

    public function errors()
    {

      /**
       * @TITLE for page
       */
      $this->view->title='404 Error';

      /**
       * @frame
       */
      $this->view->frame('errors/errors');
    }

  }

?>
