<?php
session_start();
if (isset($_SESSION['admin_login'])) {
    include('include/config.php');

    $id = $_GET['user_Id'];

    if (isset($_POST['updateUser'])) {
        $fname = htmlentities($_POST['fname']);
        $lname = htmlentities($_POST['lname']);
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        $mobile = htmlentities($_POST['mobile']);
        $address1 = htmlentities($_POST['address1']);
        $address2 = htmlentities($_POST['address2']);

        $query = "UPDATE user_info SET `first_name`='$fname',`last_name`='$lname',`email`='$email',`password`='$password',`mobile`='$mobile',`address1`='$address1',`address2`='$address2' WHERE user_Id = $id";

        $result = mysqli_query($con, $query);

        if ($result) {
            header("location: manage-users.php");
            echo "Success";
        } else {
            echo "Error";
        }
    }


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin| Insert Product</title>
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
                    <?php include('include/sidebar.php');

                    ?>
                    <div class="span9">
                        <div class="form">
                            <form method="POST">
                                <?php $query = mysqli_query($con, "SELECT * FROM user_info WHERE user_Id = $id");
                                while ($row = mysqli_fetch_array($query)) : ?>
                                    <div class="form-group">
                                        <label for="FirstName">First Name</label>
                                        <input type="text" class="form-control" value="<?php echo $row['first_name'] ?>" id="FirstName" aria-describedby="textHelp" placeholder="First Name" name="fname">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="LastName">Last Name</label>
                                        <input type="text" class="form-control" value="<?php echo $row['last_name'] ?>" id="LastName" placeholder="Last Name" name="lname">
                                    </div>
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input type="email" class="form-control" value="<?php echo $row['email'] ?>" id="Email" aria-describedby="emailHelp" placeholder="Email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" value="<?php echo $row['password'] ?>" id="exampleInputPassword1" placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mobile</label>
                                        <input type="number" class="form-control" value="<?php echo $row['mobile'] ?>" id="exampleInputPassword1" placeholder="Enter Mobile NUmber" name="mobile">
                                    </div>
                                    <div class="form-group">
                                        <label for="Adress1">Address 1</label>
                                        <input type="text" class="form-control" value="<?php echo $row['address1'] ?>" id="Adress1" placeholder="Password" name="address1">
                                    </div>
                                    <div class="form-group">
                                        <label for="Adress2">Address 2</label>
                                        <input type="text" class="form-control" value="<?php echo $row['address2'] ?>" id="Adress2" placeholder="Password" name="address2">
                                    </div>


                                <?php endwhile; ?>
                                <button type="submit" name="updateUser" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
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