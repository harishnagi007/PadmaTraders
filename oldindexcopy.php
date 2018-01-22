<?php
include ('topfile.php');

if(!isUserLoggedIn())
{
  header('location: login.php');
  exit();
}

include ("form_functions.php");

//echo "index: cookie is: ".$_COOKIE['loginid']." and the session is: ".$_SESSION[SESSION]['loginid'];    
?>

<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>PADMA TRADERS</title>
<!--link rel="shortcut icon" href="favicon1.ico"/-->
<!--link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script-->
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/main.css" />
<script src="js/jquery-1.12.4.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">
  var myvar="&nbsp;"+"<?php 
          if(isset($_SESSION[SESSION]['lastlogin']))
          {
            $date1=str_replace(' ', '-', date('d M Y'));
            $date2=str_replace(' ', '-', substr($_SESSION[SESSION]['lastlogin'],0,11));
            $diff=strtotime($date1)-strtotime($date2);

            if(strtotime($date1)==strtotime($date2))
              echo 'Last Login: Today'.substr($_SESSION[SESSION]['lastlogin'],11);
            else if($diff==86400)
              echo 'Last Login: Yesterday'.substr($_SESSION[SESSION]['lastlogin'],11);
            else 
              echo 'Last Login: '.$_SESSION[SESSION]['lastlogin'];
          }
           else
              echo 'Logged in First Time';?>";
</script>
</head>

<body>  
<header>
  <?php include('header.php');?>
</header>

<div style="background-color: #ebfafa; margin: 56px 0 0 0; position: fixed; z-index: 10; width: 100%;">

  <div style="float: right; background-color: #5f5f5f; color: #ffffff; width: auto; z-index: 11; border-radius: 10px 10px 0 0;">
    <!--a href="logout.php" style="float: right; margin: 0 10px 0 0; font-size: 20px;">Logout</a-->
    <p style="float: right; margin: 0 10px 0 0; font-size: 20px;">Welcome <?php echo $_SESSION[SESSION]['username'];?></p>
    <img style="cursor: pointer; float: right; margin: 1.2px 10px 0 5px; height: 24px; width: 25px;" src="images/admin.png" onmouseover="callme();" onmouseout="callme();" />
  </div>

  <div style="float: right; background-color: #5f5f5f; color: #ffffff; width: auto; z-index: 11; border-radius: 10px 10px 0 0;"> 
     <p id="lastlogin" style="float: right; margin: 0 10px 0 0; font-size: 20px;"></p>
  </div>

</div>

<div id="index-main-nav-id" class="index-main-nav"> 
  <a class="logout" href="logout.php" style="float: right; margin: 8px 10px 0 20px; font-size: 20px; border-radius: 5px;">Logout</a>

  <ul style="margin: 0; padding: 0;">
    <li><a>Master</a>
      <div class="index-sub-menu">
        <ul style="margin: 0; padding: 0;">
          <li><a href="?us=<?php echo base64_encode('getUserList');?>">User list</a></li>
          <li><a href="?emp=<?php echo base64_encode('getEmployeeList');?>">Employee List</a></li>
          <li><a href="?client=<?php echo base64_encode('getClientList');?>">Customer List</a></li>
        </ul>
      </div>
    </li>
     <li><a>Other</a>
      <div class="index-sub-menu">
        <ul style="margin: 0; padding: 0;">
          <li><a href="mailchimp.php">Send Mail</a></li>
        </ul>
      </div>
    </li>

        <!--ul class="left">
          <li><a onclick="displayfade('add_new_user_form');" href="#">Add User</a></li>
          <li><a onclick="displayfade('add_new_employee_form');" href="#">Add Employee</a></li>
          <li><a onclick="displayfade('add_new_client_form');" href="#">Add Customer</a></li>
          <li><a href="#">Showtimes &amp; Tickets</a></li>
        </ul>
        <ul class="right">
          <li><a href="?us=<?php //echo base64_encode('getUserList');?>">View Users</a></li>
          <li><a href="?emp=<?php //echo base64_encode('getEmployeeList');?>">View Employees</a></li>
          <li><a href="?client=<?php //echo base64_encode('getClientList');?>">View Customer</a></li>
          <li><a href="#">Showtimes &amp; Tickets</a></li>
        </ul-->

    <!--li><a href="#" >CSS</a>
      <ul class="index-sub-menu">
        <li><a href="#">In Cinemas Now</a></li>
        <li><a href="#">Coming Soon</a></li>
        <li><a href="#">On DVD/Blu-ray</a></li>
        <li><a href="#">Showtimes &amp; Tickets</a></li>
      </ul>
    </li>
    <li><a href="#" >JAVASCRIPT</a>
      <ul class="index-sub-menu">
        <li><a href="#">In Cinemas Now</a></li>
        <li><a href="#">Coming Soon</a></li>
        <li><a href="#">On DVD/Blu-ray</a></li>
        <li><a href="#">Showtimes &amp; Tickets</a></li>
      </ul>
    </li>
    <li><a href="#" >SQL</a></li>
    <li><a href="#" >PHP</a></li>
    <li><a href="#" >BOOTSTRAP</a>
      <ul class="index-sub-menu">
        <li><a href="#">In Cinemas Now</a></li>
        <li><a href="#">Coming Soon</a></li>
        <li><a href="#">On DVD/Blu-ray</a></li>
        <li><a href="#">Showtimes &amp; Tickets</a></li>
      </ul>
    </li>
    <li><a href="#" >Menu</a></li-->
  </ul> 
</div>

<?
getNewUserForm();
getNewEmployeeForm();
getNewClientForm();
getNewContactPersonForm();
?>

<div id="fade" style=""></div>

<?
//getUserList(); 
//getEmployeeList();

if(isset($_GET['us']))
{
  $show=base64_decode($_GET['us']);
    if($show=='getUserList')
    $show(); 
}
if(isset($_GET['emp']))
{
  $show=base64_decode($_GET['emp']);
    if($show=='getEmployeeList')
    $show();  
}
if(isset($_GET['client']))
{
  $show=base64_decode($_GET['client']);
    if($show=='getClientList')
    $show();  
}
if(isset($_GET['empd']))
{
  $show=base64_decode($_GET['empd']);
    if($show=='getEmployeeDetails')
    $show();  
}
if(isset($_GET['clientd']))
{
  $show=base64_decode($_GET['clientd']);
    if($show=='getClientDetails')
    $show();  
}
if(isset($_GET['l']))
{
  $show=base64_decode($_GET['l']);
  if($show==1)
    echo '<script>
            alert("all emails sent!");
            document.location.href="./index.php";
          </script>';
  else
    echo '<script>
            alert("emails not sent!");
            document.location.href="./index.php";
          </script>';
}

?>

<div id="index-main-content-id" class="index-main-content" style="padding: 16px;">    

<!--h1>Fixed Top Navigation Bar</h1>
<h2>Scroll this page to see the effect</h2>
<h2>The navigation bar will stay at the top of the page while scrolling</h2>

<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p>
<p>Some text some text some text some text..</p-->
</div>

<?
//getSuccessAndFailure();
?>

<footer>
  <? //include('footer.php');?>
</footer>

<script src="js/main.js" type="text/javascript">
  //document.getElementById('id4').valueAsDate = new Date();
</script>

</body>
</html>