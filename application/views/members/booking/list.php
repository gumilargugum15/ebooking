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
                <div class="card mb-3">
                <div class="card-header">
						<a href="#"><i class="fas fa-cart-arrow-down"></i> Keranjang belanja</a>
				</div>
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-hover" id="datacart" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Price total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $sum =0; $nom=0; ?>
                <?php foreach ($cart as $carts): ?>
                <tr>
                    <td><?php echo $carts->name ?></td>
                    <td><img src="<?php echo base_url('upload/product/'.$carts->image) ?>" width="64" /></td>
                    <td><?php echo number_format($carts->price) ?></td>
                    <td align="center"><form action="<?php echo base_url('index.php/members/products/updatebooking') ?>" method="post">
                    <input type="text" name="qty" value="<?php echo number_format($carts->qty) ?>" size="2" style="text-align: center">
                    <input type="hidden" name="produkid" value="<?php echo $carts->product_id ?>">
                    <input type="hidden" name="bookid" value="<?php echo $carts->booking_id ?>">
                    </td>
                    <td align="right"><?php echo number_format($carts->qty*$carts->price) ?></td>
                    <td align="right">
                    <input class="btn btn-warning" type="submit" name="btn" value="Ubah" /></form>
                    <a onclick="deleteConfirm('<?php echo site_url('members/products/deletebooking/'.$carts->product_id.'/'.$carts->booking_id) ?>')"
											 href="#!" class="btn btn-danger">Hapus</a></td>
                </tr>
                <? $sum = $carts->qty+$sum;
                   $nom = ($carts->qty*$carts->price)+$nom;
                ?>
                <?php endforeach; ?>
                
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3" >Total</td><td align="center"> <?php echo number_format($sum); ?></td><td align="right"><?php echo number_format($nom); ?></td>
                    <td align="right"><a onclick="deleteConfirm('<?php echo site_url('members/products/deletebooking/'.$carts->product_id.'/'.$carts->booking_id) ?>')"
											 href="#!" class="btn btn-success"><i class="fas fa-send (alias)"></i> Checkout</a></td>
                </tr>
                </tfoot>
                </table>

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
    <script>
    function deleteConfirm(url){
    	$('#btn-delete').attr('href', url);
    	$('#deleteModal').modal();
    }
    
</script>
	

</body>

</html>