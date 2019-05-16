<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?= base_url() ?>assets/template/images/heading-pages-02.jpg);">
	<h2 class="l-text2 t-center">
		<?php echo $title; ?>
	</h2>
	<p class="m-text13 t-center">
		<?php echo $setting->webname ?> | <?php echo $setting->tagline; ?>
	</p>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
				<div class="leftbar p-r-20 p-r-0-sm">
					<!--  -->
					<h4 class="m-text14 p-b-7">
						Kategori Produk
					</h4>

					<ul class="p-b-54">
						<?php foreach ($categories as $category): ?>
							<li class="p-t-4">
							<a href="<?php echo base_url('product/category/'.$category->category_slug ) ?>" class="s-text13 active1">
								<?php echo $category->category_name; ?>
							</a>
						</li>
						<?php endforeach ?>
						
					</ul>
				</div>
			</div>

			<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

				<!-- Product -->
				<div class="row">

					<?php foreach ($products as $product): ?>

						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<?php 
								echo form_open('shop/add');
								echo form_hidden('id', $product->product_id);
								echo form_hidden('qty', 1);
								echo form_hidden('price', $product->price);
								echo form_hidden('name', $product->product_name);

								// elemen redirect
								echo form_hidden('redirect_page', str_replace('index.php', '', current_url()));
							?>
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="<?php echo base_url('assets/upload/image/thumbs/'.$product->image) ?>" alt="<?php echo $product->product_name ?>">

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="<?php echo base_url('product/detail/'.$product->product_slug) ?>" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $product->product_name; ?>
								</a>

								<span class="block2-price m-text6 p-r-5">
									IDR <?php echo number_format($product->price,'0',',','.') ?>
								</span>
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
					<?php endforeach ?>
					

				</div>

				<!-- Pagination -->
				<div class="pagination flex-m flex-w p-t-26">
					<?php echo $paginasi; ?>
				</div>
			</div>
		</div>
	</div>
</section>
