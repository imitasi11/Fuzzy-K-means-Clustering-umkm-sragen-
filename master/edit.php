<?php include('linka.php'); ?>
<?php include('koneksi.php');?>
<?php 
 
  $id = $_GET['id'];
  $query_mysql = mysqli_query($connect,"SELECT * FROM data WHERE id_data='$id'")or die(mysql_error());
  $nomor = 1;
  ?>
  <script type="text/javascript">
  	 function isLatitude(lat) {
  return isFinite(lat) && Math.abs(lat) <= 90;
}

function isLongitude(lng) {
  return isFinite(lng) && Math.abs(lng) <= 180;
}
function checkIfCaseExists() {
    var form_valid = false;
     var lat = document.getElementById("lat").value;
    var lng = document.getElementById("lng").value;
    if (isLatitude(lat)&&isLongitude(lng)) {
        return true;

    }else{
        alert('Silahkan isi ulang latitude dan longitude anda, gunakan (.) untuk angka desimal');
        return false;
    }
    //whatever condition you want to check
    if(true){
      form_valid = true;
    }

    return form_valid;
  }
  </script>

   <!-- Start Contact Us  -->
    <div class="contact-box-main" style="min-height: 100vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Edit Data</h2>
                        <p>Form Edit Data UMKM di Sragen</p>
                        <?php while($data = mysqli_fetch_array($query_mysql)){ ?>
                        <form id="post-form" method="POST" action="edit-aksi.php" onsubmit="return checkIfCaseExists()" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="name" name="id" value="<?php echo $data['id_data'] ?>">
                                        <input type="text" class="form-control" id="name" name="nama" value="<?php echo $data['nama'] ?>" placeholder="Nama" required data-error="Tolong masukkan Nama">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="nama_usaha" value="<?php echo $data['nama_usaha'] ?>" placeholder="Nama Usaha" required data-error="Tolong masukkan Nama">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="bidang_usaha" value="<?php echo $data['bidang_usaha'] ?>" placeholder="Bidang Usaha" required data-error="Tolong masukkan Nama">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="email"  name="omset" value="<?php echo $data['omset'] ?>"placeholder="Omset"  required data-error="Tolong masukkan Nilai Omset">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="subject" name="aset" value="<?php echo $data['aset'] ?>"placeholder="Aset" required data-error="Tolong masukkan Nilai Aset">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="tenaga" value="<?php echo $data['tenaga'] ?>"placeholder="Tenaga Kerja" required data-error="Tolong masukkan dengan Benar, max nilai = 10" min="1" max="10">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="lat" name="lat" value="<?php echo $data['lat'] ?>"placeholder="Latitude" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="lng" name="lng" value="<?php echo $data['lng'] ?>" placeholder="Longitude" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" type="submit">Update</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php }?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Cart -->
    <!-- End About Page -->
<?php include('linkaf.php'); ?>