<?php
// Notofikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');


echo form_open(base_url('admin/user/edit/' .$user->user_id),' class="form-horizontal"');
?>

<div class="form-group">
   <label for="name" class="col-md-3 control-label">Nama :</label>

   <div class="col-md-8">
     <input type="text" class="form-control" name= "name" placeholder="Masukkan Nama Pengguna" value = "<?php echo $user->name; ?>" required />
   </div>
 </div>

 <div class="form-group">
   <label for="email" class="col-md-3 control-label">Email :</label>

   <div class="col-md-8">
     <input type="email" class="form-control" name= "email" placeholder="Masukkan Email Pengguna" value = "<?php echo $user->email; ?>" required />
   </div>
 </div>

 <div class="form-group">
   <label for="username" class="col-md-3 control-label">Username :</label>

   <div class="col-md-8">
     <input type="text" class="form-control" name= "username" placeholder="Masukkan Username" value = "<?php echo $user->username; ?>" readonly />
   </div>
 </div>

 <div class="form-group">
   <label for="password" class="col-md-3 control-label">Password :</label>

   <div class="col-md-8">
     <input type="password" class="form-control" name= "password" placeholder="Masukkan Password" value = "<?php echo $user->password; ?>" required />
   </div>
 </div>

 <div class="form-group">
   <label for="password" class="col-md-3 control-label">Hak Akses :</label>

   <div class="col-md-8">
     <select name="access_level" class="form-control">
     	<option value="Admin">Admin</option>
     		<option value="User" <?php if($user->access_level == "User"){ echo "selected" ;}?>>User</option>
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

