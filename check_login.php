<?php
include ('topfile.php');

$padmaloginid=$_POST['padmaloginid'];
$padmapassword=base64_encode($_POST['padmapassword']);
$remember_me=$_POST['remember_me'];

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
	    $_SESSION[SESSIONPADMA]['padmalastlogin']=$LASTLOGIN;

	    if($remember_me=='on')
	    {
	        $hour=time()+3600*24;
	        setcookie('padmaloginid', $LOGINID, $hour);
	        setcookie('padmapassword', $padmapassword, $hour);
	    }

	    mssql_query("update padma_login	
			    	set lastlogin=convert(varchar(20),GETDATE(),113)
			    	where id=".$ID);

	    if(isset($_SERVER['REMOTE_ADDR']))
        	$ipaddr=$_SERVER['REMOTE_ADDR'];
    	else
        	$ipaddr='UNKNOWN';

	    $lastloginlog="insert into padma_loginlog(loginid,lastlogin,ipaddr) values(".$ID.",convert(varchar(20),GETDATE(),113),'".$ipaddr."')";
        mssql_query($lastloginlog);

	    //print_r($_SESSION[SESSION]);
	    //exit();
	    mssql_close($conn);
	    header('Location: index.php');
	    exit();
	}
	else
	{
		//echo "the value is: ".$rows;
		//setcookie("error","error",time()+5);
		mssql_close($conn);
		header("Location: login.php?lerr=".base64_encode("Please enter valid LoginID and Password!"));
	    exit();
	}
}
else
{
	//setcookie("error","dberror",time()+5);
	mssql_close($conn);
	header("Location: login.php?lerr=".base64_encode("Cannot connect to server!"));
	exit();
}

?>