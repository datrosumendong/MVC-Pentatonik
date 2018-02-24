<?php

  class rout
  {

    /**
     * @PROPERTI ROUT
     */
    private $_url         = null,
            $_controller  = null;

    /**
     * @Conver URL and Load all controllers and methode
     */
    public function init()
    {

      /**
       * @Conversi URL sebagai Controllers
       */
      $this->_getUrl();

      /**
       * @Bolean Load Empty URL --> Default URL
       */
      if(empty($this->_url[0]))
      {
        $this->_loadDefaultController();
      }

      /**
       * @load file existing contrller
       */
      $this->_loadExistingController();

      /**
       * @Bolean Load subControllers dan Methode;
       */
      $this->_loadExistingMethode();

    } // Penutup fungsi Init

    /**
     * @Fungsi untuk mengambil URL sebagai controllers
     */
    private function _getUrl()
    {
      /**
       * Memulai conversi url untuk Controllers
       */
      $url=isset($_GET['url']) ? $_GET['url'] : null;
      $this->_url=explode('/',filter_var(rtrim($url,'/'),FILTER_SANITIZE_URL));

      /**
       * @Gunakan ini untuk dibug url
       *
       * Parameter pertama adalah nilai yang ingin dikeluarkan
       * Parameter kedua adalah untuk mengaktifkan (true/false) fungsi dibug
       * Parameter ketiga adalah untuk mengaktifkan (true/false) fungsi die()
       */
      dibug::v_dump($this->_url, false, false);
    }

    /**
     * @Fungsi _LoadDefaultController or Index
     */
    private function _loadDefaultController()
    {
      require_once 'app/controllers/index/index.php'; // Memanggil file index.php
      $this->_controller=new index(); // Memanggil Class index pada file index.php
      $this->_controller->index(); // Memanggil fungsi pada class index pada file index.php
      exit;
    }

    /**
     * @fungsi _loadExistingController
     */
    private function _loadExistingController()
    {
      $file='app/controllers/'.$this->_url[0].'/'.$this->_url[0].'.php';

      if(file_exists($file))
      {

        require_once $file;
        $this->_controller=new $this->_url[0]();

      }else{

        $this->_errors();

      }
    }

    private function _loadExistingSubController()
    {
      $this_class=$this->_url[1].'_'.$this->_url[2];
      $file='app/controllers/'.$this->_url[0].'/'.$this->_url[1].'/'.$this->_url[2].'.php';

      if(file_exists($file))
      {
        require_once $file;
        $this->_controller=new $this_class();
      }
    }

    private function _loadExistingMethode()
    {
      $length = count($this->_url);

      switch ($length) {
        case 6:
            /**
             * @load file existing subcontroller
             */
            $this->_loadExistingSubController();
            $this->_controller->{$this->_url[2]}($this->_url[3], $this->_url[4], $this->_url[5]);
          break;

        case 5:
            /**
             * @load file existing subcontroller
             */
            $this->_loadExistingSubController();
            $this->_controller->{$this->_url[2]}($this->_url[3], $this->_url[4]);
          break;

        case 4:
            /**
             * @load file existing subcontroller
             */
            $this->_loadExistingSubController();
            $this->_controller->{$this->_url[2]}($this->_url[3]);
          break;

        case 3:
            /**
             * @load file existing subcontrolle
             */
            $this->_loadExistingSubController();
            $this->_controller->{$this->_url[2]}();
          break;

        case 2:
            /**
             * @load file existing Methode
             */
            $this->_controller->{$this->_url[1]}();
          break;

        default:
            /**
             * @load file existing Methode Default;
             */
            $this->_controller->{$this->_url[0]}();
          break;
      }
    }

    /**
     * @Menampilkan Erorrs
     */
    public function _errors()
    {
      require_once 'app/controllers/errors/errors.php';
      $this->_controller=new errors();
      $this->_controller->errors();
      exit;
    }

  } // Penutup class start

?>
