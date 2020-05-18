<?php 
$child_items=$class->procat_items($procat->chid);
$mainprocat=$class->sup_procat($procat->chid);
?>
	<!-- Breadcrumb -->
	<div class="breadcrumb-holder" style="margin-top: 16px;">
		<!-- Content Row -->
		<div class="row">
			<ul class="breadcrumbs small-12 medium-8 large-8 columns">
				<li><a href="index.php" title="Homepage">صفحه اصلی</a></li>
                <li>دسته بندی</li>
				<li><?php echo $mainprocat->title; ?></li>
				<a href="index.php?c=product&a=List&procat=<?php echo $procat->id;?>"><li><?php echo $procat->title;?></li></a>
			</ul>
		</div>
		<!-- End Content Row -->
	</div>
	<!-- End BreadCrumb -->

	<!-- Page Content Holder -->
	<div class="row">
	<!-- Widget Right -->
	<div class="small-12 small-centered medium-3 large-3 large-uncentered medium-uncentered  columns">
		<!-- Category Listing Module -->
		<div class="lft-module-heading">
		
گروه ها
		</div>
		<!-- Listing -->
		<ul class="cat-listing">
		<?php foreach ($child_items as $child_value):?>
            <li>
                <a href="index.php?c=product&a=List&procat=<?php echo $child_value->id;?>" title="Dress">
                    <?php echo $child_value->title;
					
				$countable=$class->product_list($child_value->id);
					$number=count($countable);
					echo " (".$number.")";
					?>
			</a>
			</li>	
			<?php endforeach;?>
		</ul>
		<!-- End Category Listing Module -->
			
				<!-- BestSeller Module -->
		<div class="lft-module-heading">
           پرفروش ترین محصولات
		</div>
		<!-- Listings -->
		<div class="bst-seller-list">
			<div class="bst-seller-thumb">
				<img src="img/cart/1.jpg" alt="Picture" />
			</div>
			<div class="bst-seller-content">
                <div class="bst-seller-title">
                    <a href="#" title="turtle neck">
                       عنوان محصول
                    </a>
                </div>
				<div class="bst-seller-price">قیمت محصول</div>
				<div class="bst-seller-cart">
                    <a href="#" title="Add to cart"><i class="icon-cart"></i>اضافه به سبد خرید</a>
				</div>
			</div>

			<div class="clearing"></div>
		</div>
		<!-- Ennd Bestseller Module -->

		<!-- ADVERTISEMENT -->
		<div class="right-ad text-center">
		
			<img src="public/images/default/img/ads/product-list.jpg" alt="Advertisement" />
			
		</div>
	</div>
	<!-- End Widget Right -->

	<!-- Featured Product Module -->
	<div class="small-12 small-centered medium-9 medium-uncentered large-9 large-uncentered featured-row columns">

		<h1>آخرین محصولات<?php echo  "  ".$procat->title;?></h1>
		<div class="heading-summary">آخرین مجموعه ای از آیتم</div>
		
		<!-- End Heading  -->

		<!-- Sorting -->
		<div class="sort-container">
			<!-- Swtich View Mode -->
			<div class="small-12 small-centered medium-uncentered large-uncentered medium-4 large-4 columns">
				<div class="sort-icon"><a href="index.php?c=product&a=Gride&procat=<?php echo $procat->id;?>"><i class="icon-grid"></i></a></div>
				<div class="sort-icon"><a href="index.php?c=product&a=List&procat=<?php echo $procat->id;?>" title="List View"><i class="icon-menu"></i></a></div>
				<a class="p-compare-link" href="#" title="Product Compare">
					<?php 
					$number=count($product_list);
					echo " مقایسه محصولات "."(".$number.")";
					?>
</a>
			</div>
			<!-- End Switch View Mode -->
			<!-- Select Box -->
			<div class="small-12 small-centered medium-uncentered large-uncentered small-offset-1 medium-5 medium-offset-1 large-4 large-offset-4 sort-margin columns">
				 <select name="" id="price">
					<option value="" />
