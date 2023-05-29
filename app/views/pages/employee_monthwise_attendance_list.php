<?php require APPROOT . '/views/layout_vertical/header.php'; ?>

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
					<li><a href="#">Reports </a></li>
					<li class="active">Monthwise Attendance Sheet</li>
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
					                <h5 class="panel-title">Monthwise Attendance Sheet</h5>
                                </div>
                                <div class="panel-body">
									<div class ="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Attendance/employee_monthwise_attendance_list">
                                                <div class="form-group">
                                                <div class="col-md-3">
                                                    <label class="control-label" for="account_type"><b>Select Month</b> </label>
                                                    <select class="form-control" name="month" required> 
													<option value="">Select Month</option>
													<option value="01" <?php if(isset($_POST['month'])){ if($_POST['month']=='01'){ ?> selected <?php } } ?> >January</option>
													<option value="02" <?php if(isset($_POST['month'])){ if($_POST['month']=='02'){ ?> selected <?php } } ?> >February</option>
													<option value="03"<?php if(isset($_POST['month'])){ if($_POST['month']=='03'){ ?> selected <?php } } ?> >March</option>
													<option value="04" <?php if(isset($_POST['month'])){ if($_POST['month']=='04'){ ?> selected <?php } } ?> >April</option>
													<option value="05" <?php if(isset($_POST['month'])){ if($_POST['month']=='05'){ ?> selected <?php } } ?> >May</option>
													<option value="06" <?php if(isset($_POST['month'])){ if($_POST['month']=='06'){ ?> selected <?php } } ?> >June</option>
													<option value="07" <?php if(isset($_POST['month'])){ if($_POST['month']=='07'){ ?> selected <?php } } ?> >July</option>
													<option value="08" <?php if(isset($_POST['month'])){ if($_POST['month']=='08'){ ?> selected <?php } } ?> >August</option>
													<option value="09" <?php if(isset($_POST['month'])){ if($_POST['month']=='09'){ ?> selected <?php } } ?> >September</option>
													<option value="10" <?php if(isset($_POST['month'])){ if($_POST['month']=='10'){ ?> selected <?php } } ?> >October</option>
													<option value="11" <?php if(isset($_POST['month'])){ if($_POST['month']=='11'){ ?> selected <?php } } ?> >November</option>
													<option value="12" <?php if(isset($_POST['month'])){ if($_POST['month']=='12'){ ?> selected <?php } } ?> >December</option>
												</select>
                                                </div>
												<div class="col-md-3">
                                                    <label class="control-label" for="payment_mode"><b>Select Year</b> </label>
                                                    <select class="form-control" name="year"> 
														<?php
														for ($i = date('Y'); $i >= 2017; $i--)
														{ 
														?>
															<option <?php if(isset($_POST['year'])){ if($_POST['year']==$i){ ?> selected <?php } } ?> ><?=$i; ?></option>
														<?php
														}
														?>
													</select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="control-label" for="department_mstr_id">&nbsp;</label>
                                                    <button class="btn btn-success btn-block" id="btn_search" name="btn_search" type="submit">Search</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
									<?php
									if(isset($data['month']))
									{
									?>
									<div class="row">
										<div class="col-lg-12">
											<a class="btn btn-primary" href="employee_attendance_excel/<?=$data['year'];?>/<?=$data['month'];?>" style="margin-bottom:5px;">Export</a>
										</div>
									</div>
									<div class="row">
										<div class="table-responsive">
					                <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            
											<tr>
                                                <th>SL.No.</th>
                                                <th>Employee Name</th>
                                                <?php
												if(isset($data['month']))
												{
													if($data['month']!='')
													{
														 $first_day=strtotime($data['year'].'-'.$data['month'].'-01');
														$last_day=strtotime(date("Y-m-t", strtotime($data['year'].'-'.$data['month'].'-28')));
														$i=1;
														while($first_day <= $last_day)
														{
															$dt_nm= date('Y-m-d', $first_day);
															$dt_nmm= date('d/m/Y', $first_day);
															$first_day = strtotime("+1 day", $first_day);
															?>
															<th><?=$dt_nmm;?>
															<?php 
																$weekendDay = date("D", strtotime($dt_nm));
																if($weekendDay=='Sun') { echo '<br/><span class="text-danger">(Sunday)</span>'; } ?>
															</th>
															<?php
														}
													}
												}
												?>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                    if(isset($data["EmployeeList"])):
                                          if($data["EmployeeList"]==""):
                                    ?>
                                            <tr>
                                                <td colspan="2" style="text-align: center;">Data Not Available!!</td>
                                            </tr>
                                    <?php else:
                                            $j=1;
                                            foreach ($data["EmployeeList"] as $value):
                                    ?>
                                            <tr>
												<td><?=$j++;?></td>
                                                <td><?php if($value["middle_name"]=='')
												{
													echo $value["first_name"].' '.$value["last_name"];
												}
												else
												{
													echo $value["first_name"].' '.$value["middle_name"].' '.$value["last_name"];
												}
													?>
													<br/>(<?=$value['employee_code'];?>)</td>
                                                <?php
												if($data['month']!='')
												{
													$first_day=strtotime($data['year'].'-'.$data['month'].'-01');
													$last_day=strtotime(date("Y-m-t", strtotime($data['year'].'-'.$data['month'].'-28')));
													$m=1;
													while($first_day <= $last_day)
													{
														$m++;
														$dt_nm= date('Y-m-d', $first_day);
														$first_day = strtotime("+1 day", $first_day);
														?>
														<td>
															<b>InTime:</b> <?=(isset($value[$m]["in_time"]))?$value[$m]["in_time"]:'<span class="text-danger">N/A</span>';?>
															<br/>
															<b>OutTime:</b> <?=(isset($value[$m]["in_time"]))?$value[$m]["out_time"]:'<span class="text-danger">N/A</span>';?>
														</td>
														<?php
													}
												}
												?>
                                            </tr>
                                        <?php endforeach;?>
                                         <?php endif;  ?>
                                    <?php endif;  ?>
 					                    </tbody>
					                </table>
									</div>
									</div>
									<?php
									}
									?>
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
