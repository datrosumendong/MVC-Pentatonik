<?php

  class api_view extends view
  {

    public function __construct()
    {
      $this->view=new view();
    }

    public function api()
    {

      /**
       * @TITLE for page
       */
      $this->view->title="API MVC Pentatonik";

      /**
       * @frame
       */
      $this->view->frame('API/API');
    }

  }

?>
