<?php

  class api extends controller
  {
    public function __construct()
    {
<<<<<<< HEAD
      echo 'api.php <br/>';
      // $this->loadModel('api');
=======
      $this->loadModel('api');
>>>>>>> 932317aeae2c320b6b66af1aabfff76f70c31409
    }

    public function api()
    {
<<<<<<< HEAD
      // $this->model->api();
=======
      $this->loadView('errors');
      $this->view->errors();
>>>>>>> 932317aeae2c320b6b66af1aabfff76f70c31409
    }
  }

?>
