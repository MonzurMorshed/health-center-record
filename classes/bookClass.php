<?php

	class bookClass extends errorClass
	{
		public  $sql;				// store the login query
		public 	$errMsg;
		public  $i;	
		public  $id;
		public	$readonly;
		public  $pageRows;
		public  $fldAction;
		public  $chkBookId;
		public  $SiteBookIds;
		public  $txt_Search;
		public  $where;
		public  $totRec;
		public  $queryWithLimit;
		public  $rs;
		public  $rsCnt;
		public  $cover_img;
		private $userData = array();
		
		
		public  $fldtitle;
		public  $fldauthor;
		public  $fldpublisher;
		public  $pub_date;		
		public  $fldsubject;	
		public  $flddescription;
		public  $fldtags;		
		public  $fldheight;		
		public  $fldwidth;		
		public  $fldthickness;	
		public  $fldpages;		
		public  $fldtype;		
		public  $fldcondition;	
		public  $fldrating;		
		public  $fldImage;	
		public  $fldisbn;
		public  $fldbook_isbn_10;
		public  $fldbook_isbn_13;
		
		public  $action;
		public  $chkMetaTagId;
		public  $BookIds;
		public  $row;
		public  $Book_id;
		public  $Book_name;
		public  $is_active;
		public  $Book_description;
		public  $part;
		
		public  $fldday;
		public  $fldmonth;
		public  $fldyear;
		
		public  $fldcat1;
		public  $fldcat2;
		public  $fldcat3;
		public  $fldcat4;
		
		public $rsBuddie;
		public $rowBuddie;
		
		public $depositeFees;
		public $perbookFees;
		//public $creditLib;
		public $perbookMore;
		public $tot_record_added;
		
		public $userId;
		public $fldclub_ref_id;
		public $fldimage;
		
		/************* Book Search ************************/
		public $fldAlpha;
		public $fldTitle;
		public $fldClubTitle;
		public $fldAuthor;
		public $fldAlphaRate;
		public $fldAlphaClub;
		public $fldAlphaCat;
		public $fldAlphaAuthor;
		public $fldISBN;
		public $fldMember;
		public $fldAlphaMember;
		/************ End here *********************************/
		
		public $depositeLib;
		public $feesLib;
		public $creditLib;
		public $moreLib;
		public $numOfItems;
		public $each_rate;
		
		/************For Payment Gateway*******************************************/
		public $book_price;
		public $book_quantity;
		public $forSale;
		/************ End here *********************************/
                
                /*----------- for fields in csv upload ------------*/
                public $added_on;
                public $imp_id;

		// To initialise the variables
		function __construct()
		{
			$this->errMsg				= "";
			$this->i					= 0;
			$this->id					= "";
			$this->readonly				= "";
			$this->pageRows				= 0;
			$this->fldAction			= "";
			$this->chkBookId			= "";
			$this->SiteBookIds			= "";
			$this->txt_Search			= "";
			$this->where				= "";
			$this->sql					= "";
			$this->totRec				= 0;
			$this->queryWithLimit		= "";
			$this->rs					= "";
			$this->rsCnt 				= 0;
			$this->cover_img			= "";
			$this->each_rate			= 0;
			//$this->chk_role();
			
			$this->action				= "";
			$this->chkMetaTagId			= "";
			$this->BookIds				= "";
			$this->row					= "";
			$this->Book_id				= "";
			$this->Book_name			= "";
			$this->is_active			= "";
			$this->Book_description		= "";
			$this->part					= "";
			
			$this->fldtitle				= "";
			$this->fldauthor			= "";
			$this->fldpublisher			= "";
			$this->pub_date				= "";			
			$this->fldsubject			= "";	
			$this->flddescription		= "";
			$this->fldtags				= "";		
			$this->fldheight			= "";		
			$this->fldwidth				= "";		
			$this->fldthickness			= "";	
			$this->fldpages				= "";		
			$this->fldtype				= "";		
			$this->fldcondition			= "";	
			$this->fldrating			= "";		
			$this->fldImage				= "";
			$this->fldisbn				= "";	
			
			$this->userId				= 0;	
			$this->fldclub_ref_id		= 0;	
			$this->fldimage     		= "";	
			
			$this->fldday				= "";
			$this->fldmonth				= "";
			$this->fldyear				= "";
			$this->fldcat1				= "";
			$this->fldcat2				= "";
			$this->fldcat3				= "";
			$this->fldcat4				= "";
			$this->tot_record_added		= 0;
			
			$this->fldAlpha				= "";
			$this->fldTitle				= "";
			$this->fldClubTitle			= "";
			$this->fldAuthor			= "";
			$this->fldAlphaRate 		= "";
			$this->fldAlphaClub 		= "";
			$this->fldAlphaCat 			= "";
			$this->fldAlphaAuthor 		= "";
			$this->fldISBN				= "";
			$this->fldMember			= "";
			$this->fldAlphaMember 		= "";
			
			$this->depositeLib			= "";
			$this->feesLib				= "";		
			$this->creditLib			= "";
			$this->moreLib				= "";
			$this->numOfItems          = "";
			$this->fldlanguage			="";
			
			
			
			/************For Payment Gateway*******************************************/
			
			$this->book_price			=0;
			$this->book_quantity		=0;
			$this->forSale				="";

			/************ End here *********************************/
                        /*----------- for fields in csv upload ------------*/
                        $this->added_on	= 0;
			$this->imp_id	= 0;
		}
		
		// Destroy all the variables and the objects
		function __destruct()
		{
			unset($this->errMsg,$this->i,$this->id,$this->readonly,$this->pageRows,$this->fldAction,$this->chkBookId,$this->SiteBookIds,$this->txt_Search,$this->where);
			unset($this->sql,$this->totRec,$this->queryWithLimit,$this->rs,$this->rsCnt,$this->cnt,$this->action,$this->chkMetaTagId,$this->BookIds,$this->row,$this->Book_id,$this->Book_name,$this->is_active,$this->Book_description,$this->part);
			unset($this->userData);
			unset($this->fldtitle,$this->fldauthor,$this->fldpublisher,$this->pub_date,$this->fldsubject,$this->flddescription,$this->fldtags,	
				 $this->fldheight,$this->fldwidth,$this->fldthickness,$this->fldpages,$this->fldtype,$this->fldcondition,$this->fldrating,$this->fldImage,
				 $this->fldisbn,$this->fldAlpha,$this->fldTitle,$this->fldClubTitle,$this->fldAuthor,$this->fldAlphaRate,$this->fldAlphaClub,
				 $this->fldAlphaCat,$this->fldAlphaAuthor,$this->fldISBN,$this->fldMember,$this->fldAlphaMember,$this->depositeLib,$this->feesLib,
				 $this->creditLib,$this->moreLib);
		}
				
		public function book_add_update_bkp()
		{
			global $db;
			try  
			{
				if($this->part == 0)
				{
					$this->sql		= "INSERT INTO book_master(book_user_ref_id,book_cat1,book_cat1_1,book_cat1_1_1,book_cat1_1_1_1,
											book_title,book_description,book_author,book_publisher,book_publication_date,
											book_pages,book_identify_tags,book_language,book_rating,is_active,added_on) 
											VALUES('".$this->userId."',
											'".$this->fldcat1."',
											'".$this->fldcat2."',	
											'".$this->fldcat3."',
											'".$this->fldcat4."',
											".$db->ToSQL($this->fldtitle,"Text").",
											".$db->ToSQL($this->flddescription,"Text").",
											".$db->ToSQL($this->fldauthor,"Text").",
											".$db->ToSQL($this->fldpublisher,"Text").",
											".$db->ToSQL($this->fldpublisher_date,"Text").",
											".$db->ToSQL($this->fldpages,"Text").",
											".$db->ToSQL($this->fldtags,"Text").",
											".$db->ToSQL($this->fldlanguage,"Text").",
											'".$this->fldrating."',
											'Y',now())";
					
					//$this->tot_record_added		= $db->Execute_Add_Update_Delete_Query($this->sql);
					//$this->calculate_credit_books($this->userId);
				}
				else
				{
					$this->sql		= "UPDATE book_master SET 
												book_cat1			= '".$this->fldcat1."',
												book_cat1_1			= '".$this->fldcat2."',
												book_cat1_1_1		= '".$this->fldcat3."',
												book_cat1_1_1_1		= '".$this->fldcat4."',	
												book_title			= ".$db->ToSQL($this->fldtitle,"Text").",
												book_description	= ".$db->ToSQL($this->flddescription,"Text").",
												book_author			= ".$db->ToSQL($this->fldauthor,"Text").",
												book_subject		= ".$db->ToSQL($this->fldsubject,"Text").",
												book_height			= ".$db->ToSQL($this->fldheight,"Text").",
												book_width			= ".$db->ToSQL($this->fldwidth,"Text").",
												book_thickness		= ".$db->ToSQL($this->fldthickness,"Text").",
												book_type			= ".$db->ToSQL($this->fldtype,"Text").",
												book_publisher		= ".$db->ToSQL($this->fldpublisher,"Text").",
												book_publication_date = ".$db->ToSQL($this->fldpublisher_date,"Text").",
												book_pages			= ".$db->ToSQL($this->fldpages,"Text").",
												book_identify_tags 	= ".$db->ToSQL($this->fldtags,"Text").",
												book_condition		= ".$db->ToSQL($this->fldcondition,"Text").",
												book_language		= ".$db->ToSQL($this->fldlanguage,"Text").",
												is_active			= '".$this->is_active."'
											WHERE
												book_id				= ".$this->Book_id;
					$this->tot_record_added		= $db->Execute_Add_Update_Delete_Query($this->sql);
				}
			}
			catch(Exception $e)
			{
				throw new ConnectionException("Could not update categories_master table ".$e);
			}
		}
		
		
		public function book_add_update_isbn()
		{
			global $db;
			try  
			{
				if($this->part == 0)
				{
					$this->sql			= "INSERT INTO book_master(book_user_ref_id,book_isbn_no,book_isbn_no13,book_title,
															   book_description,book_author,book_publisher,book_rating,
															   is_active,added_on) 
														VALUES('".$this->userId."',
																'".$this->fldisbn10."',	
																'".$this->fldisbn13."',	
																".$db->ToSQL($this->fldtitle,"Text").",
																".$db->ToSQL($this->flddescription,"Text").",
																".$db->ToSQL($this->fldauthor,"Text").",
																".$db->ToSQL($this->fldpublisher,"Text").",
																'".$this->fldrating."',
																'Y',now())";
					$db->executeQuery($this->sql);
					$this->calculate_credit_books($this->userId);
				
				}
				else
				{
					$this->sql		 	= "UPDATE book_master SET
													book_cat1			= '".$this->fldcat1."',
													book_cat1_1			= '".$this->fldcat2."',
													book_cat1_1_1		= '".$this->fldcat3."',
													book_cat1_1_1_1		= '".$this->fldcat4."',	 
													book_title			= ".$db->ToSQL($this->fldtitle,"Text").",
													book_description	= ".$db->ToSQL($this->flddescription,"Text").",
													book_author			= ".$db->ToSQL($this->fldauthor,"Text").",
													book_subject		= ".$db->ToSQL($this->fldsubject,"Text").",
													book_height			= ".$db->ToSQL($this->fldheight,"Text").",
													book_width			= ".$db->ToSQL($this->fldwidth,"Text").",
													book_thickness		= ".$db->ToSQL($this->fldthickness,"Text").",
													book_type			= ".$db->ToSQL($this->fldtype,"Text").",
													book_publisher		= ".$db->ToSQL($this->fldpublisher,"Text").",
													book_publication_date = ".$db->ToSQL($this->fldpublisher_date,"Text").",
													book_pages			= ".$db->ToSQL($this->fldpages,"Text").",
													book_identify_tags 	= ".$db->ToSQL($this->fldtags,"Text").",
													book_condition		= ".$db->ToSQL($this->fldcondition,"Text").",
													is_active			= '".$this->is_active."'
												WHERE
													book_id				= ".$this->Book_id;
					$db->executeQuery($this->sql);
				}
				
				
				
			}
			catch(Exception $e)
			{
				throw new ConnectionException("Could not update categories_master table ".$e);
			}
		}
		
		public function book_add_update($tmp_action)
		{
			global $db;
			try
			{
				if($tmp_action == "0")
				{
					$this->sql	= "INSERT INTO book_master SET
									book_user_ref_id 		= ".$this->userId.",
									book_cat1				= '".$this->fldcat1."',
									book_cat1_1				= '".$this->fldcat2."',
									book_cat1_1_1			= '".$this->fldcat3."',
									book_cat1_1_1_1			= '".$this->fldcat4."',	 
									book_club_ref_id 		= ".$this->fldclub_ref_id.",
									book_isbn_no	 		= '".$this->fldbook_isbn_10."',
									book_isbn_no13	 		= '".$this->fldbook_isbn_13."',
									book_title				= '".addslashes($this->fldtitle)."',
									book_description		= '".addslashes($this->flddescription)."',
									book_author				= '".addslashes($this->fldauthor)."',
									book_height				= '".$this->fldheight."',
									book_width				= '".$this->fldwidth."',
									book_thickness			= '".$this->fldthickness."',
									book_type				= '".$this->fldtype."',
									book_publisher			= '".addslashes($this->fldpublisher)."',
									book_publication_date	= '".$this->fldpublication_date."',
									book_pages				= '".$this->fldpages."',
									book_cover_image		= '".$this->fldimage."',
									book_identify_tags		= '".addslashes($this->fldtags)."',
									book_condition			= '".$this->fldcondition."',
									book_language			= '".$this->fldlanguage."',
									book_rating				= '".$this->fldrating."',
									is_active				= 'Y',
									added_on				= now(),
									status					= 'N',
									is_club_only			= '',
									book_price				= ".$this->book_price.",
									book_quantity			= ".$this->book_quantity.",
									forSale					= '".$this->forSale."'
									
									";
					$this->tot_record_added			= $db->Execute_Add_Update_Delete_Query($this->sql);
					$this->bookId	= $db->getInsertId();
					
					$this->sql		= "INSERT INTO club_book_master (book_id,club_id,user_id,added_on) VALUES($this->bookId,$this->fldclub_ref_id,$this->userId,now())";
					$db->Execute_Add_Update_Delete_Query($this->sql);

					//Function for club activity by sayali on 5:13 PM 5/27/2011
					$this->club_activities($this->fldclub_ref_id,$this->userId,"Book Add",$this->bookId);
					// END
					
					
					if($this->fldrating > 0)
					{
						
						$this->sql		= "INSERT INTO rating_master(user_ref_id,content_ref_id,content_type,total_votes,rating) 
																VALUES('".$this->userId."','".$this->bookId."','Book','1','".$this->fldrating."')";
						$db->Execute_Add_Update_Delete_Query($this->sql);	
					}
					//die($this->sql."tot rec".$this->tot_record_added);
					$this->calculate_credit_books($this->userId);	
					
				}
				elseif($tmp_action == "1")
				{
					$this->sql		= "UPDATE book_master SET
													book_user_ref_id 		= ".$this->userId.",
													book_cat1		 		= ".$this->fldcat1.",
													book_club_ref_id 		= ".$this->fldclub_ref_id.",
													book_isbn_no	 		= '".$this->fldbook_isbn_10."',
													book_isbn_no13	 		= '".$this->fldbook_isbn_13."',
													book_title				= ".$db->ToSQL($this->fldtitle,"Text").",
													book_description		= ".$db->ToSQL($this->flddescription,"Text").",
													book_author				= ".$db->ToSQL($this->fldauthor,"Text").",
													book_height				= '".$this->fldheight."',
													book_width				= '".$this->fldwidth."',
													book_thickness			= '".$this->fldthickness."',
													book_type				= '".$this->fldtype."',
													book_publisher			= ".$db->ToSQL($this->fldpublisher,"Text").",
													book_publication_date	= '".$this->fldpublication_date."',
													book_pages				= '".$this->fldpages."',
													book_cover_image		= '".$this->fldimage."',
													book_identify_tags		= '".$this->fldtags."',
													book_condition			= '".$this->fldcondition."',
													book_language			= '".$this->fldlanguage."',
													book_rating				= '".$this->fldrating."',
													is_active				= 'Y',
													status					= 'N',
													is_club_only			= '".$this->fldis_club_only."',
													book_price				= ".$this->book_price.",
													book_quantity			= ".$this->book_quantity.",
													forSale					= '".$this->forSale."'
													WHERE book_id			= $this->Book_id";
					$db->Execute_Add_Update_Delete_Query($this->sql);
					
					$this->bookId	= $db->getInsertId();
					$this->sql		= "INSERT INTO club_book_master (book_id,club_id,user_id,added_on) VALUES($this->bookId,$this->fldclub_ref_id,$this->userId,now())";
					$db->Execute_Add_Update_Delete_Query($this->sql);	
					
					//Function for club activity by sayali on 5:13 PM 5/27/2011
					$this->club_activities($this->fldclub_ref_id,$this->userId,"Book Add",$this->bookId);
					// END
				}
			}
			catch(Exception $e)
			{
				throw new ConnectionException("Could not perform action on book_master table ".$e);
			}
		}
		
		
		
		public function book_temp_addtoclub($tmp_action)
		{
			global $db;
			try
			{
				if($tmp_action == "0")
				{
					$this->sql		= "INSERT INTO book_temp_addtoclub_master SET
													book_user_ref_id 		= ".$this->userId.",
													book_cat1		 		= ".$this->fldcat1.",
													book_club_ref_id 		= ".$this->fldclub_ref_id.",
													book_isbn_no	 		= '".$this->fldbook_isbn_10."',
													book_isbn_no13	 		= '".$this->fldbook_isbn_13."',
													book_title				= ".$db->ToSQL($this->fldtitle,"Text").",
													book_description		= ".$db->ToSQL($this->flddescription,"Text").",
													book_author				= ".$db->ToSQL($this->fldauthor,"Text").",
													book_publisher			= ".$db->ToSQL($this->fldpublisher,"Text").",
													book_publication_date	= '".$this->fldpublication_date."',
													book_pages				= '".$this->fldpages."',
													book_cover_image		= '".$this->fldimage."',
													book_identify_tags		= ".$db->ToSQL($this->fldtags,"Text").",
													book_condition			= '".$this->fldcondition."',
													book_language			= '".$this->fldlanguage."',
													book_rating				= '".$this->fldrating."',
													is_active				= 'Y',
													added_on				= now(),
													status					= 'N',
													is_club_only			= '".$this->fldis_club_only."'  ";
					
					$this->tot_record_added			= $db->Execute_Add_Update_Delete_Query($this->sql);
					//die($this->sql."tot rec".$this->tot_record_added);
				}
			}	
			catch(Exception $e)
			{
				throw new ConnectionException("Could not perform action on book_temp_addtoclub_master table ".$e);
			}
		}
		
		public function Book_actions()
		{
			global $db;
			if($this->fldAction == "Del")
			{
				$this->sql		= "DELETE FROM book_master WHERE book_id IN({$this->BookIds})";
				$db->executeQuery($this->sql);
				$this->sql		= "DELETE FROM club_book_member_request_master WHERE book_ref_id IN({$this->BookIds})";
				$db->executeQuery($this->sql);
				$this->sql		= "DELETE FROM comment_master WHERE content_ref_id IN({$this->BookIds}) AND content_type = 'Book'";
				$db->executeQuery($this->sql);
				$this->sql		= "DELETE FROM rating_master WHERE content_ref_id IN({$this->BookIds}) AND content_type = 'Book'";
				$db->executeQuery($this->sql);
			}
			elseif($this->fldAction == "SF")
			{
				$this->fldAction		= "Y";
				$this->sql		= "UPDATE book_master SET is_featured = '{$this->fldAction}' WHERE book_id IN ($this->BookIds)";
				$db->executeQuery($this->sql);
			}
			elseif($this->fldAction == "UF")
			{
				$this->fldAction		= "N";
				$this->sql		= "UPDATE book_master SET is_featured = '{$this->fldAction}' WHERE book_id IN ($this->BookIds)";
				$db->executeQuery($this->sql);
			}
			else
			{
				$this->sql		= "UPDATE book_master SET is_active = '{$this->fldAction}' WHERE book_id IN ($this->BookIds)";
				$db->executeQuery($this->sql);
			}
			
		}
		
		public function fill_subject($tmp_subjectId)
		{
			global $db;
			try
			{
				$this->sql			= "SELECT * FROM book_subject_master WHERE is_active='Y'";
				
				$this->rsCnt		= $db->executeQuery($this->sql);
				if ($this->rsCnt > 0)
				{
					$this->rsSubject			= $db->getResultSetArray();
					for ($i=0;$i<$this->rsCnt;$i++)
					{	
						$this->rowSubject		= $this->rsSubject[$i];
						$this->SubjectId		= $this->rowSubject['book_cat_id'];
						$this->SubjectName		= $this->rowSubject['book_cat_name'];
						echo "<option value=\"{$this->SubjectId}\"";
						if($tmp_subjectId == $this->SubjectId)
						{
							echo " selected ";
						}
						echo ">{$this->SubjectName}</option>";
					}
				}
			}
			catch(Exception $e)
			{
				throw new ConnectionException("Could not fetch the country table ".$e);
			}
		}
		
		public function book_want_add_update()
		{
			global $db;
			try  
			{
				if($this->part == 0)
				{
					$this->sql		= "INSERT INTO book_want_master(book_user_ref_id,book_club_ref_id,book_isbn_no,book_title,book_author,book_publisher,requested_on)
												VALUES('".$this->userId."','".$this->fldclub_ref_id."','".$this->fldisbn."',".$db->ToSQL($this->fldtitle,"Text").",
														".$db->ToSQL($this->fldauthor,"Text").",".$db->ToSQL($this->fldpublisher,"Text").",
														now())";
				}
				$this->tot_record_added = $db->Execute_Add_Update_Delete_Query($this->sql);
			}
			catch(Exception $e)
			{
				throw new ConnectionException("Could not update categories_master table ".$e);
			}
		}
		
		public function check_want_list()
		{
			global $db;
			try
			{
				$this->sql			= "SELECT * FROM book_want_master WHERE ( book_isbn_no='".$this->fldisbn."' or book_title = '".addslashes(addslashes($this->fldtitle))."' )
										 AND book_user_ref_id	= $this->userId";
				$this->rsCnt		= $db->executeQuery($this->sql);
				if ($this->rsCnt > 0)
				{
					return "1"; 
				}
				else
				{
					return "0";	
				}
			}
			catch(Exception $e)
			{
				throw new ConnectionException("Could not fetch the country table ".$e);
			}
		
		}
		
		public function check_book_have_list()
		{
			global $db;
			try
			{
				$this->sql			= "SELECT * FROM book_master WHERE ( book_isbn_no='".$this->fldisbn."' or book_title = '".addslashes(addslashes($this->fldtitle))."') AND book_user_ref_id = $this->userId";
				$this->rsCnt		= $db->executeQuery($this->sql);
				if ($this->rsCnt > 0)
				{
					return "1"; 
				}
				else
				{
					return "0";	
				}
			}
			catch(Exception $e)
			{
				throw new ConnectionException("Could not fetch the country table ".$e);
			}
		}
		
		public function fill_genre_main_list($tmp_genreId)
		{
			global $db;
			try
			{
				$tmp_genreId		= explode(",",$tmp_genreId);
				$this->sql			= "SELECT * FROM genre_master WHERE is_active='Y' and parent_id = '0' ORDER BY genre_name";
				$this->rsCnt		= $db->executeQuery($this->sql);
				if ($this->rsCnt > 0)
				{
					$this->rsGenre			= $db->getResultSetArray();
					for($i=0;$i<$this->rsCnt;$i++)
					{	
						$this->rowGenre		= $this->rsGenre[$i];
						$this->GenreId		= $this->rowGenre['genre_id'];
						$this->GenreName	= strip($this->rowGenre['genre_name']);
						echo "<option value=\"{$this->GenreId}\"";
						for($j=0;$j<count($tmp_genreId);$j++)
						{
							if($tmp_genreId[$j] == $this->GenreId)
							{
								echo " selected ";
							}
						}
						echo ">{$this->GenreName}</option>";
					}
				}
			}
			catch(Exception $e)
			{
				throw new ConnectionException("Could not fetch the genre table ".$e);
			}
		}
		
		public function fill_buddies_list($tmp_user_id)
		{
			global $db;
			try
			{
				$this->sql					= "select user_id,CONCAT(user_fname,' ',user_lname) AS name,user_name from user_master INNER JOIN user_friend_master ON user_id = UserFriendId where is_accept_request = 'Y' AND is_block = 'N' AND is_active = 'Y' and UserId={$tmp_user_id} order by user_fname,user_lname";
				$this->rsCnt				= $db->executeQuery($this->sql);
				if ($this->rsCnt > 0)
				{
					$this->rsBuddie			= $db->getResultSetArray();
					for ($i=0;$i<$this->rsCnt;$i++)
					{	
						$this->rowBuddie	= $this->rsBuddie[$i];
						$this->buddie_id	= $this->rowBuddie['user_id'];
						$this->buddie_name	= strip($this->rowBuddie['name']);
						echo "<option value=\"{$this->buddie_id}\">{$this->buddie_name}</option>";
					}
				}
			}
			catch(Exception $e)
			{
				throw new ConnectionException("Could not fetch the genre table ".$e);
			}
		}
		
		
		public function call_no_response_tpl($sender_id,$firstName,$lastName,$author,$title,$userid)
		{
			global $db,$siteTitle,$footer_team,$siteURL;
			 /*************** Send mail to to sender that i have received u r posted book ******/
			 $sqle  			= "SELECT * FROM etemplate_master WHERE etemplate_title = 'No Response'";
			 $rse 			    = $db->executeQuery($sqle);
				
				if($rse > 0 ) 
				{
					$rsTples		= $db->getResultsetArray();
					$rsTple			= $rsTples[0];
					 /********************************Replacing Variables ***********************************************************/
					$this->user_info		= $db->FindOtherValueMutiple("user_master","user_id",$sender_id,"user_fname,user_lname,user_name,user_email,user_id");
					$this->user_info		= explode("&nbsp;",$this->user_info);
					$this->account_url	= "<a href='".$siteURL."my-account.php'>My Account</a>";
					$eDynamicContents					= "";
				
					$eTmpHeader							= str_replace("&lt;%USER_NAME%&gt;",$firstName,$rsTple["etemplate_header"]);
					
					$eTmpHeader							= str_replace("&lt;%SITEUSR_FIRSTNAME%&gt;",$this->user_info[0],$eTmpHeader);
					$eTmpHeader							= str_replace("&lt;%SITEUSR%&gt;",$this->user_info[2],$eTmpHeader);
					
					$eEmailBody							= str_replace("&lt;%SITENAME%&gt;",$siteTitle,$rsTple["etemplate_body"]);
					$eEmailBody							= str_replace("&lt;%BOOK_NAME%&gt;",$title,$eEmailBody);
					
					$eEmailBody							= str_replace("&lt;%BOOK_AUTHOR%&gt;",$author,$eEmailBody);
					$eEmailBody							= str_replace("&lt;%SITE_URL%&gt;",$siteURL,$eEmailBody);
					$eEmailBody							= str_replace("&lt;%USER_NAME%&gt;",$firstName."&nbsp;".$lastName,$eEmailBody);
					$eEmailBody							= str_replace("&lt;%MY_ACCOUNT_URL%&gt;",$this->account_url,$eEmailBody);
					
					$eTmpFooter							= str_replace("&lt;%TEAM_NAME%&gt;",$footer_team,$rsTple["etemplate_footer"]);
					/*********************************End here **********************************************************************/
					$eTmpHeader							= nl2br($eTmpHeader);
					$eTmpFooter							= nl2br($eTmpFooter);
					$eEmailBody							= nl2br($eEmailBody);
					
					$eTmpBgColor						= html_entity_decode($rsTple["etemplate_bgcolor"]);
					$eTmpHcolor							= html_entity_decode($rsTple["etemplate_color"]);
					$eSubject							= html_entity_decode(str_replace("&lt;%BOOK_NAME%&gt;",$siteTitle,$rsTple["etemplate_subject"]));
					$fromEmail							= $rsTple["from_email"];
					$title								= html_entity_decode($rsTple["etemplate_title"]);
					
			
					$currDate							= date('dS M, Y');	
					$dir								= $_SERVER['SCRIPT_FILENAME'];
					
					$dir1      							= dirname($dir); 												
					$fpRead							 	= fopen($dir1 . "/template/email.tpl","r+");
					$content						 	= fread($fpRead,filesize($dir1 . "/template/email.tpl"));
									
					$content							= str_replace("<%INC_EMAIL_HEADER_COLOR%>",$eTmpHcolor,$content);
					$content							= str_replace("<%INC_EMAIL_BG_COLOR%>",$eTmpBgColor,$content);
					$content							= str_replace("<%INC_EMAIL_BODY_TITLE%>",$title,$content);
					$content							= str_replace("<%INC_EMAIL_BGCOLOR%>",$eTmpFooter,$content);
					$content							= str_replace("<%INC_EMAIL_DATE%>",$currDate,$content);
					$content							= str_replace("<%INC_EMAIL_HEADER%>",$eTmpHeader,$content);
					$content							= str_replace("<%INC_DYNAMIC_CONTENT%>",$eDynamicContents,$content);
					$content							= str_replace("<%INC_EMAIL_FOOTER%>",$eTmpFooter,$content);
					$content							= str_replace("<%INC_SITE_NAME%>",$siteTitle,$content);
					$content							= str_replace("<%INC_SITE_URL%>",$siteURL,$content);
					$content							= str_replace("<%INC_DATE%>",date('Y'),$content);
					$content							= str_replace("<%INC_ARTICLE%>",date('Y'),$content);	 
					$content							= str_replace("<%INC_BODY_CONTENT%>",$eEmailBody,$content);
					$fldSubject							= $eSubject;
					$toEmail							= $this->user_info[3];
					SendAutoMail_PHP($toEmail,$fromEmail,$fldSubject,$content);	
					insert_email($userid,$sender_id,$fldSubject,$eEmailBody);
				/* END OF MAIL CODE */
			}//if($rse > 0 ) 
		}
		
		function calculate_credit_books($userid)
		{
			global $db;
			$this->book_count			= 0;
			$this->total_credit_points	= 0;
			$this->sql					= "SELECT total_credit_points,total_posted_books FROM user_master WHERE user_id = $userid";
			$this->cnt					= $db->executeQuery($this->sql);
			
			if($this->cnt > 0 )
			{
				$this->rs				= $db->getResultsetArray();
				$this->row				= $this->rs[0];
				
				$this->book_count		= $this->book_count + $this->row['total_posted_books'];
				$this->book_count		= $this->book_count + 1;

				$this->total_credit_points	= 0 + $this->row['total_credit_points'];
				
				if($this->book_count % 5 == 0 )
				{
					$this->total_credit_points	= $this->total_credit_points + 1;
				}
				
				$this->sql				= "UPDATE user_master SET total_credit_points 	= $this->total_credit_points,
																  total_posted_books	= $this->book_count
										   WHERE user_id	= $userid";
				$db->executeQuery($this->sql);
			}//if($this->cnt > 0 )
		}//function
		
		function calculate_credit_books_minus($userid)
		{
			global $db;
			$this->book_count			= 0;
			$this->total_credit_points	= 0;
			$this->sql					= "SELECT total_credit_points,total_posted_books FROM user_master WHERE user_id = $userid";
			$this->cnt					= $db->executeQuery($this->sql);
			
			if($this->cnt > 0 )
			{
				$this->rs				= $db->getResultsetArray();
				$this->row				= $this->rs[0];
				
				$this->book_count		= $this->book_count + $this->row['total_posted_books'];
				$this->book_count		= $this->book_count - 1;

				$this->total_credit_points	= 0 + $this->row['total_credit_points'];
				
				if($this->book_count % 5 == 0 )
				{
					$this->total_credit_points	= $this->total_credit_points - 1;
				}
				
				$this->sql				= "UPDATE user_master SET total_credit_points 	= $this->total_credit_points,
																  total_posted_books	= $this->book_count
										  			 WHERE user_id	= $userid";
				$db->executeQuery($this->sql);
			}//if($this->cnt > 0 )
		}//function
		
		public function call_tot_req_books($userId)
		{
			global $db;
			$this->sql					= "SELECT count(book_request_id)as reqbooks FROM book_request_master
											WHERE book_request_user_ref_id = $userId AND is_process_status not in ('Cancel','C')";
			$this->cnt					= $db->executeQuery($this->sql);
			
			return $this->cnt;
		}
		
		public function get_book_owner($tmp_book_id)
		{
			global $db;
			$this->sqlBook					= "SELECT book_user_ref_id FROM book_master WHERE book_id = '".$tmp_book_id."'";
			$this->totRecBook				= $db->executeQuery($this->sqlBook);
			if($this->totRecBook > 0)
			{
				$this->rsBook				= $db->getResultSetArray();
				$this->rowBook				= $this->rsBook[0];
				$this->user_id				= $this->rowBook['book_user_ref_id'];
				return $this->user_id;
			}
		}
		
		public function get_book_title_owner_id($tmp_book_title)
		{
			global $db;
			$this->sqlBook					= "SELECT book_user_ref_id FROM book_master WHERE book_title = '".addslashes(addslashes($tmp_book_title))."'";
			$this->totRecBook				= $db->executeQuery($this->sqlBook);
			if($this->totRecBook > 0)
			{
				$this->rsBook				= $db->getResultSetArray();
				$this->rowBook				= $this->rsBook[0];
				$this->user_id				= $this->rowBook['book_user_ref_id'];
				return $this->user_id;
			}
		}
		
		
		//---------- Total Number Of Books Posted ----------//
		public function total_books_posted()
		{
			global $db;
			$this->sql						= " SELECT count(*)as TotalBooksCnt FROM book_master WHERE is_active = 'Y' ";
			$this->total_books_posted		= $db->executeQuery($this->sql);
			if($this->total_books_posted > 0)
			{
				$this->rsBook				= $db->getResultSetArray();
				$this->rowBook				= $this->rsBook[0];
				$this->TotalBooksCnt		= $this->rowBook['TotalBooksCnt'];
			}
			return $this->TotalBooksCnt;
		}
		
		//---------- Total Number Of Clubs Books Posted ----------//
		public function total_club_books_posted()
		{
			global $db;
			$this->sql						= " SELECT count(*)as TotalClubBooksCnt FROM book_master
													WHERE is_active = 'Y' AND book_club_ref_id != '0' ";
			$this->total_club_books_posted	= $db->executeQuery($this->sql);
			if($this->total_club_books_posted > 0)
			{
				$this->rsBook				= $db->getResultSetArray();
				$this->rowBook				= $this->rsBook[0];
				$this->TotalClubBooksCnt	= $this->rowBook['TotalClubBooksCnt'];
			}
			return $this->TotalClubBooksCnt;
		}
		
		//---------- Total Number Of Site Users Posted ----------//
		public function total_number_siteusers()
		{
			global $db;
			$this->sql						= " SELECT count(*)as TotalMembers FROM user_master
												WHERE is_active = 'Y' AND is_confirm = 'Y' ";
			$this->total_number_siteusers	= $db->executeQuery($this->sql);
			if($this->total_number_siteusers > 0)
			{
				$this->rsBook				= $db->getResultSetArray();
				$this->rowBook				= $this->rsBook[0];
				$this->TotalMembers			= $this->rowBook['TotalMembers'];
			}
			return $this->TotalMembers;
		}
		
		//---------- Total Number Of Clubs Posted ----------//
		public function total_number_clubs()
		{
			global $db;
			$this->sql						= " SELECT count(*)as TotalClubs FROM club_master
											WHERE is_active = 'Y' ";
			$this->total_number_clubs		= $db->executeQuery($this->sql);
			if($this->total_number_clubs > 0)
			{
				$this->rsBook				= $db->getResultSetArray();
				$this->rowBook				= $this->rsBook[0];
				$this->TotalClubs			= $this->rowBook['TotalClubs'];
			}
			return $this->TotalClubs;
		}
		
		//---------- Total Number Of Clubs Members ----------//
		public function total_number_clubs_members()
		{
			global $db;
			$this->sql							= " SELECT count(*)as TotalClubsMembers FROM club_member_master
														WHERE is_active = 'Y' ";
			$this->total_number_clubs_members	= $db->executeQuery($this->sql);
			if($this->total_number_clubs_members > 0)
			{
				$this->rsBook				= $db->getResultSetArray();
				$this->rowBook				= $this->rsBook[0];
				$this->TotalClubsMembers	= $this->rowBook['TotalClubsMembers'];
			}
			return $this->TotalClubsMembers;
		}
		
		//---------- Total Number Of Clubs Members ----------//
		public function total_number_books_exchanged()
		{
			global $db;
			$this->sql						= " SELECT count(*)as TotalBooksExchanged FROM book_request_master WHERE is_process_status = 'C' ";
			$this->total_number_books_exchanged	= $db->executeQuery($this->sql);
			if($this->total_number_books_exchanged > 0)
			{
				$this->rsBook				= $db->getResultSetArray();
				$this->rowBook				= $this->rsBook[0];
				$this->TotalBooksExchanged	= $this->rowBook['TotalBooksExchanged'];
			}
			return $this->TotalBooksExchanged;
		}
		
		public function get_user_email($tmp_id)
		{
			global $db;
			$this->sql					= "SELECT user_email FROM user_master WHERE user_id = '$tmp_id' ";
			$this->cnt					= $db->executeQuery($this->sql);
			if($this->cnt > 0)
			{
				$this->rsEmail			= $db->getResultSetArray();
				$this->rowEmail			= $this->rsEmail[0];
				$this->UserEmail		= $this->rowEmail['user_email'];
			}
			return $this->UserEmail;
		}
		
		public function total_books_user_posted($tmp_id)
		{
			global $db;
			//$this->sql					= "SELECT count(*) as TotalBooksCnt FROM book_master WHERE is_active = 'Y' AND book_user_ref_id = '$tmp_id'";
			//$this->sql					= "SELECT count(*) as TotalBooksCnt FROM book_master WHERE is_active = 'Y' AND book_user_ref_id = '$tmp_id'";
			$this->sql						= "SELECT COUNT(*) AS TotalBooksCnt FROM book_user bu 
												LEFT JOIN  book_master bm ON bu.book_id=bm.book_id
												WHERE bu.user_id = '$tmp_id' AND bu.read_status IN ( 1, 2, 3 ) AND bm.book_title!='' AND bu.is_book_delete='N'";
			$this->total_books_posted	= $db->executeQuery($this->sql);
			if($this->total_books_posted > 0)
			{
				$this->rsBook			= $db->getResultSetArray();
				$this->rowBook			= $this->rsBook[0];
				$this->TotalBooksCnt	= $this->rowBook['TotalBooksCnt'];
			}
			return $this->TotalBooksCnt;
		}
		
		public function total_books_user_want($tmp_id)
		{
			global $db;
			$this->sql					= "SELECT count(*) as BooksCnt FROM book_want_master WHERE book_user_ref_id = '$tmp_id'";
			$this->total_books_posted	= $db->executeQuery($this->sql);
			if($this->total_books_posted > 0)
			{
				$this->rsBook			= $db->getResultSetArray();
				$this->rowBook			= $this->rsBook[0];
				$this->TotalBooksCnt	= $this->rowBook['BooksCnt'];
			}
			return $this->TotalBooksCnt;
		}
		
		public function total_books_request_user($tmp_id)
		{
			global $db;
			$this->sql					= "SELECT count(*) as BooksCnt FROM book_request_master WHERE book_request_user_ref_id = '$tmp_id' AND is_process_status IN('P','A')";
			$this->total_books_posted	= $db->executeQuery($this->sql);
			if($this->total_books_posted > 0)
			{
				$this->rsBook			= $db->getResultSetArray();
				$this->rowBook			= $this->rsBook[0];
				$this->TotalBooksCnt	= $this->rowBook['BooksCnt'];
			}
			return $this->TotalBooksCnt;
		}
		
		public function total_books_request_user_recieve($tmp_id)
		{
			global $db;
			$this->sql					= "SELECT count(*) as BooksCnt FROM book_request_master WHERE book_request_reciever_userid = '$tmp_id' AND is_process_status IN('P','A')";
			$this->total_books_posted	= $db->executeQuery($this->sql);
			if($this->total_books_posted > 0)
			{
				$this->rsBook			= $db->getResultSetArray();
				$this->rowBook			= $this->rsBook[0];
				$this->TotalBooksCnt	= $this->rowBook['BooksCnt'];
			}
			return $this->TotalBooksCnt;
		}
		
		public function total_books_user_recieved($tmp_id)
		{
			global $db;
			$this->sql					= "SELECT count(*) as BooksCnt FROM book_request_master WHERE book_request_user_ref_id = '$tmp_id' AND is_process_status = 'C'";
			$this->total_books_posted	= $db->executeQuery($this->sql);
			if($this->total_books_posted > 0)
			{
				$this->rsBook			= $db->getResultSetArray();
				$this->rowBook			= $this->rsBook[0];
				$this->TotalBooksCnt	= $this->rowBook['BooksCnt'];
			}
			return $this->TotalBooksCnt;
		}
		
		public function total_books_ican_recieve($tmp_id)
		{
			global $db;
			$this->sql					= "SELECT * FROM book_want_master LEFT JOIN book_master 
												 					ON book_want_master.book_title = book_master.book_title
														WHERE book_want_master.book_user_ref_id = $tmp_id
										 			 AND status='N' AND book_master.book_user_ref_id != $tmp_id";
			$this->total_books			= $db->executeQuery($this->sql);
			return $this->total_books;
		}
		
		
		/********************** Send Book Request Email Function *****************************************************************************/
		function send_book_request($book_ref_id,$user_name,$user_fname,$title,$author,$FirstName,$LastName,$user_email,$user_id,$userId)
		{
			global $db,$siteURL,$siteTitle,$footer_team;
			$sqle  			= "SELECT * FROM etemplate_master WHERE etemplate_title = 'Books Request'";
			$rse 			= $db->executeQuery($sqle);
			
			if($rse > 0 ) 
			{
				$rsTples		= $db->getResultsetArray();
				$rsTple			= $rsTples[0];
				 /********************************Replacing Variables ***********************************************************/
				$this->help_desk_link			= "<a href='".$siteURL."help-desk.php' class='blackLink'>Help Me</a>";
				$this->book_accept_link			= "<a href='".$siteURL."request-recieved.php' class='blackLink'>Accept Request</a>";
				$eDynamicContents					= "";
				
				$eTmpHeader							= str_replace("&lt;%SITEUSR%&gt;",$this->user_name,$rsTple["etemplate_header"]);
				$eTmpHeader							= str_replace("&lt;%SITEUSR_FIRSTNAME%&gt;",$this->user_fname,$eTmpHeader);
				
				
				$eEmailBody							= str_replace("&lt;%SITENAME%&gt;",$siteTitle,$rsTple["etemplate_body"]);
				$eEmailBody							= str_replace("&lt;%BOOK_NAME%&gt;",$this->title,$eEmailBody);
				
				$eEmailBody							= str_replace("&lt;%BOOK_AUTHOR%&gt;",$this->author,$eEmailBody);
				$eEmailBody							= str_replace("&lt;%URL_ACCEPT_REQ%&gt;",$this->book_accept_link,$eEmailBody);
				$eEmailBody							= str_replace("&lt;%HELP_DESK_LINK%&gt;",$this->help_desk_link,$eEmailBody);
				$eEmailBody							= str_replace("&lt;%SITE_URL%&gt;",$siteURL,$eEmailBody);
				$eEmailBody							= str_replace("&lt;%USER_NAME%&gt;",$FirstName."&nbsp;".$LastName,$eEmailBody);
				
				$eTmpFooter							= str_replace("&lt;%TEAM_NAME%&gt;",$footer_team,$rsTple["etemplate_footer"]);
				/*********************************End here **********************************************************************/
				$eTmpHeader							= nl2br($eTmpHeader);
				$eTmpFooter							= nl2br($eTmpFooter);
				$eEmailBody							= nl2br($eEmailBody);
				
				$eTmpBgColor						= html_entity_decode($rsTple["etemplate_bgcolor"]);
				$eTmpHcolor							= html_entity_decode($rsTple["etemplate_color"]);
				$eSubject							= html_entity_decode($rsTple["etemplate_subject"]);
				$fromEmail							= $rsTple["from_email"];
				$title								= html_entity_decode($rsTple["etemplate_title"]);
		
				$currDate							= date('dS M, Y');	
				$dir								= $_SERVER['SCRIPT_FILENAME'];
				
				$dir1      							= dirname($dir); 												
				$fpRead							 	= fopen($dir1 . "/template/email.tpl","r+");
				$content						 	= fread($fpRead,filesize($dir1 . "/template/email.tpl"));
								
				$content							= str_replace("<%INC_EMAIL_HEADER_COLOR%>",$eTmpHcolor,$content);
				$content							= str_replace("<%INC_EMAIL_BG_COLOR%>",$eTmpBgColor,$content);
				$content							= str_replace("<%INC_EMAIL_BODY_TITLE%>",$title,$content);
				$content							= str_replace("<%INC_EMAIL_BGCOLOR%>",$eTmpFooter,$content);
				$content							= str_replace("<%INC_EMAIL_DATE%>",$currDate,$content);
				$content							= str_replace("<%INC_EMAIL_HEADER%>",$eTmpHeader,$content);
				$content							= str_replace("<%INC_DYNAMIC_CONTENT%>",$eDynamicContents,$content);
				$content							= str_replace("<%INC_EMAIL_FOOTER%>",$eTmpFooter,$content);
				$content							= str_replace("<%INC_SITE_NAME%>",$siteTitle,$content);
				$content							= str_replace("<%INC_SITE_URL%>",$siteURL,$content);
				$content							= str_replace("<%INC_DATE%>",date('Y'),$content);
				$content							= str_replace("<%INC_ARTICLE%>",date('Y'),$content);	 
				$content							= str_replace("<%INC_BODY_CONTENT%>",$eEmailBody,$content);
				$fldSubject							= $eSubject;
				$toEmail							= $this->user_email;
								
				SendAutoMail_PHP($toEmail,$fromEmail,$fldSubject,$content);	
				insert_email($this->userId,$this->user_id,$fldSubject,$eEmailBody);
				
			/* END OF MAIL CODE */
		}//if($rse > 0 ) 
	}//send_book_request
