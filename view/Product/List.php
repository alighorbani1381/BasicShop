<div class="wrapper-wide">
  <div id="header">
    
    
    
    
    <style>.xper{ width: 150px;
    height: 187px;}</style>
    
    
    
      <?php
      var_dump($procat);
      ?>
    
    
  </div>
  <div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="category.html">صفحه اصلی</a></li>
        <li><a href="category.html"><?= $procat->title ?></a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">

	  <?php
	//require_once("Panel_Admin/model/ProcatModel.php");
	$Main_Menus=$ProductCategory->mainProcats();
	?>

        <!--Left Part Start -->
        <aside id="column-left" class="col-sm-3 hidden-xs">
          <h3 class="subtitle">دسته ها</h3>
          <div class="box-category">

         <ul id="cat_accordion">

		<?php foreach($Main_Menus as $Main_Menu): 
			$SubMenus=$ProductCategory->subMenu($Main_Menu->id);
			?>
		<?php if(count($SubMenus)>0): ?>
              <li class="cutom-parent-li"><a href="#" class="cutom-parent"><?php echo $Main_Menu->title ;?><span class="dcjq-icon"></span></a> <span class="down"></span>
				  <ul style="display: none;">							
					<?php	foreach($SubMenus as $SubMenu): ?>
						<li><a href="index.php?c=product&a=list&procat=<?= $SubMenu->id ?>"> <?php echo $SubMenu->title;?> </a></li>					
					<?php endforeach;?>
            </ul>
              </li>
		<?php else:?>  
		<li><a href="category.html" class="cutom-parent"><?php echo $Main_Menu->title ;?></a></li>
		
			  <?php endif;?>  
		<?php endforeach;?>      

            </ul>
          </div>
          <h3 class="subtitle">پرفروش ها</h3>
          <div class="side-item">
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="public/image/product/apple_cinema_30-50x75.jpg" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive"></a></div>
              <div class="caption">
                <h4><a href="product.html">تی شرت کتان مردانه</a></h4>
                <p class="price"><span class="price-new">110000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-10%</span></p>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="public/image/product/iphone_1-50x75.jpg" alt="آیفون 7" title="آیفون 7" class="img-responsive"></a></div>
              <div class="caption">
                <h4><a href="product.html">آیفون 7</a></h4>
                <p class="price"> 2200000 تومان </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="public/image/product/macbook_1-50x75.jpg" alt="آیدیا پد یوگا" title="آیدیا پد یوگا" class="img-responsive"></a></div>
              <div class="caption">
                <h4><a href="product.html">آیدیا پد یوگا</a></h4>
                <p class="price"> 900000 تومان </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="public/image/product/sony_vaio_1-50x75.jpg" alt="کفش راحتی مردانه" title="کفش راحتی مردانه" class="img-responsive"></a></div>
              <div class="caption">
                <h4><a href="product.html">کفش راحتی مردانه</a></h4>
                <p class="price"> <span class="price-new">32000 تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-25%</span> </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="public/image/product/FinePix-Long-Zoom-Camera-50x75.jpg" alt="دوربین فاین پیکس" title="دوربین فاین پیکس" class="img-responsive"></a></div>
              <div class="caption">
                <h4><a href="product.html">دوربین فاین پیکس</a></h4>
                <p class="price">122000 تومان</p>
              </div>
            </div>
          </div>
          <h3 class="subtitle">ویژه</h3>
          <div class="side-item">
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="public/image/product/macbook_pro_1-50x75.jpg" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive"></a></div>
              <div class="caption">
                <h4><a href="product.html">کتاب آموزش باغبانی</a></h4>
                <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span> <span class="saving">-26%</span> </p>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="public/image/product/samsung_tab_1-50x75.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive"></a></div>
              <div class="caption">
                <h4><a href="product.html">تبلت ایسر</a></h4>
                <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="public/image/product/apple_cinema_30-50x75.jpg" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive"></a></div>
              <div class="caption">
                <h4><a href="http://demo.harnishdesign.net/opencart/marketshop/v1/index.php?route=product/product&amp;product_id=42">تی شرت کتان مردانه</a></h4>
                <p class="price"> <span class="price-new">110000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-10%</span> </p>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="public/image/product/nikon_d300_1-50x75.jpg" alt="دوربین دیجیتال حرفه ای" title="دوربین دیجیتال حرفه ای" class="img-responsive"></a></div>
              <div class="caption">
                <h4><a href="product.html">دوربین دیجیتال حرفه ای</a></h4>
                <p class="price"> <span class="price-new">92000 تومان</span> <span class="price-old">98000 تومان</span> <span class="saving">-6%</span> </p>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="public/image/product/nikon_d300_5-50x75.jpg" alt="محصولات مراقبت از مو" title="محصولات مراقبت از مو" class="img-responsive"></a></div>
              <div class="caption">
                <h4><a href="product.html">محصولات مراقبت از مو</a></h4>
                <p class="price"> <span class="price-new">66000 تومان</span> <span class="price-old">90000 تومان</span> <span class="saving">-27%</span> </p>
                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
              </div>
            </div>
            <div class="product-thumb clearfix">
              <div class="image"><a href="product.html"><img src="public/image/product/macbook_air_1-50x75.jpg" alt="لپ تاپ ایلین ور" title="لپ تاپ ایلین ور" class="img-responsive"></a></div>
              <div class="caption">
                <h4><a href="product.html">لپ تاپ ایلین ور</a></h4>
                <p class="price"> <span class="price-new">10 میلیون تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-5%</span> </p>
              </div>
            </div>
          </div>
          <div class="banner owl-carousel owl-theme" style="opacity: 1; display: block;">
            <div class="owl-wrapper-outer"><div class="owl-wrapper owl-origin" style="width: 1052px; left: 0px; display: block; transition: all 0ms ease 0s; transform: translate3d(0px, 0px, 0px); transform-origin: 131.5px center; perspective-origin: 131.5px center;"><div class="owl-item owl-fade-in" style="width: 263px;"><div class="item"> <a href="#"><img src="public/image/banner/small-banner1-265x350.jpg" alt="small banner" class="img-responsive"></a> </div></div><div class="owl-item owl-fade-out" style="width: 263px; position: relative; left: -263px;"><div class="item"> <a href="#"><img src="public/image/banner/small-banner-265x350.jpg" alt="small banner1" class="img-responsive"></a> </div></div></div></div>
            
          </div>
        </aside>
        <!--Left Part End -->
		
        <div id="content" class="col-sm-9">

		<!-- Top of Search Product !-->
          <h1 class="title"><?= $procat->title ?></h1>
          
          <h3 class="subtitle">جستجو در دسته بندی های مشابه</h3>
          <div class="category-list row">
		  
					<div class="col-sm-3">
						  <ul class="list-item">
								<?php $SubProcats=$ProductCategory->subMenu($procat->chid);?>
								<?php foreach($SubProcats as $SubProcat): ?>
									  <li><a href="index.php?c=product&a=list&procat=<?= $SubProcat->id ?>"><?= $SubProcat->title ?></a></li>
								  <?php endforeach;?>
						   </ul>
					</div>

				
					
            </div>
          <!-- end of Search Product !-->
		  
		  <!-- Product Filter Start !-->
          <div class="product-filter">
            <div class="row">
              <div class="col-md-4 col-sm-5">
                <div class="btn-group">
                  <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="" data-original-title="لیست"><i class="fa fa-th-list"></i></button>
                  <button type="button" id="grid-view" class="btn btn-default selected" data-toggle="tooltip" title="" data-original-title="افقی"><i class="fa fa-th"></i></button>
                </div>
                <a href="compare.html" id="compare-total">محصولات مقایسه (0)</a> </div>
              <div class="col-sm-2 text-right">
                <label class="control-label" for="input-sort">مرتب سازی :</label>
              </div>
              <div class="col-md-3 col-sm-2 text-right">
                <select id="input-sort" class="form-control col-sm-3">
                  <option value="" selected="selected">پیشفرض</option>
                  <option value="">نام (الف - ی)</option>
                  <option value="">نام (ی - الف)</option>
                  <option value="">قیمت (کم به زیاد)</option>
                  <option value="">قیمت (زیاد به کم)</option>
                  <option value="">امتیاز (بیشترین)</option>
                  <option value="">امتیاز (کمترین)</option>
                  <option value="">مدل (A - Z)</option>
                  <option value="">مدل (Z - A)</option>
                </select>
              </div>
              <div class="col-sm-1 text-right">
                <label class="control-label" for="input-limit">نمایش :</label>
              </div>
              <div class="col-sm-2 text-right">
                <select id="input-limit" class="form-control">
                  <option value="" selected="selected">20</option>
                  <option value="">25</option>
                  <option value="">50</option>
                  <option value="">75</option>
                  <option value="">100</option>
                </select>
              </div>
            </div>
          </div>
          <br>
		  <!-- Product Filter End !-->
		  
          <div class="row products-category">
		  <?php $clear=0; foreach($Products as $Product): $clear++; ?>
		  	<!-- Product Item Start !-->
            <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="index.php?c=product&a=details&id=<?=$Product->id ?>"><img src="<?= $Product->images ?>" alt=" <?= $Product->title ?>" title=" <?= $Product->title ?> " class="img-responsive xper"></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="product.html"><?= $Product->title ?></a></h4>
                    <p class="description">            
							<?= $Product->text ?>
					  </p>
                    <p class="price"> 
					<?php 
					$price_tax=$Product->price * ($Product->off/100);
					$finalprice=$Product->price - $price_tax;
					?>
						
					<?php if($Product->off !=0): ?>
						<span class="price-new"><?= number_format($Product->price) ?></span> 
						<span class="price-old"><?= number_format($price_tax) ?> </span>
						<span class="saving"><?= $Product->off ?> %</span>
					</p>
                    <p class="price"><?= number_format($finalprice) ?> تومان</p>
					<?php else:?>
					<p class="price"><?= number_format($Product->price) ?> تومان  </p>
					<?php endif;?>
                  </div>
                  <div class="button-group">
				  	 <form method="post" action="index.php?c=basket&a=add_basket&id=<?=$Product->id?>">
							<button class="btn-primary" type="submit" onclick=""><span>افزودن به سبد</span></button>
					</form>
                    <div class="add-to-links">
                      <button type="button" data-toggle="tooltip" title="" onclick="" data-original-title="افزودن به علاقه مندی ها"><i class="fa fa-heart"></i> <span>افزودن به علاقه مندی ها</span></button>
                      <button type="button" data-toggle="tooltip" title="" onclick="" data-original-title="مقایسه این محصول"><i class="fa fa-exchange"></i> <span>مقایسه این محصول</span></button>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
				<!-- Product Item End !-->
				<?php if($clear==4)?>
					<span class="clearfix visible-lg-block"></span>	
					
				
				<?php endforeach;?>	
					
			


			<!-- Pagination Start !-->
          <div class="row">
            <div class="col-sm-6 text-left">
              <ul class="pagination">
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">&gt;</a></li>
                <li><a href="#">&gt;|</a></li>
              </ul>
            </div>
            <div class="col-sm-6 text-right">نمایش 1 تا 12 از 15 (مجموع 2 صفحه)</div>
          </div>
        </div>
		<!-- Pagination End !-->
        <!--Middle Part End -->
      </div>
    </div>
  </div>
</div>