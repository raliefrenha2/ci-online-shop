<?php
// Error Upload
if (isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}
// Notofikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');


echo form_open_multipart(base_url('admin/product/image/'. $product->product_id),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
   <label for="image_title" class="col-md-3 control-label">Judul Gambar:</label>

   <div class="col-md-8">
     <input type="text" class="form-control" name= "image_title" placeholder="Masukkan Judul Gambar Produk" value = "<?php echo set_value('image_title'); ?>" required />
   </div>
 </div>

 <div class="form-group">
   <label for="image" class="col-md-3 control-label">Unggah Gambar:</label>

   <div class="col-md-3">
     <input type="file" class="form-control" name= "image" placeholder="Masukkan Gambar Produk" value = "<?php echo set_value('image'); ?>" required />
   </div>
   <div class="col-md-5">
     <button type="submit" class="btn btn-success btn-lg" name="submit"><i class="fa fa-save"></i>Simpan & Unggah Gambar</button>
      <button type="reset" class="btn btn-info btn-lg" name="reset"><i class="fa fa-times"></i>Reset</button>
   </div>

 </div>


<?php echo form_close(); ?>

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
      <th>Judul Gambar</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td> <img src="<?php echo base_url('assets/upload/image/thumbs/' .$product->image) ?>" class="img img-responsive img-thumbnail" width="60"> </td>
      <td><?php echo $product->product_name ?></td>
      <td></td>
    </tr>
    <?php $no=2; foreach ($images as $image) { ?>
    <tr>
      <td><?php echo $no ?></td>
      <td> <img src="<?php echo base_url('assets/upload/image/thumbs/' .$image->image) ?>" class="img img-responsive img-thumbnail" width="60"> </td>
      <td><?php echo $image->image_title ?></td>
      <td>
        <a href="<?php echo base_url('admin/product/destroy_image/'.$product->product_id.'/'.$image->image_id) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin akan menghapus gambar ini ?')" ><i class="fa fa-trash"></i>Gambar</a>
      </td>
    </tr>
    <?php $no++; } ?>
  </tbody>
</table>