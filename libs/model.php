<?php

  class model
  {

    public $_user=null;
    public $_data=null;

    public function __construct()
    {
      $this->_db=database::getInstance();

      if(session::exists('email'))
      {
        global $user;
        
        $this->get_first('user', 'email', session::get('email'));
        $user=$this->_user;
      }
    }

    /**
     * @param table
     * @param key
     * @param value
     */
    public function get_first($table, $key, $value)
    {
      $this->_db->setTable($table);
      $this->_db->select()->all();
      $this->_user=$this->_db->where($key, '=', $value)->first();
    }

    /**
     * @param table
     */
    public function get_all_api_datas($table)
    {
      $this->_db->setTable($table);
      $this->_data=$this->_db->select()->all();
    }

  }

?>
