<?php
//session_start();
// if(!isset($_SESSION['ses_loginid'])){
// 	header("location:index.php");
// 	exit;
// }
include("connection.php");

$query="select name from place";
$data=array();
$format=array();	
$result=$db->selectData($query,$data,$format);

);
?>

<div class="form-group row">

<label class="col-lg-5 col-form-label form-control-label" for="numRoom">Which LSG</label>
<div class="col-sm-2 col-md-3 text-center">
  <input type="radio" value="oindia" class="" id="outside" name="outside"><label for="numRoom">Outside india</label>
</div>
<div class="col-sm-2 col-md-4 text-center">
  <input type="radio" value="instate" class="" id="instate" name="outside"><label class="" for="numRoom">Interstate</label>
</div>
</div>

<div class="form-group row" id="country">
<label class="col-lg-5 col-form-label form-control-label">Country</label>
<div class="col-lg-7">
  <select id="countries" name="countries" class="form-control" size="0">
  <?php
  foreach($result as $row)
	{
     echo "<option value=" . $row['name'] . ">" . $row['name'] . "</option>";  
    }?>

  </select>
</div>
</div>
<div class="form-group row" id="state">
<label class="col-lg-5 col-form-label form-control-label">State</label>
<div class="col-lg-7">
  <select id="states" name="states" class="form-control" size="0">
  <option value="Alappuzha">Alappuzha</option>
  <option value="Chengannur">Chengannur</option>
  <option value="Cherthala">Cherthala</option>
  <option value="Haripad">Haripad</option>
  <option value="Kayamkulam">Kayamkulam</option>
  <option value="Kayamkulam">Mavelikara</option>
  </select>
</div>

  </select>
</div>
</div>