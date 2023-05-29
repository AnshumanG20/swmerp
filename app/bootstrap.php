<?php
  // Load Config
  require_once 'config/config.php';
  // Load helpmates
  require_once 'helpmates/url_helper.php';
  require_once 'helpmates/session_helper.php';
  require_once 'helpmates/upload_helper.php';
  require_once 'helpmates/other_helper.php';


require_once 'helpers/mpdf/vendor/autoload.php';
  // Autoload Core Libraries
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });

  
  
