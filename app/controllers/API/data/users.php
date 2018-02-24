<?php

  class data_users extends api_model
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function users()
    {
      $this->get_all_api_datas('user');
      $data=$this->_data;

      print Json_encode($data);
    }
  }

?>
