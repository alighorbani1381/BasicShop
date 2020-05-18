    <style>
    	.product-profile {
    		width: 30px;
    		height: 30px;
    	}
    </style>
    <section id="main-content">
    	<section class="wrapper">
    		<div class="row">
    			<div class="col-lg-12">
    				<section class="panel">
    					<header class="panel-heading">
    						<li class="icon-bar-chart"></li>
    						تعداد کاربرانی که سبد خرید خود را تکمیل نکرده اند

    					</header>
    					<table class="table table-striped table-advance table-hover">
    						<thead>
    							<tr>
    								<th>نام مشتری</th>
    								<th>نام خانوادگی</th>
    								<th>شماره تماس مشتری</th>
    								<th>محصول در سبد خرید</th>
    								<th>قیمت نهایی</th>
    							</tr>
    						</thead>
    						<tbody>


    							<?php
								foreach ($users_dontpay as $user_dontpay) :
									$target_product = $product->productName($user_dontpay->product_id);
									$target_user = $class->getUserInfo($user_dontpay->user_id);
								?>
    								<tr>
    									<td><?php echo $target_user->name; ?></td>
    									<td><?php echo $target_user->lastname; ?></td>
    									<td><?php echo $target_user->phone; ?></td>
    									<td><?php echo  $target_product->title; ?></td>
    									<td><?php echo  number_format($user_dontpay->price * $user_dontpay->count); ?></td>
    								</tr>
    							<?php endforeach; ?>

    						</tbody>
    					</table>

    					<?php if (count($users_dontpay) == 0) : ?>
    						کاربری وجود ندارد
    					<?php endif; ?>

    				</section>
    			</div>
    		</div>
    	</section>
    </section>