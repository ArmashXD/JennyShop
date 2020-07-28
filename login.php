<?php include('views/header.php');
if (isset($_SESSION['login'])) {
  echo "<script>window.location.href= 'index.php'</script>";
}

if (isset($_POST['loginBtn'])) {
  $email = htmlentities($_POST['email']);
  $password = htmlentities($_POST['password']);

  $login = $user->login($email, $password);
  $admin = $user->adminLogin($email, $password);
  if ($admin) {
    echo "<script>alert('Admin Logged In Successful!'); window.location.href= 'admin/index.php'</script>";
  }
  if ($login) {
    echo "<script>alert('Login Successful!'); window.location.href= 'index.php'</script>";
  } else {
    print("
    <div aria-live='polite' aria-atomic='true' class='d-flex justify-content-center align-items-center' style='min-height: 200px;'>
    
      <!-- Then put toasts within -->
      <div class='toast' role='alert' aria-live='assertive' aria-atomic='true'>
        <div class='toast-header'>
          <strong class='mr-auto'>Error</strong>
          <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='toast-body'>
          Some error Occured, Please make sure you provided right details. Thank you!
        </div>
      </div>
    </div>");
  }
}
if (isset($_POST['registerBtn'])) {
  $fname = htmlentities($_POST['first_name']);
  $lname = htmlentities($_POST['last_name']);
  $email = htmlentities($_POST['email']);
  $password = htmlentities($_POST['password']);
  $mobile = htmlentities($_POST['mobile']);
  $address1 = htmlentities($_POST['address1']);
  $address2 = htmlentities($_POST['address2']);

  $register = $user->register($fname, $lname, $email, $password, $mobile, $address1, $address2);
  if ($register) {
    print("
    <div aria-live='polite' aria-atomic='true' class='d-flex justify-content-center align-items-center' style='min-height: 200px;'>
    
      <!-- Then put toasts within -->
      <div class='toast' role='alert' aria-live='assertive' aria-atomic='true'>
        <div class='toast-header'>
          <strong class='mr-auto'>Success</strong>
          <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='toast-body'>
          Now you can login !
        </div>
      </div>
    </div>");
  } else {
    print("
    <div aria-live='polite' aria-atomic='true' class='d-flex justify-content-center align-items-center' style='min-height: 200px;'>
    
      <!-- Then put toasts within -->
      <div class='toast' role='alert' aria-live='assertive' aria-atomic='true'>
        <div class='toast-header'>
          <strong class='mr-auto'>Error</strong>
          <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='toast-body'>
          Some error Occured, Please make sure you provided right details. Thank you!
        </div>
      </div>
    </div>");
  }
}
?>
<!--================Categories Banner Area =================-->
<section class="solid_banner_area">
  <div class="container">
    <div class="solid_banner_inner">
      <h3>LOgin</h3>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="track.html">Login</a></li>
      </ul>
    </div>
  </div>
</section>
<!--================End Categories Banner Area =================-->

<!--================login Area =================-->
<section class="login_area p_100">
  <div class="container">
    <div class="login_inner">
      <div class="row">
        <div class="col-lg-4">
          <div class="login_title">
            <h2>log in your account</h2>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque consectetur
              dignissimos
            </p>
          </div>
          <form name="form1" class="login_form row" onSubmit="return check_login(form1)" method="POST">
            <div class="col-lg-12 form-group">
              <input class="form-control" type="text" placeholder="Name" name="email" id="loginEmail" />
            </div>
            <div class="col-lg-12 form-group">
              <input class="form-control" type="password" placeholder="Password" id="loginPassword" name="password" />
            </div>
            <div class="col-lg-12 form-group">
              <div class="creat_account">
                <input type="checkbox" id="f-option" name="selector" />
                <label for="f-option">Keep me logged in</label>
                <div class="check"></div>
              </div>
              <h4>Forgot your password ?</h4>
            </div>

            <div class="col-lg-12 form-group">
              <button type="submit" value="submit" name="loginBtn" class="bt6n update_btn form-control">
                Login
              </button>
            </div>
          </form>
        </div>
        <div class="col-lg-8">
          <div class="login_title">
            <h2>create account</h2>
            <p>
              Follow the steps below to create email account enjoy the great
              mail.com emailing experience. Vivamus tempus risus vel felis
              condimentum, non vehicula est iaculis.
            </p>
          </div>
          <form name="form2" onSubmit="return check_register(form2)" class="login_form row" method="POST">
            <div class="col-lg-6 form-group">
              <input class="form-control" type="text" placeholder="First name" name="first_name" />
            </div>
            <div class="col-lg-6 form-group">
              <input class="form-control" type="text" placeholder="Last name" name="last_name" />
            </div>
            <div class="col-lg-6 form-group">
              <input class="form-control" type="text" placeholder="Email" name="email" />
            </div>
            <div class="col-lg-6 form-group">
              <input class="form-control" type="password" placeholder="password" name="password" />
            </div>
            <div class="col-lg-6 form-group">
              <input class="form-control" type="text" placeholder="Phone Number" name="mobile" />
            </div>
            <div class="col-lg-6 form-group">
              <input class="form-control" type="text" placeholder="First Address" name="address1" />
            </div>
            <div class="col-lg-6 form-group">
              <input class="form-control" type="text" placeholder="Second Address" name="address2" />
            </div>
            <div class="col-lg-6 form-group">
              <button type="submit" value="submit" name="registerBtn" class="btn subs_btn form-control">
                register now
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End login Area =================-->


<?php include('views/footer.php'); ?>