/********************** end here *****************************************************************************************************/

	function request_cancelled($book_rec_id,$book_title,$book_author,$FirstName,$LastName,$userId)
	{
		global $db,$siteURL,$siteTitle,$footer_team;
				
		$sqle  			= "SELECT * FROM etemplate_master WHERE etemplate_title = 'Book Request Cancelled'";
		$rse 			= $db->executeQuery($sqle);
		if($rse > 0 ) 
		{
			$rsTples		= $db->getResultsetArray();
			$rsTple			= $rsTples[0];
			
			$this->user_info		= $db->FindOtherValueMutiple("user_master","user_id",$this->book_rec_id,"user_fname,user_lname,user_name,user_email,user_id");
			$this->user_info		= explode("&nbsp;",$this->user_info);
			 /********************************Replacing Variables ***********************************************************/
			$this->help_desk_link			= "<a href='".$siteURL."help-desk.php' class='blackLink'>Help Me</a>";
			$eDynamicContents					= "";
			
			$eTmpHeader							= str_replace("&lt;%SITEUSR%&gt;",$this->user_info[2],$rsTple["etemplate_header"]);
			$eTmpHeader							= str_replace("&lt;%SITEUSR_FIRSTNAME%&gt;",$this->user_info[0],$eTmpHeader);
			
			
			$eEmailBody							= str_replace("&lt;%SITENAME%&gt;",$siteTitle,$rsTple["etemplate_body"]);
			$eEmailBody							= str_replace("&lt;%BOOK_NAME%&gt;",$this->book_title,$eEmailBody);
			
			$eEmailBody							= str_replace("&lt;%BOOK_AUTHOR%&gt;",$this->book_author,$eEmailBody);
			$eEmailBody							= str_replace("&lt;%HELP_DESK_LINK%&gt;",$this->help_desk_link,$eEmailBody);
			$eEmailBody							= str_replace("&lt;%SITE_URL%&gt;",$siteURL,$eEmailBody);
			$eEmailBody							= str_replace("&lt;%USER_NAME%&gt;",$FirstName."&nbsp;".$LastName,$eEmailBody);
			
			$eTmpFooter							= str_replace("&lt;%TEAM_NAME%&gt;",$footer_team,$rsTple["etemplate_footer"]);
			/*********************************End here **********************************************************************/
			$eTmpHeader							= nl2br($eTmpHeader);
			$eTmpFooter							= nl2br($eTmpFooter);
			$eEmailBody							= nl2br($eEmailBody);
			
			$eTmpBgColor						= html_entity_decode($rsTple["etemplate_bgcolor"]);
			$eTmpHcolor							= html_entity_decode($rsTple["etemplate_color"]);
			$eSubject							= html_entity_decode($rsTple["etemplate_subject"]);
			$fromEmail							= $rsTple["from_email"];
			$title								= html_entity_decode($rsTple["etemplate_title"]);
			
	
			$currDate							= date('dS M, Y');	
			$dir								= $_SERVER['SCRIPT_FILENAME'];
			
			$dir1      							= dirname($dir); 												
			$fpRead							 	= fopen($dir1 . "/template/email.tpl","r+");
			$content						 	= fread($fpRead,filesize($dir1 . "/template/email.tpl"));
							
			$content							= str_replace("<%INC_EMAIL_HEADER_COLOR%>",$eTmpHcolor,$content);
			$content							= str_replace("<%INC_EMAIL_BG_COLOR%>",$eTmpBgColor,$content);
			$content							= str_replace("<%INC_EMAIL_BODY_TITLE%>",$title,$content);
			$content							= str_replace("<%INC_EMAIL_BGCOLOR%>",$eTmpFooter,$content);
			$content							= str_replace("<%INC_EMAIL_DATE%>",$currDate,$content);
			$content							= str_replace("<%INC_EMAIL_HEADER%>",$eTmpHeader,$content);
			$content							= str_replace("<%INC_DYNAMIC_CONTENT%>",$eDynamicContents,$content);
			$content							= str_replace("<%INC_EMAIL_FOOTER%>",$eTmpFooter,$content);
			$content							= str_replace("<%INC_SITE_NAME%>",$siteTitle,$content);
			$content							= str_replace("<%INC_SITE_URL%>",$siteURL,$content);
			$content							= str_replace("<%INC_DATE%>",date('Y'),$content);
			$content							= str_replace("<%INC_ARTICLE%>",date('Y'),$content);	 
			$content							= str_replace("<%INC_BODY_CONTENT%>",$eEmailBody,$content);
			$fldSubject							= $eSubject;
			$toEmail							= $this->user_info[3];
						
			SendAutoMail_PHP($toEmail,$fromEmail,$fldSubject,$content);	
			insert_email($userId,$this->user_info[4],$fldSubject,$eEmailBody);
		
			/* END OF MAIL CODE */
	}//if($rse > 0 ) 
  }//function 	
  			
  function request_mailed($receiver_id,$book_title,$book_author,$FirstName,$LastName,$userId)
  {
	global $db,$siteURL,$siteTitle,$footer_team;
	
	$sqle  			= "SELECT * FROM etemplate_master WHERE etemplate_title = 'Mailed Your requested Book'";
	$rse 			= $db->executeQuery($sqle);
		
	if($rse > 0 ) 
	{
		$rsTples		= $db->getResultsetArray();
		$rsTple			= $rsTples[0];
		/********************************Replacing Variables ***********************************************************/
		$this->user_info		= $db->FindOtherValueMutiple("user_master","user_id",$this->receiver_id,"user_fname,user_lname,user_name,user_email,user_id");
		$this->user_info		= explode("&nbsp;",$this->user_info);
		$this->account_url	= "<a href='".$siteURL."my-account.php'>My Account</a>";
		$eDynamicContents		= "";
	
		$eTmpHeader				= str_replace("&lt;%USER_NAME%&gt;",$FirstName,$rsTple["etemplate_header"]);
		$eTmpHeader				= str_replace("&lt;%SITEUSR_FIRSTNAME%&gt;",$this->user_info[0],$eTmpHeader);
		$eTmpHeader				= str_replace("&lt;%SITEUSR%&gt;",$this->user_info[2],$eTmpHeader);
		$eEmailBody				= str_replace("&lt;%SITENAME%&gt;",$siteTitle,$rsTple["etemplate_body"]);
		$eEmailBody				= str_replace("&lt;%BOOK_NAME%&gt;",$this->title,$eEmailBody);
		$eEmailBody				= str_replace("&lt;%BOOK_AUTHOR%&gt;",$this->author,$eEmailBody);
		$eEmailBody				= str_replace("&lt;%SITE_URL%&gt;",$siteURL,$eEmailBody);
		$eEmailBody				= str_replace("&lt;%USER_NAME%&gt;",$FirstName."&nbsp;".$LastName,$eEmailBody);
		$eEmailBody				= str_replace("&lt;%MY_ACCOUNT_URL%&gt;",$this->account_url,$eEmailBody);
		$eTmpFooter				= str_replace("&lt;%TEAM_NAME%&gt;",$footer_team,$rsTple["etemplate_footer"]);
		/*********************************End here **********************************************************************/
		$eTmpHeader				= nl2br($eTmpHeader);
		$eTmpFooter				= nl2br($eTmpFooter);
		$eEmailBody				= nl2br($eEmailBody);
		$eTmpBgColor			= html_entity_decode($rsTple["etemplate_bgcolor"]);
		$eTmpHcolor				= html_entity_decode($rsTple["etemplate_color"]);
		$eSubject				= html_entity_decode(str_replace("&lt;%BOOK_NAME%&gt;",$siteTitle,$rsTple["etemplate_subject"]));
		$fromEmail				= $rsTple["from_email"];
		$title					= html_entity_decode($rsTple["etemplate_title"]);
		$currDate				= date('dS M, Y');	
		$dir					= $_SERVER['SCRIPT_FILENAME'];
		$dir1      				= dirname($dir); 												
		$fpRead					= fopen($dir1 . "/template/email.tpl","r+");
		$content				= fread($fpRead,filesize($dir1 . "/template/email.tpl"));
						
		$content				= str_replace("<%INC_EMAIL_HEADER_COLOR%>",$eTmpHcolor,$content);
		$content				= str_replace("<%INC_EMAIL_BG_COLOR%>",$eTmpBgColor,$content);
		$content				= str_replace("<%INC_EMAIL_BODY_TITLE%>",$title,$content);
		$content				= str_replace("<%INC_EMAIL_BGCOLOR%>",$eTmpFooter,$content);
		$content				= str_replace("<%INC_EMAIL_DATE%>",$currDate,$content);
		$content				= str_replace("<%INC_EMAIL_HEADER%>",$eTmpHeader,$content);
		$content				= str_replace("<%INC_DYNAMIC_CONTENT%>",$eDynamicContents,$content);
		$content				= str_replace("<%INC_EMAIL_FOOTER%>",$eTmpFooter,$content);
		$content				= str_replace("<%INC_SITE_NAME%>",$siteTitle,$content);
		$content				= str_replace("<%INC_SITE_URL%>",$siteURL,$content);
		$content				= str_replace("<%INC_DATE%>",date('Y'),$content);
		$content				= str_replace("<%INC_ARTICLE%>",date('Y'),$content);	 
		$content				= str_replace("<%INC_BODY_CONTENT%>",$eEmailBody,$content);
		$fldSubject				= $eSubject;
		$toEmail				= $this->user_info[3];
		
		SendAutoMail_PHP($toEmail,$fromEmail,$fldSubject,$content);	
		insert_email($userId,$this->receiver_id,$fldSubject,$eEmailBody);
		
	/* END OF MAIL CODE */
	}//if($rse > 0 ) 
  }//request_mailed
  
  function request_accepted($receiver_id,$book_title,$book_author,$FirstName,$LastName,$userId)
  {
  	global $db,$siteURL,$siteTitle,$footer_team;
	
	$sqle  			= "SELECT * FROM etemplate_master WHERE etemplate_title = 'Accepted Your Book Request'";
	$rse 			= $db->executeQuery($sqle);
		
		if($rse > 0 ) 
		{
			$rsTples		= $db->getResultsetArray();
			$rsTple			= $rsTples[0];
			 /********************************Replacing Variables ***********************************************************/
				$this->user_info		= $db->FindOtherValueMutiple("user_master","user_id",$this->receiver_id,"user_fname,user_lname,user_name,user_email,user_id");
				$this->user_info		= explode("&nbsp;",$this->user_info);
				$this->account_url	= "<a href='".$siteURL."my-account.php'>My Account</a>";
				$eDynamicContents		= "";
			
				$eTmpHeader				= str_replace("&lt;%USER_NAME%&gt;",$FirstName,$rsTple["etemplate_header"]);
				
				$eTmpHeader				= str_replace("&lt;%SITEUSR_FIRSTNAME%&gt;",$this->user_info[0],$eTmpHeader);
				$eTmpHeader				= str_replace("&lt;%SITEUSR%&gt;",$this->user_info[2],$eTmpHeader);
				
				$eEmailBody				= str_replace("&lt;%SITENAME%&gt;",$siteTitle,$rsTple["etemplate_body"]);
				$eEmailBody				= str_replace("&lt;%BOOK_NAME%&gt;",$this->title,$eEmailBody);
				
				$eEmailBody				= str_replace("&lt;%BOOK_AUTHOR%&gt;",$this->author,$eEmailBody);
				$eEmailBody				= str_replace("&lt;%SITE_URL%&gt;",$siteURL,$eEmailBody);
				$eEmailBody				= str_replace("&lt;%USER_NAME%&gt;",$FirstName."&nbsp;".$LastName,$eEmailBody);
				$eEmailBody				= str_replace("&lt;%MY_ACCOUNT_URL%&gt;",$this->account_url,$eEmailBody);
				
				$eTmpFooter				= str_replace("&lt;%TEAM_NAME%&gt;",$footer_team,$rsTple["etemplate_footer"]);
				/*********************************End here **********************************************************************/
				$eTmpHeader				= nl2br($eTmpHeader);
				$eTmpFooter				= nl2br($eTmpFooter);
				$eEmailBody				= nl2br($eEmailBody);
				
				$eTmpBgColor			= html_entity_decode($rsTple["etemplate_bgcolor"]);
				$eTmpHcolor				= html_entity_decode($rsTple["etemplate_color"]);
				$eSubject				= html_entity_decode(str_replace("&lt;%BOOK_NAME%&gt;",$siteTitle,$rsTple["etemplate_subject"]));
				$fromEmail				= $rsTple["from_email"];
				$title					= html_entity_decode($rsTple["etemplate_title"]);
				
		
				$currDate				= date('dS M, Y');	
				$dir					= $_SERVER['SCRIPT_FILENAME'];
				
				$dir1      				= dirname($dir); 												
				$fpRead					= fopen($dir1 . "/template/email.tpl","r+");
				$content				= fread($fpRead,filesize($dir1 . "/template/email.tpl"));
								
				$content				= str_replace("<%INC_EMAIL_HEADER_COLOR%>",$eTmpHcolor,$content);
				$content				= str_replace("<%INC_EMAIL_BG_COLOR%>",$eTmpBgColor,$content);
				$content				= str_replace("<%INC_EMAIL_BODY_TITLE%>",$title,$content);
				$content				= str_replace("<%INC_EMAIL_BGCOLOR%>",$eTmpFooter,$content);
				$content				= str_replace("<%INC_EMAIL_DATE%>",$currDate,$content);
				$content				= str_replace("<%INC_EMAIL_HEADER%>",$eTmpHeader,$content);
				$content				= str_replace("<%INC_DYNAMIC_CONTENT%>",$eDynamicContents,$content);
				$content				= str_replace("<%INC_EMAIL_FOOTER%>",$eTmpFooter,$content);
				$content				= str_replace("<%INC_SITE_NAME%>",$siteTitle,$content);
				$content				= str_replace("<%INC_SITE_URL%>",$siteURL,$content);
				$content				= str_replace("<%INC_DATE%>",date('Y'),$content);
				$content				= str_replace("<%INC_ARTICLE%>",date('Y'),$content);	 
				$content				= str_replace("<%INC_BODY_CONTENT%>",$eEmailBody,$content);
				$fldSubject				= $eSubject;
				
				
				$toEmail				= $this->user_info[3];
					
				SendAutoMail_PHP($toEmail,$fromEmail,$fldSubject,$content);	
				insert_email($userId,$this->receiver_id,$fldSubject,$eEmailBody);
				
		/* END OF MAIL CODE */
	}//if($rse > 0 ) 
  }//function 
  
  
  function received_book($sender_id,$FirstName,$LastName,$title,$author,$userId)
  {
  	global  $db,$siteURL,$siteTitle,$footer_team;
	
	 $sqle  			= "SELECT * FROM etemplate_master WHERE etemplate_title = 'Received Book'";
	 $rse 				= $db->executeQuery($sqle);
		
		if($rse > 0 ) 
		{
			$rsTples		= $db->getResultsetArray();
			$rsTple			= $rsTples[0];
			 /********************************Replacing Variables ***********************************************************/
			$this->user_info		= $db->FindOtherValueMutiple("user_master","user_id",$sender_id,"user_fname,user_lname,user_name,user_email,user_id");
			$this->user_info		= explode("&nbsp;",$this->user_info);
			$this->account_url	= "<a href='".$siteURL."my-account.php'>My Account</a>";
			$eDynamicContents		= "";
		
			$eTmpHeader				= str_replace("&lt;%USER_NAME%&gt;",$FirstName,$rsTple["etemplate_header"]);
			
			$eTmpHeader				= str_replace("&lt;%SITEUSR_FIRSTNAME%&gt;",$this->user_info[0],$eTmpHeader);
			$eTmpHeader				= str_replace("&lt;%SITEUSR%&gt;",$this->user_info[2],$eTmpHeader);
			
			$eEmailBody				= str_replace("&lt;%SITENAME%&gt;",$siteTitle,$rsTple["etemplate_body"]);
			$eEmailBody				= str_replace("&lt;%BOOK_NAME%&gt;",$title,$eEmailBody);
			
			$eEmailBody				= str_replace("&lt;%BOOK_AUTHOR%&gt;",$author,$eEmailBody);
			$eEmailBody				= str_replace("&lt;%SITE_URL%&gt;",$siteURL,$eEmailBody);
			$eEmailBody				= str_replace("&lt;%USER_NAME%&gt;",$FirstName."&nbsp;".$LastName,$eEmailBody);
			$eEmailBody				= str_replace("&lt;%MY_ACCOUNT_URL%&gt;",$this->account_url,$eEmailBody);
			
			$eTmpFooter				= str_replace("&lt;%TEAM_NAME%&gt;",$footer_team,$rsTple["etemplate_footer"]);
			/*********************************End here **********************************************************************/
			$eTmpHeader				= nl2br($eTmpHeader);
			$eTmpFooter				= nl2br($eTmpFooter);
			$eEmailBody				= nl2br($eEmailBody);
			
			$eTmpBgColor			= html_entity_decode($rsTple["etemplate_bgcolor"]);
			$eTmpHcolor				= html_entity_decode($rsTple["etemplate_color"]);
			$eSubject				= html_entity_decode(str_replace("&lt;%BOOK_NAME%&gt;",$siteTitle,$rsTple["etemplate_subject"]));
			$fromEmail				= $rsTple["from_email"];
			$title					= html_entity_decode($rsTple["etemplate_title"]);
			
	
			$currDate				= date('dS M, Y');	
			$dir					= $_SERVER['SCRIPT_FILENAME'];
			
			$dir1      				= dirname($dir); 												
			$fpRead					= fopen($dir1 . "/template/email.tpl","r+");
			$content				= fread($fpRead,filesize($dir1 . "/template/email.tpl"));
							
			$content				= str_replace("<%INC_EMAIL_HEADER_COLOR%>",$eTmpHcolor,$content);
			$content				= str_replace("<%INC_EMAIL_BG_COLOR%>",$eTmpBgColor,$content);
			$content				= str_replace("<%INC_EMAIL_BODY_TITLE%>",$title,$content);
			$content				= str_replace("<%INC_EMAIL_BGCOLOR%>",$eTmpFooter,$content);
			$content				= str_replace("<%INC_EMAIL_DATE%>",$currDate,$content);
			$content				= str_replace("<%INC_EMAIL_HEADER%>",$eTmpHeader,$content);
			$content				= str_replace("<%INC_DYNAMIC_CONTENT%>",$eDynamicContents,$content);
			$content				= str_replace("<%INC_EMAIL_FOOTER%>",$eTmpFooter,$content);
			$content				= str_replace("<%INC_SITE_NAME%>",$siteTitle,$content);
			$content				= str_replace("<%INC_SITE_URL%>",$siteURL,$content);
			$content				= str_replace("<%INC_DATE%>",date('Y'),$content);
			$content				= str_replace("<%INC_ARTICLE%>",date('Y'),$content);	 
			$content				= str_replace("<%INC_BODY_CONTENT%>",$eEmailBody,$content);
			$fldSubject				= $eSubject;
			$toEmail				= $this->user_info[3];
								
			SendAutoMail_PHP($toEmail,$fromEmail,$fldSubject,$content);	
			insert_email($userId,$sender_id,$fldSubject,$eEmailBody);
			
		/* END OF MAIL CODE */
		}//if($rse > 0 ) 
	}//function
	
	public function add_details()
	{
		global $db;
		//if($this->part == 0)
		//{
			$this->sql	= "INSERT INTO library_master(club_lib_ref_id,club_lib_user_id,club_lib_deposite_perbook,club_lib_fee_perbook,club_lib_more_details,added_on) 
													VALUES('".$this->clubid."','".$this->userid."','".$this->depositeFees."','".$this->perbookFees."',
													'".$this->perbookMore."',now())";
			$this->res	= $db->executeQuery($this->sql);
		//}
		/*elseif($this->part == 1)
		{
			$this->sql	= "UPDATE library_master SET club_lib_deposite_perbook = '".$this->depositeFees."',
													 club_lib_fee_perbook	   = '".$this->perbookFees."',
													 club_lib_more_details	   = '".$this->perbookMore."'
												WHERE club_lib_id = '".$this->lib_id."'";
			$this->res	= $db->executeQuery($this->sql);
		}*/
	}
  
  	public function add_lib_member()
	{
		global $db;
		$this->sql				= "INSERT INTO library_member_master (lib_mem_ref_id,lib_club_ref_id,lib_ref_id,lib_mem_join_date,lib_mem_active,lib_mem_tot_books,lib_mem_deposit,lib_mem_lib_fees,lib_mem_credit_bal) 
															VALUES ({$this->member_id},{$this->clubid},{$this->lib_id},now(),'Y',{$this->tot_book_required},{$this->depositeLib},{$this->feesLib},0)";
		$this->res				= $db->Execute_Add_Update_Delete_Query($this->sql);
		if($this->res>0)
		{
			$this->sql_new		= "INSERT INTO library_member_deposit_master (lib_ref_id,lib_mem_ref_id,lib_club_ref_id,tot_req_book,deposit_amt,book_rent) 
															VALUES ({$this->lib_id},{$this->member_id},{$this->clubid},{$this->tot_book_required},{$this->depositeLib},{$this->feesLib})";
			$this->res_new		= $db->Execute_Add_Update_Delete_Query($this->sql_new);
			$this->sql_new		= "INSERT INTO user_credit_master (user_ref_id,total_points,points_type,points_details,added_on) 
															VALUES ({$this->member_id},{$this->tot_book_req_credit},'Debit','Join {$this->club_name} Club Library',now())";
			$this->res_new		= $db->Execute_Add_Update_Delete_Query($this->sql_new);
			update_user_credit_points("user_master","total_credit_points",$this->tot_book_req_credit,$this->member_id);
		}

	}
	
	function deposit_sum($tmp_club_id,$tmp_lib_id,$tmp_user_id)
	{			
		global $db;
		$this->sql_deposit				= "SELECT  sum(deposit_amt*tot_req_book) AS deposit_amt FROM library_member_deposit_master WHERE lib_ref_id = {$tmp_lib_id} AND lib_club_ref_id = {$tmp_club_id} AND lib_mem_ref_id = {$tmp_user_id}";
		$this->res_deposit				= $db->executeQuery($this->sql_deposit);
		if($this->res_deposit>0)
		{
			$this->rs_deposit			= $db->getResultSetArray();
			$this->row_deposit			= $this->rs_deposit[0];
			return $this->row_deposit['deposit_amt'];
		}
		else
		{
			return "";
		}
	}	
	
	//by pravin---
	public function total_books_user_reading($tmp_id,$radstatus)
		{
			global $db;
			//$this->sql						= "SELECT COUNT(*) AS TotalCnt FROM book_user WHERE read_status = '".$radstatus."' AND user_id = '$tmp_id'";
			
			if($radstatus!=4)
			{
			$this->sql						= "SELECT COUNT(*) AS TotalCnt FROM book_user bu 
												LEFT JOIN  book_master bm ON bu.book_id=bm.book_id
												WHERE bu.read_status = '".$radstatus."' AND bu.user_id = '$tmp_id' AND bm.book_title!='' AND bu.is_book_delete='N'";
			}
			else if($radstatus==4)
			{
			 $this->sql						= "SELECT COUNT(*) AS TotalCnt FROM book_user bu 
												LEFT JOIN  book_master bm ON bu.book_id=bm.book_id
												WHERE bu.wish_status = '1' AND bu.user_id = '$tmp_id' AND bm.book_title!='' AND bu.is_book_delete='N'";
			}
			$this->total_books_posted	= $db->executeQuery($this->sql);
			if($this->total_books_posted > 0)
			{
				$this->rsBook			= $db->getResultSetArray();
				$this->rowBook			= $this->rsBook[0];
				$this->TotalBooksCnt	= $this->rowBook['TotalCnt'];
			}
			return $this->TotalBooksCnt;
		}
		
		public function getTotalRead($tmp_id,$radstatus)
		{
			global $db;
			$this->sql	= "SELECT COUNT(*) AS TotalCnt FROM book_user WHERE book_id = '".$tmp_id."' and is_book_delete = 'N'";
			$this->total_books_posted	= $db->executeQuery($this->sql);
			
			if($this->total_books_posted > 0)
			{
				$this->rsBook			= $db->getResultSetArray();
				$this->rowBook			= $this->rsBook[0];
				$this->TotalBooksCnt	= $this->rowBook['TotalCnt'];
			}
			return $this->TotalBooksCnt;
		}
		
		
		public function total_deleted_books_user($tmp_id)
		{
			global $db;
			//$this->sql						= "SELECT COUNT(*) AS TotalCnt FROM book_user WHERE read_status = '".$radstatus."' AND user_id = '$tmp_id'";
			$this->sql						= "SELECT COUNT(*) AS TotalCnt FROM book_user 
												WHERE is_book_delete='Y' AND user_id='$tmp_id'";
			$this->total_books_posted	= $db->executeQuery($this->sql);
			if($this->total_books_posted > 0)
			{
				$this->rsBook			= $db->getResultSetArray();
				$this->rowBook			= $this->rsBook[0];
				$this->TotalBooksCnt	= $this->rowBook['TotalCnt'];
			}
			return $this->TotalBooksCnt;
		}
		public function total_books_user_swaping($tmp_id)
		{
			global $db;
			//$this->sql						= "SELECT COUNT(*) AS TotalCnt FROM book_user WHERE read_status = '".$radstatus."' AND user_id = '$tmp_id'";
			$this->sql						= "SELECT COUNT(*) AS TotalCnt FROM book_swap 
												WHERE sender_id='$tmp_id'";
			$this->total_books_posted	= $db->executeQuery($this->sql);
			if($this->total_books_posted > 0)
			{
				$this->rsBook			= $db->getResultSetArray();
				$this->rowBook			= $this->rsBook[0];
				$this->TotalBooksCnt	= $this->rowBook['TotalCnt'];
			}
			return $this->TotalBooksCnt;
		}
		public function latest_added_books($limit)
		{
			global $db;
			$this->sql						="SELECT DISTINCT(book_master.book_id), book_master.book_cover_image,book_master.book_author,
											book_master.book_rating, book_master.book_title, book_master.book_description,
											book_master.book_club_ref_id, book_master.book_author 
											FROM book_user 
											LEFT JOIN book_master ON book_user.book_id = book_master.book_id 
											WHERE book_master.is_active = 'Y' AND book_master.status = 'N'
											AND book_master.book_cover_image!=''
											ORDER BY book_user.added_on DESC LIMIT 0,$limit";
			$this->total_books_array	= $db->executeQuery($this->sql);
			$this->rs					= $db->getResultsetArray();	
			return $this->rs;
		}
		
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/*
		New function for User wall & its friends wall updation by sayali on 4:01 PM 5/23/2011
	*/
	function user_wall_updation($content_type,$content_ref_id,$user_id,$userRef = "")
	{
		global $db;
		
		$UserName		= strip($db->FindOtherValue1("user_master","user_id",$user_id,"user_name"));
		$booknameFull		= strip($db->FindOtherValue1("book_master","book_id",$content_ref_id,"book_title"));
		if(strlen($booknameFull) > 50)
                {
                        $bookname = substr($booknameFull,0,50)."...";
                }
                else
                {
                        $bookname = $booknameFull;
                }
		if($content_type == "Book")
		{
			$book_wish_status		= $db->FindOtherValueWithCondition("book_swap","book_id",$content_ref_id,"status_on"," AND recevier_id=$user_id");
			
			if($book_wish_status == "RECEIVE")
			{
				$read_status ="Wishlist";	
			}
			else
			{
				$book_status		= $db->FindOtherValueWithCondition("book_user","book_id",$content_ref_id,"read_status"," AND user_id=$user_id");
				if($book_status=='1'){$read_status="Read";} 
				else if($book_status=='2'){$read_status="Currently Reading";}
				else if($book_status=='3'){$read_status="To Read";}
			}
			
			$link="<a href='view-profile.php?uid=".base64_encode($user_id)."'>".ucfirst($UserName)."</a> has added the <a href='book-detail.php?b=".base64_encode($content_ref_id)."' title='".$booknameFull."'>".ucfirst($bookname)."</a> as ".$read_status;
			
			$this->sql2	= 'INSERT INTO user_wall (user_id,wall_link,content_ref_id,content_type,added_by) values ("'.$user_id.'","'.$link.'",'.$content_ref_id.',"Book","'.$user_id.'")';
				
			$db->executeQuery($this->sql2);
			
			$sqlsub 	= "SELECT UserFriendId
						FROM  user_friend_master
						WHERE UserId=".$user_id."
						ORDER BY AddedOn DESC ";
			$cntsub		= $db->executeQuery($sqlsub);
			
			$rs = $db->getResultSetArray();
			
			for($i=0; $i < $cntsub; $i++)
			{
				$row			= $rs[$i];
				$user			= $row["UserFriendId"];
				if($user_id != $user)
				{
					$this->sql3	= "INSERT INTO user_wall(user_id,wall_link,added_by) 
								VALUES(".$user.",".$db->ToSQL($link,"Text").",".$user_id.")";
					$db->executeQuery($this->sql3);
				}
			}
		}
		else if($content_type == "Review Comment")
		{
			$reviewAddedBy		= $db->FindOtherValue1("user_master","user_id",$userRef,"user_name");
			
			$link="<a href='view-profile.php?uid=".base64_encode($user_id)."'>".ucfirst($UserName)."</a> has commented on <a href='view-profile.php?uid=".base64_encode($userRef)."'>".ucfirst($reviewAddedBy)."</a>'s review of <a href='book-detail.php?b=".base64_encode($content_ref_id)."'>".ucfirst($bookname)."</a>";
			
			$this->sql2	= 'INSERT INTO user_wall (user_id,wall_link,content_ref_id,content_type,added_by) values ("'.$user_id.'","'.$link.'",'.$content_ref_id.',"Review Comment","'.$user_id.'")';
				
			$db->executeQuery($this->sql2);
			
			$sqlsub 	= "SELECT UserFriendId
						FROM  user_friend_master
						WHERE UserId=".$user_id."
						ORDER BY AddedOn DESC ";
			$cntsub		= $db->executeQuery($sqlsub);
			
			$rs = $db->getResultSetArray();
			
			for($i=0; $i < $cntsub; $i++)
			{
				$row			= $rs[$i];
				$user			= $row["UserFriendId"];
				if($user_id != $user)
				{
					$this->sql3	= "INSERT INTO user_wall(user_id,wall_link,added_by) 
								VALUES(".$user.",".$db->ToSQL($link,"Text").",".$user_id.")";
					$db->executeQuery($this->sql3);
				}
			}
		}
		
				
				
	}
	
	// Function for club activity by sayali on 3:30 PM 5/27/2011
		public function club_activities($club_id,$user_id,$content_type,$content_id)
		{
			global $db;
			
			try
			{
				$this->sql	= "INSERT INTO club_activity_master(club_id,user_id,content_id,content_type) 
								VALUES(".$club_id.",".$user_id.",".$content_id.",'".$content_type."')";
				$db->executeQuery($this->sql);
			}
			catch(Exception $e)
			{
				throw new ConnectionException("Could not fetch the user table ".$e);
			}
		}

                public function check_book_avaibility($bookid, $userid)
		{
			global $db;
			try
			{
				$this->sql	= "select count(book_id) as cnt from book_user where book_id = ".$bookid." and user_id = $userid and is_book_delete = 'N'";
				$this->rsCnt	= $db->executeQuery($this->sql);
				if ($this->rsCnt > 0)
				{
					return "1";
				}
				else
				{
					return "0";
				}
			}
			catch(Exception $e)
			{
				throw new ConnectionException("Could not fetch the country table ".$e);
			}

		}
                // Function to display book information by its id
                function displayBookInfo($book_id)
                {
                    global $db;

                    $userId = $db->FindOtherValue1("book_master","book_id",$book_id,"book_user_ref_id");
                    $userName = $db->FindOtherValue1("user_master","user_id",$userId,"user_name");

                    $club_id = $db->FindMultileValue("club_book_master","book_id",$book_id,"club_id"," AND club_id!=0  order by added_on desc");
                    if($club_id !="")
                    {
                        $club_name = strip($db->FindClubName("club_master","club_id",$club_id,"club_title"));
                    }
                    else
                    {
                        $club_name = "-";
                    }

                    $catergory[0] = $db->FindOtherValue1("book_master","book_id",$book_id,"book_cat1");
                    $catergory[1] = $db->FindOtherValue1("book_master","book_id",$book_id,"book_cat1_1");
                    $catergory[2] = $db->FindOtherValue1("book_master","book_id",$book_id,"book_cat1_1_1");
                   // print_r($catergory);
                    //$catergoryID		= implode(",",$catergory);
                    for($j=0;$j<count($catergory);$j++)
                    {
                       //$catergoryID[$j];
                        if($catergory[$j] !=0)
                        {
                           $cat_name1 = strip($db->FindOtherValue1("genre_master","genre_id",$catergory[$j],"genre_name"));
                           $cat_id = trim($catergory[$j]);

                           $cat_name[] = '<a class="displayElementInline cont03 dn" href="category.php?catId='.$cat_id.'">'.$cat_name1.'</a>';
                        }
                    }
                    $book_category = implode("<span class='displayElementInline cont03 dn'>, </span>",$cat_name);
                   // exit;
                    $chums_reading = $this->getTotalRead($book_id,"1");

                    $book_info =
                        '<div class="PBo4">
                                <div class="cont02 W90 fleft"><p>Posted By:</p></div>
                            <div class="fleft"><a href="view-profile.php?user_id='.base64_encode($userId).'" class="cont03 dn fleft">'.$userName.'</a></div>
                            <div class="cleaner"></div>
                        </div>
                        <div class="PBo4">
                                <div class="cont02 W90 fleft"><p>Chums Reading:</p></div>
                            <div class="cont04 fleft"><p>'.$chums_reading.'</p></div>
                            <div class="cleaner"></div>
                        </div>
                        <div class="PBo6">
                                <div class="cont02 W90 fleft"><p>In Clubs:</p></div>
                            <div class="fleft" style="width:110px;">
                                <div class="fleft">'.$club_name.'</div>
                            </div>
                             <div class="cleaner"></div>
                        </div>
                        <div class="PBo8">
                                <div class="cont02 W90 fleft"><p>Category:</p></div>
                            <div class="fleft" style="width:110px;">'.$book_category.'</div>
                             <div class="cleaner"></div>
                        </div>';

                    return $book_info;
                    
                }

		function getBookByAuthor($authorName,$bookId)
		{
		  global $db, $siteURL;
		  
		    if(strlen($authorName) > 0 )
		    {
			    $this->Booksql					= "SELECT book_id,book_title,is_active,book_cover_image FROM book_master WHERE is_active = 'Y' AND book_author = '".$db->toSQL($authorName)."' AND book_id != $bookId group by book_title limit 0,3";
			    $this->rsBookCnt				= $db->executeQuery($this->Booksql);

			    if ($this->rsBookCnt > 0)
			    {
				    $this->rsBook				= $db->getResultsetArray();


				    for($i=0;$i<$this->rsBookCnt;$i++)
				    {
					    $this->row						= $this->rsBook[$i];

					    $this->book_id		= strip($this->row["book_id"]);
					    $this->book_title	= strip($this->row["book_title"]);
					    $this->fldimage	= strip($this->row["book_cover_image"]);

					    if(strlen($this->fldimage) > 0)
					    {
						if(file_exists("book_images/".$this->fldimage))
						{
							$this->cover_img1		= $siteURL."/book_images/".$this->fldimage;
						}
						else
						{
							$this->cover_img1	= "images/no image.jpg";
						}
					    }
					    else
					    {
						$this->cover_img1	= "images/no image.jpg";
					    }
					    $bookAuthor[]='
						<div class="PRight15 fleft">
						    <a alt="'.$this->book_title.'"  href="'.$siteURL.'book-detail.php?b='.base64_encode($this->book_id).'" border="0">
							<img src="'.$this->cover_img1.'" alt="" height="89" width="60" border="0" title="'.$this->book_title.'">
						    </a>
						</div>
					    ';					    
				    }
				    $bookAuthorList = implode("", $bookAuthor);
				    return $bookAuthorList;
			    }
		    }
                 
		}
		/*
		 * This function is added for featured books on books-main page
		 * Added By : Bhagyashree Added On : 27th June 2011
		 *
		 */
		function featuredBooksOnBookPage($limit)
		{
		    global $db,$siteURL;
		    $this->sql	    =	    "SELECT DISTINCT(book_id), book_cover_image, book_rating, book_title,book_author
						    FROM book_master
						    WHERE is_active = 'Y' AND status = 'N'  AND is_featured = 'Y'
						    ORDER BY RAND() DESC LIMIT 0,$limit";
		    $this->total_books_array	= $db->executeQuery($this->sql);
		    $this->rs				= $db->getResultsetArray();
		  //echo "<pre>";print_r($this->rs);
		    $featuredBookData ='';
		    for($this->i = 0;$this->i < $limit;$this->i++)
		    {
			$this->row	=	$this->rs[$this->i];
			$this->book_id = strip($this->row["book_id"]);
			$this->book_title = strip($this->row["book_title"]);
			$this->book_author = strip($this->row["book_author"]);
			$this->fldimage = strip($this->row["book_cover_image"]);

			/* Make book title smaller to display */
			if(strlen($this->book_title)>30)
			    $small_title = substr($this->book_title, 0, 26)."...";
			else
			    $small_title    =	$this->book_title;

			/* Make author name smaller to display */
			if(strlen($this->book_author)>20)
			    $author_name = substr($this->book_author, 0, 17)."...";
			else
			    $author_name    =	$this->book_author;

			if($this->fldimage == "")
				$path	    =	'images/no_image.jpg';
			else if($this->fldimage != "")
			{
			    if(file_exists('book_images/'.$this->fldimage))
			    {
				$path	    =	'book_images/'.$this->fldimage;
			    }
			    else
				$path	    =	'images/no_image.jpg';
			}

			/*------ This query is to get author id ---------*/
				$sql_author = "SELECT author_id FROM author_master WHERE author_name = ".$db->ToSQL($this->book_author,"Text")."";
				$cnt_a	=	$db->executeQuery($sql_author);
				$author = "";
				if($cnt_a > 0)
				{
					$rs_a		= $db->getResultSetArray();
					for($l=0;$l<$cnt_a;$l++)
					{
						$row_a			= $rs_a[$l];
						$author			= $row_a["author_id"];
					}
				}
				if($author !="")
				    $authorLink =   '<a href="authors-details.php?author_id='.base64_encode($author).'" title="'.$this->book_author.' " class="cont04 dn">'.$author_name.'</a>';
				else
				    $authorLink =   $author_name;
			/*------ This query is to get author id END ---------*/

			$featuredBookData	.= '<div class="book_featured_mid_box MRight30 fleft">
								<div class="book_featured_mid_box_img01">
									<a href="'.$siteURL.'book-detail.php?b='.base64_encode($this->book_id).'" title="'.$this->book_title.' " class="" >
										<img  height="150" width="98" src="'.$siteURL.$path.'"  alt="no_image" border="0">
									</a>
								    <!--div class="book_featured_mid_box_img02 cont11">
									<p class="pos1 PTop3 PLeft4">40%</p>
									<p class="pos2 PLeft7">off</p>
								    </div-->
								</div>
								<div class="PTop10 align_c">
									<div class="btext04 word_break"><p><a href="'.$siteURL.'book-detail.php?b='.base64_encode($this->book_id).'" title="'.$this->book_title.' " class="btext04 word_break dn"> '.$small_title.'</a></p></div>
								    <div class="cont04"><p>'.$authorLink.'</p></div>
								    <!--div class="cont04 lt"><p>Rs. 300</p></div>
								    <div class="btext05 Fbo"><p>Rs. 250</p></div-->
								</div>
							    </div>';
		    }
		    return $featuredBookData;
		}

		function latestBooksOnBookPage()
		{
		    global $db,$siteURL;
		    $latest_added_books = $this->latest_added_books(3); 
		    $latest_books = "";
		    if(count($latest_added_books) > 0)
		    {
			    for($i=0;$i<count($latest_added_books);$i++)
			    {
				$this->row		= $latest_added_books[$i];
				$this->bookImage    = $this->row["book_cover_image"];
				$this->book_id		= $this->row["book_id"];
				$this->book_title	= strip($this->row["book_title"]);
				$this->book_author = strip($this->row["book_author"]);
				$this->book_description = strip($this->row["book_description"]);
				$this->book_rating 		= $this->row["book_rating"];

				if($this->bookImage == "")
				$path	    =	'images/no_image.jpg';
				else if($this->bookImage != "")
				{
				    if(file_exists('book_images/'.$this->bookImage))
				    {
					$path	    =	'book_images/'.$this->bookImage;
				    }
				    else
					$path	    =	'images/no_image.jpg';
				}

			/* Make book title smaller to display */
			if(strlen($this->book_title)>46)
			    $small_title = substr($this->book_title, 0, 43)."...";
			else
			    $small_title    =	$this->book_title;

			/* Make author name smaller to display */
			if(strlen($this->book_author)>26)
			    $author_name = substr($this->book_author, 0, 23)."...";
			else
			    $author_name    =	$this->book_author;

			/* Make description smaller to display */
			if(strlen($this->book_description)>160)
			    $small_desc = substr(ucfirst(strtolower($this->book_description)), 0, 157)."...";
			else
			    $small_desc    =	ucfirst(strtolower($this->book_description));

			/*------ This query is to get author id ---------*/
				$sql_author = "SELECT author_id FROM author_master WHERE author_name = ".$db->ToSQL($this->book_author,"Text")."";
				$cnt_a	=	$db->executeQuery($sql_author);
				$author = "";
				if($cnt_a > 0)
				{
					$rs_a		= $db->getResultSetArray();
					for($l=0;$l<$cnt_a;$l++)
					{
						$row_a				= $rs_a[$l];
						$author			= $row_a["author_id"];
					}
				}
				if($author !="")
				    $authorLink =   '<a href="authors-details.php?author_id='.base64_encode($author).'" title="'.$this->book_author.' " class="cont03 dn">'.$author_name.'</a>';
				else
				    $authorLink =   $this->book_author;
			/*------ This query is to get author id END ---------*/
			/********** coding for rating **/
			$avgRating = getAvgRating($this->book_id,"Book");
			/********** end here ************/
			$reviewCount = $db->FindOtherValueWithCondition("comment_master","content_ref_id",$this->book_id,"count(*)","AND content_type = 'Book' AND parent_id='0'");
			if($reviewCount > 1)
			{
				$review = " Reviews";
			}
			else
			{
				$review = " Review";
			}

			if($i == count($latest_added_books)-1)
			    $class = "book_featured_box width_215 fleft";
			else
			    $class = "book_featured_box width_215 PRight17 fleft";
			
				$latest_books .= '<div class="'.$class.'">
							    <div class="book_featured_box_img01 fleft">
							    <a href="'.$siteURL.'book-detail.php?b='.base64_encode($this->book_id).'" title="'.$this->book_title.'">
								<img src="'.$path.'" alt="book image"  height="89" width="60" border="0">
							    </a>
							    <!--div class="book_featured_box_img02	cont11">
								 <p class="pos1 PTop3 PLeft4">40%</p>
								 <p class="pos2 PLeft7">off</p>
							    </div-->
							</div>
							<div class="W145 fleft PLeft10">
							    <div class="btext04 word_break"><p><a href="'.$siteURL.'book-detail.php?b='.base64_encode($this->book_id).'" title="'.$this->book_title.'" class="btext04 word_break dn" >'.$small_title.'</a></p></div>
							    <div class="cleaner"></div>
							    <div class="cont02 PRight4 fleft"><p>by:</p></div>
							    <div class="fleft cont03">'.$authorLink.'</div>
							    <div class="cleaner PTop3"></div>
							    <div class="ie_h01 fleft height_14">'.showAverageRatingBar($avgRating,$siteURL).'</div>
							    <div class="cleaner"></div>
							    <div class="fleft"><a href="'.$siteURL.'book-detail.php?b='.base64_encode($this->book_id).'" class="cont03 dn">'.$reviewCount.$review.'</a></div>
							    <div class="cleaner PBo3"></div>
							    <!--div class="cont04 lt PTop1 fleft"><p>Rs. 300</p></div>
							    <div class="btext06 Fbo PLeft10 fleft"><p>Rs. 250</p></div-->
							</div>
							<div class="cleaner"></div>
							<div class="cont04 PTop6 PRight5"><p>'.$small_desc.'</p></div>
						    </div>';
			    }
		    }
		    return $latest_books;
		}

		function popularBooksOnBookPage($limit)
		{
		    global $db,$siteURL;
		    $this->sql	    =	    "SELECT (
						SELECT count( * )
						FROM book_user AS bu
						WHERE bu.book_id = book_master.book_id AND bu.is_book_delete = 'N'
						) AS addedbyxusers, (
						SELECT count( * )
						FROM comment_master AS cm
						WHERE cm.content_ref_id = book_master.book_id
						AND cm.is_active = 'Y'
						AND cm.parent_id =0
						AND cm.content_type = 'Book'
						) AS cntComment, book_club_ref_id,book_cover_image,book_title,book_master.book_rating,book_master.book_id ,book_master.* 
						FROM book_master
						WHERE STATUS = 'N'
						ORDER BY addedbyxusers DESC , book_master.book_rating DESC , cntComment DESC LIMIT 0,$limit";
		    $this->total_books_array	= $db->executeQuery($this->sql);
		    $this->rs				= $db->getResultsetArray();
		   
		    $popular = '';

		    for($this->i = 0;$this->i < $limit;$this->i++)
		    {
			$this->row	=	$this->rs[$this->i];
			$this->bookImage    = $this->row["book_cover_image"];
				$this->book_id		= $this->row["book_id"];
				$this->book_title	= strip($this->row["book_title"]);
				$this->book_author = strip($this->row["book_author"]);
				$this->book_description = strip($this->row["book_description"]);
				$this->book_rating 		= $this->row["book_rating"];

				if($this->bookImage == "")
				$path	    =	'images/no_image.jpg';
				else if($this->bookImage != "")
				{
				    if(file_exists('book_images/'.$this->bookImage))
				    {
					$path	    =	'book_images/'.$this->bookImage;
				    }
				    else
					$path	    =	'images/no_image.jpg';
				}

			/* Make book title smaller to display */
			if(strlen($this->book_title)>46)
			    $small_title = substr($this->book_title, 0, 43)."...";
			else
			    $small_title    =	$this->book_title;

			/* Make author name smaller to display */
			if(strlen($this->book_author)>26)
			    $author_name = substr($this->book_author, 0, 23)."...";
			else
			    $author_name    =	$this->book_author;

			/* Make author name smaller to display */
			if(strlen($this->book_description)>160)
			    $small_desc = substr(ucfirst(strtolower($this->book_description)), 0, 157)."...";
			else
			    $small_desc    =	ucfirst(strtolower($this->book_description));

			/*------ This query is to get author id ---------*/
				$sql_author = "SELECT author_id FROM author_master WHERE author_name = ".$db->ToSQL($this->book_author,"Text")."";
				$cnt_a	=	$db->executeQuery($sql_author);
				$author = "";
				if($cnt_a > 0)
				{
					$rs_a		= $db->getResultSetArray();
					for($l=0;$l<$cnt_a;$l++)
					{
						$row_a				= $rs_a[$l];
						$author			= $row_a["author_id"];
					}
				}
				if($author !="")
				    $authorLink =   '<a href="authors-details.php?author_id='.base64_encode($author).'" title="'.$this->book_author.' " class="cont03 dn">'.$author_name.'</a>';
				else
				    $authorLink =   $this->book_author;
			/*------ This query is to get author id END ---------*/
			/********** coding for rating **/
			$avgRating = getAvgRating($this->book_id,"Book");
			/********** end here ************/
			$reviewCount = $db->FindOtherValueWithCondition("comment_master","content_ref_id",$this->book_id,"count(*)","AND content_type = 'Book' AND parent_id='0'");
			if($reviewCount > 1)
			{
				$review = " Reviews";
			}
			else
			{
				$review = " Review";
			}
			if($this->i == $limit-1)
			    $class = "book_featured_box width_215 fleft";
			else
			    $class = "book_featured_box width_215 PRight17 fleft";

			$popular	.= '<div class="'.$class.'">
								<div class="book_featured_box_img01 fleft">
								<a href="'.$siteURL.'book-detail.php?b='.base64_encode($this->book_id).'" title="'.$this->book_title.'">
								    <img src="'.$path.'" alt="book image"  height="89" width="60"  border="0">
								</a>
								<!--div class="book_featured_box_img02	cont11">
								     <p class="pos1 PTop3 PLeft4">40%</p>
								     <p class="pos2 PLeft7">off</p>
								</div-->
							    </div>
							    <div class="W145 fleft PLeft10">
								<div class="btext04 word_break"><p><a href="'.$siteURL.'book-detail.php?b='.base64_encode($this->book_id).'" title="'.$this->book_title.'" class="btext04 word_break dn" >'.$small_title.'</a></p></div>
								<div class="cleaner"></div>
								<div class="cont02 PRight4 fleft"><p>by:</p></div>
								<div class="fleft cont03">'.$authorLink.'</div>
								<div class="cleaner PTop3"></div>
								<div class="ie_h01 fleft height_14">'.showAverageRatingBar($avgRating,$siteURL).'</div>
								<div class="cleaner"></div>
								<div class="fleft"><a href="'.$siteURL.'book-detail.php?b='.base64_encode($this->book_id).'" class="cont03 dn">'.$reviewCount.$review.'</a></div>
								<div class="cleaner PBo3"></div>
								<!--div class="cont04 lt PTop1 fleft"><p>Rs. 300</p></div>
								<div class="btext06 Fbo PLeft10 fleft"><p>Rs. 250</p></div-->
							    </div>
							    <div class="cleaner"></div>
							    <div class="cont04 PTop6 PRight5"><p>'.$small_desc.'</p></div>
							</div>';
		    }
		 
		    return $popular;
		}

		function popularAuthorsOnBookPage($limit)
		{
			global $db,$siteURL;
			$this->sql	    =	 "SELECT author_id,author_name FROM author_master WHERE is_active = 'Y' AND is_featured = 'Y' ORDER BY  modified_on DESC LIMIT 0,$limit ";

			$this->total_array	= $db->executeQuery($this->sql);
			$this->rs				= $db->getResultsetArray();
			$popularAuthors = '';

			for($i=0;$i<count($this->rs);$i++)
			{
			    $this->row		= $this->rs[$i];
			    $this->author_id      = $this->row["author_id"];
			    $this->author_name      = $this->row["author_name"];

			    if(strlen($this->author_name)>21)
				    $author_small = substr ($this->author_name, 0, 18)."...";
			    else
				$author_small   =	$this->author_name;

			    if($i%2 == 0)
				$class = "cont04 fleft";
			    else
				$class = "W120 cont04 fleft";

			    $popularAuthors .='<div class="PBo3  W120 fleft">
							    <div class="'.$class.'">
								<a class="'.$class.' dn" href="authors-details.php?author_id='.base64_encode($this->author_id).'" title="'.$this->author_name.' ">'.$author_small.'</a>
							    </div>
							    <div class="cleaner"></div>
							</div>';
			}

		    return $popularAuthors;
		}

		function bookForSwap($limit)
		{
			global $db,$siteURL;
			$this->sql		=    "SELECT * FROM book_swap bs
							    LEFT JOIN book_master bm ON bm.book_id=bs.book_id
							    LEFT JOIN user_master um ON um.user_id=bs.sender_id
							    WHERE recevier_id=0 AND status_on='PROVIDE' ORDER BY bs.added_date DESC LIMIT 0,$limit";
			$this->total_books_array	= $db->executeQuery($this->sql);
			$this->rs					= $db->getResultsetArray();
			return $this->rs;	
		}

		function bookRequestedForSwap($limit)
		{
			global $db,$siteURL;
			$this->sql		=    "SELECT * FROM book_swap bs
							    LEFT JOIN book_master bm ON bm.book_id=bs.book_id
							    LEFT JOIN user_master um ON um.user_id=bs.recevier_id
							    WHERE sender_id=0 AND status_on='RECEIVE' ORDER BY bs.added_date DESC LIMIT 0,$limit";
			$this->total_books_array	= $db->executeQuery($this->sql);
			$this->rs					= $db->getResultsetArray();
			return $this->rs;
		}

            /*
             * manageImportedBookData function is to manage Imported Book Data by a .CSV file.
             * It deletes records from imported_bookdata table or move it to book_master table.
             * Created By: Bhagyashree Creted on: 19th August 2011
             */
                public function manageImportedBookData()
                {
                    global $db;
                        if($this->fldAction == "Del")
                        {
                            $this->sql  =   "DELETE FROM imported_bookdata WHERE imp_id IN({$this->BookIds})";
                            $db->executeQuery($this->sql);
                            $msg    =   "Book(s) deleted successfully";
                            return $msg;
                        }
                        elseif($this->fldAction == "Move")
                        {
                            $this->sql  ="SELECT * FROM imported_bookdata WHERE imp_id IN({$this->BookIds})";
                            $this->totRec = $db->executeQuery($this->sql);
                            if($this->totRec > 0){
                                $this->rs = $db->getResultSetArray();
                                for ($i = 0; $i < $this->totRec; $i++){
                                    $this->row 	= $this->rs[$i];
                                    $this->imp_id    =   $this->row['imp_id'];
                                    $this->fldisbn    =   $this->row['book_isbn_no'];
                                    $this->fldtitle    =   $this->row['book_title'];
                                    $this->flddescription    =   $this->row['book_description'];
                                    $this->fldauthor    =   $this->row['book_author'];
                                    $this->fldpublisher    =   $this->row['book_publisher'];
                                    $this->pub_date    =   $this->row['book_publication_date'];
                                    $this->cover_img    =   $this->row['book_cover_image'];
                                    $this->book_price    =   $this->row['book_price'];
                                    $this->book_quantity    =   $this->row['book_quantity'];
                                    $this->category_name    =   $this->row['category_name'];

                                    $sql1   = "SELECT book_id FROM book_master WHERE book_isbn_no = $this->fldisbn";
                                    $cnt	= $db->executeQuery($sql1);
                                    if($cnt <= 0 ) {

                                        $sql2   = "SELECT id FROM publisher_master WHERE publisher_name = '$this->fldpublisher'";
                                        $cnt2	= $db->executeQuery($sql2);
                                        if($cnt2 > 0){
                                            $rs = $db->getResultSetArray();
                                            $row 	= $rs[0];
                                            $id    =   $row['id'];
                                        }
                                        else{
                                            $sql2   = "INSERT INTO publisher_master(publisher_name) VALUES (".$db->ToSQL($this->fldpublisher,"Text").")";
                                            $cnt2	= $db->executeQuery($sql2);
                                            //echo "<br>id: ".$id = mysql_insert_id();
                                            $id =  $db->getInsertId();

                                        }
                                        $sql  = "INSERT into book_master(
                                                            book_isbn_no,
                                                            book_title, book_description,
                                                            book_author, book_publisher,
                                                            book_publication_date, book_cover_image,
                                                            added_on,
                                                            book_price, book_quantity,
                                                            category_name,publisher_id)
                                                            values('$this->fldisbn',
                                                            '$this->fldtitle','$this->flddescription',
                                                            '$this->fldauthor','$this->fldpublisher',
                                                            '$this->pub_date','$this->cover_img',
                                                            now(),
                                                            '$this->book_price','$this->book_quantity',
                                                            '$this->category_name','$id')";
                                        $db->executeQuery($sql);
                                        $sql2   = "DELETE FROM imported_bookdata WHERE imp_id = $this->imp_id";
                                        $db->executeQuery($sql2);
                                        $msg    =   "Book(s) moved in database.";
                                        return $msg;
                                    }
                                    else{
                                        $msg    =   "Book(s) already present in database.";
                                        return $msg;
                                    }
                                }
                            }
                        }
                }
      
}
?>
