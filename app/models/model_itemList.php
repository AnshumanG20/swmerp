<?php 
class model_itemList
{
    private $db;
    private $tbl_name = "tbl_item_name_mstr";
    public function __construct()
    {
        $this->db = new Database();

    }
    public function item_add_update($data)
    {
        $result = $this->db->table($this->tbl_name)->
            insert([
                "asset_type"=>$data["asset_type"],
                "item_name"=>$data["item_name"]
            ]);
        return $result;
    }
    public function update_item($data)
    {
        $result = $this->db->table($this->tbl_name)->
            where("_id", "=", $data['_id'])->
            update([
                 "asset_type"=>$data["asset_type"],
                "item_name"=>$data["item_name"]
            ]);
        return $result;
    }
    public function duplicateFun($data)
    {
        try
        {
            $sql = "select item_name,asset_type from tbl_item_name_mstr 
                where item_name =:item_name AND asset_type =:asset_type AND _status=1";
            $this->db->query($sql);
            $this->db->bind('item_name',$data['item_name']);
            $this->db->bind('asset_type',$data['asset_type']);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }    
    public function itemList()
    {
        try{
            $sql="select * from tbl_item_name_mstr
				    where _status=1 order by _id desc";
            $this->db->query($sql);
            $result = $this->db->resultset();
            return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function duplicateFunUpdate($data)
    {
        try
        {
            $sql = "select item_name,asset_type from tbl_item_name_mstr
                where item_name =:item_name AND asset_type =:asset_type AND _id!=:id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('item_name',$data['item_name']);
            $this->db->bind('asset_type',$data['asset_type']);
            $this->db->bind('id',$data['_id']);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function gateItemById($id)
    {
        try{
            $sql="select * from tbl_item_name_mstr
				    where _status=1 AND _id=:id";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $result = $this->db->single();
            return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function DeleteByIdItem($id)
    {
        $result = $this->db->table($this->tbl_name)->
            where("_id", "=", $id)->
            update([
                "_status"=>0
            ]);
        return $result;

    }
}


?>