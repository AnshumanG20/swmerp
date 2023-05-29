<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
<div id="content-container">
    <div id="page-head">
        <div id="page-title"><!--Page Title-->
            <h1 class="page-header text-overflow"></h1>
        </div><!--End page title-->
        <ol class="breadcrumb"><!--Breadcrumb-->
    		<li><a href="#"><i class="demo-pli-home"></i></a></li>
    		<li><a href="#">Menu</a></li>
    		<li class="active">Menu Add/Edit</li>
        </ol><!--End breadcrumb-->
    </div>
    <!--Page content-->
    <div id="page-content">
		<div class="row">
		    <div class="col-sm-12">
		        <div class="panel">
		            <div class="panel-heading">
                        <div class="panel-control">
                            <a href="<?=URLROOT;?>/MenuPermission/index" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                        <h5 class="panel-title">Menu Add/Edit</h5>
		            </div>
                    <form method="POST" action="<?=URLROOT?>/MenuPermission/MenuAddEdit/<?=(isset($data['menu_mstr_id']))?$data['menu_mstr_id']:'';?>">
                        <div class="panel-body">
                            <input type="hidden" name="menu_mstr_id" value="<?=(isset($data['menu_mstr_id']))?$data['menu_mstr_id']:'';?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Menu Name</label>
                                        <input type="text" id="menu_name" name="menu_name" class="form-control" placeholder="Enter Menu Name" value="<?=(isset($data['menu_name']))?$data['menu_name']:'';?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Menu Path</label>
                                        <input type="text" id="menu_path" name="menu_path" class="form-control" placeholder="Enter Menu Path" value="<?=(isset($data['menu_path']))?$data['menu_path']:'';?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Under Menu Name ID</label>
                                        <select id="under_menu_mstr_id" name="under_menu_mstr_id" class="form-control">
                                            <option value="0">#</option>
                                        <?php
                                        if(isset($data['underMenuNameList'])){
                                            foreach ($data['underMenuNameList'] as $values) {
                                        ?>
                                            <option value="<?=$values['_id']?>" <?=(isset($data['under_menu_mstr_id']))?($values['_id']==$data['under_menu_mstr_id'])?'selected':'':'';?> ><?=$values['menu_name']?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="control-label"><b><u>Permission To</u></b></label>
                                </div>
                            <?php
                            if(isset($data['designationMstrList'])){
                                foreach ($data['designationMstrList'] as $values) {
                            ?>
                                    <div class="col-sm-3">
                                        <div class="checkbox">
                                            <input type="checkbox" id="designation_mstr_id<?=$values['_id']?>" name="designation_mstr_id[]" class="magic-checkbox" value="<?=$values['_id']?>" <?=(isset($values['isChecked']))?($values['isChecked'])?"checked":"":"";?> />
                                            <label for="designation_mstr_id<?=$values['_id']?>"><?=$values['designation_name']?></label>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            </div>
                        </div>
                        <div class="panel-footer text-left">
                            <button type="submit" id="btn_submit" name="btn_submit" class="btn btn-success"><?=(isset($data['menu_mstr_id']))?($data['menu_mstr_id']=='')?'Submit':'Update':'Submit';?></button>
                        </div>
                    </form>
		        </div>
		    </div>
		</div>
    </div>
    <!--End page content-->
</div>
<!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
    $("#btn_submit").click(function(){
        var process = true;
        if($("#menu_name").val()==""){
            $("#menu_name").css('border-color', 'red'); process=false;
        }
        if($("#under_menu_mstr_id").val()!=0){
            if($("#menu_path").val()==""){
                $("#menu_path").css('border-color', 'red'); process=false;
            }
        }

        var checkedLen = $("input[name='designation_mstr_id[]']:checked").length;
        if(!checkedLen) {
            alert("You must check at least one designation.");
            process = false;
        }
        return process;
    });
    $("#menu_name").keyup(function(){ $(this).css('border-color',''); });
    $("#menu_path").keyup(function(){ $(this).css('border-color',''); });
    function modelDanger(msg){
        $.niftyNoty({
            type: 'danger',
            icon : 'pli-exclamation icon-2x',
            message : msg,
            container : 'floating',
            timer : 5000
        });
    }
    <?php 
    if($flashToast = flashToast('MenuAddEdit')){
        echo "modelDanger('".$flashToast."');";
    }
    ?>
});
</script>