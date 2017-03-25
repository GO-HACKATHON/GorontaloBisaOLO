<?php 

function sms($no,$pesan){
        header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Authorization, Content-Type, Accept");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

        $message  = str_replace(" ","+",$pesan);
		$nomor    =	$no;
        $sent     = file_get_contents("http://smsfortunata.com/api?user=kreasindoproduction@gmail.com&pass=dbksu8&pesan=$message&senderid=mars&nomor=$nomor");
        return $sent;
		
}
	
 function cekSaldoSms(){
/* 		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: Authorization, Content-Type, Accept");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
 */
		$getSaldo = file_get_contents("http://wstajil.gorontalo-informatika.com/cek_saldo.php");
		$saldo    = json_decode($getSaldo);
		return $saldo->saldo;
}

?>
