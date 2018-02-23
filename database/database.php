<?php

  /**
   * Membuat class Database
   */
  class Database
  {

    /*=== Property ===*/
    private static $_INSTANCE=null;
    private $mysqli,
            $SERVER   = SERVER,
            $USER     = USER,
            $PASS     = PASS,
            $DBNAME   = DBNAME;

    private $_conn, $_table, $_column='*', $_query, $_statement, $_attr, $_params=[], $_prevData=[];

    /**
     * Membuat fungsi __Construct database
     */
    public function __construct()
    {

      // Coneksi Database
      try
      {
        $this->_conn = new PDO("mysql:host=$this->SERVER;dbname=$this->DBNAME", $this->USER, $this->PASS);
        $this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo 'Memanggil database!!!<br/>';
      }catch (PDOException $e){
        die($e->getMessage());
      }

    } // Penutup fungsi __Construct

    /**
     * Membuat fungsi getInstance singletonPattern
     */
    public static function getInstance()
    {

      // Struktur SingletonPattern
      if(!isset(self::$_INSTANCE))
      {
        self::$_INSTANCE=new database();
      }

      return self::$_INSTANCE;

    } // Penutup fungsi getInstance

    // Privent from __clone
    public function __clone()
    {
      return false;
    } // Penutup fungsi __clone

    public function setTable($table)
    {
      $this->_table=$table;
      return $this;
    } // Penutup fungsi setTable

    public function select($columns='*')
    {
      $this->_query="SELECT $columns FROM $this->_table";
      $this->_columns=$columns;
      return $this;
    } // Penutup fungsi select

    public function JoinAll($join)
    {
      $this->_query="SELECT $join";
      $this->_join=$join;
      return $this;
    } // Penutup fungsi select

    public function all()
    {
      $this->run();
      return $this->_statement->fetchAll(PDO::FETCH_OBJ);
    } // Penutup fungsi all

    public function first()
    {
      $this->run();
      return $this->_statement->fetch(PDO::FETCH_OBJ);
    } // Penutup fungsi first

    public function last()
    {
      $this->run();
      return $this->_statement->lastInsertId(PDO::FETCH_OBJ);
    } // Penutup fungsi lastInsert

    public function run()
    {
      dibug::v_dump($this->_query.' '.$this->_attr, false, false);

      try{
        $this->_statement = $this->_conn->prepare($this->_query.' '.$this->_attr);
        $this->_statement->execute($this->_params);
        $this->flush();
      }catch(Exception $e){
        die($e->getMessage());
      }
    } // penutup fungsi run

    public function where($col, $sign, $value, $bridge= ' AND ')
    {
      $this->_query="SELECT $this->_columns FROM $this->_table WHERE";

      if(count($this->_prevData)==0)
      {
        $bridge='';
      }

      $this->_prevData[]= array(
        'col'   => $col,
        'sign'  => $sign,
        'value' => $value,
        'bridge'=> $bridge,
      );

      $this->getWhere($bridge);
      return $this;
    } // Penutup Fungsi where

    public function join_Where($col, $sign, $value, $bridge= ' AND ')
    {
      $this->_query="SELECT $this->_join WHERE";

      if(count($this->_prevData)==0)
      {
        $bridge='';
      }

      $this->_prevData[]= array(
        'col'   => $col,
        'sign'  => $sign,
        'value' => $value,
        'bridge'=> $bridge,
      );

      $this->getWhere($bridge);
      return $this;
    } // Penutup Fungsi where

    public function orWhere($col, $sign, $value)
    {
      $this->where($col, $sign, $value, $bridge= ' OR ');
      return $this;
    } // Penutup fungsi orWhere

    public function getWhere($bridge)
    {
      if(count($this->_prevData)>1){
        $this->_attr='';
        $this->_params=[];
      }

      $x=1;
      foreach ($this->_prevData as $prev) {

        if($x<=count($this->_prevData))
        {
          $this->_attr.=$prev['bridge'];
        }

        $this->_attr.=$prev['col'].' '.$prev['sign'].' ?';
        $this->_params[]=$prev['value'];

        $x++;
      }
      return $this;
    } // Penutup fungsi getWhere

    public function create($fields=array())
    {
      $cols=implode(",", array_keys($fields));
      $values='';
      $x=1;

      foreach($fields as $field)
      {
        $this->_params[]=$field;
        $values.='?';
        if($x<count($fields))
        {
          $values.=', ';
        }
        $x++;
      }
      $this->_query="INSERT INTO $this->_table($cols) VALUES ($values)";
      $this->run();
    } // Penutup fungsi create

    public function update($fields=array())
    {
      $cols = '';
      $x    = 1;
      $total_prev=count($this->_params);

      foreach($fields as $key=>$value)
      {
        $this->_params[]=$value;
        $cols.=$key.'=?';

        if($x<count($fields))
        {
          $cols.=', ';
        }
        $x++;
      }

      for($i=0;$i<$total_prev;$i++){
        $this->_params[]=array_shift($this->_params);
      }

      $this->_query="UPDATE $this->_table SET $cols WHERE";
      $this->run();
    } // Penutup fungsi update

    public function delete()
    {
      $this->_query="DELETE FROM $this->_table WHERE";
      $this->run();
    } // Penutup fungsi delete

    public function orderBy($col = 'id', $type)
    {
      $this->_attr.="ORDER BY $col $type";
      return $this;
    } // Penutup fungsi orderBy

    public function take($num)
    {
      $this->_attr.=" LIMIT $num";
      return $this;
    } // Penutup fungsi take

    public function flush()
    {
      $this->_attr='';
      $this->_query='';
      $this->_params=[];
      $this->_prevData=[];
    } // Penutup fungsi flush

  } // Penutup class Database

?>
