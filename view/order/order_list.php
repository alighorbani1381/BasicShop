

	<!-- Breadcrumb -->
	<div class="breadcrumb-holder">
		<!-- Content Row -->
		<div class="row">
			<ul class="breadcrumbs small-12 medium-8 large-8 columns">
				<li><a href="#" title="Homepage">صفحه اصلی</a></li>
				<li>پیگیری سفارشات</li>
				
			</ul>
		</div>
		<!-- End Content Row -->
	</div>
	<!-- End BreadCrumb -->

	<!-- Page Content Holder -->
	<div class="row featured-row">
		
		<h1>پیگیری سفارشات</h1>
		<div class="fr-border"></div>
		<?php
		$sum_of_product=0;
		$details=$class->order_details($user_id);
		$number=count($details);
		 if($number!=0){
		
		foreach($details as $product):
		$product_list=$class->product_info($product->product_id);
		foreach($product_list as $product_Item):
		?>
<!-- Item List -->

<div class="small-10 small-centered large-12 medium-12 medium-uncentered large-uncentered columns shopping-cart-list ">
 <div class="date-order">
      <span style="margin-right:10px;">تاریخ ثبت این کالا (<?php echo $product->date;?>)</span>
		<?php 
		$status=$product->status;
		switch ($status){
			case 1:
			$message="در حال پیگیری";
			break;
			
			case 2:
			$message="ثبت شده در سیستم";
			break;
			
			case 3:
			$message="در حال رسیدن به شما";
			break;
			
			case 4:
			$message="بسته رسیده";
			break;
		}
		?>	  
	  <span style="margin-right:41%;">وضعیت سفارش (<?php echo $message;?>)</span>
    </div>

  <div class="small-12 small-centered medium-2 medium-uncentered large-2 shopping-cart-thumb large-uncentered columns">
    <a target="_blank" href="index.php?c=product&a=details&id=<?php echo $product_Item->id;?>"><img src="<?php echo $product_Item->images;?>" alt="Product 1" ></a>
  </div>
  <!-- End Thumb -->
  <!-- Content -->
  <div class="small-12 small-centered medium-8 medium-uncentered large-9 large-uncentered columns">
    <!-- Title -->
    <div class="product-detail-title  shopping-cart-item-title">
      <a target="_blank" href="index.php?c=product&a=details&id=<?php echo $product_Item->id;?>" title="Coolwater Perfume">
   
<?php echo $product_Item->title;?>

      </a>
    </div>
    <!-- End Title -->
    <div class="main-price shopping-cart-item-price">
      <?php echo number_format($product->price*$product->count)." تومان";?>
    </div>
	

    
    
    
    <!-- Product Quantity -->
    <div class="small-12 small-centered medium-12 medium-uncentered large-12 large-uncentered columns">
      <div class="product-attr-text q-lineheight">
     تعداد:
      </div>
  
      <div class="quantity-inp">
        <input type="number" class="quantity-input" id="p_quantity" readonly="readonly" value="<?php echo $product->count; ?>" >
      </div>
   
    </div>
    <!-- End Product Quantity -->
    
    
    
  </div>
  <!-- End Content  -->
  
  <!-- Remove Button -->
  
  
</div>

<!-- End item list -->
<?php 
$sum_of_product=$sum_of_product+$product_Item->price;
endforeach;
endforeach;
?>
						<!-- Total -->
						<div class="small-12 small-centered large-uncentered medium-uncentered large-6 medium-6 cart-total columns">
						مجموع خرید شما:
						<?php echo number_format($sum_of_product)." تومان";?>
							
						</div>

		
						<!-- Check out button -->

						<div class="small-12 large-5 cart-checkout-button left medium-6 columns">
							<a href="index.php?c=basket&a=basket_pay"> <button class="small-12 large-12 medium-12 btn btn-3 btn-3a icon-lock">نهایی کردن خرید</button></a>
						</div>
</div>
<?php }else{?>


<div class="small-10 small-centered large-12 medium-12 medium-uncentered large-uncentered columns shopping-cart-list ">
  <div class="small-12 small-centered medium-2 medium-uncentered large-2 shopping-cart-thumb large-uncentered columns">
    <a target="_blank" href="index.php"><img src="public/images/default/img/Basket_Empty.jpg" alt="Product 1" ></a>
  </div>
  <!-- End Thumb -->
  <!-- Content -->
  <div class="small-12 small-centered medium-8 medium-uncentered large-9 large-uncentered columns">
    <!-- Title -->
    <div class="product-detail-title  shopping-cart-item-title">
      <a target="_blank" href="index.php" title="Coolwater Perfume">
		
			 شما سفارشی را ثبت نکرده اید!
      </a>
    </div>
    <!-- End Title -->
    <div class="main-price shopping-cart-item-price">
      😎😎😎
    </div>
    
    
    
    <!-- Product Quantity -->
    <div class="small-12 small-centered medium-12 medium-uncentered large-12 large-uncentered columns">
      <div class="product-attr-text q-lineheight">
     از منوهای بالایی سایت برای پیدا کردن محصول مورد نظر استفاده کنید
      </div>
  
     
   
    </div>
    <!-- End Product Quantity -->
    
    
    

  <!-- End Content  -->
  
  <!-- Remove Button -->
  <div class="small-12 text-center medium-1 large-1 large-uncentered shp-remove-btn medium-uncentered columns">
    <div class="continue-button">

      <a href="index.php" title="Buy" style="width: 214px;background-color: #5d0dd2; border-radius:15px;">
       بزن بریم خرید
      </a>
    </div>
  </div>
    </div>
  <div class="clearing">
  </div>
</div>



<?php }?>


	
	<!-- End Page Content Holder -->