<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<style>
    .error{
        color: red;
    }
    .logo {
      animation: flicker 5s;
      /*text-align:left;*/
      /*margin-top:3em;*/
      font-family:'times new roman';
      color: #fff;
      /*margin-left: 10%;*/
      font-size:1.5em;
      border-radius: 5px;
    }

    @keyframes flicker
    {
        0% {opacity:0;margin-left: 0px;}
        9% {opacity:0;}
        10% {opacity:.5;}
        13% {opacity:0;}
        20% {opacity:.5;margin-left: 0px;}
        25% {opacity:1;}
        50% {opacity:1;margin-left: 500px;}
        55% {opacity:1;margin-left: 500px;}
        75% {opacity:1;margin-left: 500px;background: green;}
        100% {opacity:1;margin-left: 500px;}
    }
</style>
<!--DataTables [ OPTIONAL ]-->
<link href="<?=URLROOT;?>/common/assets/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/responsive.bootstrap.min.css" rel="stylesheet">
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <!--<h1 class="page-header text-overflow">Document List</h1>//-->
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="#">Received Task</a></li>
            <li class="active">Received Task List</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>

<?php //echo '<pre>'; print_r($data); ?>
    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">

        <div class="row">

            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h2 class="panel-title text-success" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 35px;">WORKGROUND <span style="font-size:16px; color:#336699;font-family:arial;">(Add Your Daily Progress) </span> <?php //echo $_SESSION['emp_details']['first_name']; ?></h2>
                        <!-- <div class="logo" style="height: 50;width:250px;background: #1ec7e6;">
                            <span style="margin-bottom: 50px;">Let's see what we did today</span> 
                        </div> -->
                        <h5 class="panel-title" style="font-family: roboto; font-size: 20px;"></h5>
                        <?php 
                        // if(empty($data['subtaskList']))
                        // {
                            // print_r($data['subtaskList']);
                            if(isset($data['receive_reject_status']) && $data['receive_reject_status']['receive_reject_status'] <3 && $data['receive_reject_status']['assign_by_user_mstr_id'] != $_SESSION['emp_details']['_id'])
                            { 
                                echo '<button class="btn btn-primary" style="float: right; margin-right: 20px;" data-toggle="modal" data-target="#demo-default-modal" id="">Add Today\'s Progress</button>';
                            }
                            else
                            {
                                echo "";
                            }
                         if(isset($data['subtaskList'][0]['receive_reject_status']) && $data['subtaskList'][0]['receive_reject_status'] <3 && $data['subtaskList'][0]['assign_by_user_mstr_id'] != $_SESSION['emp_details']['_id']){
                            echo '<button class="btn btn-primary" style="float: right; margin-right: 20px;" data-toggle="modal" data-target="#demo-default-modal" id="">Add Today\'s Progress</button>';
                        } ?>
                        <br>
                                    

                    </div>

                    <div class="panel-body">
                        <div class="pad-btm">
                            <div class ="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <a href="<?= URLROOT ?>/Task_Assign/recieve_task_list" class="btn btn-purple" style="float: left; "><i class="fa fa-arrow-left"></i> BackToList</a>
                                        <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Task_Assign/search_recieve_task_list">

                                            <div class="form-group col-sm-3">
                                                <!-- <label class="col-sm-12" for="status">Status</label> -->
                                                <select id="receive_reject_status" name="receive_reject_status" class="form-control" disabled>
                                                    <option value="<?= $data['sid']; ?>"><?= $data['sid']; ?>
                                                    </option>
                                                   
                                                    
                                                </select>
                                            </div>

                                           <!--  <div class="form-group col-sm-3">
                                                <label class="col-sm-12" for="btnsearch">&nbsp;</label>
                                                <button class="btn btn-success btn-block" id="btnsearch" name="btnsearch" type="submit">Search</button>
                                            </div> -->
                                        </form>
                                    </div>
                                </div>

                                

                            </div>
                            <div class="row">
                                 <div class="col-sm-12">
                                   
                                <!-- <div class="col-md-5 bg-success" style="padding-left: 20px; ;margin-top:10px; box-shadow: 2px 2px #888888; border-radius: 5px; height: 200px;margin-left:10px">
                                    
                                    <h4 style="text-transform: uppercase;">Introduction of new feautre<span style="float:right; font-size: 15px;color:#eb4034;"><i class="fa fa-pencil text-primary"></i><i class="fa fa-trash"></i>&nbsp;</span></h4>
                                    <p style="float:right; font-size: 15px;">This is a dummy description of the task that i completed. Tomorrow we will need

                                    This is a dummy description of the task that i completed. Tomorrow we will needtask that i completed. Tomorrow we will</p>

                                        <h5 class="text-primary" style="float: right;">21-03-2022</h5>
                                </div> -->
                                <?php 
                                    if(isset($data['subtaskList'])){
                                        $i=1;
                                        // if(!empty($data['subtaskList'])){
                                        foreach($data['subtaskList'] as $val){
                                            // echo '<pre>';print_r($val);
                                            // if($j%2 !=0){
                                 ?>
                                <div class="col-md-4" style="height: 200px;margin-top: 80px;">
                                    
                                    <div class="panel panel-bordered <?= ($i%2 == 0)?"panel-mint":"panel-dark"; ?> panel-mint">
                                        <div class="panel-heading">

                                            <h3 class="panel-title text-bold" style="text-decoration:<?php echo ($val['status'] == 0)? "line-through":"none"; ?> ;">
                                                <?= $val['subtask_title']; ?>
                                                <span style="float:right; font-size: 15px;color:#eb4034;">
                                                    <?php if($val['receive_reject_status'] <3 && $val['assign_by_user_mstr_id'] != $_SESSION['emp_details']['_id']){ if($val['status'] ==1) {?>
                                                    <button class="btn btn-sm btn-warning" onclick="getUpdateData(this)" value="<?= $val['id']; ?>">
                                                        <i class="fa fa-pencil text-primary" data-toggle="modal" data-target="#reject_task"> </i>
                                                        <!-- Edit button -->
                                                    </button>&nbsp;
                                                    <button onclick="deleteSubTask(this)" value="<?= $val['id']; ?>" class="btn btn-sm btn-danger" id="btn_delete">
                                                        <i class="fa fa-trash"></i>
                                                        <!-- delete button -->
                                                    </button>
                                                <?php }else{
                                                    echo "";
                                                }}else{echo "";} ?>
                                                </span>
                                            </h3><br>

                                        </div>
                                       
                                        <div class="panel-body" style="background: <?php echo ($val['status'] === 0)? "#8a8987":"#fff"; ?>; box-shadow: 0px 4px 8px;">
                                            <div class="progress progress-striped active">
                                                <div style="width: <?= $val['task_percent'] ?>%;" class="progress-bar progress-bar-success"><?= $val['task_percent'] ?>%</div>
                                            </div>
                                           
                                                <p class="text-dark" style="float:right; font-size: 15px;text-transform: lowercase;text-decoration:<?php echo ($val['status'] == 0)? "line-through":"none"; ?> ;"><?= $val['subtask_description']; ?>
                                                </p>
                                                
                                            <p class="text-primary" style="float:right;margin-top:10px;bottom: 0;font-weight: bold;"><?= date('d-M-Y h:i A',strtotime($val['created_at'])); ?>
                                            
                                        </p> 
                                            
                                        </div>
                                        
                                        
                                       
                                    </div>
                                </div>
                                
                                <?php $i++; ?>
                                    


                              <?php }}?>
                                
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="panel-body">
                        <div class="pad-btm">
                            <!-- <a href="<?php //URLROOT;?>/Task_Assign/task_assign_add_update"><button id="demo-foo-collapse" class="btn btn-purple">Assign New Task <i class="fa fa-arrow-right"></i></button></a>//-->
                        </div>

                        <!-- ............... -->

                        

                        <!-- ............... -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End page content-->
    <!--Default Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="demo-default-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="<?=URLROOT;?>/Task_Assign/workground/" id="myForm">
                    <!--Modal header-->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                        <h4 class="modal-title" id="modal-title">Add Today's Progress</h4>
                    </div>
                    <?php //echo '<pre>';print_r($data); ?>
                    <!--Modal body-->
                    <div class="modal-body">
                        <!-- <input type="hidden" id="_id" name="_id" value="_id" > -->
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="col-sm-3 control-label" for="task_name">Task Name</label>
                                <div class="col-sm-6">
                                    <input type="hidden" maxlength="50" placeholder="" id="task_name" name="subtask_id" class="form-control" value="<?= (isset($data['receive_reject_status']))?$data['receive_reject_status']['_id']:$data['subtaskList'][0]['_id']; ?>" readonly>
                                    <input type="text" maxlength="50" placeholder="<?= $data['sid']; ?>" id="task_name"  class="form-control"  readonly><br>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-3 control-label" for="task_name" >Title</label>
                                <div class="col-sm-6">
                                    <input type="text" maxlength="25" minlength="5" placeholder="Give a title for the work" id="task_name" name="subtask_title" class="form-control" value="" style="text-transform: uppercase;"><br/>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-3 control-label" for="task_name">Description</label>
                                <div class="col-sm-6">
                                    <textarea  type="text" maxlength="200" minlength="150" placeholder="Write a brief Description of the task" id="subtask_description" name="subtask_description" class="form-control" value="" rows="4" cols="50" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-3 control-label" for="task_name" > Work Done( % ) </label>
                                <div class="col-sm-6">
                                    <input type="number" min="0" max="100" step="1" placeholder="Percentage of work done" id="task_percent" name="task_percent" class="form-control" value="" style="text-transform: uppercase;" onchange="roundNumber(this)"><br/>
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>
                    <!--Modal footer-->
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button type="submit" id="btn_save" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- demo default modal end here -->
    <div class="modal fade" id="reject_task" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="<?=URLROOT;?>/Task_Assign/updateSubtask/" id="myForm2">
                    <!--Modal header-->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                        <h4 class="modal-title" id="modal-title">Add Today's Progress</h4>
                    </div>

                    <!--Modal body-->
                    <div class="modal-body">
                        <!-- <input type="hidden" id="_id" name="_id" value="_id" > -->
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="col-sm-3 control-label" for="task_name">Task Name</label>
                                <div class="col-sm-6">
                                    <input type="hidden" maxlength="50" placeholder="" id="task_name2" name="subtask_id" class="form-control" value="" readonly>
                                    <input type="hidden" maxlength="50" placeholder="" id="task_assigned_mstr_id" name="task_assigned_mstr_id" class="form-control" value="<?= $val['task_assigned_mstr_id']; ?>" readonly>
                                    <input type="text" maxlength="50" placeholder="<?= $data['sid']; ?>" id="task_name"  class="form-control"  readonly><br>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-3 control-label" for="task_name" >Title</label>
                                <div class="col-sm-6">
                                    <input type="text" maxlength="25" minlength="5" placeholder="Give a title for the work" id="subtask_title2" name="subtask_title" class="form-control" value="" style="text-transform: uppercase;"><br/>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-3 control-label" for="task_name">Description</label>
                                <div class="col-sm-6">
                                    <textarea  type="text" maxlength="200" minlength="150" placeholder="Write a brief Description of the task" id="subtask_description2" name="subtask_description" class="form-control" value="" rows="4" cols="50" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="col-sm-3 control-label" for="task_name"> Work Done( % ) </label>
                                <div class="col-sm-6">
                                    <input type="number" min="0" max="100" step="1" placeholder="Percentage of work done" id="task_percent2" name="task_percent" class="form-control" value="" style="text-transform: uppercase;" onchange="roundNumber(this)"><br/>
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>
                    <!--Modal footer-->
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button type="submit" id="btn_save" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    
    <!--===================================================-->
    <!--End Default Bootstrap Modal-->
