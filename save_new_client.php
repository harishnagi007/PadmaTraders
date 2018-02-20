<?php
include ('topfile.php');

$idupdate=$_POST['cidupdate'];
$cid=$_POST['cid'];
$pno=$_POST['clientpno'];

/*$urlusval=base64_decode($_POST['us']);
$urlempval=base64_decode($_POST['emp']);*/
$clienturl="client=".base64_encode("getClientList")."&page=".base64_encode($pno)."&msg=";

$insertmsg=base64_encode("Record saved successfully!");
$updatemsg=base64_encode("Record updated successfully!");
$insertmsgerr=base64_encode("Record not saved successfully!");
$updatemsgerr=base64_encode("Record not updated successfully!");

/*echo "idupdate: ".$idupdate." uid: ".$uid." urlusval: ".$urlusval." urlempval: ".$urlempval;;
exit();*/

$companyname=$_POST['companyname'];
$billingaddr=$_POST['billingaddr'];
$gstno=$_POST['gstno']?"'".$_POST['gstno']."'":"NULL";
$panno=$_POST['panno']?"'".$_POST['panno']."'":"NULL";

$conn=db_conn();

if($idupdate==0)
{
    if($conn)
    {
    $query="insert into padma_client(companyname,billingaddr,gstno,panno) values('".$companyname."','".$billingaddr."',".$gstno.",".$panno.")";

        $result=mssql_query($query);
    
        if($result>0)
        {
            header("Location: index.php?".$clienturl.$insertmsg);
            exit();
        }
        else
        {
            header("Location: index.php?".$clienturl.$insertmsgerr);
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
        $query="update padma_client
            set companyname='".$companyname."',
            billingaddr='".$billingaddr."',
            gstno=".$gstno.",
            panno=".$panno." where id=".$cid;

        $result=mssql_query($query);
    
        if($result>0)
        {
            header("Location: index.php?".$clienturl.$updatemsg);
            exit();
        }
        else
        {
            header("Location: index.php?".$clienturl.$updatemsgerr);
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