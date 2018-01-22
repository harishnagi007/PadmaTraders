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
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/main.css" />

<script src="js/jquery-1.12.4.js"></script>
<script src="js/jquery-ui.js"></script>


<script type="text/javascript">
/*
var xhrobj=false;
if(window.XMLHttpRequest)
  xhrobj=new XMLHttpRequest();
else if(window.ActiveXObject)
  xhrobj=new ActiveXObject("Microsoft.XMLHttp");

function getData(src)
{
if(xhrobj)
{
var obj=document.getElementById('main-div-id');

xhrobj.open("GET",src);
xhrobj.onreadystatechange=function()
{
if(xhrobj.readyState==4&&xhrobj.status==200)
{
obj.innerHTML=xhrobj.responseText;
}
}
xhrobj.send(null);
}
}*/

var myvar="&nbsp;"+"<?php 
  if(isset($_SESSION[SESSIONPADMA]['lastlogin']))
  {
    $date1=str_replace(' ', '-', date('d M Y'));
    $date2=str_replace(' ', '-', substr($_SESSION[SESSIONPADMA]['lastlogin'],0,11));
    $diff=strtotime($date1)-strtotime($date2);

    if(strtotime($date1)==strtotime($date2))
      echo 'Last Login: Today'.substr($_SESSION[SESSIONPADMA]['lastlogin'],11);
    else if($diff==86400)
      echo 'Last Login: Yesterday'.substr($_SESSION[SESSIONPADMA]['lastlogin'],11);
    else 
      echo 'Last Login: '.$_SESSION[SESSIONPADMA]['lastlogin'];
  }
   else
      echo 'Logged in First Time';?>";
</script>
</head>

<body>

<div class="header-div">

  <div class="header-logo-div">
    <a href="index2.php" title="Padma Traders"><img src="images/pdt.png" style="height: 20px; width: 200px;"></a>
  </div>

  <div class="header-links-div">
    <ul class="top-links">
      <!--li><a>Master</a></li>
      <li><a>Master</a></li>
      <li><a>Master</a></li-->
      <li><a id="mid" onclick="clickme();"><img style="vertical-align: middle; height: 15px; width: 15px; border-radius: 10px;" src="images/admin.png" onmouseover="callme();" onmouseout="callme();" /> Welcome <?php echo $_SESSION[SESSIONPADMA]['username'];?> <i class="fa fa-caret-down"></i></a>
        <ul id="user-menu-id" class="user-menu">
          <li><a href="#"><i class="fa fa-user"></i> My Profile</a></li>
          <li><a href="#"><i class="fa fa-lock"></i> Change Password</a></li>
          <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>

</div>

<div class="sidebar-div">

  <ul class="sidebar-menu">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a id="aaid">Master <i id="iid" class="fa fa-angle-down go-right"></i></a>
        <ul id="sidebar-sub-menu-id" class="sidebar-sub-menu">
          <li><a id="link-id1" href="?us=<?php echo base64_encode('getUserList');?>">User list</a></li>
          <li><a id="link-id2" href="?emp=<?php echo base64_encode('getEmployeeList');?>">Employee List</a></li>
          <li><a id="link-id3" href="?client=<?php echo base64_encode('getClientList');?>">Customer List</a></li>
        </ul>
    </li>
    <li><a id="sid">Send Email <i id="iid" class="fa fa-angle-down go-right"></i></a>
      <ul id="sidebar-sub-menu-id1" class="sidebar-sub-menu">
        <li><a id="link-id4" onclick="displayfade('add_new_email_to_list_form');">Add Email to LIST</a></li>
        <li><a id="link-id5" href="mailchimp.php">Send Bulk Email</a></li>
      </ul>
    </li>
    <li><a>Project</a></li>
    <li><a>Reports</a></li>
  </ul>

</div>

<div id="main-div-id" class="main-div">
  <?
    getNewUserForm();
    getNewEmployeeForm();
    getNewClientForm();
    getNewContactPersonForm();

    getAddNewEmailToList();
  ?>

  <div id="fade" style=""></div>

  <?
  //getUserList(); 
  //getEmployeeList();

  if(isset($_GET['us']))
  {
    $show=base64_decode($_GET['us']);
      if($show=='getUserList')
      {
        echo '
        <script>
          document.getElementById("sidebar-sub-menu-id").style.display="block";
          document.getElementById("link-id1").classList.add("active");
          document.getElementById("aaid").style.color="#163550";
        </script>';
        $show(); 
      }
  }

  if(isset($_GET['emp']))
  {
    $show=base64_decode($_GET['emp']);
      if($show=='getEmployeeList')
      {
        echo '
        <script>
          document.getElementById("sidebar-sub-menu-id").style.display="block";
          document.getElementById("link-id2").classList.add("active");
          document.getElementById("aaid").style.color="#163550";
        </script>';
        $show(); 
      }
  }

  if(isset($_GET['client']))
  {
    $show=base64_decode($_GET['client']);
      if($show=='getClientList')
      {
        echo '
        <script>
          document.getElementById("sidebar-sub-menu-id").style.display="block";
          document.getElementById("link-id3").classList.add("active");
          document.getElementById("aaid").style.color="#163550";
        </script>';
        $show(); 
      }
  }

  if(isset($_GET['empd']))
  {
    $show=base64_decode($_GET['empd']);
      if($show=='getEmployeeDetails')
      {
        echo '
        <script>
          document.getElementById("sidebar-sub-menu-id").style.display="block";
          document.getElementById("link-id2").classList.add("active");
          document.getElementById("aaid").style.color="#163550";
        </script>';
        $show(); 
      }
  }

  if(isset($_GET['clientd']))
  {
    $show=base64_decode($_GET['clientd']);
      if($show=='getClientDetails')
      {
        echo '
        <script>
          document.getElementById("sidebar-sub-menu-id").style.display="block";
          document.getElementById("link-id3").classList.add("active");
          document.getElementById("aaid").style.color="#163550";  
        </script>';
        $show(); 
      } 
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

 if(isset($_GET['emlist']))
  {
  $show=base64_decode($_GET['emlist']);
  if($show==1)
    echo '<script>
            alert("Email-ID added to list '.base64_decode($_GET['lna']).'!");
            document.location.href="./index.php";
          </script>';
  else
    echo '<script>
            alert("Email-ID not added to list '.base64_decode($_GET['lna']).'!");
            document.location.href="./index.php";
          </script>';
  }

  //getSuccessAndFailure();
  ?>
  
</div>


<footer>
  <? //include('footer.php');?>
</footer>

<script src="js/main.js" type="text/javascript">
  //document.getElementById('id4').valueAsDate = new Date();
</script>

</body>
</html>