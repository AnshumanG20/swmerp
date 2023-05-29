<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--Summernote [ OPTIONAL ]-->
<link href="<?=URLROOT;?>/common/assets/plugins/summernote/summernote.min.css" rel="stylesheet">
<style>
    .note-editing-area{
        padding-left: 20%;
        padding-right: 20%;
        /*line-height: 0.7;*/

    }
    /*.note-codable{
        display: none;
    }*/
</style>
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
            <li><a href="#">Recruitment</a></li>
            <li class="active">HR Approval</li>
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
                        <div class="panel-title">
                            Send Offer Letter
                        </div>
                        <a href="<?=URLROOT;?>/InterviewProcessController/interview_process_list" class="btn btn-danger" style="float:right;"><i class="fa fa-arrow-left" aria-hidden="true"></i>           Back</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><br>
                            <div class="col-md-12">
                                <div class="pad-btm clearfix">
                                    <!--Cc & bcc toggle buttons-->
                                    <div class="pull-right pad-btm">
                                        <div class="btn-group">
                                            <!-- <button id="demo-toggle-cc" data-toggle="button" type="button" class="btn btn-sm btn-default btn-active-info">Cc</button>
                                            <button id="demo-toggle-bcc" data-toggle="button" type="button" class="btn btn-sm btn-default btn-active-info">Bcc</button> -->
                                        </div>
                                    </div>
                                </div>
                                <!--Input form-->
                                <form role="form" class="form-horizontal">
                                    <input type="hidden" name="candidate_id" id="candidate_id" value="<?= isset($data['id'])?$data['id']:'' ?>">
                                   <!--  <div class="form-group">
                                        <label class="col-lg-1 control-label text-left" for="inputEmail">To</label>
                                        <div class="col-lg-11">
                                            <input type="email" id="inputEmail" class="form-control">
                                        </div>
                                    </div> -->
                                    <!-- <div id="demo-cc-input" class="hide form-group">
                                        <label class="col-lg-1 control-label text-left" for="inputCc">Cc</label>
                                        <div class="col-lg-11">
                                            <input type="text" id="inputCc" class="form-control">
                                        </div>
                                    </div>
                                    <div id="demo-bcc-input" class="hide form-group">
                                        <label class="col-lg-1 control-label text-left" for="inputBcc">Bcc</label>
                                        <div class="col-lg-11">
                                            <input type="text" id="inputBcc" class="form-control">
                                        </div>
                                    </div> -->
                                    <!-- <div class="form-group">
                                        <label class="col-lg-1 control-label text-left" for="inputSubject">Subject</label>
                                        <div class="col-lg-11">
                                            <input type="text" id="inputSubject" class="form-control">
                                        </div>
                                    </div> -->
                                </form>


                                <!--Attact file button-->
                        <!--<div class="media pad-btm">
                            <div class="media-left">
                                <span class="btn btn-default btn-file">
                                Attachment <input type="file">
                            </span>
                            </div>
                            <div id="demo-attach-file" class="media-body"></div>
                        </div>-->


                        <!--Wysiwyg editor : Summernote placeholder-->
                        <div id="demo-mail-compose"></div>

                        <div class="pad-ver">

                            <!--Send button-->
                            <button id="mail-send-btn" type="button" class="btn btn-primary" onclick="getText()">
                                <i class="demo-psi-mail-send icon-lg icon-fw" ></i> Send Mail
                            </button>

                            <!--Save draft button-->
                            <button id="mail-save-btn" type="button" class="btn btn-default">
                                <i class="demo-pli-mail-unread icon-lg icon-fw"></i> Save Draft
                            </button>

                            <!--Discard button-->
                            <button id="mail-discard-btn" type="button" class="btn btn-default">
                                <i class="demo-pli-mail-remove icon-lg icon-fw"></i> Discard
                            </button>
                        </div>


                        <!--===================================================-->
                        <!-- END COMPOSE EMAIL -->
                    </div>
                </div>
            </div>
            <br>
            <hr>

        </div>
    </div>

    <div class="row">
            <p id="para">
                text() - Sets or returns the text content of selected elements
html() - Sets or returns the content of selected elements (including HTML markup)
val() - Sets or returns the value of form fields


            </p>
    </div>
</div>

<!--===================================================-->
<!--End page content-->



</div>
    <!--===================================================-->
    <!--END CONTENT CONTAINER-->
    <?php require APPROOT . '/views/layout_vertical/footer.php'; ?>
<script src="<?=URLROOT;?>/common/assets/js/demo/mail.js"></script>
    <!--Summernote [ OPTIONAL ]-->
<script src="<?=URLROOT;?>/common/assets/plugins/summernote/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://unpkg.com/html2canvas@1.4.1/dist/html2canvas.js"></script>


<script type="text/javascript">
    function changeAssetType(ID){
        ID = ID.split("asset_type")[1];
        var asset_type = $("#asset_type"+ID).val();
        $('#item_name_id'+ID).html('<option value="">Select</option>');
        if(asset_type!=""){
            $.ajax({
                type:"POST",
                url: "<?=URLROOT;?>/InterviewProcessController/ajaxItemListByAssetType",
                dataType: "json",
                data: {"asset_type":asset_type},
                beforeSend: function() {
                    $("#loadingDiv").show();
                },
                success:function(data){
                    $("#loadingDiv").hide();
                    if(data.response==true){
                        $("#item_name_id"+ID).html(data.data);
                    }
                }
            });

        }
    }

    function changeItemName(ID){
        ID = ID.split("item_name_id")[1];
        var item_name_id = $("#item_name_id"+ID).val();
        $('#sub_item_name'+ID).html('<option value="">Select</option>');
        if(item_name_id!=""){
            $.ajax({
                type:"POST",
                url: "<?=URLROOT;?>/InterviewProcessController/ajaxSubItemListByItemList",
                dataType: "json",
                data: {"item_name_id":item_name_id},
                beforeSend: function() {
                    $("#loadingDiv").show();
                },
                success:function(data){
                    $("#loadingDiv").hide();
                    if(data.response==true){
                        $("#sub_item_name"+ID).html(data.data);
                    }
                }
            });
        }
    }



</script>

<script>
    function assignAsset() {
      var checkBox = document.getElementById("assetcheckbox");
      var rowAdditem = document.getElementById("rowAdditem");
      if (checkBox.checked == true){
        rowAdditem.style.display = "block";
    } else {
     rowAdditem.style.display = "none";
    }
    }

    function sendOfferLetter(){
        $('#sendOfferLetter_modal').modal();
    }

    function getText(){
        //console.log($('.note-editing-area').html());
        debugger;
        // import { jsPDF } from "jspdf";
        var area = document.getElementsByClassName("note-editable");
        var content = $('.note-editable').html();
        var candidate_id = $('#candidate_id').val();
        $('#para').html(content);
        // var content = document.getElementById('demo-mail-compose').innerHTML;
        // alert(content);
        // console.log(content);
        // return;
        $.ajax({

            type:'post',
            url:'<?= URLROOT ?>/InterviewProcessController/candidateSentOfferLetter',
            data:{content:content,candidate_id,candidate_id},

            success:function(result){
                console.log(result);
                alert(result);
            }
        });

    }


    $(document).ready(function(){
        var area = document.getElementsByClassName("note-editing-area");
        area.setAttribute('padding','100');
        $('.note-handle').remove();
    });
</script>