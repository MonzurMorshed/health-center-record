<?php
	// for mysql		
	class dbAbstract 
	{
   		var $connectionObject;
   		var $recordCount	=	0;
   		var $queryResult	=	0;	
   		var $currentSQL		=	"";
   		var $errorMessage	=	"";
   		var $resultSet;
   		var $debug			=	0;   	
   		var $totalRecords	=	0;	
		var $error			= false;   		
		var $currInsertId	= "";
		var $query_field_val= "";
		var $result_val		= array();
		function __construct($server,$uname,$pwd,$dbname,$debug=0) 
		{
			try 
			{
				$dbconn	= @mysqli_connect($server,$uname,$pwd,$dbname);
				if($dbconn)
				{
					$this->connectionObject = 	$dbconn;
					$this->debug			=	$debug;
					return;
				}
				else
				{
					throw new Exception("Database Connection Exception");
				}
				
				$this->error  		 = true;
			}	
			catch (Exception $e) 
			{			
				echo "<b>Error :- There was error in Database Connection. Error informed to site admin</b>";
				$this->recordSiteErrors($e->getFile(),$e->getLine(),@$_SERVER['HTTP_REFERER'],mysqli_connect_error(),mysqli_connect_errno(),$e->getTraceAsString()."<br><b> Come from :- ".$e->getMessage()."</b>");
			}
   		}
		
		function executeTestQuery($sql)
		{
   			//echo $sql;
			$this->currentSQL		=	$sql;
   			$this->resultSet 		= 	@mysqli_query($this->connectionObject,$this->currentSQL);
			
   			if(!$this->resultSet)
			{
   				$this->errorMessage = 	mysqli_error($this->connectionObject);
   				
   				if($this->debug) print $this->currentSQL;
   				if($this->debug) print $this->errorMessage;
   				
   				$this->recordCount	=	0;
   				return 0;
   			}			
			
   			$this->recordCount		=	@mysqli_num_rows($this->resultSet);
			
   			return $this->recordCount;
   		}
				
		function executeQuery($sql)
		{
			$mailString = "";
			$this->recordCount	=	0;
			$this->currentSQL		=	$sql;
			//echo "<br> qq ".$this->currentSQL;
			try 
			{

				$this->resultSet = 	@mysqli_query($this->connectionObject,$this->currentSQL);
				 $errorMessage 	= 	@mysqli_error($this->connectionObject);
				 $errorNumber 	= 	mysqli_errno($this->connectionObject);
			
				if($errorNumber >0)
				{
					throw new Exception("Execute Query error Exception");
				}
				
				if(!$this->resultSet)
				{
					if($this->debug) print $this->currentSQL;
					if($this->debug) print $this->errorMessage;
					
					$this->recordCount	=	0;
					return 0;
				}	
				
				$this->recordCount		=	@mysqli_num_rows($this->resultSet);
				return $this->recordCount;
			}
			catch (Exception $e) 
			{			
				//echo "<b>Error :- There was error in executing query. Error informed to site admin</b>";
				echo $errorMessage;
				$this->recordSiteErrors($e->getFile(),$e->getLine(),@$_SERVER['HTTP_REFERER'],$errorMessage,$errorNumber,$e->getTraceAsString()."<br><b> Come from :- ".$e->getMessage()."</b>");
			}
			
   		} // end function
   		
		// Added By Rahul
		function Execute_Add_Update_Delete_Query($sql)
		{
			$mailString = "";
			$this->recordCount	=	0;
			$this->currentSQL		=	$sql;
			//echo "<br> qq ".$this->currentSQL;
			try 
			{

				$this->resultSet = 	@mysqli_query($this->connectionObject,$this->currentSQL);
				 $errorMessage 	= 	mysqli_error($this->connectionObject);
				 $errorNumber 	= 	mysqli_errno($this->connectionObject);
			
				if($errorNumber >0)
				{
					throw new Exception("Execute Query error Exception");
				}
				
				if(!$this->resultSet)
				{
					if($this->debug) print $this->currentSQL;
					if($this->debug) print $this->errorMessage;
					
					$this->recordCount	=	0;
					return 0;
				}	
				
				$this->recordCount		=	@mysqli_affected_rows($this->connectionObject);
				return $this->recordCount;
			}
			catch (Exception $e) 
			{			
				//echo "<b>Error :- There was error in executing query. Error informed to site admin</b>";
				echo $errorMessage;
				$this->recordSiteErrors($e->getFile(),$e->getLine(),@$_SERVER['HTTP_REFERER'],$errorMessage,$errorNumber,$e->getTraceAsString()."<br><b> Come from :- ".$e->getMessage()."</b>");
			}
			
   		} 
		// End of Rahul
		
   		function getResultSetArray($freeAfterwards = true)
		{
   			$retval = array();
			
   			try 
			{
				 $errorMessage 	= 	mysqli_error($this->connectionObject);
				 $errorNumber 	= 	mysqli_errno($this->connectionObject);
			
				if($this->resultSet)
				{
					$this->recordCount 	= 	@mysqli_num_rows($this->resultSet);   				
					
					for($tr_db=0;$tr_db<$this->recordCount;$tr_db++)
					{
						$retval[$tr_db] 	=	@mysqli_fetch_assoc($this->resultSet);
					}   		   					
				}
				else
				{
					throw new Exception("Get Result Set Array Exception");
				}
				
				if($freeAfterwards==true)
				{
					@mysqli_free_result($this->resultSet);
				}
				
				return $retval;
			}
			catch (Exception $e) 
			{			
				echo "<b>Error :- There was error in getting result set. Error informed to site admin</b>";
				$this->recordSiteErrors($e->getFile(),$e->getLine(),@$_SERVER['HTTP_REFERER'],$errorMessage,$errorNumber,$e->getTraceAsString()."<br><b> Come from :- ".$e->getMessage()."</b>");
			}	
   		}
   		
		
		function getQueryCnt($sql)
		{
			$this->currentSQL		=	$sql;
			
   			try 
			{
				 $this->resultSet 		= 	@mysqli_query($this->connectionObject,$this->currentSQL);
				
				
				 $errorMessage 	= 	mysqli_error($this->connectionObject);
				 $errorNumber 	= 	mysqli_errno($this->connectionObject);
				
				if(!$this->resultSet)
				{
					throw new Exception("Get Query Count Exception");
					$this->errorMessage = 	mysqli_error($this->connectionObject);
					$this->recordCount	=	0;
					
					return 0;
				}
				else
				{
					$this->recordCount = @mysqli_fetch_array($this->resultSet);
					
					return $this->recordCount[0];
				}
			}
			catch (Exception $e) 
			{			
				echo "<b>Error :- There was error in getting query count. Error informed to site admin</b>";
				$this->recordSiteErrors($e->getFile(),$e->getLine(),@$_SERVER['HTTP_REFERER'],$errorMessage,$errorNumber,$e->getTraceAsString()."<br><b> Come from :- ".$e->getMessage()."</b>");
			}	
	
				
		} // end of function getQueryCnt added by prashant
		
   		function getResultSet($freeAfterwards = true)
		{
   			$retval = array();
   			
			try 
			{
				 $errorMessage 	= 	mysqli_error($this->connectionObject);
				 $errorNumber 	= 	mysqli_errno($this->connectionObject);
				 
				if($this->resultSet )
				{
					$this->recordCount 	= 	@mysqli_num_rows($this->resultSet);   				
					for($tr_db=0;$tr_db<$this->recordCount;$tr_db++)
					{
						$retval[$tr_db] =	@mysqli_fetch_row($this->resultSet);
					}   		   					
				}
				else
				{
					throw new Exception("Get Result Set Exception");
				}
				
				if($freeAfterwards==true )
				{
					@mysqli_free_result($this->resultSet);
				}
				
				return $retval;
			}	
			catch (Exception $e) 
			{			
				echo "<b>Error :- There was error in getting query result set. Error informed to site admin</b>";
				$this->recordSiteErrors($e->getFile(),$e->getLine(),@$_SERVER['HTTP_REFERER'],$errorMessage,$errorNumber,$e->getTraceAsString()."<br><b> Come from :- ".$e->getMessage()."</b>");
			}		
   		}
   		
   		function getResultSetObject($freeAfterwards = true)
		{
   			$retval = array();
			
			try 
			{
				 $errorMessage 	= 	mysqli_error($this->connectionObject);
				 $errorNumber 	= 	mysqli_errno($this->connectionObject);
			
				if($this->resultSet)
				{
					$this->recordCount 	= 	@mysqli_num_rows($this->resultSet);   				
					for($tr_db=0;$tr_db<$this->recordCount;$tr_db++)
					{
						$retval[$tr_db] =	@mysqli_fetch_object($this->resultSet);
					}   		   					
				}
				else
				{
					throw new Exception("Get Result Set Object Exception");
				}
				
				if($freeAfterwards==true)
				{
					@mysqli_free_result($this->resultSet);
				}
				return $retval;
			}	
			catch (Exception $e) 
			{			
				echo "<b>Error :- There was error in getting query result set object. Error informed to site admin</b>";
				$this->recordSiteErrors($e->getFile(),$e->getLine(),@$_SERVER['HTTP_REFERER'],$errorMessage,$errorNumber,$e->getTraceAsString()."<br><b> Come from :- ".$e->getMessage()."</b>");
			}			
   		}		
   		
   		function executeUpdate($sql)
		{
			$this->insId = "";
			
			try
			{
				$tmp 	= @mysqli_query($this->connectionObject,$sql);
				// new line inserted for insert id 
				$this->insId = @mysqli_insert_id($this->connectionObject);				
				$this->queryResult=$tmp;
				
				$errorMessage 	= 	mysqli_error($this->connectionObject);
				$errorNumber 	= 	mysqli_errno($this->connectionObject);
						
				if(!$tmp)
				{
					throw new Exception("Execute Update Exception");
					$this->errorMessage = mysqli_error($this->connectionObject); 
					// debug symbols
					if($this->debug) print $this->errorMessage;
					return 0;
					//return @mysqli_errno($tmp);
				}
				
				return $this->insId;
			}
			catch (Exception $e) 
			{			
				echo "<b>Error :- There was error in query update. Error informed to site admin</b>";
				$this->recordSiteErrors($e->getFile(),$e->getLine(),@$_SERVER['HTTP_REFERER'],$errorMessage,$errorNumber,$e->getTraceAsString()."<br><b> Come from :- ".$e->getMessage()."</b>");
			}	
   			
   		}
		
   		
   		function executeUpdateFetechInsertID($sql)
		{
   			try
			{
				$tmp 	= @mysqli_query($this->connectionObject,$sql);
				// new line inserted for insert id 
				$this->insId = @mysqli_insert_id($this->connectionObject);				
				$this->queryResult=$tmp;
				
				$errorMessage 	= 	mysqli_error($this->connectionObject);
				$errorNumber 	= 	mysqli_errno($this->connectionObject);

						
				if(!$tmp)
				{
					throw new Exception("Execute Update Fetch Insert Id Exception");
					$this->errorMessage = mysqli_error($this->connectionObject); 
					
					// debug symbols
					if($this->debug) print $this->errorMessage;
	
					return 0;
					//return @mysqli_errno($tmp);
				}
				return $this->insId;
			}
			catch (Exception $e) 
			{			
				echo "<b>Error :- There was error in query update insert id. Error informed to site admin</b>";
				$this->recordSiteErrors($e->getFile(),$e->getLine(),@$_SERVER['HTTP_REFERER'],$errorMessage,$errorNumber,$e->getTraceAsString()."<br><b> Come from :- ".$e->getMessage()."</b>");
			}		
   		}		
   		
   		function closeConnection()
		{
   			@mysqli_free_result($this->resultSet);
   		}
   		
		function closeMySqlConnection()
		{
			mysqli_close($this->connectionObject);
		}
		
		// ----------------------------------------------------------------------------------------------
		
		function executeQueryWithLimits($sql,$start,$pageW,$extrasql="",$ordertype="ASC")
		{
   			try
			{
				$sqlstr 	= 	str_replace("SELECT ","SELECT SQL_CALC_FOUND_ROWS ",$sql);
				$sqlstr 	= 	$sqlstr . " ORDER BY ". $ordertype ." LIMIT $start,$pageW ";
				$tresult 	=  	$this->executeQuery($sqlstr);
				
				$errorMessage 	= 	mysqli_error($this->connectionObject);
				$errorNumber 	= 	mysqli_errno($this->connectionObject);
				
				if(!$tresult)
				{
					throw new Exception("Execute Query With Limits Exception");
				}

				return $tresult;
			}	
			catch (Exception $e) 
			{			
				echo "<b>Error :- There was error in query paging. Error informed to site admin</b>";
				$this->recordSiteErrors($e->getFile(),$e->getLine(),@$_SERVER['HTTP_REFERER'],$errorMessage,$errorNumber,$e->getTraceAsString()."<br><b> Come from :- ".$e->getMessage()."</b>");
			}		

   		}
		//-------------------------------------------------------------------------------------------------- */
		
		function FindOtherValue($tblName,$field1,$val1,$field2)
		{			
			
			$sql 	 = 	"SELECT  $field2  FROM  $tblName  WHERE $field1 = $val1 ";
			
			$res     = $this->executeQuery($sql);
			if($res>0)
			{
				$rs  = $this->getResultSet();
				return $rs[0][0];
			}
			else
			{
				return "";
			}
		}	
		
		
		
		function FindOtherValueCount($tblName,$field1,$val1,$field2)
		{			
			$sql 	 = 	"SELECT  $field2  FROM  $tblName  WHERE $field1 = $val1 ";
			$res     = $this->executeQuery($sql);
			if($res>0)
			{
				return  $res; 
				
			}
			else
			{
				return "0";
			}
		}	
		
		
		function FindOtherValueMutiple($tblName,$field1,$val1,$field2)
		{
			$sql 	 = 	"SELECT  $field2  FROM  $tblName  WHERE $field1 = $val1 ";
					
			$res     = $this->executeQuery($sql);
			if($res>0)
			{
				$rs  = $this->getResultSet();
				return $rs[0][0]."&nbsp;".$rs[0][1]."&nbsp;".$rs[0][2]."&nbsp;".$rs[0][3]."&nbsp;".$rs[0][4];
			}
			else
			{
				return "";
			}
		}
		
		///// Find multiple results with condition
		function FindMultileValue($tblName,$field1,$val1,$field2,$condition)
		{
			$sql 	 = 	"SELECT  $field2  FROM  $tblName  WHERE $field1 = $val1  $condition";
					
			$res     = $this->executeQuery($sql);
			$new="";$catName="";
			if($res > 0)
			{
			$rs  = $this->getResultSet();
			
				for($i=0;$i < $res;$i++)
				{
					$new[] = implode(",", $rs[$i]);
				}
				$catName = implode(",", $new);
				return $catName;
			}
			else
			{
					return "";
			}
		}
		////// End
		
		
		//// Find Club name display only 3 result
		function FindClubName($tblName,$field1,$val1,$field2)
		{
			
			$sql 	 = 	"SELECT  $field2,$field1  FROM  $tblName  WHERE $field1 IN($val1)";
					
			$res     = $this->executeQuery($sql);
			
			$new="";$catName="";
			
			$rs  = $this->getResultSetArray();
			//print_r($rs);
			if($res>0)
			{
				for($i=0;$i < $res;$i++)
				{
					$club_id = base64_encode($rs[$i]['club_id']);
					$new[] = "<a class='displayElementInline cont03 dn' href='club-detail.php?tribeId=$club_id'>".$rs[$i]['club_title']."</a>";
				}
				$clubName = implode("<span class='displayElementInline cont03 dn'>, </span>", $new);
				return $clubName;
			}
			else if($res>0 && $res > 3)
			{
				for($i=0;$i < 3;$i++)
				{
					$club_id = base64_encode($rs[$i]['club_id']);
					$new[] = "<a class='displayElementInline cont03 dn' href='club-detail.php?tribeId=$club_id'>".$rs[$i]['club_title']."</a>";
				}
				$clubName = implode("<span class='displayElementInline cont03 dn'>, </span>", $new);
				return $clubName;
			} 
			else
			{
				return "";
			}
		}
		////// END
		
		
		//// Find Category display only 3 result
		function FindCatName($tblName,$field1,$val1,$field2)
		{
			$sql 	 = 	"SELECT  $field2  FROM  $tblName  WHERE $field1 IN($val1) ";
					
			$res     = $this->executeQuery($sql);
			$new="";$catName="";
			
			$rs  = $this->getResultSet();
			if($res>0 && $res<=3)
			{
				for($i=0;$i < $res;$i++)
				{
					$new[] = implode(",", $rs[$i]);
				}
				$catName = implode(",", $new);
				return $catName;
			}
			else if($res>0 && $res > 3)
			{
				for($i=0;$i < 3;$i++)
				{
					$new[] = implode(",", $rs[$i]);
				}
				$catName = implode(",", $new);
				return $catName;
			}
			else
			{
				return "";
			}
		}
		////// END
		
		
		function FindOtherValueNew($tblName,$field1,$val1,$field2)
		{			
			$sql 	 = 	"SELECT  $field2  FROM  $tblName  WHERE $field1 = $val1 ";
					
			$res     = $this->executeQuery($sql);
			if($res>0)
			{
				$rs  = $this->getResultSet();
				return $rs[0][0];
			}
			else
			{
				return "";
			}
		}	
		
		function FindOtherValue1($tblName,$field1,$val1,$field2)
		{
			$val1 = "'".$this->toSQL($val1)."'";
			return $this->FindOtherValue($tblName,$field1,$val1,$field2);			
		}
		
		function FindOtherValueWithCondition($tblName,$field1,$val1,$field2,$condition)
		{
			$val1 = "'".$this->toSQL($val1)."' ".$condition;	
			return $this->FindOtherValue($tblName,$field1,$val1,$field2);			
		}		
		function FindOtherValueWithConditionCount($tblName,$field1,$val1,$field2,$condition)
		{
			$val1 = "'".$this->toSQL($val1)."' ".$condition;	
			return $this->FindOtherValueCount($tblName,$field1,$val1,$field2);			
		}
		function FindOtherValueWithCondition1($tblName,$field1,$val1,$field2,$condition)
		{
			$val1 = "'".$this->toSQL($val1)."' ".$condition;	
			return $this->FindOtherValueNew($tblName,$field1,$val1,$field2);			
		}		
				
		
		function CheckDup($tblname,$field,$val)
		{
			$val1 = "'".$this->toSQL($val)."'";
			//echo "<br>" . $val1;
			$sql = "SELECT $field FROM $tblname WHERE $field = $val1 ";
			
			//echo $sql; 
			$res    = $this->executeQuery($sql);			
			if($res>0)
			{
				return(1);//Found
			}
			else
			{
				return(0);//Not found
			}
		}
		
		function CheckDupEx($tblname,$field,$val,$condfld,$condval)
		{
			$val1 = "'".$this->toSQL($val)."'";
			$sql = "SELECT $field FROM $tblname WHERE $field = $val1 AND $condfld != '$condval'";	
			$res    = $this->executeQuery($sql);	
			if($res>0)
			{ 	
				return(1);//Found
			}
			else
			{
				return(0);//Not found
			}
		}
		
		function CheckDupExIndex($tblname,$field,$val,$condfld,$condval)
		{
			$val1 = "'".$this->toSQL($val)."'";
			$sql = "SELECT $field FROM $tblname WHERE $field = $val1 AND $condfld != '$condval' AND $condfld != 121 ";	
			$res    = $this->executeQuery($sql);	
			if($res>0)
			{ 	
				return(1);//Found
			}
			else
			{
				return(0);//Not found
			}
		}
		
		function CheckDupExForumIndex($tblname,$field,$val,$condfld,$condval)
		{
			$val1 = "'".$this->toSQL($val)."'";
			$sql = "SELECT $field FROM $tblname WHERE $field = $val1 AND $condfld != '$condval' AND $condfld != 66 ";	
			$res    = $this->executeQuery($sql);	
			if($res>0)
			{ 	
				return(1);//Found
			}
			else
			{
				return(0);//Not found
			}
		}
		
		
		
		function CheckDupExNew($tblname,$field,$val,$condfld,$condval)
		{
			$val1 = "'".$this->toSQL($val)."'";
			$sql = "SELECT $field FROM $tblname WHERE $field = $val1 AND $condfld = '$condval'";	
			
			$res    = $this->executeQuery($sql);	
			if($res>0)
			{ 	
				return(1);//Found
			}
			else
			{
				return(0);//Not found
			}
		}
		
		function CheckDupEx_New($tblname,$field,$where_cond)
		{
			$val1 = "'".$this->toSQL($val)."'";
			$sql = "SELECT $field FROM $tblname $where_cond ";//WHERE $field = $val1 AND $condfld != '$condval'";			
			$res    = $this->executeQuery($sql);	
			if($res>0)
			{ 	
				return(1);//Found
			}
			else
			{
				return(0);//Not found
			}
		} //end CheckDupEx_New()
		
		function CheckDupEx_New1($tblname,$field,$val,$where_cond)
		{
			$val1 = "'".$this->toSQL($val)."'";
			$sql = "SELECT $field FROM $tblname WHERE $field = $val1 AND $where_cond ";//WHERE $field = $val1 AND $condfld != '$condval'";			
			$res    = $this->executeQuery($sql);	
			if($res>0)
			{ 	
				return(1);//Found
			}
			else
			{
				return(0);//Not found
			}
		} //end CheckDupEx_New()
		
		function CheckDupEx1_post($tblname,$field,$val,$condfld1,$condval1,$condfld2,$condval2)
		{
			$sql = "SELECT $field FROM $tblname WHERE $field = '$val' AND $condfld1 = '$condval1' AND $condfld2 != '$condval2'";
			$res    = $this->executeQuery($sql);
			
			if($res>0)
			{
				return(1);//Found
			}
			else
			{
				return(0);//Not found
			}
		}
		function CheckDupEx2_post($tblname,$field,$val,$condfld1,$condval1,$condfld2,$condval2,$condfld3,$condval3)
		{
			$sql = "SELECT $field FROM $tblname WHERE $field = '$val' AND $condfld1 = '$condval1' AND $condfld2 != '$condval2' AND $condfld3 = '$condval3'";
			$res    = $this->executeQuery($sql);
			
			if($res>0)
			{
				return(1);//Found
			}
			else
			{
				return(0);//Not found
			}
		}
		function CheckDupEx1($tblname,$field,$val,$condfld,$condval)
		{
			$sql = "SELECT $field FROM $tblname WHERE $field = '$val' AND $condfld = '$condval'";
			//echo "<br>";
			
			$res    = $this->executeQuery($sql);
			
			if($res>0)
			{
				return(1);//Found
			}
			else
			{
				return(0);//Not found
			}
		}
		
		function CheckDupEx2($tblname,$field,$val,$condfld,$condval,$condfld2,$condval2)
		{
			$sql = "SELECT $field FROM $tblname WHERE $field = '$val' AND $condfld = '$condval' AND $condfld2 = '$condval2'";
			//echo "<br>";
			$res    = $this->executeQuery($sql);
			
			if($res>0)
			{
				return(1);//Found
			}
			else
			{
				return(0);//Not found
			}
		}
		
		function CountRecs($tblnm,$constraint)
		{
			$sql = "Select * from $tblnm  $constraint";
			//echo $sql;
			return $this->executeQuery($sql);
		}
		
/*		function ToSQL($inp,$type="")
		{
			if(!get_magic_quotes_gpc())
			{
				if($type == "Text")
				{
					return  "'" . addslashes($inp) . "'";	
				}
				else
				{
					return addslashes($inp);	
				}				
			}
			else
			{
				if($type == "Text")
				{
					return "'" . $inp . "'";
				} 
				else 
				{
					return $inp;
				}	
			}
		}*/
		
		function toSQL($inp,$type=""){
			//$inp = mysql_real_escape_string($inp);
			if(!get_magic_quotes_gpc()){
				if($type == "Text"){
					return  "'" . addslashes(addslashes($inp)) . "'";	
				}else{
					return addslashes(addslashes($inp));	
				}				
			}else{
				if($type == "Text"){
					return "'" . addslashes(addslashes($inp)) . "'";
				} else {
					return addslashes(addslashes($inp));
				}	
			}
		}
		
		
		function ToSQLex($value, $type="")
		{
		  if($value == "")
			return "NULL";
		  else
			if($type == "Number")
			  return doubleval($value);
			else
			{
			  if(get_magic_quotes_gpc() == 0)
			  {
				$value = str_replace("'","''",$value);
				$value = str_replace("\\","\\\\",$value);
			  }
			  else
			  {
				$value = str_replace("\\'","''",$value);
				$value = str_replace("\\\"","\"",$value);
				$value = str_replace("'","''",$value);
			  }
		
			  return "" . $value . "";
			}
		}
		
		function MinId($tblname,$field,$constraint)
		{			
			$sql = "Select min($field) as mx from $tblname $constraint";
			$res    = $this->executeQuery($sql);
			if($res>0)
			{
				$rs  = $this->getResultSet();
				return $rs[0][0];
			}
			else
			{
				return "";
			}
		}	
		
		function NextMaxId($tblname,$field,$constraint)
		{			
			$sql = "Select max($field) as mx from $tblname $constraint";
			$res    = $this->executeQuery($sql);
			if($res>0)
			{
				$rs  = $this->getResultSet();
				return $rs[0][0] + 1;
			}
			else
			{
				return "";
			}
		}
		
		function MaxId($tblname,$field,$constraint)
		{			
			$sql = "SELECT MAX($field) as mx FROM $tblname $constraint";
			
			$res    = $this->executeQuery($sql);
			if($res>0)
			{
				$rs  = $this->getResultSet();
					return $rs[0][0];
			}else{
				return "";
			}
		}		
		
		function NextMaxIdEx($tblname,$field,$constraint,$val)
		{
			$sql = "Select max($field) from $tblname where $constraint = '$val' ";
			$res    = $this->executeQuery($sql);
			if($res>0)
			{
				$rs  = $this->getResultSet();
				return $rs[0][0] + 1;
			}
			else
			{
				return "";
			}
		}
		
		
		function MaxValue($tblname,$field,$constraint)
		{			
			$sql = "Select max($field) as mx from $tblname $constraint";
			$res    = $this->executeQuery($sql);
			if($res>0)
			{
				$rs  = $this->getResultSet();
				return $rs[0][0];
			}
			else
			{
				return "";
			}
		}
		  
		  
		function ChangeOrder($tblname,$field,$value)
		{			
			$sql = "SELECT MAX($field) as mx FROM $tblname $constraint";
			$sql = "UPDATE $tblname SET $field = $field-1 WHERE $field > $value";
			
			$res    = $this->executeQuery($sql);
		}	
		
		function DeleteSelectedEntry($tblname,$field,$value)
		{			
			//Delete that entry
			$sqlDel = " DELETE FROM $tblname WHERE $field = $value ";
			
			$res    = $this->executeQuery($sqlDel);
		}		
		
		  function getInsertId()
		  {		  	
		  
			  	return  $newId = @mysqli_insert_id($this->connectionObject);		
		  } 
		  
		  function getUserInsertId()
		{
		
			$sqlInsert	= "SELECT  mysql_insert_id() as lastID FROM user_master LIMIT 0,1";
			$this->executeQuery($sqlInsert);
			$insertIDs	= $this->getResultSetArray();
			//print_r($insertIDs);
			$rowIds		= $insertIDs[0];
			$rowID		= $rowIds["lastID"];
			
			return $rowID;
		}
		
		function getUserInsertIdDynamic($tblName)
		{
		
			$sqlInsert	= "SELECT  mysql_insert_id() as lastID FROM ".$tblName." LIMIT 0,1";
			$this->executeQuery($sqlInsert);
			$insertIDs	= $this->getResultSetArray();
			//print_r($insertIDs);
			$rowIds		= $insertIDs[0];
			$rowID		= $rowIds["lastID"];
			
			return $rowID;
		}
		
		function mysql_next_id($table) {
			$result = $this->executeQuery('SHOW TABLE STATUS LIKE "'.$table.'"');
			$rows = $this->getResultsetArray($result);
			$row	= $rows[0];
			return $row['Auto_increment'];
						
		}

		  
		  function executeQueryWithInsertID($sql)
		{
   			$this->currentSQL		=	$sql;
   			$this->resultSet 		= 	@mysqli_query($this->currentSQL,$this->connectionObject);
			$this->resultSet 		= 	@mysqli_insert_id();
			
   			if(!$this->resultSet)
			{
   				$this->errorMessage = 	mysqli_error($this->connectionObject);
   				
   				if($this->debug) print $this->currentSQL;
   				if($this->debug) print $this->errorMessage;
   				
   				$this->recordCount	=	0;
   				return 0;
   			}
   			return $this->resultSet;
   		}

		
		//Used to get single column value of any table
		function getSingleColumn($tblname,$field,$constraint)
		{			
			$sql = "Select $field as ans from $tblname $constraint";
			$res    = $this->executeQuery($sql);
			if($res>0)
			{
				$rs  = $this->getResultSet();
				return $rs[0][0];
			}
			else
			{
				return "";
			}
		}
		  
		function CheckDupRecord($tblname,$condition)
		{
			$sql = "SELECT * FROM $tblname $condition";
			$res    = $this->executeQuery($sql);
			
			if($res>0)
			{
				return(1);//Found
			}
			else
			{
				return(0);//Not found
			}
		}
		
		// Error Handler function to record error and send mail to admin.
		
		function recordSiteErrors($flderrfilename,$fldlineNo,$fldrefPagename,$errorMessage,$errorNumber,$errorTraceString)
		{
			
			global $DevelopmentErrorMailId,$admin,$serverSettingVar;
			
			$errFileName = trim($flderrfilename);
			$errFileLineNo = trim($fldlineNo);
			$errPageReferrer = trim($fldrefPagename);						
			
			$MailErrorMessage = "<b>Error Report Time :-</b> ".date("F j, Y, g:i a")."<br><br>
								 <b>Error File Name :-</b> ".$errFileName."<br><br>
								 <b>Error File Line No :- </b>".$errFileLineNo."<br><br>
								 <b>Error Page Referrer Name :- </b>".$errPageReferrer."<br><br>
								 <b>MySql Query :- </b>".$this->currentSQL."<br><br>
								 <b>MySql Error Message :- </b>".$errorMessage."<br><br>
								 <b>MySql Error Number File Name :- </b>".$errorNumber."<br><br>
								 <b>Error Trace String :- </b>".nl2br($errorTraceString)."<br>
								";
								
			$MailErrorMessage_sql = @mysqli_real_escape_string($this->connectionObject,$MailErrorMessage);					
			$errPageReferrer = @mysqli_real_escape_string($this->connectionObject,$errPageReferrer);					
			
			// Records errors in DB
			
			$insErrquery = "INSERT INTO mysql_errorHandlerData(errorMessage,errorPageRef,errorAddedOn)
										values('$MailErrorMessage_sql','$errPageReferrer',sysdate()) ";
			//$resErrquery = $this->executeUpdate($insErrquery);							
			
			if($serverSettingVar == 0) // For local error report mail sending
			{
				$subject = '[Local Site] - ias_social_networking.com : Site MySql Error Report';
			}else
			{
				$subject = 'ias_social_networking.com : Site MySql Error Report';
			}	
		
		@mail($DevelopmentErrorMailId, $subject, $MailErrorMessage, "From: $admin\nReply-To: $admin\nX-Mailer: DT_formmail\nMIME-Version: 1.0\nContent-type: text/html;charset=UTF-8"); 
			
			if($serverSettingVar == 0) // For local error report mail sending
			{
			//	@mail("rahul.j@invitrat.com", $subject, $MailErrorMessage, "From: $admin\nReply-To: $admin\nX-Mailer: DT_formmail\nMIME-Version: 1.0\nContent-type: text/html;charset=UTF-8"); 			
			//	@mail("radhika.g@invitrat.com", $subject, $MailErrorMessage, "From: $admin\nReply-To: $admin\nX-Mailer: DT_formmail\nMIME-Version: 1.0\nContent-type: text/html;charset=UTF-8"); 
			}
			
			return $errorMessage;	
		
		}
		
		
		  function CheckDupWithLevel($tblname,$field,$val,$level)
		{
			$val1 = "'".$this->toSQL($val)."'";
			//echo "<br>" . $val1;
			$sql = "SELECT $field FROM $tblname WHERE $field = $val1 AND level_id = $level";
			//echo $sql; 
			$res    = $this->executeQuery($sql);			
			if($res>0)
			{
				return(1);//Found
			}
			else
			{
				return(0);//Not found
			}
		}
		function executeQ()
		{			
			$sql 	 = 	" SELECT LAST_INSERT_ID() ";					
			$res     = $this->executeQuery($sql);
			
			if($res>0)
			{
				$rs  = $this->getResultSet();
				return $rs[0][0];
			}
			else 
				return "";
		}
		
		function CheckDupExWithLevel($tblname,$field,$val,$condfld,$condval,$level)
		{
			$val1 = "'".$this->toSQL($val)."'";
			$sql = "SELECT $field FROM $tblname WHERE $field = $val1 AND $condfld != '$condval' AND level_id = $level";			
			$res    = $this->executeQuery($sql);	
			if($res>0)
			{ 	
				return(1);//Found
			}
			else
			{
				return(0);//Not found
			}
		}
		
		function getParentHeader($catid,$CatArr,$Count)
		 {
			$parquery  		= "select * from site_content_master where HeaderId = '$catid'";
			$partotal  		= $this->executeQuery($parquery);
		
			if ($partotal > 0)
			{
				$rs				= $this->getResultSetArray();
				$parrow 		= $rs[0];
				$parCatId 		= $parrow["ParentId"];
				$parMainCatid   = $parrow["HeaderId"];
				$parTitle  		= $parrow["HeaderTitle"];
				
				$CatArr[$Count++]= "<a href=\"?pId=".base64_encode($parMainCatid)."\" class=\"blackLinkTxt\">$parTitle</a>";
	
				// Call the Recursive Function
				if($parCatId != 0)
				{
					$CatArr = $this->getParentHeader($parCatId,$CatArr,$Count);
				}
				//else
				  //$CatArr[$Count++]=0;
			}
					  
			return $CatArr; // returns array
		  }
		  
		  function getParentgenre($catid,$CatArr,$Count)
		 {
			$parquery  		= "select * from genre_master where genre_id = '$catid'";
			$partotal  		= $this->executeQuery($parquery);
		
			if ($partotal > 0)
			{
				$rs				= $this->getResultSetArray();
				$parrow 		= $rs[0];
				$parCatId 		= $parrow["parent_id"];
				$parMainCatid   = $parrow["genre_id"];
				$parTitle  		= $parrow["genre_name"];
				
				$CatArr[$Count++]= "<a href=\"?pId=".base64_encode($parMainCatid)."\" class=\"blackLinkTxt\">$parTitle</a>";
	
				// Call the Recursive Function
				if($parCatId != 0)
				{
					$CatArr = $this->getParentgenre($parCatId,$CatArr,$Count);
				}
				//else
				  //$CatArr[$Count++]=0;
			}
					  
			return $CatArr; // returns array
		  }
		  
		   function getParent($catid,$CatArr,$Count,$tblname,$where,$select1,$select2,$select3,$id=0 )
		 {
			$parquery  		= "select $select1,$select2,$select3  from $tblname where $where = $catid";
			$partotal  		= $this->executeQuery($parquery);
		
			if ($partotal > 0)
			{
				$rs				= $this->getResultSetArray();
				$parrow 		= $rs[0];

				$parCatId 		= $parrow[$select2];
				$parMainCatid   = $parrow[$select1];
				$parTitle  		= $parrow[$select3];
				
				$CatArr[$Count++]= "<a href=\"?pid=".base64_encode($parMainCatid)."\" class=\"blackLinkTxt\">$parTitle</a>";
				
				// Call the Recursive Function
				if($parCatId != 0)
				{
					
					$CatArr = $this->getParent($parCatId,$CatArr,$Count,$tblname,$where,$select1,$select2,$select3,1);
					
				}
				
				//else
				  //$CatArr[$Count++]=0;
			}
					  
			return $CatArr; // returns array
		  }
		  
	function deleteSubPages($pageId,$CatArr,$Count,$siteURL)
	 {
	 	global $dir;
		
			$dirDel	= dirname(dirname($dir));
			
			$parquery  		= "select * from site_content_master where ParentId = '$pageId'";
			$partotal  		= $this->executeQuery($parquery);
			
			if($partotal > 0 )
			{
				$rs				= $this->getResultSetArray();
			
				for ($i=0;$i<$partotal;$i++)
				{
					$parrow 		= $rs[$i];
					$parCatId 		= $parrow["ParentId"];
					$parMainCatid   = $parrow["HeaderId"];
					
					$CatArr[$Count++] = $parMainCatid ;
		
					
					$fldPageDel   = $dirDel."\\".$this->FindOtherValue1("site_content_master","HeaderId",$parMainCatid,"HeaderPagename");
					if(file_exists($fldPageDel))
						@unlink($fldPageDel);
						
					$Sql = "DELETE FROM site_content_master WHERE HeaderId = ".$parMainCatid;
					$this->executeQuery($Sql);
					
					// Call the Recursive Function
					$CatArr = $this->deleteSubPages($parMainCatid,$CatArr,$Count,$siteURL);
				}
				
			}
					  
			return $CatArr; // returns array
	}
	
		//Used to get single column value of any table
	function getSingleColumnValue($tblname,$field,$constraint)
	{	
		$sql1 = "Select $field as ans from $tblname $constraint";
		//echo "<br>  --- ".$sql;
		$resf1    = $this->executeQuery($sql1);
		if($resf1>0)
		{
			$rs1  = $this->getResultSet();
			return $rs1[0][0];
		}
		else
		{
			return "";
		}
	}
	
	
	function getParent_New($catid,$CatArr,$Count,$tblname,$where,$select1,$select2,$select3,$id=0 )
	{
		global $siteForumURL;
	   $parquery  		= "select $select1,$select2,$select3  from $tblname where $where = $catid";
		$partotal  		= $this->executeQuery($parquery);
		
		if ($partotal > 0)
		{
			$rs				= $this->getResultSetArray();
			$parrow 		= $rs[0];
			
			$parCatId 		= $parrow[$select2];
			$parMainCatid   = $parrow[$select1];
			$parTitle  		= $parrow[$select3];
			
			if($parCatId == 0)
			{
				$CatArr[$Count++]= "<a href=\"".$siteForumURL."/view-forum.php?f=".base64_encode($parMainCatid)."\">$parTitle</a>";
			}
			else
				$CatArr[$Count++]= "<a href=\"forum-topics.php?c=".base64_encode($parMainCatid)."\">$parTitle</a>";
			
			// Call the Recursive Function
			if($parCatId != 0)
			{
				$CatArr = $this->getParent_New($parCatId,$CatArr,$Count,$tblname,$where,$select1,$select2,$select3,1);
			}
			
		}
		
		return $CatArr; // returns array
	} // end function getParent()
	
	function getParent_New_Club($catid,$CatArr,$Count,$tblname,$where,$select1,$select2,$select3,$clubid,$id=0)
	{
		global $siteForumURL;
	   $parquery  		= "select $select1,$select2,$select3  from $tblname where $where = $catid";
		$partotal  		= $this->executeQuery($parquery);
		
		if ($partotal > 0)
		{
			$rs				= $this->getResultSetArray();
			$parrow 		= $rs[0];
			
			$parCatId 		= $parrow[$select2];
			$parMainCatid   = $parrow[$select1];
			$parTitle  		= $parrow[$select3];
			
			if($parCatId == 0)
			{
				$CatArr[$Count++]= "<a href=\"".$siteForumURL."/view-forum-club.php?f=".base64_encode($parMainCatid)."&club_id=".base64_encode($clubid)."\">$parTitle</a>";
			}
			else
				$CatArr[$Count++]= "<a href=\"forum-topics-club.php?c=".base64_encode($parMainCatid)."&club_id=".base64_encode($clubid)."\">$parTitle</a>";
			
			// Call the Recursive Function
			if($parCatId != 0)
			{
				$CatArr = $this->getParent_New_Club($parCatId,$CatArr,$Count,$tblname,$where,$select1,$select2,$select3,$clubid,1);
			}
			
		}
		
		return $CatArr; // returns array
	} // end function getParent()
	
	
	function FindTotalValue($tblName,$field1,$val1,$field2)
	{			
		
		$sql 	 = 	"SELECT  SUM($field2)  FROM  $tblName  WHERE $field1 = $val1 ";
		
		$res     = $this->executeQuery($sql);
		if($res>0)
		{
			$rs  = $this->getResultSet();
			return $rs[0][0];
		}
		else
		{
			return "";
		}
	}

	// for getting total ammount of cart
	public function cart_price($cart_id)
	{
		global $db;
		$this->sql				= "SELECT SUM(price) as total_price FROM cart_items WHERE cart_id = {$cart_id}";
		$this->totRec			= $db->executeQuery($this->sql);
		if($this->totRec > 0)
		{
			$this->rs			= $db->getResultSetArray();
			$this->row			= $this->rs[0];
			$this->total_price	= $this->row['total_price'];				
			return $this->total_price;
		}
		else
		{
			return "0";
		}
	}

}//class end
?>
