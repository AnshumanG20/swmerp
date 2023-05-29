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
					<li class="active">Add/Update Biometic User</li>
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
					                <h3 class="panel-title">Add/Update Biometic User</h3>

					            </div>

					            <!--Horizontal Form-->
					            <!--===================================================-->
					            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Masters/biometric_user_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                                    <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="qualification">User</label>
                                            <div class="col-sm-4">
                                            <input type="text" maxlength="50" placeholder="Enter User" id="biometric_user_name" name="biometric_user_name" class="form-control" value="<?=(isset($data['stream_name']))?$data['stream_name']:"";?>" onkeypress="return isAlpha(event);" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="stream_name">Biometric Code</label>
                                            <div class="col-sm-4">
                                                <input type="text" maxlength="50" placeholder="Enter Code" id="biometic_code" name="biometic_code" class="form-control" value="<?=(isset($data['stream_name']))?$data['stream_name']:"";?>">
                                            </div>
                                        </div>
                                        <div class="panel-footer text-center">
                                            <button class="btn btn-success" id="btnsubqualification" type="submit"><?=(isset($data["_id"]))?"Edit User":"Add User";?></button>
                                            <a href="<?=URLROOT;?>/Masters/sub_QualificationList" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>
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
    $("#btnsubqualification").click(function() {
        var process = true;
         var course_mstr_id = $("#course_mstr_id").val();
        if (course_mstr_id == '-') {
            $("#course_mstr_id").css({"border-color":"red"});
            $("#course_mstr_id").focus();
            process = false;
          }
        var stream_name = $("#stream_name").val();
            stream_name = stream_name.trim();
        if (stream_name=='null' || stream_name == '') {
            $("#stream_name").css({"border-color":"red"});
            $("#stream_name").focus();
            process = false;
          }

        return process;
    });
  $("#course_mstr_id").change(function(){$(this).css('border-color','');});
  $("#stream_name").keyup(function(){$(this).css('border-color','');});
});
</script>