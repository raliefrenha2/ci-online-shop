<?php

// Notifikasi
if ($this->session->flashdata('success')) {
  echo '<p class="alert alert-success">';
  echo $this->session->flashdata('success');
  echo '</div>';
}

// Error Upload
if (isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}
// Notofikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');


echo form_open_multipart(base_url('admin/configuration/logo'),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
   <label for="webname" class="col-md-3 control-label">Nama Web:</label>

   <div class="col-md-8">
     <input type="text" class="form-control" name= "webname" placeholder="Masukkan Nama Web" value = "<?php echo $configuration->webname; ?>" required />
   </div>
 </div>

 <div class="form-group">
   <label for="logo" class="col-md-3 control-label">Upload Logo Baru:</label>

   <div class="col-md-5">
     <input type="file" class="form-control" name= "logo" placeholder="Masukkan Logo" value = "<?php echo $configuration->logo; ?>" required />
     <br>Logo Lama : <br><br><img src="<?php echo base_url('assets/upload/image/' .$configuration->logo); ?> " class="img img-responsive img-thumbnail" width=200 alt="">
   </div>
 </div> 

 <div class="form-group">
   <label class="col-md-3 control-label"></label>

   <div class="col-md-8">
     <button type="submit" class="btn btn-success btn-lg" name="submit"><i class="fa fa-save"></i>Simpan</button>
      <button type="reset" class="btn btn-info btn-lg" name="reset"><i class="fa fa-times"></i>Reset</button>
   </div>
 </div>



<?php echo form_close(); ?>

