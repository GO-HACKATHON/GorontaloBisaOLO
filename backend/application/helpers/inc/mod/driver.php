<?php 

$mod =(isset($_GET['mod'])) ? $_GET['mod'] : null;
$val =(isset($_GET['val'])) ? $_GET['val'] : null;


if($mod=='driver' && $val=='online'){
	
	$r = $firebase->get(DEFAULT_PATH.'driver');
	$r = json_decode($r);
	echo"<h3>DRIVER ONLINE</h3>";
	echo"<table border=1>
			
			<tr>
				<th>NO</th>
				<th>UID</th>
				<th>NAMA</th>
				<th>NOPOL</th>
				<th>EMAIL</th>
				<th>STATUS</th>
				<th>STATUS MENERIMA</th>
				<th>LOKASI</th>
			</tr>
	";
	

	$no=1;
	foreach($r as $j=>$f){
	
		$nama = (isset($r->$j->nama)) ? $r->$j->nama : null;
		$nopol= (isset($r->$j->nopol)) ? $r->$j->nopol: null;
		$email= (isset($r->$j->email)) ? $r->$j->email: null;
		$status= (isset($r->$j->status)) ? $r->$j->status: null;
		$stmenerima= (isset($r->$j->stmenerima)) ? $r->$j->stmenerima: null;
		$lokasi= (isset($r->$j->location)) ? $r->$j->location->latlg: null;
		
		echo "<tr>
				<td>$no</td>
				<td>".$j."</td>
				<td>".$nama."</td>
				<td>".$nopol."</td>
				<td>".$email."</td>
				<td>".$status."</td>
				<td>".$stmenerima."</td>
				<td>".$lokasi."</td>
			 </tr>";
		$no++;
		
	}
	
	echo "</table>";
}
if($mod=='driver' && $val=='resetlokasi'){
			
	$r = $firebase->get(DEFAULT_PATH.'driver');
	$r = json_decode($r);
	foreach($r as $j=>$f){
		
		$nama  = (isset($r->$j->nama)) ? $r->$j->nama : null;
		$email = (isset($r->$j->email)) ? $r->$j->email: null;
		$lokasi= (isset($r->$j->location)) ? $r->$j->location->latlg: null;
		
		if($lokasi==null && $email==null && $nama!=null){
			$firebase->delete(DEFAULT_PATH.'/driver/'.$j);
			print_r($r->$j);
		}else{
			if($lokasi==null){
				echo'<pre>';
				print_r($r->$j);
				echo'</pre>';
				$d=array(
					'lt'=>'',
					'lg'=>'',
						'latlg'=>'',
				);
				$firebase->set(DEFAULT_PATH.'/driver/'.$j.'/location',$d);
			}
		}
	}
		
}