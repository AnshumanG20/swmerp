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
            <li class="active">Add/Update Sub Item</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add/Update Sub Item</h3>

                    </div>

                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Sub_Item/sub_item_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                        <input type="hidden" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>"/>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-md-2" for="item_name_id">Item Name<span class="text-danger"> *</span></label>
                                <div class="col-md-4">
                                  <select id="item_name_id" name="item_name_id" class="form-control">
                                        <option value="">--select--</option>
                                        <?php foreach($data["itemlist"] as $value):?>
                                        <option value="<?=$value["_id"]?>" <?=(isset($data["item_name_id"]))?($data["item_name_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["item_name"]?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" for="sub_item_name">Sub Item Name<span class="text-danger"> *</span></label>
                                <div class="col-md-4">
                                    <input type="text" maxlength="50" placeholder="Enter Sub Item Name" id="sub_item_name" name="sub_item_name" class="form-control" value="<?=(isset($data['sub_item_name']))?$data['sub_item_name']:"";?>" onkeypress="return isAlpha(event);" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" for="selling_rate">Selling Rate (Per Unit)<span class="text-danger"> *</span></label>
                                <div class="col-md-4 input-group">
                                     <span class="input-group-addon"><i class="fa fa-rupee "></i></span>
                                    <input class="form-control m-t-xxs" type="text" maxlength="10" placeholder="Enter Item Selling Rate" id="selling_rate" name="selling_rate" value="<?=(isset($data['selling_rate']))?$data['selling_rate']:"";?>" onkeypress="return isNum(event);" />
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-2" for="cgst_tax">CGST Tax<span class="text-danger"> *</span></label>
                                <div class="col-md-2">
									<div class="input-group">
										<input class="form-control m-t-xxs" type="text" maxlength="2" id="cgst_tax" name="cgst_tax" placeholder="Enter CGST Tax" value="<?=(isset($data['cgst_tax']))?$data['cgst_tax']:"";?>" onkeypress="return isNum(event);"/>
										<span class="input-group-addon"><i class="fa fa-percent "></i></span>
									</div>
                                </div>
                                <div class="col-md-2">
									<div class="input-group">
										 <span class="input-group-addon"><i class="fa fa-rupee "></i></span>
										<input class="form-control m-t-xxs" type="text" maxlength="10" id="cgst_tax_amount" name="cgst_tax_amount" class="form-control" value="" disabled>
									</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2" for="sgst_tax">SGST Tax<span class="text-danger"> *</span></label>
                                <div class="col-md-2">
									<div class="input-group">
                                    <input class="form-control " type="text" maxlength="2" placeholder="Enter SGST Tax" id="sgst_tax" name="sgst_tax" class="form-control" value="<?=(isset($data['sgst_tax']))?$data['sgst_tax']:"";?>" onkeypress="return isNum(event);" >
									<span class="input-group-addon"><i class="fa fa-percent "></i></span>
                                </div>
                                </div>
                                 <div class="col-md-2">
									<div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-rupee "></i></span>
                                    <input class="form-control m-t-xxs" type="text" maxlength="10" id="sgst_tax_amount" name="sgst_tax_amount" class="form-control" value="" disabled>
                                </div>
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-md-2" for="igst_tax">IGST Tax<span class="text-danger"> *</span></label>
                                <div class="col-md-2">
									<div class="input-group">
										<input class="form-control " type="text" maxlength="2" placeholder="Enter IGST Tax" id="igst_tax" name="igst_tax" class="form-control" value="<?=(isset($data['igst_tax']))?$data['igst_tax']:"";?>" onkeypress="return isNum(event);" >
										<span class="input-group-addon"><i class="fa fa-percent "></i></span>
									</div>
                                </div>
                                <div class="col-md-2">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-rupee "></i></span>
										<input class="form-control " type="text" maxlength="10" id="igst_tax_amount" name="igst_tax_amount" class="form-control" value="" disabled>
									</div>
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-md-2" for="igst_tax">&nbsp;</label>
                                <div class="col-md-4">
									<button class="btn btn-success" id="btn_subitem" name="btn_subitem" type="submit"><?=(isset($data["_id"]))?"Edit Sub Item":"Add Sub Item";?></button>
                                <a href="<?=URLROOT;?>/Sub_Item/sub_itemList" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>
                                </div>
                                
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
          var cgst_tax =parseFloat($('#cgst_tax').val());
            var selling_rate = $('#selling_rate').val();
            var cgst_tax_amount =$('#cgst_tax_amount').val();
            if(selling_rate!="")
            {
               if(cgst_tax>100)
                {
                    $('#cgst_tax').focus();
                    $('#cgst_tax').val('');
                    $('#cgst_tax_amount').val('');
                }
                else
                {
                    cgst_tax_amt=(selling_rate*cgst_tax)/100;
                    $('#cgst_tax_amount').val(cgst_tax_amt);
                }

            }  
             var sgst_tax =parseFloat($('#sgst_tax').val());
            var sgst_tax_amount =$('#sgst_tax_amount').val();
            if(selling_rate!="")
            {
               if(sgst_tax>100)
                {
                    $('#sgst_tax').focus();
                    $('#sgst_tax').val('');
                    $('#sgst_tax_amount').val('');
                }
                else
                {
                    sgst_tax_amt=(selling_rate*sgst_tax)/100;
                    $('#sgst_tax_amount').val(sgst_tax_amt);
                }
            }
            var igst_tax =parseFloat($('#igst_tax').val());
            var igst_tax_amount =$('#igst_tax_amount').val();
            if(selling_rate!="")
            {
                if(igst_tax>100)
                {
                    $('#igst_tax').focus();
                    $('#igst_tax').val('');
                    $('#igst_tax_amount').val('');
                }
                else
                {
                    igst_tax_amt=(selling_rate*igst_tax)/100;
                    $('#igst_tax_amount').val(igst_tax_amt);
                }
            }
        $("#btn_subitem").click(function() {
            var process = true;
            var item_name_id = $('#item_name_id').val();
            if (item_name_id=="") {
                $("#item_name_id").css({"border-color":"red"});
                $("#item_name_id").focus();
                process = false;
            }
            var sub_item_name = $('#sub_item_name').val();
                sub_item_name = sub_item_name.trim();
            if (sub_item_name=="") {
                $("#sub_item_name").css({"border-color":"red"});
                $("#sub_item_name").focus();
                process = false;
            }
            var selling_rate = $("#selling_rate").val();
            if (selling_rate=="") {
                $("#selling_rate").css({"border-color":"red"});
                $("#selling_rate").focus();
                process = false;
            }
            var cgst_tax = $("#cgst_tax").val();
            if (cgst_tax=="") {
                $("#cgst_tax").css({"border-color":"red"});
                $("#cgst_tax").focus();
                process = false;
            }
            var sgst_tax = $("#sgst_tax").val();
            if (sgst_tax=="") {
                $("#sgst_tax").css({"border-color":"red"});
                $("#sgst_tax").focus();
                process = false;
            }
             var igst_tax = $("#igst_tax").val();
            if (igst_tax=="") {
                $("#igst_tax").css({"border-color":"red"});
                $("#igst_tax").focus();
                process = false;
            }
            return process;
        });
        $("#item_name_id").change(function(){$(this).css('border-color','');});
        $("#selling_rate").keyup(function(){$(this).css('border-color','');});
        $("#cgst_tax").keyup(function(){$(this).css('border-color','');});
        $("#sgst_tax").keyup(function(){$(this).css('border-color','');});
        $("#igst_tax").keyup(function(){$(this).css('border-color','');});
        $("#sub_item_name").keyup(function(){$(this).css('border-color','');});

        //Tax Value Calculation
            $("#cgst_tax").bind("keyup ", function(e) {
            var cgst_tax =parseFloat($('#cgst_tax').val());
            var selling_rate = $('#selling_rate').val();
            var cgst_tax_amount =$('#cgst_tax_amount').val();
            if(selling_rate=='')
            {
                alert('Invalid Selling Rate!!');
                $('#selling_rate').focus();
                $('#cgst_tax').val('');
            }
            else
            {
                if(cgst_tax>100)
                {
                    alert('Invalid CGST Percent!!');
                    $('#cgst_tax').focus();
                    $('#cgst_tax').val('');
                    $('#cgst_tax_amount').val('');
                }
                else
                {
                    cgst_tax_amt=(selling_rate*cgst_tax)/100;
                    $('#cgst_tax_amount').val(cgst_tax_amt);
                }
            }
        });
             $("#sgst_tax").bind("keyup ", function(e) {
            var sgst_tax =parseFloat($('#sgst_tax').val());
            var selling_rate = $('#selling_rate').val();
            var sgst_tax_amount =$('#sgst_tax_amount').val();
            if(selling_rate=='')
            {
                alert('Invalid Selling Rate!!');
                $('#selling_rate').focus();
                $('#sgst_tax').val('');
            }
            else
            {
                if(sgst_tax>100)
                {
                    alert('Invalid SGST Percent!!');
                    $('#sgst_tax').focus();
                    $('#sgst_tax').val('');
                    $('#sgst_tax_amount').val('');
                }
                else
                {
                    sgst_tax_amt=(selling_rate*sgst_tax)/100;
                    $('#sgst_tax_amount').val(sgst_tax_amt);
                }
            }
        });
            $("#igst_tax").bind("keyup ", function(e) {
            var igst_tax =parseFloat($('#igst_tax').val());
            var selling_rate = $('#selling_rate').val();
            var igst_tax_amount =$('#igst_tax_amount').val();
            if(selling_rate=='')
            {
                alert('Invalid Selling Rate!!');
                $('#selling_rate').focus();
                $('#igst_tax').val('');
            }
            else
            {
                if(igst_tax>100)
                {
                    alert('Invalid IGST Percent!!');
                    $('#igst_tax').focus();
                    $('#igst_tax').val('');
                    $('#igst_tax_amount').val('');
                }
                else
                {
                    igst_tax_amt=(selling_rate*igst_tax)/100;
                    $('#igst_tax_amount').val(igst_tax_amt);
                }
            }
        });
           /*  $('#sub_item_name').keyup(function() 
            {
                var str = $('#sub_item_name').val();
                var spart = str.split(" ");
                for ( var i = 0; i < spart.length; i++ )
                {
                    var j = spart[i].charAt(0).toUpperCase();
                    spart[i] = j + spart[i].substr(1);
                }
              $('#sub_item_name').val(spart.join(" "));
        });*/
    });
</script>