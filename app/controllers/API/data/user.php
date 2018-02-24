<?php

  class data_user extends api_model
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function user()
    {
      $this->get_first('user', 'email', 'dsumendong@gmail.com');
      $user=$this->_user;

      print Json_encode($user);
    }
  }

?>
