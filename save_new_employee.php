<?php
include ('topfile.php');

$idupdate=$_POST['eidupdate'];
$eid=$_POST['eid'];

/*$urlusval=base64_decode($_POST['us']);
$urlempval=base64_decode($_POST['emp']);*/
$empurl="emp=".base64_encode("getEmployeeList")."&msg=";

$insertmsg=base64_encode("Record saved successfully!");
$updatemsg=base64_encode("Record updated successfully!");
$insertmsgerr=base64_encode("Record not saved successfully!");
$updatemsgerr=base64_encode("Record not updated successfully!");

/*echo "idupdate: ".$idupdate." eid: ".$eid." urlusval: ".$urlusval." urlempval: ".$urlempval." photo: ".$empphoto." photofile: ".$empphotofile." ".$image." ".$image_name;
exit();*/

$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$age=$_POST['age'];
$cno1=$_POST['cno1'];
$cno2=$_POST['cno2']?$_POST['cno2']:0;
$cno3=$_POST['cno3']?$_POST['cno3']:0;
$localaddr=$_POST['localaddr'];
$villageaddr=$_POST['villageaddr']?"'".$_POST['villageaddr']."'":"NULL";
$doj=$_POST['doj'];
$aadhar=$_POST['aadhar']?$_POST['aadhar']:0;
$pan=$_POST['pan']?"'".$_POST['pan']."'":"NULL";
$activestatus=$_POST['activestatus'];

$imagesrc=$_POST['imagesrc'];
$aadharsrc=$_POST['aadharsrc'];
$pansrc=$_POST['pansrc'];
$passsrc=$_POST['passsrc'];
$othersrc=$_POST['othersrc'];

//exit();

$conn=db_conn();

