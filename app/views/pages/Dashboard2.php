<?php require APPROOT . '/views/layout_vertical/header.php'; ?>


<!--CONTENT CONTAINER-->


<!--===================================================-->
<div id="content-container">

<?php //print_r($data['getAllEmployee']); ?>

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
            <li><a href="#">Dashboard</a></li>
            <li class="active">Welcome </li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->
    </div>
    <?php   ?>
    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
              
                <div class="panel">
                    <div class="panel-heading">
                        <!-- <h5 class="panel-title">Dashboard</h5> -->
                    </div>
                    <div class="panel-body">


                        <div class="content-wrapper">
                            <!-- Content Header (Page header) -->
                            <div class="content-header">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <!-- <h1 class="m-0">Dashboard</h1> -->
                                        </div><!-- /.col -->
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item active">Dashboard v1</li> -->
                                            </ol>
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                    <!-- <small>Do something here...</small> -->


                                    <div>
 
                                        <a href="#" onclick="showdiv()" onmouseover="bigImg(this)" onmouseout="normalImg(this)">
                                            <i class="fa fa-gift fa-3x pull-right" id="gbox" style="color:#fd1d1d;">
                                                 <span style="display:none;" id="tooltip_text">Birthday Box</span>
                                            </i>


                                        </a>

                                        <div class="col-md-4 pull-right" style="display:none; border: 5px dotted skyblue; border-radius: 20px; border-style:double; overflow-y:scroll;height: 400px;" id="show_div_id">
                                            <h3 class="text-center">BIRTHDAY BOX <span><i id="fade_icon" class="fa fa-close pull-right text-danger fa-2x" onmouseover="showfade(this)" onmouseout="hidefade(this)" onclick="closeDiv()"></i></span></h3>
                                            <p class="text-center">(Recent Birthday's)</p>
                                                     <?php if (isset($data['getAllEmployee'])): ?>

                                                        <?php foreach ($data['getAllEmployee'] as $key=> $value): ?>
                                                        
                                                            <p>
                                                                <span>
                                                                    <?="<strong style='float:left;'>". $value['first_name']." ".$value['last_name']."</strong>"; ?>
                                                               </span>
                                                                <span>
                                                                    <?="<strong style='float:right;'>". date('d M',strtotime($value['d_o_b']))."</strong>"; ?>
                                                               </span>
                                                               <?php if (date('d-m',strtotime($value['d_o_b'])) == date('d-m')) : ?>
                                                               <br>
                                                                   <span class="text"><img src="https://123goodmorningquotes.com/wp-content/uploads/2020/05/Happy-Birthday-Sister-GIF-2.gif" style="width:200px;height: 100px;border-radius: 10px;"></span>
                                                               <?php endif ?>

                                                            </p><br>
                                                            <hr>
                                                        <?php endforeach ?>
                                                        
                                                    <?php endif ?>
                                               <!--  </tbody>
                                            </table> -->

                                        </div>
                                        <?php if(isset($data['emp_details'])){  ?>

                                        <h1 class="text-primary">Welcome <?= $data['emp_details']['first_name'] ?></h1>
                                        <h5>(<?php if(isset($data['getDesignataion'])){echo $data['getDesignataion']['designation_name'];}   ?>)</h5>

                                    <?php } ?>

                                    </div>


                                    <div class="col-md-4" style="float: right;" id="last_login_details">
                                        <h4>Your Last Login Details</h4>
                                        <table class="table table-hover table-border">
                                            <thead>
                                                <tr>
                                                    <th>IP Address</th>
                                                    <th>LoggedIn At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($data['getLastLoginDetails'])) {
                                                    // print_r($data['getLastLoginDetails']);
                                                    foreach ($data['getLastLoginDetails'] as $val) { ?>
                                                       
                                                            

                                                        <tr>
                                                            <td><?= $val['ip_address'] ?></td>
                                                            <td><?= date("d-M-Y h:i:A",strtotime($val['created_on'])); ?></td>
                                                        </tr>


                                                <?php }}
                                                
                                                ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div><!-- /.container-fluid -->
                            </div>
                            <!-- /.content-header -->

                            <!-- Main content -->

                            <!-- <h1 class="h1"> Hello</h1> -->


                            <!-- /.content -->
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

<script>
    $(document).ready(function() {
        function animatebox(){
             $("#gbox").css("color", "#fb7c7c");
             $("#gbox").fadeOut(1000);
             $("#gbox").fadeIn(1000);

             // animatebox();
        }

        animatebox();
            
     });

    function showdiv(){
        $('#show_div_id').css('display','');
        $('#last_login_details').hide();
    }
    function closeDiv(){
        $('#show_div_id').css('display','none');
        $('#last_login_details').show();
    }

    function bigImg(){
        $('#tooltip_text').css('display','');
    }
    function normalImg(){
        $('#tooltip_text').css('display','none');
    }

    function showfade(){
        $('#fade_icon').css('opacity','0.5');
    }
    function hidefade(){
        $('#fade_icon').css('opacity','1');
    }
</script>