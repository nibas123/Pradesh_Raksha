<?php
session_start();
if(!isset($_SESSION['ses_loginid'])){
	header("location:index.php");
	exit;
}
?>

<!-- <script type="text/javascript">

function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.csv':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script> -->


<?php
$log=$_SESSION['ses_loginid'];
include("connection.php");
$query="select estname,date, ipmale, ipfemale, iptot, rmale, rfemale, rtot, pvasi, istate, smale, sfemale, stot, tmale, tfemale, ttot, totrooms, romocc FROM m_ccused,m_address WHERE m_ccused.loginid=m_address.loginid and m_ccused.loginid=?";
$data=array($log);
$format=array();	
$result=$db->selectData($query,$data,$format);
	
?>
<html>

<table>
	</thead>
		<tbody>	 
	<div class="table-responsive-md">  								
		<table class="table" id="tblData">
			
		<thead class="thead-light">
		
		<tr class="table table-bordered">
    <th colspan="1">Date OF Updation</th>
    <th colspan="3">No of Inmates Present at CCC</th>
  <th colspan="3">Type of Inmates Released as of today</th>
  <th colspan="2">Types of Inmates Present at CCC today</th>
  <th colspan="3">Symptomatic</th>
  <th colspan="3">Test Done</th>
  <th colspan="2">Room Details</th>
</tr>
<tr>
    
		<th class="border-right">Date </th>    
        <th>Male </th>
        <th>Female</th>
        <th class="border-right">Total</th>
        <th>Male </th>
        <th>Female</th>
        <th class="border-right">Total</th>
        <th>Pravasi</th>
        <th class="border-right">Inter State</th>
        <th>Male </th>
        <th>Female</th>
        <th class="border-right">Total</th>
        <th>Male </th>
        <th>Female</th>
        <th class="border-right">Total</th>
        <th>No. of Total Rooms</th>
        <th>No of Rooms Occupied</th>
</tr>

<?php
	foreach($result as $row)
	{   //Creates a loop to loop through results
        ?>
        <tr class="border-bottom">
		
		<td class="border-right"> <?php echo $row['date']; ?>    </td>
		<td><?php echo $row['ipmale'];?>    </td>
		<td><?php echo $row['ipfemale'];?>    </td>
		<td class="border-right"><?php echo $row['iptot'];?>    </td>
		<td><?php echo $row['rmale'];?>    </td>
		<td><?php echo $row['rfemale'];?>    </td>
		<td class="border-right"><?php echo $row['rtot'];?>    </td>
		<td><?php echo $row['pvasi'];?>    </td>
		<td class="border-right"><?php echo $row['istate'];?>    </td>
		<td><?php echo $row['smale'];?>    </td>
		<td><?php echo $row['sfemale'];?>    </td>
		<td class="border-right"><?php echo $row['stot'];?>    </td>
	    <td><?php echo $row['tmale'];?>    </td>
		<td><?php echo $row['tfemale'];?>    </td>
		<td class="border-right"><?php echo $row['ttot'];?>    </td>
		<td><?php echo $row['totrooms'];?>    </td>
		<td class="border-right"><?php echo $row['romocc'];?>    </td>
		</tr>
<?php		
	}
?>
</tbody>
</table>

</html>