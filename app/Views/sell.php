<?php $this->extend('dashboard'); ?>
<?php $this->section('content'); ?>

<?php 
	//echo $id=$customerId;
?>

<script type="text/javascript">
	$(document).ready(function(){



		var html ='<tr><td><input type="text" name="customerId[]" value="<?=$customerId?>"></td><td><input type="text" name="transactionType[]" value="sell"></td><td><select name="productName[]"><?php 
							foreach ($productsInfo as $product) {
								echo '<option value="'.$product['productName'].'">'.$product['productName'].'</option>';
							}
						?>
					</select></td><td><input type="text" name="quantity[]" required></td><td><input type="text" name="unit[]" required></td><td><input type="text" name="price[]" required></td><td><input type="text" name="payment[]" required></td><td><input type="date" name="sellDate[]" required></td><td><input type="button" class="btn btn-primary" id="remove" value="remove" name="remove"></td></tr>';

		$("#add").click(function(){
			$("#sellForm").append(html);
		});


		$("#sellForm").on('click','#remove',function(){
			$(this).closest('tr').remove();
		});

	});
</script>


<form class="p-2" method="post" action="<?=site_url('admin/sellDataSave')?>">
	<div class="table-responsive">
		<table class="table" id="sellForm">
			<tr class="bg-info text-center">
				<th>ID</th>
				<th>Type</th>
				<th>Product</th>
				<th>Quantity</th>
				<th>Unit</th>
				<th>Price</th>
				<th>Payment</th>
				<th>Date</th>
				<th>Action</th>
			</tr>
			<tr>
				<td><input type="text"  name="customerId[]" value="<?=$customerId?>"></td>
				<td><input type="text" name="transactionType[]" value="sell"></td>
				<td>
					<select name="productName[]">
						<?php 
							foreach ($productsInfo as $product) {
								echo '<option value="'.$product['productName'].'">'.$product['productName'].'</option>';
							}
						?>
					</select>
				</td>
				<td><input type="text" name="quantity[]" required></td>
				<td><input type="text" name="unit[]" required></td>
				<td><input type="text" name="price[]" required></td>
				<td><input type="text" name="payment[]" required></td>
				<td><input type="date" name="sellDate[]" required></td>
				<td><input type="button" class="btn btn-primary" id="add" value="add" name="add"></td>
			</tr>
		</table>
		<center>
			<input type="submit" value="Submit" class="btn btn-primary">
		</center>
	</div>
</form>




<?php $this->endSection(); ?>