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
					<li class="active">Add/Update Employment Type</li>
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
					                <h3 class="panel-title">Add/Update Employment Type</h3>
					            </div>

					            <!--Horizontal Form-->
					            <!--===================================================-->
					            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Masters/employeement_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                                    <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
					                <div class="panel-body">
					                    <div class="form-group">
					                        <label class="col-sm-3 control-label" for="employment_type">Employment Type</label>
					                        <div class="col-sm-4">
					                            <input type="text" placeholder="Enter Employment Type" maxlength="50" id="employment_type" name="employment_type" class="form-control" value="<?=(isset($data['employment_type']))?$data['employment_type']:"";?>" onkeypress="return isAlpha(event);" >
					                        </div>
                                        </div>
					                <div class="panel-footer text-center">
					                    <button class="btn btn-success" id="btnemptype" name="btnemptype" type="submit"><?=(isset($data["_id"]))?"Edit Employment Type":"Add Employment Type";?></button>
                                         <a href="<?=URLROOT;?>/Masters/EmployeementList" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>

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
        <?php if ($msgg = flashToast("EmpTypeExist")) { ?>
            modelDanger("<?=$msgg;?>"); 
        <?php } ?>



    $("#btnemptype").click(function() {
        var process = true;
        var employment_type = $("#employment_type").val();
            employment_type = employment_type.trim();
        if (employment_type=='null' || employment_type == '') {
            $("#employment_type").css({"border-color":"red"});
            $("#employment_type").focus();
            process = false;
          }
        return process;
    });
    $("#employment_type").keyup(function(){$(this).css('border-color','');});
});
</script>