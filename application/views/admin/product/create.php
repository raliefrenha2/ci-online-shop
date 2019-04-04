<?php
// Error Upload
if (isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}
// Notofikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');


echo form_open_multipart(base_url('admin/product/create'),' class="form-horizontal"');
?>

<div class="form-group form-group-lg">
   <label for="product_name" class="col-md-3 control-label">Nama Produk:</label>

   <div class="col-md-8">
     <input type="text" class="form-control" name= "product_name" placeholder="Masukkan Nama Produk" value = "<?php echo set_value('product_name'); ?>" required />
   </div>
 </div>

 <div class="form-group">
   <label for="product_code" class="col-md-3 control-label">Kode Produk:</label>

   <div class="col-md-5">
     <input type="text" class="form-control" name= "product_code" placeholder="Masukkan Kode Produk" value = "<?php echo set_value('product_code'); ?>" required />
   </div>
 </div>

  <div class="form-group">
   <label for="password" class="col-md-3 control-label">Kategori Produk :</label>
   <div class="col-md-5">
     <select name="category_id" class="form-control">
      <?php foreach ($categories as $category) { ?>
       <option value="<?php echo $category->category_id ?>"><?php echo $category->category_name ?></option>
      <?php } ?>
     </select>
     </div>
 </div>

<div class="form-group">
  <label for="price" class="col-md-3 control-label">Harga :</label>

   <div class="col-md-5">
     <input type="number" class="form-control" name= "price" placeholder="Masukkan Harga Produk" value = "<?php echo set_value('price'); ?>" required />
   </div>
</div>

<div class="form-group">
  <label for="stock" class="col-md-3 control-label">Stok :</label>

   <div class="col-md-5">
     <input type="number" class="form-control" name= "stock" placeholder="Masukkan Stok Produk" value = "<?php echo set_value('stock'); ?>" required />
   </div>
</div>

<div class="form-group">
  <label for="weight" class="col-md-3 control-label">Berat :</label>

   <div class="col-md-5">
     <input type="text" class="form-control" name= "weight" placeholder="Masukkan Berat Produk" value = "<?php echo set_value('weight'); ?>" required />
   </div>
</div>

<div class="form-group">
  <label for="size" class="col-md-3 control-label">Ukuran :</label>

   <div class="col-md-5">
     <input type="text" class="form-control" name= "size" placeholder="Masukkan Ukuran Produk" value = "<?php echo set_value('size'); ?>" required />
   </div>
</div>

<div class="form-group">
  <label for="description" class="col-md-3 control-label">Keterangan :</label>

   <div class="col-md-8">
     <textarea name="description" class="form-control" placeholder="Masukkan Deskripsi Produk" id="editor"><?php echo set_value('description') ?></textarea>
   </div>
</div>

<div class="form-group">
  <label for="keywords" class="col-md-3 control-label">Keyword (SEO) :</label>

   <div class="col-md-8">
     <textarea name="keywords" class="form-control" placeholder="Masukkan Keywords Produk"><?php echo set_value('keywords') ?></textarea>
   </div>
</div>

<div class="form-group">
  <label for="keywords" class="col-md-3 control-label">Upload Gambar :</label>

   <div class="col-md-5">
    <input type="file" name="image" class="form-control" required="required">
   </div>
</div>

<div class="form-group">
  <label for="status" class="col-md-3 control-label">Status :</label>

   <div class="col-md-5">
    <select name="product_status" class="form-control">
      <option value="Publish">Publikasikan</option>
      <option value="Draft">Simpan sebagai Draft</option>
    </select>
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

