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
                        <h1 class="page-header text-overflow">Candidate List</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Recruitment</a></li>
					<li class="active">Candidate List</li>
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
					                <h5 class="panel-title">Candidate List</h5>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="<?=URLROOT;?>/form_Controller/job_post_list" class="btn btn-warning" style="float:right;"><i class="fa fa-arrow-left" aria-hidden="true"></i>           Back</a> <a href="<?=URLROOT;?>/Reports/deactivatedCandidateReport_list" class="btn btn-danger" style="float:right;margin-right:20px"><i class="fa fa-arrow-left" aria-hidden="true"></i> Deactivated List</a>
                                        </div>
                                    </div>
                                    <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Reports/candidateReport_list">
                                        <div class="col-md-3" style="padding-right: 40px; padding-left: 40px;">
                                            <div class="form-group ">
                                                <label class="control-label" for="designation_id">Designation</label>
                                                <select id="designation_idd" name="designation_idd" class="form-control">
                                                    <option value="">All</option>
                                                     <?php if(isset($data["designation_id"])):
                                                        foreach($data["designation_id"] as $value): ?>
                                                        <option value="<?=$value["_id"]?>"<?=(isset($data["designation_idd"]))?($data["designation_idd"]==$value['_id'])?"SELECTED":"":"";?>><?=$value["designation_name"]?></option>
                                                        <?php
                                                         endforeach;
                                                      endif; ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-3" style="padding-right: 40px; padding-left: 40px;">
                                            <div class="form-group ">
                                                <label class="control-label" for="status">Status</label>
                                                <select id="status" name="status" class="form-control">
                                                    <option value="">All</option>
                                                    <option value="1"<?=(isset($data["status"]))?($data["status"]==1)?"SELECTED":"":"";?>>Need To Send call Letter</option>
                                                    <option value="2"<?=(isset($data["status"]))?($data["status"]==2)?"SELECTED":"":"";?>>Called For Interview</option>
                                                    <option value="3"<?=(isset($data["status"]))?($data["status"]==3)?"SELECTED":"":"";?>>Canceled Interview</option>
                                                    <option value="4"<?=(isset($data["status"]))?($data["status"]==4)?"SELECTED":"":"";?>>Candidate Accepted Interview Call</option>
                                                    <option value="5"<?=(isset($data["status"]))?($data["status"]==5)?"SELECTED":"":"";?>>Candidate Reject Interview Call</option>
                                                    <option value="6"<?=(isset($data["status"]))?($data["status"]==6)?"SELECTED":"":"";?>>Candidate Request To Reshedule Interview Date</option>
                                                    <option value="7"<?=(isset($data["status"]))?($data["status"]==7)?"SELECTED":"":"";?>> HR Round Completed</option>
                                                    <option value="8"<?=(isset($data["status"]))?($data["status"]==8)?"SELECTED":"":"";?>>Interview Process Completed</option>
                                                    <option value="9"<?=(isset($data["status"]))?($data["status"]==9)?"SELECTED":"":"";?>>Offer Letter Sent To The Candidate Mail</option>
                                                    <option value="10"<?=(isset($data["status"]))?($data["status"]==10)?"SELECTED":"":"";?>>Candidate Now Be A Part Of Our Organisation</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="btnsearch">&nbsp;</label>
                                                <button class="btn btn-success btn-block" id="btnsearch" name="btnsearch" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </form>
					            </div>
                                
                                <div class="panel-body">
                                   
                                
					               

                                    <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Candidate Name</th>
                                                <th>Position Applied for</th>
                                                <th>Project Name</th>
                                                <th>Location Applied for</th>
                                                <th>Personal Phone No.</th>
                                                <th>Status</th>
                                                <th>View</th>
                                                <th>Edit</th>
                                                <th>Action</th>
                                                <!-- <th>View Profile</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($data["applied_applicant_list"])):?>
                                                 <?php if(!empty($data["applied_applicant_list"])):?>
                                                     <?php $i=0; foreach ($data["applied_applicant_list"] as $value):?>
                                                        <tr>

                                                            <td class="text-center"><?=++$i;?></td>
                                                            <td><?=$value["first_name"]." ".$value["middle_name"]." ".$value["last_name"];?></td>
                                                            <td><?=$value["designation_name"];?></td>
                                                            <td><?=$value["project_name"];?></td>
                                                            <td><?=$value["city"];?></td>
                                                            <td><?=$value["personal_phone_no"];?></td>
                                                            <td>
                                                                <?php if($value["_status"]==1)
                                                                { ?>
                                                                     Need To Send call Letter
                                                                <?php }
                                                                elseif($value["_status"]==2)
                                                                { ?>
                                                                    Called For Interview
                                                                <?php }
                                                                elseif($value["_status"]==3)
                                                                { ?>
                                                                     Canceled Interview
                                                                <?php }
                                                                elseif($value["_status"]==4)
                                                                { ?>
                                                                     Candidate Accepted Interview Call
                                                                <?php }
                                                                elseif($value["_status"]==5)
                                                                { ?>
                                                                     Candidate Reject Interview Call
                                                                <?php }
                                                                elseif($value["_status"]==6)
                                                                { ?>
                                                                     <a href="<?=URLROOT;?>/form_Controller/interview_call_status/<?=$value["candidate_details_id"];?>"  class="text-danger">Candidate Request To Reshedule Interview Date</a>
                                                                <?php }
                                                                elseif($value["_status"]==7)
                                                                { ?>
                                                                     HR Round Completed
                                                                <?php }
                                                                elseif($value["_status"]==8)
                                                                { ?>
                                                                     Interview Process Completed
                                                                <?php }

                                                                elseif($value["_status"]==9)
                                                                { ?>
                                                                     Offer Letter Sent To The Candidate Mail
                                                                <?php }
                                                                elseif($value["_status"]==10)
                                                                { ?>
                                                                     Candidate Now Be A Part Of Our Organisation
                                                                <?php }
                                                                ?>

                                                            </td>

                                                            <td><a href="<?=URLROOT;?>/form_Controller/candidate_brief_description/<?=$value["candidate_details_id"];?>" class="btn btn-warning">View</a></td>

                                                            <td>
                                                   
                                                   
                                                           <!-- separate edit -->
                                                                <div class="btn-group dropdown">
                                                                    <button class="btn btn-success btn-active-mint dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown"  type="button">
                                                                    <i class="fa fa-edit"></i> <i class="dropdown-caret caret-down"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a href="<?=URLROOT;?>/Candidate/walkincandidateAddUpdate/<?=$value["job_post_details_id"];?>/1/<?=$value["candidate_details_id"];?>"><i class="fa fa-edit"></i> Basic Details</a></li>

                                                                        <li><a href="<?=URLROOT;?>/Candidate/walkincandidateAddUpdate/<?=$value["job_post_details_id"];?>/2/<?=$value["candidate_details_id"];?>"><i class="fa fa-edit"></i> Contact Details</a></li>
                                                                        <li><a href="<?=URLROOT;?>/Candidate/walkincandidateAddUpdate/<?=$value["job_post_details_id"];?>/3/<?=$value["candidate_details_id"];?>"><i class="fa fa-edit"></i> Academic Details</a></li>
                                                                        <li><a href="<?=URLROOT;?>/Candidate/walkincandidateAddUpdate/<?=$value["job_post_details_id"];?>/4/<?=$value["candidate_details_id"];?>"><i class="fa fa-edit"></i> Employment Details</a></li>
                                                                        <li><a href="<?=URLROOT;?>/Candidate/walkincandidateAddUpdate/<?=$value["job_post_details_id"];?>/5/<?=$value["candidate_details_id"];?>"><i class="fa fa-edit"></i> Document Details</a></li>
                                                                        
                                                                    
                                                                    </ul>
                                                                </div>
                                                   
                                                   
                                                            </td>
                                                        <td>
                                                           <!--<a onclick="d_active_fun(<?=$value['candidate_details_id'];?>)" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i> Deactivate</a> -->
                                                       <button onclick="deactivate_modal_show(<?=$value['candidate_details_id'];?>)" type="button" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i> Deactivate</button>
                                                   </td>
                                                            
                                                        </tr>
                                                    <?php endforeach;?>
                                                 <?php else:?>
                                                        <tr>
                                                            <td colspan="8" style="text-align: center;">No Current Jobs Are Opening!!</td>
                                                        </tr>
                                                 <?php endif;?>
                                             <?php endif;?>
 					                    </tbody>
					                </table>
                                </div>
					        </div>
					    </div>
					</div>
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>


            <!-- deactivate confirm reason box -->
            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


  <div class="modal-dialog" role="document">
  <form onsubmit="get_action(this)" method="POST">
        <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reason For Deactivation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <textarea id="deactivate_text" onkeypress="change_case(this)" onchange="change_case(this)" style="padding: 10px" name="reason_comment" id="reason_data" cols="60" rows="5"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i> Deactivate</a>
      </div>
    </div>
  </form>
  
  </div>
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
<script type="text/javascript">
    $(document).ready(function() {

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
        <?php if ($msgg = flashToast("candidateDeactivateSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("candidateActivateSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>

        







		$('#demo_dt_basic').DataTable({
			responsive: true,
			dom: 'Bfrtip',
	        lengthMenu: [
	            [ 10, 25, 50, -1 ],
	            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
	        ],
	        buttons: [
	        	'pageLength',
	        {
				text: 'copy',
				extend: "copy",
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6] }
			}, {
				text: 'csv',
				extend: "csv",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6] }
			}, {
				text: 'excel',
				extend: "excel",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6] }
			}, {
				text: 'pdf',
				extend: "pdf",
				title: "Report",
				download: 'open',
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6] }
			}]
		});
	});

    let candidate_id;
     function get_action(form) {
        form.action = "<?=URLROOT;?>/Candidate/walkincandidateAddUpdate/deactivate/0/"+candidate_id;
    }

async function change_case(e){
    
    let input_value = await e.value;
    let up = input_value.toUpperCase();
    e.value = up
}

function deactivate_modal_show(can_id){
    candidate_id = can_id
    $('#deactivate_text').val('')
    $('#exampleModal').modal('show')
}
function deactivate_modal_hide(){
    $('#exampleModal').modal('hide')
}

    function d_active_fun(ID)
    {
        if (confirm("Do You Want To Deactivate This Candidate ?")) {
            window.location.href = "<?=URLROOT;?>/Candidate/walkincandidateAddUpdate/deactivate/0/"+ID;
        } else {
        console.log('delete cancel');
        }
            }
    

	
</script>