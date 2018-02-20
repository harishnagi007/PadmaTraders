<?php
include ("db_conn.php");
require_once ("mandrilloffapi/src/mandrill.php");

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

return '<div style="width: auto; overflow: hidden; height: 35px;"><p style="text-align: center; float: left; width: 100%; margin: 6px 0 0 10px; color: #4CAF50; font-weight: bold; font-size: 20px;">'.$printmsg.'</p></div>';
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



function getMailChimpLists($mcapi_key,$url)
{
	$ch=curl_init($url);

	//$data = array('fields' => 'lists','count' => 'all');

	curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $mcapi_key);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	/*if($data)
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($data));*/

	$result=curl_exec($ch);

	curl_close($ch);

	return $result;
}

function getMailChimpListMemberCount($mcapi_key,$url)
{
	$ch=curl_init($url);

	//$data = array('fields' => 'lists','count' => 'all');

	curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $mcapi_key);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	/*if($data)
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($data));*/

	$result=json_decode(curl_exec($ch));
	curl_close($ch);

	if(!empty($result->total_items))
		return $result->total_items;
	else
		return 0;
}

function getList()
{
	global $mcapi_key;

	$data_center=substr($mcapi_key,strpos($mcapi_key,'-')+1);
	$url='https://'.$data_center.'.api.mailchimp.com/3.0/lists';

	$result=getMailChimpLists($mcapi_key,$url);

	$result=json_decode($result);

	$msg="";

	if(!empty($result->lists)) 
	{
		foreach($result->lists as $list)
		{	
			$url='https://'.$data_center.'.api.mailchimp.com/3.0/lists/'.$list->id.'/members';
			$msg.='<option value="'.$list->id.'">'.ucwords($list->name).' ('.getMailChimpListMemberCount($mcapi_key,$url).')</option>';
		}
	} 	
	elseif(is_int($result->status)) 
	{ 
		echo '<strong>' . $result->title . ':</strong> ' . $result->detail;
	}

	return $msg;
}

function getMailChimpTemplates($mcapi_key,$url)
{
	$ch=curl_init($url);

	//$data = array('fields' => 'lists','count' => 'all');

	curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $mcapi_key);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	/*if($data)
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($data));*/

	$result=curl_exec($ch);

	curl_close($ch);

	return $result;
}

function getTemplate()
{
	global $mcapi_key;

	$data_center=substr($mcapi_key,strpos($mcapi_key,'-')+1);
	$url='https://'.$data_center.'.api.mailchimp.com/3.0/templates';

	$result=getMailChimpTemplates($mcapi_key,$url);

	$result=json_decode($result);

	$msg="";

	if(!empty($result->templates)) 
	{
		foreach($result->templates as $templates)
		{	
			//$url='https://'.$data_center.'.api.mailchimp.com/3.0/lists/'.$templates->id.'/members';
			if($templates->type!='user')
				continue;
			$msg.='<option value="'.$templates->id.'">'.ucwords($templates->name).'</option>';
		}
	} 	
	elseif(is_int($result->status)) 
	{ 
		echo '<strong>' . $result->title . ':</strong> ' . $result->detail;
	}

	return $msg;
}

function getMandrillTemplate()
{
	global $mdapi_key;

	$mandrill = new Mandrill($mdapi_key);

    $result=$mandrill->templates->getList();
	$i=0;
	$msg="";

	if(count($result)!=0)
	{
		while($i<count($result))
		{
			$msg.='<option value="'.$result[$i]["slug"].'">'.ucwords($result[$i]["name"]).'</option>';
			$i++;
		}
	
	}

	return $msg;
}



function getPagination($listname,$param=-1)
{
	$pageno=array();

	if($listname=='user-list-div-id')
	{
		$pageno=getlinks('padma_login','us','getUserList');
	}

	if($listname=='emp-list-div-id')
	{
		$pageno=getlinks('padma_employee','emp','getEmployeeList');
	}

	if($listname=='client-list-div-id')
	{
		$pageno=getlinks('padma_client','client','getClientList');
	}

	if($listname=='contact-person-list-div-id')
	{
		$pageno=getlinks('padma_contactperson','clientd','getClientDetails',$param);
	}

return $pageno;
}


function getlinks($para1,$para2,$para3,$para4=-1)
{
	if(isset($_GET["page"]))
	{
		if(base64_decode($_GET["page"])=="" || base64_decode($_GET["page"])==null || base64_decode($_GET["page"])==0)
	  		$pageno=1;
	  	else
	  		$pageno=base64_decode($_GET["page"]);
	}

	$conn=db_conn();

	if($conn)
	{
		if($para1=="padma_contactperson")
		{
			$r=mssql_query("select count(*) from ".$para1." where cid=".$para4); 

			$row=mssql_fetch_row($r);  
			$total_records=$row[0];
			$total_pages=ceil($total_records/2); 

			$start=(($pageno-1)*2)+1;
			$end=$start+1;  

			$_SESSION['pardval']=$pageno;
			$links='<div class="pagination" style="width: 100%; height: 24px; float: right; margin: 10px 15px 0 0; text-align: right;">';
			$links.='<span style="float: left; margin-left: 20px; color: black;">Total Records: <b>'.$total_records.'</b></span>';

			for ($i=1; $i<=$total_pages; $i++) 
			{  
				if($i==$pageno)
				{
				  $links.='<a class="pactive">'.$i.'</a>';  
				  continue;
				}

				$file="'?".$para2."=".base64_encode($para3)."&page=".base64_encode($i)."&cid=".base64_encode($para4)."'";
				$links.='<a href='.$file.'>'.$i.'</a>';  
			}

			$links.='</div>';

			$pageno=array($start,$end,$links);
			
			mssql_close($conn);

			return $pageno;
		}
		else
		{
			if($para1=="padma_login")
				$r=mssql_query("select count(*) from ".$para1." where id!=1"); 
			else	 
				$r=mssql_query("select count(*) from ".$para1);  

			$row=mssql_fetch_row($r);  
			$total_records=$row[0];
			$total_pages=ceil($total_records/2); 

			$start=(($pageno-1)*2)+1;
			$end=$start+1;  

			$_SESSION['val']=$pageno;
			$links='<div class="pagination" style="width: 100%; height: 24px; float: right; margin: 10px 15px 0 0; text-align: right;">';
			$links.='<span style="float: left; margin-left: 20px; color: black;">Total Records: <b>'.$total_records.'</b></span>';

			for ($i=1; $i<=$total_pages; $i++) 
			{  
				if($i==$pageno)
				{
				  $links.='<a class="pactive">'.$i.'</a>';  
				  continue;
				}

				$file="'?".$para2."=".base64_encode($para3)."&page=".base64_encode($i)."'";
				$links.='<a href='.$file.'>'.$i.'</a>';  
			} 

			$links.='</div>';

			$pageno=array($start,$end,$links);
			
			mssql_close($conn);

			return $pageno;
		}
	}
	else
	{
		die("db error: ".mssql_get_last_message());
	}
}

function getAvailableEmployee()
{
	$conn=db_conn();

	if($conn)
	{
		$query="select id, firstname+' '+lastname as empname from padma_employee order by firstname ASC";

	 	$result=mssql_query($query);
	 	$msg='';

	  	if(mssql_num_rows($result)>0)
	  	{	
	    	while($row=mssql_fetch_assoc($result)) 
	    	{
	    		$msg.='<option value="'.$row['id'].'">'.$row['empname'].'</option>';
	    	}

	    }
	mssql_close($conn);
	}

	return $msg;
}


?>