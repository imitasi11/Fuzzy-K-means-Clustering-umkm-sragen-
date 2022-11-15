<?php include('linka.php'); ?>
<?php include('koneksi.php'); ?>


    <!-- Start About Page  -->
    <script src="jquery-3.6.0.js"></script> 
    <script src="leaflet/leaflet.js"></script>
    <link rel="stylesheet" href="leaflet/leaflet.css" />
    <div class="about-box-main" style="min-height: 100vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Map</h1>
                        <p style="color: black;font-size: 20px">Berikut ini merupakan pemetaan UMKM di Karangmalang, merah menandakan mikro, kuning menandakan kecil, dan hijau menandakan menengah</p>
                    </div>
                </div>
            </div>
            <div class="row" align="center">
			<div class="col-lg-12">
                   <div id="map" style="width:80%; height:500px; margin-left: 5%;"></div>
             </div>  
            </div>
           
        </div>
    </div>
    <!-- End About Page -->
     <script>
      // initialize Leaflet
      var map = L.map('map').setView([-7.454655, 111.019499], 13);
      var greenIcon = new L.Icon({
  iconUrl: 'images/1.png'
});
      var yellowIcon = new L.Icon({
  iconUrl: 'images/2.png'
});
      var redIcon = new L.Icon({
  iconUrl: 'images/3.png'
});

      // add the OpenStreetMap tiles
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
      }).addTo(map);
      // show the scale bar on the lower left corner
      L.control.scale().addTo(map);

       
      function addShape(name, cluster,lat ,lng) {
      var clusterJson = cluster;
        var latitude = lat;
        var longitude = lng;
      if(clusterJson==1) {
        keterangan = 'mikro';
      L.marker([latitude,longitude,12], {icon: redIcon}) .bindPopup("<strong>" + name + "</strong><br/>Termasuk Cluster : " + keterangan).addTo(map);
  }
      if(clusterJson==2) {
        keterangan = 'kecil';
      L.marker([latitude,longitude,12], {icon: yellowIcon}) .bindPopup("<strong>" + name + "</strong><br/>Termasuk Cluster : " + keterangan).addTo(map);
  }
      if(clusterJson==3) {
        keterangan = 'menengah';
      L.marker([latitude,longitude,12], {icon: greenIcon}) .bindPopup("<strong>" + name + "</strong><br/>Termasuk Cluster : " + keterangan).addTo(map);
  }
       
      

      }
      addShape('nama',1,-7.454655,111.019499);
      <?php 
          $query = mysqli_query($connect,"SELECT * from data");
          while ($data = mysqli_fetch_array($query)) {

            $nama = $data['nama_usaha'];
            $cluster= $data['cluster'];
            $lat= $data['lat'];
            $lng= $data['lng'];
            echo ("addShape('$nama',".$cluster.",".$lat.",".$lng.");\n"); 
          }
          
          ?>

       
       
    </script>
<?php include('linkaf.php'); ?>