<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">General Elements</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Forms</a></li>
					<li class="active">General Elements</li>
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
					                <h3 class="panel-title">Add/Update User</h3>
					            </div>

					            <!--Horizontal Form-->
					            <!--===================================================-->
					            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Masters/user_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                                    <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
					                <div class="panel-body">
					                    <div class="form-group">
					                        <label class="col-sm-3 control-label" for="user name">User Name</label>
					                        <div class="col-sm-4">
					                            <input type="text" maxlength="50" placeholder="Enter User Name" id="user_name" name="user_name" class="form-control" value="<?=(isset($data['user_name']))?$data['user_name']:"";?>" onkeypress="return isAlpha(event);" >
					                        </div>
                                        </div>
                                        <div class="form-group">
					                        <label class="col-sm-3 control-label" for="pass">Password</label>
					                        <div class="col-sm-4">
					                            <input type="password" placeholder="Enter password" id="user_pass" name="user_pass" class="form-control" value="<?=(isset($data['user_pass']))?$data['user_pass']:"";?>">
					                        </div>
                                        </div>
                                        <div class="form-group">
					                        <label class="col-sm-3 control-label" for="design">Password hint</label>
					                        <div class="col-sm-4">
					                            <input type="text" placeholder="Enter password hint" id="pass_hint" name="pass_hint" class="form-control" value="<?=(isset($data['pass_hint']))?$data['pass_hint']:"";?>">
					                        </div>
                                        </div>
					                <div class="panel-footer text-center">
					                    <button onclick="d_active_fun(event)" class="btn btn-success" id="btnpass" name="btnpass" type="submit"><?=(isset($data["_id"]))?"Edit User":"Add User";?></button>
					                     <a href="<?=URLROOT;?>/Masters/UserList" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>

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
    function d_active_fun(e)
    {
        if (confirm("Do You Want To Change Credentials ?")) {
           
        } else {
       e.preventDefault();
       return;
        }
            }


$(document).ready( function () {
    $("#btnpass").click(function() {
        var process = true;
        var user_name = $("#user_name").val();

        if (user_name=='null' || user_name == '') {
            $("#user_name").css({"border-color":"red"});
            $("#user_name").focus();
            process = false;
          }
        var user_pass = $("#user_pass").val();
        if (user_pass == 'null' || user_pass=='') {
            $("#user_pass").css({"border-color":"red"});
            $("#user_pass").focus();
            process = false;
          }
         var pass_hint = $("#pass_hint").val();
        if (pass_hint == 'null' || pass_hint=="") {
            $("#pass_hint").css({"border-color":"red"});
            $("#pass_hint").focus();
            process = false;
          }
        return process;
    });
});
</script>