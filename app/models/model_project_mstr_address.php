<?php
class model_project_mstr_address
{
    private $db;
    private $tbl_name ="tbl_project_mstr_address";
    public function __construct()
    {
        $this->db = new dataBase();
    }

    public function getProjectAddByProjectMstrId($project_mstr_id){
        return $this->db->table('tbl_project_mstr_address')
                  ->join('tbl_state_dist_city', 'tbl_state_dist_city._id', '=', 'tbl_project_mstr_address.state_dist_city_id')
                  ->select('tbl_project_mstr_address._id, tbl_state_dist_city.state, tbl_state_dist_city.dist, tbl_state_dist_city.city')
                  ->where('tbl_project_mstr_address.project_mstr_id', '=', $project_mstr_id)
                  ->where('tbl_project_mstr_address._status', '=', 1)
                  ->get();
    }
}