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
            <li class="active">Add/Update Item</li>
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
                        <h3 class="panel-title">Add/Update Item</h3>

                    </div>

                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <form class="form-horizontal" method="post" action="<?=URLROOT;?>/ItemList/item_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                        <input type="hidden" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>"/>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="asset_type">Asset Type<span class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <select id="asset_type" name="asset_type" class="form-control">
                                        <option value="">--select--</option>
                                       <option value="Software" <?=(isset($data['asset_type']))?($data['asset_type']=="Software")?"selected":"":"";?>>SOFTWARE</option>
                                       <option value="Hardware" <?=(isset($data['asset_type']))?($data['asset_type']=="Hardware")?"selected":"":"";?>>HARDWARE</option>
                                       <option value="Others" <?=(isset($data['asset_type']))?($data['asset_type']=="Others")?"selected":"":"";?>>OTHERS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="item_name">Item Name<span class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <input type="text" maxlength="50" placeholder="Enter Item Name" id="item_name" name="item_name" class="form-control" value="<?=(isset($data['item_name']))?$data['item_name']:"";?>" onkeypress="return isAlpha(event);" >
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <button class="btn btn-success" id="btn_item" name="btn_item" type="submit"><?=(isset($data["_id"]))?"Edit Item":"Add Item";?></button>
                                <a href="<?=URLROOT;?>/ItemList/itemList" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>
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
        $("#btn_item").click(function() {
            var process = true;
            var asset_type = $('#asset_type').val();
            if (asset_type=="") {
                $("#asset_type").css({"border-color":"red"});
                $("#asset_type").focus();
                process = false;
            }
            var item_name = $("#item_name").val();
                item_name = item_name.trim();
            if (item_name == 'null' || item_name=="") {
                $("#item_name").css({"border-color":"red"});
                $("#item_name").focus();
                process = false;
            }
            
            return process;
        });
        $("#asset_type").change(function(){$(this).css('border-color','');});
        $("#item_name").keyup(function(){$(this).css('border-color','');});
        
        //Capital Letter
        $('#item_name').keyup(function() 
        {
            var str = $('#item_name').val();
            var spart = str.split(" ");
            for ( var i = 0; i < spart.length; i++ )
            {
                var j = spart[i].charAt(0).toUpperCase();
                spart[i] = j + spart[i].substr(1);
            }
          $('#item_name').val(spart.join(" "));
        
        });
    });
</script>