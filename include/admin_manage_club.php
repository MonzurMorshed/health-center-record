<?php
 	session_start();
	include("inc_classes.php");
	
	if(!($ObjAdminManager->check_admin_role("14",$ObjAdminManager->roles)))
	{
		header("Location: admin_home.php");
		die();
	}
	
	// Pagging Variable declaration 
	$ObjSiteGroup			= new SiteGroup();
	$ObjSiteGroup->pageRows	= $ObjAdminManager->sessData['recPaging'];
		
	 //-----------Delete/Active/Deactive/Set Footer/Unset Footer-------------------
   
   if(isset($_POST["chkGroup"]))
   {
        if(isset($_POST["selAction"]))
		   $ObjSiteGroup->fldAction   	= $_POST["selAction"];
		   
		$ObjSiteGroup->chkGroupId    	= $_POST["chkGroup"];
		$ObjSiteGroup->chkGroupIds      = implode(",",$ObjSiteGroup->chkGroupId);
		
		if(strcmp($ObjSiteGroup->fldAction,'Del')==0)
		{
			 $ObjSiteGroup->Group_all_delete();
		}else
		{
		   $ObjSiteGroup->group_active($ObjSiteGroup->fldAction);
		}//else
		header("Location: admin_manage_club.php");
		die();	
		
	}//post	
	
	// Search Section -------------------
	$ObjSiteGroup->txt_Search		= strip(get_param("txtSearch"));
	$ObjSiteGroup->where			= "";
	
	if (strlen($ObjSiteGroup->txt_Search) > 0)
	{
		$ObjSiteGroup->where		.= " and (club_title like '%$ObjSiteGroup->txt_Search%') ";
	}
	
	if(isset($_POST["SelClubType"]))
	{
		$ObjSiteGroup->GroupType	= $_POST["SelClubType"];
		$ObjSiteGroup->whereType	= " and (club_type = '$ObjSiteGroup->GroupType') ";
	}
	else
	{
		$ObjSiteGroup->GroupType	= "";
		$ObjSiteGroup->whereType	= "";
	}
	
	// Group Listing query -------------
	$ObjSiteGroup->sql				= " select * from club_master
											where club_type != 'PU'   ".$ObjSiteGroup->where.$ObjSiteGroup->whereType." ORDER BY club_added_on DESC ";
	$ObjSiteGroup->totRec			= $db->executeQuery($ObjSiteGroup->sql);  
	
	//------------------Paging-----------------------
	   $pages    = new Paginator;
	   if(!isset($_GET['ipp']))
	   $pages->items_per_page   	= $ObjSiteGroup->pageRows;
	   $pages->items_total  		= $ObjSiteGroup->totRec;
	   $pages->mid_range 			= 7;
	   $pages->paginate();	 
  //-------------------------------------------------------
	 $ObjSiteGroup->queryWithLimit 	= $ObjSiteGroup->sql.$pages->limit;
	 $ObjSiteGroup->rsGroupCnt		= $db->executeQuery($ObjSiteGroup->queryWithLimit);
// ------------------------------------------------------------------------
	if($ObjSiteGroup->totRec>0)
	{
		$ObjSiteGroup->rsGroup		= $db->getResultSetArray();
	}
