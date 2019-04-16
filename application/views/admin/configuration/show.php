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


echo form_open_multipart(base_url('admin/configuration'),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
   <label for="webname" class="col-md-3 control-label">Nama Web:</label>

   <div class="col-md-8">
     <input type="text" class="form-control" name= "webname" placeholder="Masukkan Nama Web" value = "<?php echo $configuration->webname; ?>" required />
   </div>
 </div>

 <div class="form-group">
   <label for="tagline" class="col-md-3 control-label">Tagline/Motto:</label>

   <div class="col-md-5">
     <input type="text" class="form-control" name= "tagline" placeholder="Masukkan Tagline" value = "<?php echo $configuration->tagline; ?>" required />
   </div>
 </div>

 <div class="form-group">
   <label for="email" class="col-md-3 control-label">Email:</label>

   <div class="col-md-5">
     <input type="email" class="form-control" name= "email" placeholder="Masukkan Email" value = "<?php echo $configuration->email; ?>" required />
   </div>
 </div>

  <div class="form-group">
   <label for="website" class="col-md-3 control-label">Website:</label>

   <div class="col-md-5">
     <input type="text" class="form-control" name= "website" placeholder="Masukkan Website" value = "<?php echo $configuration->website; ?>" required />
   </div>
 </div>

 <div class="form-group">
   <label for="facebook" class="col-md-3 control-label">Facebook:</label>

   <div class="col-md-5">
     <input type="text" class="form-control" name= "facebook" placeholder="Masukkan Facebook" value = "<?php echo $configuration->facebook; ?>" required />
   </div>
 </div>

 <div class="form-group">
   <label for="instagram" class="col-md-3 control-label">Instagram:</label>

   <div class="col-md-5">
     <input type="text" class="form-control" name= "instagram" placeholder="Masukkan Instagram" value = "<?php echo $configuration->instagram; ?>" required />
   </div>
 </div>

 <div class="form-group">
   <label for="telephone" class="col-md-3 control-label">Telepon:</label>

   <div class="col-md-5">
     <input type="text" class="form-control" name= "telephone" placeholder="Masukkan Telepon" value = "<?php echo $configuration->telephone; ?>" required />
   </div>
 </div>

  <div class="form-group">
   <label for="address" class="col-md-3 control-label">Alamat Kantor:</label>

   <div class="col-md-5">
     <input type="text" class="form-control" name= "address" placeholder="Masukkan Alamat Kantor" value = "<?php echo $configuration->address; ?>" required />
   </div>
 </div>




<div class="form-group">
  <label for="description" class="col-md-3 control-label">Keterangan :</label>

   <div class="col-md-8">
     <textarea name="description" class="form-control" placeholder="Masukkan Deskripsi Website"><?php echo $configuration->description; ?></textarea>
   </div>
</div>

<div class="form-group">
  <label for="keywords" class="col-md-3 control-label">Keyword (SEO) :</label>

   <div class="col-md-8">
     <textarea name="keywords" class="form-control" placeholder="Masukkan Keywords Produk"> <?php echo $configuration->keywords ?></textarea>
   </div>
</div>

<div class="form-group">
  <label for="metatext" class="col-md-3 control-label">Meta Text :</label>

   <div class="col-md-8">
     <textarea name="metatext" class="form-control" placeholder="Masukkan Metatext"> <?php echo $configuration->metatext ?></textarea>
   </div>
</div>

<div class="form-group">
  <label for="payment_account" class="col-md-3 control-label">Rekening Pembayaran :</label>

   <div class="col-md-8">
     <textarea name="payment_account" class="form-control" placeholder="Masukkan Rekening Pembayaran"> <?php echo $configuration->payment_account ?></textarea>
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

