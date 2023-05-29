<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <!--<h1 class="page-header text-overflow">Add/Update Designation</h1>//-->
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Masters</a></li>
					<li class="active">Add/Update Sub Stream</li>
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
					                <h3 class="panel-title">Add/Update Sub Stream</h3>

					            </div>

					            <!--Horizontal Form-->
					            <!--===================================================-->
					            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Sub_Stream/sub_qualification_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                                    <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="qualification">Qualification</label>
                                            <div class="col-sm-4">
                                                <select id="course_mstr_id" name="course_mstr_id" class="form-control">
                                                    <option value="-">--select--</option>
                                                    <?php foreach($data["courselist"] as $value):?>
                                                    <option value="<?=$value["_id"]?>" <?=(isset($data["course_mstr_id"]))?($data["course_mstr_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["course_name"]?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="col-sm-3 control-label" for="stream">Stream</label>
                                            <div class="col-sm-4">
                                                <select id="sub_course_mstr_id" name="sub_course_mstr_id" class="form-control">
                                                    <option value="-">--select--</option>
                                                    <?php foreach($data["sub_courselist"] as $value):?>
                                                    <option value="<?=$value["_id"]?>" <?=(isset($data["sub_course_mstr_id"]))?($data["sub_course_mstr_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["stream_name"]?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label" for="sub_stream_name">Sub Stream</label>
                                            <div class="col-sm-4">
                                                <input type="text" maxlength="50" placeholder="Enter Sub Stream" id="sub_stream_name" name="sub_stream_name" class="form-control" value="<?=(isset($data['sub_stream_name']))?$data['sub_stream_name']:"";?>" onkeypress="return isAlpha(event);" >
                                            </div>
                                        </div>
                                        <div class="panel-footer text-center">
                                            <button class="btn btn-success" id="btnsub_stream" name="btnsub_stream" type="submit"><?=(isset($data["_id"]))?($data["_id"]!="")?"Edit Sub Stream":"Add Sub Stream":"Add Sub Stream";?></button>
                                            <a href="<?=URLROOT;?>/Sub_Stream/sub_QualificationList" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>
                                        </div>
                                     <div class="row">
		                                  <div class="col-md-12" style="color: red; text-align: center;">
		                                      <?php
		                                          if(isset($error))
                                                  {
		                                              foreach ($error as $value)
                                                      {
		                                                 echo $value;
		                                                 echo "<br />";
		                                               }
		                                            }
		                                       ?>
		                                     </div>
		                             </div>
                                    </div>
					            </form>
					            <!--===================================================-->
					            <!--End Horizontal Form-->

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

<script type="text/javascript">
$(document).ready( function () {


    
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
        <?php if ($msgg = flashToast("subStramExist")) { ?>
            modelDanger("<?=$msgg;?>"); 
        <?php } ?>




     $('#course_mstr_id').change(function(){
            var course_mstr_id = $("#course_mstr_id").val()
            if(course_mstr_id!="-"){
                $.ajax({
                    type: "POST",
                    url: "<?=URLROOT;?>/Sub_Stream/ajax_gateStream/'",
                    dataType:"json",
                    data:
                        {
                            course_mstr_id:course_mstr_id
                        },
                    success: function(data){
                        if(data.response==true){
                            $("#sub_course_mstr_id").html(data.data);
                        }else{
                            $("#sub_course_mstr_id").html("<option value='-'>--select--</option>");
                        }
                    }
                });
            }else{
                $("#sub_course_mstr_id").html("<option value='-'>--select--</option>");
            }

        });
    $("#btnsub_stream").click(function() {
        var process = true;
         var course_mstr_id = $("#course_mstr_id").val();
        if (course_mstr_id == '-') {
            $("#course_mstr_id").css({"border-color":"red"});
            $("#course_mstr_id").focus();
            process = false;
          }
        var sub_course_mstr_id = $('#sub_course_mstr_id').val();
        if (sub_course_mstr_id =='-')
        {
             $("#sub_course_mstr_id").css({"border-color":"red"});
            $("#sub_course_mstr_id").focus();
            process = false;
          }
        var sub_stream_name = $("#sub_stream_name").val();
            sub_stream_name = sub_stream_name.trim();
        if (sub_stream_name=='null' || sub_stream_name == '') {
            $("#sub_stream_name").css({"border-color":"red"});
            $("#sub_stream_name").focus();
            process = false;
          }
        return process;
    });
    $("#course_mstr_id").change(function(){$(this).css('border-color','');});
    $("#sub_course_mstr_id").change(function(){$(this).css('border-color','');});
    $("#sub_stream_name").keyup(function(){$(this).css('border-color','');});

});
</script>