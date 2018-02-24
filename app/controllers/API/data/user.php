<?php

  class data_user extends api_model
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function user($token='')
    {
      if(session::exists(SESBASE))
      {
        global $user;

        if($token==$user->aktivasi)
        {
          $this->get_first('user', SESBASE, $user->email);
          $userdata=$this->_user;

          print Json_encode($userdata);
        }else{
          redirect::to(URL.'errors?token='.md5('errors'));
        }
      }else{
        echo 'Set Your Session Email <br/>';
      }
    }
  }

?>
