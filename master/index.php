<?php include('linka.php'); ?>


    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides" >
        <ul class="slides-container" style="min-height: 100vh;">
            <li class="text-center" >
                <div style="background: url(images/Potensi-UMKM-Kalbar.jpg);  background-size:cover; height: 100vh;">
                    <div style=" background: rgba(0, 0, 0, 0.4); height: 100vh;">
                <div class="container">
                    <div class="row">
                        <?php if(!empty($_SESSION['username'])) {?>
                             <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome<br>Admin</strong></h1>
                            
                            <p><a class="btn hvr-hover" href="about.php">Tentang Umkm</a></p>
                        </div>
                        <?php }else{?>
                             <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br>UMKM GIS</strong></h1>
                            
                            <p><a class="btn hvr-hover" href="about.php">Tentang Umkm</a></p>
                        </div>
                        <?php }?>
                       
                   
                    </div>
                </div>
            </div>
                </div>
            </li>
        </ul>
    
    </div>
    <!-- End Slider -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; Fazjar sekti aji</p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
     <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
  
</body>

</html>