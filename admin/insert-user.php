<?php
session_start();
if (isset($_SESSION['admin_login'])) {
    include('include/config.php');

    if (isset($_POST['insertData'])) {
        $fname = htmlentities($_POST['first_name']);
        $lname = htmlentities($_POST['last_name']);
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        $mobile = htmlentities($_POST['mobile']);
        $address1 = htmlentities($_POST['address1']);
        $address2 = htmlentities($_POST['address2']);




        $query = "INSERT INTO 
    user_info(first_name, last_name, email, password, mobile, address1, address2)
     VALUES 
     ('$fname', '$lname', '$email','$password','$mobile', '$address1', '$address2') " or die(mysqli_error($con));
        $sql = mysqli_query($con, $query);

        if ($sql) {
            $_SESSION['msg'] = "User  Inserted Successfully !!";
        } else {
            $_SESSION['msg'] = "Error Occured !";
        }
    }


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin| Insert User</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>

        <script>
            function getSubcat(val) {
                $.ajax({
                    type: "POST",
                    url: "get_subcat.php",
                    data: 'cat_id=' + val,
                    success: function(data) {
                        $("#subcategory").html(data);
                    }
                });
            }

            function selectCountry(val) {
                $("#search-box").val(val);
                $("#suggesstion-box").hide();
            }
        </script>


    </head>

    <body>
        <?php include('include/header.php'); ?>

        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <?php include('include/sidebar.php'); ?>
                    <div class="span9">
                        <div class="content">

                            <div class="module">
                                <div class="module-head">
                                    <h3>Insert Product</h3>
                                </div>
                                <div class="module-body">

                                    <?php if (isset($_POST['submit'])) { ?>
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                        </div>
                                    <?php } ?>


                                    <?php if (isset($_GET['del'])) { ?>
                                        <div class="alert alert-error">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                        </div>
                                    <?php } ?>

                                    <br />

                                    <form class="form" method="POST">
                                        <div class="col-lg-6 form-group">
                                            <input class="form-control" type="text" placeholder="First name" name="first_name" required />
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input class="form-control" type="text" placeholder="Last name" name="last_name" required />
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input class="form-control" type="email" placeholder="Email" name="email" required />
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input class="form-control" type="password" placeholder="password" name="password" required />
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input class="form-control" type="text" placeholder="Phone Number" name="mobile" required />
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input class="form-control" type="text" placeholder="First Address" name="address1" required />
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <input class="form-control" type="text" placeholder="Second Address" name="address2" required />
                                        </div>
                                        <div class="col-lg-6 form-group">
                                            <button type="submit" value="submit" name="insertData" class="btn subs_btn form-control">
                                                register now
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>





                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->

        <?php include('include/footer.php'); ?>

        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('.datatable-1').dataTable();
                $('.dataTables_paginate').addClass("btn-group datatable-pagination");
                $('.dataTables_paginate > a').wrapInner('<span />');
                $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
                $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
            });
        </script>
    </body>

<?php } else {
    header('location: ../index.php');
} ?>