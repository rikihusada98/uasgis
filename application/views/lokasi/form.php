	 <!-- load css leaflet -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/src/leaflet.css">
    <!-- load js leaflet -->
    <script src="<?php echo base_url();?>assets/src/leaflet.js"></script>
<script>
var infoWindow;
window.onload = function()
{
//Jika posisi wilayah desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
    var posisi = [-8.702195985385542,116.27208709716798];
    var zoom = 13;
    //Inisialisasi tampilan peta
    var petantb = L.map('ntbmap').setView(posisi, zoom);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        id: 'mapbox.streets'
    }).addTo(petantb);

    var marker = L.marker(posisi,{draggable: true}).addTo(petantb);
    marker.on('dragend', function (e) {
        document.getElementById('lat').value = marker.getLatLng().lat;
        document.getElementById('lng').value = marker.getLatLng().lng;
    });
};
    </script>
    <style>
    	body,html{
    		padding: 0;
    		margin: 0;
    	}
        #ntbmap{
            height: 350px;
        }
    </style>
</head>
<body>
<div id="ntbmap"></div
</script>

<h1>form Lokasi</h1>
<form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
	idlokasi : <input type="text" name="idlokasi" value="<?php echo $idlokasi;?>"> <br> <br>
	<label>Nama Lokasi</label>
	<input type="text" name="Nama_Lokasi" value="<?php echo $Nama_Lokasi;?>">
	<br> <br>
	<!-- <label>idkategori</label>
	<input type="text" name="idkategori" value="<?php echo $idkategori;?>"><br> <br> -->
	kategori : <select name="idkategori">
					<option value="<?php echo $idkategori;?>"><?php echo $nama_kategori;?></option>

					<?php foreach ($datakategori as $baris) { ?>
					<option value="<?php echo $baris->idkategori;?>"><?php echo $baris->nama_kategori;?></option>
					<?php }  ?>

				</select><br> <br>
	<label>Latitude</label>
	<input type="text" id="lat" name="Latitude" value="<?php echo $Latitude;?>"><br> <br>
	<label>Logitude</label>
	<input type="text" id="lng" name="Logitude" value="<?php echo $Logitude;?>"><br> <br>
	<label>Keterangan</label>
	<input type="text" name="Keterangan" value="<?php echo $Keterangan;?>"><br> 
	<button type="sumbit"><?php echo $button;?></button>

</form>