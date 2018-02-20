<?php
include ('topfile.php');

if(!isUserLoggedIn())
{
  header('location: login.php');
  exit();
}

include ("form_functions.php");

//echo "index: cookie is: ".$_COOKIE['loginid']." and the session is: ".$_SESSION[SESSION]['loginid'];    

if(isset($_GET['compemlist']))
{
  $show=base64_decode($_GET['compemlist']);
  if($show==200)
    echo '<script>
            alert("'.strtoupper(base64_decode($_GET['cmna'])).' List Created.");
            document.location.href="./index.php?em='.base64_encode('getCreateNewCompanyEmailList').'";
          </script>';
  else if($show==0)
    echo '<script>
            alert("Please check your internet connection.!");
            document.location.href="./index.php?em='.base64_encode('getCreateNewCompanyEmailList').'";
          </script>';
  else if($show==-1)
    echo '<script>
            alert("Error! Could not create list.");
            document.location.href="./index.php?em='.base64_encode('getCreateNewCompanyEmailList').'";
          </script>';
  else
    echo '<script>
            alert("Error code '.$show.'. '.base64_decode($_GET['errdet']).'!");
            document.location.href="./index.php?em='.base64_encode('getCreateNewCompanyEmailList').'";
          </script>';
}

if(isset($_GET['emlist']))
{
  $show=base64_decode($_GET['emlist']);
  if($show==200)
    echo '<script>
            alert("Email-ID added to list '.strtoupper(base64_decode($_GET['lna'])).'.");
            document.location.href="./index.php?em='.base64_encode('getAddNewEmailToList').'";
          </script>';
  else if($show==0)
    echo '<script>
            alert("Please check your internet connection.!");
            document.location.href="./index.php?em='.base64_encode('getAddNewEmailToList').'";
          </script>';
  else if($show==-1)
    echo '<script>
            alert("Email-ID not added to list '.base64_decode($_GET['lna']).'.");
            document.location.href="./index.php?em='.base64_encode('getAddNewEmailToList').'";
          </script>';
  else
    echo '<script>
            alert("Error code '.$show.'. '.base64_decode($_GET['errdet']).'!");
            document.location.href="./index.php?em='.base64_encode('getAddNewEmailToList').'";
          </script>';        
}

if(isset($_GET['sdmail']))
{
  $show=base64_decode($_GET['sdmail']);
  if($show==200 || $show==204)
    echo '<script>
            alert("Email sent to all '.strtoupper(base64_decode($_GET['lna'])).' Members.");
            document.location.href="./index.php?em='.base64_encode('getSendBulkEmail').'";
          </script>';
  else if($show==0)
    echo '<script>
            alert("Please check your internet connection.!");
            document.location.href="./index.php?em='.base64_encode('getSendBulkEmail').'";
          </script>';
  else if($show==-1)
    echo '<script>
            alert("Email not sent.");
            document.location.href="./index.php?em='.base64_encode('getSendBulkEmail').'";
          </script>';
  else if($show==-2)
    echo '<script>
            alert("List contains no subscribers!.");
            document.location.href="./index.php?em='.base64_encode('getSendBulkEmail').'";
          </script>';
  else
    echo '<script>
            alert("Error code '.$show.'. '.base64_decode($_GET['errdet']).'!");
            document.location.href="./index.php?em='.base64_encode('getSendBulkEmail').'";
          </script>';
}

if(isset($_GET['sdemail']))
{
  $show=base64_decode($_GET['sdemail']);
  if($show=='sent')
    echo '<script>
            alert("Email sent");
            document.location.href="./index.php?em='.base64_encode('getSendEmail').'";
          </script>';
  else if($show='queued')
    echo '<script>
            alert("Email Queued, will be sent shortly");
            document.location.href="./index.php?em='.base64_encode('getSendEmail').'";
          </script>';
  else if($show=='rejected')
    echo '<script>
            alert("Email not sent. Reason:'.base64_decode($_GET['errdet']).'");
            document.location.href="./index.php?em='.base64_encode('getSendEmail').'";
          </script>';
  else if($show==-1)
    echo '<script>
            alert("'.base64_decode($_GET['errdet']).'.");
            document.location.href="./index.php?em='.base64_encode('getSendEmail').'";
          </script>';
  else
    echo '<script>
            alert("Status code: '.$show.'. Reason: '.base64_decode($_GET['errdet']).'!");
            document.location.href="./index.php?em='.base64_encode('getSendEmail').'";
          </script>';
}

