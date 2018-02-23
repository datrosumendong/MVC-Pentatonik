<title><?=(isset($this->title)) ? $this->title : TITLE ;?></title>
<link rel="stylesheet" href="<?php echo URL;?>public/JSBoots/css/style.css<?='?v='.token::v_building(7);?>">
<link rel="shortcut icon" type="image/x-icon" href="<?=URL;?>public/images/icon.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="<?=URL;?>public/JSBoots/js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="<?=URL;?>public/JSBoots/js/vue.min.js"></script>
<?php if(isset($this->js)){ ?>
<?php foreach ($this->js as $js){ ?>
<script type="text/javascript" src="<?=URL.'app/views/'.$js.'?v='.token::v_building(7);?>"></script>
<?php } ?>
<?php } ?>
<?php if(isset($this->css)){ ?>
<?php foreach($this->css as $css){ ?>
<link rel="stylesheet" href="<?=URL.'app/views/'.$css.'?v='.token::v_building(7);?>">
<?php } ?>
<?php } ?>
