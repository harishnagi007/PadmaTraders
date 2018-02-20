<?php
include ('topfile.php');

$idupdate=$_POST['cmlidupdate'];
$cmlid=$_POST['cmlid'];

$insertmsg=base64_encode("Record saved successfully!");
$updatemsg=base64_encode("Record updated successfully!");
$insertmsgerr=base64_encode("Record not saved successfully!");
$updatemsgerr=base64_encode("Record not updated successfully!");

/*echo "idupdate: ".$idupdate." uid: ".$uid." urlusval: ".$urlusval." urlempval: ".$urlempval;;
exit();*/

$compaddr=$_POST['compaddr'];
$city=$_POST['city'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];
$country=$_POST['country'];
$subsmsg=$_POST['subsmsg'];
$fromname=$_POST['fromname'];
$fromemail=$_POST['fromemail'];

$name=$_POST['companylistname'];
$contact=array('company'=>ucwords($name),'address1'=>$compaddr,'city'=>$city,'state'=>$state,'zip'=>$pincode,'country'=>$country);
$permission_reminder=$subsmsg;
$campaign_default=array('from_name'=>$fromname,'from_email'=>$fromemail,'subject'=>'','language'=>'en');

$data_center = substr($mcapi_key,strpos($mcapi_key,'-')+1);

$url = 'https://'. $data_center .'.api.mailchimp.com/3.0/lists';

$data = json_encode(array(
    'name'=>$name,
    'contact'=>$contact,
	'permission_reminder'=>$permission_reminder,
	'campaign_defaults'=>$campaign_default,
	'email_type_option'=>true
));
//print_r($data);
//exit();

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $mcapi_key);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$result=json_decode(curl_exec($ch));
$status_code=curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if($status_code!=null)
{
	header("Location: index.php?compemlist=".base64_encode($status_code)."&cmna=".base64_encode($name)."&errdet=".base64_encode($result->detail));
	exit();	
}
else if($status_code==0)
{
	header("Location: index.php?compemlist=".base64_encode($status_code)."&errdet=".base64_encode($result->detail));
	exit();	
}	
else
{
    header("Location: index.php?compemlist=".base64_encode(-1));
    exit(); 
}


?>