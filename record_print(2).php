<?php
session_start();
include("inc_classes.php");
include("loginChk.php");
$ObjPatientRecord					= new patientRecord();

if(isset($_GET['pid']))
{
	$ObjPatientRecord->patient_id = $_GET['pid'];
	
	$patient_details = $ObjPatientRecord->patient_details("patient_id = $ObjPatientRecord->patient_id ");
	
	for ($i=0;$i<count($patient_details);$i++)
	{	
		$ObjPatientRecord->row		= $patient_details[$i];
				
		$ObjPatientRecord->patient_id 			= $ObjPatientRecord->row['patient_id'];
		$ObjPatientRecord->checkup_type 		= $ObjPatientRecord->row['checkup_type'];
		$ObjPatientRecord->company_name 		= strip($ObjPatientRecord->row['company_name']);
		$ObjPatientRecord->patient_name 		= strip($ObjPatientRecord->row['patient_name']);
		$ObjPatientRecord->patient_education 	= $ObjPatientRecord->row['patient_education'];
		$ObjPatientRecord->patient_birth_date 	= $ObjPatientRecord->row['patient_birth_date'];
		$ObjPatientRecord->patient_age 			= $ObjPatientRecord->row['patient_age'];
		$ObjPatientRecord->identification_mark 	= $ObjPatientRecord->row['identification_mark'];
		$ObjPatientRecord->patient_sex 			= $ObjPatientRecord->row['patient_sex'];
		$ObjPatientRecord->date_of_examination 	= $ObjPatientRecord->row['date_of_examination'];
		$ObjPatientRecord->mariatal_status 		= $ObjPatientRecord->row['mariatal_status'];
		$ObjPatientRecord->type_of_industry 	= $ObjPatientRecord->row['type_of_industry'];
		$ObjPatientRecord->services_years 		= $ObjPatientRecord->row['services_years'];
		$ObjPatientRecord->service_month 		= $ObjPatientRecord->row['service_month'];
		$ObjPatientRecord->nature_of_work 		= $ObjPatientRecord->row['nature_of_work'];
		$ObjPatientRecord->ppe_used 			= $ObjPatientRecord->row['ppe_used'];
		$ObjPatientRecord->smoking 				= $ObjPatientRecord->row['smoking'];
		$ObjPatientRecord->alcohol 				= $ObjPatientRecord->row['alcohol'];
		$ObjPatientRecord->tobaco 				= $ObjPatientRecord->row['tobaco'];
		$ObjPatientRecord->gutakha 				= $ObjPatientRecord->row['gutakha'];
		$ObjPatientRecord->habit_other 			= $ObjPatientRecord->row['habit_other'];
		$ObjPatientRecord->habit_otherText 		= $ObjPatientRecord->row['habit_otherText'];
		$ObjPatientRecord->habit_none 			= $ObjPatientRecord->row['habit_none'];
		$ObjPatientRecord->past_illness_record 	= $ObjPatientRecord->row['past_illness_record'];
		$ObjPatientRecord->father_idh 			= $ObjPatientRecord->row['father_idh'];
		$ObjPatientRecord->father_htn 			= $ObjPatientRecord->row['father_htn'];
		$ObjPatientRecord->father_dn 			= $ObjPatientRecord->row['father_dn'];
		$ObjPatientRecord->father_asthama 		= $ObjPatientRecord->row['father_asthama'];
		$ObjPatientRecord->father_koch 			= $ObjPatientRecord->row['father_koch'];
		$ObjPatientRecord->father_tremors 		= $ObjPatientRecord->row['father_tremors'];
		$ObjPatientRecord->father_other 		= $ObjPatientRecord->row['father_other'];
		$ObjPatientRecord->father_otherText 	= $ObjPatientRecord->row['father_otherText'];
		$ObjPatientRecord->father_none 			= $ObjPatientRecord->row['father_none'];
		$ObjPatientRecord->mother_idh 			= $ObjPatientRecord->row['mother_idh'];
		$ObjPatientRecord->mother_htn 			= $ObjPatientRecord->row['mother_htn'];
		$ObjPatientRecord->mother_dm 			= $ObjPatientRecord->row['mother_dm'];
		$ObjPatientRecord->mother_asthama 		= $ObjPatientRecord->row['mother_asthama'];
		$ObjPatientRecord->mother_koch 			= $ObjPatientRecord->row['mother_koch'];
		$ObjPatientRecord->mother_tremors 		= $ObjPatientRecord->row['mother_tremors'];
		$ObjPatientRecord->mother_other 		= $ObjPatientRecord->row['mother_other'];
		$ObjPatientRecord->mother_otherText 	= $ObjPatientRecord->row['mother_otherText'];
		$ObjPatientRecord->mother_none 			= $ObjPatientRecord->row['mother_none'];
		$ObjPatientRecord->pysical_handicap 	= $ObjPatientRecord->row['pysical_handicap'];
		$ObjPatientRecord->HO_health_hazatd 	= $ObjPatientRecord->row['HO_health_hazatd'];
		$ObjPatientRecord->HO_allergies 		= $ObjPatientRecord->row['HO_allergies'];
		$ObjPatientRecord->HO_exposure 			= $ObjPatientRecord->row['HO_exposure'];
		$ObjPatientRecord->present_compliaints 	= $ObjPatientRecord->row['present_compliaints'];
		$ObjPatientRecord->mutation 			= $ObjPatientRecord->row['mutation'];
		$ObjPatientRecord->obs_gyneac 			= $ObjPatientRecord->row['obs_gyneac'];
		$ObjPatientRecord->height 				= $ObjPatientRecord->row['height'];
		$ObjPatientRecord->weight 				= $ObjPatientRecord->row['weight'];
		$ObjPatientRecord->BMI 					= $ObjPatientRecord->row['BMI'];
		$ObjPatientRecord->BP 					= $ObjPatientRecord->row['BP'];
		$ObjPatientRecord->pulse 				= $ObjPatientRecord->row['pulse'];
		$ObjPatientRecord->icterus 				= $ObjPatientRecord->row['icterus'];
		$ObjPatientRecord->edema 				= $ObjPatientRecord->row['edema'];
		$ObjPatientRecord->pollar 				= $ObjPatientRecord->row['pollar'];
		$ObjPatientRecord->cyanosis 			= $ObjPatientRecord->row['cyanosis'];
		$ObjPatientRecord->glands 				= $ObjPatientRecord->row['glands'];
		$ObjPatientRecord->oral_cavity 			= $ObjPatientRecord->row['oral_cavity'];
		$ObjPatientRecord->hermial_sites 		= $ObjPatientRecord->row['hermial_sites'];
		$ObjPatientRecord->examination_other 	= $ObjPatientRecord->row['examination_other'];
		$ObjPatientRecord->examination_otherText = $ObjPatientRecord->row['examination_otherText'];
		$ObjPatientRecord->examination_nill 	= $ObjPatientRecord->row['examination_nill'];
		$ObjPatientRecord->CVS 					= $ObjPatientRecord->row['CVS'];
		$ObjPatientRecord->RS 					= $ObjPatientRecord->row['RS'];
		$ObjPatientRecord->PA 					= $ObjPatientRecord->row['PA'];
		$ObjPatientRecord->CNS 					= $ObjPatientRecord->row['CNS'];
		$ObjPatientRecord->visual_acuityLeft 	= $ObjPatientRecord->row['visual_acuityLeft'];
		$ObjPatientRecord->visual_acuityRight 	= $ObjPatientRecord->row['visual_acuityRight'];
		$ObjPatientRecord->color_version 		= $ObjPatientRecord->row['color_version'];
		$ObjPatientRecord->audiometry_left_ear 	= $ObjPatientRecord->row['audiometry_left_ear'];
		$ObjPatientRecord->audiometry_right_ear = $ObjPatientRecord->row['audiometry_right_ear'];
		$ObjPatientRecord->lungFunction 		= $ObjPatientRecord->row['lungFunction'];
		$ObjPatientRecord->heamoglobin 			= $ObjPatientRecord->row['heamoglobin'];
		$ObjPatientRecord->total_count 			= $ObjPatientRecord->row['total_count'];
		$ObjPatientRecord->DC_nutrophil 		= $ObjPatientRecord->row['DC_nutrophil'];
		$ObjPatientRecord->eosinophil 			= $ObjPatientRecord->row['eosinophil'];
		$ObjPatientRecord->lymphocyte 			= $ObjPatientRecord->row['lymphocyte'];
		$ObjPatientRecord->basophill 			= $ObjPatientRecord->row['basophill'];
		$ObjPatientRecord->monocyte 			= $ObjPatientRecord->row['monocyte'];
		$ObjPatientRecord->protien 				= $ObjPatientRecord->row['protien'];
		$ObjPatientRecord->sugar 				= $ObjPatientRecord->row['sugar'];
		$ObjPatientRecord->RBC 					= $ObjPatientRecord->row['RBC'];
		$ObjPatientRecord->pus_cell 			= $ObjPatientRecord->row['pus_cell'];
		$ObjPatientRecord->epithelial_cell 		= $ObjPatientRecord->row['epithelial_cell'];
		$ObjPatientRecord->urinTest_other 		= $ObjPatientRecord->row['urinTest_other'];
		$ObjPatientRecord->blood_group 			= $ObjPatientRecord->row['blood_group'];
		$ObjPatientRecord->RHfactor 			= $ObjPatientRecord->row['RHfactor'];
		$ObjPatientRecord->ESR 					= $ObjPatientRecord->row['ESR'];
		$ObjPatientRecord->cholesterol 			= $ObjPatientRecord->row['cholesterol'];
		$ObjPatientRecord->ECG 					= $ObjPatientRecord->row['ECG'];
		$ObjPatientRecord->PFT 					= $ObjPatientRecord->row['PFT'];
		$ObjPatientRecord->USG 					= $ObjPatientRecord->row['USG'];
		$ObjPatientRecord->x_ray_chest 			= $ObjPatientRecord->row['x_ray_chest'];
		$ObjPatientRecord->BSL_random 			= $ObjPatientRecord->row['BSL_random'];
		$ObjPatientRecord->BSL_FF 				= $ObjPatientRecord->row['BSL_FF'];
		$ObjPatientRecord->BSL_PP 				= $ObjPatientRecord->row['BSL_PP'];
		$ObjPatientRecord->KFT_blood_urea 		= $ObjPatientRecord->row['KFT_blood_urea'];
		$ObjPatientRecord->KFT_serum 			= $ObjPatientRecord->row['KFT_serum'];
		$ObjPatientRecord->comment 				= $ObjPatientRecord->row['comment'];
		$ObjPatientRecord->Advice 				= $ObjPatientRecord->row['Advice'];
		$ObjPatientRecord->Additional_Info 		= $ObjPatientRecord->row['Additional_Info'];
		$ObjPatientRecord->medical_fitness 		= $ObjPatientRecord->row['medical_fitness'];
		$ObjPatientRecord->doctor_name 			= $ObjPatientRecord->row['doctor_name'];
		$ObjPatientRecord->docyor_qualification = $ObjPatientRecord->row['docyor_qualification'];

                //for calculating patient age
                $currentYear = (int)date('Y');
                $patientBirthYear = (int)date("Y",strtotime($ObjPatientRecord->patient_birth_date));
                $ObjPatientRecord->patient_age = $currentYear - $patientBirthYear;
		
		$ObjPatientRecord->patient_birth_date 	= date("d-m-Y",strtotime($ObjPatientRecord->patient_birth_date));
		$ObjPatientRecord->date_of_examination 	= date("d-m-Y",strtotime($ObjPatientRecord->date_of_examination));


		
	}
}

