<?php
 // Ambil Data menu dari Konfigurasi
 $product_nav = $this->configuration_model->product_nav();
?>
			<!-- Menu -->
			<div class="wrap_menu">
				<nav class="menu">
					<ul class="main_menu">
						<!-- Home -->
						<li>
							<a href="<?php echo base_url();?>">Beranda</a>
						</li>
						<!-- Produk -->
						<li>
							<a href="index.html">Produk &amp Belanja</a>
							<ul class="sub_menu">
								<?php foreach ($product_nav as $category) { ?>
									<li><a href="<?php echo base_url('product/category/'.$category->category_slug); ?>"><?php echo $category->category_name; ?></a></li>
								<?php } ?>
							</ul>
						</li>

						<li>
							<a href="contact.html">Contact</a>
						</li>
					</ul>
				</nav>
			</div>

			<!-- Header Icon -->
			<div class="header-icons">
				<a href="#" class="header-wrapicon1 dis-block">
					<img src="<?php echo base_url() ?>/assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
				</a>

				<span class="linedivide1"></span>

				<div class="header-wrapicon2">
					<?php 
					// cek ada belanja atau tidak
					$carts = $this->cart->contents();

					 ?>
					<img src="<?php echo base_url() ?>/assets/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
					<span class="header-icons-noti"><?php echo count($carts); ?></span>

					<!-- Header cart noti -->
					<div class="header-cart header-dropdown">
						<ul class="header-cart-wrapitem">
							<?php 
								if(empty($carts)) { 
							?>
								<li class="header-cart-item">
									<p class="alert alert-success">Keranja Belanja Kosong</p>
								</li>

								<?php
								}else {
									$total = number_format($this->cart->total(), '0',',','.');
									foreach ($carts as $item) {
										$product_item = $this->product_model->detail($item['id']);
								?>
							
							
							<li class="header-cart-item">
								<div class="header-cart-item-img">
									<img src="<?php echo base_url('assets/upload/image/thumbs/'.$product_item->image) ?>" alt="<?php echo $item['name'] ?>">
								</div>

								<div class="header-cart-item-txt">
									<a href="<?php echo base_url('product/detail/'.$product_item->product_slug); ?>" class="header-cart-item-name">
										<?php echo $item['name']; ?>
									</a>

									<span class="header-cart-item-info">
										<?php echo $item['qty']; ?> x <?php echo number_format($item['price'],'0',',','.'); ?>
									</span>
								</div>
							</li>
						<?php 
								} // end ForEach
							}  // end If

						?>

						</ul>

						<div class="header-cart-total">
							Total: <?php echo $total ?>
						</div>

						<div class="header-cart-buttons">
							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="<?php echo base_url('shop') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									View Cart
								</a>
							</div>

							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="<?php echo base_url('shop/checkout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									Check Out
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Header Mobile -->
	<div class="wrap_header_mobile">
		<!-- Logo moblie -->
		<a href="index.html" class="logo-mobile">
			<img src="<?php echo base_url() ?>/assets/template/images/icons/logo.png" alt="IMG-LOGO">
		</a>

		<!-- Button show menu -->
		<div class="btn-show-menu">
			<!-- Header Icon mobile -->
			<div class="header-icons-mobile">
				<a href="#" class="header-wrapicon1 dis-block">
					<img src="<?php echo base_url() ?>/assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
				</a>

				<span class="linedivide2"></span>

				<div class="header-wrapicon2">
							
					<img src="<?php echo base_url() ?>/assets/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
					<span class="header-icons-noti">0</span>

					<!-- Header cart noti -->
					<div class="header-cart header-dropdown">
						<ul class="header-cart-wrapitem">
							<?php 
								if(empty($carts)) { 
							?>
								<li class="header-cart-item">
									<p class="alert alert-success">Keranja Belanja Kosong</p>
								</li>

								<?php
								}else {
									$total = number_format($this->cart->total(), '0',',','.');
									foreach ($carts as $item) {
										$product_item = $this->product_model->detail($item['id']);
								?>

								<li class="header-cart-item">
								<div class="header-cart-item-img">
									<img src="<?php echo base_url('assets/upload/image/thumbs/'.$product_item->image) ?>" alt="<?php echo $item['name'] ?>">
								</div>

								<div class="header-cart-item-txt">
									<a href="<?php echo base_url('product/detail/'.$product_item->product_slug); ?>" class="header-cart-item-name">
										<?php echo $item['name']; ?>
									</a>

									<span class="header-cart-item-info">
										<?php echo $item['qty']; ?> x <?php echo number_format($item['price'],'0',',','.'); ?>
									</span>
								</div>
							</li>

<?php }} ?>

						</ul>

						<div class="header-cart-total">
							Total: <?php echo $total ?>
						</div>

						<div class="header-cart-buttons">
							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="<?php echo base_url('shop') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									View Cart
								</a>
							</div>

							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="<?php echo base_url('shop/checkout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									Check Out
								</a>
							</div>
						</div>
					</div>

				</div>

			</div>

			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>
	</div>

	<!-- Menu Mobile -->
	<div class="wrap-side-menu" >
		<nav class="side-menu">
			<ul class="main-menu">
				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<span class="topbar-child1">
						Free shipping for standard order over $100
					</span>
				</li>

				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<div class="topbar-child2-mobile">
						<span class="topbar-email">
							fashe@example.com
						</span>

						<div class="topbar-language rs1-select2">
							<select class="selection-1" name="time">
								<option>USD</option>
								<option>EUR</option>
							</select>
						</div>
					</div>
				</li>

				<li class="item-topbar-mobile p-l-10">
					<div class="topbar-social-mobile">
						<a href="#" class="topbar-social-item fa fa-facebook"></a>
						<a href="#" class="topbar-social-item fa fa-instagram"></a>
						<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
						<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
						<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
					</div>
				</li>

				<li class="item-menu-mobile">
					<a href="index.html">Home</a>
					<ul class="sub-menu">
						<li><a href="index.html">Homepage V1</a></li>
						<li><a href="home-02.html">Homepage V2</a></li>
						<li><a href="home-03.html">Homepage V3</a></li>
					</ul>
					<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
				</li>

				<li class="item-menu-mobile">
					<a href="#">Produk &amp Belanja</a>
					<ul class="sub-menu">
						<?php foreach ($product_nav as $category) { ?>
							<li><a href="<?php echo base_url('product/category/'.$category->category_slug); ?>"><?php echo $category->category_name; ?></a></li>
						<?php } ?>
					</ul>
					<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
				</li>

				<li class="item-menu-mobile">
					<a href="product.html">Sale</a>
				</li>

				<li class="item-menu-mobile">
					<a href="cart.html">Features</a>
				</li>

				<li class="item-menu-mobile">
					<a href="blog.html">Blog</a>
				</li>

				<li class="item-menu-mobile">
					<a href="about.html">About</a>
				</li>

				<li class="item-menu-mobile">
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</nav>
	</div>
</header>