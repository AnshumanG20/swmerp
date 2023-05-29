<?php
  // Simple page redirect

function redirect($page = null){
  	if($page!=null){
    	header('location: ' . URLROOT . '/' . $page);
    }
}

function redirectBack(){
    header('location: ' . $_SERVER['HTTP_REFERER'], true);
}

function isPost(){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
      return true;
  }else{
  	return false;
  }
}

function isGet(){
  if($_SERVER['REQUEST_METHOD'] == 'GET'){
      return true;
  }else{
    return false;
  }
}

function postData(){
	  if($_SERVER['REQUEST_METHOD'] == 'POST'){
	      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	      return $_POST;
	  }
}

function postInputData(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      return $_POST;
    }
}

function getData(){
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        return $_GET;
    }
}
function getWebView(){
    $isWebView = false;
    if((strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile/') !== false) && (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari/') == false)){
        $isWebView = true;
    }elseif(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
        $isWebView = true;
    }
    if(!$isWebView) : 
        return "DESKTOP";//echo "Desktop or mobile browser";
    else :
        return "WEBVIEW"; //echo "webview Browser";
    endif;
}


function httpPost($url, $params = null, $http = null){
    if($http==null)
      $url = URLROOT.'/'.ltrim($url, '/');
    else{
      $url = $http.$url;
    }
    $postData = '';
    if($params!=null){
      foreach($params as $k => $v) { 
        $postData .= '&'.$k . '='.$v; 
      }
    }
    $postData = rtrim($postData, '&');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
    $output=curl_exec($ch);
    if($output === false){
        echo "<script>console.log('".curl_errno($ch)."');</script>";
        echo "<script>console.log('".curl_error($ch)."');</script>";
    }
    curl_close($ch);
    return $output;
}

function httpPostFile($url, $params = null, $http = null){

    if($http==null)
      $url = URLROOT.'/'.ltrim($url, '/');
    else{
      $url = $http.$url;
    }
    $postData = "";
    if($params!=null){
      $postData = $params;
    }

    $header = array('Content-Type: multipart/form-data');
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // stop verifying certificate
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true); // enable posting
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postData); // post images
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // if any redirection after upload
    $output = curl_exec($curl);
    curl_close($curl);
    if($output === false){
        echo "<script>console.log('".curl_errno($curl)."');</script>";
        echo "<script>console.log('".curl_error($curl)."');</script>";
    }
    return $output;

}


  