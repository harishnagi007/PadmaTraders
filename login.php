<?php
include ('topfile.php');

if(isUserLoggedIn())
{
	//print_r($_SESSION);
	header('location: index.php');
	exit();
}

$show="";
$display="none";
if(isset($_GET['lerr']))
{
  $show=base64_decode($_GET['lerr']);
  $display="block";
}


//echo "login: the cookie is: ".$_COOKIE['loginid']." and the session is: ".$_SESSION[SESSIONPADMA]['loginid'];	
?>

<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
<title>PADMA TRADERS Login</title>
<link rel="stylesheet" type="text/css" href="css/main.css" />
</head>	

<body>

<header>
	<? include('header.php'); ?>
</header>

<div id="err-id" class="err-div" style="display: <? echo $display; ?>;" >
	<p style="font-size: 15px; color: red; margin: 5px 0 0 15px;"><? echo $show; ?>
	</p>
</div>

<div class="login-main-div">
	<p style="height: 30px; width: 350px; margin: 0; background-color: #337ab7; border-radius: 1px;">
		<span style="color: white; margin: 2px 0 0 10px;  display: inline-block; font-size: 20px;">Secure Login</span>
	</p>

	<form id="login-form" action="check_login.php" method="post"><!--login form-->
		<p class="login-backimg1"></p><!--username box-->
		<input list="browsers" id="txt1" class="login-input-box1" name="padmaloginid" type="text" placeholder="Username" title="Enter Username" maxlength="20" required onkeypress="return isLoginKey(event);" autocomplete="off" /><br>
		 <!--datalist id="browsers">
    		<option value="Internet Explorer">
    		<option value="Firefox">
    		<option value="Chrome">
    		<option value="Opera">
    		<option value="Safari">
  		</datalist-->
	
		<p class="login-backimg2"></p><!--password box-->
		<input id="txt2" class="login-input-box2" name="padmapassword" type="password" placeholder="Password" title="Enter Password" maxlength="10" required onkeypress="return isSpaceKey(event);" autocomplete="off" /><br>

		<input style="margin: 16px 0 0 75px; height: 20px; width: 20px;" name="remember_me" type="checkbox" />
		<span style="font-size: 20px;">Remember Me</span><br>

		<input class="login-input-btn" style="margin: 10px 0 0 20px" type="submit" value="Login" /><!--submit button-->
		<input class="login-input-btn" style="margin: 10px 0 0 10px" type="button" value="Reset" onclick="reset();" /><!--reset button-->
	</form>	
</div>

<?
// getError();
?>

<script src="js/main.js" type="text/javascript"></script>

</body>
</html>