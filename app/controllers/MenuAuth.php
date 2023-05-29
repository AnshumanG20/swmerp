<?php
class MenuAuth extends Controller{
    public function __construct()
    {
        if(!isLoggedIn()){ redirect('Login'); }
        $this->model_menu_permission = $this->model('model_menu_permission');
    }
    public function menu_auth($path=null)
    {
        //get path id first
    //    echo "<pre>";
    //    print_r($_SESSION);
    //    return;
        $designation_mstr_id = $_SESSION['emp_details']['designation_mstr_id'];
        $path = "Masters/EmployeementList";
        $menu_path_id =$this->model_menu_permission->getMenu_mstr_id($path);
        // echo $menu_path_id['_id'];
        if($menu_path_id['_id']){
        $result =$this->model_menu_permission->checkMenuPerIsExist($menu_path_id['_id'],$designation_mstr_id);

        if($result==null){
            return false;
        }
        else{
            return true;
        }
            
        }

        
    }
}