?>
<html>
<head>
<script language="javascript" src="<?=$siteURL?>js/select_all.js"></script>
<title>:: <?=$admintitle?> ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15" class="bgleft">&nbsp;</td>
    <td valign="top"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td ><?php include("inc_top.php");?></td>
        </tr>
        <tr>
          <td height="100%"><table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="193" align="center" valign="top" class="leftpanel"><? include("inc_left.php");?></td>
                <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="1">
                    <tr>
                      <td colspan="2" valign="top"><?php include("inc_welcome.php");?></td>
                    </tr>
                    <tr>
                      <td colspan="2" valign="top">
						 <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" >
                              <form name="frmGroup" action="" method="post">
							    <tr >
                                  <td colspan="10" align="right" valign="top" class="text"><table width="100%" border="0" cellspacing="3" cellpadding="1">
                                    <tr>
                                      <td><a href="admin_manage_club.php" class="actionLinks">Site Club </a></td>
                                      <td align="right"><select name="selAction" class="text" onChange="Javascript:conDel(this.value,'frmGroup');">
                                        <option value="0">---Operation---</option>
                                        <?php  if ($ObjSiteGroup->rsGroupCnt > 0) { ?>
                                        <option value="Del">Delete</option>
                                        <option value="Y">Active</option>
                                        <option value="N">Deactive</option>
										<option value="SF">Set Featured</option>
										<option value="UF">Unset Featured</option>
                                        <?php } ?>
                                      </select></td>
                                    </tr>
                                  </table>
                                  <input type="button" name="btnAdd" value="Add New"  class="submitbutt2" onClick="JavaScript:window.location.href='admin_club_details.php'"> 
								  </tr>
                                <tr >
                                  <td colspan="3">&nbsp;</td>
								  <td colspan="2" align="center" valign="top"><table width="99%" cellpadding="0" cellspacing="0" border="0" align="center">
                                      <tr>
                                        <td width="22%" align="left"  height="20" class="text">Club Type</td>
                                        <td width="78%" align="left" class="blacklight" height="20">
											<select name="SelClubType" class="text" onChange="Javascript:document.frmGroup.submit();">
												<option value="0">--- Select Club Type ---</option>
												<option value="CI" <? if ($ObjSiteGroup->GroupType == "CI") { ?> selected="selected" <? } ?>>City Clubs</option>
												<option value="PR" <? if ($ObjSiteGroup->GroupType == "PR") { ?> selected="selected" <? } ?>>Private Clubs</option>
												<option value="CO" <? if ($ObjSiteGroup->GroupType == "CO") { ?> selected="selected" <? } ?>>Premium Clubs</option>
											</select>
                                        </td>
                                      </tr>
                                  </table></td>
								  <td colspan="5" align="center" valign="top"><table width="99%" cellpadding="0" cellspacing="0" border="0" align="center">
                                      <tr>
                                        <td width="63%" align="left"  height="20" class="text"><? if($ObjSiteGroup->totRec > $ObjSiteGroup->pageRows){ echo $pages->display_pages()?>
                                          &nbsp;&nbsp;
                                          <?=$pages->display_jump_menu()?>
                                          &nbsp;&nbsp;
                                          <?php } ?></td>
                                        <td width="37%" align="right" class="blacklight" height="20"><? echo $pages->startRecordPosition();?>&nbsp;-&nbsp;
                                            <?=$ObjSiteGroup->rsGroupCnt + $pages->startRecordPosition()-1;?>
                                          &nbsp;of&nbsp;
                                          <?=$pages->items_total?>                                        </td>
                                      </tr>
                                  </table></td>
                                </tr>
                                <tr  class="tblTitle">
                                  <td height="25" align="center" valign="top" class="tblSubTitle"><input type="checkbox" name="chkAll" onClick="Javascript:checkAll('frmGroup','chkGroup')">
                                  </td>
                                  <td height="25" align="center" valign="top" class="tblSubTitle">All </td>
                                  <td width="27%" align="left" class="tblSubTitle">Club Name</td>
								  <td width="15%" align="left" class="tblSubTitle">Club Type</td>
								  <td width="15%" align="left" class="tblSubTitle">Created By</td>
                                  <td width="11%" align="left" class="tblSubTitle" >No. Of Member</td>
								  <td width="10%" class="tblSubTitle">Have list</td>
								  <td width="11%" class="tblSubTitle">Want list</td>
                                  <td width="5%" align="center" class="tblSubTitle">Is Featured</td>
								  <td width="5%" align="center" class="tblSubTitle">Active</td>
                                </tr>
                                <? if ($ObjSiteGroup->rsGroupCnt > 0) 
									 {
									 
										$ObjSiteGroup->cnt	= 1;
										//$ObjSiteGroup->rsAdmin		= $db->getResultSetArray();
										for ($i=0;$i<$ObjSiteGroup->rsGroupCnt;$i++)
										{	
											$ObjSiteGroup->rowGroup		= $ObjSiteGroup->rsGroup[$i];
											$ObjSiteGroup->GroupId		= $ObjSiteGroup->rowGroup['club_id'];
											$ObjSiteGroup->GroupVisibility	= $ObjSiteGroup->rowGroup['club_type'];
											
											if($ObjSiteGroup->GroupVisibility == "CI")
											{
												$ObjSiteGroup->GroupVisibility	= "City Clubs";
											}
											if($ObjSiteGroup->GroupVisibility == "PR")
											{
												$ObjSiteGroup->GroupVisibility	= "Private Clubs";
											}
											if($ObjSiteGroup->GroupVisibility == "CO")
											{
												$ObjSiteGroup->GroupVisibility	= "Premium Clubs";
											}
											
											$ObjSiteGroup->UserId		= $ObjSiteGroup->rowGroup['club_user_ref_id'];
											$ObjSiteGroup->GroupTitle	= strip($ObjSiteGroup->rowGroup['club_title']);
											if($ObjSiteGroup->UserId > 0)
											{
												$ObjSiteGroup->UserFName	= $db->FindOtherValue1("user_master","user_id",$ObjSiteGroup->UserId,"user_fname");	
												$ObjSiteGroup->UserLName	= $db->FindOtherValue1("user_master","user_id",$ObjSiteGroup->UserId,"user_lname");	
												$ObjSiteGroup->UserName		= $ObjSiteGroup->UserFName." ". $ObjSiteGroup->UserLName;
											}
											else
											{
												$ObjSiteGroup->UserName		= "Administrator";
											}
											
											
											$ObjSiteGroup->Is_Active	= $ObjSiteGroup->rowGroup['is_active'];
											$ObjSiteGroup->Is_Featured	= $ObjSiteGroup->rowGroup['is_featured'];
											
											if($i % 2 == 0 )
												$class	 = "class = oddRow";
											else
												$class	= "class = evenRow";
											$ObjSiteGroup->sql			= "select count(*) as totMem from club_member_master where club_ref_id={$ObjSiteGroup->GroupId}";
											$ObjSiteGroup->totMemRec	= $db->executeQuery($ObjSiteGroup->sql);
											if($ObjSiteGroup->totMemRec>0)
											{
												$ObjSiteGroup->rsMem	= $db->getResultSetArray();
												$ObjSiteGroup->rowMem	= $ObjSiteGroup->rsMem[0];
												$ObjSiteGroup->totMem	= $ObjSiteGroup->rowMem['totMem'];
											}
											
											
											$sql						= "SELECT sum(rating)/count(rate_id) AS club_rating FROM rating_master WHERE content_type = 'Club' AND content_ref_id = {$ObjSiteGroup->GroupId}";
											$rsCnt						= $db->executeQuery($sql);
											if($rsCnt>0)
											{
												$rs						= $db->getResultSetArray();
												$row					= $rs[0];
												$rating					= $row['club_rating'];
											}
											else
											{
												$rating					= 0;
											}
											
								 	 ?>
                                <tr <?=$class?>>
                                  <td width="3%"><input type="checkbox" name="chkGroup[]" 
												value="<?=$ObjSiteGroup->GroupId?>" id="<?=$ObjSiteGroup->GroupId?>"></td>
                                  <td width="3%" align="center"><?=$pages->startRecordPosition()+$i;?></td>
                                  <td align="left">
								  <a href="admin_club_details.php?groupId=<?=$ObjSiteGroup->GroupId?>" class="blackLinkTxt">
                                    <?=$ObjSiteGroup->GroupTitle?><br>
									<br>
									<?php echo showAverageRatingBar($rating,$siteURL);?>
                                  </a></td>
								  <td align="left" class="text"><?=$ObjSiteGroup->GroupVisibility?></td>
								  <td align="left" class="text"><?=$ObjSiteGroup->UserName?></td>
								  <td align="center" class="text"><?=$ObjSiteGroup->totMem?></td>
								  <td>Book Shelf (<?=$ObjSiteGroup->club_have_list($ObjSiteGroup->GroupId)?>)</td>
								  <td></td>
                                  <td align="center">
								  <?php
										if($ObjSiteGroup->Is_Featured=="Y")
										{
											echo "<img src=\"images/yes.gif\">";
										}
										else
										{
											echo "<img src=\"images/no.gif\">";
										}
									?>
                                  </td>
								  <td align="center">
								  <?php
										if($ObjSiteGroup->Is_Active=="Y")
										{
											echo "<img src=\"images/yes.gif\">";
										}
										else
										{
											echo "<img src=\"images/no.gif\">";
										}
									?>
                                  </td>
								 
                                </tr>
                                <?	$ObjSiteGroup->cnt++;
								  		} 
									 } else { ?>
                                <tr >
                                  <td height="30" colspan="10" class="errorMsg" align="left">No Groups are available !!! </td>
                                </tr>
                                <? } ?>
                              </form>
                        </table>
					    
					  </td>
                    </tr>
                    <tr>
                      <td colspan="2" valign="top">
					  </td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td ><? include("inc_footer.php");?></td>
        </tr>
      </table></td>
    <td width="15" height="100%" class="bgright"></td>
  </tr>
</table>
</body>
</html>


