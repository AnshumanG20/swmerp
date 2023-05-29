<?php 
class ItemList extends Controller
{
    public function __construct()
    {
        if(!isLoggedIn()){ redirect('Login'); }
        $this->model_itemList = $this->model('model_itemList');
        $this->Validate_Item = $this->validator('Validate_Item');
    }
   public function item_add_update($id=null)
    {
        $data =(array)null;
        if(isPost())
        {
            $data = postData();
            //print_r($data);
            if($data['_id']=="") // insert
            {
                $errMsg = $this->Validate_Item->validate_item($data);
                if(empty($errMsg))
                {
                    $duplicateFun = $this->model_itemList->duplicateFun($data);
                    $duplicateFun = json_decode(json_encode($duplicateFun),true);
                    if($duplicateFun)
                    {
                        echo "<script>alert('Item Already Exists');</script>";
                        $this->view('pages/item_add_update',$data);
                    }
                    else
                    {

                        $result = $this->model_itemList->item_add_update($data);
                        if($result)
                        {
                            flashToast("itemAddSuccess","Item Added Successfully");
                            echo "<script>window.location.href = '".URLROOT."/ItemList/itemList';</script>";
                        }
                        else
                        {
                            flashToast("itemAddError","Fail To Add Item!!");
                            $this->view('pages/item_add_update',$data);

                        }
                    }

                }
                else
                {
                    $this->view('pages/item_add_update',$errMsg);
                }
            }
            else //update
            {
                $duplicateFunUpdate = $this->model_itemList->duplicateFunUpdate($data);
                $duplicateFunUpdate = json_decode(json_encode($duplicateFunUpdate),true);
                if($duplicateFunUpdate)
                {
                    echo "<script>alert('Item Already Exists');</script>";
                    $this->view('pages/item_add_update',$data);
                }
                else
                {
                    $result = $this->model_itemList->update_item($data);
                    if($result)
                    {
                        flashToast("itemUpdateSuccess","Item updated Successfully");
                        echo "<script>window.location.href = '".URLROOT."/ItemList/itemList';</script>";
                    }
                    else
                    {
                        // echo "<script>alert('Fail To Update Item!!');</script>";
                        flashToast("itemUpdateError","Update Failed");
                        $this->view('pages/item_add_update',$data);
                    }
                }

            }
        }
        else if(isset($id))
        {
            $result = $this->model_itemList->gateItemById($id);
            $data = json_decode(json_encode($result),true);
            $this->view('pages/item_add_update',$data);
        }
        else
        {
            $this->view('pages/item_add_update',$data);
        }

    }
    public function itemList()
    {
        $result = $this->model_itemList->itemList();
        $result = json_decode(json_encode($result),true);
        $data["itemlist"] = $result;
        //  print_r($result);
        $this->view('pages/itemList',$data);
    }
    public function DeleteByIdItem($id)
    {
        $result = $this->model_itemList->DeleteByIdItem($id);
        if($result)
        {
            flashToast("itemDeleteSuccess","Item Deleted Successfully");
            echo "<script> window.location.href = '".URLROOT."/ItemList/itemList';</script>";
        }
        else
        {
            flashToast("itemDeleteError","Item Not Deleted");
            echo "<script> window.location.href = '".URLROOT."/ItemList/itemList';</script>";

        }
    }
}
?>