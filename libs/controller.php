<?php

  class controller
  {

    /**
     * @Fungsi untuk meload models
     */
    public function loadModel($models)
    {
      $fileModel='app/models/'.$models.'_model.php';

      if(file_exists($fileModel))
      {
        require_once $fileModel;
        $modelName=$models.'_model';
        $this->model=new $modelName;
      }
    }

    /**
     * @Fungsi untuk meload views
     */
    public function loadView($views)
    {
      $fileView='app/views/controllers_view/'.$views.'_view.php';

      if(file_exists($fileView))
      {
        require_once $fileView;
        $viewName=$views.'_view';
        $this->view=new $viewName;
      }
    }

  }

?>
