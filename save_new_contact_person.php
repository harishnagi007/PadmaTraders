<?php
include ('topfile.php');

$idupdate=$_POST['cpidupdate'];
$cpid=$_POST['cpid'];
$cid=$_POST['cid'];

/*$urlusval=base64_decode($_POST['us']);
$urlempval=base64_decode($_POST['emp']);*/
$clientdurl="clientd=".base64_encode("getClientDetails")."&cid=".base64_encode($cid)."&msg=";

$insertmsg=base64_encode("Record saved successfully!");
$updatemsg=base64_encode("Record updated successfully!");
$insertmsgerr=base64_encode("Record not saved successfully!");
$updatemsgerr=base64_encode("Record not updated successfully!");

/*echo "idupdate: ".$idupdate." uid: ".$uid." urlusval: ".$urlusval." urlempval: ".$urlempval;;
exit();*/

$contactpersonname=$_POST['contactpersonname'];
$cno1=$_POST['cno1'];
$cno2=$_POST['cno2']?$_POST['cno2']:0;
$email=$_POST['email']?"'".$_POST['email']."'":"NULL";

$conn=db_conn();

if($idupdate==0)
{
    if($conn)
    {
    $query="insert into padma_contactperson(contactpersonname,cno1,cno2,email,cid) values('".$contactpersonname."',".$cno1.",".$cno2.",".$email.",".$cid.")";

        $result=mssql_query($query);
    
        if($result>0)
        {
            //echo "the value is:".$result."....row entered";
            //setcookie("success","success",time()+5);
            /*if(isset($urlusval))
            {
                if($urlusval=='getUserList')
                {
                header("Location: index.php?us=".base64_encode($urlusval));
                exit();
                }
            }

            if(isset($urlempval))
            {
                if($urlempval=='getEmployeeList')
                {
                header("Location: index.php?emp=".base64_encode($urlempval));
                exit();
                }
            }*/
            mssql_close($conn);
            header("Location: index.php?".$clientdurl.$insertmsg);
            exit();
        }
        else
        {
            //setcookie("success","failure",time()+5);
            /*if(isset($urlusval))
            {
                if($urlusval=='getUserList')
                {
                header("Location: index.php?us=".base64_encode($urlusval));
                exit();
                }
            }

            if(isset($urlempval))
            {
                if($urlempval=='getEmployeeList')
                {
                header("Location: index.php?emp=".base64_encode($urlempval));
                exit();
                }
            }*/
            mssql_close($conn);
            header("Location: index.php?".$clientdurl.$insertmsgerr);
            exit();
        }
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
        $query="update padma_contactperson
            set contactpersonname='".$contactpersonname."',
            cno1=".$cno1.",
            cno2=".$cno2.",
            email=".$email." where id=".$cpid;

        $result=mssql_query($query);
    
        if($result>0)
        {
            //echo "the value is:".$result."....row entered";
            //setcookie("cpsuccess","success",time()+5);
            /*if(isset($urlusval))
            {
                if($urlusval=='getUserList')
                {
                header("Location: index.php?us=".base64_encode($urlusval));
                exit();
                }
            }

            if(isset($urlempval))
            {
                if($urlempval=='getEmployeeList')
                {
                header("Location: index.php?emp=".base64_encode($urlempval));
                exit();
                }
            }*/
            mssql_close($conn);
            header("Location: index.php?".$clientdurl.$updatemsg);
            exit();
        }
        else
        {
            //setcookie("cpsuccess","failure",time()+5);
            /*if(isset($urlusval))
            {
                if($urlusval=='getUserList')
                {
                header("Location: index.php?us=".base64_encode($urlusval));
                exit();
                }
            }

            if(isset($urlempval))
            {
                if($urlempval=='getEmployeeList')
                {
                header("Location: index.php?emp=".base64_encode($urlempval));
                exit();
                }
            }*/
            mssql_close($conn);
            header("Location: index.php?".$clientdurl.$updatemsgerr);
            exit();
        }
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