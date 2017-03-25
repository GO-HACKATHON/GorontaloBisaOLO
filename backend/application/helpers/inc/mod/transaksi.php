<?php 

$val =(isset($_GET['val'])) ? $_GET['val'] : null;


if($act=='transaksi_temp' && $val=='timeout'){
	
	DEFINE('LIMIT_TIME_PENDING',2);
	

	
	$r = $firebase->get(DEFAULT_PATH.'transaksi_temp');
	$r = json_decode($r);

	foreach($r as $j=>$f){
		
			$ol=date('Y-m-d H:i:s',$r->$j->trdoneid);
 			$time = date_create($ol);
			$now  = date_create();
			$dif  = date_diff($time,$now);
			
			if( $dif->i > LIMIT_TIME_PENDING && $r->$j->status==0){
				$firebase->delete(DEFAULT_PATH.'transaksi_temp/'.$j); 
			}
		
	}
	
}