<?php

function getUniqueID($tmpPass) {
	
		$IDLEN = 10;
			$transOrdID = $tmpPass;
			srand((double) microtime() * 1000000);
			$tmpordID="";
			while (strlen($tmpordID)< $IDLEN){
				$r=rand(1, 3);
				if ($r==1) {
				$rcode=rand(48, 57);
				}
				if ($r==2) {
				$rcode=rand(48, 57);
				}
				if ($r==3) {
				$rcode=rand(48, 57);
				}
				$tmpordID.=chr($rcode);
			}
			
			$transOrdID = $transOrdID . $tmpordID;
			return $transOrdID;
	
	}

function getUniqueIDNum() {
	
		$IDLEN = 10;
			srand((double) microtime() * 1000000);
			$tmpordID="";
			while (strlen($tmpordID)< $IDLEN){
				$r=rand(1, 3);
				if ($r==1) {
				$rcode=rand(48, 57);
				}
				if ($r==2) {
				$rcode=rand(48, 57);
				}
				if ($r==3) {
				$rcode=rand(48, 57);
				}
				$tmpordID.=chr($rcode);
			}
			
			$transOrdID = $tmpordID;
			return $transOrdID;
	
	}	
?>