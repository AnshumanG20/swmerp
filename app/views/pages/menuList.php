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
    		<li class="active">Menu List</li>
        </ol><!--End breadcrumb-->
    </div>
    <!--Page content-->
    <div id="page-content">
		<div class="row">
		    <div class="col-sm-12">
		        <div class="panel">
		            <div class="panel-heading">
                        <div class="panel-control">
                            <a href="<?=URLROOT;?>/MenuPermission/MenuAddEdit" class="btn btn-primary">Add <i class="fa fa-arrow-right"></i></a>
                        </div>
                        <h5 class="panel-title">Menu List</h5>
		            </div>
                    <form method="POST" action="<?=URLROOT?>/MenuPermission/MenuAddEdit/<?=(isset($data['menu_mstr_id']))?$data['menu_mstr_id']:'';?>">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Menu name</th>
                                            <th>Menu Path</th>
                                            <th>Permission To</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(isset($data['menuList'])){
                                        $i = 0;
                                        foreach ($data['menuList'] as $value) {
                                            $i++;
                                    ?>
                                            <tr>
                                                <td><?=$i;?></td>
                                                <td><?=$value['menu_name']?></td>
                                                <td><?=$value['menu_path']?></td>
                                                <td>
                                                <?php
                                                foreach ($value['designationNameList'] as $key => $designationName) {
                                                    echo $designationName['designation_name']."<br />";
                                                }
                                                ?>
                                                </td>
                                                <td>
                                                    <a href="<?=URLROOT;?>/MenuPermission/MenuAddEdit/<?=$value['_id'];?>" class="btn btn-primary">Edit </a>

                                                    <a href="<?=URLROOT;?>/MenuPermission/MenuDeactivate/<?=$value['_id'];?>" class="btn btn-primary">Deactivate </a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
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
    function modelInfo(msg){
        $.niftyNoty({
            type: 'info',
            icon : 'pli-exclamation icon-2x',
            message : msg,
            container : 'floating',
            timer : 5000
        });
    }
    <?php 
    if($flashToast = flashToast('MenuList')){
        echo "modelInfo('".$flashToast."');";
    }
    ?>
});
</script>