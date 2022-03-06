<?php
	//Common function to be utilised every where
	/* *************************************************** */
	//MOST USEFUL COMMON FUNCTIONS

	function tohtml($strValue){
	  	return htmlspecialchars($strValue);
	}

	function tourl($strValue){
	  	return urlencode($strValue);
	}
	function TrimString($strMsg,$intLen)
	{
		$strMsg = trim($strMsg);
		if(is_numeric($intLen))
		{
			$intLen = (int)$intLen;
			if(strlen($strMsg) > $intLen)			
				return(substr($strMsg,0,$intLen) . "<b>...</b>");
			else
				return($strMsg);
		 }
		else
			return $strMsg;
	}

	function strip($value){
		if(get_magic_quotes_gpc())
		{
			return stripslashes(stripslashes($value));
		}
		else
		{
			while(strchr($value,'\\')) 
			{
			$value = stripslashes($value);
			}
			return stripslashes(stripslashes($value));
		}
	
		/*
	  	if(get_magic_quotes_gpc() == 0)
		{
	    	return $value;
	  	}
		else
	    {
			return stripslashes($value);
		}
		*/
	}
	
	function strip_html($value){
	  	return htmlspecialchars($value);
	}
	// Created by rahul
	function addslash($value)
	{
		if(get_magic_quotes_gpc())
		{
			return $value;
		}
		else
		{
			return addslashes($value);
		}
	}
	
	function addslashes_htmlentities($value)
	{
		if(get_magic_quotes_gpc())
		{
			return htmlentities($value);
		}
		else
		{
			return htmlentities(addslashes($value));
		}
	}
	
	function get_param($param_name){
	  	global $_POST;
	  	global $_GET;
	
	  	$param_value = "";
	  	if(isset($_POST[$param_name]))
	    	$param_value = trim($_POST[$param_name]);
	  	else if(isset($_GET[$param_name]))
	    	$param_value = trim($_GET[$param_name]);
	
	  	return $param_value;
	}
	/*
	function get_param($param_name){
	  	global $_POST;
	  	global $_GET;
		
	  	$param_value = "";
	  	if(isset($_POST[$param_name]))
	    	$param_value = addslashes_htmlentities(trim($_POST[$param_name]));
	  	else if(isset($_GET[$param_name]))
	    	$param_value = addslashes_htmlentities(trim($_GET[$param_name]));
	  	return $param_value;
	}
	*/
	function get_param_editor($param_name){
	  	global $_POST;
	  	global $_GET;
		
	  	$param_value = "";
	  	if(isset($_POST[$param_name]))
	    	$param_value = addslash(trim($_POST[$param_name]));
	  	else if(isset($_GET[$param_name]))
	    	$param_value = addslash(trim($_GET[$param_name]));
	  	return $param_value;
	}

	function middle_trim($strValue)
	{
		// This function used to remove extra spaces between statement & convert it into single space
		$strValue = eregi_replace("[[:space:]]+", " ", $strValue); 
		return  $strValue;
	}

	function get_session($param_name)
	{	  
	  if(isset($_SESSION[$param_name])){
	  		return $_SESSION[$param_name];
	  }else{
	  		return "";
	  }
	}

	function set_session($param_name, $param_value) {
		$_SESSION[$param_name] = $param_value;
	}
	
	// Get a parent directory name On dated 29-12-2008
	
	function getParentFolderName($gUserId)
	{
		$fldrName = $gUserId/31500;
		$getFldrFirstVal = sprintf("%1\$u",$fldrName);
		return $getFldrFirstVal; 
	}
	
	// End Of Get a parent directory name On dated 29-12-2008

	function is_alphabetic($strValue)
	  {
		$Ans = ereg('^[[:alpha:]]+$',$strValue);
		
		if(strcmp($Ans,"1") == 0)
			$returnVal = 1;
		else
			$returnVal = 0;
			
		return $returnVal;
	 }
	
	function is_alphabetic_space($strValue)
	  {
		$Ans =  ereg('^[[:alnum:]]+$', $strValue);
//		$Ans = ereg('^[[:alpha:num]]+$',$strValue);
		
		if(strcmp($Ans,"1") == 0)
			$returnVal = 1;
		else
			$returnVal = 0;
			
		return $returnVal;
	 }
	
	function replacevalue($tmpValue)
	{
		$tmpReturn = str_replace("/","",$tmpValue);
		$tmpReturn = str_replace("\\","",$tmpReturn);		
		$tmpReturn = str_replace(" ","-",$tmpReturn);
		$tmpReturn	=	preg_replace('/(-)+/','-',$tmpReturn);
		
		return $tmpReturn;
	}	

	function checkType($orgValue,$DataValue){
		if($orgValue == $DataValue){
			$tmpSelect = "selected";
			return $tmpSelect;
		}
	}
	
	
	function chk_autorise()
	{
		global $tmpParentId;
		if($tmpParentId==0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// Image upload functio -------------------------------------------------------------------------
	 /*
		 $tmpfldImage			// $_FILES["fileIcon"]["tmp_name"]
		 $tmpfldImage_name		// $_FILES["fileIcon"]["name"]
		 $imgPath				// ../product_images
		 $prefix				// prefix for image name to maintain uniqueness for image name.
		 $tWidth				// Thumbnail image width
		 $tHeight				// Thumbnail image Height
		 $tFlag='Y'				// Create Thumbnail image Flag ...default set to Yes
		 $nWidth				// Normal image width
		 $nHeight				// Normal image Height
		 $nFlag='N'				// Create normal image Flag ...default set to No
	 */
	 function ImageUpload($tmpfldImage,$tmpfldImage_name,$imgPath,$prefix,$extension,$tWidth,$tHeight,$tFlag,$nWidth,$nHeight,$nFlag,$iFlag='N',$iWidth='0',$iHeight='0')
	 {
		 //echo "<br>Image==>>".$tmpfldImage_name;
                 $flsave = "";
		 $oriContent = explode(".",$tmpfldImage_name);
		 $oriExt = $oriContent[1];
		 
		 
		 if(isset($tmpfldImage))
		   {
			  if(is_uploaded_file($tmpfldImage))
				{
					//$flsave		= $prefix.".".strtolower($extension);
					$flsave		= $prefix.$tmpfldImage_name;
					$saveAs 	= $imgPath."/".$flsave;
					
					//echo "<br>Image ==>>".$tmpfldImage;
					//echo "<br>temp ==>>".$saveAs;
					
					//die($flsave."test".$saveAs);
					if(move_uploaded_file($tmpfldImage,$saveAs))
					{
						//echo $tmpfldImage;
						
						chmod($saveAs,0777);
						$imgPhyPath	= $imgPath."/". $flsave;
						
						//*************************  Create Normal image of given size *********************************************************************
						if($nFlag == 'Y')
						{
							$saveAs1	= $imgPath."/NORMAL_".$flsave;
							//$saveAs1	= $imgPath."/".$prefix."NORMAL_".$tmpfldImage_name;
							$tmpImgSize	= getimagesize($imgPhyPath);
							
							// create Thumb ---------------------------------
							if (($tmpImgSize[0] > $nWidth) || ($tmpImgSize[1] > $nHeight))
							{
								if ($tmpImgSize[0] > $nWidth) 								// if (width > $nWidth)
								{
									createthumbonly($saveAs,$saveAs1,$nWidth,$nHeight,"h",$oriExt);

									$tmpImgSizeNew	= @getimagesize($saveAs1);
									if ($tmpImgSizeNew[1] > $nHeight)   						// if width < $nWidth and height > $nHeight
										createthumbonly($saveAs,$saveAs1,$nWidth,$nHeight,"w",$oriExt);
								}
								else
								{
									if ($tmpImgSize[1] > $nHeight) 								// if (height > $nWidth)
									{
										createthumbonly($saveAs,$saveAs1,$nWidth,$nHeight,"w",$oriExt);

										$tmpImgSizeNew	= @getimagesize($saveAs1);
										if ($tmpImgSizeNew[0] > $nWidth)   						// if width > $nWidth and height <= $nHeight
											createthumbonly($saveAs,$saveAs1,$nWidth,$nHeight,"h",$oriExt);
									}
								} // END ELSE 
							}
							else
							{
								createthumbonly($saveAs,$saveAs1,$tmpImgSize[0],$tmpImgSize[1],"h",$oriExt);
								chmod($saveAs1,0777);
							}
						}	// End If nflag
						
						/* ************************ Create icon image of given size ***********************************************/
						
						if($iFlag == 'Y')
						{
							$saveAs1	= $imgPath."/ICON_".$flsave;
						//	$saveAs1	= $imgPath."/".$prefix."ICON_".$tmpfldImage_name;
							$tmpImgSize	= getimagesize($imgPhyPath);
							
							// create Thumb ---------------------------------
							if (($tmpImgSize[0] > $iWidth) || ($tmpImgSize[1] > $iHeight))
							{
								if ($tmpImgSize[0] > $iWidth) 								// if (width > $iWidth)
								{
									createthumbonly($saveAs,$saveAs1,$iWidth,$iHeight,"h",$oriExt);

									$tmpImgSizeNew	= @getimagesize($saveAs1);
									if ($tmpImgSizeNew[1] > $iHeight)   						// if width < $iWidth and height > $iHeight
										createthumbonly($saveAs,$saveAs1,$iWidth,$iHeight,"w",$oriExt);
								}
								else
								{
									if ($tmpImgSize[1] > $iHeight) 								// if (height > $iWidth)
									{
										createthumbonly($saveAs,$saveAs1,$iWidth,$iHeight,"w",$oriExt);

										$tmpImgSizeNew	= @getimagesize($saveAs1);
										if ($tmpImgSizeNew[0] > $iWidth)   						// if width > $iWidth and height <= $iHeight
											createthumbonly($saveAs,$saveAs1,$iWidth,$iHeight,"h",$oriExt);
									}
								} // END ELSE 
							}
							else
							{
								createthumbonly($saveAs,$saveAs1,$tmpImgSize[0],$tmpImgSize[1],"h",$oriExt);
								chmod($saveAs1,0777);
							}
						}	// End If iflag
						
						
						//*************************  Create Thumb image of given size *********************************************************************
						if($tFlag == 'Y')			// If Create thumb is YES  ...... 
						{
							$saveAs2	= $imgPath."/THUMB_".$flsave;
							//$saveAs2	= $imgPath."/".$prefix."THUMB_".$tmpfldImage_name;
							$tmpImgSize	= getimagesize($imgPhyPath);
							// create Thumb ---------------------------------
							if (($tmpImgSize[0] > $tWidth) || ($tmpImgSize[1] > $tHeight))
							{
								
								if ($tmpImgSize[0] > $tWidth) 								// if (width > $tWidth)
								{
									createthumbonly($saveAs,$saveAs2,$tWidth,$tHeight,"h",$oriExt);
									
									$tmpImgSizeNew	= @getimagesize($saveAs2);
									
									if ($tmpImgSizeNew[1] > $tHeight)   						// if width < $tWidth and height > $tHeight
										createthumbonly($saveAs,$saveAs2,$tWidth,$tHeight,"w",$oriExt);
								}
								else
								{
									
									if ($tmpImgSize[1] > $tHeight) 								// if (height > $tWidth)
									{
										createthumbonly($saveAs,$saveAs2,$tWidth,$tHeight,"w",$oriExt);

										$tmpImgSizeNew	= @getimagesize($saveAs2);
										if ($tmpImgSizeNew[0] > $tWidth)   						// if width > $tWidth and height <= $tHeight
											createthumbonly($saveAs,$saveAs2,$tWidth,$tHeight,"h",$oriExt);
									}
								} // END ELSE 
							}
							else
							{
								
								createthumbonly($saveAs,$saveAs2,$tmpImgSize[0],$tmpImgSize[1],"h",$oriExt);
								chmod($saveAs2,0777);
							}
						}	// End If tflag
					}
					else
					{
						$flsave = "";
						
					}
		  	   }	
	      }
		 // die();
		return($flsave); 			
	}

		
	// For create thumb size Image ----------------------------------------
	function createthumbonly($name,$filename,$new_w,$new_h,$fix="n",$oriExt)
	{
		$system 	= explode(".",$name);
		$cnt 		= count($system);			
		$ext123 	= $oriExt; //trim(strtolower($system[$cnt-1]));
		$src_img 	= "";
		$new_w1		= $new_w;
	
		if($ext123 == "gif")
		{
			 $src_img=imagecreatefromgif($name);
		}	 
		else
		{
			if (preg_match("/jpg|jpeg/",$ext123))	{$src_img 	  = imagecreatefromjpeg($name); }
			if (preg_match("/JPG|JPEG/",$ext123))	{$src_img 	  = imagecreatefromjpeg($name); }
			if (preg_match("/png/",$ext123))		{$src_img	  =	imagecreatefrompng($name);}
			if (preg_match("/PNG/",$ext123))		{$src_img	  =	imagecreatefrompng($name);}
			if (preg_match("/bmp/",$ext123))		{$src_img	  =	imagecreatefromwbmp($name);}
			if (preg_match("/BMP/",$ext123))		{$src_img	  =	imagecreatefromwbmp($name);}

		}
		
		//commented due to client requirement that image should be .jpg format only
		
		/*$src_img	= imagecreatefromjpeg($name);*/
		$old_x		= imagesx($src_img);
		$old_y		= imagesy($src_img);			

		if($old_x!=0)
			$aspect_ratio 	 =  ($old_x/$old_y);
			
		if($new_h == "90" || $new_h == "200" || $new_h == "50" || $new_h == "80")
		{
			//$fix	= "n";
			$fix	= "w";
		}
		
		/*if($fix=="h"){
			$new_h	 =   $new_w/$aspect_ratio;
		}
		
		if($fix=="150" || $fix=="250" || $fix=="75"){
			$new_h	 =   $new_w/$aspect_ratio;
		}*/
		
		else if ($fix=="w"){
			$new_w	  = $new_h * $aspect_ratio;
		}
		
		
		/*if($old_x!=0)
			$aspect_ratio 	 =  ($old_x/$old_y);
			
		if( $new_w == "120" )
		{
			$fix	= "n";
		}
		
		if($fix=="h"){
			$new_h	 =   $new_w/$aspect_ratio;
		}
		else if ($fix=="w"){
			$new_w	  = $new_h * $aspect_ratio;
		}*/
		
		$thumb_w	=	$new_w;
		$thumb_h	=	$new_h;	
		if($thumb_w > $thumb_h)
		{
			//echo "i am here";
			$thumb_w = $new_w;
		}
		
		if($thumb_w > $new_w1 || $thumb_w < $new_w1)
		{
			$thumb_w = $new_w1;
		}
		

		$dst_img	=	imagecreatetruecolor($thumb_w,$thumb_h);
		
		if($ext123 == "gif")
		{
		 $kek=imagecolorallocate($dst_img,255,255,255);
		 imagefill($dst_img,0,0,$kek);
		} 
		
		imagecopyresampled($dst_img, $src_img, 0, 0,0, 0, $thumb_w, $thumb_h, $old_x, $old_y);
		
		
		//imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);

		/*if (preg_match("/png/",$system[1])){
			imagepng($dst_img,$filename);				 
		}else if (preg_match("/gif/",$system[1])){
			imagegif($dst_img,$filename);				
		}else if (preg_match("/bmp/",$system[1])){
			image2wbmp($dst_img,$filename);
		}else {
			imagejpeg($dst_img,$filename,200); 
		}*/
		
		 imagejpeg($dst_img, $filename);
		 imagedestroy($dst_img);
		 imagedestroy($src_img);
		 
		 
		
		
		$dir	= substr(dirname($filename),0,-5) ;
		
		$tmp = explode("/",$name);
		
		$tmpCnt	= count($tmp);
		
		$img	=	$dir .$tmp[$tmpCnt-1];
		
	}
	




	function paging($tmp_searchby,$tmp_type,$tmp_rowlimit,$tmp_currPageId)
	{
		$querystring="sby=".$tmp_searchby."&type=".$tmp_type;
		echo "<tr><td style=\"height:20px;\"></td></tr>";
		echo "<tr><td></td><td valign=top class=text>";
			global $db;
			$tmp_cond=" where (name like '%{$tmp_searchby}%' and address like '%{$tmp_searchby}%') ";
			
			if($tmp_type<>"")
			{
				$tmp_cond.=" and (";
				//$cond.=" and ";
				$tmp_typearr=explode(",",$tmp_type);
				for($i=0;$i<count($tmp_typearr);$i++)
				{
					
					if($i==0)
					{
						$tmp_cond.="(attri like '{$tmp_typearr[$i]}' or attri like '{$tmp_typearr[$i]},%' or attri like '%,{$tmp_typearr[$i]}' or attri like '%,{$tmp_typearr[$i]},%')";
					}
					else
					{
						$tmp_cond.=" or (attri like '{$tmp_typearr[$i]}' or attri like '{$tmp_typearr[$i]},%' or attri like '%,{$tmp_typearr[$i]}' or attri like '%,{$tmp_typearr[$i]},%')";
					}
				}
				$tmp_cond.=")";
			}
			
			
			$tmp_sqlComp="select * from tbl_company".$tmp_cond;
			
			$tmp_rsCntComp	= $db->executeQuery($tmp_sqlComp);
			$tmp_rsCntComp=$tmp_rsCntComp/$tmp_rowlimit;
			$tmp_rsCntComp=ceil($tmp_rsCntComp);
			if($tmp_rsCntComp>1)
			{
				echo "Page : ";
				for($tmp_i=1;$tmp_i<=$tmp_rsCntComp;$tmp_i++)
				{
					
					if($tmp_i==$tmp_currPageId)
					{
						echo "<a href=\"searchresult.php?pageId={$tmp_i}&{$querystring}\" class=error>";
						echo "{$tmp_i}";
					}
					else
					{
						echo "<a href=\"searchresult.php?pageId={$tmp_i}&{$querystring}\" class=textLink>";
						echo "{$tmp_i}";
					}
					echo "</a>&nbsp;";
				}
			}		
		
		echo "</td></tr>";
		echo "<tr><td style=\"height:20px;\"></td></tr>";
	}
	
	function FillListBox($tblName,$keyfield,$keyval,$showfield,$db)
	{
	  $sql = "SELECT $keyfield,$showfield FROM $tblName";
		$res = $db->executeQuery($sql);
		if($res>0)
		{
			$rs = $db->getResultSet();
			for($tr=0;$tr<$res;$tr++)
			{
				$row 	=	$rs[$tr];
				if(strcmp($row[0],$keyval) == 0)
					echo("<option value=\"$row[0]\" selected>$row[1]</option>");
				else
					echo("<option value=\"$row[0]\">$row[1]</option>");
			}
		}
	}
	
	
	function FillListBoxTopic($tblname,$keyfield,$keyval,$showfield,$orderby,$constraint,$db,$selected,$value)
	{  
		$sql = "Select $keyfield,$showfield,$value from $tblname " .$constraint ." order by $orderby ";
		
		$res = $db->executeQuery($sql);
		if($res>0)
		{
			$rs = $db->getResultSet();
			for($tr=0;$tr<$res;$tr++)
			{
				$row 	=	$rs[$tr];
				//echo $row[0] ." ====== " .$keyval;
				
				if(strcmp($row[2],$selected) == 0)
				{
					echo("<option value=\"$row[2]\" selected>$row[1]</option>");
				}else
				{
					echo("<option value=\"$row[2]\">$row[1]</option>");
				}
			}
		}
	}
	
	/*  This function is similar to function FillListBoxTopic() only limit is added to string length */
	function FillListBoxTopicStrLmit($tblname,$keyfield,$keyval,$showfield,$orderby,$constraint,$db,$selected,$value)
	{  
		$sql = "Select $keyfield,$showfield,$value from $tblname " .$constraint ." order by $orderby ";
		
		$res = $db->executeQuery($sql);
		if($res>0)
		{
			$rs = $db->getResultSet(); 
			for($tr=0;$tr<$res;$tr++)
			{
				$row 	=	$rs[$tr];
				$str1 = $row[1];
				$str_len = strlen($str1);
				if($str_len >= 38)
				{
					$str1 = substr($str1, 0, 38);
					$str1 = $str1."...";
				} 
				
				if(strcmp($row[2],$selected) == 0)
				{
					echo("<option value=\"$row[2]\" selected>$str1</option>");
				}else
				{
					echo("<option value=\"$row[2]\">$str1</option>");
				}
			}
		}
	}
	
	
	
	function FillListBox2($tblname,$keyfield,$keyval,$showfield,$orderby,$constraint,$db)
	{  
		$sql = "Select $keyfield,$showfield from $tblname " .$constraint ." order by $orderby ";
		
		$res = $db->executeQuery($sql);
		if($res>0)
		{
			$rs = $db->getResultSet();
			
			for($tr=0;$tr<$res;$tr++)
			{
				$row 	=	$rs[$tr];
				//echo $row[0] ." ====== " .$keyval;
				
				if($row[0] == $keyval)
					echo("<option value=\"$row[0]\" selected>$row[1]</option>");
				else
					echo("<option value=\"$row[0]\">$row[1]</option>");
			}
		}
	}
	
	/******* create randam password ******************/
	function getPassword()
	{
		$numchars = rand(4,15); 
   		$password = "";
		$random=''; 
   		$chars = explode(',','a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,0,1,2,3,4,5,6,7,8,9'); 
		
		for($i=0; $i<$numchars;$i++)  
		{ 
		  $random.= $chars[rand(0,count($chars)-1)]; 
		}//for
		$password	= strtoupper(substr($random,0,4));
		return $password;
	}//function
	
	// convert the size into the mb
	function format_size($get_file_size)
	{
	   //if the filesize has between 7 an 9 characters then its in Mb
	   if (strlen($get_file_size) <= 9 && strlen($get_file_size) >= 7)
	   {
		   $get_file_size = number_format($get_file_size / 1048576,1);
		   return "$get_file_size MB";
	   }
	   //10 characters or over means Gb
	   elseif (strlen($get_file_size) >= 10)
	   {
		   $get_file_size = number_format($get_file_size / 1073741824,1);
		   return "$get_file_size GB";
	   }
	   //anything else is kilobytes
	   else
	   {
		   $get_file_size = number_format($get_file_size / 1024,1);
		   return "$get_file_size KB";
	   }
	}

	//tataol rate :- 2.8
	//restStar	:- 5 - 2.8 == 2.2 
	
	
	function showAverageRatingBar($totRate,$siteURL)
	{
		$rateBar		= "";
		$restStarBar 	= "";
			
		if($totRate !="")
		{
			$fivestar= 5;
			$restStar =($fivestar-$totRate); 
			/* this line is new */
			$totRate = (float) $totRate;
			/* end here */
			if(is_float($totRate))
			{
				$a	= explode(".",$totRate);
				$a_partone = $a[0];
				if(isset($a[1]))
					$a_parttwo	= $a[1];
				else
					$a_parttwo	= 0;
				
				for($i=0;$i<$a_partone;$i++)
				{
					$rateBar .="<image src='".$siteURL."images/newredstar.png' width='14' height='14' border='0' title=' ".($totRate)." out of 5'>";
				}
				
				
				if($a_parttwo!="")
				$rateBar .="<image src='".$siteURL."images/newredstar.png' width='14' height='14' border='0' title=' ".($totRate)." out of 5'>";
				else
				$rateBar  ;
				
				$float_restStar = explode(".",$restStar);
				
				for($j=0;$j<$float_restStar[0];$j++)
				{
					$restStarBar .="<image src='".$siteURL."images/newgreystar.png' width='14' height='14'  border='0'
					title=' ".$totRate." out of 5 '>"; 
				}
				
				$rateBar =$rateBar.$restStarBar;
			
			}
		}
		else
			{
				for($j=0;$j<5;$j++)
				{
					$restStarBar .="<image src='".$siteURL."images/newgreystar.png' width='14' height='14' border='0'
					title=' ".$totRate." out of 5 '>";
				}
					$rateBar	= $restStarBar;
			}
		return $rateBar;
	} // end of function showAverageRatingBar
	
	function getAvgRating($ContRefId,$ContType)
	{
		global $db;
		$sqlRating 	= "SELECT rating,total_votes FROM rating_master WHERE content_ref_id=$ContRefId AND content_type='$ContType'";
		$resRating	= $db->executeQuery($sqlRating);
		if($resRating > 0)
		{
			$resRatingRow		= $db->getResultSetArray();
			$TotalRating		 = "";
			$TotalVotes			 = "";
			for($vote=0;$vote<$resRating;$vote++)
			{
				$rowRatingRow		= $resRatingRow[$vote];
				$TotalRating 		= $TotalRating + $rowRatingRow["rating"];
				$TotalVotes			= $TotalVotes + $rowRatingRow["total_votes"];
			}
			$photoAvgRating		= $TotalRating/$resRating;
			return number_format($photoAvgRating, 1, '.', '');
		}
		else
		{
			return $photoAvgRating	= 0;
		}
	}//function
	
	function getCampusAvgRating($ContRefId,$ContType)
	{
		global $db;
		$sqlRating 	= "SELECT total_rating,total_votes FROM campus_rating_master WHERE content_ref_id=$ContRefId AND content_type='$ContType'";
		$resRating	= $db->executeQuery($sqlRating);
		if($resRating > 0)
		{
			$resRatingRow		= $db->getResultSetArray();
			$TotalRating		 = "";
			$TotalVotes			 = "";
			for($vote=0;$vote<$resRating;$vote++)
			{
				$rowRatingRow		= $resRatingRow[$vote];
				$TotalRating 		= $TotalRating + $rowRatingRow["total_rating"];
				$TotalVotes			= $TotalVotes + $rowRatingRow["total_votes"];
			}
			return $photoAvgRating		= round(($TotalRating/$TotalVotes),2);
		}
		else
		{
			return $photoAvgRating	= 0;
		}
		
	}
	
	/* Get Total votes */
	function getTotalVotes($ContRefId,$ContType)
	{
		global $db;
		$sqlVotes 	= "SELECT * FROM rating_master WHERE content_ref_id=$ContRefId AND content_type='$ContType'";
		$resVote	= $db->executeQuery($sqlVotes);
		if($resVote > 0)
		{
			/*$resVotes			 = $db->getResultSetArray();
			$TotalVotes			 = "";
			for($vote=0;$vote<$resVote;$vote++)
			{
				$rowVotes			= $resVotes[$vote];
				$TotalVotes			= $TotalVotes + $rowVotes["total_votes"];
			}*/
			return $resVote;
		}
		else
		{
			return $resVote	= 0;
		}
	}//function
	/* Get Total votes  from capus table */
	function getMaxTotalVotes($ContRefId,$ContType)
	{
		global $db;
		$sqlVotes 	= "SELECT max(Rating) as rating FROM rating_master WHERE ParentContentId=$ContRefId AND content_type='$ContType'";
		$resVote	= $db->executeQuery($sqlVotes);
		if($resVote > 0)
		{
			$resVotes			= $db->getResultSetArray();
			$rowVotes			= $resVotes[0];
			$TotalVotes			= number_format($rowVotes["rating"], 1, '.', '');
			return $TotalVotes;
		}
		else
		{
			return $TotalVotes	= 0;
		}
	}//function


	// Generate the random number
	function GenerateRandom($MaxNo)
	{
		return rand(0,$MaxNo);
	}
	//---------------------------- RATING BAR CODE END  -----------------------------------------------//	
	
	// Return the notification status
	
	function notification($tmp_UserId,$tmp_modId)
	{
		global $db;
		$sql	= "SELECT * FROM notify_setting_master WHERE n_module_id = {$tmp_modId} AND UserRefId = {$tmp_UserId}";
		$totRow	= $db->executeQuery($sql);
		if($totRow > 0)
		{
			$rs 			= $db->getResultSetArray();
			$row			= $rs[0];
			$Is_Notify		= $row['Is_Notify'];
			$Notify_Type	= $row['notify_type'];
			if($Is_Notify == 'Y')
			{
				return $Notify_Type;
			}
			else
			{
				return "N";
			} 
		}
		else
		{
			return "N";
		}
	}
	
	/* Do blog rating */
	function rateBlog($BlogId,$ContentType,$UserRefId,$flag,$BlogOwnerId,$UserName,$oEmail,$ModuleId,$ContentName,$Etitle,$URL)
	{
		global $db;
		$no_photo 			= "";
		$photoTotalVotes 	= "0";
		$photoTotalVotes = "0";
		$voted			 = 0;
	
		$sqlRating 	= "SELECT total_rating,total_votes FROM rating_master 
								WHERE ContentRefId=$BlogId AND ContentType='BLG' 
							  AND UserRefId=$UserRefId ";
							  
		$resRating	= $db->executeQuery($sqlRating);
		
		if($resRating > 0)
		{
			$resRatingRow	 	 = $db->getResultSetArray();
			$photoTotalRating 	 = $resRatingRow[0]["total_rating"];
			$photoTotalVotes	 = $resRatingRow[0]["total_votes"];
			
			$photoAvgRating	 = round(($photoTotalRating/$photoTotalVotes),2);
			$voted			 = 1;
			
		}//ifif($ObjPhotoAlbum->resRating > 0)
		else
		{
			$photoTotalRating	= 0;
			$photoAvgRating		= 0;
		}//else
		if($voted !=1 and  $flag  != "ShowStars") 
		{
				echo "<span id=\"rateStar\" style=\"width=200px;\">";
					for($i=0;$i<5;$i++)
					{
						if($i==0)
							$ObjBlog->imgsrc = "images/newredstar.png";
						else
							$ObjBlog->imgsrc = "images/newgreystar.png";                                                                                                                                                                                                                                                    
				?>																																																										
						<img id="star<?=$i?>" src="<?=$ObjBlog->imgsrc?>" title="<? echo ($i+1)?> out of 5" width="14" height="14" onmouseover="javascript:showStarHighLight(<?=$i?>,'')" onmouseout="javascript:hideStarHightLight(<?=$i?>)" onclick="javascript:ratePhoto('<?=$BlogId?>','<?=$i+1?>','BLG','<?=$BlogOwnerId?>','<?=$ModuleId?>','<?=$UserName?>','<?=$oEmail?>','<?=$ContentName?>','<?=$Etitle?>',<?=$URL?>)">
				<?php 
					}//for
					echo  "</span>";
				
		}//if($ObjPhotoAlbum->voted !=1 ) 
			if($voted == 1 || $flag == "ShowStars" ) 
			{
					echo "<span id=\"rateStar\" style=\"width=200px;\">";
							for($i=0;$i<5;$i++)
						{
								$ObjBlog->imgsrc = "images/newgreystar.png";
					?>
							<img id="star<?=$i?>" src="<?=$ObjBlog->imgsrc?>" title="<? echo ($i+1)?> out of 5" width="14" height="14">
					<?php }//for
						echo  "</span>";
					
			}//if($ObjPhotoAlbum->voted !=1 ) 
	}// function rateBlog($BlogId,$ContentType,$UserRefId)
	
	/* Function for campus rating blog */
	function rateCampusBlog($BlogId,$ContentType,$UserRefId,$flag,$BlogOwnerId,$UserName,$ContentName,$URL)
	{
		global $db;
		$no_photo 			= "";
		$photoTotalVotes 	= "0";
		$photoTotalVotes 	= "0";
		$voted			 	= 0;
	
		$sqlRating 	= "SELECT total_rating,total_votes FROM campus_rating_master 
						WHERE ContentRefId=$BlogId AND ContentType='BLG' 
							  AND UserRefId=$UserRefId ";
							  
		$resRating	= $db->executeQuery($sqlRating);
		
		if($resRating > 0)
		{
			$resRatingRow	 	 = $db->getResultSetArray();
			$photoTotalRating 	 = $resRatingRow[0]["total_rating"];
			$photoTotalVotes	 = $resRatingRow[0]["total_votes"];
			
			$photoAvgRating	 = round(($photoTotalRating/$photoTotalVotes),2);
			$voted			 = 1;
			
		}//ifif($ObjPhotoAlbum->resRating > 0)
		else
		{
			$photoTotalRating	= 0;
			$photoAvgRating		= 0;
		}//else
			if($voted !=1 and  $flag  != "ShowStars") 
		{
				echo "<span id=\"rateStar\" style=\"width=200px;\">";
						for($i=0;$i<5;$i++)
					{
						if($i==0)
							$ObjBlog->imgsrc = "images/newredstar.png";
						else
							$ObjBlog->imgsrc = "images/newgreystar.png";                                                                                                                                                                                                                                                    
				?>																																																										
						<img id="star<?=$i?>" src="<?=$ObjBlog->imgsrc?>" title="<? echo ($i+1)?> out of 5" width="14" height="14" onmouseover="javascript:showStarHighLight(<?=$i?>,'')" onmouseout="javascript:hideStarHightLight(<?=$i?>)" onclick="javascript:rateCampus('<?=$BlogId?>','<?=$i+1?>','BLG','<?=$BlogOwnerId?>','<?=$UserName?>','<?=$ContentName?>',<?=$URL?>)">
				<?php }//for
					echo  "</span>";
				
		}//if($ObjPhotoAlbum->voted !=1 ) 
			if($voted == 1 || $flag == "ShowStars" ) 
			{
					echo "<span id=\"rateStar\" style=\"width=200px;\">";
							for($i=0;$i<5;$i++)
						{
								$ObjBlog->imgsrc = "images/newgreystar.png";
					?>
							<img id="star<?=$i?>" src="<?=$ObjBlog->imgsrc?>" title="<? echo ($i+1)?> out of 5" width="14" height="14" >
					<?php }//for
						echo  "</span>";
					
			}//if($ObjPhotoAlbum->voted !=1 ) 
	}// function rateBlog($BlogId,$ContentType,$UserRefId)
	
	
	// Function to add user in PHPBB user table -- By Sandeep
	
   function phpbb_synchronize_user( $UserID,$Username, $Email, $Password, $IsActive )
   {
		//define( "IN_PHPBB", true );
		
		$phpbb_root_path = "./forum/";
		$phpEx = substr( strrchr( __FILE__, "." ), 1 );
		//require( $phpbb_root_path . "common." . $phpEx );
		//require( $phpbb_root_path . "includes/functions_user." . $phpEx );
		require( $phpbb_root_path . "includes/functions_module." . $phpEx );
		
		//$user->session_begin();
	  global $dbForum;
	  $message = array( );
	  $librium_default_group_id = 2;
	  static $phpbb_config;
	  static $group_config;
	  if ( is_array( $phpbb_config ) == false )
	  {
		 $phpbb_config = array( );
		 $query = "SELECT config_name, config_value FROM phpbb_config";
		 // commented due 
		 $ident = $dbForum->sql_query($query); //mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
		 while ( $myrow = @mysql_fetch_assoc( $ident ) )
		 {
			$phpbb_config[ $myrow[ "config_name" ] ] = $myrow[ "config_value" ];
		 }
	  }
	  if ( is_array( $group_config ) == false )
	  {
		 $query = sprintf( "SELECT group_id, group_colour, group_rank, group_avatar, group_avatar_type, group_avatar_width, group_avatar_height FROM phpbb_groups WHERE group_id = %d", $librium_default_group_id );
		 $ident = $dbForum->sql_query($query); //mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
		 $group_config = @mysql_fetch_assoc( $ident );
	  }
	  $bbuser_newid = $UserID + 1000;
	  $bbuser_email = strtolower( $Email );
	  $bbuser_passw = $Password;
	  $bbuser_class = $IsActive ? 0 : 1;
	  $bbuser_login = $bbuser_email;
	  $bbuser_login = explode( "@", $bbuser_login );
	  $bbuser_login = $bbuser_login[ 0 ];
	  $bbuser_login = preg_replace( "/[^a-z0-9]/i", "", $bbuser_login );
	  $bbuser_login = $bbuser_login . $bbuser_newid;
	  $query = sprintf( "SELECT username, username_clean, user_type FROM phpbb_users WHERE user_id = %d", $bbuser_newid );
	  $ident = $dbForum->sql_query($query); //mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
	  $myrow = @mysql_fetch_assoc($ident);
	  if ( $myrow === false )
	  {
		 $dataarray = array( );
		 $dataarray[ "user_id"                  ] = $bbuser_newid;
		 $dataarray[ "user_email"               ] = $bbuser_email;
		 $dataarray[ "user_email_hash"          ] = crc32( $bbuser_email ) . strlen( $bbuser_email );
		 $dataarray[ "user_password"            ] = phpbb_hash($bbuser_passw);
		 $dataarray[ "username"                 ] = $Username;
		 $dataarray[ "username_clean"           ] = $Username;
		 $dataarray[ "group_id"                 ] = $librium_default_group_id;
		 $dataarray[ "user_type"                ] = 0;
		 $dataarray[ "user_colour"              ] = $group_config[ "group_colour"];
		 $dataarray[ "user_rank"                ] = 0;
		 $dataarray[ "user_avatar"              ] = $group_config[ "group_avatar"];
		 $dataarray[ "user_avatar_type"         ] = 0;
		 $dataarray[ "user_avatar_width"        ] = 0;
		 $dataarray[ "user_avatar_height"       ] = 0;
		 $dataarray[ "user_lang"                ] = "en";
		 $dataarray[ "user_timezone"            ] = "0.00";
		 $dataarray[ "user_dst"                 ] = 0;
		 $dataarray[ "user_dateformat"          ] = "D M d, Y g:i a";
		 $dataarray[ "user_style"               ] = 2;
		 $dataarray[ "user_actkey"              ] = "";
		 $dataarray[ "user_allow_massemail"     ] = 1;
		 $dataarray[ "user_allow_pm"            ] = 1;
		 $dataarray[ "user_allow_viewemail"     ] = 1;
		 $dataarray[ "user_allow_viewonline"    ] = 1;
		 $dataarray[ "user_emailtime"           ] = 0;
		 $dataarray[ "user_full_folder"         ] = -3;
		 $dataarray[ "user_inactive_reason"     ] = $bbuser_class ? 3 : 0;
		 $dataarray[ "user_inactive_time"       ] = $bbuser_class ? time( ) : 0;
		 $dataarray[ "user_interests"           ] = "";
		 $dataarray[ "user_ip"                  ] = $_SERVER['REMOTE_ADDR'];
		 $dataarray[ "user_last_privmsg"        ] = 0;
		 $dataarray[ "user_lastmark"            ] = time( );
		 $dataarray[ "user_lastpage"            ] = "";
		 $dataarray[ "user_lastpost_time"       ] = 0;
		 $dataarray[ "user_lastvisit"           ] = 0;
		 $dataarray[ "user_message_rules"       ] = 0;
		 $dataarray[ "user_new_privmsg"         ] = 1;
		 $dataarray[ "user_notify"              ] = 1;
		 $dataarray[ "user_notify_pm"           ] = 1;
		 $dataarray[ "user_notify_type"         ] = 0;
		 $dataarray[ "user_occ"                 ] = "";
		 $dataarray[ "user_options"             ] = 895;
		 $dataarray[ "user_pass_convert"        ] = 0;
		 $dataarray[ "user_permissions"         ] = "";
		 $dataarray[ "user_posts"               ] = 0;
		 $dataarray[ "user_sig"                 ] = "";
		 $dataarray[ "user_sig_bbcode_bitfield" ] = "";
		 $dataarray[ "user_sig_bbcode_uid"      ] = "";
		 $dataarray[ "user_unread_privmsg"      ] = 1;
		 $dataarray[ "user_regdate"             ] = time( );
		 $dataarray[ "user_passchg"             ] = time( );
		 $dataarray[ "user_form_salt"           ] = substr( md5( microtime( ) ), 4, 16 );
		 $query = "";
		 foreach ( $dataarray as $column => $value )
		 {
			if ( $query == "" )
			{
			   $query .= "INSERT phpbb_users SET ";
			}
			else
			{
			   $query .= ", ";
			}
			$query .= sprintf( "%s = '%s'", $column, addslashes( $value ) );
		 }
		 $ident = $dbForum->sql_query($query);// mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
		// $message[ ] = sprintf( "Created user <b>%s</b>", rtext( $bbuser_login ) );
		 $query = sprintf( "
			INSERT INTO phpbb_user_group
			( group_id, user_id, group_leader, user_pending )
			VALUES
			( %d, %d, 0, 0 )
			", $librium_default_group_id, $bbuser_newid
		 );
		 $ident = $dbForum->sql_query($query); //mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
		 $message[ ] = "&rsaquo; Assigned user to registered users group";
	  }
	  else
	  {
		 $dataarray = array( );
		 $dataarray[ "user_email"      ] = $bbuser_email;
		 $dataarray[ "user_email_hash" ] = crc32( $bbuser_email ) . strlen( $bbuser_email );
		 $dataarray[ "user_password"   ] = md5( $bbuser_passw );
		 if ( $myrow[ "username" ] == "" || $myrow[ "username_clean" ] == "" )
		 {
			$dataarray[ "username"       ] = $Username;
			$dataarray[ "username_clean" ] = $Username;
		 }
		 if ( $myrow[ "user_type" ] != $bbuser_class )
		 {
			$dataarray[ "user_type"            ] = $bbuser_class;
			$dataarray[ "user_inactive_reason" ] = $bbuser_class ? 3 : 0;
			$dataarray[ "user_inactive_time"   ] = $bbuser_class ? time( ) : 0;
		 }
		 $query = "";
		 foreach ( $dataarray as $column => $value )
		 {
			if ( $query == "" )
			{
			   $query .= "UPDATE phpbb_users SET ";
			}
			else
			{
			   $query .= ", ";
			}
			$query .= sprintf( "%s = '%s'", $column, addslashes( $value ) );
		 }
		 $query .= sprintf( " WHERE user_id = %d", $bbuser_newid );
		 $ident = $dbForum->sql_query($query); //mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
		 if ( @mysql_affected_rows( $dbForum->db_connect_id ) )
		 {
			$message[ ] = sprintf( "Updated user <b>%s</b>", rtext( $bbuser_login ) );
		 }
	  }
	  return implode( "<br>\n", $message );
   }
   
   
     
    function phpbb_synchronize_user_reg( $UserID,$Username, $Email, $Password, $IsActive )
   {
  
		define( "IN_PHPBB", true );
		
		$phpbb_root_path = "./forum/";
		$phpEx = substr( strrchr( __FILE__, "." ), 1 );
		require( $phpbb_root_path . "common." . $phpEx );
		require( $phpbb_root_path . "includes/functions_user." . $phpEx );
		require( $phpbb_root_path . "includes/functions_module." . $phpEx );
		
		//$user->session_begin();
	  global $dbForum;
	  $message = array( );
	  $librium_default_group_id = 2;
	  static $phpbb_config;
	  static $group_config;
	  
	  $phpbb_config[ "default_lang"]	= "";
	  $config['rand_seed_last_update']  = "";
	  
	  if ( is_array( $phpbb_config ) == false )
	  {
		 $phpbb_config = array( );
		 $query = "SELECT config_name, config_value FROM phpbb_config";
		 // commented due 
		 $ident = $dbForum->sql_query($query); //mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
		 while ( $myrow = @mysql_fetch_assoc( $ident ) )
		 {
			$phpbb_config[ $myrow[ "config_name" ] ] = $myrow[ "config_value" ];
		 }
	  }
	  if ( is_array( $group_config ) == false )
	  {
		 $query = sprintf( "SELECT group_id, group_colour, group_rank, group_avatar, group_avatar_type, group_avatar_width, group_avatar_height FROM phpbb_groups WHERE group_id = %d", $librium_default_group_id );
		 $ident = $dbForum->sql_query($query); //mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
		 $group_config = @mysql_fetch_assoc( $ident );
	  }
	  $bbuser_newid = $UserID + 1000;
	  $bbuser_email = strtolower( $Email );
	  $bbuser_passw = $Password;
	  $bbuser_class = $IsActive ? 0 : 1;
	  $bbuser_login = $bbuser_email;
	  $bbuser_login = explode( "@", $bbuser_login );
	  $bbuser_login = $bbuser_login[ 0 ];
	  $bbuser_login = preg_replace( "/[^a-z0-9]/i", "", $bbuser_login );
	  $bbuser_login = $bbuser_login . $bbuser_newid;
	  $query = sprintf( "SELECT username, username_clean, user_type FROM phpbb_users WHERE user_id = %d", $bbuser_newid );
	  $ident = $dbForum->sql_query($query); //mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
	  $myrow = @mysql_fetch_assoc( $ident );
	  if ( $myrow === false )
	  {
		 $dataarray = array( );
		 $dataarray[ "user_id"                  ] = $bbuser_newid;
		 $dataarray[ "user_email"               ] = $bbuser_email;
		 $dataarray[ "user_email_hash"          ] = crc32( $bbuser_email ) . strlen( $bbuser_email );
		 $dataarray[ "user_password"            ] = phpbb_hash($bbuser_passw);
		 $dataarray[ "username"                 ] = $Username;
		 $dataarray[ "username_clean"           ] = $Username;
		 $dataarray[ "group_id"                 ] = $librium_default_group_id;
		 $dataarray[ "user_type"                ] = 0;
		 $dataarray[ "user_colour"              ] = $group_config[ "group_colour"];
		 $dataarray[ "user_rank"                ] = 0;
		 $dataarray[ "user_avatar"              ] = $group_config[ "group_avatar"];
		 $dataarray[ "user_avatar_type"         ] = 0;
		 $dataarray[ "user_avatar_width"        ] = 0;
		 $dataarray[ "user_avatar_height"       ] = 0;
		 $dataarray[ "user_lang"                ] = $phpbb_config[ "default_lang"];
		 $dataarray[ "user_timezone"            ] = "0.00";
		 $dataarray[ "user_dst"                 ] = 0;
		 $dataarray[ "user_dateformat"          ] = "D M d, Y g:i a";
		 $dataarray[ "user_style"               ] = 2;
		 $dataarray[ "user_actkey"              ] = "";
		 $dataarray[ "user_allow_massemail"     ] = 1;
		 $dataarray[ "user_allow_pm"            ] = 1;
		 $dataarray[ "user_allow_viewemail"     ] = 1;
		 $dataarray[ "user_allow_viewonline"    ] = 1;
		 $dataarray[ "user_emailtime"           ] = 0;
		 $dataarray[ "user_full_folder"         ] = -3;
		 $dataarray[ "user_inactive_reason"     ] = $bbuser_class ? 3 : 0;
		 $dataarray[ "user_inactive_time"       ] = $bbuser_class ? time( ) : 0;
		 $dataarray[ "user_interests"           ] = "";
		 $dataarray[ "user_ip"                  ] = $_SERVER['REMOTE_ADDR'];
		 $dataarray[ "user_last_privmsg"        ] = 0;
		 $dataarray[ "user_lastmark"            ] = time( );
		 $dataarray[ "user_lastpage"            ] = "";
		 $dataarray[ "user_lastpost_time"       ] = 0;
		 $dataarray[ "user_lastvisit"           ] = 0;
		 $dataarray[ "user_message_rules"       ] = 0;
		 $dataarray[ "user_new_privmsg"         ] = 1;
		 $dataarray[ "user_notify"              ] = 1;
		 $dataarray[ "user_notify_pm"           ] = 1;
		 $dataarray[ "user_notify_type"         ] = 0;
		 $dataarray[ "user_occ"                 ] = "";
		 $dataarray[ "user_options"             ] = 895;
		 $dataarray[ "user_pass_convert"        ] = 0;
		 $dataarray[ "user_permissions"         ] = "";
		 $dataarray[ "user_posts"               ] = 0;
		 $dataarray[ "user_sig"                 ] = "";
		 $dataarray[ "user_sig_bbcode_bitfield" ] = "";
		 $dataarray[ "user_sig_bbcode_uid"      ] = "";
		 $dataarray[ "user_unread_privmsg"      ] = 1;
		 $dataarray[ "user_regdate"             ] = time( );
		 $dataarray[ "user_passchg"             ] = time( );
		 $dataarray[ "user_form_salt"           ] = substr( md5( microtime( ) ), 4, 16 );
		 $query = "";
		 foreach ( $dataarray as $column => $value )
		 {
			if ( $query == "" )
			{
			   $query .= "INSERT phpbb_users SET ";
			}
			else
			{
			   $query .= ", ";
			}
			$query .= sprintf( "%s = '%s'", $column, addslashes( $value ) );
		 }
		 $ident = $dbForum->sql_query($query);// mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
		// $message[ ] = sprintf( "Created user <b>%s</b>", rtext( $bbuser_login ) );
		 $query = sprintf( "
			INSERT INTO phpbb_user_group
			( group_id, user_id, group_leader, user_pending )
			VALUES
			( %d, %d, 0, 0 )
			", $librium_default_group_id, $bbuser_newid
		 );
		 $ident = $dbForum->sql_query($query); //mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
		 $message[ ] = "&rsaquo; Assigned user to registered users group";
	  }
	  else
	  {
		 $dataarray = array( );
		 $dataarray[ "user_email"      ] = $bbuser_email;
		 $dataarray[ "user_email_hash" ] = crc32( $bbuser_email ) . strlen( $bbuser_email );
		 $dataarray[ "user_password"   ] = md5( $bbuser_passw );
		 if ( $myrow[ "username" ] == "" || $myrow[ "username_clean" ] == "" )
		 {
			$dataarray[ "username"       ] = $Username;
			$dataarray[ "username_clean" ] = $Username;
		 }
		 if ( $myrow[ "user_type" ] != $bbuser_class )
		 {
			$dataarray[ "user_type"            ] = $bbuser_class;
			$dataarray[ "user_inactive_reason" ] = $bbuser_class ? 3 : 0;
			$dataarray[ "user_inactive_time"   ] = $bbuser_class ? time( ) : 0;
		 }
		 $query = "";
		 foreach ( $dataarray as $column => $value )
		 {
			if ( $query == "" )
			{
			   $query .= "UPDATE phpbb_users SET ";
			}
			else
			{
			   $query .= ", ";
			}
			$query .= sprintf( "%s = '%s'", $column, addslashes( $value ) );
		 }
		 $query .= sprintf( " WHERE user_id = %d", $bbuser_newid );
		 $ident = $dbForum->sql_query($query); //mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
		 if ( @mysql_affected_rows( $dbForum->db_connect_id ) )
		 {
			$message[ ] = sprintf( "Updated user <b>%s</b>", rtext( $bbuser_login ) );
		 }
	  }
	  
	  return implode( "<br>\n", $message );
   }
   
   //This function shall be used to send SMS
	function sendSMS($mobile_no,$msg)
	{
	  $url="http://web7.india.be3a.com/pushsms.html?";
	  $username="tribe";
	  $password="tribe";
	  $prefix="56543";
	  $suffix="56543";
	  
	  $msg=urlencode($msg);
	
	  $url=$url."&mobile_no=".$mobile_no."&msg=".$msg."&user=".$username."&password=".$password."&prefix=".$prefix."&suffix=".$suffix;
	
	  $fp = fopen($url,'r');
	  if (!$fp)
	  {
		throw new Exception("Problem with $url, $php_errormsg");
	  }
	
	  $response = @stream_get_contents($fp);
	
	  if ($response === false)
	  {
		throw new Exception("Problem reading data from $url, $php_errormsg");
	  }
	
	  fclose($fp);
	   
	  if($response=="MESSAGE SENT\n")
	  {
		return 1;
	  }
	  else
	  {
		return 0;
	  }
	}
	
	/* Add  campus in phpbb forum table By Radhika */
	function phpbb_synchronize_campus($parentId,$cName,$cDesc,$flag,$forum_idex,$cImg)
	{
		global $dbForum;
	  	$message = array( );
	  	$librium_default_group_id = 2;
	  	static $phpbb_config;
	  	static $group_config;
		global $db,$user, $auth, $template, $cache;
		global $config, $phpbb_admin_path, $phpbb_root_path, $phpEx;
		
		$phpbb_root_path = "../forum/";
		@define( "IN_PHPBB", true );
		$phpEx = substr( strrchr( __FILE__, "." ), 1 );
		/************* Require files ****************************/
		require_once( $phpbb_root_path . "common." . $phpEx );
		require_once( $phpbb_root_path . "includes/functions_user." . $phpEx );
		require_once( $phpbb_root_path . "includes/functions_module." . $phpEx );
		require_once( $phpbb_root_path . "includes/utf/utf_normalizer." . $phpEx );
		require_once( $phpbb_root_path . "includes/message_parser." . $phpEx );
		require_once( $phpbb_root_path . "includes/acp/acp_forums." . $phpEx );
		require_once( $phpbb_root_path . "includes/functions_admin." . $phpEx );
		
		/********* Create Object acp_forums class Where all operations are done ***/
		$ObjAcpForum	= new acp_forums();
		$form_key = 'acp_forums';
		$user->add_lang('acp/forums');
		$ObjAcpForum->tpl_name = 'acp_forums';
		$ObjAcpForum->page_title = 'ACP_MANAGE_FORUMS';
		
		/******* Action (add,edit,delete)*************************************/
		$action		= $flag;
		$update		= (isset($flag)) ? true : false;
		$forum_id	= request_var('f', 0);

		/************ Campus id (Category id ) ******************************/
		$parent_id	= $parentId;
		$forum_data = $errors = array();
		
		  if ( is_array( $phpbb_config ) == false )
		  {
			 $phpbb_config = array( );
		  }
	 
		// Major routines
		if ($update)
		{
			switch ($action)
			{
				case 'delete':
					$action_subforums	= request_var('action_subforums', '');
					$subforums_to_id	= request_var('subforums_to_id', 0);
					$action_posts		= request_var('action_posts', '');
					$posts_to_id		= request_var('posts_to_id', 0);

					$errors = $ObjAcpForum->delete_forum($forum_idex, $action_posts, $action_subforums, $posts_to_id, $subforums_to_id);

					if (sizeof($errors))
					{
						break;
					}
					

					$auth->acl_clear_prefetch();
					$cache->destroy('sql', FORUMS_TABLE);

					//trigger_error($user->lang['FORUM_DELETED'] . adm_back_link($this->u_action . '&amp;parent_id=' . $this->parent_id));
	
				break;

				case 'edit':
			
					$forum_data = array(
						'forum_id'		=>	$forum_idex
					);
				
				// No break here

				case 'add':
				
					 $forum_data += array(
						'parent_id'				=> request_var('forum_parent_id', $parent_id),
						'forum_type'			=> request_var('forum_type', FORUM_POST),
						'type_action'			=> request_var('type_action', ''),
						'forum_status'			=> request_var('forum_status', ITEM_UNLOCKED),
						'forum_parents'			=> '',
						'forum_name'			=> utf8_normalize_nfc(request_var('forum_name', $cName, true)),
						'forum_link'			=> request_var('forum_link', ''),
						'forum_link_track'		=> request_var('forum_link_track', false),
						'forum_desc'			=> utf8_normalize_nfc(request_var('forum_desc', $cDesc, true)),
						'forum_desc_uid'		=> '',
						'forum_desc_options'	=> 7,
						'forum_desc_bitfield'	=> '',
						'forum_rules'			=> utf8_normalize_nfc(request_var('forum_rules', '', true)),
						'forum_rules_uid'		=> '',
						'forum_rules_options'	=> 7,
						'forum_rules_bitfield'	=> '',
						'forum_rules_link'		=> request_var('forum_rules_link', ''),
						'forum_image'			=> request_var('forum_image', $cImg, true),
						'forum_style'			=> request_var('forum_style', 0),
						'display_subforum_list'	=> request_var('display_subforum_list', false),
						'display_on_index'		=> request_var('display_on_index', false),
						'forum_topics_per_page'	=> request_var('topics_per_page', 0),
						'enable_indexing'		=> request_var('enable_indexing', true),
						'enable_icons'			=> request_var('enable_icons', false),
						'enable_prune'			=> request_var('enable_prune', false),
						'enable_post_review'	=> request_var('enable_post_review', true),
						'prune_days'			=> request_var('prune_days', 7),
						'prune_viewed'			=> request_var('prune_viewed', 7),
						'prune_freq'			=> request_var('prune_freq', 1),
						'prune_old_polls'		=> request_var('prune_old_polls', false),
						'prune_announce'		=> request_var('prune_announce', false),
						'prune_sticky'			=> request_var('prune_sticky', false),
						'forum_password'		=> request_var('forum_password', '', true),
						'forum_password_confirm'=> request_var('forum_password_confirm', '', true),
						'forum_password_unset'	=> request_var('forum_password_unset', false),
					);

					// Use link_display_on_index setting if forum type is link
					if ($forum_data['forum_type'] == FORUM_LINK)
					{
						$forum_data['display_on_index'] = request_var('link_display_on_index', false);

						// Linked forums are not able to be locked...
						$forum_data['forum_status'] = ITEM_UNLOCKED;
					}

					$forum_data['show_active'] = ($forum_data['forum_type'] == FORUM_POST) ? request_var('display_recent', false) : request_var('display_active', false);

					// Get data for forum rules if specified...
					if ($forum_data['forum_rules'])
					{
						generate_text_for_storage($forum_data['forum_rules'], $forum_data['forum_rules_uid'], $forum_data['forum_rules_bitfield'], $forum_data['forum_rules_options'], request_var('rules_parse_bbcode', false), request_var('rules_parse_urls', false), request_var('rules_parse_smilies', false));
					}

					// Get data for forum description if specified
					if ($forum_data['forum_desc'])
					{
						generate_text_for_storage($forum_data['forum_desc'], $forum_data['forum_desc_uid'], $forum_data['forum_desc_bitfield'], $forum_data['forum_desc_options'], request_var('desc_parse_bbcode', false), request_var('desc_parse_urls', false), request_var('desc_parse_smilies', false));
					}

					$errors = $ObjAcpForum->update_forum_data($forum_data);
					if (!sizeof($errors))
					{
						$forum_perm_from = "234";
						// Copy permissions?
						if ($forum_perm_from && !empty($forum_perm_from) && $forum_perm_from != $forum_data['forum_id'] &&
							(($action != 'edit') || empty($forum_id) || ($auth->acl_get('a_fauth') && $auth->acl_get('a_authusers') && $auth->acl_get('a_authgroups') && $auth->acl_get('a_mauth'))))
						{
							// if we edit a forum delete current permissions first
							if ($action == 'edit')
							{
									 $sql = 'DELETE FROM ' . ACL_USERS_TABLE . '
									WHERE forum_id = ' . (int) $forum_data['forum_id'];
								$dbForum->sql_query($sql);
	
								 $sql = 'DELETE FROM ' . ACL_GROUPS_TABLE . '
									WHERE forum_id = ' . (int) $forum_data['forum_id'];
								$dbForum->sql_query($sql);
							}//if

							// From the mysql documentation:
							// Prior to MySQL 4.0.14, the target table of the INSERT statement cannot appear in the FROM clause of the SELECT part of the query. This limitation is lifted in 4.0.14.
							// Due to this we stay on the safe side if we do the insertion "the manual way"

							// Copy permisisons from/to the acl users table (only forum_id gets changed)
							 $sql = 'SELECT user_id, auth_option_id, auth_role_id, auth_setting
								FROM ' . ACL_USERS_TABLE . '
								WHERE forum_id = ' . $forum_perm_from;
							$result = $dbForum->sql_query($sql);
							
							
							$users_sql_ary = array();
							while ($row = $dbForum->sql_fetchrow($result))
							{
								$users_sql_ary[] = array(
									'user_id'			=> (int) $row['user_id'],
									'forum_id'			=> (int) $forum_data['forum_id'],
									'auth_option_id'	=> (int) $row['auth_option_id'],
									'auth_role_id'		=> (int) $row['auth_role_id'],
									'auth_setting'		=> (int) $row['auth_setting']
								);
							}//while
							$dbForum->sql_freeresult($result);

							// Copy permisisons from/to the acl groups table (only forum_id gets changed)
							$sql = 'SELECT group_id, auth_option_id, auth_role_id, auth_setting
								FROM ' . ACL_GROUPS_TABLE . '
								WHERE forum_id = ' . $forum_perm_from;
							$result = $dbForum->sql_query($sql);

							$groups_sql_ary = array();
							while ($row = $dbForum->sql_fetchrow($result))
							{
								$groups_sql_ary[] = array(
									'group_id'			=> (int) $row['group_id'],
									'forum_id'			=> (int) $forum_data['forum_id'],
									'auth_option_id'	=> (int) $row['auth_option_id'],
									'auth_role_id'		=> (int) $row['auth_role_id'],
									'auth_setting'		=> (int) $row['auth_setting']
								);
							}//while
							$dbForum->sql_freeresult($result);

							// Now insert the data
							$dbForum->sql_multi_insert(ACL_USERS_TABLE, $users_sql_ary);
							$dbForum->sql_multi_insert(ACL_GROUPS_TABLE, $groups_sql_ary);
							cache_moderators();
						}//if forum permissions

						$auth->acl_clear_prefetch();
						$cache->destroy('sql', FORUMS_TABLE);
	
						$acl_url = '&amp;mode=setting_forum_local&amp;forum_id[]=' . $forum_data['forum_id'];

					//	$message = ($action == 'add') ? $user->lang['FORUM_CREATED'] : $user->lang['FORUM_UPDATED'];

						// Redirect to permissions
						if ($auth->acl_get('a_fauth'))
						{
							$message .= '<br /><br />' . sprintf($user->lang['REDIRECT_ACL'], '<a href="' . append_sid("{$phpbb_admin_path}index.$phpEx", 'i=permissions' . $acl_url) . '">', '</a>');
						}
						
					}//if no errors
					
					break;
			}//switch
		}//update
	}//phpbb_synchronize_campus
	
	/* Added By Radhika ********************************************************************************************
		* Checks whatever or not a variable is OK for use in the Database
		* param mixed $value_ary An array of the form array(array('lang' => ..., 'value' => ..., 'column_type' =>))'
		* param mixed $error The error array
		*/
		function validate_range($value_ary, &$error)
		{
			global $user;
			
			$column_types = array(
				'BOOL'	=> array('php_type' => 'int', 		'min' => 0, 				'max' => 1),
				'USINT'	=> array('php_type' => 'int',		'min' => 0, 				'max' => 65535),
				'UINT'	=> array('php_type' => 'int', 		'min' => 0, 				'max' => (int) 0x7fffffff),
				'INT'	=> array('php_type' => 'int', 		'min' => (int) 0x80000000, 	'max' => (int) 0x7fffffff),
				'TINT'	=> array('php_type' => 'int',		'min' => -128,				'max' => 127),
				
				'VCHAR'	=> array('php_type' => 'string', 	'min' => 0, 				'max' => 255),
			);
			foreach ($value_ary as $value)
			{
				$column = explode(':', $value['column_type']);
				$max = $min = 0;
				$type = 0;
				if (!isset($column_types[$column[0]]))
				{
					continue;
				}
				else
				{
					$type = $column_types[$column[0]];
				}
		
				switch ($type['php_type'])
				{
					case 'string' :
						$max = (isset($column[1])) ? min($column[1],$type['max']) : $type['max'];
						if (strlen($value['value']) > $max)
						{
							$error[] = sprintf($user->lang['SETTING_TOO_LONG'], $user->lang[$value['lang']], $max);
						}
					break;
		
					case 'int': 
						$min = (isset($column[1])) ? max($column[1],$type['min']) : $type['min'];
						$max = (isset($column[2])) ? min($column[2],$type['max']) : $type['max'];
						if ($value['value'] < $min)
						{
							$error[] = sprintf($user->lang['SETTING_TOO_LOW'], $user->lang[$value['lang']], $min);
						}
						else if ($value['value'] > $max)
						{
							$error[] = sprintf($user->lang['SETTING_TOO_BIG'], $user->lang[$value['lang']], $max);
						}
					break;
				}
			}
		}

	
	/* Delete folder and with its all files */
	function delete_folder_and_its_subfolder($file)//$file = Main Folder Path 
    {
		@chmod($file,0777);
        if (is_dir($file)) 
        {
           echo $handle = opendir($file); 
            while($filename = readdir($handle)) 
            {
                if ($filename != "." && $filename != "..") 
                {
                    delete_folder_and_its_subfolder($file."/".$filename);
                }
            }
            @closedir($handle);
            @rmdir($file);
        } 
        else 
        {
           @unlink($file);
        }
    }//end delete_folder_and_its_subfolder
	
	
	function update_forum_user_details($usrPwd,$usrUsername)
	{	
		define( "IN_PHPBB", true );
		
		$phpbb_root_path = "./forum/";
		$phpEx = substr( strrchr( __FILE__, "." ), 1 );
		require( $phpbb_root_path . "common." . $phpEx );
		require( $phpbb_root_path . "includes/functions_user." . $phpEx );
		require( $phpbb_root_path . "includes/functions_module." . $phpEx );
	 	global $dbForum;
	  	$message = array( );
		
		$sql			= "UPDATE  phpbb_users set  user_password = '".phpbb_hash($usrPwd)."' WHERE username = '$usrUsername'";
		$dbForum->sql_query($sql);
		
	}//founction
	
	
	
	/*---------------------Fill out checkboxes By Radhika -----------------------------------------*/		
	
	function FillChkbox($tblname,$keyfield,$keyval,$showfield,$fieldName,$orderby,$constraint,$col,$numbering,$class,$db)
	{
	
		$cnt = 1;
		$fldStausID	= '';

		if(strlen($orderby) > 0 )
			 $sqlChk 	= "select $keyfield,$showfield from $tblname $constraint ORDER BY $orderby";
		else
			 $sqlChk 	= "select $keyfield,$showfield from $tblname $constraint";
		
		$resChk		= $db->executeQuery($sqlChk);	
		$keyval	= explode(",",$keyval);
		
		if($resChk > 0)
		{
			$resRow 	= $db->getResultSet();
			
			$count	= 1;
			for($i=0;$i<$resChk;$i++)
			{
				$rowCh	= $resRow[$i];
				//print_r($rowCh);
				
				if($tblname == "group_master")
				{
					$fldStausID = $rowCh[0]."#".$rowCh[1];
					
				}
				$fldInVal   = $rowCh[0];
				//$fldStausID = $rowCh[0];
							
				if($cnt <= $col)
				{
				
					if(in_array($fldInVal,$keyval))
					{
						if( $numbering == 'yes')
						{
							echo "<span class=\"popup_checkbox float_left\"><input type='checkbox' value='$fldStausID' id='".$fieldName."' name='".$fieldName."' checked >
								" .$rowCh[1]."</span>";
						}else
						{
							echo "<span class=\"popup_checkbox float_left\"><input type='checkbox' value='$fldStausID' id='".$fieldName."' name='".$fieldName."' checked >
								" .$rowCh[1]."</span>";
						}
					}else
					{
						if( $numbering == 'yes')
						{
							echo "<span class=\"popup_checkbox float_left\"><input type='checkbox' value='$fldStausID' id='$fieldName' name='$fieldName'>
								  " .$rowCh[1]."</span>";
						}//if
						else
						{
							echo "<input type='checkbox' value='$fldStausID' id='$fieldName' name='$fieldName'>
									" .$rowCh[1]."";
						}//else
	
					}
					$count++;
				
				}
				
				if(($cnt % $col) == 0 && $i != 0)
				{
				
					$cnt = 0;
					//echo "<br>";
					
				}
			
			$cnt++;	
		}//for
		//echo "</table>";
	  }
	  	else
		{
			echo "<br><span class=\"erMessages\">No Record Found...</span> ";
		}	
	}
	
		function FillChkboxAdmin($tblname,$keyfield,$keyval,$showfield,$fieldName,$orderby,$constraint,$col,$numbering,$class,$db)
	{
	
		$cnt = 1;
		$fldStausID	= '';

		if(strlen($orderby) > 0 )
			 $sqlChk 	= "select $keyfield,$showfield from $tblname $constraint ORDER BY $orderby";
		else
			 $sqlChk 	= "select $keyfield,$showfield from $tblname $constraint";
		
		$resChk		= $db->executeQuery($sqlChk);	
		$keyval	= explode(",",$keyval);
		
		if($resChk > 0)
		{
			$resRow 	= $db->getResultSet();
			
			$count	= 1;
			for($i=0;$i<$resChk;$i++)
			{
				$rowCh	= $resRow[$i];
				//print_r($rowCh);
				
				if($tblname == "group_master")
				{
					$fldStausID = $rowCh[0]."#".$rowCh[1];
					
				}
				$fldInVal   = $rowCh[0];
				//$fldStausID = $rowCh[0];
							
				if($cnt <= $col)
				{
				
					if(in_array($fldInVal,$keyval))
					{
						if( $numbering == 'yes')
						{
							echo "<span class=\"$class\" ><input type='checkbox' value='$fldStausID' id='".$fieldName."' name='".$fieldName."' checked >
								" .$rowCh[1]."</span>";
						}else
						{
							echo "<span class=\"$class\" ><input type='checkbox' value='$fldStausID' id='".$fieldName."' name='".$fieldName."' checked >
								" .$rowCh[1]."</span>";
						}
					}else
					{
						if( $numbering == 'yes')
						{
							echo "<span class=\"$class\" ><input type='checkbox' value='$fldStausID' id='$fieldName' name='$fieldName'>
								  " .$rowCh[1]."</span>";
						}//if
						else
						{
							echo "<span class=\"$class\" ><input type='checkbox' value='$fldStausID' id='$fieldName' name='$fieldName'>
									" .$rowCh[1]."</span>";
						}//else
	
					}
					$count++;
				
				}
				
				if(($cnt % $col) == 0 && $i != 0)
				{
				
					$cnt = 0;
					echo "<br>";
					
				}
			
			$cnt++;	
		}//for
		//echo "</table>";
	  }
	  	else
		{
			echo "<br><span class=\"erMessages\">No Record Found...</span> ";
		}	
		
		
	}

	
	/******* to generate username ***************/
	function create_user_name($tmp_fname,$tmp_lname)
	{
		global $db;	
			$check_name1	= $tmp_fname.".".$tmp_lname."@engageexpert.com";
			$check_name2	= $tmp_fname."_".$tmp_lname."@engageexpert.com";
			$check_name3	= $tmp_fname."@enagageexpert.com";
			$check_name4	= $tmp_fname.".".substr($tmp_lname,0,1)."@engageexpert.com";
			$check_name5	= $tmp_fname."_".substr($tmp_lname,0,1)."@engageexpert.com";
			$check_name6	= $tmp_fname."_".$tmp_lname.rand()."@engageexpert.com";
			
			//echo $db->CheckDup("partner_master","user_name",$check_name1);
			
			if(($db->CheckDup("user_master","user_name",$check_name1) == 0) && ($db->CheckDup("expert_master","user_name",$check_name1) == 0) && ($db->CheckDup("partner_master","user_name",$check_name1) == 0))
			{
				$new_username	= $check_name1;
			}
			elseif(($db->CheckDup("user_master","user_name",$check_name2) == 0) && ($db->CheckDup("expert_master","user_name",$check_name2) == 0) && ($db->CheckDup("partner_master","user_name",$check_name2) == 0))
			{
				$new_username	= $check_name2;
			}
			elseif(($db->CheckDup("user_master","user_name",$check_name3) == 0) && ($db->CheckDup("expert_master","user_name",$check_name3) == 0) && ($db->CheckDup("partner_master","user_name",$check_name3) == 0))
			{
				$new_username	= $check_name3;
			}
			elseif(($db->CheckDup("user_master","user_name",$check_name4) == 0) && ($db->CheckDup("expert_master","user_name",$check_name4) == 0) && ($db->CheckDup("partner_master","user_name",$check_name24) == 0))
			{
				$new_username	= $check_name4;
			}
			elseif(($db->CheckDup("user_master","user_name",$check_name5) == 0) && ($db->CheckDup("expert_master","user_name",$check_name5) == 0) && ($db->CheckDup("partner_master","user_name",$check_name5) == 0))
			{
				$new_username	= $check_name5;
			}
			elseif(($db->CheckDup("user_master","user_name",$check_name6) == 0) && ($db->CheckDup("expert_master","user_name",$check_name6) == 0) && ($db->CheckDup("partner_master","user_name",$check_name6) == 0))
			{
				$new_username	= $check_name6;
			}
			
		return $new_username;
	 }
	 
	 
	 
	 /* Send email using template */
		function sendTplEmail($tplName,$fromEmail,$toEmail,$siteURL,$dir,$siteTitle,$content)
		{
			global $db;
			
			$selTemplate	= " SELECT * FROM etemplate_master WHERE etemplate_title = '$tplName' ";
			$tCnt			= $db->executeQuery($selTemplate);
			
			if( $tCnt > 0 )
			{
				$tRs		= $db->getResultsetArray();
				$tRow		= $tRs[0];

					
					$eTmpHeader			= $tRow["etemplate_header"];
					$eTmpFooter			= nl2br($tRow["etemplate_footer"]);
					$eTmpBgColor		= $tRow["etemplate_bgcolor"];
					$eTmpHcolor			= $tRow["etemplate_color"];
					$eTpl_from_mail		= $tRow["from_email"];		
					$eSubject			= $tRow["etemplate_subject"];
					$title				= $tRow["etemplate_title"];
					$eEmailBody			= nl2br($tRow["etemplate_body"]);
					$eEmailBody			= strip($eEmailBody);
					
					$currDate			= date('dS M, Y');	
					$eDynamicContents	= $content;								
					
					$imgStr     		= $siteURL."/"."images"; 				
					$dir1      			= dirname($dir);
					
					$dir1				= str_replace("admin","",$dir1); 
					
					$fpRead		 	= fopen($dir1 . "/template/email.tpl","r+");
					$content	 	= fread($fpRead,filesize($dir1 . "/template/email.tpl"));
								
					$content	 = str_replace("<%INC_EMAIL_HEADER_COLOR%>",$eTmpHcolor,$content);
					$content	 = str_replace("<%INC_EMAIL_BG_COLOR%>",$eTmpBgColor,$content);
					$content	 = str_replace("<%INC_EMAIL_BODY_TITLE%>",$title,$content);
					$content	 = str_replace("<%INC_EMAIL_BGCOLOR%>",$eTmpFooter,$content);
					$content	 = str_replace("<%INC_IMGPATH%>",$imgStr,$content);
					$content	 = str_replace("<%INC_EMAIL_DATE%>",$currDate,$content);
					$content	 = str_replace("<%INC_EMAIL_HEADER%>",html_entity_decode($eTmpHeader),$content);
					$content	 = str_replace("<%INC_DYNAMIC_CONTENT%>",html_entity_decode($eDynamicContents),$content);
					$content	 = str_replace("<%INC_EMAIL_FOOTER%>",html_entity_decode($eTmpFooter),$content);
					/* //$content	= str_replace("<%INC_EMAIL_BGCOLOR_1%>",$OuterbgColor,$content); */
					$content	 = str_replace("<%INC_SITE_NAME%>",$siteTitle,$content);
					$content	 = str_replace("<%INC_SITE_URL%>",$siteURL,$content);
					$content	 = str_replace("<%INC_DATE%>",date('Y'),$content);
					$content	 = str_replace("<%INC_BODY_CONTENT%>",html_entity_decode($eEmailBody),$content);
					$content	 = str_replace("<%INC_ARTICLE%>","",html_entity_decode($content));
					
					$fldSubject	 = $eSubject;
				
					//SendAutoMail_PHP($toEmail,$fromEmail,$fldSubject,$content);	
					// we have just fetch the email address from the database and not changed in the call function.
					SendAutoMail_PHP($toEmail,$eTpl_from_mail,$fldSubject,$content);	
			}//if
		
		}//function
		/**/
		/**************************function to remov e users records***********************/
		
		function delete_user_related_records($usertype,$user_id)
		{
			global $db;
			
			$user_id	= implode(",",$user_id);
			
			if($usertype == "C")
			{
				$sql = "DELETE FROM favorite_master WHERE fav_user_id IN($user_id) AND fav_user_type = 'C'";
				$db->executeQuery($sql);
				//$sql3 = "DELETE FROM article_master WHERE user_id = ".$user_id." AND user_type = 'C'";
				//$db-executeQuery($sql3);
				$sql4 = "DELETE FROM ask_for_bid_master WHERE client_ref_id IN($user_id)";
				$db->executeQuery($sql4);
				$sql5 = "DELETE FROM dashboard_module_master WHERE user_ref_id IN($user_id) AND user_reference_type = 'C'";
				$db->executeQuery($sql5);
				$sql6 = "DELETE FROM event_master WHERE user_ref_id IN($user_id) AND user_type = 'C'";
				$db->executeQuery($sql6);
				$sql7 = "DELETE FROM executive_post_master WHERE post_client_ref_id IN($user_id)";
				$db->executeQuery($sql7);
				$sql8 = "DELETE FROM personal_list_master WHERE client_ref_id IN($user_id)";
				$db->executeQuery($sql8);
				$sql9 = "DELETE FROM recommend_master WHERE recommend_from_refid IN($user_id) AND recommend_from_type = 'C'";
				$db->executeQuery($sql9);
				$sql10 = "DELETE FROM service_desk_ticket_master WHERE ticket_user_ref_id IN($user_id) AND ticket_from_type = 'C'";
				$db->executeQuery($sql10);
				$sql11 = "DELETE FROM subusers_master WHERE client_ref_id IN($user_id)";
				$db->executeQuery($sql11);
				$sql12 = "DELETE FROM survey_master WHERE user_ref_id IN($user_id) ";
				$db->executeQuery($sql12);
				$sql13 = "DELETE FROM timezone WHERE user_id IN($user_id) AND user_type = 'C'";
				$db->executeQuery($sql13);
				$sql14 = "DELETE FROM user_chat_master WHERE chat_by_id IN($user_id) AND chat_by_type ='C'";
				$db->executeQuery($sql14);
				$sql15 = "DELETE FROM user_chat_master WHERE chat_to_id IN($user_id) AND chat_to_type ='C'";
				$db->executeQuery($sql15);
				$sql16 = "DELETE FROM user_messages_master WHERE SenderId IN($user_id) AND SenderType = 'C'";
				$db->executeQuery($sql16);
				$sql17 = "DELETE FROM user_messages_master WHERE ReceiverId IN($user_id) AND RecieverType = 'C'";
				$db->executeQuery($sql17);
				$db->executeQuery("DELETE FROM user_master WHERE user_id IN($user_id)");
				
			}
			elseif($usertype == "P")
			{
				$sql2 = "DELETE FROM favorite_master WHERE fav_added_ref_id IN($user_id) AND fav_added_type = 'P'";
				$db->executeQuery($sql2);
				
				$sql5 = "DELETE FROM dashboard_module_master WHERE user_ref_id IN($user_id) AND user_reference_type = 'P'";
				$db->executeQuery($sql5);
				$sql6 = "DELETE FROM event_master WHERE user_ref_id IN($user_id) AND user_type = 'P'";
				$db->executeQuery($sql6);
				
				$sql13 = "DELETE FROM timezone WHERE user_id IN($user_id) AND user_type = 'P'";
				$db->executeQuery($sql13);
				$sql14 = "DELETE FROM user_chat_master WHERE chat_by_id IN($user_id) AND chat_by_type ='P'";
				$db->executeQuery($sql14);
				$sql15 = "DELETE FROM user_chat_master WHERE chat_to_id IN($user_id) AND chat_to_type ='P'";
				$db->executeQuery($sql15);
				$sql16 = "DELETE FROM user_messages_master WHERE SenderId IN($user_id) AND SenderType = 'P'";
				$db->executeQuery($sql16);
				$sql17 = "DELETE FROM user_messages_master WHERE ReceiverId IN($user_id) AND RecieverType = 'P'";
				$db->executeQuery($sql17);
				
				$sql9 = "DELETE FROM recommend_master WHERE recommend_from_refid IN($user_id) AND recommend_from_type = 'P'";
				$db->executeQuery($sql9);
				$sql10 = "DELETE FROM service_desk_ticket_master WHERE ticket_user_ref_id IN($user_id) AND ticket_from_type = 'P'";
				$db->executeQuery($sql10);
				
				$sql11 = "DELETE FROM bid_response_master WHERE bid_replier_id IN($user_id) AND user_type = 'P'";
				$db->executeQuery($sql11);
				
				$sql12 = "DELETE FROM post_reply_master WHERE reply_user_ref_id IN($user_id) AND reply_user_type = 'P'";
				$db->executeQuery($sql12);
				
				
				$sqlArticle				= "SELECT * FROM article_master WHERE user_id IN($user_id) AND user_type = 'partner'";
				$cntArticle				= $db->executeQuery($sqlArticle);
					
					if( $cntArticle	 > 0 )
					{
						$ArticleRs	= $db->getResultsetArray();
						
						for($u=0; $u < $cntArticle ; $u++)
						{
							$ArticleRow			= $ArticleRs[$u];
							$ArticleId		    = $ArticleRow["article_id"];
							
							$DeleteArticle		  = $db->FindOtherValue("article_master","article_id",$ArticleId,"article_img");
							$filePath			  = $articlePhotoPath."/AR_".$ArticleId."_".$DeleteArticle;
							$fldArticleThumbPath  = $articlePhotoPath."/THUMB_AR_".$ArticleId."_".$DeleteArticle;
							
							/* for video img */ 
							$DeleteArticle		      = $db->FindOtherValue("article_master","article_id",$ArticleId,"article_vimg");
							$videoFilePath			  = $articlePhotoPath."/AR_V_".$ArticleId."_".$DeleteArticle;
							$videoArticleThumbPath    = $articlePhotoPath."/THUMB_AR_V_".$ArticleId."_".$DeleteArticle;
							
							/* for video */
							$DeleteArticle		  = $db->FindOtherValue("article_master","article_id",$ArticleId,"article_video");
							$video				  = $articleVideoPath."/".$DeleteArticle;
							
							if( strlen($DeleteArticle) > 0 )
							{
								$sql	= "UPDATE article_master 
															SET article_video = '',
																article_vimg = ''
															WHERE article_id = ".$ArticleId;
								$db->executeQuery($sql);
							}//
							
							/* for PPT */
							 $DeleteArticle	  = $db->FindOtherValue("article_master","article_id",$ArticleId,"article_ppt");
							 $ppt				  = $adminPPTPath."/".$DeleteArticle;
							 
							 if( strlen( $DeleteArticle) > 0 )
							{
								$sql	= "UPDATE article_master 
															SET article_ppt = ''
															WHERE article_id = ".$ArticleId;
								$db->executeQuery($sql);
							}//
							
							/* for songs */
							$DeleteArticle		  = $db->FindOtherValue("music_master","article_id",$ArticleId,"music_file_name");
							$song				  = $adminSongPath."/".$DeleteArticle;
							
							 if( strlen( $DeleteArticle) > 0 )
							{
								 $sql	= "UPDATE music_master 
															SET music_file_name = ''
															WHERE article_id = ".$ArticleId;
								$db->executeQuery($sql);
							}//
							
							/* for flash */
							$DeleteArticle		  = $db->FindOtherValue("article_master","article_id",$ArticleId,"article_flash");
							$flash				  = $adminFlashPath."/".$DeleteArticle;
							
							if( strlen( $DeleteArticle) > 0 )
							{
								 $sql	= "UPDATE article_master 
															SET article_flash = ''
															WHERE article_id = ".$ArticleId;
								$db->executeQuery($sql);
							}//
							
							/* for photos */ 
							/* add here code to remove images from db. */
							  
							  $SQL  = "SELECT photo_image FROM article_photos_master WHERE article_ref_id =".$ArticleId;
							  $cnt	= $db->executeQuery($SQL);
							  
							  if( $cnt > 0 )
							  {
								 $rs_photo	= $db->getResultsetArray();
								  for( $p=0;$p<$cnt;$p++)
								  { 
									$row_photo	= $rs_photo[$p];
									$img		= $row_photo["photo_image"];
									$img_path	= $articleNewPhotosPath."/".$img;
									$img_thumb_path 	= $articleNewPhotosPath."/THUMB_".$img;
									$img_normal_path    = $articleNewPhotosPath."/NORMAL_".$img;
					
									@unlink($img_path);
									@unlink($img_thumb_path);
									@unlink($img_normal_path);
								  }//for
							  }//if
								
							/* end here */
					
							
								@unlink($filePath);
								@unlink($fldArticleThumbPath);
								
								@unlink($videoFilePath);
								@unlink($videoArticleThumbPath);
								
								@unlink($video);
								
								@unlink($ppt);
								
								@unlink($song);
								
								@unlink($flash);
									
						}//for
					}
					$db->executeQuery("DELETE FROM article_master WHERE user_id IN($user_id) AND user_type='partner'");
				
				$db->executeQuery("DELETE FROM partner_master WHERE partner_id IN($user_id)");
				
					
			}
			elseif($usertype == "E")
			{
				$sql2 = "DELETE FROM favorite_master WHERE fav_added_ref_id IN($user_id) AND fav_added_type = 'E'";
				$db->executeQuery($sql2);
				
				$sql2 = "DELETE FROM favorite_master WHERE fav_added_ref_id IN($user_id) AND fav_added_type = 'E'";
				$db->executeQuery($sql2);
				
				$sql5 = "DELETE FROM dashboard_module_master WHERE user_ref_id IN($user_id) AND user_reference_type = 'E'";
				$db->executeQuery($sql5);
				$sql6 = "DELETE FROM event_master WHERE user_ref_id IN($user_id) AND user_type = 'PE'";
				$db->executeQuery($sql6);
				
				$sql13 = "DELETE FROM timezone WHERE user_id IN($user_id) AND user_type = 'E'";
				$db->executeQuery($sql13);
				$sql14 = "DELETE FROM user_chat_master WHERE chat_by_id IN($user_id) AND chat_by_type ='E'";
				$db->executeQuery($sql14);
				$sql15 = "DELETE FROM user_chat_master WHERE chat_to_id IN($user_id) AND chat_to_type ='E'";
				$db->executeQuery($sql15);
				$sql16 = "DELETE FROM user_messages_master WHERE SenderId IN($user_id) AND SenderType = 'E'";
				$db->executeQuery($sql16);
				$sql17 = "DELETE FROM user_messages_master WHERE ReceiverId IN($user_id) AND RecieverType = 'E'";
				$db->executeQuery($sql17);
				
				$sql9 = "DELETE FROM recommend_master WHERE recommend_from_refid IN($user_id) AND recommend_from_type = 'E'";
				$db->executeQuery($sql9);
				$sql10 = "DELETE FROM service_desk_ticket_master WHERE ticket_user_ref_id IN($user_id) AND ticket_from_type = 'E'";
				$db->executeQuery($sql10);
				
				$sql11 = "DELETE FROM bid_response_master WHERE bid_replier_id IN($user_id) AND user_type = 'E'";
				$db->executeQuery($sql11);
				
				$sql12 = "DELETE FROM post_reply_master WHERE reply_user_ref_id IN($user_id) AND reply_user_type = 'E'";
				$db->executeQuery($sql12);
				
				
				$sqlArticle				= "SELECT * FROM article_master WHERE user_id IN($user_id) AND user_type = 'expert'";
				$cntArticle				= $db->executeQuery($sqlArticle);
					
					if( $cntArticle	 > 0 )
					{
						$ArticleRs	= $db->getResultsetArray();
						
						for($u=0; $u < $cntArticle ; $u++)
						{
							$ArticleRow			= $ArticleRs[$u];
							$ArticleId		    = $ArticleRow["article_id"];
							
							$DeleteArticle		  = $db->FindOtherValue("article_master","article_id",$ArticleId,"article_img");
							$filePath			  = $articlePhotoPath."/AR_".$ArticleId."_".$DeleteArticle;
							$fldArticleThumbPath  = $articlePhotoPath."/THUMB_AR_".$ArticleId."_".$DeleteArticle;
							
							/* for video img */ 
							$DeleteArticle		      = $db->FindOtherValue("article_master","article_id",$ArticleId,"article_vimg");
							$videoFilePath			  = $articlePhotoPath."/AR_V_".$ArticleId."_".$DeleteArticle;
							$videoArticleThumbPath    = $articlePhotoPath."/THUMB_AR_V_".$ArticleId."_".$DeleteArticle;
							
							/* for video */
							$DeleteArticle		  = $db->FindOtherValue("article_master","article_id",$ArticleId,"article_video");
							$video				  = $articleVideoPath."/".$DeleteArticle;
							
							if( strlen($DeleteArticle) > 0 )
							{
								$sql	= "UPDATE article_master 
															SET article_video = '',
																article_vimg = ''
															WHERE article_id = ".$ArticleId;
								$db->executeQuery($sql);
							}//
							
							/* for PPT */
							 $DeleteArticle	  = $db->FindOtherValue("article_master","article_id",$ArticleId,"article_ppt");
							 $ppt				  = $adminPPTPath."/".$DeleteArticle;
							 
							 if( strlen( $DeleteArticle) > 0 )
							{
								$sql	= "UPDATE article_master 
															SET article_ppt = ''
															WHERE article_id = ".$ArticleId;
								$db->executeQuery($sql);
							}//
							
							/* for songs */
							$DeleteArticle		  = $db->FindOtherValue("music_master","article_id",$ArticleId,"music_file_name");
							$song				  = $adminSongPath."/".$DeleteArticle;
							
							 if( strlen( $DeleteArticle) > 0 )
							{
								 $sql	= "UPDATE music_master 
															SET music_file_name = ''
															WHERE article_id = ".$ArticleId;
								$db->executeQuery($sql);
							}//
							
							/* for flash */
							$DeleteArticle		  = $db->FindOtherValue("article_master","article_id",$ArticleId,"article_flash");
							$flash				  = $adminFlashPath."/".$DeleteArticle;
							
							if( strlen( $DeleteArticle) > 0 )
							{
								 $sql	= "UPDATE article_master 
															SET article_flash = ''
															WHERE article_id = ".$ArticleId;
								$db->executeQuery($sql);
							}//
							
							/* for photos */ 
							/* add here code to remove images from db. */
							  
							  $SQL  = "SELECT photo_image FROM article_photos_master WHERE article_ref_id =".$ArticleId;
							  $cnt	= $db->executeQuery($SQL);
							  
							  if( $cnt > 0 )
							  {
								 $rs_photo	= $db->getResultsetArray();
								  for( $p=0;$p<$cnt;$p++)
								  { 
									$row_photo	= $rs_photo[$p];
									$img		= $row_photo["photo_image"];
									$img_path	= $articleNewPhotosPath."/".$img;
									$img_thumb_path 	= $articleNewPhotosPath."/THUMB_".$img;
									$img_normal_path    = $articleNewPhotosPath."/NORMAL_".$img;
					
									@unlink($img_path);
									@unlink($img_thumb_path);
									@unlink($img_normal_path);
								  }//for
							  }//if
								
							/* end here */
					
							
								@unlink($filePath);
								@unlink($fldArticleThumbPath);
								
								@unlink($videoFilePath);
								@unlink($videoArticleThumbPath);
								
								@unlink($video);
								
								@unlink($ppt);
								
								@unlink($song);
								
								@unlink($flash);
									
						}//for
					}
				$db->executeQuery("DELETE FROM article_master WHERE user_id IN($user_id) AND user_type='expert'");
				$db->executeQuery("DELETE FROM expert_master WHERE expert_id IN($user_id)");
			} 
		
		}
		
		
		function delete_admin_article($user_id)
		{
			global $db;
				$sqlArticle				= "SELECT * FROM article_master WHERE user_id IN($user_id) AND user_type = 'admin'";
				$cntArticle				= $db->executeQuery($sqlArticle);
					
					if( $cntArticle	 > 0 )
					{
						$ArticleRs	= $db->getResultsetArray();
						
						for($u=0; $u < $cntArticle ; $u++)
						{
							$ArticleRow			= $ArticleRs[$u];
							$ArticleId		    = $ArticleRow["article_id"];
							
							$DeleteArticle		  = $db->FindOtherValue("article_master","article_id",$ArticleId,"article_img");
							$filePath			  = $articlePhotoPath."/AR_".$ArticleId."_".$DeleteArticle;
							$fldArticleThumbPath  = $articlePhotoPath."/THUMB_AR_".$ArticleId."_".$DeleteArticle;
							
							/* for video img */ 
							$DeleteArticle		      = $db->FindOtherValue("article_master","article_id",$ArticleId,"article_vimg");
							$videoFilePath			  = $articlePhotoPath."/AR_V_".$ArticleId."_".$DeleteArticle;
							$videoArticleThumbPath    = $articlePhotoPath."/THUMB_AR_V_".$ArticleId."_".$DeleteArticle;
							
							/* for video */
							$DeleteArticle		  = $db->FindOtherValue("article_master","article_id",$ArticleId,"article_video");
							$video				  = $articleVideoPath."/".$DeleteArticle;
							
							if( strlen($DeleteArticle) > 0 )
							{
								$sql	= "UPDATE article_master 
															SET article_video = '',
																article_vimg = ''
															WHERE article_id = ".$ArticleId;
								$db->executeQuery($sql);
							}//
							
							/* for PPT */
							 $DeleteArticle	  = $db->FindOtherValue("article_master","article_id",$ArticleId,"article_ppt");
							 $ppt				  = $adminPPTPath."/".$DeleteArticle;
							 
							 if( strlen( $DeleteArticle) > 0 )
							{
								$sql	= "UPDATE article_master 
															SET article_ppt = ''
															WHERE article_id = ".$ArticleId;
								$db->executeQuery($sql);
							}//
							
							/* for songs */
							$DeleteArticle		  = $db->FindOtherValue("music_master","article_id",$ArticleId,"music_file_name");
							$song				  = $adminSongPath."/".$DeleteArticle;
							
							 if( strlen( $DeleteArticle) > 0 )
							{
								 $sql	= "UPDATE music_master 
															SET music_file_name = ''
															WHERE article_id = ".$ArticleId;
								$db->executeQuery($sql);
							}//
							
							/* for flash */
							$DeleteArticle		  = $db->FindOtherValue("article_master","article_id",$ArticleId,"article_flash");
							$flash				  = $adminFlashPath."/".$DeleteArticle;
							
							if( strlen( $DeleteArticle) > 0 )
							{
								 $sql	= "UPDATE article_master 
															SET article_flash = ''
															WHERE article_id = ".$ArticleId;
								$db->executeQuery($sql);
							}//
							
							/* for photos */ 
							/* add here code to remove images from db. */
							  
							  $SQL  = "SELECT photo_image FROM article_photos_master WHERE article_ref_id =".$ArticleId;
							  $cnt	= $db->executeQuery($SQL);
							  
							  if( $cnt > 0 )
							  {
								 $rs_photo	= $db->getResultsetArray();
								  for( $p=0;$p<$cnt;$p++)
								  { 
									$row_photo	= $rs_photo[$p];
									$img		= $row_photo["photo_image"];
									$img_path	= $articleNewPhotosPath."/".$img;
									$img_thumb_path 	= $articleNewPhotosPath."/THUMB_".$img;
									$img_normal_path    = $articleNewPhotosPath."/NORMAL_".$img;
					
									@unlink($img_path);
									@unlink($img_thumb_path);
									@unlink($img_normal_path);
								  }//for
							  }//if
								
							/* end here */
					
							
								@unlink($filePath);
								@unlink($fldArticleThumbPath);
								
								@unlink($videoFilePath);
								@unlink($videoArticleThumbPath);
								
								@unlink($video);
								
								@unlink($ppt);
								
								@unlink($song);
								
								@unlink($flash);
									
						}//for
					}
				$db->executeQuery("DELETE FROM article_master WHERE user_id IN($user_id) AND user_type='expert'");
		}
		
		
		
		
	function err_chkUniqueText($tblName,$chkfield1,$val,$chkfield2,$val2,$oper,$valText,$db)
	{			
		if(strlen($val) <= 0)	
		{	
			$this->errMsg	    .= "* Please enter " . $valText . ".<br>";
		}
		else
		{					 		 
			if($oper == 0)
			 {
				
				if($db->CheckDup($tblName,$chkfield1,$val) == 1)
					$this->errMsg .= "* The " . $valText . " already taken, Please try with other.<br>";							
			 }
			 else
			  	if($oper == 1)
			  	{				
				 	if($db->CheckDupEx($tblName,$chkfield1,$val,$chkfield2,$val2) == 1)						 
						$this->errMsg .= "* The " . $valText . " already taken, Please try with other.<br>";							
			  	}
		} 
		return $this->errMsg;
	}
	
	
	
	function user_delete_admin_new($mode, $user_id, $post_username = false)
{
	
	global $cache, $config, $dbForum, $user, $auth;
				global $phpbb_root_path, $phpEx;
				
				global $dbForum;
				$message = array( );
				$librium_default_group_id = 2;
				static $phpbb_config;
				static $group_config;
				global $db,$user, $auth, $template, $cache;
				global $config, $phpbb_admin_path, $phpbb_root_path, $phpEx;

	$sql = 'SELECT *
		FROM ' . USERS_TABLE . '
		WHERE user_id = ' . $user_id;
	$result = $dbForum->sql_query($sql);
	$user_row = $dbForum->sql_fetchrow($result);
	$dbForum->sql_freeresult($result);

	if (!$user_row)
	{
		return false;
	}

	$dbForum->sql_transaction('begin');

	// Before we begin, we will remove the reports the user issued.
	$sql = 'SELECT r.post_id, p.topic_id
		FROM ' . REPORTS_TABLE . ' r, ' . POSTS_TABLE . ' p
		WHERE r.user_id = ' . $user_id . '
			AND p.post_id = r.post_id';
	$result = $dbForum->sql_query($sql);

	$report_posts = $report_topics = array();
	while ($row = $dbForum->sql_fetchrow($result))
	{
		$report_posts[] = $row['post_id'];
		$report_topics[] = $row['topic_id'];
	}
	$dbForum->sql_freeresult($result);

	if (sizeof($report_posts))
	{
		$report_posts = array_unique($report_posts);
		$report_topics = array_unique($report_topics);

		// Get a list of topics that still contain reported posts
		$sql = 'SELECT DISTINCT topic_id
			FROM ' . POSTS_TABLE . '
			WHERE ' . $dbForum->sql_in_set('topic_id', $report_topics) . '
				AND post_reported = 1
				AND ' . $dbForum->sql_in_set('post_id', $report_posts, true);
		$result = $dbForum->sql_query($sql);

		$keep_report_topics = array();
		while ($row = $dbForum->sql_fetchrow($result))
		{
			$keep_report_topics[] = $row['topic_id'];
		}
		$dbForum->sql_freeresult($result);

		if (sizeof($keep_report_topics))
		{
			$report_topics = array_diff($report_topics, $keep_report_topics);
		}
		unset($keep_report_topics);

		// Now set the flags back
		$sql = 'UPDATE ' . POSTS_TABLE . '
			SET post_reported = 0
			WHERE ' . $dbForum->sql_in_set('post_id', $report_posts);
		$dbForum->sql_query($sql);

		if (sizeof($report_topics))
		{
			$sql = 'UPDATE ' . TOPICS_TABLE . '
				SET topic_reported = 0
				WHERE ' . $dbForum->sql_in_set('topic_id', $report_topics);
			$dbForum->sql_query($sql);
		}
	}

	// Remove reports
	$dbForum->sql_query('DELETE FROM ' . REPORTS_TABLE . ' WHERE user_id = ' . $user_id);

	if ($user_row['user_avatar'] && $user_row['user_avatar_type'] == AVATAR_UPLOAD)
	{
		avatar_delete('user', $user_row);
	}

	switch ($mode)
	{
		case 'retain':

			if ($post_username === false)
			{
				$post_username = $user->lang['GUEST'];
			}

			// If the user is inactive and newly registered we assume no posts from this user being there...
			if ($user_row['user_type'] == USER_INACTIVE && $user_row['user_inactive_reason'] == INACTIVE_REGISTER && !$user_row['user_posts'])
			{
			}
			else
			{
				$sql = 'UPDATE ' . FORUMS_TABLE . '
					SET forum_last_poster_id = ' . ANONYMOUS . ", forum_last_poster_name = '" . $dbForum->sql_escape($post_username) . "', forum_last_poster_colour = ''
					WHERE forum_last_poster_id = $user_id";
				$dbForum->sql_query($sql);

				$sql = 'UPDATE ' . POSTS_TABLE . '
					SET poster_id = ' . ANONYMOUS . ", post_username = '" . $dbForum->sql_escape($post_username) . "'
					WHERE poster_id = $user_id";
				$dbForum->sql_query($sql);

				$sql = 'UPDATE ' . POSTS_TABLE . '
					SET post_edit_user = ' . ANONYMOUS . "
					WHERE post_edit_user = $user_id";
				$dbForum->sql_query($sql);

				$sql = 'UPDATE ' . TOPICS_TABLE . '
					SET topic_poster = ' . ANONYMOUS . ", topic_first_poster_name = '" . $dbForum->sql_escape($post_username) . "', topic_first_poster_colour = ''
					WHERE topic_poster = $user_id";
				$dbForum->sql_query($sql);

				$sql = 'UPDATE ' . TOPICS_TABLE . '
					SET topic_last_poster_id = ' . ANONYMOUS . ", topic_last_poster_name = '" . $dbForum->sql_escape($post_username) . "', topic_last_poster_colour = ''
					WHERE topic_last_poster_id = $user_id";
				$dbForum->sql_query($sql);

				// Since we change every post by this author, we need to count this amount towards the anonymous user

				// Update the post count for the anonymous user
				if ($user_row['user_posts'])
				{
					$sql = 'UPDATE ' . USERS_TABLE . '
						SET user_posts = user_posts + ' . $user_row['user_posts'] . '
						WHERE user_id = ' . ANONYMOUS;
					$dbForum->sql_query($sql);
				}
			}
		break;

		case 'remove':

			if (!function_exists('delete_posts'))
			{
				include($phpbb_root_path . 'includes/functions_admin.' . $phpEx);
			}

			$sql = 'SELECT topic_id, COUNT(post_id) AS total_posts
				FROM ' . POSTS_TABLE . "
				WHERE poster_id = $user_id
				GROUP BY topic_id";
			$result = $dbForum->sql_query($sql);

			$topic_id_ary = array();
			while ($row = $dbForum->sql_fetchrow($result))
			{
				$topic_id_ary[$row['topic_id']] = $row['total_posts'];
			}
			$dbForum->sql_freeresult($result);

			if (sizeof($topic_id_ary))
			{
				$sql = 'SELECT topic_id, topic_replies, topic_replies_real
					FROM ' . TOPICS_TABLE . '
					WHERE ' . $dbForum->sql_in_set('topic_id', array_keys($topic_id_ary));
				$result = $dbForum->sql_query($sql);

				$del_topic_ary = array();
				while ($row = $dbForum->sql_fetchrow($result))
				{
					if (max($row['topic_replies'], $row['topic_replies_real']) + 1 == $topic_id_ary[$row['topic_id']])
					{
						$del_topic_ary[] = $row['topic_id'];
					}
				}
				$dbForum->sql_freeresult($result);

				if (sizeof($del_topic_ary))
				{
					$sql = 'DELETE FROM ' . TOPICS_TABLE . '
						WHERE ' . $dbForum->sql_in_set('topic_id', $del_topic_ary);
					$dbForum->sql_query($sql);
				}
			}

			// Delete posts, attachments, etc.
			delete_posts('poster_id', $user_id);

		break;
	}

	$table_ary = array(USERS_TABLE, USER_GROUP_TABLE, TOPICS_WATCH_TABLE, FORUMS_WATCH_TABLE, ACL_USERS_TABLE, TOPICS_TRACK_TABLE, TOPICS_POSTED_TABLE, FORUMS_TRACK_TABLE, PROFILE_FIELDS_DATA_TABLE, MODERATOR_CACHE_TABLE);

	foreach ($table_ary as $table)
	{
		$sql = "DELETE FROM $table
			WHERE user_id = $user_id";
		$dbForum->sql_query($sql);
	}

	$cache->destroy('sql', MODERATOR_CACHE_TABLE);

	// Remove any undelivered mails...
	$sql = 'SELECT msg_id, user_id
		FROM ' . PRIVMSGS_TO_TABLE . '
		WHERE author_id = ' . $user_id . '
			AND folder_id = ' . PRIVMSGS_NO_BOX;
	$result = $dbForum->sql_query($sql);

	$undelivered_msg = $undelivered_user = array();
	while ($row = $dbForum->sql_fetchrow($result))
	{
		$undelivered_msg[] = $row['msg_id'];
		$undelivered_user[$row['user_id']][] = true;
	}
	$dbForum->sql_freeresult($result);

	if (sizeof($undelivered_msg))
	{
		$sql = 'DELETE FROM ' . PRIVMSGS_TABLE . '
			WHERE ' . $dbForum->sql_in_set('msg_id', $undelivered_msg);
		$dbForum->sql_query($sql);
	}

	$sql = 'DELETE FROM ' . PRIVMSGS_TO_TABLE . '
		WHERE author_id = ' . $user_id . '
			AND folder_id = ' . PRIVMSGS_NO_BOX;
	$dbForum->sql_query($sql);

	// Delete all to-information
	$sql = 'DELETE FROM ' . PRIVMSGS_TO_TABLE . '
		WHERE user_id = ' . $user_id;
	$dbForum->sql_query($sql);

	// Set the remaining author id to anonymous - this way users are still able to read messages from users being removed
	$sql = 'UPDATE ' . PRIVMSGS_TO_TABLE . '
		SET author_id = ' . ANONYMOUS . '
		WHERE author_id = ' . $user_id;
	$dbForum->sql_query($sql);

	$sql = 'UPDATE ' . PRIVMSGS_TABLE . '
		SET author_id = ' . ANONYMOUS . '
		WHERE author_id = ' . $user_id;
	$dbForum->sql_query($sql);

	foreach ($undelivered_user as $_user_id => $ary)
	{
		if ($_user_id == $user_id)
		{
			continue;
		}

		$sql = 'UPDATE ' . USERS_TABLE . '
			SET user_new_privmsg = user_new_privmsg - ' . sizeof($ary) . ',
				user_unread_privmsg = user_unread_privmsg - ' . sizeof($ary) . '
			WHERE user_id = ' . $_user_id;
		$dbForum->sql_query($sql);
	}

	// Reset newest user info if appropriate
	if ($config['newest_user_id'] == $user_id)
	{
		update_last_username();
	}

	// Decrement number of users if this user is active
	if ($user_row['user_type'] != USER_INACTIVE && $user_row['user_type'] != USER_IGNORE)
	{
		set_config('num_users', $config['num_users'] - 1, true);
	}

	$dbForum->sql_transaction('commit');

	return false;
}


   
      function phpbb_synchronize_user_admin( $UserID,$Username, $Email, $Password, $IsActive )
   {
   
		
		
		//$user->session_begin();
	  global $dbForum;
	  $message = array( );
	  $librium_default_group_id = 2;
	  static $phpbb_config;
	  static $group_config;
	  
	  $phpbb_config[ "default_lang"]	= "";
	  $config['rand_seed_last_update']  = "";
	  
	  if ( is_array( $phpbb_config ) == false )
	  {
		 $phpbb_config = array( );
		 $query = "SELECT config_name, config_value FROM phpbb_config";
		 // commented due 
		 $ident = $dbForum->sql_query($query); //mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
		 while ( $myrow = @mysql_fetch_assoc( $ident ) )
		 {
			$phpbb_config[ $myrow[ "config_name" ] ] = $myrow[ "config_value" ];
		 }
	  }
	  if ( is_array( $group_config ) == false )
	  {
		 $query = sprintf( "SELECT group_id, group_colour, group_rank, group_avatar, group_avatar_type, group_avatar_width, group_avatar_height FROM phpbb_groups WHERE group_id = %d", $librium_default_group_id );
		 $ident = $dbForum->sql_query($query); //mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
		 $group_config = @mysql_fetch_assoc( $ident );
	  }
	  $bbuser_newid = $UserID + 1000;
	  $bbuser_email = strtolower( $Email );
	  $bbuser_passw = $Password;
	  $bbuser_class = $IsActive ? 0 : 1;
	  $bbuser_login = $bbuser_email;
	  $bbuser_login = explode( "@", $bbuser_login );
	  $bbuser_login = $bbuser_login[ 0 ];
	  $bbuser_login = preg_replace( "/[^a-z0-9]/i", "", $bbuser_login );
	  $bbuser_login = $bbuser_login . $bbuser_newid;
	  $query = sprintf( "SELECT username, username_clean, user_type FROM phpbb_users WHERE user_id = %d", $bbuser_newid );
	  $ident = $dbForum->sql_query($query); //mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
	  $myrow = @mysql_fetch_assoc( $ident );
	  if ( $myrow === false )
	  {
		 $dataarray = array( );
		 $dataarray[ "user_id"                  ] = $bbuser_newid;
		 $dataarray[ "user_email"               ] = $bbuser_email;
		 $dataarray[ "user_email_hash"          ] = crc32( $bbuser_email ) . strlen( $bbuser_email );
		 $dataarray[ "user_password"            ] = phpbb_hash($bbuser_passw);
		 $dataarray[ "username"                 ] = $Username;
		 $dataarray[ "username_clean"           ] = $Username;
		 $dataarray[ "group_id"                 ] = $librium_default_group_id;
		 $dataarray[ "user_type"                ] = 0;
		 $dataarray[ "user_colour"              ] = $group_config[ "group_colour"];
		 $dataarray[ "user_rank"                ] = 0;
		 $dataarray[ "user_avatar"              ] = $group_config[ "group_avatar"];
		 $dataarray[ "user_avatar_type"         ] = 0;
		 $dataarray[ "user_avatar_width"        ] = 0;
		 $dataarray[ "user_avatar_height"       ] = 0;
		 $dataarray[ "user_lang"                ] = $phpbb_config[ "default_lang"];
		 $dataarray[ "user_timezone"            ] = "0.00";
		 $dataarray[ "user_dst"                 ] = 0;
		 $dataarray[ "user_dateformat"          ] = "D M d, Y g:i a";
		 $dataarray[ "user_style"               ] = 2;
		 $dataarray[ "user_actkey"              ] = "";
		 $dataarray[ "user_allow_massemail"     ] = 1;
		 $dataarray[ "user_allow_pm"            ] = 1;
		 $dataarray[ "user_allow_viewemail"     ] = 1;
		 $dataarray[ "user_allow_viewonline"    ] = 1;
		 $dataarray[ "user_emailtime"           ] = 0;
		 $dataarray[ "user_full_folder"         ] = -3;
		 $dataarray[ "user_inactive_reason"     ] = $bbuser_class ? 3 : 0;
		 $dataarray[ "user_inactive_time"       ] = $bbuser_class ? time( ) : 0;
		 $dataarray[ "user_interests"           ] = "";
		 $dataarray[ "user_ip"                  ] = $_SERVER['REMOTE_ADDR'];
		 $dataarray[ "user_last_privmsg"        ] = 0;
		 $dataarray[ "user_lastmark"            ] = time( );
		 $dataarray[ "user_lastpage"            ] = "";
		 $dataarray[ "user_lastpost_time"       ] = 0;
		 $dataarray[ "user_lastvisit"           ] = 0;
		 $dataarray[ "user_message_rules"       ] = 0;
		 $dataarray[ "user_new_privmsg"         ] = 1;
		 $dataarray[ "user_notify"              ] = 1;
		 $dataarray[ "user_notify_pm"           ] = 1;
		 $dataarray[ "user_notify_type"         ] = 0;
		 $dataarray[ "user_occ"                 ] = "";
		 $dataarray[ "user_options"             ] = 895;
		 $dataarray[ "user_pass_convert"        ] = 0;
		 $dataarray[ "user_permissions"         ] = "";
		 $dataarray[ "user_posts"               ] = 0;
		 $dataarray[ "user_sig"                 ] = "";
		 $dataarray[ "user_sig_bbcode_bitfield" ] = "";
		 $dataarray[ "user_sig_bbcode_uid"      ] = "";
		 $dataarray[ "user_unread_privmsg"      ] = 1;
		 $dataarray[ "user_regdate"             ] = time( );
		 $dataarray[ "user_passchg"             ] = time( );
		 $dataarray[ "user_form_salt"           ] = substr( md5( microtime( ) ), 4, 16 );
		 $query = "";
		
		
		 foreach ( $dataarray as $column => $value )
		 {
			if ( $query == "" )
			{
			    $query .= "INSERT phpbb_users SET ";
			}
			else
			{
			   $query .= ", ";
			}
			$query .= sprintf( "%s = '%s'", $column, addslashes( $value ) );
		 }
		 $ident = $dbForum->sql_query($query);// mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
		// $message[ ] = sprintf( "Created user <b>%s</b>", rtext( $bbuser_login ) );
		 $query = sprintf( "
			INSERT INTO phpbb_user_group
			( group_id, user_id, group_leader, user_pending )
			VALUES
			( %d, %d, 0, 0 )
			", $librium_default_group_id, $bbuser_newid
		 );
		 $ident = $dbForum->sql_query($query); //mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
		 $message[ ] = "&rsaquo; Assigned user to registered users group";
	  }
	  else
	  {
		 $dataarray = array( );
		 $dataarray[ "user_email"      ] = $bbuser_email;
		 $dataarray[ "user_email_hash" ] = crc32( $bbuser_email ) . strlen( $bbuser_email );
		 $dataarray[ "user_password"   ] = md5( $bbuser_passw );
		 if ( $myrow[ "username" ] == "" || $myrow[ "username_clean" ] == "" )
		 {
			$dataarray[ "username"       ] = $Username;
			$dataarray[ "username_clean" ] = $Username;
		 }
		 if ( $myrow[ "user_type" ] != $bbuser_class )
		 {
			$dataarray[ "user_type"            ] = $bbuser_class;
			$dataarray[ "user_inactive_reason" ] = $bbuser_class ? 3 : 0;
			$dataarray[ "user_inactive_time"   ] = $bbuser_class ? time( ) : 0;
		 }
		 $query = "";
		 foreach ( $dataarray as $column => $value )
		 {
			if ( $query == "" )
			{
			   $query .= "UPDATE phpbb_users SET ";
			}
			else
			{
			   $query .= ", ";
			}
			$query .= sprintf( "%s = '%s'", $column, addslashes( $value ) );
		 }
		 $query .= sprintf( " WHERE user_id = %d", $bbuser_newid );
		 $ident = $dbForum->sql_query($query); //mysql_query( $query, $dbForum ) or die( mysql_error( $dbForum ) );
		 if ( @mysql_affected_rows( $dbForum->db_connect_id ) )
		 {
			$message[ ] = sprintf( "Updated user <b>%s</b>", rtext( $bbuser_login ) );
		 }
	  }
	  return implode( "<br>\n", $message );
   }
   
function readable_time($timestamp, $num_times = 2)
{
    //this returns human readable time when it was uploaded (array in seconds)
    $times = array(31536000 => 'year', 2592000 => 'month',  604800 => 'week', 86400 => 'day', 3600 => 'hour', 60 => 'minute', 1 => 'second');
    $now = time();

        /* Incorporates fix by Waylon */
        $secs = $now - $timestamp;
        //Fix so that something is always displayed
        if ($secs == 0) {
               $secs = 1;
        }
        /* /Waylon */

    $count = 0;
    $time = '';

    foreach ($times AS $key => $value)
    {
        if ($secs >= $key)
        {
            //time found
            $s = '';
            $time .= floor($secs / $key);

            if ((floor($secs / $key) != 1))
                $s = 's';

            $time .= ' ' . $value . $s;
            $count++;
            $secs = $secs % $key;
           
            if ($count > $num_times - 1 || $secs == 0)
                break;
            else
                $time .= ', ';
        }
    }

    return $time;
}

 function just_clean($string)  
 {  

	 // Remove all remaining other unknown characters 
	 $string = str_replace(" ","_",$string); 
	 $string = preg_replace('/[^a-zA-Z0-9\-_]/', '', $string);  
	 $string = preg_replace('/[^a-zA-Z0-9\-_]/', '', $string);  
	 $string = preg_replace('/^[\-]+/', '', $string);  
	 $string = preg_replace('/[\-]+$/', '', $string);  
	 $string = preg_replace('/[\-]{2,}/', '', $string);  
	 
	 return $string;  
 }  
 
 function ByteSize($bytes) 
 {
    $size = $bytes / 1024;
    if($size < 1024)
        {
        $size = number_format($size, 2);
        $size .= ' KB';
        } 
    else 
        {
        if($size / 1024 < 1024) 
            {
            $size = number_format($size / 1024, 2);
            $size .= ' MB';
            } 
        else if ($size / 1024 / 1024 < 1024)  
            {
            $size = number_format($size / 1024 / 1024, 2);
            $size .= ' GB';
            } 
        }
    return $size;
 }
 
 function Check_privacy($tmp_id,$tmp_user_id,$tmp_owner_id)
 {
 	global $db;
	$sqlPrivacy 	= "SELECT * FROM privacy_master WHERE privacy_id = $tmp_id";
	$resPrivacy		= $db->executeQuery($sqlPrivacy);
	if($resPrivacy > 0)
	{
		$resPrivacyRow		= $db->getResultSetArray();
		$rowPrivacyRow		= $resPrivacyRow[0];
		$Privacy			= $rowPrivacyRow['privacy_title'];
		if($Privacy == "Everyone")
		{
			return "yes";	
		}
		elseif($Privacy == "Private")
		{
			if($tmp_user_id == $tmp_owner_id)
			{
				return "yes";
			}
			else
			{
				return "no";
			}
		}
		elseif($Privacy == "Friends")
		{
			$sql			= "SELECT * FROM user_friend_master WHERE (UserId = $tmp_user_id AND UserFriendId = $tmp_owner_id) OR (UserId = $tmp_owner_id AND UserFriendId = $tmp_user_id) AND is_accept_request = 'Y'";
			$rsCnt			= $db->executeQuery($sql);	
			if($rsCnt > 0)
			{
				return "yes";
			}
			else
			{
				return "no";
			}
		}
	  return $Privacy;
	}
	else
	{
		return $Privacy	= "";
	}
 
 
 }
 
 function Privacy_Setting_List($tmp_setting_id)
	{
		global $db;
		
		$sql			= "SELECT * FROM privacy_master WHERE is_active='Y'";
		$rsCnt			= $db->executeQuery($sql);
		if ($rsCnt > 0)
		{
			$rsPrivacy			= $db->getResultSetArray();
			for ($i=0;$i<$rsCnt;$i++)
			{	
				$rowPrivacy		= $rsPrivacy[$i];
				
				$PrivacyId		= $rowPrivacy['privacy_id'];
				$PrivacyName	= $rowPrivacy['privacy_title'];
				
				echo "<option value=\"{$PrivacyId}\"";
				if($tmp_setting_id == $PrivacyId)
					{
						echo " selected ";
					}
				echo ">{$PrivacyName}</option>";
			}
		}
	}	
	
function privacy_setting_name($tmp_privacy_setting_id)
{
	global $db;
	$sql				= "SELECT * FROM privacy_master WHERE privacy_id = {$tmp_privacy_setting_id}";
	$rsCnt				= $db->executeQuery($sql);
	if($rsCnt>0)
	{
		$rsPrivacy		= $db->getResultSetArray();
		$rowPrivacy		= $rsPrivacy[0];
		$PrivacyName	= $rowPrivacy['privacy_title'];
		return $PrivacyName;
	}
	else
	{
		return "";
	}
}

function send_notification($tmp_user_id,$tmp_notification_id,$tmp_user_name,$tmp_subject,$tmp_body)
{
	global $db;
	$not_type_emailarr							= array();
	$not_type_rssarr							= array();
	$not_type_webmailarr						= array();
	//$sql										= "SELECT * FROM user_friend_master WHERE UserId = {$tmp_user_id} AND is_block = 'N' AND is_accept_request = 'Y'";
	$sql										= "SELECT UserFriendId,user_name,first_name,last_name,user_email 
														FROM user_friend_master LEFT JOIN user_master ON UserFriendId = user_id 
												   WHERE UserId = {$tmp_user_id} AND is_block = 'N' AND is_accept_request = 'Y'";
	
	$rsCnt										= $db->executeQuery($sql);
	if($rsCnt>0)
	{
		$rs										= $db->getResultSetArray();
		
		for($i=0;$i<$rsCnt;$i++)
		{
			$row								= $rs[$i];
			$friend_id							= $row['UserFriendId'];
			$to_email							= $row['user_email'];
			$sql								= "SELECT * FROM user_notification_master WHERE User_id = {$friend_id}";
			
			$rsNotCnt							= $db->executeQuery($sql);
			if($rsNotCnt>0)
			{
				$rsNot							= $db->getResultSetArray();
				$rowNot							= $rsNot[0];
				$not_type_email					= $rowNot['notification_email_ids'];
				//if(trim($not_type_email)<>"")
				//{
				//	$not_type_emailarr			= explode("#",$not_type_email);
				//}
				$not_type_rss					= $rowNot['notification_rss_ids'];
				//if(trim($not_type_rssarr)<>"")
				//{
				//	$not_type_rssarr			= explode("#",$not_type_rss);
				//}
				$not_type_webmail				= $rowNot['notification_onsite_ids'];
				//if(trim($not_type_webmail)<>"")
				//{
				//	$not_type_webmailarr		= explode("#",$not_type_webmail);
				//}
				
				if(strpos("#".$not_type_email."#","#".$tmp_notification_id."#") !== FALSE)
					{
						send_notification_mail($to_email,$tmp_subject,$tmp_body);
					}
					if(strpos("#".$not_type_webmail."#","#".$tmp_notification_id."#") !== FALSE)
					{	
						send_notification_webmail($tmp_user_id,$friend_id,$tmp_subject,$tmp_body);
					}
			}
			//echo "****".$to_email;
			
			
		//	if(str
		}
		//die($tmp_notification_id."--------".$not_type_email."----".$not_type_webmail);
	}
}


function send_group_notification($tmp_user_id,$tmp_group_id,$tmp_notification_id,$tmp_user_name,$tmp_subject,$tmp_body)
{
	global $db;
	$not_type_emailarr							= array();
	$not_type_rssarr							= array();
	$not_type_webmailarr						= array();
	//$sql										= "SELECT * FROM user_friend_master WHERE UserId = {$tmp_user_id} AND is_block = 'N' AND is_accept_request = 'Y'";
	$sql										= "SELECT user_id,user_name,first_name,last_name,user_email 
													FROM group_members LEFT JOIN user_master ON UserRefId = user_id 
												   WHERE GroupRefId = $tmp_group_id";
	
	$rsCnt										= $db->executeQuery($sql);
	if($rsCnt>0)
	{
		$rs										= $db->getResultSetArray();
		
		for($i=0;$i<$rsCnt;$i++)
		{
			$row								= $rs[$i];
			$friend_id							= $row['user_id'];
			$to_email							= $row['user_email'];
			$sql								= "SELECT * FROM user_notification_master WHERE User_id = {$tmp_user_id}";
			
			$rsNotCnt							= $db->executeQuery($sql);
			if($rsNotCnt>0)
			{
				$rsNot							= $db->getResultSetArray();
				$rowNot							= $rsNot[0];
			
				$not_type_email					= $rowNot['notification_email_ids'];
				//if(trim($not_type_email)<>"")
				//{
				//	$not_type_emailarr			= explode("#",$not_type_email);
				//}
				$not_type_rss					= $rowNot['notification_rss_ids'];
				//if(trim($not_type_rssarr)<>"")
				//{
				//	$not_type_rssarr			= explode("#",$not_type_rss);
				//}
				$not_type_webmail				= $rowNot['notification_onsite_ids'];
				//if(trim($not_type_webmail)<>"")
				//{
				//	$not_type_webmailarr		= explode("#",$not_type_webmail);
				//}
				
				if(strpos("#".$not_type_email."#","#".$tmp_notification_id."#") !== FALSE)
				{
					send_notification_mail($to_email,$tmp_subject,$tmp_body);
				}
				if(strpos("#".$not_type_webmail."#","#".$tmp_notification_id."#") !== FALSE)
				{	
					send_notification_webmail($tmp_user_id,$friend_id,$tmp_subject,$tmp_body);
				}
			}
			//echo "****".$to_email;
			
			
		//	if(str)
		}
	}
}

function send_invitation($tmp_user_id,$tmp_user_name,$tmp_subject,$tmp_body,$receiver_user_id)
{
	send_notification_webmail($tmp_user_id,$receiver_user_id,$tmp_subject,$tmp_body);
}

function send_notification_grp_blog($tmp_user_id,$tmp_notification_id,$tmp_user_name,$tmp_subject,$tmp_body,$receiver_user_id,$etitle)
{
	global $db;
	
	$not_type_emailarr							= array();
	$not_type_rssarr							= array();
	$not_type_webmailarr						= array();
	$not_type_email								= "";
	$not_type_webmail							= "";
	 
	//$sql										= "SELECT * FROM user_friend_master WHERE UserId = {$tmp_user_id} AND is_block = 'N' AND is_accept_request = 'Y'";
	$sql										= "SELECT user_id,user_name,first_name,last_name,user_email 
															FROM user_master 
												   		WHERE user_id 	= $receiver_user_id ";
	
	$rsCnt										= $db->executeQuery($sql);
	if($rsCnt>0)
	{
		$rs										= $db->getResultSetArray();
		$row									= $rs[0];
		$friend_id								= $row['user_id'];
		$to_email								= $row['user_email'];
		$to_username							= $row['user_name'];
		$sql									= "SELECT * FROM user_notification_master WHERE User_id = {$friend_id}";
			
		$rsNotCnt								= $db->executeQuery($sql);
			if($rsNotCnt>0)
			{
				$rsNot							= $db->getResultSetArray();
				$rowNot							= $rsNot[0];
				$not_type_email					= $rowNot['notification_email_ids'];
				//if(trim($not_type_email)<>"")
				//{
				//	$not_type_emailarr			= explode("#",$not_type_email);
				//}
				$not_type_rss					= $rowNot['notification_rss_ids'];
				//if(trim($not_type_rssarr)<>"")
				//{
				//	$not_type_rssarr			= explode("#",$not_type_rss);
				//}
				$not_type_webmail				= $rowNot['notification_onsite_ids'];
				//if(trim($not_type_webmail)<>"")
				//{
				//	$not_type_webmailarr		= explode("#",$not_type_webmail);
				//}
			}
		
			
			if(strpos("#".$not_type_email."#","#".$tmp_notification_id."#") !== FALSE)
			{
				//echo "****".$to_email.$tmp_body;
				send_site_notification($tmp_user_id,$tmp_notification_id,$tmp_user_name,$tmp_subject,$tmp_body,$etitle);
			}
			if(strpos("#".$not_type_webmail."#","#".$tmp_notification_id."#") !== FALSE)
			{	
				//echo "****".$to_email."zxzxzx".$tmp_user_id.$tmp_body;
				send_notification_webmail($tmp_user_id,$friend_id,$tmp_subject,$tmp_body);
			}
		//	if(str
		}
}

function notification_type($tmp_user_id)
{
	global $db;
	
}

function send_notification_mail($tmp_to_email,$tmp_subject,$tmp_body,$toUserName,$frmUserName)
{
	global $db;
	global $dir,$siteTitle,$siteURL;
	$selTemplate							= "SELECT * FROM etemplate_master WHERE etemplate_title = 'Email-Notification'";
	$tCnt									= $db->executeQuery($selTemplate);
	
	if( $tCnt > 0 )
	{
		$tRs								= $db->getResultsetArray();
		$tRow								= $tRs[0];
		
		$eTmpHeader							= $tRow["etemplate_header"];
		$eTmpHeader							= str_replace("&lt;%USERNAME%&gt;",$frmUserName,$eTmpHeader);
		$eTmpFooter							= $tRow["etemplate_footer"];
		$eTmpBgColor						= $tRow["etemplate_bgcolor"];
		$eTmpHcolor							= $tRow["etemplate_color"];
		$eSubject							= $tRow["etemplate_subject"];
		$eSubject							= str_replace("&lt;%SITEUSERNAME%&gt;",$frmUserName,$eSubject);
		$fromEmail							= $tRow["from_email"];
		$title								= $tRow["etemplate_title"];
		$eEmailBody							= $tRow["etemplate_body"];
		$eEmailBody							= str_replace("&lt;%SITEURL%&gt;",$siteURL,$eEmailBody);
		$eEmailBody							= str_replace("&lt;%SITENAME%&gt;",$siteTitle,$eEmailBody);
		
		$eTmpFooter							= str_replace("&lt;%SITEURL%&gt;",$siteURL,$eTmpFooter);
		$eTmpFooter							= str_replace("&lt;%SITENAME%&gt;",$siteTitle,$eTmpFooter);

		$currDate							= date('dS M, Y');	
		$eDynamicContents					= $tmp_body;
		
		$dir1      							= dirname($dir); 												
		$fpRead							 	= fopen($dir1 . "/template/email.tpl","r+");
		$content						 	= fread($fpRead,filesize($dir1 . "/template/email.tpl"));
						
		$content							= str_replace("<%INC_EMAIL_HEADER_COLOR%>",$eTmpHcolor,$content);
		$content							= str_replace("<%INC_EMAIL_BG_COLOR%>",$eTmpBgColor,$content);
		$content							= str_replace("<%INC_EMAIL_BODY_TITLE%>",html_entity_decode($title),$content);
		$content							= str_replace("<%INC_EMAIL_BGCOLOR%>",html_entity_decode($eTmpFooter),$content);
		$content							= str_replace("<%INC_EMAIL_DATE%>",$currDate,$content);
		$content							= str_replace("<%INC_EMAIL_HEADER%>",html_entity_decode($eTmpHeader),$content);
		$content							= str_replace("<%INC_DYNAMIC_CONTENT%>",html_entity_decode($eDynamicContents),$content);
		$content							= str_replace("<%INC_EMAIL_FOOTER%>",html_entity_decode($eTmpFooter),$content);
		$content							= str_replace("<%INC_SITE_NAME%>",$siteTitle,$content);
		$content							= str_replace("<%INC_SITE_URL%>",$siteURL,$content);
		$content							= str_replace("<%INC_DATE%>",date('Y'),$content);
		$content							= str_replace("<%INC_BODY_CONTENT%>",html_entity_decode($eEmailBody),$content);
		$content							= str_replace("<%INC_ARTICLE%>",'',$content);	
 
		$fldSubject							= $eSubject;
		$toEmail							= $tmp_to_email;
		SendAutoMail_PHP($toEmail,$fromEmail,$fldSubject,$content);	
		$errMsg	= "Article forword successfully !!!";
		$ObjArticle->part	= 1;
	}//if
}
 
function send_notification_webmail($tmp_user_id,$tmp_receiver_id,$tmp_subject,$tmp_body)
{
	global $db;
	$tmp_body								= addslash($tmp_body);
	$sql									= "INSERT INTO user_messages_master (SenderId,SenderType,ReceiverId,RecieverType,MessageSubject,MessageBody,Is_StandardMsg,AddedOn,LastModifiedOn) 
												VALUES ({$tmp_user_id},'U',{$tmp_receiver_id},'U','{$tmp_subject}','{$tmp_body}','Y',now(),now())";
	$db->executeQuery($sql);
}



/*function send_site_notification($tmp_user_id,$tmp_notification_id,$tmp_user_name,$tmp_subject,$tmp_body,$eTitle)
{

	global $db;
	$not_type_emailarr							= array();
	$not_type_rssarr							= array();
	$not_type_webmailarr						= array();
	$sql										= "SELECT UserFriendId,user_name,first_name,last_name,user_email 
														FROM user_friend_master LEFT JOIN user_master ON UserFriendId = user_id 
												   WHERE UserId = {$tmp_user_id} AND is_block = 'N' AND is_accept_request = 'Y'";
	$rsCnt										= $db->executeQuery($sql);
	
	
	if($rsCnt>0)
	{
		$rs										= $db->getResultSetArray();
		for($i=0;$i<$rsCnt;$i++)
		{
			$row								= $rs[$i];
			$friend_id							= $row['UserFriendId'];
			$to_email							= $row['user_email'];
			$emailToUsername					= $row['user_name'];
			$emailFrmUsername					= $tmp_user_name;
			
			$sql								= "SELECT * FROM user_notification_master WHERE User_id = {$friend_id}";
			
			$rsNotCnt							= $db->executeQuery($sql);
			if($rsNotCnt>0)
			{
				$rsNot							= $db->getResultSetArray();
				$rowNot							= $rsNot[0];
				$not_type_email					= $rowNot['notification_email_ids'];
				$not_type_rss					= $rowNot['notification_rss_ids'];
				$not_type_webmail				= $rowNot['notification_onsite_ids'];
				
				if(strpos("#".$not_type_email."#","#".$tmp_notification_id."#") !== FALSE)
				{
					send_site_notification_mail($to_email,$tmp_subject,$tmp_body,$eTitle,$emailToUsername,$emailFrmUsername);
				}//if(strpos("#"
				if(strpos("#".$not_type_webmail."#","#".$tmp_notification_id."#") !== FALSE)
				{	
					send_notification_webmail($tmp_user_id,$friend_id,$tmp_subject,$tmp_body);
				}//if(strpos("#"
			}//if($rsNotCnt>0)
		}//for($i=0;$i<$rsCnt;$i++)
	}//if($rsCnt>0)
}*/

/******************** function to insert record in database for updates ********************************/

function send_site_notification($tmp_user_id,$tmp_notification_id,$tmp_user_name,$tmp_subject,$tmp_body,$eTitle)
{

	global $db;
	$user_posted_id				= $tmp_user_id;
	$user_posted_name			= $tmp_user_name;
	$notification_module_name	= get_notification_name($tmp_notification_id);
	$updates_title				= $tmp_body;
	
	$sql						= "INSERT INTO updates_notify_master(updates_user_ref_id,updates_added_user_name,module_id,updates_module_name,updates_title,added_on)
												VALUES('$user_posted_id','$user_posted_name','$tmp_notification_id','$notification_module_name','".addslashes_htmlentities($updates_title)."',now())";
									
	$rsCnt						= $db->executeQuery($sql);
	
}

function send_site_notification_invitation($tmp_user_id,$tmp_notification_id,$tmp_user_name,$tmp_subject,$tmp_body,$eTitle,$recieve_id)
{

	global $db;
	$user_posted_id				= $tmp_user_id;
	$user_posted_name			= $tmp_user_name;
	$notification_module_name	= get_notification_name($tmp_notification_id);
	$updates_title				= $tmp_body;
	
	$sql						= "INSERT INTO updates_notify_master(updates_user_ref_id,updates_added_user_name,user_recieve_invitation,module_id,updates_module_name,updates_title,added_on)
												VALUES('$user_posted_id','$user_posted_name','$recieve_id','$tmp_notification_id','$notification_module_name','".addslashes_htmlentities($updates_title)."',now())";
									
	$rsCnt						= $db->executeQuery($sql);
	
}

function get_notification_name($tmp_id)
{
	global $db;
	$sql 						= "SELECT * from notification_master where notification_id = '$tmp_id'";
	$rsCnt						= $db->executeQuery($sql);
	if($rsCnt > 0)
	{
		$rs						= $db->getResultSetArray();	
		$row					= $rs[0];
		$notification_name		= $row["notification_name"];
	}
	return $notification_name;
}
/********************* end here *************************************************************************/

function send_site_notification_to_all_users($tmp_user_id,$tmp_notification_id,$tmp_user_name,$tmp_subject,$tmp_body,$eTitle)
{
	global $db;
	$not_type_emailarr							= array();
	$not_type_rssarr							= array();
	$not_type_webmailarr						= array();
 	$sql										= "SELECT user_id,user_name,first_name,last_name,user_email 
														FROM user_master 
												   WHERE user_id != {$tmp_user_id} AND is_active='Y' ";
	$rsCnt										= $db->executeQuery($sql);
	if($rsCnt>0)
	{
		$rs										= $db->getResultSetArray();
		for($i=0;$i<$rsCnt;$i++)
		{
			$row								= $rs[$i];
			$user_id							= $row['user_id'];
			$to_email							= $row['user_email'];
			$emailToUsername					= $row['user_name'];
			$emailFrmUsername					= $tmp_user_name;
			
			$sql								= "SELECT * FROM user_notification_master WHERE User_id = {$user_id}";
			$rsNotCnt							= $db->executeQuery($sql);
			
			if($rsNotCnt>0)
			{
				$rsNot							= $db->getResultSetArray();
				$rowNot							= $rsNot[0];
				$not_type_email					= $rowNot['notification_email_ids'];
				$not_type_rss					= $rowNot['notification_rss_ids'];
				$not_type_webmail				= $rowNot['notification_onsite_ids'];
				
				if(strpos("#".$not_type_email."#","#".$tmp_notification_id."#") !== FALSE)
				{
					send_site_notification_mail($to_email,$tmp_subject,$tmp_body,$eTitle,$emailToUsername,$emailFrmUsername);
				}//if(strpos("#"
				if(strpos("#".$not_type_webmail."#","#".$tmp_notification_id."#") !== FALSE)
				{	
					send_notification_webmail($tmp_user_id,$user_id,$tmp_subject,$tmp_body);
				}//if(strpos("#"
			}//if($rsNotCnt>0)
		}//for($i=0;$i<$rsCnt;$i++)
	}//if($rsCnt>0)
}

function send_site_notification_mail($tmp_to_email,$tmp_subject,$tmp_body,$eTitle,$emailToUsername,$emailFrmUsername)
{
	global $db;
	global $dir,$siteTitle,$siteURL;
	$selTemplate							= "SELECT * FROM etemplate_master WHERE etemplate_title = '$eTitle'";
	$tCnt									= $db->executeQuery($selTemplate);
	
	if( $tCnt > 0 )
	{
		$tRs								= $db->getResultsetArray();
		$tRow								= $tRs[0];
		
		$eTmpHeader							= $tRow["etemplate_header"];
		$eTmpHeader							= str_replace("&lt;%USERNAME%&gt;",$emailToUsername,$eTmpHeader);
		$eTmpFooter							= $tRow["etemplate_footer"];
		$eTmpBgColor						= $tRow["etemplate_bgcolor"];
		$eTmpHcolor							= $tRow["etemplate_color"];
		$eSubject							= $tRow["etemplate_subject"];
		$eSubject							= str_replace("&lt;%SITEUSERNAME%&gt;",$emailFrmUsername,$eSubject);
		$fromEmail							= $tRow["from_email"];
		$title								= $tRow["etemplate_title"];
		$eEmailBody							= $tRow["etemplate_body"];
		$eEmailBody							= str_replace("&lt;%SITEURL%&gt;",$siteURL,$eEmailBody);
		$eEmailBody							= str_replace("&lt;%SITENAME%&gt;",$siteTitle,$eEmailBody);

		$currDate							= date('dS M, Y');	
		$eDynamicContents					= $tmp_body;
		
		$dir1      							= dirname($dir); 												
		$fpRead							 	= fopen($dir1 . "/template/notification.tpl","r+");
		$content						 	= fread($fpRead,filesize($dir1 . "/template/notification.tpl"));
						
		$content							= str_replace("<%INC_EMAIL_HEADER_COLOR%>",$eTmpHcolor,$content);
		$content							= str_replace("<%INC_EMAIL_BG_COLOR%>",$eTmpBgColor,$content);
		$content							= str_replace("<%INC_EMAIL_BODY_TITLE%>",html_entity_decode($title),$content);
		$content							= str_replace("<%INC_EMAIL_BGCOLOR%>",html_entity_decode($eTmpFooter),$content);
		$content							= str_replace("<%INC_EMAIL_DATE%>",$currDate,$content);
		$content							= str_replace("<%INC_EMAIL_HEADER%>",html_entity_decode($eTmpHeader),$content);
		$content							= str_replace("<%INC_DYNAMIC_CONTENT%>",html_entity_decode($eDynamicContents),$content);
		$content							= str_replace("<%INC_EMAIL_FOOTER%>",html_entity_decode($eTmpFooter),$content);
		$content							= str_replace("<%INC_SITE_NAME%>",$siteTitle,$content);
		$content							= str_replace("<%INC_SITE_URL%>",$siteURL,$content);
		$content							= str_replace("<%INC_DATE%>",date('Y'),$content);
		$content							= str_replace("<%INC_BODY_CONTENT%>",html_entity_decode($eEmailBody),$content);
		$content							= str_replace("<%INC_ARTICLE%>",'',$content);	
 
	
		$fldSubject							= $eSubject;
		$toEmail							= $tmp_to_email;
		SendAutoMail_PHP($toEmail,$fromEmail,$fldSubject,$content);	
	}//if
}

/* Start Admin Notification Functions */
function send_site_notification_admin($tmp_user_id,$tmp_notification_id,$tmp_user_name,$tmp_subject,$tmp_body,$eTitle)
{

	global $db;
	$not_type_emailarr							= array();
	$not_type_rssarr							= array();
	$not_type_webmailarr						= array();
	$sql										= "SELECT UserFriendId,user_name,first_name,last_name,user_email 
														FROM user_friend_master LEFT JOIN user_master ON UserFriendId = user_id 
												   WHERE UserId = {$tmp_user_id} AND is_block = 'N' AND is_accept_request = 'Y'";
	$rsCnt										= $db->executeQuery($sql);
	
	
	if($rsCnt>0)
	{
		$rs										= $db->getResultSetArray();
		for($i=0;$i<$rsCnt;$i++)
		{
			$row								= $rs[$i];
			$friend_id							= $row['UserFriendId'];
			$to_email							= $row['user_email'];
			$emailToUsername					= $row['user_name'];
			$emailFrmUsername					= $tmp_user_name;
			
			$sql								= "SELECT * FROM user_notification_master WHERE User_id = {$friend_id}";
			
			$rsNotCnt							= $db->executeQuery($sql);
			if($rsNotCnt>0)
			{
				$rsNot							= $db->getResultSetArray();
				$rowNot							= $rsNot[0];
				$not_type_email					= $rowNot['notification_email_ids'];
				$not_type_rss					= $rowNot['notification_rss_ids'];
				$not_type_webmail				= $rowNot['notification_onsite_ids'];
				
				if(strpos("#".$not_type_email."#","#".$tmp_notification_id."#") !== FALSE)
				{
					send_site_notification_mail_admin($to_email,$tmp_subject,$tmp_body,$eTitle,$emailToUsername,$emailFrmUsername);
				}//if(strpos("#"
				if(strpos("#".$not_type_webmail."#","#".$tmp_notification_id."#") !== FALSE)
				{	
					send_notification_webmail($tmp_user_id,$friend_id,$tmp_subject,$tmp_body);
				}//if(strpos("#"
			}//if($rsNotCnt>0)
		}//for($i=0;$i<$rsCnt;$i++)
	}//if($rsCnt>0)
}

function send_site_notification_to_all_users_admin($tmp_user_id,$tmp_notification_id,$tmp_user_name,$tmp_subject,$tmp_body,$eTitle)
{
	global $db;
	$not_type_emailarr							= array();
	$not_type_rssarr							= array();
	$not_type_webmailarr						= array();
	
	if( $tmp_user_id > 0 )
	{
		$where									= "user_id != {$tmp_user_id} AND "; 
	}
	else
		$where									= ""; 
		
 	$sql										= "SELECT user_id,user_name,first_name,last_name,user_email 
														FROM user_master 
												   WHERE  $where is_active='Y' ";
	$rsCnt										= $db->executeQuery($sql);
	if($rsCnt>0)
	{
		$rs										= $db->getResultSetArray();
		for($i=0;$i<$rsCnt;$i++)
		{
			$row								= $rs[$i];
			$user_id							= $row['user_id'];
			$to_email							= $row['user_email'];
			$emailToUsername					= $row['user_name'];
			$emailFrmUsername					= $tmp_user_name;
			
			$sql								= "SELECT * FROM user_notification_master WHERE User_id = {$user_id}";
			$rsNotCnt							= $db->executeQuery($sql);
			
			if($rsNotCnt>0)
			{
				$rsNot							= $db->getResultSetArray();
				$rowNot							= $rsNot[0];
				$not_type_email					= $rowNot['notification_email_ids'];
				$not_type_rss					= $rowNot['notification_rss_ids'];
				$not_type_webmail				= $rowNot['notification_onsite_ids'];
				$tmp_notification_id;
				if(strpos("#".$not_type_email."#","#".$tmp_notification_id."#") !== FALSE)
				{
					send_site_notification_mail_admin($to_email,$tmp_subject,$tmp_body,$eTitle,$emailToUsername,$emailFrmUsername);
				}//if(strpos("#"
				if(strpos("#".$not_type_webmail."#","#".$tmp_notification_id."#") !== FALSE)
				{		
					send_notification_webmail($tmp_user_id,$user_id,$tmp_subject,$tmp_body);
				}//if(strpos("#"
			}//if($rsNotCnt>0)
		}//for($i=0;$i<$rsCnt;$i++)
	}//if($rsCnt>0)
}

function send_site_notification_mail_admin($tmp_to_email,$tmp_subject,$tmp_body,$eTitle,$emailToUsername,$emailFrmUsername)
{
	global $db;
	global $dir,$siteTitle,$siteURL;
	$selTemplate							= "SELECT * FROM etemplate_master WHERE etemplate_title = '$eTitle'";
	$tCnt									= $db->executeQuery($selTemplate);
	
	if( $tCnt > 0 )
	{
		$tRs								= $db->getResultsetArray();
		$tRow								= $tRs[0];
		
		$eTmpHeader							= $tRow["etemplate_header"];
		$eTmpHeader							= str_replace("&lt;%USERNAME%&gt;",$emailToUsername,$eTmpHeader);
		$eTmpFooter							= $tRow["etemplate_footer"];
		$eTmpBgColor						= $tRow["etemplate_bgcolor"];
		$eTmpHcolor							= $tRow["etemplate_color"];
		$eSubject							= $tRow["etemplate_subject"];
		$eSubject							= str_replace("&lt;%SITEUSERNAME%&gt;",$emailFrmUsername,$eSubject);
		$fromEmail							= $tRow["from_email"];
		$title								= $tRow["etemplate_title"];
		$eEmailBody							= $tRow["etemplate_body"];
		$eEmailBody							= str_replace("&lt;%SITEURL%&gt;",$siteURL,$eEmailBody);
		$eEmailBody							= str_replace("&lt;%SITENAME%&gt;",$siteTitle,$eEmailBody);

		$currDate							= date('dS M, Y');	
		$eDynamicContents					= $tmp_body;
		
		$dir1      							= dirname(dirname($dir)); 												
		$fpRead							 	= fopen($dir1 . "/template/notification.tpl","r+");
		$content						 	= fread($fpRead,filesize($dir1 . "/template/notification.tpl"));
						
		$content							= str_replace("<%INC_EMAIL_HEADER_COLOR%>",$eTmpHcolor,$content);
		$content							= str_replace("<%INC_EMAIL_BG_COLOR%>",$eTmpBgColor,$content);
		$content							= str_replace("<%INC_EMAIL_BODY_TITLE%>",html_entity_decode($title),$content);
		$content							= str_replace("<%INC_EMAIL_BGCOLOR%>",html_entity_decode($eTmpFooter),$content);
		$content							= str_replace("<%INC_EMAIL_DATE%>",$currDate,$content);
		$content							= str_replace("<%INC_EMAIL_HEADER%>",html_entity_decode($eTmpHeader),$content);
		$content							= str_replace("<%INC_DYNAMIC_CONTENT%>",html_entity_decode($eDynamicContents),$content);
		$content							= str_replace("<%INC_EMAIL_FOOTER%>",html_entity_decode($eTmpFooter),$content);
		$content							= str_replace("<%INC_SITE_NAME%>",$siteTitle,$content);
		$content							= str_replace("<%INC_SITE_URL%>",$siteURL,$content);
		$content							= str_replace("<%INC_DATE%>",date('Y'),$content);
		$content							= str_replace("<%INC_BODY_CONTENT%>",html_entity_decode($eEmailBody),$content);
		$content							= str_replace("<%INC_ARTICLE%>",'',$content);	
 
	
		$fldSubject							= $eSubject;
		$toEmail							= $tmp_to_email;
		SendAutoMail_PHP($toEmail,$fromEmail,$fldSubject,$content);	
	}//if
}
/* End Admin Notification Functions. */

/* Function related to Calendar added by Radhika */
function DaysInMonth ( $Year, $MonthInYear )
{
	   if ( in_array ( $MonthInYear, array ( 1, 3, 5, 7, 8, 10, 12 ) ) )
		   return 31; 
	   if ( in_array ( $MonthInYear, array ( 4, 6, 9, 11 ) ) )
		   return 30; 
	   if ( $MonthInYear == 02 )
		   return ( checkdate ( 02, 29, $Year ) ) ? 29 : 28;
	   return false;
}
	
function noOfDays($eMon,$eDay,$eYear,$curMon,$curDay,$curYear)
{
	   $timestamp = mktime(0, 0, 0, $eMon, $eDay, $eYear);
       $timestamp2 = mktime(0, 0, 0, $curMon, $curDay, $curYear);
 
       $diff = floor(($timestamp - $timestamp2) / (3600 * 24));
       return $diff;

}

function get_time_in_second()
{
	list($micro_sec,$sec)		= explode(" ",microtime());
	$tot_sec					= (float)$micro_sec + (float)$sec;
	return $tot_sec;
}

function insert_email($tmp_userId,$recieverId,$subject,$body)
{
	global $db;
	$sql			= "INSERT INTO user_messages_master(SenderId,ReceiverId,MessageSubject,
														 MessageBody,addedOn,MessageType)
						  VALUES('".$tmp_userId."','".$recieverId."',".$db->ToSQL($subject,"Text").",".$db->ToSQL($body,"Text").",'".date('Y-m-d H:i:s')."','U')";
	$emailCnt	= $db->executeQuery($sql);

}
/* end of calendar */

/************************  function for manage credit points By Radhika *******************************************************
	$book_receiver_id_plus	==> This is for who receive book. 
	$book_sender_id_minus	==> This is for who book sender id. 
	
	If any one want only + or - operation then use 
	for - operation => ('',$book_sender_id_minus,"0",$points_minus,$book_id,$points_details)
	for + operation => ($book_receiver_id_plus,'',$points_add,"0",$book_id,$points_details)
*******************************************************************************************************************************/
function manage_credit_points($book_receiver_id_plus,$book_sender_id_minus,$points_add,$points_minus,$book_id,$points_details)
{
	global $db;
	
	if($points_minus > 0 )
	{
		$receiver_user_credit_points	= $db->FindOtherValue("user_master","user_id",$book_sender_id_minus,"total_credit_points");
		$sql	= "UPDATE user_master SET total_credit_points = $receiver_user_credit_points - $points_minus 
					WHERE user_id = $book_sender_id_minus";
		$db->executeQuery($sql);
		
		$sql	= "INSERT INTO user_credit_master(user_ref_id,total_points,points_type,points_details,added_on) 
											VALUES('$book_sender_id_minus','$points_minus','debit','$points_details',now())";
		$db->executeQuery($sql);
		
	}//if($points_minus > 0 )
	if($points_add > 0 )
	{
		$sender_user_credit_points		= $db->FindOtherValue("user_master","user_id",$book_receiver_id_plus,"total_credit_points");
		$sql	= "UPDATE user_master SET total_credit_points = $sender_user_credit_points + $points_add 
					WHERE user_id = $book_receiver_id_plus";
		$db->executeQuery($sql);
		
		$sql	= "INSERT INTO user_credit_master(user_ref_id,total_points,points_type,points_details,added_on) 
											VALUES('$book_receiver_id_plus','$points_add','credit','$points_details',now())";
		$db->executeQuery($sql);
	}//if($points_add > 0 )
}
/*******************************  end here **********************************************************************************/
/****************************** function for calculate 5 days from add request for reply within time */
function call_calulate_left_days($timestamp, $num_times = 2)
{
	global $db;
	//$arr	        = split(" ",$timestamp);
	$after5days		= strtotime($timestamp)+(5*24*60*60);
	//$after5days		= $db->FindOtherValue1("admin","1","1","DATE_ADD('".$arr[0]."',INTERVAL 5 DAY)");
	//$after5daystime	= $after5days." ".$arr[1];
	//$timestamp	    = $timestamp + strtotime($after5daystime);
	$timestamp			= $after5days;
    //this returns human readable time when it was uploaded (array in seconds)
    $times = array(31536000 => 'year', 2592000 => 'month',  604800 => 'week', 86400 => 'day', 3600 => 'hour', 60 => 'minute', 1 => 'second');
    $now = time();

        /* Incorporates fix by Waylon */
        $secs = $timestamp-$now;
        //Fix so that something is always displayed
        if ($secs == 0) {
               $secs = 1;
        }
        /* /Waylon */

    $count = 0;
    $time = '';

    foreach ($times AS $key => $value)
    {
        if ($secs >= $key)
        {
            //time found
            $s = '';
            $time .= floor($secs / $key);

            if ((floor($secs / $key) != 1))
                $s = 's';

            $time .= ' ' . $value . $s;
            $count++;
            $secs = $secs % $key;
           
            if ($count > $num_times - 1 || $secs == 0)
                break;
            else
                $time .= ', ';
        }
    }
    return $secs."||You have ".$time." left to answer this request.";
}
/***************************** ends here *****************************************************************************************/
// Added by Radhika. to fill sub categories
function fillSubCatClub($catid,$fldCatid,$selCatid)
{
	global $db;
	$tmpTags	= "";
	$selected 	= "";
	$str		= "";
	$sqlsub 	= "SELECT f_cat_id,f_cat_name,f_cat_parent_id,f_cat_level_id
					FROM  forum_club_category_master
					WHERE f_cat_parent_id='$catid'  AND f_cat_id != '$fldCatid'
					ORDER BY added_on DESC ";
	$cntsub		= $db->executeQuery($sqlsub);
	if($cntsub > 0 )
	{
		$subRs	= $db->getResultsetArray();
		
		for($subcat = 0;$subcat < $cntsub; $subcat++)
		{
			$rowSub			= $subRs[$subcat];
			$fldCatid		= $rowSub['f_cat_id'];
			$fldCatName		= $rowSub['f_cat_name'];
			$fldParentCat	= $rowSub['f_cat_parent_id'];
			$catLevelId		= $rowSub['f_cat_level_id'];
			
			if($fldCatid == $selCatid)
			{
				$selected	= "selected";
			}else
				$selected	= "";
			$tmpTags	= "--";	
			for($t=0;$t<$catLevelId;$t++)
			{
				$tmpTags .= "--";
			}
				
			echo "<option value=\"$catLevelId,$fldCatid\" $selected >$tmpTags$fldCatName</option>";
			 
			if($fldParentCat > 0  )
			{
				 fillSubCatClub($fldCatid,$fldCatid,$selCatid);
			}
		}//for
	}//if($cntsub > 0 )
}//function fillSubCat($catid)


function fillSubCat($catid,$fldCatid,$selCatid)
{
	global $db;
	$tmpTags	= "";
	$selected 	= "";
	$str		= "";
	$sqlsub 	= "SELECT f_cat_id,f_cat_name,f_cat_parent_id,f_cat_level_id
					FROM  forum_category_master
					WHERE f_cat_parent_id='$catid'  AND f_cat_id != '$fldCatid'
					ORDER BY added_on DESC ";
	$cntsub		= $db->executeQuery($sqlsub);
	if($cntsub > 0 )
	{
		$subRs	= $db->getResultsetArray();
		
		for($subcat = 0;$subcat < $cntsub; $subcat++)
		{
			$rowSub			= $subRs[$subcat];
			$fldCatid		= $rowSub['f_cat_id'];
			$fldCatName		= $rowSub['f_cat_name'];
			$fldParentCat	= $rowSub['f_cat_parent_id'];
			$catLevelId		= $rowSub['f_cat_level_id'];
			
			if($fldCatid == $selCatid)
			{
				$selected	= "selected";
			}else
				$selected	= "";
			$tmpTags	= "--";	
			for($t=0;$t<$catLevelId;$t++)
			{
				$tmpTags .= "--";
			}
				
			echo "<option value=\"$catLevelId,$fldCatid\" $selected >$tmpTags$fldCatName</option>";
			 
			if($fldParentCat > 0  )
			{
				 fillSubCat($fldCatid,$fldCatid,$selCatid);
			}
		}//for
	}//if($cntsub > 0 )
}//function fillSubCat($catid)

function header_redirect($page_name,$parameter='')
{
	$url			= $page_name."?".$parameter;
	
	if(headers_sent())
	{
		echo "<script language=javascript>window.location.href='$url';</script>";
		die();
	}
	else
	{
		header("Location: $url");
		die();
	}
}

/* For Forum */
function snippet($text,$length=90,$tail="...") 
{
	$text = trim($text);
	$txtl = strlen($text);
	if($txtl > $length) {
	for($i=1;$text[$length-$i]!=" ";$i++) 
	{
		if($i == $length) 
		{
			return substr($text,0,$length) . $tail;
		}
	}
		$text = substr($text,0,$length-$i+1) . $tail;
	}
	return $text;
}
	
function forumDateFormat($date)
{
	return date("D M d, Y g:i a",strtotime($date));
}

/**************** Added By Radhika for calendar *************************************************/
function find_event($tmp_today_timestamp,$tmp_compaire_date)
{
	foreach($tmp_compaire_date as $comp_date)
	{
		if(($tmp_today_timestamp >=$comp_date[0]) && ($tmp_today_timestamp <= $comp_date[1]))
		{
			return true;
		}
	}
	return false;
}
/**************** Rate this user ***************************************************************/
function doRating($loginUserId,$ownerId,$displaystr,$divid,$contentId,$ratingToId,$contentType)
{	
	global $db,$siteURL;
	if($loginUserId != $ownerId )
	{
		$totalVotes			= "0";
		//$URL			   	= urlencode($_SERVER["QUERY_STRING"]);
		$sqlRating 			=  "SELECT rating,total_votes FROM rating_master
								WHERE content_ref_id=$contentId AND content_type='User' AND user_ref_id=$loginUserId";
		$resRating			= $db->executeQuery($sqlRating);
		
		if($resRating > 0)
		{
			$resRatingRow	= $db->getResultSetArray();
			$totalRating   	= $resRatingRow[0]["rating"];
			$totalVotes		= $resRatingRow[0]["total_votes"];
			
			$avgRating	 	= round(($totalRating/$totalVotes),2);
			$voted			= 1;
		}else
		{
			$totalRating	= 0;
			$avgRating		= 0;
		}//else
		
		echo "<div id=\"rateStar".($divid)."\">".$displaystr;
		
		for($i=0;$i<5;$i++)
		{
			if($i==0)
				$imgsrc = "images/newredstar.png";
			else
				$imgsrc = "images/newgreystar.png";
		?>
  		<img id="star<?=$i."d".$divid?>" src="<?=$imgsrc?>" title="<? echo ($i+1)?> out of 5" width="14" height="14" onmouseover="javascript:showStarHighLight(<?=$i?>,'d<?=$divid?>')" onmouseout="javascript:hideStarHightLight(<?=$i?>,'d<?=$divid?>')" onclick="javascript:rate('<?=$contentId?>','<?=$i+1?>','<?=$contentType?>','<?=$ratingToId?>','<?=$divid?>')" />
  <?php }//for
		echo "<br />
              <div id=\"rateStatus$divid\" style=\"border:#181818 medium; display:none\"></div>
              <span id=\"ratebar$divid\"> Average Rating<br />
			  ";
					$avgRating	= getAvgRating($ratingToId,$contentType);
					echo showAverageRatingBar($avgRating,$siteURL);
           echo "</span> 
			  <strong><span id=\"ratingVal$divid\">&nbsp;&nbsp;Votes (
                ";
				echo getTotalVotes($ratingToId,$contentType);
            echo ")</span></strong> </span>
		</div>";
		
		return $resRating;
	}//if login & owner is not same
}//function end
// ..... Captcha functions .....
function insertSecurityImage($inputname) 
{
	global $siteURL;
	$refid = md5(@mktime()*rand());
	$insertstr = "<img src=\"".$siteURL."securityimage_finished.php?refid=".$refid."\" title=\"Security Image\" align='top'><br><input type=\"hidden\" name=\"".$inputname."\" id=\"".$inputname."\" value=\"".$refid."\">";
	echo $insertstr;
	
} //end of function insertSecurityImage


function doBookRating($loginUserId,$ownerId,$displaystr,$divid,$contentId,$ratingToId,$contentType, $style='font-size: 12px;margin-left:5px;')
{
		global $db,$siteURL;

		echo "<div style='".$style."' id=\"rateStar".($divid)."\">".$displaystr;

		if(isset($loginUserId) && $loginUserId != 0)
		{
			$totalVotes					= "0";
			$sqlRating 					=  "SELECT rating,total_votes FROM rating_master WHERE content_ref_id=$contentId AND content_type='$contentType' AND user_ref_id='".$loginUserId."'";
			$resRating					= $db->executeQuery($sqlRating);
			
			if($resRating > 0)
			{
				$resRatingRow	     	= $db->getResultSetArray();
				$totalRating   			= $resRatingRow[0]["rating"];
				$totalVotes				= $resRatingRow[0]["total_votes"];
				
				$avgRating	 			= round(($totalRating/$totalVotes),2);
				$voted					= 1;
			}
			else
			{
				$totalRating			= 0;
				$avgRating				= 0;
			}//else
			
			
			
			for($i=0;$i<5;$i++)
			{
				//if($i==0)
				//$imgsrc = "images/newredstar.png";
				//else
				$imgsrc = "images/newgreystar.png";
				if($loginUserId == "0")
				{
				?>
					<img id="star<?=$i."d".$divid?>" src="<?=$imgsrc?>" title="<? echo ($i+1)?> out of 5" width="14" height="14"  onclick="javascript:alert('Please login before rating any book');"/>
				<?
				}
				else
				{
				?>
					<img id="star<?=$i."d".$divid?>" src="<?=$imgsrc?>" title="<? echo ($i+1)?> out of 5" width="14" height="14" onmouseover="javascript:showStarHighLight(<?=$i?>,'d<?=$divid?>')" onmouseout="javascript:hideStarHightLight(<?=$i?>,'d<?=$divid?>')" onclick="javascript:rateBook('<?=$contentId?>','<?=$i+1?>','<?=$contentType?>','<?=$ratingToId?>','<?=$divid?>')" />
				<?php
				}
			 }//for
		 }
		 echo "Average Rating <span id=\"ratebar$divid\">";
 		 $avgRating	= getAvgRating($contentId,$contentType);
		 echo showAverageRatingBar($avgRating,$siteURL);
	     echo "</span><strong><span id=\"ratingVal".$divid."\">&nbsp;&nbsp;Votes (";
		 echo getTotalVotes($contentId,$contentType);
         echo "&nbsp;)</span></strong> </span></div>";	
		 echo "<div id=\"rateStatus".$divid."\" style=\"border:#181818 medium; display:none\"></div>";
}//function end


function doAuthorProfileRating($loginUserId,$authorProfileId,$displaystr,$divid,$contentId,$ratingToId,$contentType)
{	
		global $db,$siteURL;
		$totalVotes					= "0";
		$sqlRating 					=  "SELECT rating,total_votes 
											FROM rating_master
										WHERE content_ref_id=$contentId AND content_type='$contentType' AND user_ref_id=$loginUserId";
		$resRating					= $db->executeQuery($sqlRating);
		
		if($resRating > 0)
		{
			$resRatingRow	     	= $db->getResultSetArray();
			$totalRating   			= $resRatingRow[0]["rating"];
			$totalVotes				= $resRatingRow[0]["total_votes"];
			
			$avgRating	 			= round(($totalRating/$totalVotes),2);
			$voted					= 1;
		}else
		{
			$totalRating			= 0;
			$avgRating				= 0;
		}//else
		
		echo "
		<div id=\"rateStar".($divid)."\">".$displaystr;
		
		for($i=0;$i<5;$i++)
		{
			//if($i==0)
			//$imgsrc = "images/newredstar.png";
			//else
			$imgsrc = "images/newgreystar.png";
			if($loginUserId == "0")
			{
			?>
				<img id="star<?=$i."d".$divid?>" src="<?=$imgsrc?>" title="<? echo ($i+1)?> out of 5" width="14" height="14"  onclick="javascript:alert('Please login before rating any author profile');"/>
			<?
			}
			else
			{
			?>
  				<img id="star<?=$i."d".$divid?>" src="<?=$imgsrc?>" title="<? echo ($i+1)?> out of 5" width="14" height="14" onmouseover="javascript:showStarHighLight(<?=$i?>,'d<?=$divid?>')" onmouseout="javascript:hideStarHightLight(<?=$i?>,'d<?=$divid?>')" onclick="javascript:rateBook('<?=$contentId?>','<?=$i+1?>','<?=$contentType?>','<?=$ratingToId?>','<?=$divid?>')" />
  			<?php
			}
		 }//for
		echo "
              <div id=\"rateStatus".$divid."\" style=\"border:#181818 medium; display:none\"></div>
              <span>Average Rating</span>
			  <span id=\"ratebar$divid\">";
					$avgRating	= getAvgRating($contentId,$contentType);
					echo showAverageRatingBar($avgRating,$siteURL);
           echo "</span> 
			  <strong><span id=\"ratingVal".$divid."\">&nbsp;&nbsp;Votes (
                ";
				echo getTotalVotes($contentId,$contentType);
            echo  "&nbsp;)</span></strong> </span>
		</div>";
	
}//function end


function update_user_credit_points($tmp_table_name,$tmp_field_name,$tot_credit_required,$tmp_user_id)
{
	global $db;
	$sql				= "UPDATE user_master SET $tmp_field_name = $tmp_field_name - $tot_credit_required WHERE user_id = {$tmp_user_id}";
	$db->executeQuery($sql);
}


function addauthorrequest_to_author($tmp_author_request_id)
{
	global $db,$AdminAuthorRequestProfilePath,$AdminAuthorProfilePath;
	
	$sql						= "SELECT * FROM author_request_master WHERE author_id IN ($tmp_author_request_id)";
	$rsCnt						= $db->executeQuery($sql);
	if ($rsCnt > 0)
	{
		$rs						= $db->getResultsetArray();
		for($i=0;$i< $rsCnt; $i++)
		{
		$row					= $rs[$i];
		
		$fldauthor_id			= strip($row["author_id"]);
		$user_ref_id			= strip($row["user_ref_id"]);
		$fldauthor_category		= strip($row["author_category_id"]);
		$fldauthor_name			= strip($row["author_name"]);
		$fldauthor_email		= strip($row["author_email"]);
		$fldauthor_nationality	= strip($row["author_nationality"]);
		$fldauthor_birthdate	= strip($row["author_bithdate"]);
		$fldauthor_address		= strip($row["author_address"]);
		$fldauthor_city			= strip($row["author_city"]);
		$fldauthor_state		= strip($row["author_state"]);
		$fldauthor_country		= strip($row["author_country"]);
		$fldauthor_zipcode		= strip($row["author_zipcode"]);
		$fldauthor_phone		= strip($row["author_phone"]);
		$fldauthor_cell			= strip($row["author_cell"]);
		$fldauthor_photo		= strip($row["author_photo"]);
		$fldcareer_synopsis		= strip($row["career_synopsis"]);
		$fldbooks_written		= strip($row["books_written"]);
		$fldbook_category		= strip($row["book_category"]);
		$Is_Active	    		= strip($row["is_active"]);
		
		$AuthorAddsql			= " INSERT INTO author_master
												( user_ref_id,author_category_id,author_name,author_email,author_nationality,author_bithdate,author_address,
												author_city,author_state,author_country,author_zipcode,author_phone,author_cell,															
												author_photo,career_synopsis,books_written,book_category,is_active,added_on,modified_on ) 
										VALUES
												(	
													'".$user_ref_id."',
													'".$fldauthor_category."',
													'".$fldauthor_name."',
													'".$fldauthor_email."',
													'".$fldauthor_nationality."',
													'".$fldauthor_birthdate."',
													'".$fldauthor_address."',
													'".$fldauthor_city."',
													'".$fldauthor_state."',
													'".$fldauthor_country."',
													'".$fldauthor_zipcode."',
													'".$fldauthor_phone."',
													'".$fldauthor_cell."',
													'".$fldauthor_photo."',
													'".$fldcareer_synopsis."',
													'".$fldbooks_written."',
													'".$fldbook_category."',
													'Y',
													now(),
													now()
												)";	 
	 
		//echo "<br>QQ==>>".$AuthorAddsql;
		//exit;
		$db->executeQuery($AuthorAddsql);
		}
		$New_author_id		= $db->getInsertId();
		
	}
	
	$AuthorImg	= $db->FindOtherValue1("author_request_master","author_id",$tmp_author_request_id,"author_photo");
	if(strlen($AuthorImg) > 0)
	{
		$ProfilePhoto			= $AdminAuthorRequestProfilePath."/";
		$NewAuthorPhoto			= $AdminAuthorProfilePath."/";
		
		$oriContent 			= explode(".",$AuthorImg);
		$ImgExtension			= $oriContent[1];
		$ImgPrefix				= "AU_".$New_author_id;
		$NewAuthorImgName		= $ImgPrefix.".".$ImgExtension;
		
		if(is_dir($ProfilePhoto))
		{
			$PhotoPath			= $ProfilePhoto.$AuthorImg;
			$ThumbPhotoPath		= $ProfilePhoto."THUMB_".$AuthorImg;
			$NormalPhotoPath	= $ProfilePhoto."NORMAL_".$AuthorImg;
			$IconPhotoPath		= $ProfilePhoto."ICON_".$AuthorImg;
			
			$NewPhotoPath		= $NewAuthorPhoto.$NewAuthorImgName;
			$NewThumbPhotoPath	= $NewAuthorPhoto."THUMB_".$NewAuthorImgName;
			$NewNormalPhotoPath	= $NewAuthorPhoto."NORMAL_".$NewAuthorImgName;
			$NewIconPhotoPath	= $NewAuthorPhoto."ICON_".$NewAuthorImgName;
					
			if(file_exists($PhotoPath))
			{
				rename($PhotoPath,$NewPhotoPath);
			}
			if(file_exists($ThumbPhotoPath))
			{
				rename($ThumbPhotoPath,$NewThumbPhotoPath);
			}
			if(file_exists($NormalPhotoPath))
			{
				rename($NormalPhotoPath,$NewNormalPhotoPath);
			}
			if(file_exists($IconPhotoPath))
			{
				rename($IconPhotoPath,$NewIconPhotoPath);
			}
			
			$Updatesql	= " UPDATE author_master SET author_photo = '$NewAuthorImgName' where author_id = $New_author_id ";
			$db->executeQuery($Updatesql);
		}
	}

	$DeleteReqsql		= "DELETE FROM author_request_master WHERE author_id IN ({$tmp_author_request_id})";
	$db->executeQuery($DeleteReqsql);

}

function fun_banner($pid,$banner_id,$tmp_section_id,$tmp_ban_position,$tmp_sort_order = 0)
{
	global $db;
	
	//echo"sortorder>>><br>". $tmp_sort_order;
	$sqlsub				= "select banner_id from banner_master where is_active='Y' and sid = {$tmp_section_id} and pid = {$pid} and ban_position = {$tmp_ban_position} and banner_id != $banner_id and sort_order > {$tmp_sort_order} and start_date <= now() AND end_date >= now() ORDER BY sort_order LIMIT 0,1";
	$cntsub				= $db->executeQuery($sqlsub);
	
	if($cntsub > 0 )
	{
		$subRs				= $db->getResultsetArray();
		$rowSub				= $subRs[0];
		$next_banner_id		= $rowSub['banner_id'];
		
	}
	else
	{
		$sqlsub				= "select banner_id from banner_master where is_active='Y' and sid = {$tmp_section_id} and pid = {$pid} and ban_position = {$tmp_ban_position} and start_date <= now() AND end_date >= now() ORDER BY sort_order LIMIT 0,1";
		$cntsub				= $db->executeQuery($sqlsub);
		if($cntsub > 0 )
		{
			$subRs				= $db->getResultsetArray();
			$rowSub				= $subRs[0];
			$next_banner_id		= $rowSub['banner_id'];
			
		}
		else
		{
			return 0;
		}
	}
	
	return $next_banner_id;
}//function fillSubCat($catid)

function count_refresh_banner($banner_id)
{
	global $db;
	$sql				= "UPDATE banner_master SET tot_refresh = tot_refresh + 1 WHERE banner_id = {$banner_id}";
	$rsCnt				= $db->executeQuery($sql);
}//function count_refresh_banner($banner_id)
function count_click_banner($banner_id)
{
	global $db;
	$sql				= "UPDATE banner_master SET tot_click = tot_click + 1 WHERE banner_id = {$banner_id}";
	$rsCnt				= $db->executeQuery($sql);
}//function count_click_banner($banner_id)

/*----------------------------------------------Function to display avarage rating of book-------------------------------------------------------*/
function bookAvarageRatting($contentId,$contentType,$style='font-size:12px;margin-left:5px;')
{
	global $db,$siteURL;
	$avgRating	= getAvgRating($contentId,$contentType);
	echo showAverageRatingBar($avgRating,$siteURL);
}

function BookRating($loginUserId,$ownerId,$displaystr,$divid,$contentId,$ratingToId,$contentType, $style='font-size: 11px;margin-left:5px;')
{
		global $db,$siteURL;

		echo "<div style='".$style."' id=\"rateStar".($divid)."\">".$displaystr;

		if(isset($loginUserId) && $loginUserId != 0)
		{
			$totalVotes					= "0";
			$sqlRating 					=  "SELECT rating,total_votes FROM rating_master WHERE content_ref_id=$contentId AND content_type='$contentType' AND user_ref_id='".$loginUserId."'";
			$resRating					= $db->executeQuery($sqlRating);

			if($resRating > 0)
			{
				$resRatingRow	     	= $db->getResultSetArray();
				$totalRating   			= $resRatingRow[0]["rating"];
				$totalVotes				= $resRatingRow[0]["total_votes"];

				$avgRating	 			= round(($totalRating/$totalVotes),2);
				$voted					= 1;
			}
			else
			{
				$totalRating			= 0;
				$avgRating				= 0;
			}//else



			for($i=0;$i<5;$i++)
			{
				//if($i==0)
				//$imgsrc = "images/newredstar.png";
				//else
				$imgsrc = "images/newgreystar.png";
				if($loginUserId == "0")
				{
				?>
					<img id="star<?=$i."d".$divid?>" src="<?=$imgsrc?>" title="<? echo ($i+1)?> out of 5" width="14" height="14"  onclick="javascript:alert('Please login before rating any book');"/>
				<?
				}
				else
				{
				?>
					<img id="star<?=$i."d".$divid?>" src="<?=$imgsrc?>" title="<? echo ($i+1)?> out of 5" width="14" height="14" onmouseover="javascript:showStarHighLight(<?=$i?>,'d<?=$divid?>')" onmouseout="javascript:hideStarHightLight(<?=$i?>,'d<?=$divid?>')" onclick="javascript:rateBook('<?=$contentId?>','<?=$i+1?>','<?=$contentType?>','<?=$ratingToId?>','<?=$divid?>')" />
				<?php
				}
			 }//for
		 }
		 echo "<br> Your Rating <span id=\"ratebar$divid\">";
 		 $avgRating	= getUserRating($contentId,$contentType,$loginUserId);
		 echo showAverageRatingBar($avgRating,$siteURL);
                 echo "</span><strong><span id=\"ratingVal".$divid."\">&nbsp;&nbsp;</span></strong> </span></div>";
		 echo "</div><div id=\"rateStatus".$divid."\" style=\"border:#181818 medium; display:none\"></div>";
}//function end

        function getUserRating($ContRefId,$ContType,$userId)
	{
            //echo $userId;
            global $db;
		$sqlRating 	= "SELECT rating,total_votes FROM rating_master WHERE content_ref_id=$ContRefId AND content_type='$ContType' AND user_ref_id = $userId";
		$resRating	= $db->executeQuery($sqlRating);
		if($resRating > 0)
		{
			$resRatingRow		= $db->getResultSetArray();
			$TotalRating		 = "";
			$TotalVotes			 = "";
			for($vote=0;$vote<$resRating;$vote++)
			{
				$rowRatingRow		= $resRatingRow[$vote];
				$TotalRating 		= $rowRatingRow["rating"];
				$TotalVotes			= $TotalVotes + $rowRatingRow["total_votes"];
			}
			//$photoAvgRating		= $TotalRating/$resRating;
			//return number_format($TotalRating , 1, '.', '');
                        if($TotalRating > 5)
                        {
                            $TotalRating = 5;
                        }
                        return $TotalRating;
		}
		else
		{
			return $photoAvgRating	= 0;
		}
	}//function
/*----------------------------------------------Function to display user rating of book-------------------------------------------------------*/
function bookUserRatting($contentId,$contentType,$userId,$style='font-size:12px;margin-left:5px;')
{
	global $db,$siteURL;
	$avgRating	= getUserRating($contentId,$contentType,$userId);
	echo showAverageRatingBar($avgRating,$siteURL);
}
?>
