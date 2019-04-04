<p>
	<a href="<?php echo base_url('admin/product/create') ?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i>Tambah Produk
	</a>
</p>


<?php 
// Notifikasi
if ($this->session->flashdata('success')) {
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}
?>


<table class="table table-bordered" id="example1">
	
	<thead>
		<tr>
			<th>No</th>
			<th>Gambar</th>
			<th>Nama</th>
			<th>Kategori</th>
			<th>Harga</th>
			<th>Stok</th>
			<th>Status</th>
			
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($products as $product) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td> <img src="<?php echo base_url('assets/upload/image/thumbs/' .$product->image) ?>" class="img img-responsive img-thumbnail" width="60"> </td>
			<td><?php echo $product->product_name ?></td>
			<td><?php echo $product->category_name ?></td>
			<td><?php echo number_format($product->price, '0',',','.') ?></td>
			<td><?php echo $product->stock ?></td>
			<td><?php echo $product->product_status ?></td>
			<td>
				<a href="<?php echo base_url('admin/product/edit/' .$product->product_id) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>
				<?php include 'destroy.php'; ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>