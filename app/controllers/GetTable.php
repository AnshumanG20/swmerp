
<?php 

class GetTable{
    private $db;
    private $tbl_name = "tbl_job_post_detail";

    public function __construct(){
      $this->db = new Database;


      
    }

    public function index(){
      
      redirect('GetTable/getAllDataFromTable/tbl_emp_details');
    }
    
    public function getAllDataFromTable($tbl_name, $limit=null){
        
          if($limit ==''){
            $limit =25;
          }else{
            $limit=$limit;
          }
          $sql = "SELECT column_name FROM information_schema.columns 
                      WHERE table_name = '$tbl_name' order by ordinal_position";
           $this->db->query($sql);
           $result = $this->db->resultSet();

           $data = json_decode(json_encode($result),true);
          //  echo '<pre>';print_r($data);return;

          $sqltbl = "SELECT table_name FROM information_schema.tables order by table_name desc";
           $this->db->query($sqltbl);
           $result = $this->db->resultSet();

           $datatbl = json_decode(json_encode($result),true);
           
          // echo '<pre>';print_r($datatbl);
          // return;

          $sql2 = "SELECT * FROM $tbl_name order by _id desc limit $limit";
           $this->db->query($sql2);
           $result2 = $this->db->resultSet();
           $data2 = json_decode(json_encode($result2),true);
          //  echo '<pre>';print_r($data2);return;
          echo '<html>
                  <head>

                  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                 
                  </head>
                  <body style="margin:20px;">
                  <div style="margin:2px;background:#9c988f;">
                    <input type="text" name="tid" id="tid" placeholder="Input _Id to Delete" style="color:red;" required autocomplete="off">
                    <input type="hidden" name="tbl_name" id="tbl_name" value="'.$tbl_name.'">
                    
                    <button type="submit" onclick="return deleteOneDataFromTable()" class="btn-danger" >Delete</button>
                  
                  <div">
                    <select id="select_tbl_name" name="select_tbl_name" onchange="getAllDataFromTable()"><option>Select Table</option>';
                    foreach($datatbl as $tblnm){
                      echo '<option value="'.$tblnm['table_name'].'" >'.$tblnm['table_name'].'</option>';
                    }
                      
                      
                  echo 
                    '</select>
                    <select name="select_row_limit" id="select_row_limit" onchange="getAllDataFromTableLimit()">
                      <option value="">SELECT LIMIT</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                      <option value="all">All</option>
                    </select>

                    <input type="text" name="tids" id="tids" placeholder="Input _Id to Search" style="color:green;margin-left:50px;" required autocomplete="off" >
                    <button type="submit" onclick="return getOneDataFromTable()" class="btn-danger" >SEARCH ONE</button>
                    </div>
                    <div style="margin:2px;background:#9c988f;">
                    <input type="text" name="col_name" id="col_name" placeholder="Enter Column name" style="color:green;margin:20px;" required autocomplete="on" >
                    <input type="number" name="col_val" id="col_val" placeholder="Value" style="color:green;" min="0" required autocomplete="off">
                    <input type="number" name="col_id" id="col_id" placeholder="_id" style="color:green;" min="0" required autocomplete="off">
                    <button type="submit" onclick="return updateOneDataInTable()" class="btn-danger" >Update</button>
                    </div>
                  <table class="table table-striped table-hover table-responsive-sm" style="font-size:12px;">
                  
                  <thead class="bg-primary text-white "><tr>';  
          $i=0;$j=0;$k=0;$keys=[];$counter=0;
          foreach($data as $val){
            echo '<th>' .'  '.$val['column_name'].'  '.'</th>';
            //  echo $val['column_name'];
            
            $keys[$k++] = $val['column_name'];
            
            
          }
           $ct = count($keys);//return;
          echo '</tr>
              </thead>
            <tbody>';
          // while($j<=count($data))
         //echo '<pre>';print_r($data); echo '</pre>';
          foreach($data2 as $vals){
             

            echo"<tr>";
            foreach($keys as $key=>$val)
            {
               echo"<td>".(empty($vals[$val])?"null":$vals[$val])."</td>";
             
            }
            echo"</tr>";
          }
          

          
           echo '</tbody></table></body></html>';
    }

