<div class="wpo-breadcumb-area">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="wpo-breadcumb-wrap">
					<ul>
						<li><a href="<?= base_url() ?>">Home </a></li>
						<li><span><?= $title ?></span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="wpo-shop-page section-padding">
	<h2 class="hidden">some</h2>
	<div class="container">
		<div class="row">
			<div class="col-lg-9 order-lg-2">
				<!-- start wpo-product-section -->
				<section class="wpo-product-section">
					<div class="sorting-section">
						<ul>
							<li id="jumlah"></li>
							<li>
								<select name="sorting" id="sorting" class="select">
									<option value="menu_order" selected="selected">Default Sorting</option>
									<option value="rating">Sort by average rating</option>
									<option value="date">Sort by newness</option>
									<option value="price">Sort by price: low to high</option>
									<option value="price-desc">Sort by price: high to low</option>
								</select>
							</li>
						</ul>
					</div>
					<div class="wpo-product-wrap">
						<div id="paket" class="row">

						</div>
					</div>
				</section>
				<!-- end wpo-product-section -->
			</div>
			<div class="col-lg-3 col-md-8 order-lg-1">
				<div class="wpo-shop-sidebar">
					<div class="widget widget_search">
						<div class="search-widget">
							<form class="searchform">
								<div>
									<input id="cari" type="text" placeholder="Search...">
									<button type="button"><i class="ti-search"></i>
								</div>
							</form>
						</div>
					</div>
					<div class="widget woocommerce widget_product_categories">
						<h3>Kategori</h3>
						<ul class="product-categories">
							<?php
							// print_r($kategori);
							foreach ($kategori as $k) {
								echo '<li class="cat-item cat-parent">
										<a href="#">' . $k->kategori . '</a>
									</li>';
							}
							?>
						</ul>
					</div>


				</div>
			</div>
		</div>
	</div>

</section>

<script>
	// keyup untuk cari
	$('#cari').keyup(function() {
		getPaket();
	});

	function getPaket() {
		// request ajax
		$.ajax({
			url: '<?= base_url('paket/getPaket') ?>',
			type: 'POST',
			dataType: 'json',
			data: {
				cari: $('#cari').val()
			},
			success: function(data) {
				$('#paket').html(data.paket);
				$('#jumlah').html('Menampilkan hasil ' + data.jumlah + ' paket tersedia');
			},
			error: function(xhr, status, error) {
				Swal.fire({
					title: 'Error',
					text: xhr.responseText,
					icon: 'error'
				});
			}
		});
	}
	getPaket();
</script>