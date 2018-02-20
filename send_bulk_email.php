<?php
include ('topfile.php');

$idupdate=$_POST['smidupdate'];
$smid=$_POST['smid'];

$insertmsg=base64_encode("Record saved successfully!");
$updatemsg=base64_encode("Record updated successfully!");
$insertmsgerr=base64_encode("Record not saved successfully!");
$updatemsgerr=base64_encode("Record not updated successfully!");

/*echo "idupdate: ".$idupdate." uid: ".$uid." urlusval: ".$urlusval." urlempval: ".$urlempval;;
exit();*/

$fromname=$_POST['fromname'];
$fromemail=$_POST['fromemail'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$list_id=$_POST['list_id'];
$temp_id=$_POST['temp_id'];
$listname=trim(substr($_POST['smlistname'], 0, -4));
$count=trim(substr($_POST['smlistname'], -2, -1));

if($count!=0)
{
	$data=array('type' => 'regular','recipients' => array('list_id' => $list_id),
								'settings' => array(
								'subject_line' => $subject,
								'title' => $subject.' ('.date("d/m-Y").')',
								'from_name' => $fromname,
								'reply_to' => $fromemail,
								'template_id' => (int)$temp_id)
	);

	$cc=array();
	$cc=createcampaignandsendmail($mcapi_key,'/campaigns','POST',$data);

	$var=$cc[0]->id;

	if($var!="" || $var!=null)
	{
		$data=array('template' => array('id' => (int)$temp_id, 
        								'sections' => array('emailbody' => $message)));
		$result=createcampaignandsendmail($mcapi_key,'/campaigns/'.$var.'/content','PUT', $data);

		if($result[1]==200)
		{	
			$cc=createcampaignandsendmail($mcapi_key,'/campaigns/'.$var.'/actions/send','POST');

			if($cc[1]!=null)
			{
				header("Location: index.php?sdmail=".base64_encode($cc[1])."&lna=".base64_encode($listname).
					   "&errdet=".base64_encode($cc[0]->detail));
				exit();	
			}
			else if($cc[1]==0)
			{
				header("Location: index.php?sdmail=".base64_encode($cc[1])."&errdet=".base64_encode($cc[0]->detail));
				exit();	
			}		
			else
			{
				header("Location: index.php?sdmail=".base64_encode(-1));
				exit();	
			}
		}
		else
		{
			header("Location: index.php?sdmail=".base64_encode($result[1])."&errdet=".base64_encode($cc[0]->detail));
			exit();	
		}	
	}
	else
	{
		header("Location: index.php?sdmail=".base64_encode($cc[1])."&errdet=".base64_encode($cc[0]->detail));
		exit();	
	}

}
else
{
	header("Location: index.php?sdmail=".base64_encode(-2));
	exit();	
}






function createcampaignandsendmail($mcapi_key,$method, $type, $data = false)
{
	$dataCenter=substr($mcapi_key,strpos($mcapi_key,'-')+1);

	$url='https://'.$dataCenter.'.api.mailchimp.com/3.0'.$method;

	$ch=curl_init($url);

	curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $mcapi_key);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	if($data)
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($data));

	$result=curl_exec($ch);
	$status_code=curl_getinfo($ch, CURLINFO_HTTP_CODE);

	$arr=array(json_decode($result),$status_code);

	curl_close($ch);

	return $arr;
}


?>
