<?php include('views/header.php');
if (!isset($_SESSION['login'])) {
    echo "<script>window.location.href= 'index.php'</script>";
}
?>
<br /><br />
<div class="container"> <br />
    <hr />
    <br /><br />

    <div class="container">
        <div class="user-info">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3> Your Details</h3>
                    </div>
                    <div class="row">
                        <?php
                        //  $id = $_GET['user_Id'];

                        //$users = $user->user_details($id);
                        //first approach failed
                        // array_map(function ($item) use ($users) {
                        // Second approach
                        //  foreach ((array) $item as $users) {
                        //    if (isset($item['user_id'])) {
                        ?>
                        <div class="col-sm-6">
                            <br>
                            <p class="lead">First Name: <?php echo  $_SESSION['username']; ?></p>
                        </div>
                        <div class="col-sm-6">
                            <br>
                            <p class="lead">Email: <?php echo     $_SESSION['email'];
                                                    ?></p>
                        </div>
                        <div class="col-sm-6">
                            <br>
                            <p class="lead">Last Name: <?php echo  $_SESSION['last_name']; ?></p>
                        </div>
                        <div class="col-sm-6">
                            <br>
                            <p class="lead">Mobile: <?php echo $_SESSION['Mobile']; ?></p>
                        </div>
                        <div class="col-sm-6">
                            <br>
                            <p class="lead">Address 1: <?php echo  $_SESSION['Address1']; ?></p>
                        </div>
                        <div class="col-sm-6">
                            <br>
                            <p class="lead">Address 2: <?php echo $_SESSION['Address2']; ?></p>
                        </div>
                        <div class="col-sm-6">
                            <br>

                            <button type="button" class="btn update_btn form-control" data-toggle="modal" data-target="#exampleModalCenter">Update Profile</button>
                        </div>
                        <div class="col-sm-6">
                            <br>

                            <button type="submit" value="submit" class="btn update_btn form-control">Change Password</button> </div>
                        <?php
                        //  }
                        //}
                        // }, $users);

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($_POST['update_profile'])) {
        $user_id = $_SESSION['user_id'];
        $fname = htmlentities($_POST['first_name']);
        $lname = htmlentities($_POST['last_name']);
        $email = htmlentities($_POST['email']);
        $mobile = htmlentities($_POST['mobile']);
        $address1 = htmlentities($_POST['address1']);
        $address2 = htmlentities($_POST['address2']);

        $update = $user->updateProfile($fname, $lname, $email, $mobile, $address1, $address2, $user_id);
        if ($update) {
            echo "<script>alert('Profile Updated !')</script>";
            echo "<script>window.href.location = 'user_details.php';</script>";
        } else {
            echo "<script>alert('Some Error Occured !')</script>";
        }
    } ?>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Update Your Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" value="<?php echo  $_SESSION['username']; ?>" name="first_name" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" value="<?php echo $_SESSION['last_name']; ?>" name="last_name" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" id="Email" value="<?php echo $_SESSION['email']; ?>" name="email" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" id="mobile" value="<?php echo $_SESSION['Mobile']; ?>" name="mobile" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="address1">Address 1</label>
                            <input type="text" class="form-control" id="address1" value="<?php echo  $_SESSION['Address1']; ?>" name="address1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="address2">Address 2(Shipping)</label>
                            <input type="text" class="form-control" id="address2" value="<?php echo  $_SESSION['Address1']; ?>" name="address2" placeholder="Password">
                        </div>

                        <button type="submit" class="add_cart_btn" name="update_profile">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="add_cart_btn" data-dismiss="modal">Close</button>
                    <button type="button" class="add_cart_btn">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <br /><br />

    <hr />
    <br /><br />
</div>

<?php include('views/footer.php'); ?>