<h1>form kecaamatan</h1>
<form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
    idkecamatan : <input type="text" name="idkecamatan" value="<?php echo $idkecamatan;?>"> <br> <br>
    <label>Nama Wilayah</label>
    <input type="text" name="Nama_Wilayah" value="<?php echo $Nama_Wilayah;?>">
    <br> <br>
    <label>Wilayah</label>
    <input type="text" name="Wilayah" value="<?php echo $Wilayah;?>">
    <br> <br>
     <label>Data Wilayah</label>
    <input type="file" name="Data_Wilayah" placeholder="Data_Wilayah" value="<?php echo $Data_Wilayah;?>">
    <br> <br>
    <label>Keterangan</label>
    <input type="text" name="Keterangan" value="<?php echo $Keterangan;?>">
    <br> 
    <button type="sumbit"><?php echo $button;?></button>

</form>