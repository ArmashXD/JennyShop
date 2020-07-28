<?php
session_start();
include('include/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Manage Products</title>
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
								<h3>Manage Products</h3>
							</div>
							<div class="module-body table">

								<br />


								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Product Name</th>
											<!-- <th>Category </th>
											<th>Brand</th> -->
											<th>Product Description</th>
											<th>Product Price</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

										<?php $query = mysqli_query($con, "SELECT * FROM products");
										$cnt = 1;
										while ($row = mysqli_fetch_array($query)) {
										?>
											<tr>
												<td><?php echo htmlentities($cnt); ?></td>
												<td> <?php echo htmlentities($row['product_title']); ?></td>
												<!-- <td><?php// echo htmlentities($row['product_cat ']); ?></td>
												<td><?php// echo htmlentities($row['product_brand ']); ?></td> -->
												<td><?php echo htmlentities($row['product_desc']); ?></td>
												<td><?php echo htmlentities($row['product_price']); ?></td>
												<td>
													<a href="edit-product.php?product_Id=<?php echo $row["product_id"]; ?>"><i class="icon-edit"></i></a>
													<a href="delete-product.php?product_Id=<?php echo $row["product_id"]; ?>" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a>
												</td>
											</tr>
										<?php $cnt = $cnt + 1;
										} ?>

								</table>
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