<table class="table table-bordered">
	<tr>
		<td align="center"><b>No</b></td>
		<td align="center"><b><i class="fa fa-book"></i>  Nama Buku</b></td>
		<td align="center"><b><i class="fa fa-heart" style="color:#c40d20"></i></b></td>
		<td align="center"><b>Percent</b></td>
	</tr>
	<?php
		$no	=	1;
		foreach($dataBuku as $buku){
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
			<?php echo $buku->book_title;?>
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