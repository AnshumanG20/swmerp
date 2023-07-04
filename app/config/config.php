<?php
  // DB Params
  define('SQL_NAME', 'pgsql');
  define('DB_HOST', 'localhost');
  define('DB_PORT', '5433');
  define('DB_USER', 'postgres');
  define('DB_PASS', '12345');
  define('DB_NAME', 'swm_erp');
 

  // App Root
  define('APPROOT', dirname(dirname(__FILE__)));
  define('UPLOAD_DIR', lcfirst(str_replace("\\", "/",dirname(dirname(dirname(__FILE__)))))."/uploads/");
  
  // URL Root
  // $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
  //                 "https" : "http") . "://" . $_SERVER['HTTP_HOST']."/".explode('/', $_SERVER['REQUEST_URI'])[1];

  $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                  "https" : "http") . "://" . $_SERVER['HTTP_HOST']."/".explode('/', $_SERVER['REQUEST_URI'])[1];



 

  define('URLROOT', $link);
  // Site Name
  define('SITENAME', 'Aadrika Enterprises');
  // MVC Developed By
  define('MVCDEVELOPEDBY', 'AADRIKAENTERPRISES');
  // App Version
  define('APPVERSION', '1.0.0');

  date_default_timezone_set('Asia/Kolkata');