<p>
	<a href="<?php echo base_url('admin/category/create') ?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i>Tambah Kategori
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
			<th>Nama</th>
			<th>Slug</th>
			<th>Urutan</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($categories as $category) { ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $category->category_name ?></td>
			<td><?php echo $category->category_slug ?></td>
			<td><?php echo $category->sort ?></td>
			<td>
				<a href="<?php echo base_url('admin/category/edit/' .$category->category_id) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>
				<a href="<?php echo base_url('admin/category/destroy/' .$category->category_id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin akan menghapus data ini ?')"><i class="fa fa-trash-o"></i>Delete</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>