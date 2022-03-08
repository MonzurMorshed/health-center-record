<?php
session_start();
include("inc_classes.php");
include("loginChk.php");
$ObjPatientRecord					= new patientRecord();

if(isset($_POST['delId']))
{
	$PatientdelId 		= $_POST['delId'];
	$ObjPatientRecord->deletePatient($PatientdelId);
}
$PatientName 		= "Patient Name";
$ComapanyName 		= "Company Name";
$HealthCheckupType 	= "Health Checkup Type";
if(isset($_REQUEST['PatientName']))
{
	$condition = array();

	//print_r($_POST);
	$PatientName 		= $_REQUEST['PatientName'];
	$ComapanyName 		= $_REQUEST['ComapanyName'];
	$HealthCheckupType 	= $_REQUEST['HealthCheckupType'];
	if($PatientName !="" AND $PatientName !="Patient Name")
	{
		$condition[] = "patient_name like '%".$PatientName."%'";
	}
	if($ComapanyName !="" AND $ComapanyName !="Company Name")
	{
		$condition[] = "company_name like '%".$ComapanyName."%'";
	}
	if($HealthCheckupType !="" AND $HealthCheckupType !="Health Checkup Type")
	{
		$condition[] = "checkup_type like '%".$HealthCheckupType."%'";
	}
	
	if(count($condition) <= 0)
	{		
		//$patient_details = $ObjPatientRecord->patient_details(" 1");
		$condition_str = " 1";
	}
	else
	{
		$condition_str = implode(" AND ",$condition);
		//$patient_details = $ObjPatientRecord->patient_details($condition_str);		
	}
	
}
else
{
	//$patient_details = $ObjPatientRecord->patient_details(" 1");
	$condition_str = " 1";
}

$ObjPatientRecord->sql					= "SELECT * FROM patient_record where $condition_str order by company_name asc,patient_id DESC, Added_on DESC";
$ObjPatientRecord->res					= $db->executeQuery($ObjPatientRecord->sql);

//------------------Paging----------------------
	$pages    = new Paginator;
	if(!isset($_GET['ipp']))
	$pages->items_per_page   	= 20;
	$pages->items_total 		= $ObjPatientRecord->res;
	$pages->mid_range 			= 7;
	$pages->paginate();	 
	
	$queryWithLimit 			= $ObjPatientRecord->sql.$pages->limit;
	$ObjPatientRecord->rsUserCnt 		= $db->executeQuery($queryWithLimit);
	$ObjPatientRecord->page				= $pages->current_page;
	$ObjPatientRecord->NoOfPages			= $pages->num_pages;
	
	if($ObjPatientRecord->rsUserCnt > 0)
	$ObjPatientRecord->rsClub			= $db->getResultsetArray();

?>
<?php include("header.php");?>
<script>
	function deleteRecord(pid)
	  {
		var where_to= confirm("Do you really want to Delete this record?");
		 if (where_to== true)
		 {
			//window.location="http://yourplace.com/yourpage.htm";
			document.getElementById('delId').value= pid;
			document.patientUpdate.submit();
		 }
		
	  }
	  function removeText(id,text)
		{
			var field = document.getElementById(id);
			if(field.value == text)
			{
				field.value = "";
			}
			
		}
		function addText(id,text)
		{
			var field = document.getElementById(id);
			if(field.value == "")
			{
				field.value = text;
			}
		}
</script>
<link rel="stylesheet" href="styles/listings.css" type="text/css" media="screen">
<div class="cf"></div>

