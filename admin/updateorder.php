<?php
session_start();
if (isset($_SESSION['admin_login'])) {
  include_once 'include/config.php';

  $oid = intval($_GET['order_id']);
  if (isset($_POST['submit2'])) {
    $status = $_POST['status'];
    $remark = $_POST['remark']; //space char
    $date = 'CURDATE()';

    $query = mysqli_query($con, "INSERT INTO orders(order_id, status, remarks, Date) VALUES('$oid','$status','$remark', $date)");
    $sql = mysqli_query($con, "UPDATE orders_info SET Status='$status' WHERE order_id='$oid'");
    echo "<script>alert('Order updated sucessfully...');</script>";
    //}
  }

?>
  <script language="javascript" type="text/javascript">
    function f2() {
      window.close();
    }

    function f3() {
      window.print();
    }
  </script>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Update Compliant</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="anuj.css" rel="stylesheet" type="text/css">
  </head>

  <body>

    <div style="margin-left:50px;">
      <form name="updateticket" id="updateticket" method="post">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr height="50">
            <td colspan="2" class="fontkink2" style="padding-left:0px;">
              <div class="fontpink2"> <b>Update Order !</b></div>
            </td>

          </tr>
          <tr height="30">
            <td class="fontkink1"><b>order Id:</b></td>
            <td class="fontkink"><?php echo $oid; ?></td>
          </tr>
          <?php
          $ret = mysqli_query($con, "SELECT * FROM orders WHERE order_id='$oid'");
          while ($row = mysqli_fetch_array($ret)) {
          ?>



            <tr height="20">
              <td class="fontkink1"><b>At Date:</b></td>
              <td class="fontkink"><?php echo $row['Date']; ?></td>
            </tr>
            <tr height="20">
              <td class="fontkink1"><b>Status:</b></td>
              <td class="fontkink"><?php echo $row['status']; ?></td>
            </tr>
            <tr height="20">
              <td class="fontkink1"><b>Remark:</b></td>
              <td class="fontkink"><?php echo $row['remarks']; ?></td>
            </tr>


            <tr>
              <td colspan="2">
                <hr />
              </td>
            </tr>
          <?php } ?>
          <?php
          $st = 'Delivered';
          $rt = mysqli_query($con, "SELECT * FROM orders_info WHERE order_id='$oid'");
          while ($num = mysqli_fetch_array($rt)) {
            $currrentSt = $num['Status'];
          }
          if ($st == $currrentSt) { ?>
            <tr>
              <td colspan="2"><b>
                  Product Delivered </b></td>
            <?php } else {
            ?>

            <tr height="50">
              <td class="fontkink1">Status: </td>
              <td class="fontkink"><span class="fontkink1">
                  <select name="status" class="fontkink" required="required">
                    <option value="">Select Status</option>
                    <option value="in Process">In Process</option>
                    <option value="Delivered">Delivered</option>
                  </select>
                </span></td>
            </tr>

            <tr>
              <td class="fontkink1">Remark:</td>
              <td class="fontkink" align="justify"><span class="fontkink">
                  <textarea cols="50" rows="7" name="remark" required="required"></textarea>
                </span></td>
            </tr>
            <tr>
              <td class="fontkink1">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="fontkink"> </td>
              <td class="fontkink"> <input type="submit" name="submit2" value="update" size="40" style="cursor: pointer;" /> &nbsp;&nbsp;
                <input name="Submit3" type="submit" class="txtbox4" value="Close this Window " onClick="return f2();" style="cursor: pointer;" /></td>
            </tr>
          <?php } ?>
        </table>
      </form>
    </div>

  </body>

  </html>
<?php  } else {
  header('location: ../index.php');
} ?>