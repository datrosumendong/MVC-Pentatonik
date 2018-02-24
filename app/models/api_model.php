<?php

  class api_model extends model
  {

    public function __construct()
    {
      parent::__construct();
    }

    /**
     * @global user
     */
    public function api()
    {
      global $user;

      $this->get_first('user', 'email', 'dsumendong@gmail.com');
      $user=$this->_user;
    }

  }

?>