<!--  body section --->	
	<div id="container">
    	<div id="search">
        	<form action="" method="post" name="searchFrm" class="niceform">
              <strong>Search Record by:</strong>
              <input name="PatientName" id="PatientName" value="<?=$PatientName;?>" onclick="removeText('PatientName','Patient Name');" onBlur="addText('PatientName','Patient Name');" type="text" size="32" /> <span>OR</span> <input name="ComapanyName" id="ComapanyName" value="<?=$ComapanyName?>" type="text" size="32" onclick="removeText('ComapanyName','Company Name');" onBlur="addText('ComapanyName','Company Name');" /> <span>OR</span> <input name="HealthCheckupType" id="HealthCheckupType" value="<?=$HealthCheckupType?>" type="text" size="32" onclick="removeText('HealthCheckupType','Health Checkup Type');" onBlur="addText('HealthCheckupType','Health Checkup Type');" /> <input name="Search" type="image" src="images/btn_search.png" alt="Search Record" align="bottom" class="searchbtn" />
        	</form>
			<input type="submit" name="Export" disabled="true" class="exportdata btn btn-success" value="Export to excel"  onClick="exportData()"/>
            <input type="submit" name="Pdf" disabled="true" class="exportdata btn btn-success" value="Export to pdf"  onClick="exportDataAsPdf()"/>
            
			
        </div><!--/search-->
        
      <!--h3>You searched by <strong>Patient Name</strong></h3-->
        
        <div id="listing">
			<form name="patientUpdate" action="" method="post">
				<input type="hidden" name="delId" id="delId" value="">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <thead>
				  <tr>
				  	<th><input class="check_all" type="checkbox"/>Sl</th>
					<th width="4%" align="right">ID</th>
					<th align="left">Patient Name</th>
					<th align="left">Company Name</th>
					<th align="left">Type</th>
					<th width="12%" align="left">Checkup Date</th>
					<th align="center">Edit</th>
					<th align="center">Delete</th>
					<th align="center">View</th>
					<!--th align="center">Print Record</th>
					<th align="center">Print Card</th-->
				  </tr>
				  </thead>
				  <?php
					if($ObjPatientRecord->rsUserCnt > 0)
					{
						for($i=0;$i < $ObjPatientRecord->rsUserCnt;$i++)
						{	
							$ObjPatientRecord->row		= $ObjPatientRecord->rsClub[$i];
									
							$ObjPatientRecord->patient_id 			= $ObjPatientRecord->row['patient_id'];
							$ObjPatientRecord->checkup_type 		= $ObjPatientRecord->row['checkup_type'];
							$ObjPatientRecord->company_name 		= strip($ObjPatientRecord->row['company_name']);
							$ObjPatientRecord->patient_name 		= strip($ObjPatientRecord->row['patient_name']);	
							$ObjPatientRecord->date_of_examination 	= $ObjPatientRecord->row['date_of_examination'];
							$ObjPatientRecord->date_of_examination 	= date("d-m-Y",strtotime($ObjPatientRecord->date_of_examination));
						?>
							<tr>
								<td align="center">
									<input class="patId" type="checkbox" name="patient_id[]" value="<?=$ObjPatientRecord->patient_id?>"/>
								</td>
								<td align="right"><?php echo $ObjPatientRecord->patient_id;?></td>
								<td><?php echo $ObjPatientRecord->patient_name;?></td>
								<td><?php echo $ObjPatientRecord->company_name;?></td>
								<td><?php echo $ObjPatientRecord->checkup_type;?></td>
								<td align="left"><?php echo $ObjPatientRecord->date_of_examination;?></td>
								<td align="center"><a href="<?=$siteURL?>record.php?pid=<?=$ObjPatientRecord->patient_id ?>"><img src="images/icon_edit_record.png" width="18" height="18" alt="Edit Record" /></td>
								<td align="center"><img src="images/icon_delete.png" width="16" height="16" alt="Delete Record" onclick="deleteRecord(<?=$ObjPatientRecord->patient_id;?>);" style="cursor:pointer" /></td>
								<td align="center"><a href="<?=$siteURL?>record_print.php?pid=<?=$ObjPatientRecord->patient_id ?>"><img src="images/icon_view.png" width="16" height="16" alt="View Record" /></td>
								<!--td align="center"><img src="images/print.png" width="16" height="16" alt="Print Record" /></td>
								<td align="center"><img src="images/icon_card.png" width="16" height="16" alt="Create Card" /></td-->
							</tr>
						<?php					
						}
					}
					else
					{
						?>
						<tr>
							<td align="left" colspan="10"><?php echo "No Records Found!";?></td>
						</tr>
						<?php
						
					}
				  ?>
				</table>
				<?php 
				// code for pagination
				if($ObjPatientRecord->NoOfPages > 1 )
				{
				?>
				<div class="pagination" align="right">
					 <div class="pageNumbers float_left ">
						<span class="pagetext float_left">
							<?php
							if($ObjPatientRecord->res > $pages->items_per_page)

							{ 
								echo $pages->display_pages();
							} 
							?>
						</span>
					</div>
				</div>
				<?php 
				} 
				// pagination code end
				 ?>
			</form>
        </div><!--/listing-->
		<a href="javascript:void(0)" id="dlbtn" style="display: none;">
		<!-- <a href="javascript:void(0)" id="pdfdlbtn" style="display: none;"> -->
		<button type="button" id="mine">Export</button>
		<!-- <button type="button" id="pdf">Pdf</button> -->
</a>
      <div class="cf"></div>
    </div>	<!--/container-->
<!--  end body section --->	

<!-- ajax for selected row export -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

	$(".check_all").on("click", function () {
		if ($("input:checkbox").prop("checked")) {
			$(".exportdata").prop('disabled',false);
			$("input:checkbox[name='patient_id[]']").prop("checked", true);
		} else {
			$(".exportdata").prop('disabled',true);
			$("input:checkbox[name='patient_id[]']").prop("checked", false);
		}
	});

	// $('input:checkbox').click(function() {
	// 	if ($(this).is(':checked')) {
	// 	$('.exportdata').prop("disabled", false);
	// 	} else {
	// 	if ($('.checks').filter(':checked').length < 1){
	// 	$('.exportdata').attr('disabled',true);}
	// 	}
	// });

	$(".patId").on("click", function () {
		if ($("input:checkbox").prop("checked")) {
			$(".exportdata").prop('disabled',false);
			$(this).prop("checked", true);
		}
	});

	function exportData(){

		let patientId = [];
		$(".patId").each(function() {
			if(this.checked){
				patientId.push($(this).val());
			}
		});
		console.log(patientId);
		$.ajax({
			url : 'custom_export.php',
			method : 'POST',
			data : {'id': patientId},
			success : function(result){

				setTimeout(function() {
						var dlbtn = document.getElementById("dlbtn");
						var file = new Blob([result], {type: 'text/csv'});
						dlbtn.href = URL.createObjectURL(file);
						dlbtn.download = 'myfile.csv';
						$( "#mine").click();
						}, 2000);
					}
		});
	}

	function exportDataAsPdf(){
		let patientId = [];
		$(".patId").each(function() {
			if(this.checked){
				patientId.push($(this).val());
			}
		});

		window.open('export_pdf.php?id='+patientId);

	}
</script>
<!-- end -->


<!-- Footer Section -->
<?php include("footer.php");?>
