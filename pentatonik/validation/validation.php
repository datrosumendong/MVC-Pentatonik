<?php

  class validation
  {

    /**
     * PROPERTI VALIDATION
     */
    private $_passed  = false,
            $_errors  = array();

    public function check($items = array())
    {
      foreach ($items as $item => $rules)
      {
        foreach ($rules as $rule => $rule_value)
        {
          $this->item=explode('_', $item);
          $valueItem=implode(' ',$this->item);

          switch ($rule) {
            case 'required':
              if(trim(input::gp($item))==false&&$rule_value==true)
              {
                $this->addError('>> '.ucfirst($valueItem)." wajib diisi!!!");
              }
              break;
            case 'min':
              if(strlen(input::gp($item))<$rule_value)
              {
                $this->addError('>> '.ucfirst($valueItem)." minimal ".$rule_value." karakter");
              }
              break;
            case 'max':
              if(strlen(input::gp($item))>$rule_value)
              {
                $this->addError('>> '.ucfirst($valueItem)." maximal ".$rule_value." karakter");
              }
              break;
            case 'match':
              if(input::gp($item)!=input::gp($rule_value))
              {
                $this->addError('>> '.ucfirst($valueItem)." harus sama dengan ".$rule_value);
              }
              break;
            case 'karakter':
              if(!preg_match("/^[a-zA-Z ]*$/",input::gp($item)))
              {
                $this->addError('>> '.ucfirst($valueItem)." hanya boleh berisi karakter ".$rule_value);
              }
              break;
            case 'unkarakter':
              if(!preg_match("/^[a-zA-Z-_0-9]*$/",input::gp($item)))
              {
                $this->addError('>> '.ucfirst($valueItem)." hanya boleh berisi karakter ".$rule_value." dan tidak mengandung pepasi, gunakan - & _ untuk pemisah.");
              }
              break;
            case 'controll':
              if(input::gp($item)=='pengaturan'||input::gp($item)=='index'||input::gp($item)=='webinfo'||input::gp($item)=='masuk'||input::gp($item)=='keluar'||input::gp($item)=='daftar'&&$rule_value==true)
              {
                $this->addError('>> '.ucfirst($valueItem)." sudah ada yang menggunakannya!!!");
              }
              break;
            case 'mail':
              if(!filter_var(input::gp($item), FILTER_VALIDATE_EMAIL))
              {
                $this->addError('>> '.ucfirst($valueItem)." format tidak ".$rule_value);
              }
              break;

            default:
              break;
          }

        } // Penutup foreach kedua
      } // Penutup foreach pertama

      if(empty($this->_errors))
      {
        $this->_passed=true;
      }

      return $this;

    } // Penutup fungsi check

    public function checkPhotos($items = array())
    {
      foreach ($items as $item => $rules)
      {
        foreach ($rules as $rule => $rule_value)
        {
          $this->item=explode('_', $item);
          $valueItem=implode(' ',$this->item);

          if(!empty(input::gpFiles($item,'type'))){
            $typeFile=explode('/',input::gpFiles($item,'type'));
          }else{
            $typeFile=[0,1];
          }
          // print_r($typeFile);
          // die();

          switch ($rule) {
            case 'error':
              if(input::gpFiles($item,'error')>$rule_value)
              {
                $this->addError("Error ".ucfirst($valueItem));
              }
              break;
            case 'required':
              if(input::gpFiles($item,'name')==null&&$rule_value==true)
              {
                $this->addError("Tidak ada file ".ucfirst($valueItem)." yang diUpload!!!");
              }
              break;
            case 'type':
              if(input::gpFiles($item,'type')!==$rule_value.'/'.$typeFile[1])
              {
                $this->addError("File yang anda upload bukan merupakan file ".ucfirst($valueItem));
              }
              break;
            case 'size':
              if(input::gpFiles($item,'size')>=$rule_value)
              {
                $this->addError("File ".ucfirst($valueItem)." berkapasitas lebih dari ".$rule_value." bytes");
              }
              break;

            default:
              break;
          }

        } // Penutup foreach kedua
      } // Penutup foreach pertama

      if(empty($this->_errors))
      {
        $this->_passed=true;
      }

      return $this;

    } // Penutup fungsi checkPhotos

    public function checkAudio($items = array())
    {
      foreach ($items as $item => $rules)
      {
        foreach ($rules as $rule => $rule_value)
        {
          $this->item=explode('_', $item);
          $valueItem=implode(' ',$this->item);

          if(!empty(input::gpFiles($item,'type'))){
            $typeFile=explode('/',input::gpFiles($item,'type'));
          }else{$typeFile=[0,1];}
          // print_r($typeFile);
          // die();

          switch ($rule) {
            case 'error':
              if(input::gpFiles($item,'error')>$rule_value)
              {
                $this->addError("Error ".ucfirst($valueItem));
              }
              break;
            case 'required':
              if(input::gpFiles($item,'name')==null&&$rule_value==true)
              {
                $this->addError("Tidak ada file ".ucfirst($valueItem)." yang diUpload!!!");
              }
              break;
            case 'type':
              if(input::gpFiles($item,'type')!==$rule_value.'/'.$typeFile[1])
              {
                $this->addError("File yang anda upload bukan merupakan file ".ucfirst($valueItem));
              }
              break;
            case 'size':
              if(input::gpFiles($item,'size')>=$rule_value)
              {
                $this->addError("File ".ucfirst($valueItem)." berkapasitas lebih dari ".$rule_value." bytes");
              }
              break;

            default:
              break;
          }

        } // Penutup foreach kedua
      } // Penutup foreach pertama

      if(empty($this->_errors))
      {
        $this->_passed=true;
      }

      return $this;

    } // Penutup fungsi checkMusic

    public function addError($error)
    {
      $this->_errors[]=$error;
    }

    public function errors()
    {
      return $this->_errors;
    }

    public function passed(){
      return $this->_passed;
    }

  } // Penutup class Validation

?>
