<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peta Nusa Tenggara Barat</title>

  <!--   < load css leaflet > -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/src/leaflet.css">
   <!--  < load js leaflet  -->
    <script src="<?php echo base_url();?>assets/src/leaflet.js"></script>
    <script src="<?php echo base_url();?>assets/geojson/gerunung.js" type="text/javascript"></script>
    <style>
        body,html{
            padding: 0px;
            margin: 0px;
            height: 100%;
        }
        #ntbmap{
            height: 100%;
        }
    </style>
</head>
<body>
    <div id="ntbmap"></div>


    <script>
    var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' + 
                 ' &copy; <a href="https://www.jihadul4kbar.github.io/">Jihadul Akbar</a>',
        mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiamloYWR1bDRrYmFyIiwiYSI6ImNqZ3lzOXpmaDA0bGQzMnJveGh5eW5lZjgifQ.IrFoCdc8VtGPQEzUFPqG_A';

    var satellite = L.tileLayer(mbUrl, {id:'mapbox.satellite', attribution:mbAttr});
        streets  = L.tileLayer(mbUrl, {id: 'mapbox.streets',   attribution: mbAttr});

    var map = L.map('ntbmap', {
        center: [-8.6873968, 116.2817962],
        zoom: 10,
        layers: [streets]
    });
    
    var baseLayers = {
        "Satellite": satellite,
        "Jalan": streets,        
        
    };
    L.control.layers(baseLayers).addTo(map);

var mapIcon = L.Icon.extend({
        options: {
            iconSize: [33, 38],
        }
        });
<?php foreach ($map as $baris ) { ?>
    var <?php echo 'icon'.$baris->idkategori;?> = new mapIcon({iconUrl: '<?php echo base_url();?>assets/upload/<?php echo $baris->icon;?>'});
<?php } ?>
    <?php foreach ($map as $baris ) { ?>
       L.marker([<?php echo $baris->Latitude;?>,<?php echo $baris->Logitude;?>],{icon: <?php echo 'icon'.$baris->idkategori;?>}).addTo(map).bindPopup('<?php echo $baris->Nama_Lokasi;?> ,<br> <?php echo $baris->Keterangan;?>');
   <?php  } ?>

 //    L.geoJSON([gerunung, praya, leneg], {
	// 	style: function (feature) {
	// 		return feature.properties && feature.properties.style;
	// 	}
	// }).addTo(map);
    
    </script>



</body>
</html>