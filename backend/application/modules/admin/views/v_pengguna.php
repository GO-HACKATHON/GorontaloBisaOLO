
<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<td align="center"><b>No</b></td>
			<td align="center"><b>Nama</b></td>
			<td align="center"><b><i class="fa fa-book"></i>  Jumlah Buku</b></td>
		</tr>
		<?php
			$no	=	1;
			foreach($members as $id => $m){
			$bukuMember	=	$this->m_buku->byMember($id);
			if(count($bukuMember) > 0){
				$class	=	"success";
			}else{
				$class	=	"danger";
			}
		?>
		<tr>
			<td align="center"><?php echo $no?></td>
			<td><?php echo $m->name?></td>
			<td align="center">
				<a href="<?php echo site_url("admin/list_buku_member/".$id)?>" class="label label-<?php echo $class?>"><?php echo count(($bukuMember));?> Buku</a>
			</td>
		</tr>
		<?php
			$no++;
			}
		?>
	</table>
</div>