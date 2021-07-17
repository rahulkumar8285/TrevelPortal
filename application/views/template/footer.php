<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">dirEngine</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Information</h2>
                    <ul class="list-unstyled">
                        <li class="nav-item "><a href="<?php echo base_url(); ?>" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="<?php echo base_url('Home/about'); ?>" class="nav-link">About</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo base_url('Home/Cabs'); ?>" class="nav-link">Cab</a>
                        </li>
                        <li class="nav-item"><a href="<?php echo base_url('Home/Hotelview'); ?>"
                                class="nav-link">Hotels</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Customer Support</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo base_url('Home/Contact'); ?>" class="py-2 d-block">Contact
                                Us</a></li>
                        <li><a href="<?php echo site_url('vandar_cl/index');?>" class="py-2 d-block">
                                Seller Singup</a></li>
                        <li><a href="<?php echo site_url('Home/venderlogin');?>" class="py-2 d-block">
                                Seller Login</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View,
                                    San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929
                                        210</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span
                                        class="text">info@yourdomain.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="icon-heart"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
            stroke="#F96D00" />
    </svg></div>
<script src="<?php echo base_url();?>public/asset/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>public/asset/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?php echo base_url();?>public/asset/js/popper.min.js"></script>
<script src="<?php echo base_url();?>public/asset/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>public/asset/js/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url();?>public/asset/js/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url();?>public/asset/js/jquery.stellar.min.js"></script>
<script src="<?php echo base_url();?>public/asset/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>public/asset/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url();?>public/asset/js/aos.js"></script>
<script src="<?php echo base_url();?>public/asset/js/jquery.animateNumber.min.js"></script>
<script src="<?php echo base_url();?>public/asset/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>public/asset/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="<?php echo base_url();?>public/asset/js/google-map.js"></script>
<script src="<?php echo base_url();?>public/asset/js/main.js"></script>
<script src="<?php echo base_url();?>public/asset/js/myscrpit.js"></script>
<script>
$('#adharfile').on('change', function() {
    var fileName = $(this).val();
    var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
    $(this).next('.custom-file-label').html(cleanFileName);
});
$('#penfile').on('change', function() {
    var fileName = $(this).val();
    var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
    $(this).next('.custom-file-label').html(cleanFileName);
});
$('#bankfile').on('change', function() {
    var fileName = $(this).val();
    var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
    $(this).next('.custom-file-label').html(cleanFileName);
});
$('#profile').on('change', function() {
    var fileName = $(this).val();
    var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
    $(this).next('.custom-file-label').html(cleanFileName);
});
</script>
</body>

</html>