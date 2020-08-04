<?php
ob_start();
session_start();
if (isset($_SESSION['admin_login'])) {
	include('include/config.php');


?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin| Manage Users</title>
		<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link type="text/css" href="css/theme.css" rel="stylesheet">
		<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
		<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
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
									<h3>Manage Users</h3>
								</div>
								<div class="module-body table">
									<?php if (isset($_GET['del'])) { ?>
										<div class="alert alert-error">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
										</div>
									<?php } ?>

									<br />


									<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th> Name</th>
												<th>Email </th>
												<th>Shippping Address/City/State </th>
												<th>Billing Address/Products/Quantity/Total Amount</th>
												<th>Start Date</th>
												<th>Status</th>
												<th>Actions </th>

											</tr>
										</thead>
										<tbody>

											<?php $query = mysqli_query($con, "SELECT * FROM orders_info");
											$cnt = 1;
											while ($row = mysqli_fetch_array($query)) {
											?>
												<tr>
													<td><?php echo htmlentities($cnt); ?></td>
													<td><?php echo htmlentities($row['f_name']); ?></td>
													<td><?php echo htmlentities($row['email']); ?></td>

													<td><?php echo htmlentities($row['address'] . ", " . $row['city'] . ", " . $row['state']); ?></td>
													<td><?php echo htmlentities($row['address'] . ", " . $row['product_name'] . ", " . $row['prod_count'] . " / " . $row['total_amt'] . " Rs "); ?></td>
													<td><?php echo htmlentities($row['Start_Date']) ?></td>
													<td><?php echo htmlentities($row['Status']) ?></td>
													<td>
														<a href="updateorder.php?order_id=<?php echo $row["order_id"]; ?>"><i class="icon-edit"></i></a>
														<a href="delete-order.php?order_id=<?php echo $row["order_id"]; ?>" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a>
													</td>
												</tr>
											<?php $cnt = $cnt + 1;
											} ?>


									</table>
								</div>
								<?php
								function fetch_data()
								{
									$connect = mysqli_connect('localhost', 'root', '', 'onlineshopping');
									$query = mysqli_query($connect, "SELECT * FROM orders_info");
									while ($row = mysqli_fetch_array($query)) {
										$output = '
										<hr>
				
										<tr>
											<td>' . $row['f_name'] . '</td>
											<td>' . $row['email'] . '</td>
											<td>' . $row['address'] . ' " ," ' . $row['city'] . ' " ," ' . $row['state'] . '</td>
											<td>' . $row['address'] . ' " ," ' . $row['product_name'] . ' " ," ' . $row['prod_count'] . ' " ," ' . $row['total_amt'] . ' "Rs"</td>
											<td>' . $row['Start_Date'] . '</td>
											<td>' . $row['Status'] . '</td>
										</tr>
										<hr>
									';
									}
									return $output;
								}
								if (isset($_POST['create_pdf'])) {
									ob_end_clean();
									require('tcpdf_min/tcpdf.php');
									$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
									$obj_pdf->SetCreator(PDF_CREATOR);
									$obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");
									$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
									$obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
									$obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
									$obj_pdf->SetDefaultMonospacedFont('helvetica');
									$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
									$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
									$obj_pdf->setPrintHeader(false);
									$obj_pdf->setPrintFooter(false);
									$obj_pdf->SetAutoPageBreak(TRUE, 10);
									$obj_pdf->SetFont('helvetica', '', 12);
									$obj_pdf->AddPage();
									$content = '';
									$content .= '  
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
										<th> Name</th>
										<th>Email </th>
										<th>Shippping Address/City/State </th>
										<th>Billing Address/Products/Quantity/Total Amount</th>
										<th>Start Date</th>
										<th>Status</th>

										</tr>
									</thead>
								';
									$content .= fetch_data();
									$content .= '</table>';
									$obj_pdf->writeHTML($content);
									$obj_pdf->Output('sample.pdf', 'I');
								}
								?>
								<div class="container">
									<form method="post">
										<input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />
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

<?php
} else {
	header('location:../index.php');
}
?>