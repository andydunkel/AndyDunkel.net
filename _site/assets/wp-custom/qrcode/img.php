<?php
	include('phpqrcode.php');
	
	$datum=date("j.n.Y");
	$zeit=date("H:i:s");
	
	QRcode::png($datum . "|" . $zeit);
?>