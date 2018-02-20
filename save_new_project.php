<?php
include ('topfile.php');

$idupdate=$_POST['uidupdate'];
$uid=$_POST['uid'];
$pno=$_POST['uspno'];

/*$urlusval=base64_decode($_POST['us']);
$urlempval=base64_decode($_POST['emp']);*/
$userurl="us=".base64_encode("getUserList")."&page=".base64_encode($pno)."&msg=";

$insertmsg=base64_encode("Record saved successfully!");
$updatemsg=base64_encode("Record updated successfully!");
$insertmsgerr=base64_encode("Record not saved successfully!");
$updatemsgerr=base64_encode("Record not updated successfully!");

/*echo "idupdate: ".$idupdate." uid: ".$uid." urlusval: ".$urlusval." urlempval: ".$urlempval;;
exit();*/

$name=$_POST['name'];
$loginid=$_POST['loginid'];
$password=base64_encode($_POST['repassword']);
$usertype=$_POST['usertype'];
$status=$_POST['status'];
$createdby=$_SESSION[SESSIONPADMA]['padmauserid'];
$updatedby=$_SESSION[SESSIONPADMA]['padmauserid'];

$conn=db_conn();

if($idupdate==0)
{
    if($conn)
    {
        $query="insert into padma_login(name,loginid,password,usertype,status,createdon,createdby) values('".$name."','".$loginid."','".$password."','".$usertype."',".$status.",GETDATE(),".$createdby.")";
        $result=mssql_query($query);
    
        if($result>0)
        {
            header("Location: index.php?".$userurl.$insertmsg);
            exit();
        }
        else
        {
            header("Location: index.php?".$userurl.$insertmsgerr);
            exit();
        }
        mssql_close($conn);
    }
    else
    {
        //echo "the value is:".$rows;
        die("db error: ".mssql_get_last_message());
    }
}
else if($idupdate==1)
{
    if($conn)
    {
        $query="update padma_login 
            set name='".$name."',
            loginid='".$loginid."',
            password='".$password."',
            usertype='".$usertype."',
            status=".$status.",
            updatedon=GETDATE(),updatedby=".$updatedby." where id=".$uid;
        $result=mssql_query($query);
    
        if($result>0)
        {
            header("Location: index.php?".$userurl.$updatemsg);
            exit();
        }
        else
        {
            header("Location: index.php?".$userurl.$updatemsgerr);
            exit();
        }
        mssql_close($conn);
    }
    else
    {
        //echo "the value is:".$rows;
        die("db error: ".mssql_get_last_message());
    }
}
else
{

}

?>