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