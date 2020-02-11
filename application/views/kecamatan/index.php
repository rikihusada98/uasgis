<h1>Kecamatan</h1>
<table border="1px"> 
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Wilayah</th>
			<th>Wilayah</th>
			<th>Data Wilayah</th>
			<th>Keterangan</th>
			<th><a href="<?php echo base_url(); ?>index.php/kecamatan/add">Tambah</a></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($kecamatan as $baris) {?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $baris->Nama_Wilayah;?></td>
			<td><?php echo $baris->Wilayah;?></td>
			<td><?php echo $baris->Data_Wilayah;?></td>
			<!-- <td><file src="<?php echo base_url();?>assets/upload/<?php echo $baris->Data_Wilayah;?>"></td> -->
			<td><?php echo $baris->Keterangan;?></td>
			<td>
				<a href="<?php echo base_url();?>index.php/kecamatan/update/<?php echo $baris->idkecamatan;?>" onclick="return confirm('Anda yakin ingin mengedit?');">Ubah</a></th>
				<a href="<?php echo base_url();?>index.php/kecamatan/delete/<?php echo $baris->idkecamatan;?>" onclick="return confirm('Anda yakin ingin menghapus?');">Hapus</a></th>
			</td>
		</tr>
		<?php } ?>
	</tbody>

</table>