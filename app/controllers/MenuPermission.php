<?php
class MenuPermission extends Controller {
	private $db;
	public function __construct(){
		$this->db = new Database;
		if(!isLoggedIn()){ redirect('Login'); }
		$this->model_designation_mstr = $this->model('model_designation_mstr');
		$this->model_menu_mstr = $this->model('model_menu_mstr');
		$this->model_menu_permission = $this->model('model_menu_permission');
	}

	public function menu(){
		$designation_mstr_id = ($_SESSION['emp_details']['designation_mstr_id']);
		$menuList = $this->model_menu_mstr->getMenuMstrListByDesignationMstrId($designation_mstr_id);
		foreach ($menuList as $key => $value) {
			$subMenuList = $this->model_menu_mstr->getMenuSubListByDesignationMstrId($designation_mstr_id, $value['_id']);
			$menuList[$key]['sub_menu'] = $subMenuList;
		}
	}

	public function MenuDeactivate($menu_mstr_id = null){
		if(!is_null($menu_mstr_id)){
			if($this->model_menu_mstr->menuDeactivate($menu_mstr_id)){
				if($this->model_menu_permission->menuPermissionDeactivate($menu_mstr_id)){
					flashToast('MenuList', 'Menu Deactivate Sucessfully !!!');
					redirect('MenuPermission/index');
				}
			}
		}else{
			flashToast('MenuList', 'Invalid Parameter !!!');
			redirect('MenuPermission/index');
		}
	}

	public function index(){
		$data = [];
		$menuList = $this->model_menu_mstr->getMenuList();
		if($menuList){
			$data['menuList'] = $menuList;
			foreach ($data['menuList'] as $key => $value) {
				$list = $this->model_menu_permission->joinGetDesignationListByMenuMstrId($value['_id']);
				if($list){
					$data['menuList'][$key]['designationNameList'] = $list;
					
				}
			}
		}
		$this->view('pages/MenuList', $data);
	}

	public function MenuAddEdit($ID = null){
		$data = [];
		$designationMstrList = $this->model_designation_mstr->getDesignationMstrList();
		$underMenuNameList = $this->model_menu_mstr->getUnderMenuNameList();
		if(isPost()){
			$data = postData();
			//print_r($data);
			if($data['menu_mstr_id']==""){
				// insert
				if($this->model_menu_mstr->checkAddMenuIsExist($data)){
					flashToast('MenuAddEdit', 'Data Already Exist !!');
					$data['designationMstrList'] = $designationMstrList;
					if($underMenuNameList){
						$data['underMenuNameList'] = $underMenuNameList;
					}
					foreach ($data['designationMstrList'] as $key=>$designationMstrList) {
						$data['designationMstrList'][$key]['isChecked'] = false;
						foreach ($data['designation_mstr_id'] as $value) {
							if($designationMstrList['_id']==$value){
								$data['designationMstrList'][$key]['isChecked'] = true;
							}
						}
					}
					$this->view('pages/MenuAddEdit', $data);
				}else{
					if($menu_mstr_id = $this->model_menu_mstr->addMenu($data)){
						$len = sizeof($data['designation_mstr_id']);
						for ($i = 0; $i<$len; $i++) {
							$designation_mstr_id = $data['designation_mstr_id'][$i];
							$this->model_menu_permission->addMenuPermission($menu_mstr_id, $designation_mstr_id);
						}
						$this->model_menu_permission->addMenuPermission($menu_mstr_id, 0);
						flashToast('MenuList', 'Insert Sucessfully !!!');
						redirect('MenuPermission/index');
					}
				}
			}else{
				// update
				if($this->model_menu_mstr->checkEditMenuIsExist($data)){
					flashToast('MenuAddEdit', 'Data Already Exist !!');
					$data['designationMstrList'] = $designationMstrList;
					if($underMenuNameList){
						$data['underMenuNameList'] = $underMenuNameList;
					}
					foreach ($data['designationMstrList'] as $key=>$designationMstrList) {
						$data['designationMstrList'][$key]['isChecked'] = false;
						foreach ($data['designation_mstr_id'] as $value) {
							if($designationMstrList['_id']==$value){
								$data['designationMstrList'][$key]['isChecked'] = true;
							}
						}
					}
					$this->view('pages/MenuAddEdit', $data);
				}else{
					if($this->model_menu_mstr->updateMenu($data)){
						$menu_mstr_id = $data['menu_mstr_id'];
						$len = sizeof($data['designation_mstr_id']);
						for ($i = 0; $i<$len; $i++) {
							$designation_mstr_id = $data['designation_mstr_id'][$i];
							if($ID = $this->model_menu_permission->checkMenuPerIsExist($menu_mstr_id, $designation_mstr_id)){
								$this->model_menu_permission->updateMenuPermission($menu_mstr_id, $designation_mstr_id);
							}else{
								$this->model_menu_permission->addMenuPermission($menu_mstr_id, $designation_mstr_id);
							}
							
						}
						$dbDesignationMstrList = [];
						foreach ($designationMstrList as $key => $value) {
							$dbDesignationMstrList[$key] = $value['_id'];
						}
						$diffDesignationMstrList = array_diff($dbDesignationMstrList, $data['designation_mstr_id']);
						foreach ($diffDesignationMstrList as $designation_mstr_id) {
							$this->model_menu_permission->deactivateMenuPermission($menu_mstr_id, $designation_mstr_id);
						}

						flashToast('MenuList', 'Update Sucessfully !!!');
						redirect('MenuPermission/index');

					}
				}
			}			
		}else if($ID != null){
			$data = $this->model_menu_mstr->getDetailsById($ID);
			$data['designationMstrList'] = $designationMstrList;
			$menuPermissionList = $this->model_menu_permission->getMenuPermissionListByMenuMstrId($ID);
			if($menuPermissionList){
				$data['menuPermissionList'] = $menuPermissionList;
				foreach ($data['designationMstrList'] as $key=>$designationMstrList) {
					$data['designationMstrList'][$key]['isChecked'] = false;
					foreach ($data['menuPermissionList'] as $value) {
						if($designationMstrList['_id']==$value['designation_mstr_id']){
							$data['designationMstrList'][$key]['isChecked'] = true;
						}
					}
				}
				
			}
			if($underMenuNameList){
				$data['underMenuNameList'] = $underMenuNameList;
			}
			$this->view('pages/MenuAddEdit', $data);
		}else{
			$data['designationMstrList'] = $designationMstrList;
			if($underMenuNameList){
				$data['underMenuNameList'] = $underMenuNameList;
			}
			$this->view('pages/MenuAddEdit', $data);
		}
	}

}