if($idupdate==0)
{
    if($conn)
    {
         $query="insert into padma_employee(firstname,lastname,age,cno1,cno2,cno3,localaddr,villageaddr,doj,aadhar,pan,activestatus,photopath,aadharpath,panpath,passportpath,otherpath) values('".$fname."','".$lname."',".$age.",".$cno1.",".$cno2.",".$cno3.",'".$localaddr."',".$villageaddr.
              ",convert(datetime,'".$doj."',105),".$aadhar.",".$pan.",".$activestatus.",NULL,NULL,NULL,NULL,NULL);select SCOPE_IDENTITY() as ID";
        //exit();
        $result=mssql_query($query);
        if($result>0)
        {
            //echo "the value is:".$result."....row entered";
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
            $row=mssql_fetch_assoc($result);

            if(!(is_dir("uploads/EMP_LIST/".$fname.$lname.$row['ID'])))
            {
                mkdir("uploads/EMP_LIST/".$fname.$lname.$row['ID']);

                if(($_FILES["empphotofile"]["size"])>0)
                {
                    $imageFileType=strtolower(pathinfo($_FILES["empphotofile"]["name"],PATHINFO_EXTENSION));
                    $photopath="uploads/EMP_LIST/".$fname.$lname.$row['ID']."/".$fname.$lname.".".$imageFileType;

                    move_uploaded_file($_FILES["empphotofile"]["tmp_name"], $photopath);  

                    mssql_query("update padma_employee
                                set photopath='".base64_encode($photopath)."'
                                where id=".$row['ID']);
                }

                if(($_FILES["aadharfile"]["size"])>0)
                {
                    $filetype=strtolower(pathinfo($_FILES["aadharfile"]["name"],PATHINFO_EXTENSION));
                    $filepath="uploads/EMP_LIST/".$fname.$lname.$row['ID']."/".$fname.$lname."-aadhar.".$filetype;

                    move_uploaded_file($_FILES["aadharfile"]["tmp_name"], $filepath);  

                    mssql_query("update padma_employee
                            set aadharpath='".base64_encode($filepath)."'
                            where id=".$row['ID']);
                }

                if(($_FILES["panfile"]["size"])>0)
                {
                    $filetype=strtolower(pathinfo($_FILES["panfile"]["name"],PATHINFO_EXTENSION));
                    $filepath="uploads/EMP_LIST/".$fname.$lname.$row['ID']."/".$fname.$lname."-pan.".$filetype;

                    move_uploaded_file($_FILES["panfile"]["tmp_name"], $filepath);  

                    mssql_query("update padma_employee
                            set panpath='".base64_encode($filepath)."'
                            where id=".$row['ID']);
                }

                if(($_FILES["passfile"]["size"])>0)
                {
                    $filetype=strtolower(pathinfo($_FILES["passfile"]["name"],PATHINFO_EXTENSION));
                    $filepath="uploads/EMP_LIST/".$fname.$lname.$row['ID']."/".$fname.$lname."-passport.".$filetype;

                    move_uploaded_file($_FILES["passfile"]["tmp_name"], $filepath);  

                    mssql_query("update padma_employee
                            set passportpath='".base64_encode($filepath)."'
                            where id=".$row['ID']);
                }
                
                if(($_FILES["otherfile"]["size"])>0)
                {
                    $filetype=strtolower(pathinfo($_FILES["otherfile"]["name"],PATHINFO_EXTENSION));
                    $filepath="uploads/EMP_LIST/".$fname.$lname.$row['ID']."/".$fname.$lname."-other.".$filetype;

                    move_uploaded_file($_FILES["otherfile"]["tmp_name"], $filepath);  

                    mssql_query("update padma_employee
                            set otherpath='".base64_encode($filepath)."'
                            where id=".$row['ID']);
                }
            }
            //setcookie("success","success",time()+5);
            mssql_close($conn);
            header("Location: index.php?".$empurl.$insertmsg);
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
            header("Location: index.php?".$empurl.$insertmsgerr);
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
        $query="update padma_employee
            set firstname='".$fname."',
            lastname='".$lname."',
            age=".$age.",
            cno1=".$cno1.",
            cno2=".$cno2.",
            cno3=".$cno3.",
            localaddr='".$localaddr."',
            villageaddr=".$villageaddr.",
            doj=convert(datetime,'".$doj."',105),
            aadhar=".$aadhar.",
            pan=".$pan.",
            activestatus=".$activestatus." where id=".$eid;
            
        $result=mssql_query($query);
    
        if($result>0)
        {
            //echo "the value is:".$result."....row entered";
            if(($_FILES["empphotofile"]["size"])>0)
            {
                $imageFileType=strtolower(pathinfo($_FILES["empphotofile"]["name"],PATHINFO_EXTENSION));
                $photopath="uploads/EMP_LIST/".$fname.$lname.$eid."/".$fname.$lname.".".$imageFileType;

                if(file_exists($imagesrc)) 
                {
                    unlink($imagesrc); 
                }

                move_uploaded_file($_FILES["empphotofile"]["tmp_name"],$photopath);  

                mssql_query("update padma_employee
                    set photopath='".base64_encode($photopath)."'
                    where id=".$eid);
            }

            if(($_FILES["aadharfile"]["size"])>0)
            {
                $filetype=strtolower(pathinfo($_FILES["aadharfile"]["name"],PATHINFO_EXTENSION));
                $filepath="uploads/EMP_LIST/".$fname.$lname.$eid."/".$fname.$lname."-aadhar.".$filetype;

                if(file_exists($aadharsrc)) 
                {
                    unlink($aadharsrc); 
                }

                move_uploaded_file($_FILES["aadharfile"]["tmp_name"], $filepath);  

                mssql_query("update padma_employee
                        set aadharpath='".base64_encode($filepath)."'
                        where id=".$eid);
            }

            if(($_FILES["panfile"]["size"])>0)
            {
                $filetype=strtolower(pathinfo($_FILES["panfile"]["name"],PATHINFO_EXTENSION));
                $filepath="uploads/EMP_LIST/".$fname.$lname.$eid."/".$fname.$lname."-pan.".$filetype;
                
                if(file_exists($pansrc)) 
                {
                    unlink($pansrc); 
                }

                move_uploaded_file($_FILES["panfile"]["tmp_name"], $filepath);  

                mssql_query("update padma_employee
                        set panpath='".base64_encode($filepath)."'
                        where id=".$eid);
            }

            if(($_FILES["passfile"]["size"])>0)
            {
                $filetype=strtolower(pathinfo($_FILES["passfile"]["name"],PATHINFO_EXTENSION));
                $filepath="uploads/EMP_LIST/".$fname.$lname.$eid."/".$fname.$lname."-passport.".$filetype;

                if(file_exists($passsrc)) 
                {
                    unlink($passsrc); 
                }

                move_uploaded_file($_FILES["passfile"]["tmp_name"], $filepath);  

                mssql_query("update padma_employee
                        set passportpath='".base64_encode($filepath)."'
                        where id=".$eid);
            }
            
            if(($_FILES["otherfile"]["size"])>0)
            {
                $filetype=strtolower(pathinfo($_FILES["otherfile"]["name"],PATHINFO_EXTENSION));
                $filepath="uploads/EMP_LIST/".$fname.$lname.$eid."/".$fname.$lname."-other.".$filetype;

                if(file_exists($othersrc)) 
                {
                    unlink($othersrc); 
                }

                move_uploaded_file($_FILES["otherfile"]["tmp_name"], $filepath);  

                mssql_query("update padma_employee
                        set otherpath='".base64_encode($filepath)."'
                        where id=".$eid);
            }            
            

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
            //setcookie("empsuccess","success",time()+5);
            mssql_close($conn);
            header("Location: index.php?".$empurl.$updatemsg);
            exit();
        }
        else
        {
            //setcookie("empsuccess","failure",time()+5);
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
            header("Location: index.php?".$empurl.$updatemsgerr);
            exit();
        }
    }
    else
    {
        //echo "the value is:".$rows;
        die("db error: ".mssql_get_last_message());
    }
}

?>