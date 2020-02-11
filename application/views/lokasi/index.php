<h1>Lokasi</h1>
<table border="1px"> 
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Lokasi</th>
			<th>Nama Kategori</th>
			<th>Latitude</th>
			<th>Logitude</th>
			<th>Keterangan</th>
			<th><a href="<?php echo base_url(); ?>index.php/lokasi/add">Tambah</a></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($lokasi as $baris) {?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $baris->Nama_Lokasi;?></td>
			<td><?php echo $baris->nama_kategori;?></td>
			<td><?php echo $baris->Latitude;?></td>
			<td><?php echo $baris->Logitude;?></td>
			<td><?php echo $baris->Keterangan;?></td>
			<td>
				<a href="<?php echo base_url();?>index.php/lokasi/update/<?php echo $baris->idlokasi;?>" onclick="return confirm('Anda yakin ingin mengedit?');">Ubah</a></th>
				<a href="<?php echo base_url();?>index.php/lokasi/delete/<?php echo $baris->idlokasi;?>" onclick="return confirm('Anda yakin ingin menghapus?');">Hapus</a></th>
			</td>
		</tr>
		<?php } ?>
	</tbody>

</table>