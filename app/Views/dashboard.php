<?php include 'header.php'; ?>
<!-- 
<div>
	<div><?php echo $user; ?></div>
	<a href="<?php echo site_url('home/logOut') ?>">Logout</a>
</div> -->

<div class="row bg-info p-4">
	<div class="col">
		<h3 class="text-white">Welcome-<?php echo $user; ?></h3>	
	</div>
	<div class="col-auto">
		<?php echo '<a href="'.base_url().'/home/logOut" class="btn btn-outline-danger">Logout</a>'; ?>
	</div>
</div>








<div class="h-100">
	<div class="row pt-3">
		<div class="col-3">
			<ul class="list-group">
				<a href="<?php echo site_url('admin/adminDashboard') ?>" class="list-group-item list-group-item-action text-center">Dashboard</a>
				<a href="<?php echo site_url('admin/allCustomersInformation') ?>" class="list-group-item list-group-item-action text-center">Customers</a>
				<a href="<?=site_url('admin/newTransaction')?>" class="list-group-item list-group-item-action text-center">Transaction</a>
				<a href="<?=site_url('admin/productList')?>" class="list-group-item list-group-item-action text-center">Products</a>
				<a href="<?=site_url('admin/sellDetails')?>" class="list-group-item list-group-item-action text-center">Sell</a>
				<a href="<?=site_url('admin/returnDetails')?>" class="list-group-item list-group-item-action text-center">Return</a>
				<a href="<?=site_url('admin/buyDetails')?>" class="list-group-item list-group-item-action text-center">Buy</a>
			</ul>
		</div>
		<div class="col-9">
			<?= $this->renderSection('content'); ?>
		</div>
	</div>
</div>




<?php include 'footer.php'; ?>
