<?php
session_start();
if (isset($_SESSION['admin_login'])) {
    include('include/config.php');

    $id = $_GET['product_Id'];

    if (isset($_POST['submit'])) {
        $productname = htmlentities($_POST['productName']);
        $productbrand = htmlentities($_POST['brand']);
        $productcat = htmlentities($_POST['category']);
        $productprice = htmlentities($_POST['productprice']);
        $productdescription = htmlentities($_POST['productDescription']);
        $productimage = $_FILES["productimage"]["name"];
        $isItNew = htmlentities($_POST['check_new']);
        //for getting product id
        $query = mysqli_query($con, "SELECT MAX(product_id) AS product_id FROM products");

        $dir = "../img/product/";
        // if (!is_dir($dir)) {
        // 	mkdir("" . $productid);
        // }

        move_uploaded_file($_FILES["productimage"]["tmp_name"], $dir . $_FILES["productimage"]["name"]);
        $query = "UPDATE 
    products 
    SET 
    product_cat='$productcat',product_brand='$productbrand',product_title='$productname',product_price='$productprice',product_desc='$productdescription',product_image='$productimage',New='$isItNew' WHERE product_id = $id";
        $sql = mysqli_query($con, $query) or die(mysqli_error($con));

        if ($sql) {
            $_SESSION['msg'] = "Product Updated Successfully !!";
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

                                    <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
                                        <?php
                                        $query = mysqli_query($con, "SELECT * FROM products WHERE product_id = $id");
                                        while ($row1 = mysqli_fetch_array($query)) : ?>
                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Category</label>
                                                <div class="controls">
                                                    <select name="category" class="span8 tip" onChange="getSubcat(this.value);" required>
                                                        <option value="<?php echo $row1['product_cat'] ?>">Select Category (Default Selected)</option>
                                                        <?php $query = mysqli_query($con, "SELECT * FROM categories");
                                                        while ($row = mysqli_fetch_array($query)) { ?>

                                                            <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_title']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Brand</label>
                                                <div class="controls">
                                                    <select name="brand" class="span8 tip" onChange="getSubcat(this.value);" required>
                                                        <option value="<?php echo $row1['product_brand'] ?>">Select Brand (Default Selected)</option>
                                                        <?php $query = mysqli_query($con, "SELECT * FROM brands");
                                                        while ($row = mysqli_fetch_array($query)) { ?>

                                                            <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brand_title']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Product Name</label>
                                                <div class="controls">
                                                    <input type="text" name="productName" placeholder="Enter Product Name" value="<?php echo $row1['product_title'] ?>" class="span8 tip" required>
                                                </div>
                                            </div>


                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Product Price </label>
                                                <div class="controls">
                                                    <input type="text" name="productprice" placeholder="Enter Product Price" value="<?php echo $row1['product_price'] ?>" class="span8 tip" required>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Product Description</label>
                                                <div class="controls">
                                                    <textarea name="productDescription" value="<?php echo $row1['product_desc'] ?>" placeholder="Enter Product Description" rows="6" class="span8 tip">
											</textarea>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">New Product ?</label>
                                                <div class="controls">
                                                    <select name="check_new" id="productAvailability" class="span8 tip" required>
                                                        <option value="<?php echo $row1['New'] ?>"><?php echo $row1['New'] ?></option>
                                                        <option value="No">No</option>
                                                        <option value="Yes">Yes</option>
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="control-group">
                                                <label class="control-label" for="basicinput">Product Image</label>
                                                <div class="controls">
                                                    <input type="file" name="productimage" id="productimage1" value="<?php echo $row1['product_image'] ?>" class="span8 tip" required>
                                                </div>
                                            </div>


                                            <div class="control-group">
                                                <div class="controls">
                                                    <button type="submit" name="submit" class="btn">Insert</button>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
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