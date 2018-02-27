<?php

  class data_users extends api_model
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function users($token='')
    {
      if(session::exists(SESBASE))
      {
        global $user;

        if($token==$user->aktivasi)
        {
          $this->get_all_api_datas('user');
          $userdatas=$this->_data;

          print Json_encode($userdatas);
        }else{
          redirect::to(URL.'errors?token='.md5('errors'));
        }
      }else{
        echo 'Set Your Session Email <br/>';
      }
    }
  }

?>
