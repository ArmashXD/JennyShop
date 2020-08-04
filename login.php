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

<?php include('views/login_form.php') ?>

<?php include('views/footer.php'); ?>