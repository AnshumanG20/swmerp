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
            <li class="active">Add/Update Document</li>
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
                        <h3 class="panel-title">Add/Update Document</h3>
                    </div>

                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Masters/doc_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                        <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="doc">Document Name</label>
                                <div class="col-sm-6">
                                    <input type="text" maxlength="50" placeholder="Enter Document Name" id="doc_name" name="doc_name" class="form-control" value="<?=(isset($data['doc_name']))?$data['doc_name']:"";?>" onkeypress="return isAlpha(event);"  >
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-center">
                            <button class="btn btn-success" id="btndoc" name="btndoc" type="submit"><?=(isset($data["_id"]))?"Edit Document":"Add Document";?></button>
                            <a href="<?=URLROOT;?>/Masters/DocList" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>

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
        <?php if ($msgg = flashToast("documentExist")) { ?>
            modelDanger("<?=$msgg;?>"); 
        <?php } ?>

        
        $("#btndoc").click(function() {
            var process = true;
            var doc = $("#doc_name").val();
                doc = doc.trim();
            if (doc=='null' || doc == '') {
                $("#doc_name").css({"border-color":"red"});
                $("#doc_name").focus();
                process = false;
            }
            return process;
        });
        $("#doc_name").keyup(function(){$(this).css('border-color','');});
    });
</script>