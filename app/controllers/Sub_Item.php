<?php 
class Sub_Item extends Controller
{
    public function __construct()
    {
        if(!isLoggedIn()){ redirect('Login'); }
        $this->model_sub_item = $this->model('model_sub_item');
        $this->Validate_Item = $this->validator('Validate_Item');
    }
    
   public function sub_item_add_update($id=null)
    {
        $data =(array)null;
        //Gate Item Name
       $gateItemName = $this->model_sub_item->gateItemName();
       $gateItemName = json_decode(json_encode($gateItemName),true);
       $data['itemlist'] = $gateItemName;
        if(isPost())
        {
            $data = postData();
            //print_r($data);
            if($data['_id']=="") // insert
            {
                $errMsg = $this->Validate_Item->validate_sub_item($data);
                if(empty($errMsg))
                {
                    $duplicateFun = $this->model_sub_item->duplicateFun($data);
                    $duplicateFun = json_decode(json_encode($duplicateFun),true);
                    if($duplicateFun)
                    {
                        $data['itemlist'] = $gateItemName;

                        flashToast("subItemExist","Sub Item Exists");
                        $this->view('pages/sub_item_add_update',$data);
                    }
                    else
                    {

                        $result = $this->model_sub_item->sub_item_add_update($data);
                        if($result)
                        {   
                            flashToast("subItemAddSuccess","Sub Item Added Successfully!!");
                            echo "<script>window.location.href = '".URLROOT."/Sub_Item/sub_itemList';</script>";
                        }
                        else
                        {
                            $data['itemlist'] = $gateItemName;
                            flashToast("subItemAddError","Failed To Add Sub Item!!");
                            $this->view('pages/sub_item_add_update',$data);

                        }
                    }

                }
                else
                {
                    $this->view('pages/sub_item_add_update',$errMsg,$data);
                }
            }
            else //update
            {
                $duplicateFunUpdate = $this->model_sub_item->duplicateFunUpdate($data);
                $duplicateFunUpdate = json_decode(json_encode($duplicateFunUpdate),true);
                if($duplicateFunUpdate)
                {
                    $data['itemlist'] = $gateItemName;
                    flashToast("subItemExist","Sub Item Exists!!");
                    $this->view('pages/sub_item_add_update',$data);
                }
                else
                {
                    $result = $this->model_sub_item->update_sub_item($data);
                    if($result)
                    {
                        flashToast("subItemUpdateSuccess","SubItem Updated Successfully!!");
                        echo "<script>window.location.href = '".URLROOT."/Sub_Item/sub_itemList';</script>";
                    }
                    else
                    {
                        flashToast("subItemUpdateError","Updated Failed!!");
                        $this->view('pages/sub_item_add_update',$data);
                    }
                }

            }
        }
        else if(isset($id))
        {
            $result = $this->model_sub_item->gateSubItemById($id);
            $data = json_decode(json_encode($result),true);
            $data['itemlist'] = $gateItemName;
            $this->view('pages/sub_item_add_update',$data);
        }
        else
        {
            $data['itemlist'] = $gateItemName;
            $this->view('pages/sub_item_add_update',$data);
        }

    }
    public function sub_itemList()
    {
        $result = $this->model_sub_item->sub_itemList();
        $result = json_decode(json_encode($result),true);
        $data["itemlist"] = $result;
        //  print_r($result);
        $this->view('pages/sub_itemList',$data);
    }
    public function Delete_subitem($id)
    {
        $result = $this->model_sub_item->Delete_subitem($id);
        if($result)
        {

          flashToast("subItemDeletedSuccess","Subitem Deleted Successfully!!");
          echo "<script>window.location.href = '".URLROOT."/Sub_Item/sub_itemList';</script>";
        }
        else
        {
            flashToast("subItemDeletedError","Sub Item Not Deleted!!");
            echo "<script>window.location.href = '".URLROOT."/Sub_Item/sub_itemList';</script>";

        }
    }
}
?>