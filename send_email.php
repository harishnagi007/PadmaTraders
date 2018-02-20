<?php
include ('topfile.php');
require_once ("mandrilloffapi/src/mandrill.php");

$idupdate=$_POST['semidupdate'];
$semid=$_POST['semid'];

$insertmsg=base64_encode("Record saved successfully!");
$updatemsg=base64_encode("Record updated successfully!");
$insertmsgerr=base64_encode("Record not saved successfully!");
$updatemsgerr=base64_encode("Record not updated successfully!");

/*echo "idupdate: ".$idupdate." uid: ".$uid." urlusval: ".$urlusval." urlempval: ".$urlempval;;
exit();*/

$fromname=$_POST['fromname'];
$fromemail=$_POST['fromemail'];
$toemail=$_POST['toemail'];
$toname=$_POST['toname'];
$subject=$_POST['subject'];
$content=$_POST['content'];
$template_name=$_POST['template_name'];
//echo $_FILES["attachmentfile"]["name"];
//echo count($_FILES).var_dump($_FILES);
//exit();

if(($_FILES["attachmentfile"]["size"])>0)
{
	$file_type=strtolower(pathinfo($_FILES["attachmentfile"]["name"],PATHINFO_EXTENSION));
	$file_name=$_FILES["attachmentfile"]["name"];
    $file_path="uploads/".$file_name;

    move_uploaded_file($_FILES["attachmentfile"]["tmp_name"], $file_path); 
    $attachment=file_get_contents($file_path); 
	$attachment_encoded=base64_encode($attachment); 
	unlink($file_path);
}
//exit;

try
{
	$mandrill = new Mandrill($mdapi_key);

	if($content!='' && isset($template_name))
	{	
		sendTemplateMail($mandrill,$fromname,$fromemail,$toname,$toemail,$subject,$content,$template_name,$file_type,$file_name,$attachment_encoded);
	}
	else if($content!='' || isset($template_name))
	{
		if($content!='')
		{
			sendContentMail($mandrill,$fromname,$fromemail,$toname,$toemail,$subject,$content,$file_type,$file_name,$attachment_encoded);
		}
		else
			sendTemplateMail($mandrill,$fromname,$fromemail,$toname,$toemail,$subject,$content,$template_name,$file_type,$file_name,$attachment_encoded);
	}
	else
	{
		header("Location: index.php?sdemail=".base64_encode(-1)."&errdet=".base64_encode("Either enter message or select a template for email."));
		exit();	
	}
}

catch(Mandrill_Error $e)
{
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    throw $e;
    echo '<a href="index.php?em='.base64_encode('getSendEmail').'>Retry</a>';
   	exit();
}



function sendTemplateMail($mandrill,$fromname,$fromemail,$toname,$toemail,$subject,$content,$template_name,$file_type,$file_name,$attachment_encoded="")
{
	if($attachment_encoded!="")
		$message=array('subject' => $subject,
					   'from_email' => $fromemail,
					   'from_name' => $fromname,
					   'to' => array(array('email' => $toemail, 'name' => $toname, 'type' => 'to')),
					   'attachments' => array(array('type' => 'application/'.$file_type, 'name' => $file_name, 'content'=>$attachment_encoded))
		);
	else
		$message=array('subject' => $subject,
					   'from_email' => $fromemail,
					   'from_name' => $fromname,
					   'to' => array(array('email' => $toemail, 'name' => $toname, 'type' => 'to'))
		);

	$template_content=array(array(
	        					'name' => 'emailbody',
	        					'content' => $content)
	);

	$result=$mandrill->messages->sendTemplate($template_name, $template_content, $message);

	header("Location: index.php?sdemail=".base64_encode($result[0]['status'])."&errdet=".base64_encode($result[0]['reject_reason']));
	exit();	
}

function sendContentMail($mandrill,$fromname,$fromemail,$toname,$toemail,$subject,$content,$file_type,$file_name,$attachment_encoded="")
{
	if($attachment_encoded!="")
		$message=array('html' => $content,
					   'subject' => $subject,
					   'from_email' => $fromemail,
					   'from_name' => $fromname,
					   'to' => array(array('email' => $toemail, 'name' => $toname, 'type' => 'to')),
					   'attachments' => array(array('type' => 'application/'.$file_type, 'name' => $file_name, 'content'=>$attachment_encoded))			   
		);
	else
		$message=array('html' => $content,
					   'subject' => $subject,
					   'from_email' => $fromemail,
					   'from_name' => $fromname,
					   'to' => array(array('email' => $toemail, 'name' => $toname, 'type' => 'to'))
		);

	$async = false;
    $ip_pool = null;
    $send_at = null;

    $result=$mandrill->messages->send($message, $async, $ip_pool, $send_at);

    header("Location: index.php?sdemail=".base64_encode($result[0]['status'])."&errdet=".base64_encode($result[0]['reject_reason']));
	exit();	

}



/*if($count!=0)
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
	$cc=createcampaignandsendmail('/campaigns','POST',$data);

	$var=$cc[0]->id;

	if($var!="" || $var!=null)
	{
		$data=array('template' => array('id' => (int)$temp_id, 
        								'sections' => array('emailbody' => $message)));
		$result=createcampaignandsendmail('/campaigns/'.$var.'/content','PUT', $data);

		if($result[1]==200)
		{	
			$cc=createcampaignandsendmail('/campaigns/'.$var.'/actions/send','POST');

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






function createcampaignandsendmail($method, $type, $data = false)
{
$api_key='a78fad698e7f2d68eedf42be1b9b814c-us17';
$dataCenter=substr($api_key,strpos($api_key,'-')+1);

$url='https://'.$dataCenter.'.api.mailchimp.com/3.0'.$method;

$ch=curl_init($url);

curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $api_key);
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
*/

?>
