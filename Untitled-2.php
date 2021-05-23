<div class="form-group row">

<label class="col-lg-5 col-form-label form-control-label" for="numRoom">Which LSG</label>
<div class="col-sm-2 col-md-3 text-center">
  <input type="radio" value="oindia" class="" id="outside" name="outside"><label for="numRoom">Panchayat</label>
</div>
<div class="col-sm-2 col-md-4 text-center">
  <input type="radio" value="instate" class="" id="instate" name="outside"><label class="" for="numRoom">Muncipality</label>
</div>
</div>

<div class="form-group row" id="country">
<label class="col-lg-5 col-form-label form-control-label">Panchayat</label>
<div class="col-lg-7">
  <select id="countries" name="countries" class="form-control" size="0">
  <option value="">--Select--</option>
  <?php

        $sql2="select name from place";
        $data2=array();
        $format2=array();
        $result=$db->selectData($sql2,$data2,$format2);

  foreach($result as $row)
	{
     echo "<option value=" . $row['name'] . ">" . $row['name'] . "</option>";  
    }
    ?>

  </select>
</div>
</div>
<div class="form-group row" id="state">
<label class="col-lg-5 col-form-label form-control-label">Muncipality</label>
<div class="col-lg-7">
  <select id="states" name="states" class="form-control" size="0">
  <option value="">--Select--</option>
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