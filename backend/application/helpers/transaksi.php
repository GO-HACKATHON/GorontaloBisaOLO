<?php
	$deposit		=	50000;
	$persen			=	15;
	$batasMinimum	=	5000;
	
	$dataTransaksi[]	=	50000;
	$dataTransaksi[]	=	26000;
	$dataTransaksi[]	=	40000;
	$dataTransaksi[]	=	36000;
	$dataTransaksi[]	=	22000;
	
	$i	=	0;
	foreach($dataTransaksi as $income){
		$sisaDeposit	=	sisaDeposit($income,$deposit);
		echo $i." | ".$income." | ".$sisaDeposit."<br>";
	$i++;
	}
	
	function sisaDeposit($income,$dep){
		$deposit		=	50000;
		$potongan	=	$income	* 15 / 100;
		$sisa		=	$deposit;
		return $sisa-$potongan." | ".$dep-$deposit;
	}
?>