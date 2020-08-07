<!--================Footer Area =================-->
<footer class="footer_area">
    <div class="container">
        <div class="footer_widgets">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-6">
                    <aside class="f_widget f_about_widget">
                        <img src="img/logo.png" alt="" style="max-width: 100%;" />
                        <p>
                            Jenny Shop is a permium Shopping Website .
                        </p>
                        <h6>Social:</h6>
                        <ul>
                            <li>
                                <a href="#"><i class="social_facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="social_twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="social_pinterest"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="social_instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="social_youtube"></i></a>
                            </li>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <aside class="f_widget link_widget f_info_widget">
                        <div class="f_w_title">
                            <h3>Information</h3>
                        </div>
                        <ul>
                            <li>Delivery information</li>
                            <li>Terms & Conditions</li>
                        </ul>
                    </aside>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <aside class="f_widget link_widget f_service_widget">
                        <div class="f_w_title">
                            <h3>Customer Service</h3>
                        </div>
                        <ul>
                            <li><a href="<?php isset($_SESSION['login']) || isset($_SESSION['admin_login']) ? print("user_details.php") : print("login.php")   ?>"><?php isset($_SESSION['login']) || isset($_SESSION['admin_login']) ? print("Your Account") : print("Not Logged In")  ?></a></li>
                            <li><a href="track.php">Ordr History</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                        </ul>
                    </aside>
                </div>

                <div class="col-lg-2 col-md-4 col-6">
                    <aside class="f_widget link_widget f_account_widget">
                        <div class="f_w_title">
                            <h3>My Account</h3>
                        </div>
                        <ul>
                            <li><a href="<?php isset($_SESSION['login']) || isset($_SESSION['admin_login']) ? print("user_details.php") : print("login.php")   ?>"><?php isset($_SESSION['login']) || isset($_SESSION['admin_login']) ? print("Your Account") : print("Not Logged In")  ?></a></li>

                        </ul>
                    </aside>
                </div>
            </div>
        </div>
        <div class="footer_copyright">
            <h5>
                ©
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
        </div>
    </div>
</footer>
<!--================End Footer Area =================-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-3.2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Rev slider js -->
<script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<!-- Extra plugin css -->
<script src="vendors/counterup/jquery.waypoints.min.js"></script>
<script src="vendors/counterup/jquery.counterup.min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="vendors/bootstrap-selector/js/bootstrap-select.min.js"></script>
<script src="vendors/image-dropdown/jquery.dd.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="vendors/isotope/isotope.pkgd.min.js"></script>
<script src="vendors/magnify-popup/jquery.magnific-popup.min.js"></script>
<script src="vendors/vertical-slider/js/jQuery.verticalCarousel.js"></script>
<script src="vendors/jquery-ui/jquery-ui.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="js/theme.js"></script>
<script src="js/main.js"></script>
<script>
    //validations
    function check_login(myform) {
        var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
        var email = myform.email.value;
        var password = myform.password.value;
        if (email == "" || !re.test(email)) {
            swal('Please Enter A Valid Email Address');
            return false;
        }

        if (password == "" || password == null) {
            swal("Password is Required");
            return false;
        } else {
            return true;
        }
    }

    function check_register(myform) {
        var first_name = myform.first_name.value;
        var last_name = myform.last_name.value;
        var email = myform.email.value;
        var password = myform.password.value;
        var mobile = myform.mobile.value;
        var address1 = myform.address1.value;
        var address2 = myform.address2.value;
        var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;

        if (first_name == "" || first_name == null) {
            swal("first name is Required");
            return false;
        }
        if (last_name == "" || last_name == null) {
            swal("last name is Required");
            return false;
        }
        if (email == "" || !re.test(email)) {
            swal('Please Enter A Valid Email Address');
            return false;
        }
        if (password < 8) {
            swal("Password Should Be Greater Than 8");
            return false;
        }
        if (mobile <= 11) {
            swal("Mobile number too Short");
            return false;
        }
        if (address1 == "" || address1 == null) {
            swal("Address 1 is required");
            return false;
        }


        if (address2 == "" || address2 == null) {
            swal("Address 2 is Required");
            return false;
        } else {
            return true;
        }
    }

    function validdatePassword() {
        var password = $('#password').val();
        var cpassword = $('#cpassword').val();
        console.log(password);
        if (password != cpassword) {
            swal('Passwords Did Not Match');
            return false;
        } else {
            return true;
        }

    }
</script>
</body>

</html>