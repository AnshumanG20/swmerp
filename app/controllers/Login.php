<?php

  class Login extends Controller {
  	private $db;
  	function __construct(){
  		$this->db = new Database;
        $this->model_menu_mstr = $this->model('model_menu_mstr');
        $this->model_menu_permission = $this->model('model_menu_permission');
  	}
    public function index() {

        
        // return;
        if(isset($_SESSION['emp_details'])){
            redirect("Dashboard");
        }
        if(isPost()){
            $data = postData();
            $data["device_type"] = "DESKTOP";
            $response = httpPost('/api_login/login/', $data);
            $response = json_decode($response, true);
            if($response['response']==true){
                $_SESSION['emp_details'] = $response['data'];

                $designation_mstr_id = ($_SESSION['emp_details']['designation_mstr_id']);
                if(!is_null($designation_mstr_id)){
                    $menuList = $this->model_menu_mstr->getMenuMstrListByDesignationMstrId($designation_mstr_id);
                    if($menuList){
                        foreach ($menuList as $key => $value) {
                            $subMenuList = $this->model_menu_mstr->getMenuSubListByDesignationMstrId($designation_mstr_id, $value['_id']);
                            if($subMenuList){
                                $menuList[$key]['sub_menu'] = $subMenuList;
                            }
                        }

                       $_SESSION['emp_details']['menuList'] = $menuList;
                    //    echo '<pre>';print_r($_SESSION['emp_details']);
                        
                    }
                }
                if($_SESSION['emp_details']['designation_mstr_id']!=0){
                    redirect("DashboardCommon/Dash");
                    return;
                }
                redirect("Dashboard");
            }else{
                $err = "";
                $i = 0;
                if(is_array($response["data"])){
                    foreach ($response["data"] as $key => $value) {
                        $i++;
                        if($i==1)
                            $err .= $value;
                        else
                            $err .= " & ".$value;
                    }
                }else{
                    $err = $response["data"];
                }
                $this->view('users/login', $data, $err);
            }
        }else{
            $this->view('users/login');
        }
    }
    public function Logout(){
        if(loggedOut()){
            redirect('Login');
        }
    }

  }