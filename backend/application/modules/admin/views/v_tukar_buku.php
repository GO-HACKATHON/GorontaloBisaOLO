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
			<a href="#" data-toggle="modal" data-target="#modal1<?php echo sha1("Author | ".$tukarByKode->books->book_master_id)?>"> <i class="fa fa-tag"></i> <?php echo $buku1->book_title?></a>
		</td>
		<td>
		
			<?php
				foreach($tukarByKode as $tukar){
					foreach($tukar->book_request as $req){
						$buku2	=	$this->m_buku->byKode($req->book_id);
						echo "<a href='#' data-toggle='modal' data-target='#modal2".sha1("Author | ".$req->book_id)."'><i class='fa fa-tag'></i> $buku2->book_title</a><br>";
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

	<?php
		$no	=	1;
		foreach($daftarTukar as $kode => $dataTukar){
			$tukarByKode	=	$this->m_tukar->byKode($kode);
			$buku1			=	$this->m_buku->byKode($tukarByKode->books->book_master_id);
			$dataUser1		=	$this->m_member->byId($buku1->memberid);
			
				foreach($tukarByKode as $tukar){
					foreach($tukar->book_request as $req){
						$buku2			=	$this->m_buku->byKode($req->book_id);
						$dataUser2		=	$this->m_member->byId($buku2->memberid);
	?>			
	
			<div id="modal2<?php echo sha1("Author | ".$req->book_id)?>" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- konten modal-->
						<div class="modal-content">
							<!-- heading modal -->
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Author</h4>
							</div>
							
							<!-- body modal -->
							<div class="modal-body" align="center">
								<h4><i class="fa fa-user"></i> <?php echo $dataUser2->data_member->name;?></h4>
							</div>
						</div>
				</div>
			</div>		
	
	<?php
					}
				}
	?>
			<div id="modal1<?php echo sha1("Author | ".$tukarByKode->books->book_master_id)?>" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- konten modal-->
						<div class="modal-content">
							<!-- heading modal -->
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Author</h4>
							</div>
							
							<!-- body modal -->
							<div class="modal-body" align="center">
								<h4><i class="fa fa-user"></i> <?php echo $dataUser1->data_member->name;?></h4>
							</div>
						</div>
				</div>
			</div>	
	<?php
		}
	?>