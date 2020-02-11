<h1>form kategori</h1>
<form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
	idkategori : <input type="text" name="idkategori" value="<?php echo $idkategori;?>"> <br> <br>
	<label>Nama Kategori</label>
	<input type="text" name="nama_kategori" value="<?php echo $nama_kategori;?>">
	<br> <br>
	<label>Icon</label>
	<input type="file" name="icon" placeholder="icon" value="<?php echo $icon;?>">
	<br> <br>
	<label>Keterangan</label>
	<input type="text" name="keterangan" value="<?php echo $keterangan;?>">
	<br> 
	<button type="sumbit"><?php echo $button;?></button>

</form>