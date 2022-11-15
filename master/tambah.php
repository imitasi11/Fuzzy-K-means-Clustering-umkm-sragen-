<?php include('linka.php'); ?>
<?php include('koneksi.php');?>


   <!-- Start Contact Us  -->
    <div class="contact-box-main" style="min-height: 100vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>Tambah Data</h2>
                        <p>Form Tambah Data UMKM di Sragen</p>
                        <form action="tambah-aksi.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="name" name="id" >
                                        <input type="text" class="form-control" id="name" name="nama"  placeholder="Nama" required data-error="Tolong masukkan Nama">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="nama_usaha" placeholder="Nama Usaha" required data-error="Tolong masukkan Nama">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="bidang_usaha" placeholder="Bidang Usaha" required data-error="Tolong masukkan Nama">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="email"  name="omset" placeholder="Omset"  required data-error="Tolong masukkan Nilai Omset">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="subject" name="aset"placeholder="Aset" required data-error="Tolong masukkan Nilai Aset">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="subject" name="tenaga" placeholder="Tenaga Kerja" required data-error="Tolong masukkan dengan Benar, max nilai = 10" min="1" max="10">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" id="subject" name="lat"placeholder="Latitude" required data-error="Tolong masukkan Latitude dengan benar" pattern="([-][0-9])+([.][0-9]+)?" formnovalidate>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" id="subject" name="lng" placeholder="Longitude" required data-error="Tolong masukkan Longitude dengan benar" pattern="[0-9]+([.][0-9]+)?" formnovalidate>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button class="btn hvr-hover" id="submit" type="submit">Simpan</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Cart -->
    <!-- End About Page -->
<?php include('linkaf.php'); ?>