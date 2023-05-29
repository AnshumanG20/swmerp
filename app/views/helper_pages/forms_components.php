<?php require APPROOT . '/views/layout_helper/header.php'; ?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Advanced Form Elements</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Forms</a></li>
					<li class="active">Advanced Form Elements</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">

					            <div class="row">
					                <div class="col-lg-12">
					                    <div class="panel">
					                        <div class="panel-heading">
					                            <h3 class="panel-title">Select 2</h3>
					                        </div>
					                        <div class="panel-body">
					                            <p>Select2 is a jQuery based replacement for select boxes. It can take a regular select box and turn it into: </p>
					                            <select id="demo-select2" class="demo_select2 form-control">
					                                <optgroup label="Alaskan/Hawaiian Time Zone">
					                                    <option value="AK">Alaska</option>
					                                    <option value="HI">Hawaii</option>
					                                </optgroup>
					                                <optgroup label="Pacific Time Zone">
					                                    <option value="CA">California</option>
					                                    <option value="NV">Nevada</option>
					                                    <option value="OR">Oregon</option>
					                                    <option value="WA">Washington</option>
					                                </optgroup>
					                                <optgroup label="Mountain Time Zone">
					                                    <option value="AZ">Arizona</option>
					                                    <option value="CO">Colorado</option>
					                                    <option value="ID">Idaho</option>
					                                    <option value="MT">Montana</option>
					                                    <option value="NE">Nebraska</option>
					                                    <option value="NM">New Mexico</option>
					                                    <option value="ND">North Dakota</option>
					                                    <option value="UT">Utah</option>
					                                    <option value="WY">Wyoming</option>
					                                </optgroup>
					                                <optgroup label="Central Time Zone">
					                                    <option value="AL">Alabama</option>
					                                    <option value="AR">Arkansas</option>
					                                    <option value="IL">Illinois</option>
					                                    <option value="IA">Iowa</option>
					                                    <option value="KS">Kansas</option>
					                                    <option value="KY">Kentucky</option>
					                                    <option value="LA">Louisiana</option>
					                                    <option value="MN">Minnesota</option>
					                                    <option value="MS">Mississippi</option>
					                                    <option value="MO">Missouri</option>
					                                    <option value="OK">Oklahoma</option>
					                                    <option value="SD">South Dakota</option>
					                                    <option value="TX">Texas</option>
					                                    <option value="TN">Tennessee</option>
					                                    <option value="WI">Wisconsin</option>
					                                </optgroup>
					                                <optgroup label="Eastern Time Zone">
					                                    <option value="CT">Connecticut</option>
					                                    <option value="DE">Delaware</option>
					                                    <option value="FL">Florida</option>
					                                    <option value="GA">Georgia</option>
					                                    <option value="IN">Indiana</option>
					                                    <option value="ME">Maine</option>
					                                    <option value="MD">Maryland</option>
					                                    <option value="MA">Massachusetts</option>
					                                    <option value="MI">Michigan</option>
					                                    <option value="NH">New Hampshire</option>
					                                    <option value="NJ">New Jersey</option>
					                                    <option value="NY">New York</option>
					                                    <option value="NC">North Carolina</option>
					                                    <option value="OH">Ohio</option>
					                                    <option value="PA">Pennsylvania</option>
					                                    <option value="RI">Rhode Island</option>
					                                    <option value="SC">South Carolina</option>
					                                    <option value="VT">Vermont</option>
					                                    <option value="VA">Virginia</option>
					                                    <option value="WV">West Virginia</option>
					                                </optgroup>
					                            </select>

					                            <hr class="new-section-sm bord-no">
					                            <p class="text-main text-bold mar-no">Placeholder</p>
					                            <p>A placeholder value can be defined and will be displayed until a selection is made.</p>
					                            <select id="demo-select2-placeholder" class="form-control">
					                                <optgroup label="Alaskan/Hawaiian Time Zone">
					                                    <option value="AK">Alaska</option>
					                                    <option value="HI">Hawaii</option>
					                                </optgroup>
					                                <optgroup label="Pacific Time Zone">
					                                    <option value="CA">California</option>
					                                    <option value="NV">Nevada</option>
					                                    <option value="OR">Oregon</option>
					                                    <option value="WA">Washington</option>
					                                </optgroup>
					                                <optgroup label="Mountain Time Zone">
					                                    <option value="AZ">Arizona</option>
					                                    <option value="CO">Colorado</option>
					                                    <option value="ID">Idaho</option>
					                                    <option value="MT">Montana</option>
					                                    <option value="NE">Nebraska</option>
					                                    <option value="NM">New Mexico</option>
					                                    <option value="ND">North Dakota</option>
					                                    <option value="UT">Utah</option>
					                                    <option value="WY">Wyoming</option>
					                                </optgroup>
					                                <optgroup label="Central Time Zone">
					                                    <option value="AL">Alabama</option>
					                                    <option value="AR">Arkansas</option>
					                                    <option value="IL">Illinois</option>
					                                    <option value="IA">Iowa</option>
					                                    <option value="KS">Kansas</option>
					                                    <option value="KY">Kentucky</option>
					                                    <option value="LA">Louisiana</option>
					                                    <option value="MN">Minnesota</option>
					                                    <option value="MS">Mississippi</option>
					                                    <option value="MO">Missouri</option>
					                                    <option value="OK">Oklahoma</option>
					                                    <option value="SD">South Dakota</option>
					                                    <option value="TX">Texas</option>
					                                    <option value="TN">Tennessee</option>
					                                    <option value="WI">Wisconsin</option>
					                                </optgroup>
					                                <optgroup label="Eastern Time Zone">
					                                    <option value="CT">Connecticut</option>
					                                    <option value="DE">Delaware</option>
					                                    <option value="FL">Florida</option>
					                                    <option value="GA">Georgia</option>
					                                    <option value="IN">Indiana</option>
					                                    <option value="ME">Maine</option>
					                                    <option value="MD">Maryland</option>
					                                    <option value="MA">Massachusetts</option>
					                                    <option value="MI">Michigan</option>
					                                    <option value="NH">New Hampshire</option>
					                                    <option value="NJ">New Jersey</option>
					                                    <option value="NY">New York</option>
					                                    <option value="NC">North Carolina</option>
					                                    <option value="OH">Ohio</option>
					                                    <option value="PA">Pennsylvania</option>
					                                    <option value="RI">Rhode Island</option>
					                                    <option value="SC">South Carolina</option>
					                                    <option value="VT">Vermont</option>
					                                    <option value="VA">Virginia</option>
					                                    <option value="WV">West Virginia</option>
					                                </optgroup>
					                            </select>

					                            <hr class="new-section-sm bord-no">
					                            <p class="text-main text-bold mar-no">Multiple select boxes</p>
					                            <p>Select2 also supports multi-value select boxes. The select below is declared with the <code>multiple</code> attribute.</p>
					                            <select id="demo-select2-multiple-selects" multiple="multiple" class="form-control">
					                                <optgroup label="Alaskan/Hawaiian Time Zone">
					                                    <option value="AK">Alaska</option>
					                                    <option value="HI">Hawaii</option>
					                                </optgroup>
					                                <optgroup label="Pacific Time Zone">
					                                    <option value="CA">California</option>
					                                    <option value="NV">Nevada</option>
					                                    <option value="OR">Oregon</option>
					                                    <option value="WA">Washington</option>
					                                </optgroup>
					                                <optgroup label="Mountain Time Zone">
					                                    <option value="AZ">Arizona</option>
					                                    <option value="CO">Colorado</option>
					                                    <option value="ID">Idaho</option>
					                                    <option value="MT">Montana</option>
					                                    <option value="NE">Nebraska</option>
					                                    <option value="NM">New Mexico</option>
					                                    <option value="ND">North Dakota</option>
					                                    <option value="UT">Utah</option>
					                                    <option value="WY">Wyoming</option>
					                                </optgroup>
					                                <optgroup label="Central Time Zone">
					                                    <option value="AL">Alabama</option>
					                                    <option value="AR">Arkansas</option>
					                                    <option value="IL">Illinois</option>
					                                    <option value="IA">Iowa</option>
					                                    <option value="KS">Kansas</option>
					                                    <option value="KY">Kentucky</option>
					                                    <option value="LA">Louisiana</option>
					                                    <option value="MN">Minnesota</option>
					                                    <option value="MS">Mississippi</option>
					                                    <option value="MO">Missouri</option>
					                                    <option value="OK">Oklahoma</option>
					                                    <option value="SD">South Dakota</option>
					                                    <option value="TX">Texas</option>
					                                    <option value="TN">Tennessee</option>
					                                    <option value="WI">Wisconsin</option>
					                                </optgroup>
					                                <optgroup label="Eastern Time Zone">
					                                    <option value="CT">Connecticut</option>
					                                    <option value="DE">Delaware</option>
					                                    <option value="FL">Florida</option>
					                                    <option value="GA">Georgia</option>
					                                    <option value="IN">Indiana</option>
					                                    <option value="ME">Maine</option>
					                                    <option value="MD">Maryland</option>
					                                    <option value="MA">Massachusetts</option>
					                                    <option value="MI">Michigan</option>
					                                    <option value="NH">New Hampshire</option>
					                                    <option value="NJ">New Jersey</option>
					                                    <option value="NY">New York</option>
					                                    <option value="NC">North Carolina</option>
					                                    <option value="OH">Ohio</option>
					                                    <option value="PA">Pennsylvania</option>
					                                    <option value="RI">Rhode Island</option>
					                                    <option value="SC">South Carolina</option>
					                                    <option value="VT">Vermont</option>
					                                    <option value="VA">Virginia</option>
					                                    <option value="WV">West Virginia</option>
					                                </optgroup>
					                            </select>

					                        </div>
					                    </div>
					                    <div class="panel">
					                        <div class="panel-heading">
					                            <h3 class="panel-title">Bootstrap Timepicker</h3>
					                        </div>
					                        <div class="panel-body">
					                            <p>Easily select a time for a text input using your mouse or keyboards arrow keys.</p>
					                            <br>
					                            <p class="text-main text-bold">Text input</p>

					                            <!--Bootstrap Timepicker : Text Input-->
					                            <!--===================================================-->
					                            <input id="demo-tp-textinput" type="text" class="form-control">

					                            <hr class="new-section-sm bord-no">
					                            <p class="text-main text-bold mar-btm">Component</p>

					                            <!--Bootstrap Timepicker : Component-->
					                            <!--===================================================-->
					                            <div class="input-group date">
					                                <input id="demo-tp-com" type="text" class="form-control">
					                                <span class="input-group-addon"><i class="demo-pli-clock"></i></span>
					                            </div>
					                            <!--===================================================-->

					                        </div>
					                    </div>
					                    <div class="panel">
					                        <div class="panel-heading">
					                            <h3 class="panel-title">Bootstrap Datepicker</h3>
					                        </div>
					                        <div class="panel-body">
					                            <p>Bootstrap-datepicker provides a flexible datepicker widget in the Twitter bootstrap style.</p><br>
					                            <p class="text-main text-bold">Text input</p>


					                            <!--Bootstrap Datepicker : Text Input-->
					                            <!--===================================================-->
					                            <div id="demo-dp-txtinput">
					                                <input type="text" class="form-control">
					                            </div>
					                            <!--===================================================-->

					                            <hr class="new-section-sm bord-no">

					                            <p class="text-main text-bold">Component</p>

					                            <!--Bootstrap Datepicker : Component-->
					                            <!--===================================================-->
					                            <div id="demo-dp-component">
					                                <div class="input-group date">
					                                    <input type="text" class="form-control">
					                                    <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
					                                </div>
					                                <small class="text-muted">Auto close on select</small>
					                            </div>
					                            <!--===================================================-->

					                            <hr class="new-section-sm bord-no">
					                            <p class="text-main text-bold">Range</p>

					                            <!--Bootstrap Datepicker : Range-->
					                            <!--===================================================-->
					                            <div id="demo-dp-range">
					                                <div class="input-daterange input-group" id="datepicker">
					                                	<span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
					                                    <input type="text" class="form-control" name="start" />
					                                    <span class="input-group-addon">to</span>
					                                    <input type="text" class="form-control" name="end" />
					                                    <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
					                                </div>
					                            </div>				
					                        </div>
					                    </div>
					                    <div class="panel">
					                        <div class="panel-heading">
					                            <h3 class="panel-title">Mask Class</h3>
					                        </div>
					                        <div class="panel-body">
					                        	<div class="row">
					                        		<div class="col-lg-6">
					                        			Mobile No
					                        			<input type="text" class="mask_mobile_no form-control">
					                        		</div>
					                        		<div class="col-lg-6">
					                        			DatePicker
						                                <div class="input-group date">
						                                    <input type="text" id="datepickerWithMask" class="form-control mask_date">
						                                    <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
						                                </div>
						                                <small class="text-muted">Auto close on select</small>
							                        </div>
					                        	</div>
					                        </div>
					                    </div>
					                    <div class="panel">
					                        <div class="panel-heading">
					                            <h3 class="panel-title">Loading Progress</h3>
					                        </div>
					                        <div class="panel-body">
					                        	<div class="row">
					                        		<div class="col-lg-6">
					                        			<button id="loadingDivShow" data-toggle="button" class="btn btn-lg btn-default btn-active-info" type="button" value="0" onclick="loadingDivFun(this.value);">
										                    Loading Show
										                </button>
					                        		</div>
					                        	</div>
					                        </div>
					                    </div>



					                    <div class="panel">
					                        <div class="panel-heading">
					                            <h3 class="panel-title">Bootstrap Switch Button</h3>
					                        </div>
					                        <div class="panel-body">
					                        	<div class="row">
					                        		<div class="col-lg-12">
					                        			<h1>Sizes</h1>
					                        			<label>Bootstrap toggle is available in different sizes.</label>
					                        			<br>
					                        			<input type="checkbox" checked data-toggle="toggle" data-size="lg">
														<input type="checkbox" checked data-toggle="toggle">
														<input type="checkbox" checked data-toggle="toggle" data-size="sm">
														<input type="checkbox" checked data-toggle="toggle" data-size="xs">
					                        		</div>
					                        	</div>
					                        	<div class="row">
					                        		<div class="col-lg-12">
					                        			<h1>Custom Sizes</h1>
					                        			<label>Bootstrap toggle can handle custom sizes by data-width and data-height options.</label>
					                        			<br>
					                        			<input type="checkbox" checked data-toggle="toggle" data-width="100" data-height="75">
														<input type="checkbox" checked data-toggle="toggle" data-height="75">
														<input type="checkbox" checked data-toggle="toggle" data-width="100">
					                        		</div>
					                        	</div>
					                        	<div class="row">
					                        		<div class="col-lg-12">
					                        			<h1>Colors</h1>
					                        			<label>Bootstrap Toggle implements all standard bootstrap 4 button colors.</label>
					                        			<br>
					                        			<input type="checkbox" checked data-toggle="toggle" data-onstyle="primary">
														<input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
														<input type="checkbox" checked data-toggle="toggle" data-onstyle="danger">
														<input type="checkbox" checked data-toggle="toggle" data-onstyle="warning">
														<input type="checkbox" checked data-toggle="toggle" data-onstyle="info">
														<input type="checkbox" checked data-toggle="toggle" data-onstyle="dark">
					                        		</div>
					                        	</div>
					                        	<div class="row">
					                        		<div class="col-lg-12">
					                        			<h1>HTML, Icons, Images</h1>
					                        			<label>You can easily add icons or images since html is supported for on/off text.</label>
					                        			<br>
					                        			<input type="checkbox" checked data-toggle="toggle" data-on="<i class='fa fa-play'></i> Play" data-off="<i class='fa fa-pause'></i> Pause">
					                        		</div>
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
<?php require APPROOT . '/views/layout_helper/footer.php'; ?>
<script type="text/javascript">
function loadingDivFun(val){
	if(val==0){
		$("#loadingDivShow").val(1);
		$("#loadingDiv").show();
	}else{
		$("#loadingDivShow").val(0);
		$("#loadingDiv").hide();
	}
}
$(document).on('nifty.ready', function() {
	//$("#loadingDiv").show();
    $("#demo-select2").select2();
    $("#demo-select2-placeholder").select2({
        placeholder: "Select a state",
        allowClear: true
    });
    $("#demo-select2-multiple-selects").select2();

    $('#demo-tp-com').timepicker();
    $('#demo-tp-textinput').timepicker({
        minuteStep: 5,
        showInputs: false,
        disableFocus: true
    });

    $('#demo-dp-txtinput input').datepicker();
    $('#demo-dp-component .input-group.date').datepicker({ 
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });
    $('#datepickerWithMask').datepicker({ 
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });

    $('#demo-dp-range .input-daterange').datepicker({
        format: "yyyy-mm-dd ",
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true
    });

});
</script>