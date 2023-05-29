<?php
class model_menu_mstr
{
    private $db;
    private $tbl_name = "tbl_menu_mstr";
    public function __construct(){
         $this->db = new dataBase();
    }

    public function menuDeactivate($menu_mstr_id){
        return $this->db->table($this->tbl_name)
                    ->where('_id', '=', $menu_mstr_id)
                    ->update(["_status"=>0]);
    }

    public function getMenuMstrListByDesignationMstrId($designation_mstr_id){
        $sql = "SELECT _id, menu_name FROM tbl_menu_mstr WHERE _id IN (SELECT menu_mstr_id FROM tbl_menu_permission WHERE designation_mstr_id=:designation_mstr_id AND _status=1) AND under_menu_mstr_id=0 AND _status=1 ORDER BY menu_name ASC";
        $this->db->query($sql);
        $this->db->bind("designation_mstr_id", $designation_mstr_id);
        $result = $this->db->resultset();
        if($result){
            return json_decode(json_encode($result), true);
        }else{
            return false;
        }
    }



    public function getMenuSubListByDesignationMstrId($designation_mstr_id, $under_menu_mstr_id){
        $sql = "SELECT _id, menu_name, menu_path FROM tbl_menu_mstr WHERE _id IN (SELECT menu_mstr_id FROM tbl_menu_permission WHERE designation_mstr_id=:designation_mstr_id AND _status=1) AND under_menu_mstr_id!=0 AND under_menu_mstr_id=:under_menu_mstr_id AND _status=1 ORDER BY menu_name ASC";
        $this->db->query($sql);
        $this->db->bind("designation_mstr_id", $designation_mstr_id);
        $this->db->bind("under_menu_mstr_id", $under_menu_mstr_id);
        $result = $this->db->resultset();
        if($result){
            return json_decode(json_encode($result), true);
        }else{
            return false;
        }

    }

    public function checkAddMenuIsExist($data){
        return $this->db->table($this->tbl_name)
                    ->select("_id")
                    ->where('menu_name', '=', $data['menu_name'])
                    ->where('under_menu_mstr_id', '=', $data['under_menu_mstr_id'])
                    ->where('_status', '=', 1)
                    ->first();
    }

    public function checkEditMenuIsExist($data){
        return $this->db->table($this->tbl_name)
                    ->select("_id")
                    ->where('_id', '!=', $data['menu_mstr_id'])
                    ->where('menu_name', '=', $data['menu_name'])
                    ->where('under_menu_mstr_id', '=', $data['under_menu_mstr_id'])
                    ->where('_status', '=', 1)
                    ->first();
    }

    public function getMenuList(){
        return $this->db->table($this->tbl_name)
                    ->select("_id, menu_name, menu_path, under_menu_mstr_id")
                    ->where('_status', '=', 1)
                    ->orderBy('menu_path, menu_name', 'ASC')
                    ->get();
    }
    public function getDetailsById($ID){
    	return $this->db->table($this->tbl_name)
                    ->select("_id AS menu_mstr_id, menu_name, CASE WHEN menu_path='#' THEN '' ELSE menu_path  END AS menu_path, under_menu_mstr_id")
                    ->where('_id', '=', $ID)
                    ->where('_status', '=', 1)
                    ->first();
    }
    public function getUnderMenuNameList(){
    	return $this->db->table($this->tbl_name)
                    ->select('_id, menu_name')
                    ->where('menu_path', '=', '#')
                    ->where('under_menu_mstr_id', '=', '0')
                    ->where('_status', '=', 1)
                    ->orderBy('menu_name', 'ASC')
                    ->get();
    }

    public function addMenu($data){
    	return $this->db->table($this->tbl_name)
                    ->insertGetId([
                    	"menu_name"=>$data['menu_name'],
                    	"menu_path"=>($data['under_menu_mstr_id']==0)?"#":$data['menu_path'],
                    	"under_menu_mstr_id"=>$data['under_menu_mstr_id'],
                    	"_status"=>1
                    ]);
    }
    public function updateMenu($data){
    	return $this->db->table($this->tbl_name)
    				->where('_id', '=', $data['menu_mstr_id'])
                    ->update([
                    	"menu_name"=>$data['menu_name'],
                    	"menu_path"=>($data['under_menu_mstr_id']==0)?"#":$data['menu_path'],
                    	"under_menu_mstr_id"=>$data['under_menu_mstr_id'],
                    	"_status"=>1
                    ]);
    }

}