<h1>Data Kategori</h1>

<table border="1px">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Kategori</th>
			<th>Icon</th>
			<th>Keterangan</th>
			<th><a href="<?php echo base_url(); ?>index.php/kategori/add">Tambah</a></th>
			
		</tr>
	</thead>
	<tbody>
	<?php $no=1; foreach ($kategori as $baris) {?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $baris->nama_kategori;?></td>
			<td><img src="<?php echo base_url();?>assets/upload/<?php echo $baris->icon;?>" width="100px"></td>
			<td><?php echo $baris->keterangan;?></td>
			<td>
				<a href="<?php echo base_url();?>index.php/kategori/update/<?php echo $baris->idkategori;?>" onclick="return confirm('Anda yakin ingin mengedit?');">Ubah</a></th>
				<a href="<?php echo base_url();?>index.php/kategori/delete/<?php echo $baris->idkategori;?>" onclick="return confirm('Anda yakin ingin menghapus?');">Hapus</a></th>
			</td>
		</tr>
		<?php } ?>
	</tbody>


</table>