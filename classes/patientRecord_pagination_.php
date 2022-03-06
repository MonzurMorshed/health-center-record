<?php

	class patientRecord extends errorClass
	{
		public  $sql;				// store the login query
		public 	$errMsg;
		public  $i;	
		public  $id;
		public  $where;
		public  $totRec;
		public  $queryWithLimit;
		public  $rs;
		public  $rsCnt;
		public  $result;
		
		
		public  $patient_id;
		public  $checkup_type;
		public  $company_name;
		public  $patient_name;
		public  $patient_education;
		public  $patient_birth_date;
		public  $patient_age;
		public  $identification_mark;
		public  $patient_sex;
		public  $date_of_examination;
		public  $mariatal_status;
		public  $type_of_industry;
		public  $services_years;
		public  $service_month;
		public  $nature_of_work;
		public  $ppe_used;
		public  $smoking;
		public  $alcohol;
		public  $tobaco;
		public  $gutakha;
		public  $habit_other;
		public  $habit_otherText;
		public  $habit_none;
		public  $past_illness_record;
		public  $father_idh;
		public  $father_htn;
		public  $father_dn;
		public  $father_asthama;
		public  $father_koch;
		public  $father_tremors;
		public  $father_other;
		public  $father_otherText;
		public  $father_none;
		public  $mother_idh;
		public  $mother_htn;
		public  $mother_dm;
		public  $mother_asthama;
		public  $mother_koch;
		public  $mother_tremors;
		public  $mother_other;
		public  $mother_otherText;
		public  $mother_none;
		public  $pysical_handicap;
		public  $HO_health_hazatd;
		public  $HO_allergies;
		public  $HO_exposure;
		public  $present_compliaints;
		public  $mutation;
		public  $obs_gyneac;
		public  $height;
		public  $weight;
		public  $BMI;
		public  $BP;
		public  $pulse;
		public  $icterus;
		public  $edema;
		public  $pollar;
		public  $cyanosis;
		public  $glands;
		public  $oral_cavity;
		public  $hermial_sites;
		public  $examination_other;
		public  $examination_otherText;
		public  $examination_nill;
		public  $CVS;
		public  $RS;
		public  $PA;
		public  $CNS;
		public  $visual_acuityLeft;
		public  $visual_acuityRight;
		public  $color_version;
		public  $audiometry_left_ear;
		public  $audiometry_right_ear;
		public  $lungFunction;
		public  $heamoglobin;
		public  $total_count;
		public  $DC_nutrophil;
		public  $eosinophil;
		public  $lymphocyte;
		public  $basophill;
		public  $monocyte;
		public  $protien;
		public  $sugar;
		public  $RBC;
		public  $pus_cell;
		public  $epithelial_cell;
		public  $urinTest_other;
		public  $blood_group;
		public  $RHfactor;
		public  $ESR;
		public  $cholesterol;
		public  $ECG;
		public  $PFT;
		public  $USG;
		public  $x_ray_chest;
		public  $BSL_random;
		public  $BSL_FF;
		public  $BSL_PP;
		public  $KFT_blood_urea;
		public  $KFT_serum;
		public  $comment;
		public  $Advice;
		public  $Additional_Info;
		public  $medical_fitness;
		public  $doctor_name;
		public  $docyor_qualification;
		public  $Added_on;
		
		public  $menuName;
		
		
		
		
		// To initialise the variables
		function __construct()
		{
			$this->errMsg				= "";
			$this->i					= 0;
			$this->id					= "";
			
			$this->where				= "";
			$this->sql					= "";
			$this->totRec				= 0;
			$this->queryWithLimit		= "";
			$this->rs					= "";
			$this->rsCnt 				= 0;
			$this->result				= 0;
			
			
			$this->patient_id 			= 0;
			$this->checkup_type 		="pre";
			$this->company_name 		="";
			$this->patient_name 		="";
			$this->patient_education 	="";
			$this->patient_birth_date 	="";
			$this->patient_age 			="";
			$this->identification_mark 	="";
			$this->patient_sex 			="M";
			$this->date_of_examination 	="";
			$this->mariatal_status 		="N";
			$this->type_of_industry 	="";
			$this->services_years 		="";
			$this->service_month 		="";
			$this->nature_of_work 		="";
			$this->ppe_used 			="";
			$this->smoking 				="N";
			$this->alcohol 				="N";
			$this->tobaco 				="N";
			$this->gutakha 				="N";
			$this->habit_other 			="N";
			$this->habit_otherText 		="Any Other Habits";
			$this->habit_none 			="N";
			$this->past_illness_record 	="";
			$this->father_idh 			="N";
			$this->father_htn 			="N";
			$this->father_dn 			="N";
			$this->father_asthama 		="N";
			$this->father_koch 			="N";
			$this->father_tremors 		="N";
			$this->father_other 		="N";
			$this->father_otherText 	="Any Other";
			$this->father_none 			="N";
			$this->mother_idh 			="N";
			$this->mother_htn 			="N";
			$this->mother_dm 			="N";
			$this->mother_asthama 		="N";
			$this->mother_koch 			="N";
			$this->mother_tremors 		="N";
			$this->mother_other 		="N";
			$this->mother_otherText 	="Any Other";
			$this->mother_none 			="N";
			$this->pysical_handicap 	="";
			$this->HO_health_hazatd 	="";
			$this->HO_allergies 		="";
			$this->HO_exposure 			="";
			$this->present_compliaints 	="";
			$this->mutation 			="";
			$this->obs_gyneac 			="";
			$this->height 				="";
			$this->weight 				="";
			$this->BMI 					="";
			$this->BP 					="";
			$this->pulse 				="";
			$this->icterus 				="N";
			$this->edema 				="N";
			$this->pollar 				="N";
			$this->cyanosis 			="N";
			$this->glands 				="N";
			$this->oral_cavity 			="N";
			$this->hermial_sites 		="N";
			$this->examination_other 	="N";
			$this->examination_otherText ="Any Other";
			$this->examination_nill 	="N";
			$this->CVS 					="";
			$this->RS 					="";
			$this->PA 					="";
			$this->CNS 					="";
			$this->visual_acuityLeft 	="";
			$this->visual_acuityRight 	="";
			$this->color_version 		="";
			$this->audiometry_left_ear 	="";
			$this->audiometry_right_ear ="";
			$this->lungFunction 		="";
			$this->heamoglobin 			="";
			$this->total_count 			="";
			$this->DC_nutrophil 		="";
			$this->eosinophil 			="";
			$this->lymphocyte 			="";
			$this->basophill 			="";
			$this->monocyte 			="";
			$this->protien 				="";
			$this->sugar 				="";
			$this->RBC 					="";
			$this->pus_cell 			="";
			$this->epithelial_cell 		="";
			$this->urinTest_other 		="";
			$this->blood_group 			="";
			$this->RHfactor 			="";
			$this->ESR 					="";
			$this->cholesterol 			="";
			$this->ECG 					="";
			$this->PFT 					="";
			$this->USG 					="";
			$this->x_ray_chest 			="";
			$this->BSL_random 			="";
			$this->BSL_FF 				="";
			$this->BSL_PP 				="";
			$this->KFT_blood_urea 		="";
			$this->KFT_serum 			="";
			$this->comment 				="";
			$this->Advice 				="";
			$this->Additional_Info		="";
			$this->medical_fitness 		="N";
			$this->doctor_name 			="";
			$this->docyor_qualification ="";
			$this->Added_on 			="";
			
			$this->menuName 			="";
			
		}
		
		// Destroy all the variables and the objects
		function __destruct()
		{
			unset($this->errMsg,$this->i,$this->id,$this->where);
			unset($this->sql,$this->totRec,$this->queryWithLimit,$this->rs,$this->rsCnt);			
		}
				
		
		
		public function deletePatient($pid)
		{
			global $db;			
			
			$this->sql = "DELETE FROM patient_record WHERE patient_id = $pid ";
			$db->executeQuery($this->sql);
		}
		
		public function patient_details($condition,$limitStart="0",$limitEnd="1")
		{
			global $db;			
			
				$this->sql			= "SELECT * FROM patient_record where $condition
										limit $limitStart,$limitEnd
										";
				
				$this->rsCnt		= $db->executeQuery($this->sql);
				if ($this->rsCnt > 0)
				{
					return $this->rsSubject			= $db->getResultSetArray();
					
				}
		}
		
		public function addUpdatePatientRecord($patient_id=0)
		{
			global $db;
			//echo "<pre>";print_r($_POST);echo "</pre>";exit;
			if($patient_id <= 0)
			{
				$this->sql			= "INSERT INTO patient_record (
									patient_id, 
									checkup_type, 
									company_name, 
									patient_name, 
									patient_education, 
									patient_birth_date, 
									patient_age, 
									identification_mark, 
									patient_sex, 
									date_of_examination, 
									mariatal_status, 
									type_of_industry, 
									services_years, 
									service_month, 
									nature_of_work, 
									ppe_used, 
									smoking, 
									alcohol, 
									tobaco, 
									gutakha, 
									habit_other, 
									habit_otherText, 
									habit_none, 
									past_illness_record, 
									father_idh, 
									father_htn, 
									father_dn, 
									father_asthama, 
									father_koch, 
									father_tremors, 
									father_other, 
									father_otherText, 
									father_none, 
									mother_idh, 
									mother_htn, 
									mother_dm, 
									mother_asthama, 
									mother_koch, 
									mother_tremors, 
									mother_other, 
									mother_otherText, 
									mother_none, 
									pysical_handicap, 
									HO_health_hazatd, 
									HO_allergies, 
									HO_exposure, 
									present_compliaints, 
									mutation, 
									obs_gyneac, 
									height, 
									weight, 
									BMI, 
									BP, 
									pulse, 
									icterus, 
									edema, 
									pollar, 
									cyanosis, 
									glands, 
									oral_cavity, 
									hermial_sites, 
									examination_other, 
									examination_otherText, 
									examination_nill, 
									CVS, 
									RS, 
									PA, 
									CNS, 
									visual_acuityLeft, 
									visual_acuityRight, 
									color_version, 
									audiometry_left_ear, 
									audiometry_right_ear, 
									lungFunction, 
									heamoglobin, 
									total_count, 
									DC_nutrophil, 
									eosinophil, 
									lymphocyte, 
									basophill, 
									monocyte, 
									protien, 
									sugar, 
									RBC, 
									pus_cell, 
									epithelial_cell, 
									urinTest_other, 
									blood_group, 
									RHfactor, 
									ESR, 
									cholesterol, 
									ECG, 
									PFT, 
									USG, 
									x_ray_chest, 
									BSL_random, 
									BSL_FF, 
									BSL_PP, 
									KFT_blood_urea, 
									KFT_serum, 
									comment, 
									Advice, 
									Additional_Info, 
									medical_fitness, 
									doctor_name, 
									docyor_qualification
									)
									VALUES
									(
									NULL,
									'".$this->checkup_type."', 
									".$db->ToSQL($this->company_name,'Text').",
									".$db->ToSQL($this->patient_name,'Text').",
									".$db->ToSQL($this->patient_education,'Text').",
									'".$this->patient_birth_date."', 
									'".$this->patient_age."', 
									".$db->ToSQL($this->identification_mark,'Text').",
									'".$this->patient_sex."', 
									'".$this->date_of_examination."', 
									'".$this->mariatal_status."', 
									".$db->ToSQL($this->type_of_industry,'Text').",
									'".$this->services_years."', 
									'".$this->service_month."', 
									".$db->ToSQL($this->nature_of_work,'Text').",
									".$db->ToSQL($this->ppe_used,'Text').",
									'".$this->smoking."', 
									'".$this->alcohol."',
									'".$this->tobaco."', 
									'".$this->gutakha."', 
									'".$this->habit_other."', 
									".$db->ToSQL($this->habit_otherText,'Text').",
									'".$this->habit_none."', 
									'".$this->past_illness_record."', 
									'".$this->father_idh."', 
									'".$this->father_htn."', 
									'".$this->father_dn."', 
									'".$this->father_asthama."', 
									'".$this->father_koch."', 
									'".$this->father_tremors."', 
									'".$this->father_other."', 
									".$db->ToSQL($this->father_otherText,'Text').",
									'".$this->father_none."', 
									'".$this->mother_idh."', 
									'".$this->mother_htn."', 
									'".$this->mother_dm."', 
									'".$this->mother_asthama."', 
									'".$this->mother_koch."', 
									'".$this->mother_tremors."', 
									'".$this->mother_other."', 
									".$db->ToSQL($this->mother_otherText,'Text').",
									'".$this->mother_none."', 
									".$db->ToSQL($this->pysical_handicap,'Text').",
									".$db->ToSQL($this->HO_health_hazatd,'Text').",
									".$db->ToSQL($this->HO_allergies,'Text').",
									".$db->ToSQL($this->HO_exposure,'Text').",
									".$db->ToSQL($this->present_compliaints,'Text').", 
									".$db->ToSQL($this->mutation,'Text').",
									".$db->ToSQL($this->obs_gyneac,'Text').",
									".$db->ToSQL($this->height,'Text').",  
									".$db->ToSQL($this->weight,'Text').",  
									".$db->ToSQL($this->BMI,'Text').",  
									".$db->ToSQL($this->BP,'Text').",  
									".$db->ToSQL($this->pulse,'Text').",  
									".$db->ToSQL($this->icterus,'Text').",  
									".$db->ToSQL($this->edema,'Text').",  
									".$db->ToSQL($this->pollar,'Text').",  
									".$db->ToSQL($this->cyanosis,'Text').",  
									".$db->ToSQL($this->glands,'Text').",  
									".$db->ToSQL($this->oral_cavity,'Text').",  
									".$db->ToSQL($this->hermial_sites,'Text').",  
									".$db->ToSQL($this->examination_other,'Text').",  
									".$db->ToSQL($this->examination_otherText,'Text').",  
									".$db->ToSQL($this->examination_nill,'Text').",  
									".$db->ToSQL($this->CVS,'Text').",  
									".$db->ToSQL($this->RS,'Text').",  
									".$db->ToSQL($this->PA,'Text').",  
									".$db->ToSQL($this->CNS,'Text').",  
									".$db->ToSQL($this->visual_acuityLeft,'Text').",  
									".$db->ToSQL($this->visual_acuityRight,'Text').",  
									".$db->ToSQL($this->color_version,'Text').",  
									".$db->ToSQL($this->audiometry_left_ear,'Text').",  
									".$db->ToSQL($this->audiometry_right_ear,'Text').",  
									".$db->ToSQL($this->lungFunction,'Text').",  
									".$db->ToSQL($this->heamoglobin,'Text').",  
									".$db->ToSQL($this->total_count,'Text').",  
									".$db->ToSQL($this->DC_nutrophil,'Text').",  
									".$db->ToSQL($this->eosinophil,'Text').",  
									".$db->ToSQL($this->lymphocyte,'Text').",  
									".$db->ToSQL($this->basophill,'Text').",  
									".$db->ToSQL($this->monocyte,'Text').",  
									".$db->ToSQL($this->protien,'Text').",  
									".$db->ToSQL($this->sugar,'Text').",  
									".$db->ToSQL($this->RBC,'Text').",  
									".$db->ToSQL($this->pus_cell,'Text').",  
									".$db->ToSQL($this->epithelial_cell,'Text').",  
									".$db->ToSQL($this->urinTest_other,'Text').",  
									".$db->ToSQL($this->blood_group,'Text').",  
									".$db->ToSQL($this->RHfactor,'Text').",  
									".$db->ToSQL($this->ESR,'Text').",  
									".$db->ToSQL($this->cholesterol,'Text').",  
									".$db->ToSQL($this->ECG,'Text').",  
									".$db->ToSQL($this->PFT,'Text').",  
									".$db->ToSQL($this->USG,'Text').",  
									".$db->ToSQL($this->x_ray_chest,'Text').",  
									".$db->ToSQL($this->BSL_random,'Text').",  
									".$db->ToSQL($this->BSL_FF,'Text').",  
									".$db->ToSQL($this->BSL_PP,'Text').", 
									".$db->ToSQL($this->KFT_blood_urea,'Text').", 
									".$db->ToSQL($this->KFT_serum,'Text').", 
									".$db->ToSQL($this->comment,'Text').", 
									".$db->ToSQL($this->Advice,'Text').", 
									".$db->ToSQL($this->Additional_Info,'Text').", 
									'".$this->medical_fitness."', 
									".$db->ToSQL($this->doctor_name,'Text').", 
									".$db->ToSQL($this->docyor_qualification,'Text')."
									)";
				$db->executeQuery($this->sql);
			}
			else
			{
				$this->sql			="UPDATE patient_record SET 
									checkup_type					= '".$this->checkup_type."', 
									company_name 					= ".$db->ToSQL($this->company_name,'Text').",
									patient_name 					= ".$db->ToSQL($this->patient_name,'Text').",
									patient_education 				= ".$db->ToSQL($this->patient_education,'Text').",
									patient_birth_date 				='".$this->patient_birth_date."', 
									patient_age 					= ".$db->ToSQL($this->patient_age,'Text').",
									identification_mark 			= ".$db->ToSQL($this->identification_mark,'Text').",
									patient_sex 					='".$this->patient_sex."', 
									date_of_examination 			= '".$this->date_of_examination."', 
									mariatal_status 				= ".$db->ToSQL($this->mariatal_status,'Text').",
									type_of_industry 				= ".$db->ToSQL($this->type_of_industry,'Text').",
									services_years 					= ".$db->ToSQL($this->services_years,'Text').",
									service_month 					= ".$db->ToSQL($this->service_month,'Text').",
									nature_of_work 					= ".$db->ToSQL($this->nature_of_work,'Text').",
									ppe_used 						= ".$db->ToSQL($this->ppe_used,'Text').",
									smoking 						= '".$this->smoking."', 
									alcohol 						= '".$this->alcohol."', 
									tobaco 							= '".$this->tobaco."', 
									gutakha 						= '".$this->gutakha."', 
									habit_other 					= '".$this->habit_other."', 
									habit_otherText 				= ".$db->ToSQL($this->habit_otherText,'Text').",
									habit_none 						= '".$this->habit_none."', 
									past_illness_record 			= '".$this->past_illness_record."', 
									father_idh 						= '".$this->father_idh."', 
									father_htn 						= '".$this->father_htn."', 
									father_dn 						= '".$this->father_dn."', 
									father_asthama 					= '".$this->father_asthama."', 
									father_koch 					= '".$this->father_koch."', 
									father_tremors 					= '".$this->father_tremors."', 
									father_other 					= '".$this->father_other."', 
									father_otherText				= ".$db->ToSQL($this->father_otherText,'Text').",
									father_none 					= '".$this->father_none."', 
									mother_idh 						= '".$this->mother_idh."', 
									mother_htn 						= '".$this->mother_htn."', 
									mother_dm 						= '".$this->mother_dm."', 
									mother_asthama 					= '".$this->mother_asthama."', 
									mother_koch 					= '".$this->mother_koch."', 
									mother_tremors 					= '".$this->mother_tremors."', 
									mother_other 					= '".$this->mother_other."', 
									mother_otherText				= ".$db->ToSQL($this->mother_otherText,'Text').",
									mother_none 					= '".$this->mother_none."', 
									pysical_handicap 				= ".$db->ToSQL($this->pysical_handicap,'Text').",
									HO_health_hazatd 				= ".$db->ToSQL($this->HO_health_hazatd,'Text').",
									HO_allergies 					= ".$db->ToSQL($this->HO_allergies,'Text').",
									HO_exposure 					= ".$db->ToSQL($this->HO_exposure,'Text').",
									present_compliaints 			= ".$db->ToSQL($this->present_compliaints,'Text').",
									mutation 						= ".$db->ToSQL($this->mutation,'Text').",
									obs_gyneac 						= ".$db->ToSQL($this->obs_gyneac,'Text').",
									height 							= ".$db->ToSQL($this->height,'Text').",
									weight 							= ".$db->ToSQL($this->weight,'Text').",
									BMI 							= ".$db->ToSQL($this->BMI,'Text').",
									BP 								= ".$db->ToSQL($this->BP,'Text').",
									pulse 							= ".$db->ToSQL($this->pulse,'Text').",
									icterus 						= ".$db->ToSQL($this->icterus,'Text').",
									edema 							= ".$db->ToSQL($this->edema,'Text').",
									pollar 							= ".$db->ToSQL($this->pollar,'Text').",
									cyanosis 						= ".$db->ToSQL($this->cyanosis,'Text').",
									glands 							= ".$db->ToSQL($this->glands,'Text').",
									oral_cavity 					= ".$db->ToSQL($this->oral_cavity,'Text').",
									hermial_sites 					= ".$db->ToSQL($this->hermial_sites,'Text').", 
									examination_other 				= ".$db->ToSQL($this->examination_other,'Text').",
									examination_otherText 			= ".$db->ToSQL($this->examination_otherText,'Text').",
									examination_nill 				= ".$db->ToSQL($this->examination_nill,'Text').",
									CVS 							= ".$db->ToSQL($this->CVS,'Text').",
									RS 								= ".$db->ToSQL($this->RS,'Text').",
									PA 								= ".$db->ToSQL($this->PA,'Text').",
									CNS 							= ".$db->ToSQL($this->CNS,'Text').",
									visual_acuityLeft 				= ".$db->ToSQL($this->visual_acuityLeft,'Text').",
									visual_acuityRight 				= ".$db->ToSQL($this->visual_acuityRight,'Text').",
									color_version 					= ".$db->ToSQL($this->color_version,'Text').",
									audiometry_left_ear 			= ".$db->ToSQL($this->audiometry_left_ear,'Text').",
									audiometry_right_ear 			= ".$db->ToSQL($this->audiometry_right_ear,'Text').",
									lungFunction 					= ".$db->ToSQL($this->lungFunction,'Text').",
									heamoglobin 					= ".$db->ToSQL($this->heamoglobin,'Text').",
									total_count 					= ".$db->ToSQL($this->total_count,'Text').",
									DC_nutrophil 					= ".$db->ToSQL($this->DC_nutrophil,'Text').",
									eosinophil 						= ".$db->ToSQL($this->eosinophil,'Text').",
									lymphocyte 						= ".$db->ToSQL($this->lymphocyte,'Text').",
									basophill 						= ".$db->ToSQL($this->basophill,'Text').",
									monocyte 						= ".$db->ToSQL($this->monocyte,'Text').",
									protien 						= ".$db->ToSQL($this->protien,'Text').",
									sugar 							= ".$db->ToSQL($this->sugar,'Text').", 
									RBC 							= ".$db->ToSQL($this->RBC,'Text').",
									pus_cell 						= ".$db->ToSQL($this->pus_cell,'Text').",
									epithelial_cell 				= ".$db->ToSQL($this->epithelial_cell,'Text').",
									urinTest_other 					= ".$db->ToSQL($this->urinTest_other,'Text').",
									blood_group 					= ".$db->ToSQL($this->blood_group,'Text').",
									RHfactor 						= ".$db->ToSQL($this->RHfactor,'Text').",
									ESR 							= ".$db->ToSQL($this->ESR,'Text').",
									cholesterol 					= ".$db->ToSQL($this->cholesterol,'Text').",
									ECG 							= ".$db->ToSQL($this->ECG,'Text').",
									PFT 							= ".$db->ToSQL($this->PFT,'Text').",
									USG 							= ".$db->ToSQL($this->USG,'Text').",
									x_ray_chest 					= ".$db->ToSQL($this->x_ray_chest,'Text').",
									BSL_random 						= ".$db->ToSQL($this->BSL_random,'Text').",
									BSL_FF 							= ".$db->ToSQL($this->BSL_FF,'Text').",
									BSL_PP 							= ".$db->ToSQL($this->BSL_PP,'Text').",
									KFT_blood_urea 					= ".$db->ToSQL($this->KFT_blood_urea,'Text').",
									KFT_serum 						= ".$db->ToSQL($this->KFT_serum,'Text').", 
									comment 						= ".$db->ToSQL($this->comment,'Text').", 
									Advice 							= ".$db->ToSQL($this->Advice,'Text').", 
									Additional_Info 				= ".$db->ToSQL($this->Additional_Info,'Text').", 
									medical_fitness 				= '".$this->medical_fitness."', 
									doctor_name 					= ".$db->ToSQL($this->doctor_name,'Text').", 
									docyor_qualification 			= ".$db->ToSQL($this->docyor_qualification,'Text')."
									WHERE patient_id = $patient_id ";

				$db->executeQuery($this->sql);


			}
		}
		
		
		
}
?>
