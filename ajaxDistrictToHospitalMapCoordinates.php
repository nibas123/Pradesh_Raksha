<?php
//get the district code from ajax call
$districtid=$_POST['districtid'];
//if districtid is valid, then
if(isset($districtid)){
include("connection.php");
$sql="select concat(lat,',',lng) as location , concat(m_address.estname,' ,',m_address.street,' ,',m_address.city) as address from m_address inner join m_login".
" on m_login.loginid=m_address.loginid where m_address.districtid=? and m_login.isactive='1' and m_address.lat is not null and m_address.lng is not null";
$data=array($districtid);
$format=array("d");
$list=$db->selectData($sql,$data,$format);
$response=array();
		foreach($list as $listitem){
			//store the items into array
			array_push($response, array("hospitalid" => $listitem[0],"hospitaladdress" => $listitem[1]));
		}
		//convert the array items into json object
   echo json_encode($response);	  	
}

?>