
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login page | Nifty - Admin Template</title>
    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?=URLROOT;?>/common/assets/css/bootstrap.min.css" rel="stylesheet">
    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?=URLROOT;?>/common/assets/css/nifty.min.css" rel="stylesheet">
    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="<?=URLROOT;?>/common/assets/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?=URLROOT;?>/common/assets/plugins/pace/pace.min.js"></script>        
</head>
<body>
    <div id="container" class="cls-container">
		<div id="bg-overlay"></div>
		<div class="cls-content">
		    <div class="cls-content-sm panel">
		        <div class="panel-body">
		            <div class="mar-ver pad-btm">
		                <h1 class="h3">Account Login</h1>
		                <p>Sign In to your account</p>
		            </div>
		            <form action="<?=URLROOT;?>/HelperController/blank">
		                <div class="form-group">
		                    <input type="text" class="form-control" placeholder="Username" autofocus>
		                </div>
		                <div class="form-group">
		                    <input type="password" class="form-control" placeholder="Password">
		                </div>
		                <div class="checkbox pad-btm text-left">
		                    <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
		                    <label for="demo-form-checkbox">Remember me</label>
		                </div>
		                <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
		            </form>
		        </div>

		        <div class="pad-all">
		            <a href="#" class="btn-link mar-rgt">Forgot password ?</a>
		            <a href="#" class="btn-link mar-lft">Create a new account</a>

		            <div class="media pad-top bord-top">
		                <div class="pull-right">
		                    <a href="#" class="pad-rgt"><i class="demo-psi-facebook icon-lg text-primary"></i></a>
		                    <a href="#" class="pad-rgt"><i class="demo-psi-twitter icon-lg text-info"></i></a>
		                    <a href="#" class="pad-rgt"><i class="demo-psi-google-plus icon-lg text-danger"></i></a>
		                </div>
		                <div class="media-body text-left text-bold text-main">
		                    Login with
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
    </div>
    <script src="<?=URLROOT;?>/common/assets/js/jquery.min.js"></script>
</body>
</html>
