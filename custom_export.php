<?php

// Exprot function
session_start();
include("inc_classes.php");
include("loginChk.php");
$ObjPatientRecord = new patientRecord();

     
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=data.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array(
        'patient_id', 'checkup_type', 'company_name', 'patient_name', 'patient_education', 'patient_birth_date', 'patient_age', 'identification_mark', 'patient_sex', 'date_of_examination', 'mariatal_status', 'type_of_industry', 'services_years', 'service_month', 'nature_of_work', 'ppe_used', 'smoking', 'alcohol', 'tobaco', 'gutakha', 'habit_other', 'habit_otherText', 'habit_none', 'past_illness_record', 'father_idh', 'father_htn', 'father_dn', 'father_asthama', 'father_koch', 'father_tremors', 'father_other', 'father_otherText', 'father_none', 'mother_idh', 'mother_htn', 'mother_dm', 'mother_asthama', 'mother_koch', 'mother_tremors', 'mother_other', 'mother_otherText', 'mother_none', 'pysical_handicap', 'HO_health_hazatd', 'HO_allergies', 'HO_exposure', 'present_compliaints', 'mutation', 'obs_gyneac', 'height', 'weight', 'BMI', 'BP', 'pulse', 'icterus', 'edema', 'pollar', 'cyanosis', 'glands', 'oral_cavity', 'hermial_sites', 'examination_other', 'examination_otherText', 'examination_nill', 'CVS', 'RS', 'PA', 'CNS', 'visual_acuityLeft', 'visual_acuityRight', 'color_version', 'audiometry_left_ear', 'audiometry_right_ear', 'lungFunction', 'heamoglobin', 'total_count', 'DC_nutrophil', 'eosinophil', 'lymphocyte', 'basophill', 'monocyte', 'protien', 'sugar', 'RBC', 'pus_cell', 'epithelial_cell', 'urinTest_other', 'blood_group', 'RHfactor', 'ESR', 'cholesterol', 'ECG', 'PFT', 'USG', 'x_ray_chest', 'BSL_random', 'BSL_FF', 'BSL_PP', 'KFT_blood_urea', 'KFT_serum', 'comment', 'Advice', 'Additional_Info', 'medical_fitness', 'doctor_name', 'docyor_qualification', 'Added_on', 'surgeonName', 'surgeonQualifications'
    ));  

    $c = 1 ;
    $idlist = implode(',',$_POST['id']);
    $c = "IN (".$idlist.")" ;

    $patient_details = $ObjPatientRecord->patient_details($c);

    for($i=0;$i<count($patient_details);$i++){
        fputcsv($output, $patient_details[$i]);  
    }
    fclose($output);  	
