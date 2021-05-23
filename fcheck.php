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
$query="select estname,date,city,nM1, nF1, tIn1, nM2, nF2, tIn2, nms, nfs, nmf, nff, nmis, nfis, nrm, nrf, nrlm, nrlf, nim, nif, npsm, npsf, symp, td, nopc, trna, tno  FROM m_ciused,m_address WHERE m_ciused.loginid=m_address.loginid";

$data=array();
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
    <th colspan="7"></th>
    
  <th colspan="4">No.of Pravasi accomodated</th>
  <th colspan="6">No. of Interstate passengers accomodated</th>
 
</tr>
<tr class="table table-bordered">
<th colspan="3"></th>
<th colspan="3">No of Inmates Present at CCC</th>
  <th colspan="3">Type of Inmates Released as of today</th>
  <th colspan="2">Ship</th>
  <th colspan="2">Flight</th>
  <th colspan="2">Rail</th>
  <th colspan="2">Road</th>
  <th colspan="2">Ship</th>
  <th colspan="2">No. of Interdistrict passengers (Within kerala)accomodated</th>
  <th colspan="2">No.of primary and secondary contacts of positive case accomodated</th>
  <th colspan="2">Symptomatic</th>
  <th colspan="2">Test Done</th>
  <th colspan="2">Total No of Postive cases</th>
  <th colspan="2">Total Number Of Rooms Available</th>
  <th colspan="2">Total Rooms Occupied</th>
</tr>
<tr>
    
		<th >Date </th> 
        <th>CCC Name</th>
        <th>Place</th>   
        <th>Male </th>
        <th>Female</th>
        <th >Total</th>

        <th>Male </th>
        <th>Female</th>
        <th >Total</th>

        <th>Male </th>
        <th>Female</th>

        <th>Male </th>
        <th>Female</th>

        <th>Male </th>
        <th>Female</th>

        <th>Male </th>
        <th>Female</th>

        <th>Male </th>
        <th>Female</th>

        <th>Male </th>
        <th>Female</th>

        <th>Male </th>
        <th>Female</th>
        
       
</tr>

<?php
	foreach($result as $row)
	{   //Creates a loop to loop through results
        ?>
        <tr class="border-bottom">
		
		<td> <?php echo $row['date']; ?>    </td>
		<td><?php echo $row['estname'];?>    </td>
		<td><?php echo $row['city'];?>    </td>	
		<td> <?php echo $row['nM1']; ?>    </td>
		<td><?php echo $row['nF1'];?>    </td>
		<td><?php echo $row['tIn1'];?>    </td>
		<td> <?php echo $row['nM2'];?>    </td>
		<td><?php echo $row['nF2'];?>    </td>
		<td><?php echo $row['tIn2'];?>    </td>
		<td> <?php echo $row['nms'];?>    </td>
		<td><?php echo $row['nfs'];?>    </td>
		<td> <?php echo $row['nmf'];?>    </td>
		<td><?php echo $row['nff'];?>    </td>
		<td><?php echo $row['nmis'];?>    </td>
		<td> <?php echo $row['nfis'];?>    </td>
	    <td><?php echo $row['nrm'];?>    </td>
		<td><?php echo $row['nrf'];?>    </td>
		<td> <?php echo $row['nrlm'];?>    </td>
		<td><?php echo $row['nrlf'];?>    </td>
		<td> <?php echo $row['nim'];?>    </td>
        <td> <?php echo $row['nif'];?>    </td>
        <td> <?php echo $row['npsm'];?>    </td>
        <td> <?php echo $row['npsf'];?>    </td>
        <td> <?php echo $row['symp'];?>    </td>
        <td> <?php echo $row['td'];?>    </td>
        <td> <?php echo $row['nopc'];?>    </td>
        <td> <?php echo $row['trna'];?>    </td>
        <td> <?php echo $row['tno'];?>    </td>
<?php		
	}
?>
</tbody>
</table>

</html>