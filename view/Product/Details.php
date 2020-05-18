				<?php 
				//select procat Level 1
				$procat=$class->SelectMainProcat($target_product->cat_id);
				//Select procat Level 2
				$mainprocat=$class->SelectMainProcat($procat->chid);
					?>

<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="index.html" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i>صفحه اصلی</span></a></li>
        <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="category.html" itemprop="url"><span itemprop="title"><?= $mainprocat->title ?></span></a></li>
        <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="product.html" itemprop="url"><span itemprop="title"><?= $procat->title ?></span></a></li>
        <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="product.html" itemprop="url"><span itemprop="title"><?= $target_product->title ?></span></a></li>

				
      </ul>
      <!-- Breadcrumb End-->
	  
	  <div class="row">
	  
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <div itemscope itemtype="http://schema.org/محصولات">
		  
		  <!-- Product info Statr !-->
            <h1 class="title" itemprop="name"><?= $target_product->title ?></h1>
            <div class="row product-info">
			
			<!-- images Product Start !-->
              <div class="col-sm-6">
					<div class="image">
						<img class="img-responsive" itemprop="image"  title="<?= $target_product->title ?>" alt="<?= $target_product->title ?>"   id="zoom_01" src="<?= $target_product->images ?>" data-zoom-image="<?= $target_product->images ?>" />
						<?php if($hasDiscount):?>
						<span class="saving"><?= $hasDiscount ?>%</span>
						<?php endif;?>
					</div>
					
                <div class="center-block text-center"><span class="zoom-gallery"><i class="fa fa-search"></i> برای مشاهده گالری روی تصویر کلیک کنید</span></div>
				
				<!-- Image Additional Start !-->
                <div class="image-additional" id="gallery_01">

				<?php foreach($images_gallery as $image_gallery ): ?>
					<a class="thumbnail" href="#" data-zoom-image="public/image/product/macbook_air_1-600x900.jpg" data-image="public/image/product/macbook_air_1-350x525.jpg" title="<?= $image_gallery->title?>"> 
						<img src="<?= $image_gallery->address?>"  title="<?= $image_gallery->title?>" alt ="<?= $image_gallery->title?>">
					</a>
				<?php endforeach;?>
				</div>
				<!-- Image Additional End!-->
				
              </div>
			  <!-- images Product End!-->
              <div class="col-sm-6">
                <ul class="list-unstyled description">
                  <li><b>برند :</b> <a href="#"><span itemprop="brand">فعلا برندی ندارد</span></a></li>
                  <li><b>کد محصول :</b> <span itemprop="mpn">محصول شماره <?= $target_product->id ?> </span></li>
                  <li><b>امتیازات خرید:</b> به زودی کامل می شود</li>
				  <?php if($Existed):?>
						<li><b>وضعیت موجودی :</b> <span class="instock">موجود</span></li>
				  <?php else:?>
						<li><b>وضعیت موجودی :</b> <span class="instock">ناموجود</span></li>
					<?php endif;?>
                </ul>
				
				<!-- Price Start !-->
                <ul class="price-box">
                  <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
				  <?php if($hasDiscount):?>
							<span class="price-old"><?= number_format($target_product->price) ?> تومان</span> <br><br>
							<span itemprop="price"><?= number_format($target_product->price - $target_product->price*($hasDiscount/100) ) ?> تومان
				<?php else:?>
							<span itemprop="price"><?= number_format($target_product->price) ?> تومان
				<?php endif;?>
							<span itemprop="availability" content="موجود"></span>
					  </span>
				  </li>
                  <li></li>
                  <li></li>
                </ul>
				<!-- Price End !-->
				
                <div id="product">
                  <h3 class="subtitle">انتخاب های در دسترس</h3>
              <!--   
			  <div class="form-group required">
                    <label class="control-label">رنگ</label>
                    <select class="form-control" id="input-option200" name="option[200]">
                      <option value=""> --- لطفا انتخاب کنید --- </option>
                      <option value="4">مشکی </option>
                      <option value="3">نقره ای </option>
                      <option value="1">سبز </option>
                      <option value="2">آبی </option>
                    </select>
                  </div> 
				  !-->
				   <form method="post" action="index.php?c=basket&a=add_basket&id=<?=$target_product->id?>">
						  <div class="cart">
							<div>
							  <div class="qty">
								<label class="control-label" for="input-quantity">تعداد</label>
								<input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
								<a class="qtyBtn plus" href="javascript:void(0);">+</a><br />
								<a class="qtyBtn mines" href="javascript:void(0);">-</a>
								<div class="clear"></div>
							  </div>
							 <button type="submit" id="button-cart" class="btn btn-primary btn-lg">افزودن به سبد</button>
					 </form>
					 
                    </div>
                    <div>
                      <button type="button" class="wishlist" onClick=""><i class="fa fa-heart"></i> افزودن به علاقه مندی ها</button>
                      <br />
                      <button type="button" class="wishlist" onClick=""><i class="fa fa-exchange"></i> مقایسه این محصول</button>
                    </div>
                  </div>
                </div>
				
				<!--rating Start !-->
                <div class="rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                  <meta itemprop="ratingValue" content="0" />
                  <p><span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <a onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href=""><span itemprop="reviewCount">1 بررسی</span></a> / <a onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href="">یک بررسی بنویسید</a></p>
                </div>
                <hr>
				<!--rating End !-->
				
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style"> <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal" pi:pinit:url="http://www.addthis.com/features/pinterest" pi:pinit:media="http://www.addthis.com/cms-content/images/features/pinterest-lg.png"></a> <a class="addthis_counter addthis_pill_style"></a> </div>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-514863386b357649"></script>
                <!-- AddThis Button END -->
              </div>
            </div>
			
			  <!-- Product info End  !-->
	
			
				<?php require_once("view/Product/PropertiesProduct.php"); ?>
				<?php require_once("view/Product/LikeProduct.php"); ?>
				
          </div>
        </div>
        <!--Middle Part End -->
		
		
        <!--Left Sidebar Start -->
		
        <aside id="column-right" class="col-sm-3 hidden-xs">
				<!--BestSeller Product Start -->
				<?php require_once("view/Product/BestSeller.php");?>
				<!--BestSeller Product End -->
				
				<!--Content Sidebar Start -->
				<?php require_once("view/Product/EmptySidebar.php");?>
				<!--Content Sidebar End-->
				
				  <!--Special Product Start -->
				<?php require_once("view/Product/SpecialDiscountProduct.php");?>
				 <!--Special Product End-->
        </aside>
		
        <!--Left Sidebar End -->
		
      </div>
    </div>
  </div>
	  