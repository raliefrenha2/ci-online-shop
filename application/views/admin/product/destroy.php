<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#destroy-<?php echo $product->product_id; ?>">
 <i class="fa fa-trash-o"></i> Hapus
</button>


<div class="modal modal-danger fade" id="destroy-<?php echo $product->product_id; ?>">
	 <div class="modal-dialog">
	   <div class="modal-content">
	     <div class="modal-header">
	       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	         <span aria-hidden="true">&times;</span></button>
	       <h4 class="modal-title">Hapus Data Produk</h4>
	     </div>
	     <div class="modal-body">
	       	<div class="callout callout-danger">
		        <h4>Peringatan!</h4>
		       Yakin akan menghapus data ? Data yang sudah dihapus tidak bisa dikembalikan ..!
		      </div>
	     </div>
	     <div class="modal-footer">
	       <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
	       <a href="<?php echo base_url('admin/product/destroy/'.$product->product_id) ?>" class="btn btn-outline"><i class="fa fa-trash-o"></i>Ya, Hapus Data</a>
	     </div>
	   </div>
	   <!-- /.modal-content -->
	 </div>
	 <!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

