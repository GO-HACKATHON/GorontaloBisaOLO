
<b>Nama : <?php echo $members->data_member->name?></b><br><br>
<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<td align="center"><b>No</b></td>
			<td align="center"><b>Nama Buku</b></td>
			<td align="center"><b><i class="fa fa-heart"></i></b></td>
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
				<span class="label label-<?php echo $class?>"><?php echo $buku->data_buku->likes?> Suka </span>
			</td>
			<td align="center">
				<a href="<?php echo site_url("admin/edit_buku/".$buku->kode)?>">Edit</a> | 
				<a href="<?php echo site_url("admin/hapus_buku/".$buku->kode)?>">Hapus</a>
			</td>
		</tr>
		<?php
			$no++;
			}
		?>
	</table>
</div>