            <h3 class="subtitle">محصولات مرتبط</h3>
            <div class="owl-carousel related_pro">
			 <!-- 
            <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="public/image/product/samsung_tab_1-220x330.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive" /></a></div>
                <div class="caption">
                  <h4><a href="product.html">تبلت ایسر</a></h4>
                  <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                  <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                </div>
                <div class="button-group">
                  <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                  <div class="add-to-links">
                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
              </div> 
              
			  <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="public/image/product/macbook_pro_1-220x330.jpg" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive" /></a></div>
                <div class="caption">
                  <h4><a href="product.html"> کتاب آموزش باغبانی </a></h4>
                  <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span> <span class="saving">-26%</span> </p>
                </div>
                <div class="button-group">
                  <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                  <div class="add-to-links">
                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
              </div>
			  
              <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="public/image/product/macbook_1-220x330.jpg" alt="آیدیا پد یوگا" title="آیدیا پد یوگا" class="img-responsive" /></a></div>
                <div class="caption">
                  <h4><a href="product.html">آیدیا پد یوگا</a></h4>
                  <p class="price"> 900000 تومان </p>
                  <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                </div>
                <div class="button-group">
                  <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                  <div class="add-to-links">
                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
              </div>
			
              <div class="product-thumb">
                <div class="image"><a href="product.html"><img src="public/image/product/ipod_shuffle_1-220x330.jpg" alt="لپ تاپ hp پاویلیون" title="لپ تاپ hp پاویلیون" class="img-responsive" /></a></div>
                <div class="caption">
                  <h4><a href="product.html">لپ تاپ hp پاویلیون</a></h4>
                  <p class="price"> 122000 تومان </p>
                </div>
                <div class="button-group">
                  <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                  <div class="add-to-links">
                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
              </div>
			    !-->
				
				<?php foreach($like_products as $like_product): ?>
				<!-- Like Product Start !-->
					  <div class="product-thumb">
						<div class="image"><a href="index.php?c=product&a=details&id=<?= $like_product->id ?>"><img src="<?= $like_product->images ?>" alt="<?= $like_product->title ?>" title="<?= $like_product->title ?>" class="img-responsive" /></a></div>
						<div class="caption">
						  <h4><a href="product.html"><?= $like_product->title ?></a></h4>
						  <p class="price"> <span class="price-new">62000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-50%</span> </p>
						</div>
						<div class="button-group">
						<form method="post" action="index.php?c=basket&a=add_basket&id=<?=$target_product->id?>">
								<button class="btn-primary" type="submit" onClick=""><span>افزودن به سبد</span></button>
								<input type="hidden" name="quantity" value="1">
						  </form>
						  <div class="add-to-links">
							<button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
							<button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
						  </div>
						</div>
					  </div>
			  	<!-- Like Product End !-->
				<?php endforeach;?>

			  
            </div>