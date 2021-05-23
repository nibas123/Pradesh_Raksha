<?php
//get the district code from ajax call
$districtid=$_POST['districtid'];
//if districtid is valid, then
if(isset($districtid)){
include("connection.php");
$sql="select psid,psname from m_policestation where districtid='".$districtid."' and isActive='1'";
$list=$db->select($sql);
$response=array();
		foreach($list as $listitem){
			//store the items into array
			array_push($response, array("psid" => $listitem['psid'],"psname" => $listitem['psname']));
		}
		//convert the array items into json object
   echo json_encode($response);	  	
}

?>