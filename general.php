<?php
include ('db_conn.php');

function isUserLoggedIn()
{
	if((isset($_SESSION[SESSIONPADMA]['padmaloginid'])))
	{
		return true;
		exit();
	}
	else if((isset($_COOKIE['padmaloginid'])))
	{
		$padmaloginid=$_COOKIE['padmaloginid'];
		$padmapassword=$_COOKIE['padmapassword'];

		$conn=db_conn();

		if($conn)
		{
			$query=mssql_query("select * from padma_login where loginid='$padmaloginid' and password='$padmapassword'");
			$rows=mssql_num_rows($query);
			if($rows>0)
			{	
			    $rows=mssql_fetch_assoc($query);
			    extract($rows);
			    //echo "the value is:".$rows;
			    //echo $remember_me;
			    $_SESSION[SESSIONPADMA]=Array();
			    $_SESSION[SESSIONPADMA]['padmauserid']=$ID; 
			    $_SESSION[SESSIONPADMA]['padmaloginid']=$LOGINID;
			    $_SESSION[SESSIONPADMA]['padmausername']=$NAME;
			    $_SESSION[SESSIONPADMA]['padmausertype']=$USERTYPE;
			
		    	//print_r($_SESSION[SESSION]);
		    	//exit();
			    mssql_close($conn);
			    return true;
			    exit();
			}
			else
				echo "the value is: ".$rows;
		}
		else
		{
			//echo "the value is:".$rows;
			die("db error: ".mssql_get_last_message());
		}
	}
	else
	{
		session_unset();
		$_SESSION[SESSIONPADMA]=array();
		return false;
		exit();
	}
}

function loggedOut()
{
	session_unset();
	session_destroy();
	
	setcookie('padmaloginid','',time()-3600);
	setcookie('padmapassword','',time()-3600);
	setcookie('error','',time()-3600);
	setcookie('success','',time()-3600);

	header('location: login.php');
	exit();
}











function getMsg()
{

if(isset($_GET["msg"]))
  $msg=base64_decode($_GET["msg"]);

if($msg=="Record saved successfully!")
  $printmsg='<span style="background-color: #DFF2BF; color: green; padding: 0 13px 0 13px; border: 1px solid green; border-radius: 10px;">'.$msg.'</span>';
else if($msg=="Record updated successfully!")
  $printmsg='<span style="background-color: #DFF2BF; color: green; padding: 0 13px 0 13px; border: 1px solid green; border-radius: 10px;">'.$msg.'</span>';
else if($msg=="Record not saved successfully!")
  $printmsg='<span style="background-color: #FFBABA; color: red; padding: 0 13px 0 13px; border: 1px solid red; border-radius: 10px;">'.$msg.'</span>';
else if($msg=="Record not updated successfully!")
  $printmsg='<span style="background-color: #FFBABA; color: red; padding: 0 13px 0 13px; border: 1px solid red; border-radius: 10px;">'.$msg.'</span>';

return '<div style="width: auto; overflow: hidden;"><p style="text-align: center; float: left; width: 100%; margin: 6px 0 0 10px; color: #4CAF50; font-weight: bold; font-size: 20px;">'.$printmsg.'</p></div>';
}

function getError()
{
	/*if($_COOKIE["error"]=="error")
	{
		echo "<script>alert('Please enter valid LoginID and Password.');</script>";
		unset($_COOKIE["error"]);
		//exit();
	}

	if($_COOKIE["error"]=="dberror")
	{
		echo "<script>alert('Cannot connect to server.');</script>";
		unset($_COOKIE["error"]);
		//exit();
	}*/
}

function getSuccessAndFailure()
{
	/*if($_COOKIE["success"]=="success")
	{
		echo "<script>alert('Record Saved.');</script>";
		unset($_COOKIE["success"]);
		//exit();
	}

	if($_COOKIE["success"]=="failure")
	{
		echo "<script>alert('Record not saved.(db error)');</script>";
		unset($_COOKIE["success"]);
		//exit();
	}

	if($_COOKIE["usersuccess"]=="success")
	{
		echo "<script>alert('Record updated.');</script>";
		unset($_COOKIE["success"]);
		//exit();
	}

	if($_COOKIE["usersuccess"]=="failure")
	{
		echo "<script>alert('Record not updated.(db error)');</script>";
		unset($_COOKIE["success"]);
		//exit();
	}

	if($_COOKIE["empsuccess"]=="success")
	{
		echo "<script>alert('Record updated.');</script>";
		unset($_COOKIE["success"]);
		//exit();
	}

	if($_COOKIE["empsuccess"]=="failure")
	{
		echo "<script>alert('Record not updated.(db error)');</script>";
		unset($_COOKIE["success"]);
		//exit();
	}

	if($_COOKIE["clientsuccess"]=="success")
	{
		echo "<script>alert('Record updated.');</script>";
		unset($_COOKIE["success"]);
		//exit();
	}

	if($_COOKIE["clientsuccess"]=="failure")
	{
		echo "<script>alert('Record not updated.(db error)');</script>";
		unset($_COOKIE["success"]);
		//exit();
	}

	if($_COOKIE["cpsuccess"]=="success")
	{
		echo "<script>alert('Record updated.');</script>";
		unset($_COOKIE["success"]);
		//exit();
	}

	if($_COOKIE["cpsuccess"]=="failure")
	{
		echo "<script>alert('Record not updated.(db error)');</script>";
		unset($_COOKIE["success"]);
		//exit();
	}
*/
}



function getMailChimpLists()
{
	$apiKey='09008f19ce2dbeaeb4112696a4f1eb1f-us17';
	$dataCenter=substr($apiKey,strpos($apiKey,'-')+1);

	$url='https://'.$dataCenter.'.api.mailchimp.com/3.0/lists';

	$ch=curl_init($url);

	$data = array('fields' => 'lists','count' => 'all');

	curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	if($data)
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($data));

	$result=curl_exec($ch);

	curl_close($ch);

	return $result;
}

function getList()
{
	$result=getMailChimpLists();
	$result=json_decode($result);

	$msg="";

	if(!empty($result->lists)) 
	{
		foreach( $result->lists as $list )
		{
			$msg.='<option value="'.$list->id.'">'.$list->name.' ('.$list->stats->member_count.')</option>';
		}
	} 	
	elseif(is_int($result->status)) 
	{ 
		echo '<strong>' . $result->title . ':</strong> ' . $result->detail;
	}

	return $msg;
}


?>