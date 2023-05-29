<?php
  session_start();

  // Flash message helper
  // EXAMPLE - flash('register_success', 'You are now registered');
  // DISPLAY IN VIEW - echo flash('register_success');
  function flash($name = '', $message = '', $class = 'alert alert-success'){
    if(!empty($name)){
      if(!empty($message) && empty($_SESSION[$name])){
        if(!empty($_SESSION[$name])){
          unset($_SESSION[$name]);
        }

        if(!empty($_SESSION[$name. '_class'])){
          unset($_SESSION[$name. '_class']);
        }

        $_SESSION[$name] = $message;
        $_SESSION[$name. '_class'] = $class;
      } elseif(empty($message) && !empty($_SESSION[$name])){
        $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
        echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
        unset($_SESSION[$name]);
        unset($_SESSION[$name. '_class']);
      }
    }
  }
  function flashToast($name = '', $message = ''){
    if(!empty($name)){
      if(!empty($message) && empty($_SESSION[$name])){
        if(!empty($_SESSION[$name])){
          unset($_SESSION[$name]);
        }
        $_SESSION[$name] = $message;
        $returnData = true;

      } elseif(empty($message) && !empty($_SESSION[$name])){
        $returnData = $_SESSION[$name];
        unset($_SESSION[$name]);
        return $returnData;
      }else{
        $returnData = false;
      }
    }else{
      $returnData = false;
    }
    return false;
  }

  function isLoggedIn(){
    if(isset($_SESSION['emp_details'])){
		/*if(isset($_SESSION['emp_details']['permittedMenuList'])){
			$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			echo $actual_link = explode("swmerp/", $actual_link)[1];
			if ("DashboardCommon/Dash"==$actual_link || "Dashboard"==$actual_link) {
				return true;
			}
			$menuList = $_SESSION['emp_details']['permittedMenuList'];
			$menuList = $_SESSION['emp_details']['menuList'];
			echo "<pre>";
			print_r($menuList);
			echo "</pre>";
			if (is_null(urlSearch($actual_link, $_SESSION['emp_details']['permittedMenuList']))) {
				return false;
			}
		}*/
      return true;
    } else {
      return false;
    }
  }
  function loggedOut(){
    unset($_SESSION['emp_details']);
    return true;
  }
  
  function urlSearch($url, $menuArray) {
	   foreach ($menuArray as $key => $val) {
		   if ($val['menu_path'] === $url) {
			   return $key;
		   }
	   }
	   return null;
	}
