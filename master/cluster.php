<?php include('koneksi.php');
?>
<?php include('linka.php'); ?>

   <!-- Start Cart  -->
    <div class="cart-box-main" style="min-height: 100vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Cluster</h1>
                        <p style="color: black;font-size: 20px">Berikut ini merupakan data-data UMKM di Karangmalang</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row my-5">
                        <div class="col-lg-6 col-sm-6">
                            <div class="coupon-box">
                                <form class="search" action="Cluster.php" method="get">
                                <div class="input-group input-group-sm">
                                    <input class="form-control" placeholder="Masukan nama" name="cari" aria-label="Coupon code" type="text">
                                    <div class="input-group-append">
                                    <button class="btn btn-theme" type="submit">Refresh</button>

                                    <a style="margin-left: 200%;padding-top: 10px;" href="cluster-aksi.php" class="btn btn-theme">Cluster</a>
                                    <a style="margin-left: 5px;padding-top: 10px;" href="tambah.php" class="btn btn-theme">Tambah</a>
                                </div>
                                </form>
                            </div>
                            
                        </div>
                       
                    </div>
                </div>
<?php 
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
}
?>
                    <div class="table-main table-responsive" style="height: 370px;overflow-y: scroll;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nama Usaha</th>
                                    <th>Bidang</th>
                                    <th>Omset</th>
                                    <th>Aset</th>
                                    <th>Tenaga Kerja</th>
                                    <th>Lat</th>
                                    <th>Long</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                        <?php 
        include 'koneksi.php';
        $no=1;
        if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $data = mysqli_query($connect,"select * from data where nama_usaha like '%".$cari."%'");      
        }else{
        $data = mysqli_query($connect,"select * from data");       
        }
        
        while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['nama_usaha']; ?></td>
                <td><?php echo $d['bidang_usaha']; ?></td>
                <td><?php echo $d['omset']; ?></td>
                <td><?php echo $d['aset']; ?></td> 
                <td><?php echo $d['tenaga']; ?></td> 
                <td><?php echo $d['lat']; ?></td> 
                <td><?php echo $d['lng']; ?></td> 
                <td>
                <a class="btn btn-xs btn-warning" href="edit.php?id=<?php echo $d['id_data']; ?>">Edit</a>
                </td>
                <td>
                <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $d['id_data']; ?>" onclick="return confirm('Hapus data?')">Delete</a>
                </td>
             </tr>
            <?php 
        }
        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

           
        </div>
    </div>
    <!-- End Cart -->
 <script>
      // initialize Leaflet
      var map = L.map('map').setView([-7.421638, 111.022733], 11);

      // add the OpenStreetMap tiles
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
      }).addTo(map);
      // show the scale bar on the lower left corner
      L.control.scale().addTo(map);

      function addShape(name, cluster) {
      $.getJSON("Geojson/"+name+".geojson",function(data){
      var clusterJson = cluster;
      var warna;
      var keterangan;
      if(clusterJson==1) { warna = 'green';keterangan = 'banyak';}
      if(clusterJson==2) { warna = 'yellow';keterangan = 'cukup';}
      if(clusterJson==3) { warna = 'red';keterangan = 'sedikit';}

      // add GeoJSON layer to the map once the file is loaded
      L.geoJson(data, {
        style: function(feature){
          return{
            opacity: 1.0,
            color: warna,
            fillcolor: warna,
          }
        },
        onEachFeature: function( feature, layer ){
        layer.bindPopup( "<strong>" + name + "</strong><br/>Termasuk Cluster : " + keterangan)
        }

      }).addTo(map);
      });
      }




        <?php

          $query = mysqli_query($connect,"SELECT * from data");
          while ($data = mysqli_fetch_array($query)) {
            $nama = $data['nama'];
            $cluster= $data['cluster'];
            echo ("addShape('$nama','$cluster');\n");                        
          }
          ?>
       
    </script>
<?php include('linkaf.php'); ?>