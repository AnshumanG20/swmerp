<?php
  // mpdf (make pdf)
  

 function getStateDistCity(){
 	$string = file_get_contents('C:/xampp/htdocs/sri/app/helpers/StateDistCity/StateDistCity.json');
 	$data = json_decode($string, true);
 	return $data;
 }