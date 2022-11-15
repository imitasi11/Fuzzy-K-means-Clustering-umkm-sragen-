<?php include('linka.php'); ?>
<?php include('koneksi.php');?>
<?php 
 
  $id = $_GET['id'];
  $query_mysql = mysqli_query($connect,"SELECT * FROM cluster WHERE id_cluster='$id'")or die(mysql_error());
  $nomor = 1;
  ?>
  <script type="text/javascript">

function check(num) {
  return isFinite(num) && Math.abs(num) <= 10;
}
function checkIfCaseExists() {
    var form_valid = false;
    var first = document.getElementById("omset").value;
    var second = document.getElementById("aset").value;
    var third = document.getElementById("tenaga").value;
    if (check(first)&&check(second)&&check(third)) {
        return true;
    }else{
        alert('Silahkan isi ulang form, nilai max=10, gunakan (.) untuk angka desimal');
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
                        <h2>Edit Centroid</h2>
                        <p>Form Edit Class UMKM di Karangmalang</p>
                        <?php while($data = mysqli_fetch_array($query_mysql)){ ?>
                        <form id="post-form" method="POST" action="edit-class-aksi.php" onsubmit="return checkIfCaseExists()" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="name" name="id" value="<?php echo $data['id_cluster'] ?>">
                                        <input type="text" class="form-control" id="name" name="nama" value="<?php echo $data['nama'] ?>" placeholder="Nama" required data-error="Tolong masukkan Nama">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="omset"  name="omset" value="<?php echo $data['omset'] ?>"placeholder="Omset"  required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="aset" name="aset" value="<?php echo $data['aset'] ?>"placeholder="Aset" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="tenaga" name="tenaga" value="<?php echo $data['tenaga'] ?>"placeholder="Tenaga Kerja" required >
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