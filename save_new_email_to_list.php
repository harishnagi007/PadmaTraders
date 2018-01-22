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
$listname=$_POST['listname'];
$email=$_POST['email']?$_POST['email']:"NULL";
$api_key='09008f19ce2dbeaeb4112696a4f1eb1f-us17';

$data_center=substr($api_key,strpos($api_key,'-')+1);

$url='https://'. $data_center .'.api.mailchimp.com/3.0/lists/'. $list_id .'/members';
$url2='https://us17.admin.mailchimp.com/lists/';

$json = json_encode(array(
    'email_address' => $email,
    'status'        => 'subscribed',
    'merge_fields'  => array('FNAME'=> $firstname,'LNAME'=> $lastname)
));

$ch = curl_init($url);

    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $api_key);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  	curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$result=curl_exec($ch);

$status_code=curl_getinfo($ch, CURLINFO_HTTP_CODE);
print_r(json_decode($result));
//exit();

curl_close($ch);

	//$result=getMailChimpLists();
	//var_dump($result=json_decode($result));

if($status_code==200)
{
	header("Location: index.php?emlist=".base64_encode(1)."&lna=".base64_encode($listname));
	exit();	
}
else
{
	header("Location: index.php?emlist=".base64_encode(0)."&lna=".base64_encode($listname));
	exit();	
}


?>		