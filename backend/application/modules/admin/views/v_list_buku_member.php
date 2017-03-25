
<b>Nama : <?php echo $members->data_member->name?></b><br><br>
<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<td align="center"><b>No</b></td>
			<td align="center"><b>Nama Buku</b></td>
			<td align="center"><b><i class="fa fa-heart" style="color:#c40d20"></i></b></td>
			<td align="center"><b>#</b></td>
		</tr>
		<?php
			$no	=	1;
			foreach($this->m_buku->byMember($members->kode) as $buku){
				if($buku->data_buku->likes == 0){
					$class	=	"default";
				}else{
					$class	=	"success";
				}
				
		?>
		<tr>
			<td align="center"><?php echo $no?></td>
			<td><?php echo $buku->data_buku->book_title?></td>
			<td align="center">
				<a href="#" data-toggle="modal" data-target="#modal<?php echo sha1("Histori Like |".$buku->kode)?>" class="label label-<?php echo $class?>"><?php echo $buku->data_buku->likes?> Suka </a>
			</td>
			<td align="center">
				<a href="#" data-toggle="modal" data-target="#modal<?php echo sha1("Edit Buku |".$buku->kode)?>">Edit</a> | 
				<a href="#" data-toggle="modal" data-target="#modal<?php echo sha1("Hapus Buku |".$buku->kode)?>">Hapus</a>
			</td>
		</tr>
		<?php
			$no++;
			}
		?>
	</table>
	
		<?php
			$no	=	1;
			foreach($this->m_buku->byMember($members->kode) as $buku){
				if($buku->data_buku->likes == 0){
					$class	=	"default";
				}else{
					$class	=	"success";
				}
				
		?>
			<div id="modal<?php echo sha1("Edit Buku |".$buku->kode)?>" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- konten modal-->
						<div class="modal-content">
							<!-- heading modal -->
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Edit Buku</h4>
							</div>
							
							<!-- body modal -->
							<div class="modal-body">
								<form action="<?php echo site_url("admin/proses/update_buku")?>" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label class="control-label">Nama Buku</label>
										<input type="hidden" name="kode" value="<?php echo $buku->kode?>">
										<div class="input-group bootstrap-timepicker timepicker" style="width:100%">
											<input class="form-control" value="<?php echo $buku->data_buku->book_title?>" name="nama">
										</div>
									</div>
									
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary icon-btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button> 
									</div>
								</form>
							</div>
						</div>
				</div>
			</div>
			
			<div id="modal<?php echo sha1("Histori Like |".$buku->kode)?>" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- konten modal-->
						<div class="modal-content">
							<!-- heading modal -->
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><i class="fa fa-heart"></i> Likes</h4>
							</div>
							
							<!-- body modal -->
							<div class="modal-body">
									<?php
										foreach($this->m_buku->historiLikeByBuku($buku->kode)->likes_history as $kode => $likes){
											$dataLike	=	$this->m_buku->likeByKode($buku->kode,$kode);
											$dataMember	=	$this->m_member->byId($dataLike->memberid);
									?>
										<i class="fa fa-user"></i> <?php echo $dataMember->data_member->name;?>
									<?php
										}
									?>
							</div>
						</div>
				</div>
			</div>

			<div id="modal<?php echo sha1("Hapus Buku |".$buku->kode)?>" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- konten modal-->
						<div class="modal-content">
							<!-- heading modal -->
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Konfirmasi</h4>
							</div>
							
							<!-- body modal -->
							<div class="modal-body">
								<form action="<?php echo site_url("admin/proses/hapus_buku")?>" method="POST" enctype="multipart/form-data">
									<h5>Apakah anda ingin menghapus buku ini ?</h5>
									<input type="hidden" name="kode" value="<?php echo $buku->kode?>">
									<input type="hidden" name="idMember" value="<?php echo $buku->data_buku->memberid?>">
									
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary icon-btn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Ya</button> 
									</div>
								</form>
							</div>
						</div>
				</div>
			</div>			
		<?php
			}
		?>
		<script>
			
		</script>
</div>