<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>
<style>
.card-default {
  display: flex;
  flex-wrap: wrap;
}

.card-default>* {
  width: 100%;
}


</style>
<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("members/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->

				<div class="row">
				
				<div class="col-xl-12 col-sm-12 mb-12">
				<div class="card h-100">
				<!-- <div class="card-img">
				<img src="<?php echo base_url('upload/product/'.$product->image) ?>" width="100%" height="100%" class="img-thumbnail"/>
				</div> -->
				<div class="embed-responsive embed-responsive-16by9">
				<img alt="Card image cap" class="card-img-top embed-responsive-item" src="<?php echo base_url('upload/product/'.$product->image) ?>" />
			</div>	
					<div class="card-body" >
					<p class="card-text" style="color:#00873a"><b><?php echo $product->name ?></b></p>
					<p class="card-text" style="color:#e81b30">
					<?php echo '<b>Rp. '.number_format($product->price).'</b>'; ?></p>
					<p class="card-text"><?php echo $product->description ?></p>
						
					</div>
					<div class="card-footer">
						<a class="btn btn-primary btn-block" href="<?php echo site_url('members/products/booking/'.$product->product_id) ?>">Beli</a>
					</div>
					</div>
				</div>
			    
				
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>
	

</body>

</html>