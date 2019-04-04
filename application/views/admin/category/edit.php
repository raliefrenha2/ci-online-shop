<?php
// Notofikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');


echo form_open(base_url('admin/category/edit/' .$category->category_id),' class="form-horizontal"');
?>

<div class="form-group">
   <label for="name" class="col-md-3 control-label">Nama Kategori:</label>

   <div class="col-md-8">
     <input type="text" class="form-control" name= "category_name" placeholder="Masukkan Nama Kategori" value = "<?php echo $category->category_name; ?>" required />
   </div>
 </div>

 <div class="form-group">
   <label for="sort" class="col-md-3 control-label">Urutan :</label>

   <div class="col-md-8">
     <input type="number" class="form-control" name= "sort" placeholder="Masukkan Urutan" value = "<?php echo $category->sort; ?>" required />
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