?>

<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>PADMA TRADERS</title>

<!--link rel="shortcut icon" href="favicon1.ico"/-->

<!--link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"-->

<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.css" />   
<link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css" />   

<script src="js/jquery-1.12.4.js"></script>
<script src="js/jquery-ui.js"></script>


<script type="text/javascript">

/*var xhrobj=false;
if(window.XMLHttpRequest)
  xhrobj=new XMLHttpRequest();
else if(window.ActiveXObject)
  xhrobj=new ActiveXObject("Microsoft.XMLHttp");

function getData(src)
{
if(xhrobj)
{
var obj=document.getElementById('body-id');

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

var myvar="<?php 
  if(isset($_SESSION[SESSIONPADMA]['padmalastlogin']))
  {
    $date1=str_replace(' ', '-', date('d M Y'));
    $date2=str_replace(' ', '-', substr($_SESSION[SESSIONPADMA]['padmalastlogin'],0,11));
    $diff=strtotime($date1)-strtotime($date2);

    if(strtotime($date1)==strtotime($date2))
      echo 'Last Login: Today'.substr($_SESSION[SESSIONPADMA]['padmalastlogin'],11);
    else if($diff==86400)
      echo 'Last Login: Yesterday'.substr($_SESSION[SESSIONPADMA]['padmalastlogin'],11);
    else 
      echo 'Last Login: '.$_SESSION[SESSIONPADMA]['padmalastlogin'];
  }
   else
      echo 'Logged in First Time';?>";
</script>
</head>

<body id="body-id">
  
<div id="loading">
  <img id="loading-image" src="images/spinner.gif" alt="Loading..." />
</div>

<div class="header-div">

  <div class="header-logo-div">
    <a href="index.php" title="Padma Traders"><img src="images/mainlogo.png" style="height: 40px; width: 200px;"></a>
  </div>

  <div class="header-links-div">
    <ul class="top-links">
      <!--li><a>Master</a></li>
      <li><a>Master</a></li>
      <li><a>Master</a></li-->
      <li><a id="mid">
        <img style="vertical-align: middle; height: 15px; width: 15px; border-radius: 10px;" src="images/admin.png" onmouseover="callme();" onmouseout="callme();" /> Welcome <?php echo $_SESSION[SESSIONPADMA]['padmausername'];?> <i class="fa fa-caret-down"></i>
        </a>
        <ul id="user-menu-id" class="user-menu">
          <li>&nbsp;<span id="log"><script type="text/javascript">document.getElementById("log").innerText=myvar;</script></span>&nbsp;</li>
          <li><a><i class="fa fa-user"></i> My Profile</a></li>
          <li><a><i class="fa fa-lock"></i> Change Password</a></li>
          <li class="divider"></li>
          <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>

</div>

<div class="sidebar-div">

  <ul class="sidebar-menu">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

    <li><a id="masterid"><i class="fa fa-credit-card" aria-hidden="true"></i> Master <i id="iid" class="fa fa-angle-down go-right"></i></a>
        <ul id="sidebar-sub-menu-id" class="sidebar-sub-menu">
          <li><a id="link-id1" href="?us=<?php echo base64_encode('getUserList');?>&page=<?php echo base64_encode(1);?>">User list</a></li>
          <li><a id="link-id2" href="?emp=<?php echo base64_encode('getEmployeeList');?>&page=<?php echo base64_encode(1);?>">Employee List</a></li>
          <li><a id="link-id3" href="?client=<?php echo base64_encode('getClientList');?>&page=<?php echo base64_encode(1);?>">Customer List</a></li>
        </ul>
    </li>

    <li><a id="sendemailid"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Send Email <i id="iid" class="fa fa-angle-down go-right"></i></a>
      <ul id="sidebar-sub-menu-id1" class="sidebar-sub-menu">
        <li><a id="link-id4" href="?em=<?php echo base64_encode('getCreateNewCompanyEmailList');?>" onclick="//displayfade('create_new_company_email_list_form');">Create Company Email LIST</a></li>
        <li><a id="link-id5" href="?em=<?php echo base64_encode('getAddNewEmailToList');?>" onclick="//displayfade('add_new_email_to_list_form');">Add Email to Company LIST</a></li>
        <li><a id="link-id6" href="?em=<?php echo base64_encode('getSendBulkEmail');?>" onclick="//displayfade('send_bulk_email_form');">Send Bulk Email</a></li>
        <li><a id="link-id7" href="?em=<?php echo base64_encode('getSendEmail');?>" onclick="//displayfade('send_email_form');">Send Email</a></li>
      </ul>
    </li>

    <li><a id="projectid"><i class="fa fa-cubes" aria-hidden="true"></i> Project <i id="iid" class="fa fa-angle-down go-right"></i></a>
      <ul id="sidebar-sub-menu-id2" class="sidebar-sub-menu">
        <li><a id="link-id8" href="?proj=<?php echo base64_encode('getProjectList');?>&page=<?php echo base64_encode(1);?>"> Project list </a></li>
      </ul>
    </li>

    <li><a><i class="fa fa-newspaper-o" aria-hidden="true"></i> Reports </a></li>
  </ul>

</div>

<div id="main-div-id" class="main-div">
<?
  getNewUserForm();
  getNewEmployeeForm();
  getNewClientForm();
  getNewContactPersonForm();
  getNewProjectForm();

  /*
  href="?em=<?php echo base64_encode('getCreateNewCompanyEmailList');?>"getCreateNewCompanyEmailList();
  getAddNewEmailToList();
  getSendBulkEmail();*/
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
        //document.getElementById("sidebar-sub-menu-id").style.display="block";
        document.getElementById("link-id1").classList.add("active");
        document.getElementById("masterid").style.color="#163550";
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
        //document.getElementById("sidebar-sub-menu-id").style.display="block";
        document.getElementById("link-id2").classList.add("active");
        document.getElementById("masterid").style.color="#163550";
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
        //document.getElementById("sidebar-sub-menu-id").style.display="block";
        document.getElementById("link-id3").classList.add("active");
        document.getElementById("masterid").style.color="#163550";
      </script>';
      $show(); 
    }
}

