<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <!--<h1 class="page-header text-overflow">Add/Update Leave Type</h1>//-->
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Recruitment</a></li>
					<li class="active">HR Approval</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
					<div class="row">
					    <div class="col-sm-12">
					        <div class="panel">
					            <div class="panel-heading">
					                <div class="panel-title">
                                        HR Approval
                                    </div>
                                    <a href="<?=URLROOT;?>/InterviewProcessController/interview_process_list" class="btn btn-danger" style="float:right;"><i class="fa fa-arrow-left" aria-hidden="true"></i>           Back</a>
                                </div>
					            <!--Horizontal Form-->

					            <!--Horizontal Form-->
					            <!--===================================================-->
					            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/LeaveDays/leavetype_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
        		                <div class="panel-body">
                                        <?php if(isset($data["hr_approval"])):?>
                                         <?php foreach ($data["hr_approval"] as $key => $value):?>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <img src="<?= URLROOT ?>/public/uploads/<?=$value["candidate_details_photo_path"];?>" height="250" width="250" style="border:double">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="col-md-3" >Candidate Name:-</label>
                                                    <div class="col-md-5">
                                                        <?=$value["candidate_details_first_name"]." ". $value["candidate_details_middle_name"]." ". $value["candidate_details_last_name"];?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3" >Position Applied For:-</label>
                                                    <div class="col-md-5">
                                                        <?=$value["designation_mstr_designation_name"];?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3" >Location Applied For:-</label>
                                                    <div class="col-md-5">
                                                        <?=$value["city"];?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3" >Brief Description:</label>
                                                    <div class="col-md-5">
                                                        <a href="<?=URLROOT;?>/form_controller/candidate_brief_description/<?=$value["candidate_details_id"];?>/hr_approval" class="btn btn-warning">View Details</a>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <?php if($value["_status"]==9){ ?>
                                                    <label class="col-md-8 text-success" ><b> Offer Letter Sent To candidate</b></label>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                         
                                        <hr>

                                         <?php endforeach;?>
                                    <?php endif;?>
                                    </div>

                             </form>
					<!--===================================================-->
					<!--End Horizontal Form-->
                                <h3 style="text-align:center;">
                                    <u>First Round Interview Details Status</u>
                                </h3><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <table class="col-md-6 col-sm-offset-3">
                                                <?php if(isset($data["firstRound_approval"])):?>
                                                <?php foreach ($data["firstRound_approval"] as $key => $value):?>
                                                <tr>
                                                    <th>Interviewer Name :-</th>
                                                    <td><?=$value["first_name"]." ".$value["middle_name"]." ".$value["last_name"];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Interview Date And Time :-</th>
                                                    <td><?=$value["date_time"];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Remarks :-</th>
                                                    <td><?=$value["remarks"];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Interview Status :-</th>
                                                    <td>
                                                        <?php if($value["round_status"]==2) { ?>
                                                            Selected
                                                         <?php }
                                                        elseif($value["round_status"]==3) { ?>
                                                            Rejected
                                                         <?php }
                                                        elseif($value["round_status"]==4) { ?>
                                                            Absent
                                                         <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                            <?php endif;?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <hr>

                                <h3 style="text-align:center;">
                                    <u>Second Round Interview Details Status</u>
                                </h3>
                                <br>
                                <?php if(isset($data["secondRound_approval"])):?>
                                <?php foreach ($data["secondRound_approval"] as $key => $value):?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <table class="col-md-6 col-sm-offset-3">
                                                <tr>
                                                    <th>Interviewer Name :-</th>
                                                    <td><?=$value["first_name"]." ".$value["middle_name"]." ".$value["last_name"];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Interview Date And Time :</th>
                                                    <td><?=$value["date_time"];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Remarks :-</th>
                                                    <td><?=$value["remarks"];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Basic Salary :-</th>
                                                    <td><?=$value["basic_salary"];?></td>
                                                </tr>
                                                <tr>
                                                    <th>Interview Status</th>
                                                    <td>
                                                        <?php if($value["round_status"]==2) { ?>
                                                            Selected
                                                         <?php }
                                                        elseif($value["round_status"]==3) { ?>
                                                            Rejected
                                                         <?php }
                                                        elseif($value["round_status"]==4) { ?>
                                                            Absent
                                                         <?php } ?>
                                                    </td>
                                                </tr>


                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <br>
                               <!-- <hr>//-->
                                <div class="row">
                                    <?php if(isset($data["hr_approval"])):?>
                                    <?php foreach ($data["hr_approval"] as $key => $value):?>
                                    <?php if($value["_status"]==9){ ?>
                                    <form method="post" action="<?=URLROOT;?>/interviewProcessController/candidateApproved/<?=$value["candidate_details_id"];?>">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="form-group table-responsive">
                                                    <div class="col-sm-12">
                                                            <label for="myCheck" class="text-danger">Assign Asset:</label> 
                                                            <input type="checkbox" id="assetcheckbox" name="assetcheckbox" onclick="assignAsset()">
                                                    </div>
                                                    <table class="table table-hover table-bordered table-condensed" id="rowAdditem" style="display:none">
                                                        <thead>
                                                            <tr class="success">
                                                                <th>Asset Type <span class="text-danger"> *</span></th>
                                                                <th>Item Name <span class="text-danger"> *</span></th>
                                                                <th>Sub Item Name</th>
                                                                <th>Model No.</th>
                                                                <th>Serial No.</th>
                                                                <th>Available Quantity</th>
                                                                <th>Quantity</th>
                                                                <th colspan="2">Add More Assets</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody id="tablebody">

                                                            <tr>
                                                                <td>
                                                                    <select class="form-control asset_type" id="asset_type1" name="asset_type[]" onchange="changeAssetType(this.id);" required >
                                                                        <option value="">select</option>
                                                                        <option value="Hardware">Hardware</option>
                                                                        <option value="Software">Software</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control item_name_id" id="item_name_id1" name="item_name_id[]" onchange="changeItemName(this.id);" required >
                                                                            <option value="">select</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control sub_item_name" id="sub_item_name1" name="sub_item_name[]" onchange="changeSubItemName(this.id);" required >
                                                                           <option value="">select</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control asset_model_no_id" id="asset_model_no_id1" name="asset_model_no_id[]"  onchange="changeModelNo(this.id);">
                                                                            <option value="">select</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control serial_no" id="serial_no1" name="serial_no[]">
                                                                            <option value="">select</option>
                                                                    </select>
                                                                </td>
                                                                <td><input class="form-control m-t-xxs available_quantity" id="available_quantity1" name="available_quantity[]" readonly /></td>
                                                                <td><input class="form-control m-t-xxs quantity" id="quantity1" name="quantity[]" maxlength="2" value="1" readonly/></td>
                                                                <td><i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onclick="insRow(1);"></i></td>
                                                                <td></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="text-align:center;">
                                            <input type="submit" class="btn btn-danger" id="boarding" name="boarding" value=" On Boarding " />
                                            <!--<a href="<?=URLROOT;?>/interviewProcessController/candidateApproved/<?=$value["candidate_details_id"];?>" class="btn  btn-danger">On Boarding</a>//-->
                                        </div>
                                    </form>

                                    <?php }else if($value["_status"]==8) { ?>
                                    <div class="form-group" style="text-align:center;">
                                        <!-- <a href="<?=URLROOT;?>/interviewProcessController/candidateSentOfferLetter/<?php //echo $value["candidate_details_id"];?>" class="btn  btn-danger">Send Offer Letter</a> -->

                                        <a href="<?=URLROOT;?>/interviewProcessController/candidateSentOfferLetterFormat/<?php echo $value["candidate_details_id"];?>" class="btn  btn-danger">Send Offer Letter</a>
                                    </div>
                                    <?php } else { ?>
                                    <div class="form-group" style="text-align:center;">
                                        <span class="text-success"><b>Candidate Become Our Employee</b></span>
                                    </div>
                                    <?php } ?>
                                    <?php endforeach;?>
                                    <?php endif;?>
                                </div>
                                <?php endforeach;?>
                                <?php endif;?>
                           </div>
                        </div>
					</div>
                     <div class="modal fade" id="sendOfferLetter_modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="<?=URLROOT;?>/Task_Assign/approve_task">
                                    <!--Modal header-->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                                        <h4 class="modal-title" id="reject_modal">Modal Heading</h4>
                                    </div>

                                    <!--Modal body-->
                                    <div class="modal-body">
                                       <div class="fluid">
                                        <!-- COMPOSE EMAIL -->
                                        <!--===================================================-->

                                        <div class="pad-btm clearfix">
                                            <!--Cc & bcc toggle buttons-->
                                            <div class="pull-right pad-btm">
                                                <div class="btn-group">
                                                    <button id="demo-toggle-cc" data-toggle="button" type="button" class="btn btn-sm btn-default btn-active-info">Cc</button>
                                                    <button id="demo-toggle-bcc" data-toggle="button" type="button" class="btn btn-sm btn-default btn-active-info">Bcc</button>
                                                </div>
                                            </div>
                                        </div>



                                        <!--Input form-->
                                        <form role="form" class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-lg-1 control-label text-left" for="inputEmail">To</label>
                                                <div class="col-lg-11">
                                                    <input type="email" id="inputEmail" class="form-control">
                                                </div>
                                            </div>
                                            <div id="demo-cc-input" class="hide form-group">
                                                <label class="col-lg-1 control-label text-left" for="inputCc">Cc</label>
                                                <div class="col-lg-11">
                                                    <input type="text" id="inputCc" class="form-control">
                                                </div>
                                            </div>
                                            <div id="demo-bcc-input" class="hide form-group">
                                                <label class="col-lg-1 control-label text-left" for="inputBcc">Bcc</label>
                                                <div class="col-lg-11">
                                                    <input type="text" id="inputBcc" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-1 control-label text-left" for="inputSubject">Subject</label>
                                                <div class="col-lg-11">
                                                    <input type="text" id="inputSubject" class="form-control">
                                                </div>
                                            </div>
                                        </form>


                                        <!--Attact file button-->
                    <!--                    <div class="media pad-btm">
                                            <div class="media-left">
                                                <span class="btn btn-default btn-file">
                                                Attachment <input type="file">
                                            </span>
                                            </div>
                                            <div id="demo-attach-file" class="media-body"></div>
                                        </div>-->


                                        <!--Wysiwyg editor : Summernote placeholder-->
                                        <div id="demo-mail-compose"></div>

                                        <div class="pad-ver">

                                            <!--Send button-->
                                            <button id="mail-send-btn" type="button" class="btn btn-primary">
                                                <i class="demo-psi-mail-send icon-lg icon-fw"></i> Send Mail
                                            </button>

                                            <!--Save draft button-->
                                            <button id="mail-save-btn" type="button" class="btn btn-default">
                                                <i class="demo-pli-mail-unread icon-lg icon-fw"></i> Save Draft
                                            </button>

                                            <!--Discard button-->
                                            <button id="mail-discard-btn" type="button" class="btn btn-default">
                                                <i class="demo-pli-mail-remove icon-lg icon-fw"></i> Discard
                                            </button>
                                        </div>


                                        <!--===================================================-->
                                        <!-- END COMPOSE EMAIL -->
                                    </div>
                                </div>
                                <!--Modal footer-->
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                    <button type="button" onclick="approveTask()" id="btn_accept" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>
<script src="<?=URLROOT;?>/common/assets/js/demo/mail.js"></script>


<script type="text/javascript">
    function changeAssetType(ID){
        ID = ID.split("asset_type")[1];
        var asset_type = $("#asset_type"+ID).val();
        $('#item_name_id'+ID).html('<option value="">Select</option>');
        if(asset_type!=""){
                $.ajax({
                    type:"POST",
                    url: "<?=URLROOT;?>/InterviewProcessController/ajaxItemListByAssetType",
                    dataType: "json",
                    data: {"asset_type":asset_type},
                    beforeSend: function() {
                        $("#loadingDiv").show();
                    },
                    success:function(data){
                        $("#loadingDiv").hide();
                        if(data.response==true){
                            $("#item_name_id"+ID).html(data.data);
                        }
                    }
                });

            }
      }
    
    function changeItemName(ID){
        ID = ID.split("item_name_id")[1];
        var item_name_id = $("#item_name_id"+ID).val();
        $('#sub_item_name'+ID).html('<option value="">Select</option>');
        if(item_name_id!=""){
            $.ajax({
                type:"POST",
                url: "<?=URLROOT;?>/InterviewProcessController/ajaxSubItemListByItemList",
                dataType: "json",
                data: {"item_name_id":item_name_id},
                beforeSend: function() {
                    $("#loadingDiv").show();
                },
                success:function(data){
                    $("#loadingDiv").hide();
                    if(data.response==true){
                        $("#sub_item_name"+ID).html(data.data);
                    }
                }
            });
        }
    }
    
    function changeSubItemName(ID){
        ID = ID.split("sub_item_name")[1];
        var sub_item_name = $("#sub_item_name"+ID).val();
        $('#asset_model_no_id'+ID).html('<option value="">Select</option>');
        if(sub_item_name!=""){
            $.ajax({
                type:"POST",
                url: "<?=URLROOT;?>/InterviewProcessController/ajaxModelNoBySubItemList",
                dataType: "json",
                data: {"sub_item_name":sub_item_name},
                beforeSend: function() {
                    $("#loadingDiv").show();
                },
                success:function(data){
                    $("#loadingDiv").hide();
                    if(data.response==true){
                        $("#asset_model_no_id"+ID).html(data.data);
                        $("#available_quantity"+ID).val(data.available);
                    }
                }
            });
        }
    }

    function changeModelNo(ID){
        ID = ID.split("asset_model_no_id")[1];
        var asset_model_no_id = $("#asset_model_no_id"+ID).val();
        $('#serial_no'+ID).html('<option value="">Select</option>');
        if(asset_model_no_id!=""){
            $.ajax({
                type:"POST",
                url: "<?=URLROOT;?>/InterviewProcessController/ajaxAvailableQuantityByModelNo",
                dataType: "json",
                data: {"asset_model_no_id":asset_model_no_id},
                beforeSend: function() {
                    $("#loadingDiv").show();
                },
                success:function(data){
                    $("#loadingDiv").hide();
                    if(data.response==true){
                        $("#serial_no"+ID).html(data.data);
                        $("#available_quantity"+ID).val(data.available);
                    }
                }
            });
        }
    }


var z = 1;
function insRow(j)
{
    z = z+1;
    var appendData = $('<tr><td><select class="form-control asset_type" id="asset_type'+z+'" name="asset_type[]" onchange="changeAssetType(this.id);" required ><option value="">select</option><option value="Hardware">Hardware</option><option value="Software">Software</option></select></td><td><select class="form-control item_name_id" id="item_name_id'+z+'" name="item_name_id[]" onchange="changeItemName(this.id);" required ><option value="">select</option></select></td><td><select class="form-control sub_item_name" id="sub_item_name'+z+'" name="sub_item_name[]" onchange="changeSubItemName(this.id);" required ><option value="">select</option></select></td><td><select class="form-control asset_model_no_id" id="asset_model_no_id'+z+'" name="asset_model_no_id[]"  onchange="changeModelNo(this.id);"><option value="">select</option></select></td><td><select class="form-control serial_no" id="serial_no'+z+'" name="serial_no[]"><option value="">select</option></select></td><td><input class="form-control m-t-xxs available_quantity" id="available_quantity'+z+'" name="available_quantity[]" readonly /></td><td><input class="form-control m-t-xxs quantity" id="quantity1" name="quantity[]" maxlength="2" value="1" readonly/></td><td><i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onclick="insRow(1);"></i></td><td><i class="fa fa-remove remove_buttonn_item" style="font-size:30px; cursor:pointer;"></i></td></tr>');
    $("#tablebody").append(appendData);
}
$("#tablebody").on('click', '.remove_buttonn_item', function(e) {
    $(this).closest("tr").remove();
});

$("#tablebody").on('click', '.remove_buttonn_item', function(e) {
    $(this).closest("tr").remove();
});
</script>

<script type="text/javascript">
    $("#boarding").click(function(event){
        process = true;
        var checkBox = document.getElementById("assetcheckbox");
        if (checkBox.checked == true){
            $(".asset_type").each(function(){
                var ID = this.id;
                var ID = ID.split("asset_type")[1];
                var asset_type = $("#asset_type"+ID).val();
                if(asset_type==""){
                  $("#asset_type"+ID).css('border-color', 'red'); process = false;
                }
                $("#asset_type"+ID).change(function(){ $(this).css('border-color',''); });
            });
            
             $(".item_name_id").each(function(){
                var ID = this.id;
                var ID = ID.split("item_name_id")[1];
                var item_name_id = $("#item_name_id"+ID).val();
                if(item_name_id==""){
                  $("#item_name_id"+ID).css('border-color', 'red'); process = false;
                }
                $("#item_name_id"+ID).change(function(){ $(this).css('border-color',''); });
            });
            
            $(".sub_item_name").each(function(){
                var ID = this.id;
                var ID = ID.split("sub_item_name")[1];
                var sub_item_name = $("#sub_item_name"+ID).val();
                if(sub_item_name==""){
                  $("#sub_item_name"+ID).css('border-color', 'red'); process = false;
                }
                $("#sub_item_name"+ID).change(function(){ $(this).css('border-color',''); });
            });
            
            $(".asset_model_no_id").each(function(){
                var ID = this.id;
                var ID = ID.split("asset_model_no_id")[1];
                var asset_model_no_id = $("#asset_model_no_id"+ID).val();
                if(asset_model_no_id==""){
                  $("#asset_model_no_id"+ID).css('border-color', 'red'); process = false;
                }
                $("#asset_model_no_id"+ID).change(function(){ $(this).css('border-color',''); });
            });
            
            // $(".serial_no").each(function(){
            //     var ID = this.id;
            //     var ID = ID.split("serial_no")[1];
            //     var serial_no = $("#serial_no"+ID).val();
            //     if(serial_no==""){
            //       $("#serial_no"+ID).css('border-color', 'red'); process = false;
            //     }
            //     $("#serial_no"+ID).change(function(){ $(this).css('border-color',''); });
            // });
            
             $(".available_quantity").each(function(){
                var ID = this.id;
                var ID = ID.split("available_quantity")[1];
                var available_quantity = $("#available_quantity"+ID).val();
                if(available_quantity=="" || available_quantity < 1){
                  $("#available_quantity"+ID).css('border-color', 'red'); process = false;
                }
                $("#available_quantity"+ID).change(function(){ $(this).css('border-color',''); });
            });
            
            $(".asset_model_no_id").each(function(){
                var ID = this.id;
                var ID = ID.split("asset_model_no_id")[1];
                var asset_model_no_id = $("#asset_model_no_id"+ID).val();
                if(asset_model_no_id==""){
                  $("#asset_model_no_id"+ID).css('border-color', 'red'); process = false;
                }
                $("#asset_model_no_id"+ID).change(function(){ $(this).css('border-color',''); });
            });
            
            $(".asset_model_no_id").each(function(){
                var ID = this.id;
                var ID = ID.split("asset_model_no_id")[1];
                var asset_model_no_id = $("#asset_model_no_id"+ID).val();
                if(asset_model_no_id==""){
                  $("#asset_model_no_id"+ID).css('border-color', 'red'); process = false;
                }
                $("#asset_model_no_id"+ID).change(function(){ $(this).css('border-color',''); });
            });
            }

           else{
               alert('please assign assets');
               event.preventDefault();
           }
           
        return process;
    });

</script>

<script>
function assignAsset() {
  var checkBox = document.getElementById("assetcheckbox");
  var rowAdditem = document.getElementById("rowAdditem");
  if (checkBox.checked == true){
    rowAdditem.style.display = "block";
  } else {
     rowAdditem.style.display = "none";
  }
}

function sendOfferLetter(){
   $('#sendOfferLetter_modal').modal();
}
</script>