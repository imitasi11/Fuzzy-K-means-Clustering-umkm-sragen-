<?php include('koneksi.php');
?>
<?php include('linka.php'); ?>

   <!-- Start Cart  -->
    <div class="cart-box-main" style="min-height: 100vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Centroid</h1>
                        <p style="color: black;font-size: 20px">Cluster baru UMKM di Karangmalang</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Class</th>
                                    <th>Omset</th>
                                    <th>Aset</th>
                                    <th>Tenaga Kerja</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
       
        $no=1;
        
        $data = mysqli_query($connect,"select * from cluster");       

        
        while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['omset']; ?></td>
                <td><?php echo $d['aset']; ?></td> 
                <td><?php echo $d['tenaga']; ?></td> 
                <td>
                <a class="btn btn-xs btn-warning" href="class-edit.php?id=<?php echo $d['id_cluster'];?>">Edit</a>
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

<?php include('linkaf.php'); ?>