?>
<?php include("header.php");?>

<div class="cf"></div>

<!--  body section --->	
	<div id="container">
    	       
        <div id="report">
        	<form action="" method="get" class="niceform">
                <div id="checkType">
                    <div style="float:left">
                    <strong>Checkup Type:</strong><?php if($ObjPatientRecord->checkup_type == "pre"){ echo "Pre-employment";}else { echo ucfirst($ObjPatientRecord->checkup_type);}?> 
                    </div>
                    
                    <div style="float:right;"><strong>Company Name:</strong> <?php echo $ObjPatientRecord->company_name;?></div>
               </div>
               
               <div class="box">
                    	<div class="titleTab"><h1><span>Personal Details</span></h1></div>
                        <div class="box_container">
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="130"><label>Name:</label></td>
                                <td width="300"><?php echo $ObjPatientRecord->patient_name;?></td>
                                <td width="130"><label>Education:</label></td>
                                <td><?php echo $ObjPatientRecord->patient_education;?></td>
                              </tr>
                              <tr>
                                <td><label>Date of Birth:</label></td>
                                <td><?php echo $ObjPatientRecord->patient_birth_date;?></td>
                                <td><label>Age</label></td>
                                <td><?=$ObjPatientRecord->patient_age;?></td>
                                
                              </tr>
                              <tr>
                                <td><label>Identification Mark:</label></td>
                                <td><?php echo $ObjPatientRecord->identification_mark;?></td>
                                <td><label>Sex:</label></td>
                                <td><?php if($ObjPatientRecord->patient_sex == "M"){ echo "Male"; } else { echo "Female";}?></td>
                                
                              </tr>
                              <tr>
                                <td><label>Date of Examination:</label></td>
                                <td><?php echo $ObjPatientRecord->date_of_examination;?></td>
                                <td><label>Mariatal Status:</label></td>
                                <td><?php if($ObjPatientRecord->mariatal_status == "Y"){ echo "Married";} else { echo "Unmarried"; } ?></td>                                
                              </tr>
                            </table>
                        </div>
                       
              </div>
              
					<div class="box">
                    	<div class="titleTab"><h1><span>Work Profile</span></h1></div>
                        <div class="box_container">
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="130" align="left"><label>Type of Industry:</label></td>
                                <td width="275" align="left"><?php echo $ObjPatientRecord->type_of_industry;?></td>
                                <td width="120" align="left"><label>Nature of Work:</label></td>
                                <td align="left"><?php echo $ObjPatientRecord->nature_of_work;?></td>
                              </tr>
                              <tr>
                                <td align="left" width="130"><label>Duration of Service:</label></td>
                                <td align="left" width="275">
                                <?php echo $ObjPatientRecord->services_years;?> <b>Yrs.</b>
                                <?php echo $ObjPatientRecord->service_month;?> <b>Mths.</b>
                                </td>
                                <td align="left"><label>Any PPE Used:</label></td>
                                <td align="left"><?php echo $ObjPatientRecord->ppe_used;?></td>
                              </tr>
                            </table>
         				</div>
              		</div>
                    
                    <div class="box">
                    	<div class="titleTab"><h1><span>Health Status</span></h1></div>
                        <div class="box_container">
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="25%" valign="top"><label>Habits:</label></td>
                                <td colspan="3" valign="top">									
									<?php 
									if($ObjPatientRecord->habit_none == "Y")
									{ 
										echo "None.";
									}
									else
									{
										$habits = array();
										if($ObjPatientRecord->smoking == "Y"){ $habits[] = "Smoking";}
										if($ObjPatientRecord->alcohol == "Y"){ $habits[] = "Alcohol";}
										if($ObjPatientRecord->tobaco == "Y"){ $habits[] = "Tobaco";} 
										if($ObjPatientRecord->gutakha == "Y"){ $habits[] = "Gutakha";}
										if($ObjPatientRecord->habit_other == "Y"){ $habits[] = $ObjPatientRecord->habit_otherText;}
										
										if(count($habits) <= 0)
										{		
											echo "None.";
										}
										else
										{
											echo $habits_str = implode(", ",$habits);												
										}
									}
									?>									
								</td>
                              </tr>
                              <tr>
                                <td valign="top"><label>Any Past Illness / Surgery:</label></td>
                                <td colspan="3" valign="top"><?php echo $ObjPatientRecord->past_illness_record;?></td>
                              </tr>
                              <tr>
                                <td valign="top">
                                <label>Family H/O Any Disease:</label>
                                </td>
                                <td colspan="3" valign="top">
									<?php 
									if($ObjPatientRecord->father_none == "Y")
									{ 
										$Father_str = "None.";
									}
									else
									{
										$Father = array();
										if($ObjPatientRecord->father_idh == "Y"){ $Father[] = "IHD";}
										if($ObjPatientRecord->father_htn == "Y"){ $Father[] = "Htn";}
										if($ObjPatientRecord->father_dn == "Y"){ $Father[] = "Dm";} 
										if($ObjPatientRecord->father_asthama == "Y"){ $Father[] = "Asthma";}
										if($ObjPatientRecord->father_koch == "Y"){ $Father[] = "Koch's";}
										if($ObjPatientRecord->father_tremors == "Y"){ $Father[] = "Tremors";}
										if($ObjPatientRecord->father_other == "Y"){ $Father[] = $ObjPatientRecord->father_otherText;}
										
										if(count($Father) <= 0)
										{		
											$Father_str = "None.";
										}
										else
										{
											$Father_str = implode(", ",$Father);												
										}										
									}
									echo "Father: ".$Father_str;
									?>
								</td>
                              </tr>
                              <tr>
                                <td valign="top">&nbsp;</td>
                                <td colspan="3" valign="top">
									<?php 
									if($ObjPatientRecord->mother_none == "Y")
									{ 
										$mother_str = "None.";
									}
									else
									{
										$mother = array();
										if($ObjPatientRecord->mother_idh == "Y"){ $mother[] = "IHD";}
										if($ObjPatientRecord->mother_htn == "Y"){ $mother[] = "Htn";}
										if($ObjPatientRecord->mother_dm == "Y"){ $mother[] = "DM";} 
										if($ObjPatientRecord->mother_asthama == "Y"){ $mother[] = "Asthma";}
										if($ObjPatientRecord->mother_koch == "Y"){ $mother[] = "Koch's";}
										if($ObjPatientRecord->mother_tremors == "Y"){ $mother[] = "Tremors";}
										if($ObjPatientRecord->mother_other == "Y"){ $mother[] = $ObjPatientRecord->mother_otherText;}
										
										if(count($mother) <= 0)
										{		
											$mother_str = "None.";
										}
										else
										{
											$mother_str = implode(", ",$mother);												
										}										
									}
									echo "Mother: ".$mother_str;
									?>
								</td>
                              </tr>
                              <tr>
                                <td valign="top"><label>Physical Handicaps:</label></td>
                                <td width="30%" valign="top"><?php echo $ObjPatientRecord->pysical_handicap;?></td>
                                <td width="125" valign="top"><label>Present Complaints:</label></td>
                                <td valign="top"><?php echo $ObjPatientRecord->present_compliaints;?></td>
                              </tr>
                              <tr>
                                <td valign="top"><label>H/O Any Occupation Related<br />
