<table class="table table-bordered">
	<tr>
		<td align="center"><b>No</b></td>
		<td align="center"><b><i class="fa fa-book"></i> Buku</b></td>
		<td align="center"><b><i class="fa fa-book"></i> Ditukar Dengan</b></td>
		<td align="center"><b><i class="fa fa-calendar"></i> Tanggal Deal</b></td>
		<td align="center"><b>Status</b></td>
	</tr>
	<?php
		$no	=	1;
		foreach($daftarTukar as $kode => $dataTukar){
			$tukarByKode	=	$this->m_tukar->byKode($kode);
			$buku1			=	$this->m_buku->byKode($tukarByKode->books->book_master_id);
			
	?>
	<tr>
		<td align="center"><?php echo $no?></td>
		<td>
			<a href=""> <i class="fa fa-tag"></i> <?php echo $buku1->book_title?></a>
		</td>
		<td>
			<?php
				foreach($tukarByKode as $tukar){
					foreach($tukar->book_request as $req){
						$buku2	=	$this->m_buku->byKode($req->book_id);
						echo "<a href=''><i class='fa fa-tag'></i> $buku2->book_title</a><br>";
					}
				}
			?>
		</td>
		<td align="center"><?php $dataTukar->date_approval?></td>
		<td align="center">
			<?php echo $this->m_tukar->status(3)?>
		</td>
	</tr>
	<?php
		$no++;
		}
	?>
</table>