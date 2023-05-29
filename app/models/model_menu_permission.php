<?php
class model_menu_permission
{
    private $db;
    private $tbl_name = "tbl_menu_permission";
    public function __construct(){
         $this->db = new dataBase();
    }

    public function joinGetDesignationListByMenuMstrId($menu_mstr_id){
    	return $this->db->table('tbl_menu_permission')
    				->join('tbl_designation_mstr', 'tbl_designation_mstr._id', '=', 'tbl_menu_permission.designation_mstr_id')
                    ->select('tbl_designation_mstr.designation_name')
                    ->where('tbl_menu_permission.menu_mstr_id', '=', $menu_mstr_id)
                    ->where('tbl_menu_permission._status', '=', 1)
                    ->get();
    }

    public function menuPermissionDeactivate($menu_mstr_id){
        return $this->db->table($this->tbl_name)
                    ->where('menu_mstr_id', '=', $menu_mstr_id)
                    ->update(["_status"=>0]);
    }

    public function getMenuPermissionListByMenuMstrId($menu_mstr_id){
    	return $this->db->table($this->tbl_name)
                    ->select('designation_mstr_id')
                    ->where('menu_mstr_id', '=', $menu_mstr_id)
                    ->where('_status', '=', 1)
                    ->get();
    }
    public function getMenu_mstr_id($path){
    	return $this->db->table('tbl_menu_mstr')
                    ->select('_id')
                    ->where('menu_path', '=', $path)
                    ->where('_status', '=', 1)
                    ->first();
    }

    public function checkMenuPerIsExist($menu_mstr_id, $designation_mstr_id){
    	return $this->db->table($this->tbl_name)
                    ->select('_id')
                    ->where('menu_mstr_id', '=', $menu_mstr_id)
                    ->where('designation_mstr_id', '=', $designation_mstr_id)
                    ->first();
    }

    public function addMenuPermission($menu_mstr_id, $designation_mstr_id){
    	return $this->db->table($this->tbl_name)
                    ->insert([
                    	"menu_mstr_id"=>$menu_mstr_id,
                    	"designation_mstr_id"=>$designation_mstr_id,
                    	"_status"=>1
                    ]);
    }

    public function updateMenuPermission($menu_mstr_id, $designation_mstr_id){
    	return $this->db->table($this->tbl_name)
    				->where('menu_mstr_id', '=', $menu_mstr_id)
                    ->where('designation_mstr_id', '=', $designation_mstr_id)
                    ->update(["_status"=>1]);
    }

    public function deactivateMenuPermission($menu_mstr_id, $designation_mstr_id){
    	return $this->db->table($this->tbl_name)
    				->where('menu_mstr_id', '=', $menu_mstr_id)
                    ->where('designation_mstr_id', '=', $designation_mstr_id)
                    ->update(["_status"=>0]);
    }
}