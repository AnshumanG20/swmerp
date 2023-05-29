<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--DataTables [ OPTIONAL ]-->
<link href="<?=URLROOT;?>/common/assets/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/responsive.bootstrap.min.css" rel="stylesheet">
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                       <!-- <h1 class="page-header text-overflow">Department List</h1>//-->
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->

                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>

					<li class="active">Resignation List</li>
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
					                <h5 class="panel-title">Upload Experience Letter</h5>
                                    <div class="pad-btm col-md-12">
                                        <a href="<?=URLROOT;?>/resignation_Controller/resignation_List" class="btn btn-danger" style="float:right;"><i class="fa fa-arrow-left" aria-hidden="true"></i>           Back</a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="col-md-12">
                                            <input type="hidden" id="emp_id" name="emp_id" class="form-control" readonly value="<?=$data["_id"];?>">
                                            <div class="form-group">
                                                <label class="col-md-3">Upload Experience Letter <span class="text-danger">*</span>
                                                    <br>
                                                    <span class="text-danger">Preferred pdf : Maximum size of 2MB</span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="file" class="form-control" id="experience_letter_doc_path" name="experience_letter_doc_path" />
                                                </div>

                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-md btn-success btn-block" id="btn_upload_experience_letter" name="btn_upload_experience_letter">Upload</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <!--<div class="col-md-3">
                                                <button type="button" class="btn btn-md btn-danger btn-block" id="btn_download_experience_letter" name="btn_download_experience_letter">Download <i class="fa fa-arrow-down" aria-hidden="true"></i></button>
                                            </div>//-->
                                        </div>

                                    </form>

                                    <div class="col-md-12">
                                         <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <embed src="<?=URLROOT.'/uploads/'.$data['get_experience_letter']['create_experience_letter'];?>" width="100%" height="500px" />
                                    </div>
                                </div>
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
<!--DataTables [ OPTIONAL ]-->
<script src="<?=URLROOT;?>/common/assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/jszip.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/pdfmake.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/vfs_fonts.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/buttons.html5.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/dataTables.responsive.min.js"></script>
<script>
    $("#btn_upload_experience_letter").click(function(){
    process = true;
        if($("#experience_letter_doc_path").val()==""){
            $("#experience_letter_doc_path").css('border-color', 'red'); process=false;
        }
        return process;
    });
    $("#experience_letter_doc_path").change(function() {
        var input = this;
        var ext = $(this).val().split('.').pop().toLowerCase();
        if($.inArray(ext, ['pdf']) == -1) {
            $("#experience_letter_doc_path").val("");
            alert('invalid document type');
        }
        if (input.files[0].size > 2097152) { 
            $("#experience_letter_doc_path").val("");
            alert("Try to upload file less than 2MB"); 
        }
        keyDownNormal(input);
    });
</script>