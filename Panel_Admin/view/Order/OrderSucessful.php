    <style>
    	.product-profile {
    		width: 30px;
    		height: 30px;
    	}
    </style>
    <section id="main-content">
    	<section class="wrapper">
    		<div class="col-lg-12">
    			<!--breadcrumbs start -->
    			<ul class="breadcrumb">
    				<li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
    				<li><a href="product">سفارشات</a></li>
    				<li class="active">خرید های وب سایت</li>
    			</ul>
    			<!--breadcrumbs end -->
    		</div>
    		<div class="row">
    			<div class="col-lg-12">
    				<section class="panel">
    					<?php if (count($orders) != 0) { ?>
    						<header class="panel-heading">
    							خرید های انجام شده از فروشگاه
    						</header>
    						<table class="table table-striped table-advance table-hover">
    							<thead>
    								<tr>
    									<th>نام مشتری</th>
    									<th>نام کالا</th>
    									<th>تعداد</th>
    									<th>قیمت</th>
    									<th>تاریخ ثبت سفارش</th>
    									<th>شماره تماس مشتری</th>
    									<th>جزئیات</th>
    								</tr>
    							</thead>
    							<tbody>

    								<?php

									foreach ($orders as $order) :
										$target_user = $class->get_user($order->user_id);
										$target_product = $class->product_details($order->product_id);
									?>

    									<tr>
    										<td><?php echo $target_user->name . " " . $target_user->lastname; ?></td>
    										<td><?php echo $target_product->title; ?></td>
    										<td><?php echo $order->count; ?></td>
    										<td><?php echo number_format($order->price); ?></td>
    										<?php
											$date = explode("/", $order->date);
											$Hejri_Date = gregorian_to_jalali($date[0], $date[1], $date[2], "/");
											?>
    										<td><?php echo $Hejri_Date; ?></td>
    										<td><?php echo $target_user->phone; ?></td>
    										<td><a href="index.php?c=order&a=order_detail&id=<?php echo $order->id; ?>" class="btn btn-primary btn-xs"><i class="icon-eye-open"></i></a></td>
    									</tr>
    								<?php
									endforeach;
									?>

    							</tbody>
    						</table>
    					<?php
						} else {
						?>
    						<div class="alert alert-block alert-warning  fade in">
    							<button data-dismiss="alert" class="close close-sm" type="button">
    								<i class="icon-remove"></i>
    							</button>
    							<h4>
    								<i class="icon-inbox"></i>
    								نتیجه
    							</h4>
    							<p>تاکنون خریدی انجام نشده است</p>
    						</div>
    					<?php } ?>
    				</section>
    			</div>
    		</div>
    	</section>
    </section>