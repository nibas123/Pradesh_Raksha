<?php
include("connection.php");

$center_lat = $_GET["lat"];
$center_lng = $_GET["lng"];
$radius = $_GET["radius"];

// Search the rows in the markers table
// 6371 is the value for kilometer conversion
//3959 is the value for miles conversion
/*$query = sprintf("SELECT id, name,rooms,wards,beds,ventilators,ambulance,contactperson,lat,lng, ( 6371 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM hospital_det HAVING distance < '%s' ORDER BY distance LIMIT 0 , 20",
  mysqli_real_escape_string($connection,$center_lat),
  mysqli_real_escape_string($connection,$center_lng),
  mysqli_real_escape_string($connection,$center_lat),
  mysqli_real_escape_string($connection,$radius));
  */
  
  $query="select location.loginid as id,location.name as name,m_hospital.norooms as rooms,m_hospital.nowards as wards,m_hospital.nobeds as beds,m_hospital.novents as ventilators,m_hospital.noambs as ambulance,location.primarycontact as contactperson,".
  " m_hospital_used.usedrooms as usedrooms,m_hospital_used.usedwards as usedwards,m_hospital_used.usedbeds as usedbeds,m_hospital_used.usedvents as usedvents,m_hospital_used.usedambs as usedambs,".
"  location.distance as distance,location.lat as lat,location.lng as lng".
"  from (SELECT m_address.loginid as loginid,m_address.isactive as isactive, concat(m_address.estname,' ,',m_address.street,' ,',m_address.city) as name,m_address.lat as lat,m_address.lng as lng,m_address.primarycontact as primarycontact,".
"  (6371 * acos( cos( radians(?) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( lat ) ) ) ) AS distance FROM m_address  HAVING distance < ?) as location inner join m_hospital on m_hospital.loginid=location.loginid inner join m_hospital_used on m_hospital_used.loginid=location.loginid  where location.isactive='1' order by location.distance";
  $data=array($center_lat,$center_lng,$center_lat,$radius);
  $format=array("dddd");
  $list=$db->selectData($query,$data,$format);
  //print_r($list);
  //end of the sql query, it fecths first 20 records.
  //if you want to fetch all the record, avoid use of limit keyword in sql qu`ery

//create json object and print

echo json_encode($list);

?>
