	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="<?php echo $setting->facebook; ?>" class="topbar-social-item fa fa-facebook"></a>
					<a href="<?php echo $setting->instagram; ?>" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					<?php echo $setting->address; ?>
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						<?php echo $setting->email; ?>
					</span>

					<div class="topbar-language rs1-select2">
						<select class="selection-1" name="time">
							<option>USD</option>
							<option>EUR</option>
						</select>
					</div>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="<?php echo base_url() ?>" class="logo">
					<img src="<?php echo base_url('assets/upload/image/'.$setting->logo) ?>" alt="<?php echo $setting->webname; ?>| <?php echo $setting->tagline; ?>">
				</a>




