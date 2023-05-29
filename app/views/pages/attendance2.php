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
            <li><a href="#">Attendance view</a></li>
            <li class="active">attendance</li>
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
                        <h3 class="panel-title">ATTENDANCE</h3>
                    </div>

                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <div class="row">
                        <div class="col-md-12" style="margin-left: 20px;">
                            <form id="add_form" class="form-horizontal" onsubmit="show_attendance(event)">
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label class="control-label" for="year"><b>Year</b> </label>
                                        <select id="year" name="year" class="form-control">
                                            <option value="2023" selected>2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label" for="month"><b>Month</b> </label>
                                        <select id="month" name="month" class="form-control">
                                            <option value="01" selected>January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <!-- <label class="control-label" for="to_date"><b>Employee</b> </label> -->
                                        <!-- <select id="employee" name="user_id" class="form-control" onchange="set_emp_name(this)">
                                                    <option value="" selected>== Select ==</option>
                                                    <option value="all" selected>All</option>
                                                        <?php
                                                        if (isset($data['emp_list'])) {
                                                            foreach ($data['emp_list'] as $user) {
                                                        ?>
                                                        <option value="<?= $user['biometric_employee_code']; ?>" ><?= $user['first_name'] ?> &nbsp; <?= $user['last_name'] ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select> -->
                                    </div>

                                    <div class="col-md-2">
                                        <label class="control-label" for="department_mstr_id">&nbsp;</label>
                                        <button id="submit_serach_btn" class="btn btn-success btn-block" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <h4 style="padding-left: 20px;">Employee : <span class="badge badge-info" id="employee_display"></span></h4>
                    <button class="bg-success" onclick="ExportToExcel('xlsx')" style="margin-left: 20px;">Export Excel</button>

                    <!--===================================================-->
                    <!--End Horizontal Form-->

                    <div class="table-responsive" style="height: 500px;">

                        <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0">
                            <thead style="position: sticky;top: 0; background:#eee;">
                                <tr>
                                    <th>
                                        <div style="flex:1;text-align:center">Sl</div>
                                    </th>
                                    <th>
                                        <div></div>
                                        <div style="display: flex;">
                                            <div style="text-align:center">Date</div>
                                        </div>
                                    </th>



                                    <?php if (isset($data['emp_list'])) { //echo '<pre>';print_r($data); 
                                    ?>
                                        <?php foreach ($data['emp_list'] as $emp) { ?>

                                            <th>
                                                <div class="text-center" style="border-bottom: 1px solid black;"><?php echo $emp['first_name'] ?></div>
                                                <div style="display: flex;">
                                                    <div style="flex:1;text-align:center">In</div>
                                                    <div style="flex:1;text-align:center">Out</div>
                                                </div>
                                            </th>

                                        <?php } ?>
                                    <?php  } ?>

                                </tr>

                            </thead>


                            <tbody id="add_body">


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h2 id="no_data" class="text-danger text-center"></h2>
    <!--===================================================-->
    <!--End page content-->

</div>

<!--===================================================-->
<!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>

<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

<script type="text/javascript">
    function ExportToExcel(type, fn, dl) {
        var elt = document.getElementById('demo_dt_basic');
        var wb = XLSX.utils.table_to_book(elt, {
            sheet: "sheet1"
        });
        return dl ?
            XLSX.write(wb, {
                bookType: type,
                bookSST: true,
                type: 'base64'
            }) :
            XLSX.writeFile(wb, fn || ('AllAttendanceList.' + (type || 'xlsx')));
    }

    let employ_list_with_bm = <?php echo json_encode($data['emp_list'])  ?>

    let gl_emp_name = ""

    function set_emp_name(e) {
        gl_emp_name = e.options[e.selectedIndex].text

        console.log(employ_list_with_bm)
        // console.log(e.options[e.selectedIndex].text);
    }

    let add_obj;

    function show_attendance(e) {
        e.preventDefault()
        $("#loadingDiv").show();
        document.getElementById('add_body').innerHTML = '';

        // alert(m);
        sunday_format()
        $.ajax({
            type: "get",
            // url: "http://192.168.0.32/fpAttendance/index.php",
            url: "http://192.168.0.173/fpAttendance/index.php",
            dataType: "json",
            data: $('#add_form').serialize(),
            beforeSend: function() {
                console.log('ready to send substream.............')
            },
            success: function(data) {

                if (data.error == true) {
                    alert('no data found for this employee')
                    $('#no_data').html('No data found !!')
                    $("#loadingDiv").hide();
                } else {
                    console.log(data.data)

                    $("#loadingDiv").hide();
                    add_into_table_function(data.data)

                    return;

                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#loadingDiv").hide();
            }
        });

    }


    function sunday_format() {
        var m = document.getElementById('month').value;
        var y = document.getElementById('year').value;

        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        var d = new Date(y, m - 1, 21);
        var monthName = months[d.getMonth()]; // "July" (or current month)
        // debugger;
        // var mn = m.value;
        // alert(m);alert(y);
        // document.getElementById('add_body').innerHTML=''
        for (s = 1; s <= 31; s++) {

            document.getElementById('add_body').innerHTML += `<tr id="trow${s}"> <td><div ></div><div style="display: flex;"><div style="flex:1;text-align:center">${s}</div></td><td><div style="flex:1;text-align:center;font-weight:bold;">${s}-${monthName || '01'}-${y}</div></div><!-- //first td for first ordered user --></td></tr>`

            // console.log('s = ',s)
            // let c_date = new Date()
            //         let today_date = c_date.getDate()
            //         let day_index = c_date.getDay()
            //         let next_sunday_gap = 7-day_index
            //         let next_sunday_date = today_date+next_sunday_gap
            //         console.log('next sunday ',next_sunday_date)

            //         //for low date case
            //         if(next_sunday_date>=s){
            //             let sunday_check_var = next_sunday_date - s
            //             console.log('sunday check var ',sunday_check_var,' for ',s)
            //             console.log('divv ',sunday_check_var%7)
            //             if(sunday_check_var%7==0){
            //                 console.log(s," is sunday")
            //                 $('#trow'+s).addClass('bg-danger')
            //             }else{
            //                 console.log("other day")
            //             }
            //         }
            //         else{
            //             let sunday_check_var = s -next_sunday_date 
            //             if(sunday_check_var%7==0){
            //                 console.log(s," is sunday")
            //                 $('#trow'+s).addClass('bg-danger')
            //             }else{
            //                 console.log("other day")
            //             }  
            //         }
            //         console.log('s = last  ',s)
        }
    }


    sunday_format()


    function add_into_table_function(data) {
        employe_list_with_bm_max_index = employ_list_with_bm.length - 1
        attd_data_max_index = data.length - 1

        for (i = 0; i <= employe_list_with_bm_max_index; i++) {
            let user_id_employee = employ_list_with_bm[i].biometric_employee_code
            let user_collect = []

            for (j = 0; j <= attd_data_max_index; j++) {
                bio_user_id_from_db = data[j].user_id
                let id_index = 0

                if (bio_user_id_from_db == user_id_employee) {
                    id_index++
                    user_collect = [...user_collect, data[j]]

                }
            }
            console.log('user collect...', user_collect)

            user_max_index = user_collect.length - 1
            console.log('max index============= ', user_max_index)
            // console.log('checking for ====',user_collect[0])
            for (k = 0; k <= 30; k++) {
                let match_check = 0
                let entry_tm
                let exit_tm




                for (l = 0; l <= user_max_index; l++) {

                    let dt = new Date(user_collect[l].entry_date)
                    let day = dt.getDate()



                    if (k + 1 == day) {

                        match_check++
                        let En_all = user_collect[l].entry_date
                        let Exit_all = user_collect[l].exist_date
                        if (En_all !== "NO PUNCH") {
                            entry_tm = En_all.substring(11)
                        } else {
                            exit_tm = "<span class='text-danger'>" + En_all + "</span>"
                        }

                        if (Exit_all !== "NO PUNCH") {
                            exit_tm = Exit_all.substring(11)
                        } else {
                            exit_tm = "<span class='text-danger'>" + Exit_all + "</span>"
                        }

                        var en = new Date(user_collect[l].entry_date);

                        var ex = new Date(user_collect[l].exist_date);
                    }

                }


                // console.log('today index ',day_index,'today date ',day_date)


                // console.log(match_check)
                if (match_check > 0) {


                    console.log('matched for ', k + 1)
                    document.getElementById(`trow${k+1}`).innerHTML += ` <td><div style="display: flex;"><div style="flex:1;text-align:center">${entry_tm}</div><div style="flex:1;text-align:center">&nbsp;${exit_tm}<p class="text-success text-bold"><small>${(Math.floor((ex-en)/1000/60/60)|| 0) +':'+(Math.floor((ex-en)/1000/60%60) || 0)} H</small></p></div></div></td>`
                } else {
                    document.getElementById(`trow${k+1}`).innerHTML += ` <td><div style="display: flex;"><div style="flex:1;text-align:center"></div><div style="flex:1;text-align:center"></div></div></td>`
                }


            }
        }

    }
</script>

<script>
    $(document).ready(function() {
        debugger;
        $('#demo_dt_basic').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [
                'pageLength',
                {
                    text: 'copy',
                    extend: "copy",
                    footer: {
                        text: ''
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                    }
                }, {
                    text: 'csv',
                    extend: "csv",
                    title: "Report",
                    footer: {
                        text: ''
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                    }
                }, {
                    text: 'excel',
                    extend: "excel",
                    title: "Report",
                    footer: {
                        text: ''
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                    }
                }, {
                    text: 'pdf',
                    extend: "pdf",
                    title: "Report",
                    download: 'open',
                    footer: {
                        text: ''
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                    }
                }
            ]
        });
    });
</script>