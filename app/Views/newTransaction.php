<?php $this->extend('dashboard'); ?>
<?php $this->section('content'); ?>




<div class="">
  <table id="transaction_table_id" class="display table">
      <thead>
        <tr  class="bg-info text-center">
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Address</th>
          <th scope="col">Mobile</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr> 
      </thead>
      <tbody>
          <?php foreach($customersInfo as $customer):?>
          <tr class="text-center">
              <td><?=$customer['id']?></td>
    		      <td><?=$customer['name']?></td>
    		      <td><?=$customer['address']?></td>
    		      <td><?=$customer['mobile']?></td>
    		      <td><?=$customer['email']?></td>
              <td>
              	<div class="btn-group btn-group-sm">
              		<a href="<?php echo site_url('admin/sell/'.$customer['id'].'/'.$customer['name'].'/'.$customer['mobile'].'/'.$customer['address']) ?>" class="btn btn-outline-success">Sell</a>
             		 <a href="<?php echo site_url('admin/returnProduct/'.$customer['id'].'/'.$customer['name'].'/'.$customer['mobile'].'/'.$customer['address']) ?>" class="btn btn-outline-primary">Return</a>
                 <a href="<?php echo site_url('admin/accountDetails/'.$customer['id']) ?>" class="btn btn-outline-secondary">Account</a>
              	</div>
              </td>
          </tr>     
     	<?php endforeach;?>
      </tbody>
  </table>
</div>




<script type="text/javascript">
  $(document).ready(function() {
    $('#transaction_table_id').DataTable();
} );
</script>










<?php $this->endSection(); ?>