<table class="table table-bordered">
	<tr>
		<td align="center"><b>No</b></td>
		<td align="center"><b><i class="fa fa-book"></i>  Nama Buku</b></td>
		<td align="center"><b><i class="fa fa-heart" style="color:#c40d20"></i></b></td>
		<td align="center"><b>Percent</b></td>
	</tr>
	<?php
		$no	=	1;
		foreach($dataBuku as $kodeBuku => $buku){
			if($buku->likes == 0){
				$class	=	"default";
			}else{
				$class	=	"success";
			}
			
			$persen	=	$buku->likes*100/count($members);
	?>
	<tr>
		<td align="center"><?php echo $no?></td>
		<td>
			<a href="#" data-toggle="modal" data-target="#modal<?php echo sha1("Image |".$kodeBuku)?>"><?php echo $buku->book_title;?></a>
		</td>
		<td align="center">
			<a href="#" class="label label-<?php echo $class?>"><?php echo $buku->likes?> Menyukai </a>
		</td>
		<td align="center">
			<?php echo $persen?>%
		</td>
	</tr>
	<?php
		$no++;
		}
	?>
</table>

	<?php
		$no	=	1;
		foreach($dataBuku as $kodeBuku => $buku){
			if($buku->likes == 0){
				$class	=	"default";
			}else{
				$class	=	"success";
			}
			
			$persen	=	$buku->likes*100/count($members);
	?>
	<div id="modal<?php echo sha1("Image |".$kodeBuku)?>" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Gambar Buku</h4>
				</div>
							
				<!-- body modal -->
				<div class="modal-body" align="center">
					<?php
						if($buku->image==""){
							echo "<span class='label label-danger'>Don't found picture</span>";
						}else{
					?>
						<img src="<?php echo $buku->image?>" class="img-responsive">
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
		}
	?>