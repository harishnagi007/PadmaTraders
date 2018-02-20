<?php
include ('topfile.php');

$idupdate=$_POST['elidupdate'];
$elid=$_POST['elid'];

$insertmsg=base64_encode("Record saved successfully!");
$updatemsg=base64_encode("Record updated successfully!");
$insertmsgerr=base64_encode("Record not saved successfully!");
$updatemsgerr=base64_encode("Record not updated successfully!");

/*echo "idupdate: ".$idupdate." uid: ".$uid." urlusval: ".$urlusval." urlempval: ".$urlempval;;
exit();*/

$list_id=$_POST['list_id'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$listname=substr($_POST['listname'], 0, -4);
$email=$_POST['email'];

$data_center=substr($mcapi_key,strpos($mcapi_key,'-')+1);

$url='https://'. $data_center .'.api.mailchimp.com/3.0/lists/'. $list_id .'/members';

$json = json_encode(array(
    'email_address' => $email,
    'status'        => 'subscribed',
    'merge_fields'  => array('FNAME'=> $firstname,'LNAME'=> $lastname)
));

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $mcapi_key);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$result=json_decode(curl_exec($ch));
$status_code=curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if($status_code!=null)
{
	header("Location: index.php?emlist=".base64_encode($status_code)."&lna=".base64_encode($listname)."&errdet=".base64_encode($result->detail));
	exit();	
}
else if($status_code==0)
{
    header("Location: index.php?emlist=".base64_encode($status_code)."&errdet=".base64_encode($result->detail));
    exit(); 
}
else
{
	header("Location: index.php?emlist=".base64_encode(-1));
	exit();	
}

?>		