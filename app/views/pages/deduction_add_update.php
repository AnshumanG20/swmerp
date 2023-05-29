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
					<li><a href="#">Masters</a></li>
					<li class="active">Add/Update Deduction</li>
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
					                <h3 class="panel-title">Add/Update Deduction</h3>

					            </div>

					            <!--Horizontal Form-->
					            <!--===================================================-->
					            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Masters/deduction_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                                    <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
					                <div class="panel-body">
                                    <div class="form-group">
                                                <label class="col-sm-3 control-label" for="employment_type_id">Employment Type</label>
                                        <div class="col-sm-4">
                                             <select id="employment_type_id" name="employment_type_id" class="form-control">
   	                                            <option value="-">--select--</option>
   	                                            <?php foreach($data["employment"] as $value):?>
   	                                             <option value="<?=$value["_id"]?>" <?=(isset($data["employment_type_id"]))?($data["employment_type_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["employment_type"]?></option>
  	                                         <?php endforeach;?>

                                             </select>
                                        </div>
					                </div>
					                    <div class="form-group">
					                        <label class="col-sm-3 control-label" for="provident_fund">Provident Fund</label>
					                        <div class="col-sm-4">
					                            <input type="text" maxlength="9" placeholder="Enter Provident Fund" id="provident_fund" name="provident_fund" class="form-control" value="<?=(isset($data['provident_fund']))?$data['provident_fund']:"";?>" >
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label class="col-sm-3 control-label" for="esic">E.S.I.C</label>
					                        <div class="col-sm-4">
                                                <input type="text" maxlength="6" placeholder="Enter E.S.I.C In Percent" id="esic" name="esic" class="form-control" value="<?=(isset($data['esic']))?$data['esic']:"";?>" >
					                        </div>
					                    </div>
                                          <div class="form-group">
					                        <label class="col-sm-3 control-label" for="professional_tax">Professional Tax</label>
					                        <div class="col-sm-4">
					                            <input type="text" maxlength="6" placeholder="Enter Professional Tax In Percent" id="professional_tax" name="professional_tax" class="form-control" value="<?=(isset($data['professional_tax']))?$data['professional_tax']:"";?>" >
					                        </div>
					                    </div>
                                          <div class="form-group">
					                        <label class="col-sm-3 control-label" for="tds">T.D.S</label>
					                        <div class="col-sm-4">
					                            <input type="text" maxlength="6" placeholder="Enter T.D.S In Percent" id="tds" name="tds" class="form-control" value="<?=(isset($data['tds']))?$data['tds']:"";?>" >
					                        </div>
					                    </div>
					                <div class="panel-footer text-center">
					                    <button class="btn btn-success" id="btndeduction" name="btndeduction" type="submit"><?=(isset($data["_id"]))?"Edit Deduction":"Add Deduction";?></button>
                                        <a href="<?=URLROOT;?>/Masters/DeductionList" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>
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
    $("#btndeduction").click(function() {
        var process = true;
        var grade_id = $("#grade_id").val();
        if (grade_id == '-') {
            $("#grade_id").css({"border-color":"red"});
            $("#grade_id").focus();
            process = false;
          }
         var employment_type_id = $("#employment_type_id").val();
        if (employment_type_id == '-') {
            $("#employment_type_id").css({"border-color":"red"});
            $("#employment_type_id").focus();
            process = false;
          }
          var provident_fund = $("#provident_fund").val();
        if (provident_fund =='null' || provident_fund=='') {
            $("#provident_fund").css({"border-color":"red"});
            $("#provident_fund").focus();
            process = false;
          }
        if(!$.isNumeric(provident_fund))
        {
            $("#provident_fund").css({"border-color":"red"});
            $("#provident_fund").focus();
            process = false;
        }
         var esic = $("#esic").val();
        if (esic =='null' || esic=='') {
            $("#esic").css({"border-color":"red"});
            $("#esic").focus();
            process = false;
          }
        if(!$.isNumeric(esic))
        {
            $("#esic").css({"border-color":"red"});
            $("#esic").focus();
            process = false;
        }
          var professional_tax = $("#professional_tax").val();
        if (professional_tax =='null' || professional_tax=='') {
            $("#professional_tax").css({"border-color":"red"});
            $("#professional_tax").focus();
            process = false;
          }
        if(!$.isNumeric(professional_tax))
        {
            $("#professional_tax").css({"border-color":"red"});
            $("#professional_tax").focus();
            process = false;
        }
         var tds = $("#tds").val();
        if (tds =='null' || tds=='') {
            $("#tds").css({"border-color":"red"});
            $("#tds").focus();
            process = false;
          }
        if(!$.isNumeric(tds))
        {
            $("#tds").css({"border-color":"red"});
            $("#tds").focus();
            process = false;
        }
        return process;
    });
});
</script>