قیمت
					<option value="1" />بالاترین
					<option value="2" />پایین ترین
				</select>

				<select name="" id="date">
					<option value="" />
تاریخ اضافه شده
					<option value="1" />
اخیر
					<option value="2" />
قدیمی
				</select>
			</div>
			<!-- End Selectboxes -->
			
		</div>
		<!-- End Sorting -->

		<!-- PRODUCT LISTING -->
		<!-- Item -->
		
		
		<?php
		foreach($product_list as $product_Item):
		?>
		
	<div class="small-8 medium-4 small-centered medium-uncentered large-4 large-uncentered columns f-product">
		<!-- Sale Tag -->
		<div class="sale-tag">
		<a href="index.php?c=product&a=details&id=<?php echo $product_Item->id;?>">مشاهده</a>
		</div>
		<!-- End Sale Tag -->
		<img src="<?php echo $product_Item->images;?>" alt="Product 1" />
		<!-- Product Link -->
		<div class="product-link text-center">
			<a href="#"><?php echo $product_Item->title;?></a>
		</div>

		<!-- Product Rating -->
		<div class="f-productrating">
			<i class="icon-star"></i>
			<i class="icon-star"></i>
			<i class="icon-star"></i>
			<i class="icon-star"></i>
			<i class="icon-star"></i>
		</div>
		<!-- End Product Rating -->

		<!-- Product Price -->
		<div class="f-product-price text-center">
		<?php 
			$off=$product_Item->off;
			if($off==0){
			 echo "<b>". $product_Item->price. "</b>";
			}else{
			?>
			
			<span class="f-product-price-old"><?php echo number_format($product_Item->price);?></span>
			<b class="main-price"><?php echo $product_Item->off."%"." تخفیف"?></b>
			<br>
			<b><?php echo  number_format($product_Item->price*((100-$off)/100));?></b>
			<?php } ?>
		</div>

		<!-- AddtoCart Buttons -->
		<div class="f-product-hover">
			<div class="f-button">
				<a href="index.php?c=basket&a=add_basket&id=<?php echo $product_Item->id; ?>" title="افزودن به سبد خرید"><i class="icon-cart"></i></a>
				<a href="index.php?c=favorite&a=add_favorite&id=<?php echo $product_Item->id; ?>" title="اضافه به علاقه مندی ها"><i class="icon-heart"></i></a>
				<a href="#" title="Add to Compare"><i class="icon-tags"></i></a>
			</div>
		</div>
		<!-- End AddtoCart Buttons -->
	</div>
	<!-- End item -->
<?php endforeach;?>
	
	

	<!-- END PRODUCT LISTING -->

	<div class="clearing"></div>
	<!-- Border --> <div class="fr-border"></div>
<!-- Pagination -->
<div class="small-10 small-centered medium-6 medium-uncentered large-6 large-uncentered columns">
	<div class="pagination">اول</div>
	<div class="pagination"><a href="#" title="Page 1">1</a></div>
	<div class="pagination"><a href="#" title="Page 2">2</a></div>
	<div class="pagination"><a href="#" title="Page 3">3</a></div>
	<div class="pagination"><a href="#" title="Page 4">4</a></div>
	<div class="pagination"><a href="#" title="last Page">آخر</a></div>
</div>
	<!-- End Pagination -->

	<div class="small-12 small-centered medium-5 medium-uncentered large-uncentered large-6 cnt-btn  columns">
		<div class="continue-button"><a href="#">
ادامه</a></div>
	</div>


	<div class="clearing"></div> 
	<!-- Clearing -->
	<!-- Border -->
	<div class="fr-border"></div>

	

	</div>
	
	<!-- End Featured Products -->

	<div class="clearing"></div>

	</div>
	<!-- End Page Content Holder -->
