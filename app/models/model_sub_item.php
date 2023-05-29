<?php 
class model_sub_item
{
    private $db;
    private $tbl_name = "tbl_sub_item_name_mstr";
    public function __construct()
    {
        $this->db = new Database();

    }
    public function sub_item_add_update($data)
    {
        $result = $this->db->table($this->tbl_name)->
            insert([
                "item_name_id"=>$data["item_name_id"],
                "sub_item_name"=>$data["sub_item_name"],
                "selling_rate"=>$data["selling_rate"],
                "cgst_tax"=>$data["cgst_tax"],
                "sgst_tax"=>$data["sgst_tax"],
                "igst_tax"=>$data["igst_tax"]
            ]);
        return $result;
    }
    public function update_sub_item($data)
    {
        $result = $this->db->table($this->tbl_name)->
            where("_id", "=", $data['_id'])->
            update([
                        "item_name_id"=>$data["item_name_id"],
                        "selling_rate"=>$data["selling_rate"],
                        "sub_item_name"=>$data["sub_item_name"],
                        "cgst_tax"=>$data["cgst_tax"],
                        "sgst_tax"=>$data["sgst_tax"],
                        "igst_tax"=>$data["igst_tax"]
            ]);
        return $result;
    }
    public function duplicateFun($data)
    {
        try
        {
            $sql = "select item_name_id,sub_item_name from tbl_sub_item_name_mstr 
                where item_name_id =:item_name_id AND sub_item_name =:sub_item_name AND _status=1";
            $this->db->query($sql);
            $this->db->bind('item_name_id',$data['item_name_id']);
            $this->db->bind('sub_item_name',$data['sub_item_name']);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }    
    public function sub_itemList()
    {
        try{
            $sql="select 
                    sub_item._id,
                    sub_item.item_name_id,
                    sub_item.sub_item_name,
                    sub_item.selling_rate,
                    sub_item.cgst_tax,
                    sub_item.sgst_tax,
                    sub_item.igst_tax,
                    item.item_name
                    from tbl_sub_item_name_mstr sub_item
                    join tbl_item_name_mstr item on (item._id = sub_item.item_name_id)
				    where sub_item._status=1 order by sub_item._id desc";
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
            $sql = "select item_name_id,sub_item_name from tbl_sub_item_name_mstr
                where item_name_id =:item_name_id AND sub_item_name =:sub_item_name AND _id!=:id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('item_name_id',$data['item_name_id']);
            $this->db->bind('sub_item_name',$data['sub_item_name']);
            $this->db->bind('id',$data['_id']);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function gateSubItemById($id)
    {
        try{
            $sql="select 
                    sub_item._id,
                    sub_item.item_name_id,
                    sub_item.sub_item_name,
                    sub_item.selling_rate,
                    sub_item.cgst_tax,
                    sub_item.sgst_tax,
                    sub_item.igst_tax,
                    item.item_name
                    from tbl_sub_item_name_mstr sub_item
                    join tbl_item_name_mstr item on (item._id = sub_item.item_name_id)
                    where sub_item._status=1 AND sub_item._id=:id";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $result = $this->db->single();
            return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function Delete_subitem($id)
    {
        $result = $this->db->table($this->tbl_name)->
            where("_id", "=", $id)->
            update([
                "_status"=>0
            ]);
        return $result;

    }
     //Gate Item Name
    public function gateItemName()
    {
        try{
                $sql="select _id,item_name from tbl_item_name_mstr
                        where _status=1";
                $this->db->query($sql);
                $result = $this->db->resultset();
                return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}


?>