<p>
	<a href="<?php echo base_url('admin/user/create') ?>" class="btn btn-success btn-lg">
		<i class="fa fa-plus"></i>Tambah User
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
			<th>Email</th>
			<th>Username</th>
			<th>Level</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($users as $user) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $user->name ?></td>
			<td><?php echo $user->email ?></td>
			<td><?php echo $user->username ?></td>
			<td><?php echo $user->access_level ?></td>
			<td>
				<a href="<?php echo base_url('admin/user/edit/' .$user->user_id) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>
				<a href="<?php echo base_url('admin/user/destroy/' .$user->user_id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin akan menghapus data ini ?')"><i class="fa fa-trash-o"></i>Delete</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>