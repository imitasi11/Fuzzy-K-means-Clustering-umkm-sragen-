<?php //include('linka.php'); ?>
<?php
//-- konfigurasi database
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'siparda';
//-- koneksi ke database server dengan extension mysqli
$db = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
//-- hentikan program dan tampilkan pesan kesalahan jika koneksi gagal
if ($db->connect_error) {
    die('Connect Error ('.$db->connect_errno.')'.$db->connect_error);
}

?>
 <script src="jquery-3.6.0.js"></script> 
    <script src="leaflet/leaflet.js"></script>
    <link rel="stylesheet" href="leaflet/leaflet.css" />
    <section id="main-content">
      <section class="wrapper">
        <div class="row" style="margin-top: 100px;">
          <H1>PETA WISATA</H1>
      
          <div id="map" style="width:50vw; height:50vh"></div>
  <script type="text/javascript">
      var map = L.map('map').setView([-7.421638, 111.022733], 11);
 
      // add the OpenStreetMap tiles
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
      }).addTo(map);
      // show the scale bar on the lower left corner
      L.control.scale().addTo(map);

       function addShape(name,lat,long) {
        var lat = lat;
        var long = long;
        L.marker([lat,long,12]).bindPopup('<strong>' + name + '</strong>').addTo(map);
      }
       <?php 
      $a='wisata';
      $query_mysql =  mysqli_query($db,"SELECT * FROM tb_tempat where jenis = '$a' and alamat = '$b'")or die(mysql_error());
  $wisata=0;
  $penginapan=0;
  while($data = mysqli_fetch_array($query_mysql)){
    $nama = $data['nama_tempat'];
            $lat= $data['lat'];
            $lng= $data['long'];            
            echo ("addShape('$nama','$lat','$lng');\n"); 
  } ?>
    </script>
  <!-- javascripts -->
  
        </div>
      </section>
    </section>
    <!--main content end-->
  </section>

</body>

</html>
<?php //include('linkaf.php'); ?>