    public function getOneDataFromTable($tbl_name, $id=null){
    
        if($id ==''){
          $sqlc = "SELECT * FROM $tbl_name";
        }else{
          $sqlc = "SELECT * FROM $tbl_name WHERE _id=$id";
        }
        $sql = "SELECT column_name FROM information_schema.columns 
                    WHERE table_name = '$tbl_name' order by ordinal_position";
         $this->db->query($sql);
         $result = $this->db->resultSet();

         $data = json_decode(json_encode($result),true);
        //  echo '<pre>';print_r($data);return;

        $sqltbl = "SELECT table_name FROM information_schema.tables order by table_name desc";
         $this->db->query($sqltbl);
         $result = $this->db->resultSet();

         $datatbl = json_decode(json_encode($result),true);
         
        // echo '<pre>';print_r($datatbl);
        // return;

        $sql2 = $sqlc;//"SELECT * FROM $tbl_name WHERE _id=$id";
         $this->db->query($sql2);
         $result2 = $this->db->resultSet();
         $data2 = json_decode(json_encode($result2),true);
        //  echo '<pre>';print_r($data2);return;
        echo '<html>
                <head>

                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
               
                </head>
                <body style="margin:20px;">
                 
                  <input type="text" name="tid" id="tid" placeholder="Input _Id to Delete" style="color:red;" required autocomplete="off">
                  <input type="hidden" name="tbl_name" id="tbl_name" value="'.$tbl_name.'">
                  
                  <button type="submit" onclick="return deleteOneDataFromTable()" class="btn-danger" >Delete</button>
                
                <div">
                  <select id="select_tbl_name" name="select_tbl_name" onchange="getAllDataFromTable()"><option>Select Table</option>';
                  foreach($datatbl as $tblnm){
                    echo '<option value="'.$tblnm['table_name'].'" >'.$tblnm['table_name'].'</option>';
                  }
                    
                    
                echo 
                  '</select>
                  <select name="select_row_limit" id="select_row_limit" onchange="getAllDataFromTableLimit()">
                    <option value="">SELECT LIMIT</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="all">All</option>
                  </select>

                  <input type="text" name="tids" id="tids" placeholder="Input _Id to Search" style="color:red;" required autocomplete="off">
                  <button type="submit" onclick="return getOneDataFromTable()" class="btn-danger" >SEARCH ONE</button>
                
                <table class="table table-striped table-hover table-responsive-sm">
                
                <thead class="bg-primary text-white "><tr>';  
        $i=0;$j=0;$k=0;$keys=[];$counter=0;
        foreach($data as $val){
          echo '<th>' .'  '.$val['column_name'].'  '.'</th>';
          //  echo $val['column_name'];
          
          $keys[$k++] = $val['column_name'];
          
          
        }
         $ct = count($keys);//return;
        echo '</tr>
            </thead>
          <tbody>';
        // while($j<=count($data))
       //echo '<pre>';print_r($data); echo '</pre>';
        foreach($data2 as $vals){
           

          echo"<tr>";
          foreach($keys as $key=>$val)
          {
             echo"<td>".(empty($vals[$val])?"null":$vals[$val])."</td>";
           
          }
          echo"</tr>";
        }
        

        
         echo '</tbody></table></body></html>';
  }

    public function deleteOneDataFromTable($tbl_name,$id){
        
        $sql = "DELETE FROM $tbl_name WHERE _id=$id";
        $this->db->query($sql);
        $res = $this->db->deletion();

        if($res){
          echo " Data of ".$id." Deleted successfully";
          redirect('GetTable/getAllDataFromTable/'.$tbl_name);
          // $this->getAllDataFromTable($tbl_name);
        }else{
          echo "Data could not be deleted!";
        }
    }


    public function updateOneDataInTable($tbl_name,$col_name,$col_val,$id){
        
      $sql = "update $tbl_name set $col_name = $col_val where _id=$id";
      // var_dump($sql);return;
      $this->db->query($sql);
      $res = $this->db->updation();

      if($res){
        echo "<script>alert('Data updated successfully');</script>";
        redirect('GetTable/getAllDataFromTable/'.$tbl_name);
        // $this->getAllDataFromTable($tbl_name);
      }else{
        echo "<script>alert('Couldn't update Data');</script>";
        redirect('GetTable/getAllDataFromTable/'.$tbl_name);
      }
  }

}




?>
<script>
  function deleteOneDataFromTable(){
    // debugger;
    var tbl_name = document.getElementById('tbl_name').value;
    
    var tid= document.getElementById('tid').value;
    if(tid ==''){

    }else{
      console.log(tbl_name);console.log(tid);
      var conf =  confirm('Are you sure?\nIt will Permanently Delete This Data !  ');
      if(conf){
        location.replace("<?=URLROOT ?>/GetTable/deleteOneDataFromTable/"+tbl_name+"/"+tid)
      //  alert('+"/GetTable/deleteOneDataFromTable/"+tbl_name+"/"+tid');
      }
  }
  }
</script>
<script>
  function getAllDataFromTable(){
    // debugger;
    var tbl_name = document.getElementById('select_tbl_name').value;
    var limit = document.getElementById('select_row_limit').value;
    // var tid= document.getElementById('tid').value;
      console.log(tbl_name);console.log(tid);
    
        location.replace("<?=URLROOT ?>/GetTable/getAllDataFromTable/"+tbl_name+"/"+limit);
      //  alert('+"/GetTable/deleteOneDataFromTable/"+tbl_name+"/"+tid');
    

  }
</script>
<script>
  function getAllDataFromTableLimit(){
    // debugger;
    var tbl_name = document.getElementById('tbl_name').value;
    var limit = document.getElementById('select_row_limit').value;
    // var tid= document.getElementById('tid').value;
      console.log(tbl_name);console.log(tid);
    
        location.replace("<?=URLROOT ?>/GetTable/getAllDataFromTable/"+tbl_name+"/"+limit);
      //  alert('+"/GetTable/deleteOneDataFromTable/"+tbl_name+"/"+tid');
    
      
  }
</script>
<script>
  function getOneDataFromTable(){
    // debugger;
    var tbl_name = document.getElementById('tbl_name').value;
    var id = document.getElementById('tids').value;
    // var tid= document.getElementById('tid').value;
      console.log(tbl_name);console.log(tid);
    
        location.replace("<?=URLROOT ?>/GetTable/getOneDataFromTable/"+tbl_name+"/"+id);
      //  alert('+"/GetTable/deleteOneDataFromTable/"+tbl_name+"/"+tid');
    

  }
</script>

<script>
  function updateOneDataInTable(){
    // debugger;
    var tbl_name = document.getElementById('tbl_name').value;
    var col_name = document.getElementById('col_name').value;
    var col_val = document.getElementById('col_val').value;
    var col_id = document.getElementById('col_id').value;
    // var tid= document.getElementById('tid').value;
      console.log(tbl_name);console.log(col_name);
      console.log(tbl_name);console.log(col_val);
    
        location.replace("<?=URLROOT ?>/GetTable/updateOneDataInTable/"+tbl_name+"/"+col_name+"/"+col_val+"/"+col_id);
      //  alert('+"/GetTable/deleteOneDataFromTable/"+tbl_name+"/"+tid');
    

  }
</script>