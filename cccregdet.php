<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
include("connection.php");
$log=$_SESSION['ses_loginid'];
$query="select pid,fname,lname,age,address,panch,phno,avvldate,location,stat,estname FROM m_pdetails,m_address where m_pdetails.loginid=m_address.loginid and m_pdetails.loginid=?";
$data=array($log);
$format=array();	
$result=$db->selectData($query,$data,$format);
	
?>
<table>
	</thead>
		<tbody>	 
	<div class="table-responsive-md">  								
		<table class="table">
		<thead class="thead-light">
			<tr>
            <th>First Name</th>
            <th>Last Name</th>
			<th>Age</th>
			<th>Address</th>
			<th>Panchayt/Muncipality</th>
			<th>Phone Number</th>
			<th>Date Arrived</th>
			<th>Arrived From</th>
			<th>Current Status</th>
			
		</tr>

	
	<?php
	foreach($result as $row)
	{ 
		  //Creates a loop to loop through results
		  ?>
		<tr>
		<td><?php echo $row['fname']    ?> </td>
		<td> <?php echo $row['lname']    ?> </td>
		<td> <?php echo $row['age']         ?> </td>
		<td> <?php echo $row['address']   ?> </td>
		<td> <?php echo $row['panch']    ?> </td>
		<td> <?php echo $row['phno']      ?> </td>
		<td> <?php echo $row['avvldate']   ?> </td>
		<td> <?php echo $row['location']   ?> </td>
		<td> <form method="post" action="statuschange.php">
		 <select id="userValue" name="userValue" class="form-control" size="0">
		<option value=""><?php echo $row['stat']?> </option>
			<option value="Qurantined">Qurantine Over</option>
			<option value="Transfered into another CCC">Shifted To home Qurantine</option>
			<option value="Transfered to  hospital">Shifted To  hospital</option>
			<option value="Transfered to home after Qurantined">Shifted To Another CCC</option>
			<option value="Qurantined">NO CHANGE</option>
		</select>
		<input type="hidden" name="pid" value="<?php echo $row['pid']?>">
		<input type="submit" class="btn btn-primary" id="submitButn" value="Change">
		</form></td>
		<!-- <td>   </td> -->
		
		</tr>
<?php 
		
	}
?>
</tbody>
</table>
