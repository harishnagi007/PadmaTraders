<?php

function createcampaign($method, $type, $data = false)
{
$apiKey='09008f19ce2dbeaeb4112696a4f1eb1f-us17';
$dataCenter=substr($apiKey,strpos($apiKey,'-')+1);

$url='https://'.$dataCenter.'.api.mailchimp.com/3.0'.$method;

$ch=curl_init($url);

curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

if($data)
	curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($data));

$result=curl_exec($ch);

curl_close($ch);

return $result;
}

function sendmailchimp($method, $type)
{
$apiKey='09008f19ce2dbeaeb4112696a4f1eb1f-us17';
$dataCenter=substr($apiKey,strpos($apiKey,'-')+1);

$url='https://'.$dataCenter.'.api.mailchimp.com/3.0'.$method;

$ch=curl_init($url);

curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$result=curl_exec($ch);
$status_code=curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

return $status_code;
}

$paper='nocompany';
$replyTo='harishnagi007@gmail.com';
$templateId=38807;


$data=array('type' => 'regular','recipients' => array('list_id' => '1c8c60b553'),
																		'settings' => array(
																		'subject_line' => 'E-paper for '.$paper.' is now ready!',
																		'title' => $paper.' E-Paper Notification ('.date("d/m-Y").')',
																		'from_name' => $paper,
																		'reply_to' => $replyTo,"template_id" => 38807

																		)
																		);

$cc=createcampaign('/campaigns','POST',$data);
$cc=json_decode($cc);

$var=$cc->id;
if($var!="" || $var!=null)
	$sm=sendmailchimp('/campaigns/'.$var.'/actions/send','POST');

if($sm==204)
	header('location:index.php?l='.base64_encode(1));
else
	header('location:index.php?l='.base64_encode(2));
?>