if(isset($_GET['proj']))
{
  $show=base64_decode($_GET['proj']);
    if($show=='getProjectList')
    {
      echo '
      <script>
        //document.getElementById("sidebar-sub-menu-id").style.display="block";
        document.getElementById("link-id8").classList.add("active");
        document.getElementById("projectid").style.color="#163550";
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
        //document.getElementById("sidebar-sub-menu-id").style.display="block";
        document.getElementById("link-id2").classList.add("active");
        document.getElementById("masterid").style.color="#163550";
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
        //document.getElementById("sidebar-sub-menu-id").style.display="block";
        document.getElementById("link-id3").classList.add("active");
        document.getElementById("masterid").style.color="#163550";  
      </script>';
      $show(); 
    } 
}

if(isset($_GET['em']))
{
  $show=base64_decode($_GET['em']);

    if($show=='getCreateNewCompanyEmailList')
    {
      echo '
      <script>
        //document.getElementById("sidebar-sub-menu-id1").style.display="block";
        document.getElementById("link-id4").classList.add("active");
        document.getElementById("sendemailid").style.color="#163550";  
      </script>';
      $show(); 
    }

    if($show=='getAddNewEmailToList')
    {
      echo '
      <script>
        //document.getElementById("sidebar-sub-menu-id1").style.display="block";
        document.getElementById("link-id5").classList.add("active");
        document.getElementById("sendemailid").style.color="#163550";  
      </script>';

      $show(); 
    } 

    if($show=='getSendBulkEmail')
    {
      echo '
      <script>
        //document.getElementById("sidebar-sub-menu-id1").style.display="block";
        document.getElementById("link-id6").classList.add("active");
        document.getElementById("sendemailid").style.color="#163550";  
      </script>';

      $show(); 
    }  

    if($show=='getSendEmail')
    {
      echo '
      <script>
        //document.getElementById("sidebar-sub-menu-id1").style.display="block";
        document.getElementById("link-id7").classList.add("active");
        document.getElementById("sendemailid").style.color="#163550";  
      </script>';

      $show(); 
    } 
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