</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>
<!--DataTables [ OPTIONAL ]-->
<script src="<?=URLROOT;?>/common/assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/jszip.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/pdfmake.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/vfs_fonts.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/buttons.html5.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
 

<script type="text/javascript">
     function modelInfo(msg)
        {
            $.niftyNoty({
                type: 'success',
                icon : 'pli-exclamation icon-2x',
                message : msg,
                container : 'floating',
                timer : 5000
            });
        }
        function modelDanger(msg)
        {
            $.niftyNoty({
                type: 'danger',
                icon : 'pli-exclamation icon-2x',
                message : msg,
                container : 'floating',
                timer : 5000
            });
        }
    $(document).ready(function() {


        $("#myForm").validate({
  // in 'rules' user have to specify all the constraints for respective fields
    rules : {
           
        subtask_title : 
        {
            required : true,
            minlength : 5,  //for length of lastname
            maxlength:25
        },
        subtask_description : 
        {
            required  : true,
            minlength : 150,
            maxlength : 200
        },
        task_percent:
        {
            required:true,
            max:100

        }
    },

});
// function modelInfo(msg)
//         {
//             $.niftyNoty({
//                 type: 'success',
//                 icon : 'pli-exclamation icon-2x',
//                 message : msg,
//                 container : 'floating',
//                 timer : 5000
//             });
//         }
        // function modelDanger(msg)
        // {
        //     $.niftyNoty({
        //         type: 'danger',
        //         icon : 'pli-exclamation icon-2x',
        //         message : msg,
        //         container : 'floating',
        //         timer : 5000
        //     });
        // }
        <?php if ($msgg = flashToast("subtaskAddSucces")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("subtaskUpdateSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("subtaskUpdateError")) { ?>
            modelDanger("<?=$msgg;?>"); 
        <?php } ?>


        // //////////////////////////////
        $('#demo_dt_basic').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 rows', '25 rows', '50 rows', 'Show all' ]
            ],
            buttons: [
                'pageLength',
                {
                    text: 'excel',
                    extend: "excel",
                    title: "Report",
                    footer: { text: '' },
                    exportOptions: { columns: [ 0,1,2,3,4,5,6,7,8,9,10] }
                }]
        });
        $("#btn_save").click(function(){
            var process = true;
            var remark = $("#remark").val();
            if(remark=="")
            {
                $("#remark").css({"border-color":"red"});
                $("#remark").focus();
                process = false;
            }
            return process;
        });
        $("#btn_reject").click(function(){
            var process = true;
            var reject = $("#reject").val();
            if(reject=="")
            {
                $("#reject").css({"border-color":"red"});
                $("#reject").focus();
                process = false;
            }
            return process;
        });
        $("#btnsearch").click(function(){
            var process = true;
            var from_date = $("#from_date").val();
            if(from_date=="")
            {
                $("#from_date").css({"border-color":"red"});
                $("#from_date").focus();
                process = false;
            }
            var to_date = $("#to_date").val();
            if(to_date=="")
            {
                $("#to_date").css({"border-color":"red"});
                $("#to_date").focus();
                process = false;
            }
            if(to_date < from_date)
            {
                alert("To Date Must Be Greater Than Or Equals To From Date");
                $("#to_date").css({"border-color":"red"});
                $("#to_date").focus();
                process = false;
            }
            return process;
        });
        $("#remark").keyup(function(){$(this).css('border-color','');});
        $("#reject").keyup(function(){$(this).css('border-color','');});
        $("#from_date").keyup(function(){$(this).css('border-color','');});
        $("#to_date").change(function(){$(this).css('border-color','');});

    });
    function Acceptfun(ID)
    {
        var result = confirm("Do You Want To Accept Task");
        if(result)
            window.location.replace("<?=URLROOT;?>/Task_Assign/recieve_task/"+ID);
    }
    function Rejectfun(ID,project_name,task_name)
    {
        $("#id").val(ID);
        $("#reject_modal").html(project_name);
        $("#task").val(task_name);
        $("#reject_task").modal();
    }
    function SubmitfunModel(ID, projectName, task_name,other_task){
        $("#_id").val(ID);
        if(task_name==""){
            task_name = other_task;
        }
        $("#modal-title").html(projectName);
        $("#task_name").val(task_name);
        $("#demo-default-modal").modal();
    }
    function Submitfun(ID)
    {
        var result = confirm("Do You Want To Submit Task");
        if(result)
            window.location.replace("<?=URLROOT;?>/Task_Assign/post_task/"+ID);
    }

    function showWorkGround(id,fid,sid){
        alert(id);
        alert(fid);
        alert(sid);
        var result = confirm("Do You Wish To Enter");
        if(result)
            window.location.replace("<?=URLROOT;?>/Task_Assign/workground/"+id);
    }

 function reload() {
  document.location.reload();
}
    function deleteSubTask(e){
        // alert("in the function");
        // debugger;
        var deleteid = e.value;
        // alert(deleteid);return;
        var subtask_name = $('#receive_reject_status').val(); 
        // console.log(subtask_name);
        // console.log(del)
        if(confirm('Are You Sure?\n Card will be deleted')){
            $.ajax({
                type:'post',
                url:'<?= URLROOT ?>/Task_Assign/deleteSubtask/',
                data:{deleteid:deleteid,subtask_name:subtask_name},

                success:function(result){
                    console.log('printing resutl ',result);
                    if(result ==1){
                        // alert(result);
                        // console.log('got 1 then ',result)
                        // var msg = "Card Deleted Successfully";
                       modelInfo("Card Deleted Successfully");
                        $("#loadingDiv").show();
                        setTimeout(reload, 1000);
                    }else if(result ==0){
                        // alert(result);
                        // console.log('got 1 then ',result)

                        // var msg = "Card Can not be Successfully";
                        modelInfo("Card Deleted Successfully");
                         $("#loadingDiv").show();
                        setTimeout(reload, 1000);
                    }
                }
            });
        }
        
    }


    function getUpdateData(e){
        alert(e.value);
        debugger;
        var subtask_id = e.value;
        // console.log(subtask_id);

        $.ajax({
            type:'post',
            url:'<?= URLROOT ?>/Task_Assign/getUpdateData',
            data:{subtask_id,subtask_id},
            beforeSend: function(){
                $("#loadingDiv").show();
            },
            success:function(result){
                var obj = JSON.parse(result);
                // console.log(obj[0].task_percent);

                document.getElementById('task_name2').value=obj[0].id;
                document.getElementById('subtask_title2').value=obj[0].subtask_title;
                document.getElementById('subtask_description2').value=obj[0].subtask_description;
                document.getElementById('task_percent2').value=obj[0].task_percent;
               
                $("#loadingDiv").hide();
            }
        });  
    }

    function roundNumber(e){
        var percent = e.value;
        document.getElementById('task_percent').value=Math.round(percent);
        document.getElementById('task_percent2').value=Math.round(percent);




    }
</script>
