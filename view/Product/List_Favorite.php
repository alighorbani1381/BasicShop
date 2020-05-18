

	<!-- Breadcrumb -->
	<div class="breadcrumb-holder">
		<!-- Content Row -->
		<div class="row">
			<ul class="breadcrumbs small-12 medium-8 large-8 columns">
				<li><a href="#" title="Homepage">صفحه اصلی</a></li>
				<li>علاقه مندی ها</li>
				
			</ul>
		</div>
		<!-- End Content Row -->
	</div>
	<!-- End BreadCrumb -->

	<!-- Page Content Holder -->
	<div class="row featured-row">
		
		<h1>علاقه مندی های شما</h1>
		<div class="fr-border"></div>
		<?php
		$favorite_list=$class->list_favorit($user_id);
		foreach($favorite_list as $favorite_Item):
		$product_list=$class->product_info($favorite_Item->product_id);
		foreach($product_list as $product_Item):

		?>
		<!-- Item List -->

<div class="small-10 small-centered large-12 medium-12 medium-uncentered large-uncentered columns shopping-cart-list ">
  <div class="small-12 small-centered medium-2 medium-uncentered large-2 shopping-cart-thumb large-uncentered columns">
    <a href="index.php?c=product&a=details&id=<?php echo $product_Item->id;?>"><img src="<?php echo $product_Item->images;?>" alt="Product 1" /></a>
  </div>
  <!-- End Thumb -->
  <!-- Content -->
  <div class="small-12 small-centered medium-8 medium-uncentered large-9 large-uncentered columns">
    <!-- Title -->
    <div class="product-detail-title  shopping-cart-item-title">
      <a href="#" title="Coolwater Perfume">
<?php echo $product_Item->title;?>
      </a>
    </div>
    <!-- End Title -->
    <div class="main-price shopping-cart-item-price">
      <?php echo number_format($product_Item->price)." تومان";?>
    </div>
    
    
    

    
    
    
  </div>
  <!-- End Content  -->
  
  <!-- Remove Button -->
  <div class="small-12 text-center medium-1 large-1 large-uncentered shp-remove-btn medium-uncentered columns" style="margin-left: 1px;">
    <div class="continue-button">
      <a style="width:max-content; background-color:#1f8a44;" href="index.php?c=basket&a=add_basket&id=<?php echo $product_Item->id;?>" title="افزودن به سبد">
       افزودن به سبد خرید
      </a>
    </div>
	
	    <div class="continue-button">
      <a style="font-size:13px;width: max-content;background: #991818;margin: 5px;" href="index.php?c=favorite&a=delete_favorite&id=<?php echo $favorite_Item->favorit_id;?>" title="حذف از علاقه مندی ها">
       حذف از علاقه مندی ها
      </a>
    </div>
  </div>
  <div class="clearing">
  </div>
</div>

<!-- End item list -->
<?php
endforeach;
endforeach;


?>
						<!-- Check out button -->

						<div class="small-12 large-5 cart-checkout-button left medium-6 columns">
							<button class="small-12 large-12 medium-12 btn btn-3 btn-3a icon-lock">بازگشت به صفحه اصلی</button>
						</div>

	</div>
	<!-- End Page Content Holder -->
	