Health Hazard:</label></td>
                                <td valign="top"><?php echo $ObjPatientRecord->HO_health_hazatd;?></td>
                                <td valign="top"><label>Bowels / Micturation:</label></td>
                                <td valign="top"><?php echo $ObjPatientRecord->mutation;?></td>
                              </tr>
                              <tr>
                                <td valign="top"><label>H/O Any Allergies<br />
                                (Including Drugs):</label></td>
                                <td valign="top"><?php echo $ObjPatientRecord->HO_allergies;?></td>
                                <td valign="top"><label>Obs. / Gyneac:</label></td>
                                <td valign="top"><?php echo $ObjPatientRecord->obs_gyneac;?></td>
                              </tr>
                              <tr>
                                <td valign="top"><label>H/O Exposure:</label></td>
                                <td valign="top"><?php echo $ObjPatientRecord->HO_exposure;?></td>
                                <td valign="top">&nbsp;</td>
                                <td valign="top">&nbsp;</td>
                              </tr>
                            </table>
         				</div>
              		</div>
                    
                    <div class="box">
                    	<div class="titleTab"><h1><span>Examination</span></h1></div>
                        <div class="box_container">
                        	
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td colspan="5"><h2>I GENERAL</h2></td>
                              </tr>
                              <tr>
                                <td width="20%" align="left"><label>Height:</label><?php echo $ObjPatientRecord->height;?> <b>Mtrs.</b></td>
                                <td width="20%" align="left"><label>Weight:</label><?php echo $ObjPatientRecord->weight;?> <b>Kg.</b>
                                </td>
                                <td width="20%" align="left"><label>BMI:</label><?php echo $ObjPatientRecord->BMI;?></td>
                                <td width="20%" align="left"><label>B.P.:</label><?php echo $ObjPatientRecord->BP;?> <b>mmhg</b>
                                </td>
                                <td width="20%" align="left"><label>Pulse:</label><?php echo $ObjPatientRecord->pulse;?><b> / Min.</b>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="5"><label>Other Signs: </label>
									<?php 
									if($ObjPatientRecord->examination_nill == "Y")
									{ 
										$examination_nill = "None.";
									}
									else
									{
										$examination = array();
										if($ObjPatientRecord->icterus == "Y"){ $examination[] = "Icterus";}
										if($ObjPatientRecord->edema == "Y"){ $examination[] = "Edema";}
										if($ObjPatientRecord->pollar == "Y"){ $examination[] = "Pallor";} 
										if($ObjPatientRecord->cyanosis == "Y"){ $examination[] = "Cyanosis";}
										if($ObjPatientRecord->glands == "Y"){ $examination[] = "Glands";}
										if($ObjPatientRecord->oral_cavity == "Y"){ $examination[] = "Oral Cavity";}
										if($ObjPatientRecord->hermial_sites == "Y"){ $examination[] = "Hernial Sites";}
										if($ObjPatientRecord->examination_other == "Y"){ $examination[] = $ObjPatientRecord->examination_otherText;}
										
										if(count($examination) <= 0)
										{		
											$examination_nill = "None.";
										}
										else
										{
											$examination_nill = implode(", ",$examination);												
										}										
									}
									echo $examination_nill;
									?>
								</td>
                              </tr>
                            </table>
            <br />
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td colspan="4"><h2>II SYSTEMIC</h2></td>
                              </tr>
                              <tr>
                                <td width="5%"><label>CVS:</label></td>
                                <td width="44%"><?php echo $ObjPatientRecord->CVS?></td>
                                <td width="5%"><label>RS:</label></td>
                                <td width="43%"><?php echo $ObjPatientRecord->RS?></td>
                              </tr>
                              <tr>
                                <td><label>P/A:</label></td>
                                <td><?php echo $ObjPatientRecord->PA?></td>
                                <td><label>CNS:</label></td>
                                <td><?php echo $ObjPatientRecord->CNS?></td>
                              </tr>
                            </table>
                            <br />
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td colspan="3"><h2>III SPECIFIC</h2></td>
                              </tr>
                              <tr>
                                <td width="7%"><label>Vision:</label></td>
                                <td><b style="margin-right:3px;">Left Eye:</b><?php echo $ObjPatientRecord->visual_acuityLeft?>
                                <b style="margin-right:3px; margin-left:12px;">Right Eye:</b><?php echo $ObjPatientRecord->visual_acuityRight?></td>
                                <td width="49%"><label>Colour Vision:</label><?php echo $ObjPatientRecord->color_version?></td>
                              </tr>
                              <tr>
                                <td><label>Audiometry:</label></td>
                                <td>
                               	  <b style="margin-right:3px;">Left Ear:</b><?php echo $ObjPatientRecord->audiometry_left_ear?>
                                  <b style="margin-right:3px; margin-left:12px;">Right Ear:</b><?php echo $ObjPatientRecord->audiometry_right_ear?>
                                </td>
                                <td><label>Lung Function test (P.E.F.R.):</label><?php echo $ObjPatientRecord->lungFunction?><b> L/min</b></td>
                              </tr>
                            </table>
         				</div>
              		</div>
                    
                    <div class="box">
                    	<div class="titleTab"><h1><span>Investigations</span></h1></div>
                        <div class="box_container">
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td valign="top">
                                	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="invest">
                                      <thead>
                                      <tr>
                                        <th>CBC</th>
                                        <th>Employee's Values</th>
                                        <th>Normal Values</th>
                                      </tr>
                                      </thead>
                                      <tr>
                                        <td>Heamoglobin</td>
                                        <td><?php echo $ObjPatientRecord->heamoglobin?><b> gms/100ml</b></td>
                                        <td>13.5-18.5 <b>gms/100ml</b></td>
                                      </tr>
                                      <tr>
                                        <td>Total WBC Count</td>
                                        <td><?php echo $ObjPatientRecord->total_count?><b>/cu mm</b></td>
                                        <td>4000-11000 <b>/cu mm</b></td>
                                      </tr>
                                      <tr>
                                        <td>DC: Neutrophil</td>
                                        <td><?php echo $ObjPatientRecord->DC_nutrophil?> <b>%</b></td>
                                        <td>40-70 <b>%</b></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eosinophil</td>
                                        <td><?php echo $ObjPatientRecord->eosinophil?> <b>%</b></td>
                                        <td>1-6 <b>%</b></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lymphocyte</td>
                                        <td><?php echo $ObjPatientRecord->lymphocyte?> <b>%</b></td>
                                        <td>20-45 <b>%</b></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Basophil</td>
                                        <td><?php echo $ObjPatientRecord->basophill?><b>%</b></td>
                                        <td>0-1 <b>%</b></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Monocyte</td>
                                        <td><?php echo $ObjPatientRecord->monocyte?> <b>%</b></td>
                                        <td>1-8 <b>%</b></td>
                                      </tr>
                                    </table>
                                </td>
                                <td width="40" valign="top">&nbsp;</td>
                                <td valign="top">
                                	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="invest">
                                      <thead>
                                      <tr>
                                        <th>Urine Test</th>
                                        <th>&nbsp;</th>
                                      </tr>
                                      </thead>
                                      <tr>
                                        <td>Protine</td>
                                        <td><?php echo $ObjPatientRecord->protien?></td>
                                      </tr>
                                      <tr>
                                        <td>Sugar</td>
                                        <td><?php echo $ObjPatientRecord->sugar?></td>
                                      </tr>
                                      <tr>
                                        <td>RBC</td>
                                        <td><?php echo $ObjPatientRecord->RBC?><b>/hpf</b></td>
                                      </tr>
                                      <tr>
                                        <td>Pus Cells</td>
                                        <td><?php echo $ObjPatientRecord->pus_cell?> <b>/hpf</b></td>
                                      </tr>
                                      <tr>
                                        <td>Epithelial Cells</td>
                                        <td><?php echo $ObjPatientRecord->epithelial_cell?> <b>/hpf</b></td>
                                      </tr>
                                      <tr>
                                        <td>Other</td>
                                        <td><?php echo $ObjPatientRecord->urinTest_other?></td>
                                      </tr>
                                    </table>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="3" valign="top" style="padding:0; border-bottom:none">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="top:0;">
                                  <tr>
                                    <td width="15%"><label>Blood Group:</label><br />
										<?php echo $ObjPatientRecord->blood_group?>
                                    </td>
                                      <td width="15%"><label>Rh Factor:</label><br />
                                            <?php echo $ObjPatientRecord->RHfactor?>
                                      </td>
                                      <td width="15%"><label>ESR:</label><br />
                                            <?php echo $ObjPatientRecord->ESR?>	
                                      </td>
                                      <td width="20%"><label>Cholesterol:</label><br />
                                            <?php echo $ObjPatientRecord->cholesterol?> <b>mg/dl</b>
                                      </td>
                                      <td><label>BSL:</label><br />
										Random: <?php echo $ObjPatientRecord->BSL_random?> mg/dl&nbsp;&nbsp;&nbsp;F: <?php echo $ObjPatientRecord->BSL_FF?> mg/dl &nbsp;&nbsp;&nbsp;PP: <?php echo $ObjPatientRecord->BSL_PP?> mg/dl
                                  		</td>
                                  </tr>
                                  <tr>
                                    <td><label>ECG:</label><br />
										<?php echo $ObjPatientRecord->ECG?>
                                    </td>
                                    <td><label>PFT:</label><br />
										<?php echo $ObjPatientRecord->PFT?>
                                    </td>
                                    <td><label>USG:</label><br />
										<?php echo $ObjPatientRecord->USG?>
                                    </td>
                                    <td><label>X-ray Chest:</label><br />
										<?php echo $ObjPatientRecord->x_ray_chest?>
                                    </td>
                                    <td><label>KFT:</label><br />
									Blood Urea: <?php echo $ObjPatientRecord->KFT_blood_urea?> &nbsp;&nbsp;&nbsp;Serum Creatinine: <?php echo $ObjPatientRecord->KFT_serum?></td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table>
         				</div>
              		</div>
                    
                    <div class="box">
                    	<div class="titleTab"><h1><span>Comment &amp; Advice</span></h1></div>
                        <div class="box_container">
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="140" valign="top"><label>Comment:</label></td>
                                <td align="left" valign="top"><?php echo $ObjPatientRecord->comment?></td>
                              </tr>
                              <tr>
                                <td valign="top"><label>Advice:</label></td>
                                <td align="left" valign="top"><?php echo $ObjPatientRecord->Advice?></td>
                              </tr>
							  <tr>
                                <td valign="top"><label>Additional Information:</label></td>
                                <td align="left" valign="top"><?php echo $ObjPatientRecord->Additional_Info?></td>
                              </tr>
                            </table>
         				</div>
              		</div>
                    
                    <div class="box_container result">
                        	<label>Medical Fitness:</label> 
                            <label><?php if($ObjPatientRecord->medical_fitness == "Y"){ echo "FIT";} else { echo "UNFIT"; }?></label>
                    </div>
                    
					<div class="box_container doctor">
                        	<?php echo "Dr. ".ucfirst($ObjPatientRecord->doctor_name);?>, <?php echo $ObjPatientRecord->docyor_qualification?>
         			</div>
                    
                    <div class="action">
                    <!--input name="Save" value="Save" type="button" /> <input name="Cancel" value="Cancel" type="button" /-->
					<input name="edit" value="Edit" type="button" onclick="javascript : window.location ='<?php echo $siteURL;?>record.php?pid=<?php echo $ObjPatientRecord->patient_id;?>';" /> 
					<input name="Print" value="Print" type="button" onclick="window.print()" /> 
					<!--input name="Print" value="Print" type="button" onclick="PrintElem('#report')" /-->
					<input name="Print Preview" value="Create Card" type="button" onclick="javascript:window.location ='<?php echo $siteURL;?>card.php?pid=<?php echo $ObjPatientRecord->patient_id;?>';"/>
                    </div>
            </form>
        </div>
        <div class="cf"></div>
    </div>	<!--/container-->
<!--  end body section --->	

<!-- Footer Section -->
<?php include("footer.php");?>