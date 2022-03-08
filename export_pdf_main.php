<?php
session_start();
include ("inc_classes.php");
include ("loginChk.php");
$ObjPatientRecord = new patientRecord();

$c = 1;
// Getting list of patient id
// print_r($_GET['id']);
// $idlist = implode(',', $_GET['id']);
$c .= " AND patient_id IN (" . $_GET['id'] . ")"; // condition for specific data
$patient_details = $ObjPatientRecord->patient_details($c);
$html = '';
for ($i=0;$i<count($patient_details);$i++){

    if($i != 0){
      $html .= '<div style="page-break-after: always;"></div>';
    }
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
            
    $ObjPatientRecord->surgeonName 			= $ObjPatientRecord->row['surgeonName'];
    $ObjPatientRecord->surgeonQualifications = $ObjPatientRecord->row['surgeonQualifications'];

    //for calculating patient age
    $currentYear = (int)date('Y');
    $patientBirthYear = (int)date("Y",strtotime($ObjPatientRecord->patient_birth_date));
    $ObjPatientRecord->patient_age = $currentYear - $patientBirthYear;
            
    $ObjPatientRecord->patient_birth_date 	= date("d-m-Y",strtotime($ObjPatientRecord->patient_birth_date));
    $ObjPatientRecord->date_of_examination 	= date("d-m-Y",strtotime($ObjPatientRecord->date_of_examination));

    if ($ObjPatientRecord->checkup_type == "pre"){
        $checkuptype = "Pre-employment";
    }else{
        $checkuptype = ucfirst($ObjPatientRecord->checkup_type);
    }

    if ($ObjPatientRecord->patient_sex == "M"){
        $gender = "Male";
    }else{
        $gender = "Female";
    }

    if ($ObjPatientRecord->mariatal_status == "Y"){
        $marital_status = "Married";
    }else{
        $marital_status = "Unmarried";
    } 

    if ($ObjPatientRecord->father_none == "Y"){
        $Father_str = "None.";
    }else{
        $Father = array();
        if ($ObjPatientRecord->father_idh == "Y")
        {
            $Father[] = "IHD";
        }
        if ($ObjPatientRecord->father_htn == "Y")
        {
            $Father[] = "Htn";
        }
        if ($ObjPatientRecord->father_dn == "Y")
        {
            $Father[] = "Dm";
        }
        if ($ObjPatientRecord->father_asthama == "Y")
        {
            $Father[] = "Asthma";
        }
        if ($ObjPatientRecord->father_koch == "Y")
        {
            $Father[] = "Koch's";
        }
        if ($ObjPatientRecord->father_tremors == "Y")
        {
            $Father[] = "Tremors";
        }
        if ($ObjPatientRecord->father_other == "Y")
        {
            $Father[] = $ObjPatientRecord->father_otherText;
        }

        if (count($Father) <= 0)
        {
            $Father_str = "None.";
        }
        else
        {
            $Father_str = implode(", ", $Father);
        }
    }

    if ($ObjPatientRecord->father_none == "Y")
{
    $Father_str = "None.";
}
else
{
    $Father = array();
    if ($ObjPatientRecord->father_idh == "Y")
    {
        $Father[] = "IHD";
    }
    if ($ObjPatientRecord->father_htn == "Y")
    {
        $Father[] = "Htn";
    }
    if ($ObjPatientRecord->father_dn == "Y")
    {
        $Father[] = "Dm";
    }
    if ($ObjPatientRecord->father_asthama == "Y")
    {
        $Father[] = "Asthma";
    }
    if ($ObjPatientRecord->father_koch == "Y")
    {
        $Father[] = "Koch's";
    }
    if ($ObjPatientRecord->father_tremors == "Y")
    {
        $Father[] = "Tremors";
    }
    if ($ObjPatientRecord->father_other == "Y")
    {
        $Father[] = $ObjPatientRecord->father_otherText;
    }

    if (count($Father) <= 0)
    {
        $Father_str = "None.";
    }
    else
    {
        $Father_str = implode(", ", $Father);
    }
}

if ($ObjPatientRecord->mother_none == "Y")
{
    $mother_str = "None.";
}
else
{
    $mother = array();
    if ($ObjPatientRecord->mother_idh == "Y")
    {
        $mother[] = "IHD";
    }
    if ($ObjPatientRecord->mother_htn == "Y")
    {
        $mother[] = "Htn";
    }
    if ($ObjPatientRecord->mother_dm == "Y")
    {
        $mother[] = "DM";
    }
    if ($ObjPatientRecord->mother_asthama == "Y")
    {
        $mother[] = "Asthma";
    }
    if ($ObjPatientRecord->mother_koch == "Y")
    {
        $mother[] = "Koch's";
    }
    if ($ObjPatientRecord->mother_tremors == "Y")
    {
        $mother[] = "Tremors";
    }
    if ($ObjPatientRecord->mother_other == "Y")
    {
        $mother[] = $ObjPatientRecord->mother_otherText;
    }

    if (count($mother) <= 0)
    {
        $mother_str = "None.";
    }
    else
    {
        $mother_str = implode(", ", $mother);
    }
}

if ($ObjPatientRecord->examination_nill == "Y")
{
  $examination_nill = "None.";
}
else
{
  $examination = array();
  if ($ObjPatientRecord->icterus == "Y")
  {
      $examination[] = "Icterus";
  }
  if ($ObjPatientRecord->edema == "Y")
  {
      $examination[] = "Edema";
  }
  if ($ObjPatientRecord->pollar == "Y")
  {
      $examination[] = "Pallor";
  }
  if ($ObjPatientRecord->cyanosis == "Y")
  {
      $examination[] = "Cyanosis";
  }
  if ($ObjPatientRecord->glands == "Y")
  {
      $examination[] = "Glands";
  }
  if ($ObjPatientRecord->oral_cavity == "Y")
  {
      $examination[] = "Oral Cavity";
  }
  if ($ObjPatientRecord->hermial_sites == "Y")
  {
      $examination[] = "Hernial Sites";
  }
  if ($ObjPatientRecord->examination_other == "Y")
  {
      $examination[] = $ObjPatientRecord->examination_otherText;
  }

  if (count($examination) <= 0)
  {
      $examination_nill = "None.";
  }
  else
  {
      $examination_nill = implode(", ", $examination);
  }
}



if ($ObjPatientRecord->medical_fitness == "Y")
{
  $medical_fitness = "FIT";
}
else
{
  $medical_fitness = "UNFIT";
}

if ($ObjPatientRecord->habit_none == "Y")
{
    $habits_str = "None.";
}
else
{
    $habits = array();
    if ($ObjPatientRecord->smoking == "Y")
    {
        $habits[] = "Smoking";
    }
    if ($ObjPatientRecord->alcohol == "Y")
    {
        $habits[] = "Alcohol";
    }
    if ($ObjPatientRecord->tobaco == "Y")
    {
        $habits[] = "Tobaco";
    }
    if ($ObjPatientRecord->gutakha == "Y")
    {
        $habits[] = "Gutakha";
    }
    if ($ObjPatientRecord->habit_other == "Y")
    {
        $habits[] = $ObjPatientRecord->habit_otherText;
    }

    if (count($habits) <= 0)
    {
        $habits_str = "None.";
    }
    else
    {
        $habits_str = implode(", ", $habits);
    }
}

$doctor_name = ucfirst($ObjPatientRecord->doctor_name);
$surgeonName = ucfirst($ObjPatientRecord->surgeonName);

    

    $html .= '
    

    
    <h3 style="#738809;text-align:center;">M. M. A. Hospital, Occupational Health Center</h3>

    <span style="font-size:11px" >Near Telephone Exchange, MIDC, Mahad - Raigad.</span>
    <span style="font-size:11px" >Tel: (02145) 232562, 233879</span>
    <span style="font-size:11px" >E-mail: mmahospital@gmail.com   </span>  
    
            <div id="titleTab">
                <table border="0" cellspacing="5" cellpadding="5">
                  <tr>
                    <td ><strong>Checkup Type: </strong> '.$checkuptype.'</td>
                    <td style="float:right;"><strong>Company Name: </strong> <span class="">'.$ObjPatientRecord->company_name.'</span></td>
                  </tr>  
                </table>     
            
                <p style="border:1px solid #000;border-radius:5px;width:20%">
                  <strong style="padding-left: 10px;margin-top: 10px;">Personal Details</strong>
                </p>
                
                <table width="100%" border="1" cellspacing="0" cellpadding="5">
                            <tr>
                                <td width="30%"><label>Name:</label></td>
                                <td width="30%">'.$ObjPatientRecord->patient_name.'</td>
                                <td width="15%"><label>Education:</label></td>
                                <td>'.$ObjPatientRecord->patient_education.'</td>
                            </tr>

                            <tr>
                                <td><label>Date of Birth:</label></td>
                                <td>'.$ObjPatientRecord->patient_birth_date.'</td>
                                <td><label>Age</label></td>
                                <td>'.$ObjPatientRecord->patient_age.'</td>
                            </tr>

                            <tr>
                                <td><label>Identification Mark:</label></td>
                                <td>'.$ObjPatientRecord->identification_mark.'</td>
                                <td><label>Sex:</label></td>
                                <td>'.$gender.'</td>
                                
                              </tr>
                              <tr>
                                <td><label>Date of Examination:</label></td>
                                <td>'.$ObjPatientRecord->date_of_examination.'</td>
                                <td><label>Mariatal Status:</label></td>
                                <td>'.$marital_status.'</td>                                
                              </tr>
                            </table>
                       

                <p style="border:1px solid #000;border-radius:5px;width:20%">
                            <strong style="padding-left: 10px;margin-top: 10px;">Work Profile</strong>
                          </p>
           
                        	<table width="100%" border="1" cellspacing="0" cellpadding="5">
                              <tr>
                                <td width="25%" align="left"><label>Type of Industry:</label></td>
                                <td width="25%" align="left">'.$ObjPatientRecord->type_of_industry.'</td>
                                <td width="25%" align="left"><label>Nature of Work:</label></td>
                                <td align="left">'.$ObjPatientRecord->nature_of_work.'</td>
                              </tr>
                              <tr>
                                <td align="left" width="25%"><label>Duration of Service:</label></td>
                                <td align="left" width="25%">
                                '.$ObjPatientRecord->services_years.' <b>Yrs.</b>
                                '.$ObjPatientRecord->service_month.' <b>Mths.</b>
                                </td>
                                <td align="left"><label>Any PPE Used:</label></td>
                                <td align="left">'.$ObjPatientRecord->ppe_used.'</td>
                              </tr>
                            </table>


                            <p style="border:1px solid #000;width:150px">
                            <strong style="padding-left: 10px;margin-top: 10px;">Health Status</strong>
                          </p>
                            
         		
                        	<table width="100%" border="1" cellspacing="0" cellpadding="5">
                              <tr>
                                <td width="35%" valign="top"><label>Habits:</label></td>
                                <td width="65%" colspan="3" valign="top">'.$habits_str.'</td>
                              </tr>
                              <tr>
                                <td valign="top"><label>Any Past Illness / Surgery:</label></td>
                                <td colspan="3" valign="top">'.$ObjPatientRecord->past_illness_record.'</td>
                              </tr>
                              <tr>
                                <td valign="top">
                                <label>Family H/O Any Disease:</label>
                                </td>
                                <td colspan="3" valign="top">Father'.$Father_str.'</td>
                              </tr>
                              <tr>
                                <td valign="top"> </td>
                                <td colspan="3" valign="top">Mother: '.$mother_str.'</td>
                              </tr>
                              <tr>
                                <td valign="top"><label>Physical Handicaps:</label></td>
                                <td width="22%" valign="top">'.$ObjPatientRecord->pysical_handicap.'</td>
                                <td width="21%" valign="top"><label>Present Complaints:</label></td>
                                <td valign="top">'.$ObjPatientRecord->present_compliaints.'</td>
                              </tr>
                              <tr>
                                <td valign="top"><label>H/O Any Occupation Related<br />Health Hazard:</label></td>
                                <td valign="top">'.$ObjPatientRecord->HO_health_hazatd.'</td>
                                <td valign="top"><label>Bowels / Micturation:</label></td>
                                <td valign="top">'.$ObjPatientRecord->mutation.'</td>
                              </tr>
                              <tr>
                                <td valign="top"><label>H/O Any Allergies<br />
                                (Including Drugs):</label></td>
                                <td valign="top">'.$ObjPatientRecord->HO_allergies.'</td>
                                <td valign="top"><label>Obs. / Gyneac:</label></td>
                                <td valign="top">'.$ObjPatientRecord->obs_gyneac.'</td>
                              </tr>
                              <tr>
                                <td valign="top"><label>H/O Exposure:</label></td>
                                <td valign="top">'.$ObjPatientRecord->HO_exposure.'</td>
                                <td valign="top"> </td>
                                <td valign="top"> </td>
                              </tr>
                            </table>
                         
                            <p style="border:1px solid #000;width:150px">
                            <strong style="padding-left: 10px;margin-top: 10px;">Examination</strong>
                          </p>
                            
                          <table width="100%" border="1" cellspacing="0" cellpadding="5">
                            <tr>
                              <td colspan="5">
                                  <strong style="padding-left: 10px;margin-top: 10px;">I GENERAL</strong>
                              </td>
                            </tr>
                            <tr>
                              <td width="20%" align="left"><label>Height:</label>'.$ObjPatientRecord->height.' <b>Mtrs.</b></td>
                              <td width="20%" align="left"><label>Weight:</label>'.$ObjPatientRecord->weight.' <b>Kg.</b>
                              </td>
                              <td width="17%" align="left"><label>BMI:</label>'.$ObjPatientRecord->BMI.'</td>
                              <td width="25%" align="left"><label>B.P.:</label>'.$ObjPatientRecord->BP.' <b>mmhg</b>
                              </td>
                              <td width="18%" align="left"><label>Pulse:</label>'.$ObjPatientRecord->pulse.'<b> / Min.</b>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="5"><label>Other Signs: </label>
                                '.$examination_nill.'
                              </td>
                            </tr>
                          </table>
                          <br />
                          <table width="100%" border="1" cellspacing="0" cellpadding="5">
                            <tr>
                              <td colspan="5">
                                <strong style="padding-left: 10px;margin-top: 10px;">II SYSTEMIC</strong>
                              </td>
                             </tr>
                            <tr>
                              <td width="7%"><label>CVS:</label></td>
                              <td width="43%">'.$ObjPatientRecord->CVS.'</td>
                              <td width="7%"><label>RS:</label></td>
                              <td width="43%">'.$ObjPatientRecord->RS.'</td>
                            </tr>
                            <tr>
                              <td><label>P/A:</label></td>
                              <td>'.$ObjPatientRecord->PA.'</td>
                              <td><label>CNS:</label></td>
                              <td>'.$ObjPatientRecord->CNS.'</td>
                            </tr>
                          </table>
                          <br />
                          <table width="100%" border="1" cellspacing="0" cellpadding="5">
                            <tr>
                              <td colspan="5">
                                <strong style="padding-left: 10px;margin-top: 10px;">III SPECIFIC</strong>
                              </td>
                            </tr>
                            <tr>
                              <td width="15%"><label>Vision:</label></td>
                              <td width="45%"><b style="margin-right:3px;">Left Eye:</b>'.$ObjPatientRecord->visual_acuityLeft.'
                              <b style="margin-right:3px; margin-left:12px;">Right Eye:</b>'.$ObjPatientRecord->visual_acuityRight.'</td>
                              <td width="40%"><label>Colour Vision:</label>'.$ObjPatientRecord->color_version.'</td>
                            </tr>
                            <tr>
                              <td><label>Audiometry:</label></td>
                              <td>
                                   <b style="margin-right:3px;">Left Ear:</b>'.$ObjPatientRecord->audiometry_left_ear.'
                                <b style="margin-right:3px; margin-left:12px;">Right Ear:</b>'.$ObjPatientRecord->audiometry_right_ear.'
                              </td>
                              <td><label>Lung Function test (P.E.F.R.):</label>'.$ObjPatientRecord->lungFunction.'<b> L/min</b></td>
                            </tr>
                          </table>

                          <p style="border:1px solid #000;width:150px">
                          <strong style="padding-left: 10px;margin-top: 10px;">Investigations</strong>
                        </p>
                   
                        	<table width="100%" border="1" cellspacing="0" cellpadding="5">
                              <tr>
                                <td width="60%" valign="top">
                                	<table width="100%" border="1" cellspacing="0" cellpadding="5" class="invest">
                                      <thead>
                                      <tr>
                                        <th width="35%">CBC</th>
                                        <th width="35%">Employees Values</th>
                                        <th width="30%">Normal Values</th>
                                      </tr>
                                      </thead>
                                      <tr>
                                        <td>Heamoglobin</td>
                                        <td>'.$ObjPatientRecord->heamoglobin.'<b> gms/100ml</b></td>
                                        <td>13.5-18.5 <b>gms/100ml</b></td>
                                      </tr>
                                      <tr>
                                        <td>Total WBC Count</td>
                                        <td>'.$ObjPatientRecord->total_count.'<b>/cu mm</b></td>
                                        <td>4000-11000 <b>/cu mm</b></td>
                                      </tr>
                                      <tr>
                                        <td>DC: Neutrophil</td>
                                        <td>'.$ObjPatientRecord->DC_nutrophil.' <b>%</b></td>
                                        <td>40-70 <b>%</b></td>
                                      </tr>
                                      <tr>
                                        <td>        Eosinophil</td>
                                        <td>'.$ObjPatientRecord->eosinophil.' <b>%</b></td>
                                        <td>1-6 <b>%</b></td>
                                      </tr>
                                      <tr>
                                        <td>        Lymphocyte</td>
                                        <td>'.$ObjPatientRecord->lymphocyte .' <b>%</b></td>
                                        <td>20-45 <b>%</b></td>
                                      </tr>
                                      <tr>
                                        <td>        Basophil</td>
                                        <td>'.$ObjPatientRecord->basophill.'<b>%</b></td>
                                        <td>0-1 <b>%</b></td>
                                      </tr>
                                      <tr>
                                        <td>        Monocyte</td>
                                        <td>'.$ObjPatientRecord->monocyte .'<b>%</b></td>
                                        <td>1-8 <b>%</b></td>
                                      </tr>
                                    </table>
                                </td>
                                
                                <td width="40%">
                                	<table width="100%" border="1" cellspacing="0" cellpadding="5" class="invest">
                                      <thead>
                                      <tr>
                                        <th>Urine Test</th>
                                        <th> </th>
                                      </tr>
                                      </thead>
                                      <tr>
                                        <td>Protine</td>
                                        <td>'. $ObjPatientRecord->protien.'</td>
                                      </tr>
                                      <tr>
                                        <td>Sugar</td>
                                        <td>'.$ObjPatientRecord->sugar.'</td>
                                      </tr>
                                      <tr>
                                        <td>RBC</td>
                                        <td>'.$ObjPatientRecord->RBC.'<b>/hpf</b></td>
                                      </tr>
                                      <tr>
                                        <td>Pus Cells</td>
                                        <td>'.$ObjPatientRecord->pus_cell.' <b>/hpf</b></td>
                                      </tr>
                                      <tr>
                                        <td>Epithelial Cells</td>
                                        <td>'.$ObjPatientRecord->epithelial_cell.'<b>/hpf</b></td>
                                      </tr>
                                      <tr>
                                        <td>Other</td>
                                        <td>'.$ObjPatientRecord->urinTest_other.'</td>
                                      </tr>
                                    </table>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="3" valign="top" style="padding:0; border-bottom:none">
                                <table width="100%" border="1" cellspacing="0" cellpadding="5" style="top:0;">
                                  <tr>
                                    <td width="15%"><label>Blood Group:</label><br />
										'.$ObjPatientRecord->blood_group.'
                                    </td>
                                      <td width="30%"><label>Rh Factor:</label><br />
                                            '.$ObjPatientRecord->RHfactor.'
                                      </td>
                                      <td width="15%"><label>ESR:</label><br />
                                            '.$ObjPatientRecord->ESR .'
                                      </td>
                                      <td width="20%"><label>Cholesterol:</label><br />
                                            '.$ObjPatientRecord->cholesterol.' <b>mg/dl</b>
                                      </td>
                                      <td><label>BSL:</label><br />
										Random: '.$ObjPatientRecord->BSL_random.' mg/dl   F: <?php echo $ObjPatientRecord->BSL_FF ?> mg/dl    PP: <?php echo $ObjPatientRecord->BSL_PP ?> mg/dl
                                  		</td>
                                  </tr>
                                  <tr>
                                    <td><label>ECG:</label><br />
										'.$ObjPatientRecord->ECG.'
                                    </td>
                                    <td><label>PFT:</label><br />
										'.$ObjPatientRecord->PFT.'
                                    </td>
                                    <td><label>USG:</label><br />
										'.$ObjPatientRecord->USG.'
                                    </td>
                                    <td><label>X-ray Chest:</label><br />
										'.$ObjPatientRecord->x_ray_chest.'
                                    </td>
                                    <td><label>KFT:</label><br />
									Blood Urea: '.$ObjPatientRecord->KFT_blood_urea.'    Serum Creatinine: '.$ObjPatientRecord->KFT_serum.'</td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table>
                            
                            <p style="border:1px solid #000;width:150px">
                          <strong style="padding-left: 10px;margin-top: 10px;">Comment &amp; Advice</strong>
                        </p>

                          <table width="100%" border="1" cellspacing="0" cellpadding="5">
                            <tr>
                              <td width="25%" valign="top"><label>Comment:</label></td>
                              <td width="75%" align="left" valign="top">'.$ObjPatientRecord->comment.'</td>
                            </tr>
                            <tr>
                              <td valign="top"><label>Advice:</label></td>
                              <td align="left" valign="top">'.$ObjPatientRecord->Advice.'</td>
                            </tr>
                            <tr>
                              <td valign="top"><label>Additional Information:</label></td>
                              <td align="left" valign="top">'.$ObjPatientRecord->Additional_Info.'</td>
                            </tr>
                          </table>


                  <br/>
                  
                  <div class="box_container result">
                          <label>Medical Fitness:</label> 
                          <label>'.$medical_fitness.'</label>
                  </div>

                  <br/>

                  <strong style="padding-left: 10px;margin-top: 10px;">Dr. '.$doctor_name .','.$ObjPatientRecord->docyor_qualification.'</strong><br/>
                  <strong style="padding-left: 10px;margin-top: 10px;">Investigations</strong>Dr. '.$surgeonName.', '.$ObjPatientRecord->surgeonQualifications.'

    ';

}

// Include the main TCPDF library (search for installation path).
require_once('TCPDF/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// // set default header data
// $pdf->setHeaderData('', PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// // set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
// $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------

// set default font subsetting mode
// $pdf->setFontSubsetting(true);


$pdf->setFont('dejavusans', '', 10, '', true);


$pdf->AddPage();


// $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));


// $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('health_record.pdf', 'D'); // Download use - D
