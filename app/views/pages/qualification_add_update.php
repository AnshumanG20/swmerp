<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <!--<h1 class="page-header text-overflow">General Elements</h1>//-->
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Masters</a></li>
					<li class="active">Add/Update Qualification</li>
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
					                <h3 class="panel-title">Add/Update Qualification</h3>
					            </div>

					            <!--Horizontal Form-->
					            <!--===================================================-->
					            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Masters/qualification_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                                    <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
					                <div class="panel-body">
					                    <div class="form-group">
					                        <label class="col-sm-3 control-label" for="course_name">Qualification</label>
					                        <div class="col-sm-6">
					                            <input type="text" maxlength="50" placeholder="Enter Qualification" id="course_name" name="course_name" class="form-control" value="<?=(isset($data['course_name']))?$data['course_name']:"";?>" onkeypress="return isAlpha(event);"  >
					                        </div>
					                    </div>
					                </div>
					                <div class="panel-footer text-center">
					                    <button class="btn btn-success" id="btnqualification" name="btnqualification" type="submit"><?=(isset($data["_id"]))?"Edit Qualification":"Add Qualification";?></button>
                                         <a href="<?=URLROOT;?>/Masters/QualificationList" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>

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
        <?php if ($msgg = flashToast("QualExist")) { ?>
            modelDanger("<?=$msgg;?>"); 
        <?php } ?>

        



    $("#btnqualification").click(function() {
        var process = true;
        var course_name = $("#course_name").val();
            course_name = course_name.trim();
        if (course_name=='null' || course_name == '') {
            $("#course_name").css({"border-color":"red"});
            $("#course_name").focus();
            process = false;
          }
        return process;
    });
    $("#course_name").keyup(function(){$(this).css('border-color','');});
});
</script>